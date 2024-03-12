<?php

use App\Models\RoundRecord;
use App\Models\Route as ModelsRoute;
use App\Models\Stop;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::view('/', 'welcome');
Route::get('/', function(){

    // $a = ModelsRoute::all()->toArray();
    $a = User::find(2)->roundRecords()->whereDate('date_time', Carbon::now())->get();
    // $b = Stop::query()->where('route_id', $a->id)->first();
    // $c = User::find(2);

    // $d = RoundRecord::query()->create([
    //     'stop_id' => $b->id,
    //     'user_id' => $c->id,
    //     'date_time' => fake()->dateTime(),
    //     'photo' => 'null',
    //     'observation' => fake()->text(),
    // ]);

    dd($a);
});


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
