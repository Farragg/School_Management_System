<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Questions\QuestionController;
use App\Http\Controllers\Quizzes\QuizzController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Students\AttendanceController;
use App\Http\Controllers\Students\FeesController;
use App\Http\Controllers\Students\FeesInvoicesConttroller;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\Students\LibraryController;
use App\Http\Controllers\Students\OnlineClassController;
use App\Http\Controllers\Students\PaymentController;
use App\Http\Controllers\Students\ProcessingFeeController;
use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\Students\ReceiptStudentsConttroller;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Subjects\SubjectController;
use App\Http\Controllers\Teachers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Auth::routes();

//Route::group(['middleware'=> ['guest']], function (){
//    Route::get('/', function(){
//        return view('auth.login');
//    });
//});
Route::get('/', [HomeController::class, 'index'])->name('selection');

Route::group(['namespace' => 'Auth'], function () {

    Route::get('/login/{type}',[LoginController::class, 'loginForm'])->middleware('guest')->name('login.show');

    Route::post('/login',[LoginController::class, 'login'])->name('login');

    Route::get('/logout/{type}',[LoginController::class, 'logout'])->name('logout');



});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function(){

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::resource('Grades', GradeController::class);

    //==============================Classrooms============================
    Route::resource('Classrooms', ClassroomController::class);

    Route::post('delete_all', [ClassroomController::class, 'delete_all'])->name('delete_all');
    Route::post('Filter_Classes', [ClassroomController::class, 'Filter_Classes'])->name('Filter_Classes');

    //==============================Sections============================
    Route::resource('Sections', SectionController::class);

    Route::get('/classes/{id}', [SectionController::class, 'getclasses']);

    //==============================Livewire Parents============================
    Route::view('add_parent','livewire.show_Form')->name('add_parent');
    //==============================Livewire Teachers============================
    Route::resource('Teachers', TeacherController::class);
    //==============================Students============================
    Route::group([], function (){
        Route::resource('Students', StudentController::class);
        Route::resource('Promotion', PromotionController::class);
        Route::resource('Graduated', GraduatedController::class);
        Route::resource('Fees', FeesController::class);
        Route::resource('Fees_Invoices', FeesInvoicesConttroller::class);
        Route::resource('receipt_students', ReceiptStudentsConttroller::class);
        Route::resource('ProcessingFee', ProcessingFeeController::class);
        Route::resource('Payment_students', PaymentController::class);
        Route::resource('Attendance', AttendanceController::class);
        Route::resource('online_classes', OnlineClassController::class);
        Route::resource('library', LibraryController::class);
        Route::get('download_file/{filename}', [LibraryController::class, 'downloadAttachment'])->name('downloadAttachment');
        Route::get('indirect_admin', [OnlineClassController::class,'indirectCreate'])->name('indirect.create.admin');
        Route::post('indirect_admin', [OnlineClassController::class,'storeIndirect'])->name('indirect.store.admin');
        Route::post('Upload_attachment', [StudentController::class,'Upload_attachment'])->name('Upload_attachment');
        Route::get('Download_attachment/{studentsname}/{filename}', [StudentController::class,'Download_attachment'])->name('Download_attachment');
        Route::post('Delete_attachment', [StudentController::class,'Delete_attachment'])->name('Delete_attachment');

    });

    //==============================Subjects============================
    Route::resource('subjects', SubjectController::class);
    //==============================Quizzes============================
    Route::resource('quizzes', QuizzController::class);
    //==============================Questions============================
    Route::resource('questions', QuestionController::class);
    //==============================Settings============================
    Route::resource('settings', SettingController::class);


});

//Route::view('add_parent','livewire.show_Form');

