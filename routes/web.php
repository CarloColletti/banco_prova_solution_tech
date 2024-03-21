<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use App\Models\User;
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

Route::get('/hola', function () {
    return view('welcome');
});

Route::get('/', [Home::class, 'home'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/{user}', function (User $user) {
        if ($user->id === auth()->user()->id) {
            return abort(403);
        }

        $user->delete();

        return redirect()->route('home');
    })->name('user.destroy');

    Route::get(
        '/user/{user}',
        function (User $user) {
            // dd($user);
            return view('editdue', compact('user'));
        }
    )->name('user.edit');


    Route::put('/user/{user}', function (Request $request, User $user) {
        $form_data = $request->all();

        // $this->validation($form_data);

        $user->update($form_data);

        // dd($user);
        $user->save();

        return redirect()->route('home');
    })->name('user.update');
});

require __DIR__ . '/auth.php';
