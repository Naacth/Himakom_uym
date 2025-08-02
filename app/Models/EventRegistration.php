<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'registration_number',
        'status',
        'participant_name',
        'participant_phone',
        'participant_nim',
        'participant_kelas',
        'participant_email',
        'notes',
        'payment_status',
        'payment_method',
        'certificate_downloaded',
    ];

    protected $casts = [
        'certificate_downloaded' => 'boolean',
    ];

    /**
     * Get the user that owns the registration.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the event that was registered.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Generate unique registration number
     */
    public static function generateRegistrationNumber()
    {
        $prefix = 'REG';
        $date = now()->format('Ymd');
        $lastRegistration = self::whereDate('created_at', today())->latest()->first();
        
        if ($lastRegistration) {
            $lastNumber = intval(substr($lastRegistration->registration_number, -4));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
        
        return $prefix . $date . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Get status badge class
     */
    public function getStatusBadgeClass()
    {
        return match($this->status) {
            'registered' => 'bg-info',
            'confirmed' => 'bg-success',
            'attended' => 'bg-primary',
            'cancelled' => 'bg-danger',
            default => 'bg-secondary',
        };
    }

    /**
     * Get status label
     */
    public function getStatusLabel()
    {
        return match($this->status) {
            'registered' => 'Terdaftar',
            'confirmed' => 'Dikonfirmasi',
            'attended' => 'Hadir',
            'cancelled' => 'Dibatalkan',
            default => 'Unknown',
        };
    }

    /**
     * Get payment status badge class
     */
    public function getPaymentStatusBadgeClass()
    {
        return match($this->payment_status) {
            'pending' => 'bg-warning',
            'paid' => 'bg-success',
            'failed' => 'bg-danger',
            default => 'bg-secondary',
        };
    }

    /**
     * Get payment status label
     */
    public function getPaymentStatusLabel()
    {
        return match($this->payment_status) {
            'pending' => 'Menunggu Pembayaran',
            'paid' => 'Sudah Dibayar',
            'failed' => 'Gagal',
            default => 'Unknown',
        };
    }

    /**
     * Check if can download certificate
     */
    public function canDownloadCertificate()
    {
        return $this->status === 'attended' && $this->event->certificate_template;
    }

    /**
     * Mark certificate as downloaded
     */
    public function markCertificateAsDownloaded()
    {
        $this->update(['certificate_downloaded' => true]);
    }
}
