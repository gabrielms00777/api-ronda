<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RoundRecord;
use App\Models\Route;
use App\Models\Stop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Auth::user()->routes()->first();
        $stops = Stop::query()->where('route_id', $routes->id)->get();

        return response()->json($stops);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_time' => ['required', 'date_format:Y-m-d H:i:s'],
            'latitude' => ['required'],
            'longitude' => ['required'],
            'photo' => ['required', 'image'],
        ]);

        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('images');
        } else {
            return response()->json(['error' => 'Imagem não enviada'], 400);
        }

        try {
            $validated['photo'] = $imagePath;
            // return response()->json($validated);
            Auth::user()->roundRecords()->create($validated);
            return response()->json(['ok' => true], 200);
        } catch (\Throwable $th) {
            throw $th;
            return response()->json(['ok' => false], 500);
        }

    }

    public function stops()
    {
        $stops = Auth::user()->roundRecords()->whereDate('date_time', Carbon::now())->latest()->get(['date_time']);

        return response()->json($stops);
    }


}
