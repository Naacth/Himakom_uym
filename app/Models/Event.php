<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'date', 'location', 'is_paid', 'price', 'qris_image', 'certificate_template', 'google_form_link'
    ];

    protected $casts = [
        'is_paid' => 'boolean',
        'price' => 'decimal:2',
    ];

    /**
     * Get the registrations for this event.
     */
    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    /**
     * Get formatted date
     */
    public function getFormattedDateAttribute()
    {
        return \Carbon\Carbon::parse($this->date)->format('d F Y');
    }

    /**
     * Check if event is upcoming
     */
    public function isUpcoming()
    {
        return $this->date >= now();
    }

    /**
     * Get registration count
     */
    public function getRegistrationCount()
    {
        return $this->registrations()->count();
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute()
    {
        return $this->is_paid && $this->price ? 'Rp ' . number_format($this->price, 0, ',', '.') : 'Gratis';
    }

    /**
     * Check if event is free
     */
    public function isFree()
    {
        return !$this->is_paid || !$this->price;
    }

    /**
     * Get certificate URL
     */
    public function getCertificateUrlAttribute()
    {
        return $this->certificate_template ? asset('storage/' . $this->certificate_template) : null;
    }

    /**
     * Get QRIS URL
     */
    public function getQrisUrlAttribute()
    {
        return $this->qris_image ? asset('storage/' . $this->qris_image) : null;
    }
}
