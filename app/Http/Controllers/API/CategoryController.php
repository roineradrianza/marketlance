<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of latest 5 categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function latest()
    {
        $categories = Category::all()->take(5);
        return response()->json($categories);
    }

}
