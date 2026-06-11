<?php

use App\Http\Controllers\PeopleDirectoryController;
use App\Http\Controllers\MinistryRequestController;
use App\Http\Controllers\Settings\ProfileController;
use App\Http\Controllers\TriageRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('requests', MinistryRequestController::class)
        ->parameters(['requests' => 'ministryRequest'])
        ->except(['destroy']);
    Route::post('/requests/{ministryRequest}/submit', [MinistryRequestController::class, 'submit'])->name('requests.submit');
    Route::get('/triage/requests', [TriageRequestController::class, 'index'])->name('triage.index');
    Route::get('/triage/requests/{ministryRequest}', [TriageRequestController::class, 'show'])->name('triage.show');
    Route::post('/triage/requests/{ministryRequest}/transition', [TriageRequestController::class, 'transition'])->name('triage.transition');
    Route::get('/people', [PeopleDirectoryController::class, 'index'])->name('people.index');
    Route::redirect('/settings', '/settings/profile');
    Route::get('/settings/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/settings/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/ui/typography', fn () => view('ui.typography'));
    Route::get('/ui/colors', fn () => view('ui.colors'));
    Route::get('/ui/buttons', fn () => view('ui.buttons'));
    Route::get('/ui/forms', fn () => view('ui.forms'));
    Route::get('/ui/cards', fn () => view('ui.cards'));
});

Route::get('/auth/lock-screen', function () {
    return redirect()->route('password.confirm');
});

Route::get('/auth/sign-in', function () {
    return redirect()->route('login');
});

Route::get('/auth/new-pass', function () {
    return redirect()->route('password.request');
});

Route::get('/auth/delete-account', function () {
    return view('auth.delete-account');
});

// Registration is invite-only — /auth/sign-up redirects to login
Route::get('/auth/sign-up', function () {
    return redirect()->route('login');
});

Route::get('/auth/reset-pass', function () {
    return redirect()->route('password.request');
});

Route::get('/auth/success-mail', function () {
    return redirect()->route('verification.notice');
});

Route::get('/auth/two-factor', function () {
    return redirect()->route('two-factor.login');
});

Route::get('/auth/login-pin', function () {
    return view('auth.login-pin');
});

Route::get('/layouts/compact', function () {
    return view('layouts.compact');
});

Route::get('/layouts/boxed', function () {
    return view('layouts.boxed');
});

Route::get('/layouts/horizontal', function () {
    return view('layouts.horizontal');
});

Route::get('/layouts/preloader', function () {
    return view('layouts.preloader');
});

Route::get('/layouts/scrollable', function () {
    return view('layouts.scrollable');
});

Route::get('/error/400', function () {
    return view('error.400');
});

Route::get('/error/500', function () {
    return view('error.500');
});

Route::get('/error/408', function () {
    return view('error.408');
});

Route::get('/error/404', function () {
    return view('error.404');
});

Route::get('/error/401', function () {
    return view('error.401');
});

Route::get('/error/maintenance', function () {
    return view('error.maintenance');
});

Route::get('/error/403', function () {
    return view('error.403');
});

Route::get('/icons/tabler', function () {
    return view('icons.tabler');
});

Route::get('/auth-split/lock-screen', function () {
    return view('auth-split.lock-screen');
});

Route::get('/auth-split/sign-in', function () {
    return view('auth-split.sign-in');
});

Route::get('/auth-split/new-pass', function () {
    return view('auth-split.new-pass');
});

Route::get('/auth-split/delete-account', function () {
    return view('auth-split.delete-account');
});

Route::get('/auth-split/sign-up', function () {
    return view('auth-split.sign-up');
});

Route::get('/auth-split/reset-pass', function () {
    return view('auth-split.reset-pass');
});

Route::get('/auth-split/success-mail', function () {
    return view('auth-split.success-mail');
});

Route::get('/auth-split/two-factor', function () {
    return view('auth-split.two-factor');
});

Route::get('/auth-split/login-pin', function () {
    return view('auth-split.login-pin');
});

Route::get('/pages/empty', function () {
    return view('pages.empty');
});

Route::get('/auth-card/lock-screen', function () {
    return view('auth-card.lock-screen');
});

Route::get('/auth-card/sign-in', function () {
    return view('auth-card.sign-in');
});

Route::get('/auth-card/new-pass', function () {
    return view('auth-card.new-pass');
});

Route::get('/auth-card/delete-account', function () {
    return view('auth-card.delete-account');
});

Route::get('/auth-card/sign-up', function () {
    return view('auth-card.sign-up');
});

Route::get('/auth-card/reset-pass', function () {
    return view('auth-card.reset-pass');
});

Route::get('/auth-card/success-mail', function () {
    return view('auth-card.success-mail');
});

Route::get('/auth-card/two-factor', function () {
    return view('auth-card.two-factor');
});

Route::get('/auth-card/login-pin', function () {
    return view('auth-card.login-pin');
});

Route::get('/layouts/sidebar/offcanvas', function () {
    return view('layouts.sidebar.offcanvas');
});

Route::get('/layouts/sidebar/compact', function () {
    return view('layouts.sidebar.compact');
});

Route::get('/layouts/sidebar/image', function () {
    return view('layouts.sidebar.image');
});

Route::get('/layouts/sidebar/on-hover', function () {
    return view('layouts.sidebar.on-hover');
});

Route::get('/layouts/sidebar/gray', function () {
    return view('layouts.sidebar.gray');
});

Route::get('/layouts/sidebar/gradient', function () {
    return view('layouts.sidebar.gradient');
});

Route::get('/layouts/sidebar/on-hover-active', function () {
    return view('layouts.sidebar.on-hover-active');
});

Route::get('/layouts/sidebar/with-lines', function () {
    return view('layouts.sidebar.with-lines');
});

Route::get('/layouts/sidebar/light', function () {
    return view('layouts.sidebar.light');
});

Route::get('/layouts/topbar/dark', function () {
    return view('layouts.topbar.dark');
});

Route::get('/layouts/topbar/gray', function () {
    return view('layouts.topbar.gray');
});

Route::get('/layouts/topbar/gradient', function () {
    return view('layouts.topbar.gradient');
});
