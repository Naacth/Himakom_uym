<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'name',
        'email',
        'role',
        'is_active',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Check if admin is superadmin
     */
    public function isSuperAdmin()
    {
        return $this->role === 'superadmin';
    }

    /**
     * Check if admin is active
     */
    public function isActive()
    {
        return $this->is_active;
    }

    /**
     * Get all orders for admin dashboard
     */
    public function getAllOrders()
    {
        return Order::with(['user', 'produk'])->latest()->get();
    }

    /**
     * Get all event registrations for admin dashboard
     */
    public function getAllEventRegistrations()
    {
        return EventRegistration::with(['user', 'event'])->latest()->get();
    }
}
