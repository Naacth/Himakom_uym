<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('date', 'desc')->get();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'is_paid' => 'boolean',
            'price' => 'nullable|numeric|min:0',
            'qris_image' => 'nullable|image',
            'certificate_template' => 'nullable|image',
            'google_form_link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        if ($request->hasFile('qris_image')) {
            $validated['qris_image'] = $request->file('qris_image')->store('qris', 'public');
        }

        if ($request->hasFile('certificate_template')) {
            $validated['certificate_template'] = $request->file('certificate_template')->store('certificates', 'public');
        }

        $validated['is_paid'] = $request->has('is_paid');

        Event::create($validated);
        return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'is_paid' => 'boolean',
            'price' => 'nullable|numeric|min:0',
            'qris_image' => 'nullable|image',
            'certificate_template' => 'nullable|image',
            'google_form_link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        if ($request->hasFile('qris_image')) {
            $validated['qris_image'] = $request->file('qris_image')->store('qris', 'public');
        }

        if ($request->hasFile('certificate_template')) {
            $validated['certificate_template'] = $request->file('certificate_template')->store('certificates', 'public');
        }

        $validated['is_paid'] = $request->has('is_paid');

        $event->update($validated);
        return redirect()->route('events.index')->with('success', 'Event berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus!');
    }

    /**
     * Display the public event page with dynamic data.
     */
    public function publicPage()
    {
        $events = Event::orderBy('date', 'desc')->get();
        return view('event', compact('events'));
    }

    /**
     * Download certificate for event registration
     */
    public function downloadCertificate($registrationId)
    {
        $registration = \App\Models\EventRegistration::with(['event', 'user'])->findOrFail($registrationId);
        
        // Ensure user can only download their own certificate
        if (auth()->id() !== $registration->user_id) {
            abort(403);
        }

        if (!$registration->canDownloadCertificate()) {
            return redirect()->back()->with('error', 'Sertifikat belum tersedia atau Anda belum hadir di event.');
        }

        // Mark as downloaded
        $registration->markCertificateAsDownloaded();

        // For now, return the certificate template
        // In a real implementation, you would generate a personalized certificate
        if ($registration->event->certificate_template) {
            return response()->download(storage_path('app/public/' . $registration->event->certificate_template));
        }

        return redirect()->back()->with('error', 'Template sertifikat tidak ditemukan.');
    }
}
