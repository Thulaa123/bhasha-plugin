<?php 

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

// Models
use Bhasha\Xinstitute\Models\Student;
use Bhasha\Xinstitute\Models\Course;

// Students APIs
Route::prefix('api/bhasha/v1/students')->group(function () {
    Route::get('/get-all', function (Request $request) {
        return Student::all();
    });
});

// Courses APIs
Route::prefix('api/bhasha/v1/courses')->group(function () {
    Route::get('/get-all', function (Request $request) {
        return Course::all();
    });
});