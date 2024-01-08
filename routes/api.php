<?php

use App\Models\JobPost;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\get;
use function Pest\Laravel\json;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function (Request $request) {
    $posts = JobPost::all();
    return response()->json($posts);
})
    ->name('home');


// route model Binding
Route::get('/jobs/{post}', function (JobPost $post) {
    logger($post);

    return response()->json($post);
})
    ->name('home')
    ->missing(fn () => response()->json([], 404));


Route::get('/users', function (User $user) {
    return response()->json($user->all());
})
    ->name('users');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
