<?php

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

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
// Route::get('/system-management/{option}', 'SystemMgmtController@index');
Route::get('/profile', 'ProfileController@index');

Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('user-management', 'UserManagementController');

Route::resource('employee-management', 'EmployeeManagementController');
Route::post('employee-management/search', 'EmployeeManagementController@search')->name('employee-management.search');

Route::resource('system-management/department', 'DepartmentController');
Route::post('system-management/department/search', 'DepartmentController@search')->name('department.search');

Route::resource('system-management/division', 'DivisionController');
Route::post('system-management/division/search', 'DivisionController@search')->name('division.search');

Route::resource('system-management/country', 'CountryController');
Route::post('system-management/country/search', 'CountryController@search')->name('country.search');

Route::resource('system-management/state', 'StateController');
Route::post('system-management/state/search', 'StateController@search')->name('state.search');

Route::resource('system-management/city', 'CityController');
Route::post('system-management/city/search', 'CityController@search')->name('city.search');

Route::get('system-management/report', 'ReportController@index');
Route::post('system-management/report/search', 'ReportController@search')->name('report.search');
Route::post('system-management/report/excel', 'ReportController@exportExcel')->name('report.excel');
Route::post('system-management/report/pdf', 'ReportController@exportPDF')->name('report.pdf');
Route::get('avatars/{name}', 'EmployeeManagementController@load');
// Main Slider//
Route::get('home-page/main_slider', 'HomeController@main_slider')->name('home-page.main_slider');
Route::get('home-page/create_slider', 'HomeController@create_slider')->name('home-page.create_slider');
Route::post('home-page/destroy_slider', 'HomeController@destroy_slider')->name('home-page.destroy_slider');
Route::post('home-page/store', 'HomeController@store')->name('home-page.store');
Route::get('home-page/edit_slider', 'HomeController@edit_slider')->name('home-page.edit_slider');
Route::post('home-page/update_slider', 'HomeController@update_slider')->name('home-page.update_slider');

// In Focus//
Route::get('home-page/in_focus', 'HomeController@in_focus')->name('home-page.in_focus');
Route::get('home-page/create_infocus', 'HomeController@create_infocus')->name('home-page.create_infocus');
Route::post('home-page/store_infocus', 'HomeController@store_infocus')->name('home-page.store_infocus');
Route::post('home-page/destroy_infocus', 'HomeController@destroy_infocus')->name('home-page.destroy_infocus');
Route::get('home-page/edit_infocus', 'HomeController@edit_infocus')->name('home-page.edit_infocus');
Route::post('home-page/update_infocus', 'HomeController@update_infocus')->name('home-page.update_infocus');

// Events //
Route::get('home-page/events', 'HomeController@events')->name('home-page.events');
Route::get('home-page/create_events', 'HomeController@create_events')->name('home-page.create_events');
Route::post('home-page/store_events', 'HomeController@store_events')->name('home-page.store_events');
Route::post('home-page/destroy_events', 'HomeController@destroy_events')->name('home-page.destroy_events');
Route::get('home-page/edit_events', 'HomeController@edit_events')->name('home-page.edit_events');
Route::post('home-page/update_events', 'HomeController@update_events')->name('home-page.update_events');

// Testimonials//

Route::get('home-page/testimonial', 'HomeController@testimonial')->name('home-page.testimonial');
Route::get('home-page/create_testimonial', 'HomeController@create_testimonial')->name('home-page.create_testimonial');
Route::post('home-page/store_testimonial', 'HomeController@store_testimonial')->name('home-page.store_testimonial');
Route::post('home-page/destroy_testimonial', 'HomeController@destroy_testimonial')->name('home-page.destroy_testimonial');
Route::get('home-page/edit_testimonial', 'HomeController@edit_testimonial')->name('home-page.edit_testimonial');
Route::post('home-page/update_testimonial', 'HomeController@update_testimonial')->name('home-page.update_testimonial');

//Settings//

Route::get('/settings', 'Settings@index')->name('settings.index');
Route::post('settings/store', 'Settings@store')->name('settings.store');


//Academics

Route::get('academics/syllabus', 'Academics@syllabus')->name('academics.syllabus');
Route::get('academics/create_syllabus', 'Academics@create_syllabus')->name('academics.create_syllabus');
 Route::post('academics/destroy_syllabus', 'Academics@destroy_syllabus')->name('academics.destroy_syllabus');
Route::post('academics/store_syllabus', 'Academics@store_syllabus')->name('academics.store_syllabus');
Route::get('academics/edit_syllabus', 'Academics@edit_syllabus')->name('academics.edit_syllabus');
Route::post('academics/update_syllabus', 'Academics@update_syllabus')->name('academics.update_syllabus');

