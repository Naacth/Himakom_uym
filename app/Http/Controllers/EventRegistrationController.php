<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventRegistrationController extends Controller
{
    /**
     * Show registration form
     */
    public function showRegistrationForm($eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('event-registrations.create', compact('event'));
    }

    /**
     * Register for event
     */
    public function register(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);

        $validator = Validator::make($request->all(), [
            'participant_name' => 'required|string|max:255',
            'participant_phone' => 'required|string|max:20',
            'participant_nim' => 'nullable|string|max:20',
            'participant_kelas' => 'nullable|string|max:50',
            'participant_email' => 'required|email',
            'notes' => 'nullable|string',
            'payment_method' => 'required|in:qris,offline',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check if user already registered for this event
        $existingRegistration = EventRegistration::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->first();

        if ($existingRegistration) {
            return redirect()->back()->with('error', 'Anda sudah terdaftar untuk event ini.');
        }

        $registration = EventRegistration::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'registration_number' => EventRegistration::generateRegistrationNumber(),
            'participant_name' => $request->participant_name,
            'participant_phone' => $request->participant_phone,
            'participant_nim' => $request->participant_nim,
            'participant_kelas' => $request->participant_kelas,
            'participant_email' => $request->participant_email,
            'notes' => $request->notes,
            'payment_method' => $request->payment_method,
            'payment_status' => $event->is_paid ? 'pending' : 'paid',
            'status' => 'registered',
        ]);

        return redirect()->route('event-registrations.success', $registration->id)
            ->with('success', 'Pendaftaran event berhasil! Silakan tunggu konfirmasi dari admin.');
    }

    /**
     * Show registration success page
     */
    public function success($registrationId)
    {
        $registration = EventRegistration::with(['event', 'user'])->findOrFail($registrationId);
        
        // Ensure user can only see their own registration
        if (Auth::id() !== $registration->user_id) {
            abort(403);
        }

        return view('event-registrations.success', compact('registration'));
    }

    /**
     * Show user's event registrations
     */
    public function history()
    {
        $registrations = Auth::user()->eventRegistrations()->with('event')->latest()->get();
        return view('event-registrations.history', compact('registrations'));
    }

    /**
     * Show registration detail
     */
    public function show($registrationId)
    {
        $registration = EventRegistration::with(['event', 'user'])->findOrFail($registrationId);
        
        // Ensure user can only see their own registration
        if (Auth::id() !== $registration->user_id) {
            abort(403);
        }

        return view('event-registrations.show', compact('registration'));
    }

    /**
     * Cancel registration
     */
    public function cancel($registrationId)
    {
        $registration = EventRegistration::findOrFail($registrationId);
        
        // Ensure user can only cancel their own registration
        if (Auth::id() !== $registration->user_id) {
            abort(403);
        }

        // Only allow cancellation if registration is still registered
        if ($registration->status !== 'registered') {
            return redirect()->back()->with('error', 'Pendaftaran tidak dapat dibatalkan karena sudah dikonfirmasi.');
        }

        $registration->update(['status' => 'cancelled']);

        return redirect()->route('event-registrations.history')->with('success', 'Pendaftaran berhasil dibatalkan.');
    }

    /**
     * Admin: Show all registrations
     */
    public function adminIndex()
    {
        $registrations = EventRegistration::with(['user', 'event'])->latest()->get();
        return view('admin.event-registrations.index', compact('registrations'));
    }

    /**
     * Admin: Show registration detail
     */
    public function adminShow($registrationId)
    {
        $registration = EventRegistration::with(['user', 'event'])->findOrFail($registrationId);
        return view('admin.event-registrations.show', compact('registration'));
    }

    /**
     * Admin: Update registration status
     */
    public function adminUpdateStatus(Request $request, $registrationId)
    {
        $registration = EventRegistration::findOrFail($registrationId);

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:registered,confirmed,attended,cancelled',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $registration->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }
}
