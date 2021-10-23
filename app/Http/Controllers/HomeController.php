<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\Gig;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all()->take(5);
        $gigs = Gig::where('status', 1)->get(['id', 'user_id', 'title', 'slug', 'featured_image'])->load('user', 'packages')->take(6);
        return Inertia::render('Home', [
            'gigs' => $gigs,
            'categories' => $categories,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register')
        ]);
    }
}
