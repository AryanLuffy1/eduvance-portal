<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssignmentController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('assignments.index');
});

Route::resource('assignments', AssignmentController::class);

Route::get('/labs/{id}', function ($id) {
    if (view()->exists("labs.lab{$id}")) {
        return view("labs.lab{$id}");
    }
    abort(404);
})->name('labs.show');

Route::post('/labs/9', function (Request $request) {
    // Basic handler for lab 9 form post
    return redirect()->back()->with('success', 'Form submitted successfully via Laravel routing!');
});
