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
//Diva
Route::post('Academics/store_learning', 'Academics\AcademicController@store_learning')->name('academics.store_learning');


//Supporting Documents

Route::get('admission/documents', 'Admission@documents')->name('admission.documents');
Route::get('admission/create_documents', 'Admission@create_documents')->name('admission.create_documents');
Route::post('admission/destroy_documents', 'Admission@destroy_documents')->name('admission.destroy_documents');
Route::post('admission/store_documents', 'Admission@store_documents')->name('admission.store_documents');
Route::get('admission/edit_documents', 'Admission@edit_documents')->name('admission.edit_documents');
Route::post('admission/update_documents', 'Admission@update_documents')->name('admission.update_documents');


//Online Application

Route::get('admission/online_application', 'Admission@online_application')->name('admission.online_application');
Route::get('admission/create_online_application', 'Admission@create_online_application')->name('admission.create_online_application');
Route::post('admission/destroy_online_application', 'Admission@destroy_online_application')->name('admission.destroy_online_application');
Route::post('admission/store_online_application', 'Admission@store_online_application')->name('admission.store_online_application');
Route::get('admission/edit_online_application', 'Admission@edit_online_application')->name('admission.edit_online_application');
Route::post('admission/update_online_application', 'Admission@update_online_application')->name('admission.update_online_application');

//Hostel

Route::get('admission/hostel', 'Admission@hostel')->name('admission.hostel');
Route::get('admission/create_hostel', 'Admission@create_hostel')->name('admission.create_hostel');
Route::post('admission/destroy_hostel', 'Admission@destroy_hostel')->name('admission.destroy_hostel');
Route::post('admission/store_hostel', 'Admission@store_hostel')->name('admission.store_hostel');
Route::get('admission/edit_hostel', 'Admission@edit_hostel')->name('admission.edit_hostel');
Route::post('admission/update_hostel', 'Admission@update_hostel')->name('admission.update_hostel');

//Curriculum

Route::get('admission/curriculum', 'Admission@curriculum')->name('admission.curriculum');
Route::get('admission/create_curriculum', 'Admission@create_curriculum')->name('admission.create_curriculum');
Route::post('admission/destroy_curriculum', 'Admission@destroy_curriculum')->name('admission.destroy_curriculum');
Route::post('admission/store_curriculum', 'Admission@store_curriculum')->name('admission.store_curriculum');
Route::get('admission/edit_curriculum', 'Admission@edit_curriculum')->name('admission.edit_curriculum');
Route::post('admission/update_curriculum', 'Admission@update_curriculum')->name('admission.update_curriculum');


// Fee Structure

Route::get('admission/fee', 'Admission@fee')->name('admission.fee');
Route::get('admission/create_fee', 'Admission@create_fee')->name('admission.create_fee');
Route::post('admission/destroy_fee', 'Admission@destroy_fee')->name('admission.destroy_fee');
Route::post('admission/store_fee', 'Admission@store_fee')->name('admission.store_fee');
Route::get('admission/edit_fee', 'Admission@edit_fee')->name('admission.edit_fee');
Route::post('admission/update_fee', 'Admission@update_fee')->name('admission.update_fee');

// Brochure

Route::get('admission/brochure', 'Admission@brochure')->name('admission.brochure');
Route::get('admission/create_brochure', 'Admission@create_brochure')->name('admission.create_brochure');
Route::post('admission/destroy_brochure', 'Admission@destroy_brochure')->name('admission.destroy_brochure');
Route::post('admission/store_brochure', 'Admission@store_brochure')->name('admission.store_brochure');
Route::get('admission/edit_brochure', 'Admission@edit_brochure')->name('admission.edit_brochure');
Route::post('admission/update_brochure', 'Admission@update_brochure')->name('admission.update_brochure');

//Event Gallery

Route::get('events/gallery', 'Events@gallery')->name('events.gallery');
Route::get('events/create_gallery', 'Events@create_gallery')->name('events.create_gallery');
Route::post('events/destroy_gallery', 'Events@destroy_gallery')->name('events.destroy_gallery');
Route::post('events/store_gallery', 'Events@store_gallery')->name('events.store_gallery');
Route::get('events/edit_gallery', 'Events@edit_gallery')->name('events.edit_gallery');
Route::post('events/update_gallery', 'Events@update_gallery')->name('events.update_gallery');

