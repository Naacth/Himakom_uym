<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\KabinetController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\DivisiMemberController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\EventRegistrationController;

// Public Routes
Route::get('/', function () {
    return view('home');
});
Route::get('/about', [AboutController::class, 'publicPage']);
Route::get('/kabinet', [KabinetController::class, 'publicPage']);
Route::get('/divisi', [DivisiController::class, 'publicPage']);
Route::get('/event', [EventController::class, 'publicPage']);
Route::get('/produk', [ProdukController::class, 'publicPage']);
Route::get('/galeri', [GaleriController::class, 'publicPage']);
Route::get('/kontak', [KontakController::class, 'publicPage']);
Route::get('/divisi/{divisi}', [DivisiController::class, 'showDetail'])->name('divisi.detail');

// User Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected User Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    
    // Order Routes
    Route::get('/orders/create/{produk}', [OrderController::class, 'showOrderForm'])->name('orders.create');
    Route::post('/orders/{produk}', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/success/{order}', [OrderController::class, 'success'])->name('orders.success');
    Route::get('/orders/history', [OrderController::class, 'history'])->name('orders.history');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
    
    // Event Registration Routes
    Route::get('/event-registrations/create/{event}', [EventRegistrationController::class, 'showRegistrationForm'])->name('event-registrations.create');
    Route::post('/event-registrations/{event}', [EventRegistrationController::class, 'register'])->name('event-registrations.register');
    Route::get('/event-registrations/success/{registration}', [EventRegistrationController::class, 'success'])->name('event-registrations.success');
    Route::get('/event-registrations/history', [EventRegistrationController::class, 'history'])->name('event-registrations.history');
    Route::get('/event-registrations/{registration}', [EventRegistrationController::class, 'show'])->name('event-registrations.show');
    Route::post('/event-registrations/{registration}/cancel', [EventRegistrationController::class, 'cancel'])->name('event-registrations.cancel');
});

// Admin Authentication Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// Protected Admin Routes
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/profile', [AdminAuthController::class, 'profile'])->name('admin.profile');
    Route::post('/profile', [AdminAuthController::class, 'updateProfile'])->name('admin.profile.update');
    
    Route::get('/dashboard', function () {
        return view('admin-dashboard');
    })->name('admin-dashboard');
    
    // Admin Resources
    Route::resource('events', EventController::class);
    Route::resource('abouts', AboutController::class);
    Route::resource('galeris', GaleriController::class);
    Route::resource('produks', ProdukController::class);
    Route::resource('kontaks', KontakController::class);
    Route::resource('kabinets', KabinetController::class);
    Route::resource('divisis', DivisiController::class);
    Route::resource('divisi-members', DivisiMemberController::class);
    
    // Admin Order Management
    Route::get('/orders', [OrderController::class, 'adminIndex'])->name('admin.orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'adminShow'])->name('admin.orders.show');
    Route::post('/orders/{order}/status', [OrderController::class, 'adminUpdateStatus'])->name('admin.orders.update-status');
    
    // Admin Event Registration Management
    Route::get('/event-registrations', [EventRegistrationController::class, 'adminIndex'])->name('admin.event-registrations.index');
    Route::get('/event-registrations/{registration}', [EventRegistrationController::class, 'adminShow'])->name('admin.event-registrations.show');
    Route::post('/event-registrations/{registration}/status', [EventRegistrationController::class, 'adminUpdateStatus'])->name('admin.event-registrations.update-status');
    
    // Super Admin Routes
    Route::get('/super-admin', [AdminAuthController::class, 'superAdminDashboard'])->name('admin.super-admin.dashboard');
    Route::post('/super-admin/admins', [AdminAuthController::class, 'createAdmin'])->name('admin.super-admin.create');
    Route::post('/super-admin/admins/{admin}', [AdminAuthController::class, 'updateAdmin'])->name('admin.super-admin.update');
    Route::delete('/super-admin/admins/{admin}', [AdminAuthController::class, 'deleteAdmin'])->name('admin.super-admin.delete');
    
    // Certificate Download
    Route::get('/events/certificate/{registration}', [EventController::class, 'downloadCertificate'])->name('events.certificate.download');
});

// Legacy routes for backward compatibility
Route::get('/admin', function () {
    return redirect('/admin/login');
})->name('admin-dashboard-old');

Route::get('/dashboard', function () {
    return view('user-dashboard');
});