//Course Allotment

Route::get('academics/course_allotment', 'Academics@course_allotment')->name('academics.course_allotment');
Route::get('academics/create_course_allotment', 'Academics@create_course_allotment')->name('academics.create_course_allotment');
 Route::post('academics/destroy_course_allotment', 'Academics@destroy_course_allotment')->name('academics.destroy_course_allotment');
Route::post('academics/store_course_allotment', 'Academics@store_course_allotment')->name('academics.store_course_allotment');
Route::get('academics/edit_course_allotment', 'Academics@edit_course_allotment')->name('academics.edit_course_allotment');
Route::post('academics/update_course_allotment', 'Academics@update_course_allotment')->name('academics.update_course_allotment');

//Faculty

Route::get('academics/faculty', 'Academics@faculty')->name('academics.faculty');
Route::get('academics/create_faculty', 'Academics@create_faculty')->name('academics.create_faculty');
Route::post('academics/destroy_faculty', 'Academics@destroy_faculty')->name('academics.destroy_faculty');
Route::post('academics/store_faculty', 'Academics@store_faculty')->name('academics.store_faculty');
Route::get('academics/edit_faculty', 'Academics@edit_faculty')->name('academics.edit_faculty');
Route::post('academics/update_faculty', 'Academics@update_faculty')->name('academics.update_faculty');

// Admission

Route::get('admission/eligiblity', 'Admission@eligiblity')->name('admission.eligiblity');
Route::get('admission/create_eligiblity', 'Admission@create_eligiblity')->name('admission.create_eligiblity');
Route::post('admission/destroy_eligiblity', 'Admission@destroy_eligiblity')->name('admission.destroy_eligiblity');
Route::post('admission/store_eligiblity', 'Admission@store_eligiblity')->name('admission.store_eligiblity');
Route::get('admission/edit_eligiblity', 'Admission@edit_eligiblity')->name('admission.edit_eligiblity');
Route::post('admission/update_eligiblity', 'Admission@update_eligiblity')->name('admission.update_eligiblity');


//Enterence Test

Route::get('admission/enterance_test', 'Admission@enterance_test')->name('admission.enterance_test');
Route::get('admission/create_enterance_test', 'Admission@create_enterance_test')->name('admission.create_enterance_test');
Route::post('admission/destroy_enterance_test', 'Admission@destroy_enterance_test')->name('admission.destroy_enterance_test');
Route::post('admission/store_enterance_test', 'Admission@store_enterance_test')->name('admission.store_enterance_test');
Route::get('admission/edit_enterance_test', 'Admission@edit_enterance_test')->name('admission.edit_enterance_test');
Route::post('admission/update_enterance_test', 'Admission@update_enterance_test')->name('admission.update_enterance_test');


//Selection Criteria

Route::get('admission/criteria', 'Admission@criteria')->name('admission.criteria');
Route::get('admission/create_criteria', 'Admission@create_criteria')->name('admission.create_criteria');
Route::post('admission/destroy_criteria', 'Admission@destroy_criteria')->name('admission.destroy_criteria');
Route::post('admission/store_criteria', 'Admission@store_criteria')->name('admission.store_criteria');
Route::get('admission/edit_criteria', 'Admission@edit_criteria')->name('admission.edit_criteria');
Route::post('admission/update_criteria', 'Admission@update_criteria')->name('admission.update_criteria');


//Short Listing 


Route::get('admission/shortlisting', 'Admission@shortlisting')->name('admission.shortlisting');
Route::get('admission/create_shortlisting', 'Admission@create_shortlisting')->name('admission.create_shortlisting');
Route::post('admission/destroy_shortlisting', 'Admission@destroy_shortlisting')->name('admission.destroy_shortlisting');
Route::post('admission/store_shortlisting', 'Admission@store_shortlisting')->name('admission.store_shortlisting');
Route::get('admission/edit_shortlisting', 'Admission@edit_shortlisting')->name('admission.edit_shortlisting');
Route::post('admission/update_shortlisting', 'Admission@update_shortlisting')->name('admission.update_shortlisting');

//Academics BY DHANa

Route::get('Academics/MBADetails', 'Academics\AcademicController@MBADetail');
Route::get('Academics/phdDetails', 'Academics\AcademicController@PHDDetail');
Route::get('Academics/researchDetails', 'Academics\AcademicController@ResearchDetail');
Route::get('Academics/learningDetails', 'Academics\AcademicController@LearningDetail');