//Campus

Route::get('life_jim/campus', 'Life_jim@campus')->name('life_jim.campus');
Route::get('life_jim/create_campus', 'Life_jim@create_campus')->name('life_jim.create_campus');
Route::post('life_jim/destroy_campus', 'Life_jim@destroy_campus')->name('life_jim.destroy_campus');
Route::post('life_jim/store_campus', 'Life_jim@store_campus')->name('life_jim.store_campus');
Route::get('life_jim/edit_campus', 'Life_jim@edit_campus')->name('life_jim.edit_campus');
Route::post('life_jim/update_campus', 'Life_jim@update_campus')->name('life_jim.update_campus');

//Computer Lab


Route::get('life_jim/computer_lab', 'Life_jim@computer_lab')->name('life_jim.computer_lab');
Route::get('life_jim/create_computer_lab', 'Life_jim@create_computer_lab')->name('life_jim.create_computer_lab');
Route::post('life_jim/destroy_computer_lab', 'Life_jim@destroy_computer_lab')->name('life_jim.destroy_computer_lab');
Route::post('life_jim/store_computer_lab', 'Life_jim@store_computer_lab')->name('life_jim.store_computer_lab');
Route::get('life_jim/edit_computer_lab', 'Life_jim@edit_computer_lab')->name('life_jim.edit_computer_lab');
Route::post('life_jim/update_computer_lab', 'Life_jim@update_computer_lab')->name('life_jim.update_computer_lab');

//library

Route::get('life_jim/library', 'Life_jim@library')->name('life_jim.library');
Route::get('life_jim/create_library', 'Life_jim@create_library')->name('life_jim.create_library');
Route::post('life_jim/destroy_library', 'Life_jim@destroy_library')->name('life_jim.destroy_library');
Route::post('life_jim/store_library', 'Life_jim@store_library')->name('life_jim.store_library');
Route::get('life_jim/edit_library', 'Life_jim@edit_library')->name('life_jim.edit_library');
Route::post('life_jim/update_library', 'Life_jim@update_library')->name('life_jim.update_library');

// Auditorium
Route::get('life_jim/auditorium', 'Life_jim@auditorium')->name('life_jim.auditorium');
Route::get('life_jim/create_auditorium', 'Life_jim@create_auditorium')->name('life_jim.create_auditorium');
Route::post('life_jim/destroy_auditorium', 'Life_jim@destroy_auditorium')->name('life_jim.destroy_auditorium');
Route::post('life_jim/store_auditorium', 'Life_jim@store_auditorium')->name('life_jim.store_auditorium');
Route::get('life_jim/edit_auditorium', 'Life_jim@edit_auditorium')->name('life_jim.edit_auditorium');
Route::post('life_jim/update_auditorium', 'Life_jim@update_auditorium')->name('life_jim.update_auditorium');

//Board Room

Route::get('life_jim/board_room', 'Life_jim@board_room')->name('life_jim.board_room');
Route::get('life_jim/create_board_room', 'Life_jim@create_board_room')->name('life_jim.create_board_room');
Route::post('life_jim/destroy_board_room', 'Life_jim@destroy_board_room')->name('life_jim.destroy_board_room');
Route::post('life_jim/store_board_room', 'Life_jim@store_board_room')->name('life_jim.store_board_room');
Route::get('life_jim/edit_board_room', 'Life_jim@edit_board_room')->name('life_jim.edit_board_room');
Route::post('life_jim/update_board_room', 'Life_jim@update_board_room')->name('life_jim.update_board_room');

//hostels

Route::get('life_jim/hostels', 'Life_jim@hostels')->name('life_jim.hostels');
Route::get('life_jim/create_hostels', 'Life_jim@create_hostels')->name('life_jim.create_hostels');
Route::post('life_jim/destroy_hostels', 'Life_jim@destroy_hostels')->name('life_jim.destroy_hostels');
Route::post('life_jim/store_hostels', 'Life_jim@store_hostels')->name('life_jim.store_hostels');
Route::get('life_jim/edit_hostels', 'Life_jim@edit_hostels')->name('life_jim.edit_hostels');
Route::post('life_jim/update_hostels', 'Life_jim@update_hostels')->name('life_jim.update_hostels');

