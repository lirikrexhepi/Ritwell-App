<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function index()
    {
        $images = DB::table('nutrition_plan')
            ->select('image')
            ->whereNotNull('image')
            ->union(DB::table('products')->select('image')->whereNotNull('image'))
            ->union(DB::table('recipe')->select('image')->whereNotNull('image'))
            ->get();

        return response()->json([
            'success' => true,
            'data' => $images
        ], 200);
    }
}
