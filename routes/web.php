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
Route::get('authenticated', 'OAuthController@login')->name('login');
Route::get('/', 'LandingController')->name('landing');

//TODO: Change the link location to api/download_file
Route::get('download_file/{file}', 'MediaController@downloadFile');
Route::get('api/download_file/{file}', 'MediaController@downloadFile');
Route::post('api/store_file', 'MediaController@store');

/*
|--------------------------------------------------------------------------
| STAFF
|--------------------------------------------------------------------------
*/
Route::get('employee/lookup', 'EmployeeController@lookup');

/*
|--------------------------------------------------------------------------
| PARENTS
|--------------------------------------------------------------------------
*/
//Route::get('parent/lookup', 'ParentController@lookup');

/*
|--------------------------------------------------------------------------
| STUDENTS
|--------------------------------------------------------------------------
*/
//Route::get('student/lookup', 'StudentController@lookup');

/*
|--------------------------------------------------------------------------
| ADDRESS
|--------------------------------------------------------------------------
*/
//Profile Edit

//Profile Destroy
Route::get('address/{address}/profile/delete', 'AddressController@profileDestroy');

/*
|--------------------------------------------------------------------------
| PHONE
|--------------------------------------------------------------------------
*/
//Profile Destroy
Route::get('phone/{phone}/profile/delete', 'PhoneController@profileDestroy');

/*
|--------------------------------------------------------------------------
| PASSPORT
|--------------------------------------------------------------------------
*/
Route::get('passport/{passport}/cancel', 'PassportController@cancel');
Route::get('passport/{passport}/delete', 'PassportController@delete');

/*
|--------------------------------------------------------------------------
| VISA
|--------------------------------------------------------------------------
*/
Route::get('visa/{visa}/cancel', 'VisaController@cancel');
Route::get('visa/{visa}/delete', 'VisaController@delete');

/*
|--------------------------------------------------------------------------
| ID CARDS
|--------------------------------------------------------------------------
*/
Route::get('id_card/{id_card}/cancel', 'IdCardController@cancel');
Route::get('id_card/{id_card}/delete', 'IdCardController@delete');

/*
|--------------------------------------------------------------------------
| ADDRESS
|--------------------------------------------------------------------------
*/
Route::get('address/{address}/delete', 'AddressController@delete');

/*
|--------------------------------------------------------------------------
| EMPLOYEE
|--------------------------------------------------------------------------
*/
//Overview
Route::get('employee/{employee}/profile', 'EmployeeProfileController@profile');
Route::patch('employee/{employee}/profile', 'EmployeeProfileController@updateProfile');
Route::post('employee/{employee}/profile', 'EmployeeProfileController@updateProfile');

//Contact Information
Route::get('employee/{employee}/contact', 'EmployeeContactController@contact');
Route::post('employee/{employee}/profile/store_phone', 'EmployeeContactController@storePhone');
Route::post('employee/{employee}/profile/store_address', 'EmployeeContactController@storeAddress');
Route::patch('employee/{employee}/profile/store_email', 'EmployeeContactController@storeEmail');
Route::patch('employee/{employee}/address/{address}/update_address', 'EmployeeContactController@updateAddress');

//Passports and Visas
Route::get('employee/{employee}/passports_visas', 'EmployeePassportVisaController@passportVisa');
Route::get('employee/{employee}/create_passport', 'EmployeePassportVisaController@createPassport');
Route::post('employee/{employee}/create_passport', 'EmployeePassportVisaController@storePassport');
Route::post('employee/{employee}/passport/{passport}/create_visa', 'EmployeePassportVisaController@storeVisa');
Route::patch('employee/{employee}/visa/{visa}/update_visa', 'EmployeePassportVisaController@updateVisa');
Route::patch('employee/{employee}/passport/{passport}/update_passport', 'EmployeePassportVisaController@updatePassport');
Route::get('employee/{employee}/passport/{passport}/update_passport', 'EmployeePassportVisaController@updatePassportForm');