//wifi

Route::get('life_jim/wifi', 'Life_jim@wifi')->name('life_jim.wifi');
Route::get('life_jim/create_wifi', 'Life_jim@create_wifi')->name('life_jim.create_wifi');
Route::post('life_jim/destroy_wifi', 'Life_jim@destroy_wifi')->name('life_jim.destroy_wifi');
Route::post('life_jim/store_wifi', 'Life_jim@store_wifi')->name('life_jim.store_wifi');
Route::get('life_jim/edit_wifi', 'Life_jim@edit_wifi')->name('life_jim.edit_wifi');
Route::post('life_jim/update_wifi', 'Life_jim@update_wifi')->name('life_jim.update_wifi');

//student

Route::get('life_jim/student', 'Life_jim@student')->name('life_jim.student');
Route::get('life_jim/create_student', 'Life_jim@create_student')->name('life_jim.create_student');
Route::post('life_jim/destroy_student', 'Life_jim@destroy_student')->name('life_jim.destroy_student');
Route::post('life_jim/store_student', 'Life_jim@store_student')->name('life_jim.store_student');
Route::get('life_jim/edit_student', 'Life_jim@edit_student')->name('life_jim.edit_student');
Route::post('life_jim/update_student', 'Life_jim@update_student')->name('life_jim.update_student');

//research

Route::get('life_jim/research', 'Life_jim@research')->name('life_jim.research');
Route::get('life_jim/create_research', 'Life_jim@create_research')->name('life_jim.create_research');
Route::post('life_jim/destroy_research', 'Life_jim@destroy_research')->name('life_jim.destroy_research');
Route::post('life_jim/store_research', 'Life_jim@store_research')->name('life_jim.store_research');
Route::get('life_jim/edit_research', 'Life_jim@edit_research')->name('life_jim.edit_research');
Route::post('life_jim/update_research', 'Life_jim@update_research')->name('life_jim.update_research');

//Guest Speaker

Route::get('guest_speaker/guest_speaker', 'Guest_speaker@guest_speaker')->name('guest_speaker.guest_speaker');
Route::get('guest_speaker/create_guest_speaker', 'Guest_speaker@create_guest_speaker')->name('guest_speaker.create_guest_speaker');
Route::post('guest_speaker/destroy_guest_speaker', 'Guest_speaker@destroy_guest_speaker')->name('guest_speaker.destroy_guest_speaker');
Route::post('guest_speaker/store_guest_speaker', 'Guest_speaker@store_guest_speaker')->name('guest_speaker.store_guest_speaker');
Route::get('guest_speaker/edit_guest_speaker', 'Guest_speaker@edit_guest_speaker')->name('guest_speaker.edit_guest_speaker');
Route::post('guest_speaker/update_guest_speaker', 'Guest_speaker@update_guest_speaker')->name('guest_speaker.update_guest_speaker');
//Recruiters
Route::get('recruiters/index', 'Recruiters@index')->name('recruiters.index');
Route::get('recruiters/create_recruiters', 'Recruiters@create_recruiters')->name('recruiters.create_recruiters');
Route::post('recruiters/destroy_recruiters', 'Recruiters@destroy_recruiters')->name('recruiters.destroy_recruiters');
Route::post('recruiters/store_recruiters', 'Recruiters@store_recruiters')->name('recruiters.store_recruiters');
Route::get('recruiters/edit_recruiters', 'Recruiters@edit_recruiters')->name('recruiters.edit_recruiters');
Route::post('recruiters/update_recruiters', 'Recruiters@update_recruiters')->name('recruiters.update_recruiters');
//Director Message
Route::get('director/index', 'Director@index')->name('director.index');
Route::get('director/create_director', 'Director@create_director')->name('director.create_director');
Route::post('director/destroy_director', 'Director@destroy_director')->name('director.destroy_director');
Route::post('director/store_director', 'Director@store_director')->name('director.store_director');
Route::get('director/edit_director', 'Director@edit_director')->name('director.edit_director');
Route::post('director/update_director', 'Director@update_director')->name('director.update_director');