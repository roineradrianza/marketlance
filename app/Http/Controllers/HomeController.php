<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Gig;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $gigs = Gig::where('status', 1)->get(['id', 'user_id', 'title', 'slug', 'featured_image'])->load('user', 'packages')->take(6);
        return Inertia::render('Home', [
            'gigs' => $gigs,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register')
        ]);
    }
}