//ID Cards
Route::get('employee/{employee}/id_card', 'EmployeeIdCardController@idCard');
Route::get('employee/{employee}/create_id_card', 'EmployeeIdCardController@createForm');
Route::post('employee/{employee}/create_id_card', 'EmployeeIdCardController@store');
Route::get('employee/{employee}/id_card/{id_card}/update_id_card', 'EmployeeIdCardController@editForm');
Route::patch('employee/{employee}/id_card/{id_card}/update_id_card', 'EmployeeIdCardController@update');

//Official Documents
Route::get('employee/{employee}/official_documents', 'EmployeeOfficialDocumentsController@officialDocuments');
Route::post('employee/{employee}/official_documents', 'EmployeeOfficialDocumentsController@store');
Route::post('employee/{employee}/official_documents', 'EmployeeOfficialDocumentsController@store');
Route::get('employee/{employee}/official_documents/{document}/delete', 'EmployeeOfficialDocumentsController@delete');

//Employment Details
Route::get('employee/{employee}/employment_overview', 'EmployeePositionController@employmentOverview');
Route::post('employee/{employee}/employment_overview', 'EmployeePositionController@storeOverview');
Route::get('employee/{employee}/position/{position}/add', 'EmployeePositionController@addPosition');
Route::get('employee/{employee}/position/{position}/remove', 'EmployeePositionController@removePosition');
Route::get('employee/{employee}/position/view_details', 'EmployeePositionController@viewPositions');

/*
|--------------------------------------------------------------------------
| PERSON
|--------------------------------------------------------------------------
*/
//Create
Route::get('person/create', 'PersonController@create');
Route::post('person/create', 'PersonController@store');
//Edit
Route::get('person/{file}/edit', 'PersonController@edit');
Route::patch('person/{file}', 'PersonController@update');
//Delete
Route::get('person/{file}/delete', 'PersonController@destroy');
//View
Route::get('person/{file}', 'PersonController@show');
//Index
Route::get('person', 'PersonController@index');

/*
|--------------------------------------------------------------------------
| EMPLOYEE POSITIONS
|--------------------------------------------------------------------------
*/
//API
Route::get('api/position/ajaxshowposition', 'PositionAjaxController@ajaxShow');
//Overview
Route::get('position/summary', 'PositionController@summary');
Route::get('position/index', 'PositionController@index');
Route::get('position/archived', 'PositionController@archived');
//New
Route::get('position/create', 'PositionController@create');
Route::post('position/create', 'PositionController@store');
//View
Route::get('position/{position}', 'PositionController@view');
//Update
Route::patch('position/{position}/edit', 'PositionController@update');
Route::get('position/{position}/edit', 'PositionController@updateForm');
Route::get('position/{position}/archive', 'PositionController@archive');

/*
|--------------------------------------------------------------------------
| SCHOOL YEAR
|--------------------------------------------------------------------------
*/
Route::get('year/index', 'YearController@index');
Route::get('api/year/ajaxshowyear', 'YearAjaxController@ajaxShow');
Route::post('api/year/ajaxstoreyear', 'YearAjaxController@ajaxStore');

/*
|--------------------------------------------------------------------------
| GRADE LEVELS
|--------------------------------------------------------------------------
*/
Route::get('grade_level/index', 'GradeLevelController@index');
Route::get('api/grade_level/ajaxshowgrade_level', 'GradeLevelAjaxController@ajaxShow');
Route::post('api/grade_level/ajaxstoregrade_level', 'GradeLevelAjaxController@ajaxStore');

/*
|--------------------------------------------------------------------------
| DEPARTMENTS
|--------------------------------------------------------------------------
*/
Route::get('department/index', 'DepartmentController@index');
Route::get('api/department/ajaxshowdepartment', 'DepartmentAjaxController@ajaxShow');
Route::post('api/department/ajaxstoredepartment', 'DepartmentAjaxController@ajaxStore');

/*
|--------------------------------------------------------------------------
| ROOMS
|--------------------------------------------------------------------------
*/
Route::get('room/index', 'RoomController@index');
Route::get('api/room/ajaxshowroom', 'RoomAjaxController@ajaxShow');
Route::post('api/room/ajaxstoreroom', 'RoomAjaxController@ajaxStore');

/*
|--------------------------------------------------------------------------
| BUILDINGS
|--------------------------------------------------------------------------
*/
Route::get('building/index', 'BuildingController@index');
Route::get('api/building/ajaxshowbuilding', 'BuildingAjaxController@ajaxShow');
Route::post('api/building/ajaxstorebuilding', 'BuildingAjaxController@ajaxStore');

/*
|--------------------------------------------------------------------------
| ROOM TYPES
|--------------------------------------------------------------------------
*/
Route::get('room_type/index', 'RoomTypeController@index');
Route::get('api/room_type/ajaxshowroom_type', 'RoomTypeAjaxController@ajaxShow');
Route::post('api/room_type/ajaxstoreroom_type', 'RoomTypeAjaxController@ajaxStore');


/*
|--------------------------------------------------------------------------
| GRADE SCALES
|--------------------------------------------------------------------------
*/
Route::get('api/grade_scale/ajaxshowgrade_scale', 'GradeScaleAjaxController@ajaxShow');
Route::get('grade_scale/index', 'GradeScaleController@index');
Route::post('grade_scale/index', 'GradeScaleController@store');
Route::get('grade_scale/{grade_scale}', 'GradeScaleController@show');
Route::patch('grade_scale/{grade_scale}', 'GradeScaleController@update');
Route::get('grade_scale/{grade_scale}/delete', 'GradeScaleController@delete');
Route::get('api/grade_scale/{grade_scale}/percentage/ajaxshowitem', 'GradeScalePercentageAjaxController@ajaxShow');
Route::get('api/grade_scale/{grade_scale}/standards/ajaxshowitem', 'GradeScaleStandardsAjaxController@ajaxShow');
Route::post('api/grade_scale/{grade_scale}/percentage/ajaxstoreitem', 'GradeScalePercentageAjaxController@ajaxStore');
Route::post('api/grade_scale/{grade_scale}/standards/ajaxstoreitem', 'GradeScaleStandardsAjaxController@ajaxStore');

/*
|--------------------------------------------------------------------------
| COURSES
|--------------------------------------------------------------------------
*/
Route::get('course/index', 'CourseController@index');
Route::post('course/index', 'CourseController@store');
Route::get('course/{course}', 'CourseController@show');
Route::patch('course/{course}', 'CourseController@storeUpdateShow');
Route::get('course/{course}/audits', 'CourseController@showAudits');
Route::get('course/{course}/edit', 'CourseController@update');
Route::patch('course/{course}/edit', 'CourseController@storeUpdate');

Route::post('course/{course}/report_card_options', 'CourseController@storeCourseDisplayOptions');
Route::patch('course/{course}/transcript_options', 'CourseController@storeTranscriptOptions');
Route::patch('course/{course}/scheduling_options', 'CourseController@storeSchedulingOptions');
Route::patch('course/{course}/required_materials', 'CourseController@storeRequiredMaterials');

Route::post('api/course/ajaxstorecourse', 'CourseAjaxController@ajaxStore');
Route::get('api/course/ajaxshowcourse', 'CourseAjaxController@ajaxShow');

Route::post('api/course/{course}/ajaxstoreprerequisite', 'CoursePrerequisiteAjaxController@ajaxStore');
Route::get('api/course/{course}/ajaxshowprerequisite', 'CoursePrerequisiteAjaxController@ajaxShow');

Route::post('api/course/{course}/ajaxstorecorequisite', 'CourseCorequisiteAjaxController@ajaxStore');
Route::get('api/course/{course}/ajaxshowcorequisite', 'CourseCorequisiteAjaxController@ajaxShow');

Route::post('api/course/{course}/ajaxstoreequivalent', 'CourseEquivalentAjaxController@ajaxStore');
Route::get('api/course/{course}/ajaxshowequivalent', 'CourseEquivalentAjaxController@ajaxShow');

