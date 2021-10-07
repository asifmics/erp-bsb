<?php
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('dashboard', 'DashboardController@index')->name('');

Route::get('dashboard/user', 'UserController@index')->name('')->middleware('can:all_user');
Route::get('dashboard/user/add', 'UserController@add')->name('')->middleware('can:insert_user');
Route::get('dashboard/user/view/{id}', 'UserController@view')->name('user.view')->middleware('can:view_user');
Route::post('dashboard/user/infoupdate', 'UserController@infoupdate')->name('user.infoupdate')->middleware('can:view_user');
Route::post('dashboard/user/passupdate', 'UserController@passupdate')->name('user.passupdate')->middleware('can:view_user');
Route::post('dashboard/user/pictureupdate', 'UserController@pictureupdate')->name('user.pictureupdate')->middleware('can:view_user');
Route::get('dashboard/user/delete/{id}', 'UserController@softdelete')->name('user.softdelete')->middleware('can:view_user');
Route::post('dashboard/user/submit', 'UserController@submit')->name('user.submit');

Route::prefix('dashboard/student/status')->group(function () {
    Route::get('/create', 'StudentStatusController@create')->name('add_student_status');
    Route::post('/create', 'StudentStatusController@store')->name('save_student_status');
    Route::put('/create', 'StudentStatusController@update')->name('save_student_status');
    Route::get('/all', 'StudentStatusController@index')->name('all_student_status');
    Route::get('/edit/{id}', 'StudentStatusController@edit')->name('edit_student_status');
    Route::post('/', 'StudentStatusController@softdelete')->name('softdelete_student_status');
    Route::post('/restore', 'StudentStatusController@restore')->name('restore_student_status');
    Route::delete('/', 'StudentStatusController@destroy')->name('delete_student_status');
});
Route::post('dashboard/student/ajax/status/update/', 'StudentStatusController@ajaxstatusupdate');

Route::prefix('dashboard/student/guest')->group(function () {
    Route::get('/create', 'GuestStudentController@create')->name('add_guest_student')->middleware('can:insert_guest');
    Route::post('/create', 'GuestStudentController@store')->name('save_guest_student')->middleware('can:insert_guest');
    Route::put('/create', 'GuestStudentController@update')->name('save_guest_student')->middleware('can:edit_guest');
    Route::put('/details/{slug}', 'GuestStudentController@view')->name('view_guest_student')->middleware('can:view_guest');
    Route::get('/all', 'GuestStudentController@index')->name('all_guest_student')->middleware('can:all_guest');
    Route::get('/edit/{id}', 'GuestStudentController@edit')->name('edit_guest_student')->middleware('can:edit_guest');
    Route::get('/delete/{id}', 'GuestStudentController@destroy')->name('delete_guest_student')->middleware('can:delete_guest');
});

Route::prefix('dashboard/student/admission')->group(function () {
    Route::get('/create', 'GuestStudentController@admissioncreate')->name('add_student_admission');
    Route::post('/create', 'GuestStudentController@admissionstore')->name('save_student_admission');
    Route::put('/create', 'GuestStudentController@admissionupdate')->name('save_student_admission');

});
route::get('dashboard/get/country/{id}', 'GuestStudentController@getuniversity');
route::get('dashboard/get/course-category/{id}', 'GuestStudentController@getcoursecategory');
route::post('dashboard/get/category/course/', 'GuestStudentController@getcategorycourse');
route::post('dashboard/get/course/', 'GuestStudentController@getcourse');
route::post('dashboard/get/course/fees', 'GuestStudentController@getcoursefees');

Route::get('dashboard/country', 'CountryController@index')->name('')->middleware('can:all_country');
Route::get('dashboard/country/add', 'CountryController@add')->name('')->middleware('can:insert_country');
Route::get('dashboard/country/edit/{slug}', 'CountryController@edit')->name('')->middleware('can:edit_country');
Route::get('dashboard/country/view/{slug}', 'CountryController@view')->name('')->middleware('can:view_country');
Route::post('dashboard/country/submit', 'CountryController@insert')->name('')->middleware('can:insert_country');
Route::post('dashboard/country/update', 'CountryController@update')->name('')->middleware('can:edit_country');
Route::post('dashboard/country/softdelete', 'CountryController@softdelete')->name('')->middleware('can:delete_country');

Route::get('dashboard/university', 'UniversityController@index')->name('')->middleware('can:all_university');
Route::get('dashboard/university/add', 'UniversityController@add')->name('')->middleware('can:insert_university');
Route::get('dashboard/university/edit/{slug}', 'UniversityController@edit')->name('')->middleware('can:edit_university');
Route::get('dashboard/university/view/{slug}', 'UniversityController@view')->name('')->middleware('can:view_university');
Route::post('dashboard/university/submit', 'UniversityController@insert')->name('')->middleware('can:insert_university');
Route::post('dashboard/university/update', 'UniversityController@update')->name('')->middleware('can:edit_university');
Route::post('dashboard/university/uniprogram', 'UniversityController@uniprogram')->name('')->middleware('can:delete_university');

Route::get('dashboard/university/program', 'UniversityProgramController@index')->name('')->middleware('can:all_university_program');
Route::get('dashboard/university/program/add', 'UniversityProgramController@add')->name('')->middleware('can:insert_university_program');
Route::get('dashboard/university/program/edit/{slug}', 'UniversityProgramController@edit')->name('')->middleware('can:edit_university_program');
Route::get('dashboard/university/program/view/{slug}', 'UniversityProgramController@view')->name('')->middleware('can:view_university_program');
Route::post('dashboard/university/program/submit', 'UniversityProgramController@insert')->name('')->middleware('can:insert_university_program');
Route::post('dashboard/university/program/update', 'UniversityProgramController@update')->name('')->middleware('can:edit_university_program');
Route::post('dashboard/university/program/softdelete', 'UniversityProgramController@softdelete')->name('')->middleware('can:delete_university_program');

Route::get('dashboard/university/program/category', 'UniversityProgramCategoryController@index')->name('')->middleware('can:all_university_program_category');
Route::get('dashboard/university/program/category/add', 'UniversityProgramCategoryController@add')->name('')->middleware('can:insert_university_program_category');
Route::get('dashboard/university/program/category/edit/{slug}', 'UniversityProgramCategoryController@edit')->name('')->middleware('can:edit_university_program_category');
Route::get('dashboard/university/program/category/view/{slug}', 'UniversityProgramCategoryController@view')->name('')->middleware('can:view_university_program_category');
Route::post('dashboard/university/program/category/submit', 'UniversityProgramCategoryController@insert')->name('')->middleware('can:insert_university_program_category');
Route::post('dashboard/university/program/category/update', 'UniversityProgramCategoryController@update')->name('')->middleware('can:edit_university_program_category');
Route::post('dashboard/university/program/category/softdelete', 'UniversityProgramCategoryController@softdelete')->name('')->middleware('can:delete_university_program_category');

Route::prefix('dashboard/hr/employee')->group(function () {
    Route::get('/create', 'EmployeeController@add')->name('add_employee')->middleware('can:insert_employee');
    Route::post('/create', 'EmployeeController@insert')->name('save_employee')->middleware('can:insert_employee');
    Route::put('/create', 'EmployeeController@update')->name('save_employee')->middleware('can:edit_employee');
    Route::get('/all', 'EmployeeController@index')->name('all_employee')->middleware('can:all_employee');
    Route::get('/details/{slug}/print-view', 'EmployeeController@printview')->name('print_view_employee')->middleware('can:view_employee');
    Route::get('/details/{slug}', 'EmployeeController@view')->name('view_employee')->middleware('can:view_employee');
    Route::get('/details/{slug}/personal', 'EmployeeController@view')->name('view_employee_personal')->middleware('can:view_employee');
    Route::get('/details/{slug}/academic', 'EmployeeController@view')->name('view_employee_academic')->middleware('can:view_employee');
    Route::get('/details/{slug}/traininig', 'EmployeeController@view')->name('view_employee_training')->middleware('can:view_employee');
    Route::get('/details/{slug}/experience', 'EmployeeController@view')->name('view_employee_experience')->middleware('can:view_employee');
    Route::get('/details/{slug}/credential', 'EmployeeController@view')->name('view_employee_credential')->middleware('can:view_employee');
    Route::get('/details/{slug}/official', 'EmployeeController@view')->name('view_employee_official')->middleware('can:view_employee');
    Route::get('/details/{slug}/contact', 'EmployeeController@view')->name('view_employee_contact')->middleware('can:view_employee');
    Route::get('/details/{slug}/statements', 'EmployeeController@view')->name('view_employee_statements')->middleware('can:view_employee');
    Route::get('/details/{slug}/providentfund', 'EmployeeController@view')->name('view_employee_providentfund')->middleware('can:view_employee');
    Route::get('/details/{slug}/commission', 'EmployeeController@view')->name('view_employee_commission')->middleware('can:view_employee');
    Route::get('/details/{slug}/advancesalary', 'EmployeeController@view')->name('view_employee_advancesalary')->middleware('can:view_employee');
    Route::get('/details/{slug}/loan', 'EmployeeController@view')->name('view_employee_loan');
    Route::get('/edit/{slug}', 'EmployeeController@edit')->name('edit_employee')->middleware('can:edit_employee');
    Route::post('/official', 'EmployeeController@officialupdate')->name('official_update');
    Route::post('/providentfund', 'EmployeeController@providentfundupdate')->name('providentfund_update');
    Route::post('/commission', 'EmployeeController@commissionupdate')->name('commission_update');
    Route::post('/advancesalary', 'EmployeeController@advancesalaryupdate')->name('advancesalary_update');
    Route::post('/contact', 'EmployeeController@contactupdate')->name('contact_update');
    Route::post('/', 'EmployeeController@softdelete')->name('softdelete_employee')->middleware('can:delete_employee');
    Route::post('/restore', 'EmployeeController@restore')->name('restore_employee');
    Route::delete('/', 'EmployeeController@delete')->name('delete_employee');
    Route::post('make-user','EmployeeController@makeuser')->name('employee_to_make_user');

});

    // Route::get('dashboard/hr/counsellor/all','EmployeeController@allcounsellor')->name('all_counsellor');
    // Route::get('dashboard/hr/agent/all','EmployeeController@allagent')->name('all_agent');
    Route::get('dashboard/hr/receptionist/all','EmployeeController@allreceptionist')->name('all_receptionist');

Route::prefix('dashboard/hr/employee/academic')->group(function () {
    Route::post('/create', 'AcademicController@insert')->name('save_academic');
    Route::put('/create', 'AcademicController@update')->name('save_academic');
    Route::get('/edit/{id}', 'AcademicController@edit')->name('edit_academic');
    Route::get('/delete/{id}', 'AcademicController@delete')->name('delete_academic');
});

Route::prefix('dashboard/hr/employee/training')->group(function () {
    Route::get('/create', 'TrainingController@add')->name('add_training');
    Route::post('/create', 'TrainingController@insert')->name('save_training');
    Route::put('/create', 'TrainingController@update')->name('save_training');
    Route::get('/edit/{id}', 'TrainingController@edit')->name('edit_training');
    Route::get('/delete/{id}', 'TrainingController@delete')->name('delete_training');
});

Route::prefix('dashboard/hr/employee/advancesalary')->group(function () {
    Route::get('/create', 'AdvanceSalaryController@add')->name('add_advance_salary');
    Route::post('/create', 'AdvanceSalaryController@store')->name('save_advance_salary');
    Route::put('/create', 'AdvanceSalaryController@update')->name('save_advance_salary');
    Route::get('/edit/{id}', 'AdvanceSalaryController@edit')->name('edit_advance_salary');
    Route::get('/delete/{id}', 'AdvanceSalaryController@destroy')->name('delete_advance_salary');
});

Route::prefix('dashboard/hr/department')->group(function () {
    Route::get('/create', 'DepartmentController@create')->name('add_department')->middleware('can:insert_department');
    Route::post('/create', 'DepartmentController@store')->name('save_department')->middleware('can:insert_department');
    Route::put('/create', 'DepartmentController@update')->name('save_department')->middleware('can:edit_department');
    Route::get('/all', 'DepartmentController@index')->name('all_department')->middleware('can:all_department');
    Route::get('/edit/{slug}', 'DepartmentController@edit')->name('edit_department')->middleware('can:edit_department');
    Route::post('/', 'DepartmentController@softdelete')->name('softdelete_department')->middleware('can:delete_department');
    Route::post('/restore', 'DepartmentController@restore')->name('restore_department')->middleware('can:delete_department');
    Route::delete('/', 'DepartmentController@destroy')->name('delete_department')->middleware('can:delete_department');
});

Route::prefix('dashboard/hr/branch')->group(function () {
    Route::get('/create', 'BranchController@create')->name('add_branch')->middleware('can:insert_branch');
    Route::post('/create', 'BranchController@store')->name('save_branch')->middleware('can:insert_branch');
    Route::put('/create', 'BranchController@update')->name('save_branch')->middleware('can:edit_branch');
    Route::get('/all', 'BranchController@index')->name('all_branch')->middleware('can:all_branch');
    Route::get('/edit/{id}', 'BranchController@edit')->name('edit_branch')->middleware('can:edit_branch');
    Route::post('/', 'BranchController@softdelete')->name('softdelete_branch')->middleware('can:delete_branch');
    Route::post('/restore', 'BranchController@restore')->name('restore.branch')->middleware('can:delete_branch');
    Route::delete('/', 'BranchController@destroy')->name('delete_branch')->middleware('can:delete_branch');
});

Route::prefix('dashboard/hr/shift')->group(function () {
    Route::get('/create', 'ShiftController@create')->name('add_shift')->middleware('can:insert_shift');
    Route::post('/create', 'ShiftController@store')->name('save_shift')->middleware('can:insert_shift');
    Route::put('/create', 'ShiftController@update')->name('save_shift')->middleware('can:edit_shift');
    Route::get('/all', 'ShiftController@index')->name('all_shift')->middleware('can:all_shift');
    Route::get('/edit/{id}', 'ShiftController@edit')->name('edit_shift')->middleware('can:edit_shift');
    Route::post('/', 'ShiftController@softdelete')->name('softdelete_shift')->middleware('can:delete_shift');
    Route::post('/restore', 'ShiftController@restore')->name('restore.shift')->middleware('can:delete_shift');
    Route::delete('/', 'ShiftController@destroy')->name('delete_shift')->middleware('can:delete_shift');
});

Route::prefix('dashboard/hr/emp_nature')->group(function () {
    Route::get('/create', 'EmpNatureController@create')->name('add_emp_nature')->middleware('can:insert_emp_nature');
    Route::post('/create', 'EmpNatureController@store')->name('save_emp_nature')->middleware('can:insert_emp_nature');
    Route::put('/create', 'EmpNatureController@update')->name('save_emp_nature')->middleware('can:edit_emp_nature');
    Route::get('/all', 'EmpNatureController@index')->name('all_emp_nature')->middleware('can:all_emp_nature');
    Route::get('/edit/{id}', 'EmpNatureController@edit')->name('edit_emp_nature')->middleware('can:edit_emp_nature');
    Route::post('/', 'EmpNatureController@softdelete')->name('softdelete_emp_nature')->middleware('can:delete_emp_nature');
    Route::post('/restore', 'EmpNatureController@restore')->name('restore.emp_nature')->middleware('can:delete_emp_nature');
    Route::delete('/', 'EmpNatureController@destroy')->name('delete_emp_nature')->middleware('can:delete_emp_nature');
});

Route::prefix('dashboard/hr/pay_type')->group(function () {
    Route::get('/create', 'PayTypeController@create')->name('add_pay_type')->middleware('can:insert_pay_type');
    Route::post('/create', 'PayTypeController@store')->name('save_pay_type')->middleware('can:insert_pay_type');
    Route::get('/all', 'PayTypeController@index')->name('all_pay_type')->middleware('can:all_pay_type');
    Route::post('/all', 'PayTypeController@softdelete')->name('softdelete_pay_type')->middleware('can:delete_pay_type');
    Route::post('/restore', 'PayTypeController@restore')->name('restore_pay_type');
    Route::delete('/all', 'PayTypeController@destroy')->name('delete_pay_type');
});

Route::prefix('dashboard/hr/emp_status')->group(function () {
    Route::get('/create', 'EmpStatusController@create')->name('add_emp_status')->middleware('can:insert_emp_status');
    Route::post('/create', 'EmpStatusController@store')->name('save_emp_status')->middleware('can:insert_emp_status');
    Route::put('/create', 'EmpStatusController@update')->name('save_emp_status')->middleware('can:edit_emp_status');
    Route::get('/all', 'EmpStatusController@index')->name('all_emp_status')->middleware('can:all_emp_status');
    Route::get('/edit/{id}', 'EmpStatusController@edit')->name('edit_emp_status')->middleware('can:edit_emp_status');
    Route::post('/', 'EmpStatusController@softdelete')->name('softdelete_emp_status')->middleware('can:delete_emp_status');
    Route::post('/restore', 'EmpStatusController@restore')->name('restore.emp_status')->middleware('can:delete_emp_status');
    Route::delete('/', 'EmpStatusController@destroy')->name('delete_emp_status')->middleware('can:delete_emp_status');
});

Route::prefix('dashboard/hr/salary_scale')->group(function () {
    Route::get('/string', 'SalaryScaleController@salaryString')->name('salary_string');
    Route::post('/string', 'SalaryScaleController@addSalaryString')->name('add_salary_string');
    Route::get('/create', 'SalaryScaleController@create')->name('add_salary_scale')->middleware('can:insert_salary_scale');
    Route::post('/create', 'SalaryScaleController@store')->name('save_salary_scale')->middleware('can:insert_salary_scale');
    Route::put('/create', 'SalaryScaleController@update')->name('save_salary_scale')->middleware('can:edit_salary_scale');
    Route::get('/all', 'SalaryScaleController@index')->name('all_salary_scale')->middleware('can:all_salary_scale');
    Route::get('/edit/{id}', 'SalaryScaleController@edit')->name('edit_salary_scale')->middleware('can:edit_salary_scale');
    Route::post('/delete', 'SalaryScaleController@softdelete')->name('softdelete_salary_scale')->middleware('can:delete_salary_scale');
    Route::post('/', 'SalaryScaleController@restore')->name('srestore.scale')->middleware('can:delete_salary_scale');
    Route::delete('/', 'SalaryScaleController@destroy')->name('delete_salary_scale')->middleware('can:delete_salary_scale');
});

Route::prefix('dashboard/hr/designation')->group(function () {
    Route::get('/create', 'DesignationController@create')->name('add_designation')->middleware('can:insert_designation');
    Route::post('/create', 'DesignationController@store')->name('save_designation')->middleware('can:insert_designation');
    Route::put('/create', 'DesignationController@update')->name('save_designation')->middleware('can:edit_designation');
    Route::get('/all', 'DesignationController@index')->name('all_designation')->middleware('can:all_designation');
    Route::get('/edit/{id}', 'DesignationController@edit')->name('edit_designation')->middleware('can:edit_designation');
    Route::post('/', 'DesignationController@softdelete')->name('softdelete_designation')->middleware('can:delete_designation');
    Route::post('/restore', 'DesignationController@restore')->name('restore.designation')->middleware('can:delete_designation');
    Route::delete('/', 'DesignationController@destroy')->name('delete_designation')->middleware('can:delete_designation');
});

Route::prefix('dashboard/hr/attendanc')->group(function () {
    Route::get('/create', 'EmployeeAttendancController@index')->name('employee.attendanc')->middleware('can:insert_employee_attendance');
    Route::post('/create', 'EmployeeAttendancController@create')->name('employee.attendanc.create')->middleware('can:insert_employee_attendance');
    Route::post('/store', 'EmployeeAttendancController@store')->name('employee.attendanc.store')->middleware('can:insert_employee_attendance');
    Route::get('/absent/{id}', 'EmployeeAttendancController@absent')->name('employee.absent');

    Route::get('/day-wish-attendanc', 'EmployeeAttendancController@dayWishAttendanc')->name('employee.daywishattendanc');
    Route::post('/day-wish-attendanc', 'EmployeeAttendancController@dayWishAttendancview')->name('employee.daywishattendancview');

    Route::get('/employee-wish-attendanc', 'EmployeeAttendancController@employeeWishAttendanc')->name('employee.wishattendanc');
    Route::post('/employee-wish-attendanc', 'EmployeeAttendancController@employeeWishAttendancview')->name('employee.wishattendancview');
    Route::post('/getajax-employee', 'EmployeeAttendancController@getajaxEmployee')->name('employee.getAjax');
});

Route::prefix('dashboard/hr/holiday')->group(function () {
    Route::get('/create', 'HolidayController@create')->name('add_holiday')->middleware('can:insert_holiday');
    Route::post('/create', 'HolidayController@store')->name('save_holiday')->middleware('can:insert_holiday');
    Route::put('/create', 'HolidayController@update')->name('save_holiday')->middleware('can:edit_holiday');
    Route::get('/all', 'HolidayController@index')->name('all_holiday')->middleware('can:all_holiday');
    Route::get('/edit/{id}', 'HolidayController@edit')->name('edit_holiday')->middleware('can:edit_holiday');
    Route::post('/', 'HolidayController@softdelete')->name('softdelete_holiday')->middleware('can:delete_holiday');
    Route::post('/restore', 'HolidayController@restore')->name('restore_holiday')->middleware('can:delete_holiday');
    Route::delete('/', 'HolidayController@destroy')->name('delete_holiday')->middleware('can:delete_holiday');
});

Route::prefix('dashboard/hr/employeeleave')->group(function () {
    Route::get('/create', 'EmployeeLeaveController@create')->name('add_emp_leave')->middleware('can:insert_employee_leave');
    Route::post('/create', 'EmployeeLeaveController@store')->name('save_emp_leave')->middleware('can:insert_employee_leave');
    Route::put('/create', 'EmployeeLeaveController@update')->name('save_emp_leave')->middleware('can:edit_employee_leave');
    Route::get('/all', 'EmployeeLeaveController@index')->name('all_emp_leave')->middleware('can:all_employee_leave');
    Route::get('/edit/{id}', 'EmployeeLeaveController@edit')->name('edit_emp_leave')->middleware('can:edit_employee_leave');
    Route::post('/', 'EmployeeLeaveController@softdelete')->name('softdelete_emp_leave')->middleware('can:delete_employee_leave');
    Route::post('/restore', 'EmployeeLeaveController@restore')->name('restore_emp_leave')->middleware('can:delete_employee_leave');
    Route::delete('/', 'EmployeeLeaveController@destroy')->name('delete_emp_leave')->middleware('can:delete_employee_leave');
    Route::post('/approved', 'EmployeeLeaveController@approved')->name('approved_emp_leave');
    Route::post('/unapproved', 'EmployeeLeaveController@unapproved')->name('unapproved_emp_leave');
});

Route::prefix('dashboard/hr/experience')->group(function () {
    Route::get('/create', 'ExperienceController@create')->name('add_experience');
    Route::post('/create', 'ExperienceController@store')->name('save_experience');
    Route::put('/create', 'ExperienceController@update')->name('save_experience');
    Route::get('/all', 'ExperienceController@index')->name('all_experience');
    Route::get('/edit/{id}', 'ExperienceController@edit')->name('edit_experience');
    Route::post('/', 'ExperienceController@softdelete')->name('softdelete_experience');
    Route::post('/restore', 'ExperienceController@restore')->name('restore_experience');
    Route::get('/delete/{id}', 'ExperienceController@destroy')->name('delete_experience');
});

Route::prefix('dashboard/hr/leave')->group(function () {
    Route::get('/create', 'LeaveController@create')->name('add_leave')->middleware('can:insert_leave');
    Route::post('/create', 'LeaveController@store')->name('save_leave')->middleware('can:insert_leave');
    Route::put('/create', 'LeaveController@update')->name('save_leave')->middleware('can:edit_leave');
    Route::get('/all', 'LeaveController@index')->name('all_leave')->middleware('can:all_leave');
    Route::get('/edit/{id}', 'LeaveController@edit')->name('edit_leave')->middleware('can:edit_leave');
    Route::post('/', 'LeaveController@softdelete')->name('softdelete_leave')->middleware('can:delete_leave');
    Route::post('/restore', 'LeaveController@restore')->name('restore_leave')->middleware('can:delete_leave');
    Route::delete('/', 'LeaveController@destroy')->name('delete_leave')->middleware('can:delete_leave');
});

Route::prefix('dashboard/hr/resignation')->group(function () {
    Route::get('/create', 'ResignationController@create')->name('add_resignation')->middleware('can:insert_resignation');
    Route::post('/create', 'ResignationController@store')->name('save_resignation')->middleware('can:insert_resignation');
    Route::put('/create', 'ResignationController@update')->name('save_resignation')->middleware('can:edit_resignation');
    Route::get('/all', 'ResignationController@index')->name('all_resignation')->middleware('can:all_resignation');
    Route::get('/edit/{id}', 'ResignationController@edit')->name('edit_resignation')->middleware('can:edit_resignation');
    Route::post('/', 'ResignationController@softdelete')->name('softdelete_resignation')->middleware('can:delete_resignation');
    Route::post('/restore', 'ResignationController@restore')->name('restore_resignation')->middleware('can:delete_resignation');
    Route::delete('/', 'ResignationController@destroy')->name('delete_resignation')->middleware('can:delete_resignation');
});

Route::prefix('dashboard/hr/agent')->group(function () {
    Route::get('/create', 'AgentController@create')->name('add_agent');
    Route::post('/create', 'AgentController@store')->name('save_agent');
    Route::put('/create', 'AgentController@update')->name('save_agent');
    Route::get('/all', 'AgentController@index')->name('all_agent');
    Route::get('/edit/{id}', 'AgentController@edit')->name('edit_agent');
    Route::post('/softedelete', 'AgentController@softdelete')->name('softdelete_agent');
    Route::post('/restore', 'AgentController@restore')->name('restore_agent');
    Route::delete('/', 'AgentController@destroy')->name('delete_agent');
});

Route::prefix('dashboard/student/requsition')->group(function () {
    Route::get('/create', 'StudentRequsitionController@create')->name('add_requsition');
    Route::post('/create', 'StudentRequsitionController@store')->name('save_requsition');
    Route::put('/create', 'StudentRequsitionController@update')->name('save_requsition');
    Route::get('/all', 'StudentRequsitionController@index')->name('all_requsition');
    Route::get('/edit/{id}', 'StudentRequsitionController@edit')->name('edit_requsition');
    Route::get('/view/{id}', 'StudentRequsitionController@view')->name('view_requsition');
    Route::post('/softedelete', 'StudentRequsitionController@softdelete')->name('softdelete_requsition');
    Route::post('/restore', 'StudentRequsitionController@restore')->name('restore_requsition');
    Route::delete('/', 'StudentRequsitionController@destroy')->name('delete_requsition');
});

Route::prefix('dashboard/student/requsition/details')->group(function () {
    Route::get('/create', 'StudentRequsitionDetailsController@create')->name('add_requsition_details');
    Route::post('/create', 'StudentRequsitionDetailsController@store')->name('save_requsition_details');
    Route::put('/create', 'StudentRequsitionDetailsController@update')->name('save_requsition_details');
});

Route::prefix('dashboard/student/money/receipt')->group(function () {
    Route::get('/create', 'StudentMoneyReceiptController@create')->name('add_money_receipt');
    Route::post('/create', 'StudentMoneyReceiptController@store')->name('save_money_receipt');
    Route::put('/create', 'StudentMoneyReceiptController@update')->name('save_money_receipt');
    Route::get('/download/{id}', 'StudentMoneyReceiptController@download')->name('download_money_receipt');
    Route::get('/pdf/{id}', 'StudentMoneyReceiptController@pdf')->name('pdf_money_receipt');
});

Route::prefix('dashboard/hr/counsellor')->group(function () {
    Route::get('/create', 'CounsellorGenerateController@create')->name('add_counsellor');
    Route::post('/create', 'CounsellorGenerateController@store')->name('save_counsellor');
    Route::put('/create', 'CounsellorGenerateController@update')->name('save_counsellor');
    Route::get('/all', 'CounsellorGenerateController@index')->name('all_counsellor');
    Route::get('/edit/{id}', 'CounsellorGenerateController@edit')->name('edit_counsellor');
    Route::get('/view/{id}', 'CounsellorGenerateController@view')->name('view_counsellor');
    Route::post('/softedelete', 'CounsellorGenerateController@softdelete')->name('softdelete_counsellor');
    Route::post('/restore', 'CounsellorGenerateController@restore')->name('restore_counsellor');
    Route::delete('/', 'CounsellorGenerateController@destroy')->name('delete_counsellor');
});

Route::prefix('dashboard/hr/termination')->group(function () {
    Route::get('/create', 'TerminationController@create')->name('add_termination')->middleware('can:insert_termination');
    Route::post('/create', 'TerminationController@store')->name('save_termination')->middleware('can:insert_termination');
    Route::put('/create', 'TerminationController@update')->name('save_termination')->middleware('can:edit_termination');
    Route::get('/all', 'TerminationController@index')->name('all_termination')->middleware('can:all_termination');
    Route::get('/edit/{id}', 'TerminationController@edit')->name('edit_termination')->middleware('can:edit_termination');
    Route::post('/', 'TerminationController@softdelete')->name('softdelete_termination')->middleware('can:delete_termination');
    Route::post('/restore', 'TerminationController@restore')->name('restore_termination')->middleware('can:delete_termination');
    Route::delete('/', 'TerminationController@destroy')->name('delete_termination')->middleware('can:delete_termination');
});

Route::prefix('dashboard/hr/employee')->group(function () {
    Route::get('/report', 'EmployeeReportController@report')->name('employee_report');
    Route::post('/report', 'EmployeeReportController@searchreport')->name('employee_report_search');
    Route::get('/report/export', 'EmployeeReportController@reportexport')->name('employee_report_export');
});

Route::prefix('dashboard/hr/working-day')->group(function () {
    Route::get('/report', 'EmployeeReportController@workreport')->name('workday_report');
    Route::post('/report', 'EmployeeReportController@worksearchreport')->name('workday_report_search');
    Route::get('/report/export', 'EmployeeReportController@workreportexport')->name('workday_report_export');
});

Route::prefix('dashboard/loan')->group(function () {
    Route::get('/report', 'LoanReportController@report')->name('loan_report');
    Route::post('/report', 'LoanReportController@searchreport')->name('loan_report_search');
    Route::get('/report/export', 'LoanReportController@reportexport')->name('loan_report_export');
});

Route::prefix('dashboard/recycle')->group(function () {
    Route::get('/', 'RecycleController@index')->name('recycle_all');
    Route::get('/branch', 'RecycleController@branch')->name('recycle_branch');
    Route::get('/department', 'RecycleController@department')->name('recycle_department');
    Route::get('/employee', 'RecycleController@employee')->name('recycle_employee');
    Route::get('/nature', 'RecycleController@nature')->name('recycle_nature');
    Route::get('/paytype', 'RecycleController@paytype')->name('recycle_paytype');
    Route::get('/salaryscale', 'RecycleController@salaryscale')->name('recycle_salaryscale');
    Route::get('/shift', 'RecycleController@shift')->name('recycle_shift');
    Route::get('/status', 'RecycleController@status')->name('recycle_status');

});

Route::prefix('dashboard/client-staisfaction/question')->group(function () {
    Route::get('/create', 'ClientSatisfactionQuestionController@create')->name('add_cs_question')->middleware('can:insert_client_question');
    Route::post('/create', 'ClientSatisfactionQuestionController@store')->name('save_cs_question')->middleware('can:insert_client_question');
    Route::put('/create', 'ClientSatisfactionQuestionController@update')->name('save_cs_question')->middleware('can:edit_client_question');
    Route::get('/all', 'ClientSatisfactionQuestionController@index')->name('all_cs_question')->middleware('can:all_client_question');
    Route::get('/edit/{id}', 'ClientSatisfactionQuestionController@edit')->name('edit_cs_question')->middleware('can:edit_client_question');
    Route::delete('/', 'ClientSatisfactionQuestionController@destroy')->name('delete_cs_question')->middleware('can:delete_client_question');
    Route::post('/publish', 'ClientSatisfactionQuestionController@publish')->name('publish_cs_question')->middleware('can:delete_client_question');
    Route::post('/unpublish', 'ClientSatisfactionQuestionController@unpublish')->name('unpublish_cs_question')->middleware('can:delete_client_question');
});

Route::prefix('dashboard/client-staisfaction/survey')->group(function () {
    Route::get('/create', 'ClientSatisfactionSurveyController@create')->name('add_cs_survey')->middleware('can:insert_client_response');
    Route::post('/create', 'ClientSatisfactionSurveyController@store')->name('save_cs_survey')->middleware('can:insert_client_response');
    Route::put('/create', 'ClientSatisfactionSurveyController@update')->name('save_cs_survey')->middleware('can:edit_client_response');
    Route::get('/all', 'ClientSatisfactionResponseController@index')->name('all_cs_survey')->middleware('can:all_client_response');
    Route::get('/view/{id}', 'ClientSatisfactionResponseController@view')->name('view_cs_survey')->middleware('can:view_client_response');
});

Route::prefix('dashboard/complain')->group(function () {
    Route::get('/create', 'ClientSatisfactionSurveyController@complaincreate')->name('add_complain')->middleware('can:insert_complain');
    Route::post('/create', 'ClientSatisfactionSurveyController@complainstore')->name('save_complain')->middleware('can:insert_complain');
    Route::get('/all', 'ComplainController@index')->name('all_complain')->middleware('can:edit_complain');
    Route::get('/view/{id}', 'ComplainController@view')->name('view_complain')->middleware('can:all_complain');
    Route::get('/edit/{id}', 'ComplainController@edit')->name('edit_complain')->middleware('can:edit_complain');
    Route::get('/solve/{id}', 'ComplainController@solve')->name('solve_complain')->middleware('can:delete_complain');
    Route::get('/pending/{id}', 'ComplainController@pending')->name('pending_complain')->middleware('can:delete_complain');
    Route::delete('/', 'ComplainController@destroy')->name('delete_complain')->middleware('can:delete_complain');
});

Route::prefix('dashboard/event')->group(function () {
    Route::get('/create', 'EventManagementController@create')->name('add_event')->middleware('can:insert_event');
    Route::post('/create', 'EventManagementController@store')->name('save_event')->middleware('can:insert_event');
    Route::put('/create', 'EventManagementController@update')->name('save_event')->middleware('can:edit_event');
    Route::get('/all', 'EventManagementController@index')->name('all_event')->middleware('can:all_event');
    Route::get('/edit/{id}', 'EventManagementController@edit')->name('edit_event')->middleware('can:edit_event');
    Route::get('/view/{id}', 'EventManagementController@view')->name('view_event')->middleware('can:delete_event');
    Route::post('/softdelete', 'EventManagementController@softdelete')->name('softdelete_event')->middleware('can:delete_event');
    Route::post('/restore', 'EventManagementController@restore')->name('restore_event')->middleware('can:delete_event');
    Route::get('/delete/{id}', 'EventManagementController@destroy')->name('delete_event')->middleware('can:delete_event');
});

Route::prefix('dashboard/publication')->group(function () {
    Route::get('/create', 'PublicationController@create')->name('add_publication')->middleware('can:insert_publication');
    Route::post('/create', 'PublicationController@store')->name('save_publication')->middleware('can:insert_publication');
    Route::put('/create', 'PublicationController@update')->name('save_publication')->middleware('can:edit_publication');
    Route::get('/all', 'PublicationController@index')->name('all_publication')->middleware('can:all_publication');
    Route::get('/edit/{id}', 'PublicationController@edit')->name('edit_publication')->middleware('can:edit_publication');
    Route::get('/view/{id}', 'PublicationController@view')->name('view_publication')->middleware('can:delete_publication');
    Route::post('/softdelete', 'PublicationController@softdelete')->name('softdelete_publication')->middleware('can:delete_publication');
    Route::post('/restore', 'PublicationController@restore')->name('restore_publication')->middleware('can:delete_publication');
    Route::get('/delete/{id}', 'PublicationController@destroy')->name('delete_publication')->middleware('can:delete_publication');
});

Route::prefix('dashboard/ad-details')->group(function () {
    Route::get('/create', 'AdDetailsController@create')->name('add_ads')->middleware('can:insert_advertisment');
    Route::post('/create', 'AdDetailsController@store')->name('save_ads')->middleware('can:insert_advertisment');
    Route::put('/create', 'AdDetailsController@update')->name('save_ads')->middleware('can:edit_advertisment');
    Route::get('/all', 'AdDetailsController@index')->name('all_ads')->middleware('can:all_advertisment');
    Route::get('/edit/{id}', 'AdDetailsController@edit')->name('edit_ads')->middleware('can:edit_advertisment');
    Route::get('/view/{id}', 'AdDetailsController@view')->name('view_ads')->middleware('can:delete_advertisment');
    Route::post('/softdelete', 'AdDetailsController@softdelete')->name('softdelete_ads')->middleware('can:delete_advertisment');
    Route::post('/restore', 'AdDetailsController@restore')->name('restore_ads')->middleware('can:delete_advertisment');
    Route::get('/delete/{id}', 'AdDetailsController@destroy')->name('delete_ads')->middleware('can:delete_advertisment');
});

Route::prefix('dashboard/loan-details')->group(function () {
    Route::get('/create', 'LoanDetailsController@create')->name('add_loan')->middleware('can:insert_loan_details');
    Route::post('/create', 'LoanDetailsController@store')->name('save_loan')->middleware('can:insert_loan_details');
    Route::put('/create', 'LoanDetailsController@update')->name('save_loan')->middleware('can:edit_loan_details');
    Route::get('/all', 'LoanDetailsController@index')->name('all_loan')->middleware('can:all_loan_details');
    Route::get('/edit/{id}', 'LoanDetailsController@edit')->name('edit_loan')->middleware('can:edit_loan_details');
    Route::get('/view/{id}', 'LoanDetailsController@view')->name('view_loan')->middleware('can:view_loan_details');
    Route::post('/softdelete', 'LoanDetailsController@softdelete')->name('softdelete_loan')->middleware('can:delete_loan_details');
    Route::post('/restore', 'LoanDetailsController@restore')->name('restore_loan')->middleware('can:delete_loan_details');
    Route::get('/delete/{id}', 'LoanDetailsController@destroy')->name('delete_loan')->middleware('can:delete_loan_details');
});

Route::prefix('dashboard/installment-details')->group(function () {
    Route::get('/create', 'InstallmentDetailsController@create')->name('add_installment')->middleware('can:insert_branch');
    Route::post('/create', 'InstallmentDetailsController@store')->name('save_installment')->middleware('can:insert_branch');
    Route::put('/create', 'InstallmentDetailsController@update')->name('save_installment')->middleware('can:edit_branch');
    Route::get('/all', 'InstallmentDetailsController@index')->name('all_installment')->middleware('can:all_branch');
    Route::get('/edit/{id}', 'InstallmentDetailsController@edit')->name('edit_installment')->middleware('can:edit_branch');
    Route::get('/view/{id}', 'InstallmentDetailsController@view')->name('view_installment')->middleware('can:view_branch');
    Route::post('/softdelete', 'InstallmentDetailsController@softdelete')->name('softdelete_installment')->middleware('can:delete_branch');
    Route::post('/restore', 'InstallmentDetailsController@restore')->name('restore_installment')->middleware('can:delete_branch');
    Route::get('/delete/{id}', 'InstallmentDetailsController@destroy')->name('delete_installment')->middleware('can:delete_branch');
    Route::post('/getajax-loan', 'InstallmentDetailsController@getajaxLoan')->name('loan.getAjax');
});

Route::prefix('dashboard/student')->group(function () {
    Route::get('/create', 'StudentController@create')->name('add_student')->middleware('can:insert_student');
    Route::post('/create', 'StudentController@store')->name('save_student')->middleware('can:insert_student');
    Route::put('/create', 'StudentController@update')->name('save_student')->middleware('can:edit_student');
    Route::get('/all', 'StudentController@index')->name('all_student')->middleware('can:all_student');
    Route::get('/details/{slug}', 'StudentController@view')->name('view_student');
    Route::get('/details/{slug}/document/', 'StudentController@view')->name('view_student_document');
    Route::get('/details/{slug}/academic/', 'StudentController@view')->name('view_student_academic');
    Route::get('/details/{slug}/personal/', 'StudentController@view')->name('view_student_personal');
    Route::get('/details/{slug}/visa/', 'StudentController@view')->name('view_student_visa');
    Route::get('/details/{slug}/admission/', 'StudentController@view')->name('view_student_admission');
    Route::get('/details/{slug}/account/', 'StudentController@view')->name('view_student_account');
    Route::get('/details/{slug}/log/', 'StudentController@view')->name('view_student_log');
    Route::get('/details/{slug}/passport/', 'StudentController@view')->name('view_student_passport');
    Route::get('/details/{slug}/visa/', 'StudentController@view')->name('view_student_visa');
    Route::get('/details/{slug}/interest/', 'StudentController@view')->name('view_student_interest');
    Route::get('/details/{slug}/print-view/', 'StudentController@printview')->name('print_view_student');
    Route::get('/edit/{id}', 'StudentController@edit')->name('edit_student');
    Route::post('/passport', 'StudentController@passportupdate')->name('passport_update');
    Route::post('/softdelete', 'StudentController@softdelete')->name('softdelete_student')->middleware('can:delete_student');
    Route::post('/restore', 'StudentController@restore')->name('restore_student')->middleware('can:delete_student');
    Route::delete('/', 'StudentController@destroy')->name('delete_student')->middleware('can:delete_student');

});

Route::prefix('dashboard/student/document')->group(function () {
    Route::get('/create', 'StudentDocumentController@create')->name('add_document');
    Route::post('/create', 'StudentDocumentController@store')->name('save_document');
    Route::put('/create', 'StudentDocumentController@update')->name('save_document');
    Route::get('/all', 'StudentDocumentController@index')->name('all_document');
    Route::get('/edit/{id}', 'StudentDocumentController@edit')->name('edit_document');
    Route::get('/delete/{id}', 'StudentDocumentController@destroy')->name('delete_document');
});

Route::prefix('dashboard/student/academic')->group(function () {
    Route::get('/create', 'StudentAcademicController@create')->name('add_student_academic');
    Route::post('/create', 'StudentAcademicController@store')->name('save_student_academic');
    Route::put('/create', 'StudentAcademicController@update')->name('save_student_academic');
    Route::get('/all', 'StudentAcademicController@index')->name('all_student_academic');
    Route::get('/edit/{id}', 'StudentAcademicController@edit')->name('edit_student_academic');
    Route::get('/delete/{id}', 'StudentAcademicController@destroy')->name('delete_student_academic');
});
Route::prefix('dashboard/student/visa')->group(function () {
    Route::get('/create', 'StudentVisaController@create')->name('add_visa');
    Route::post('/create', 'StudentVisaController@store')->name('save_visa');
    Route::put('/create', 'StudentVisaController@update')->name('save_visa');
    Route::get('/all', 'StudentVisaController@index')->name('all_visa');
    Route::get('/edit/{id}', 'StudentVisaController@edit')->name('edit_visa');
    Route::get('/delete/{id}', 'StudentVisaController@destroy')->name('delete_visa');
});

Route::prefix('dashboard/student/interest')->group(function () {
    Route::get('/create', 'StudentInterestCountryController@create')->name('add_interest');
    Route::post('/create', 'StudentInterestCountryController@store')->name('save_interest');
    Route::put('/create', 'StudentInterestCountryController@update')->name('save_interest');
    Route::get('/all', 'StudentInterestCountryController@index')->name('all_interest');
    Route::get('/edit/{id}', 'StudentInterestCountryController@edit')->name('edit_interest');
    Route::get('/accept/{id}', 'StudentInterestCountryController@accept')->name('accept_interest');
    Route::get('/delete/{id}', 'StudentInterestCountryController@delete')->name('delete_interest_chcke');
    Route::get('/delete/interest/{id}', 'StudentInterestCountryController@destroy')->name('delete_interest');
});
// Accounts
Route::prefix('dashboard/accounts')->group(function () {
    // Payment
    Route::get('/payment/create', 'PaymentsController@create')->name('payment');
    Route::get('/payment', 'PaymentsController@index')->name('payment.index');
    Route::get('/payment/show/{payment}', 'PaymentsController@show')->name('payment.show');
    Route::get('/payment/{payment}/edit', 'PaymentsController@edit')->name('payment.edit');
    Route::post('/payment/create', 'PaymentsController@store');
    Route::put('/payment/create', 'PaymentsController@update');
    // Deposit
    Route::get('/deposit/create', 'DepositsController@create')->name('deposit');
    Route::get('/deposit', 'DepositsController@index')->name('deposit.index');
    Route::get('/deposit/show/{deposit}', 'DepositsController@show')->name('deposit.show');
    Route::get('/deposit/{deposit}/edit', 'DepositsController@edit')->name('deposit.edit');
    Route::post('/deposit/create', 'DepositsController@store');
    Route::put('/deposit/create', 'DepositsController@update');
    // Transfer
    Route::get('/transfer', 'PaymentsController@transfer')->name('transfer');
    Route::get('/reconcile', 'PaymentsController@reconcile')->name('reconcile');
    Route::get('/journal-inquery', 'PaymentsController@journalInquiry')->name('journalInquiry');
    Route::get('/gl-inquery', 'PaymentsController@glInquiry')->name('glInquiry');
    Route::get('/bank-inquery', 'PaymentsController@bankInquiry')->name('bankInquiry');

    // Journal Entry
    Route::get('/gl/entry/all', 'JournalController@index')->name('gl.entry.all')->middleware('can:all_journal');
    Route::get('/gl/entry', 'JournalController@create')->name('gl.entry')->middleware('can:insert_journal');
    Route::get('/gl/entry/{journal}', 'JournalController@show')->name('gl.show')->middleware('can:view_journal');
    Route::post('/gl/entry', 'JournalController@store')->name('gl.entry.store')->middleware('can:insert_journal');
    Route::post('/gl/glInquiry', 'JournalController@glInquiry')->name('glInquiry.post')->middleware('can:view_journal');
    Route::put('/gl/entry', 'JournalController@update')->name('gl.entry.update')->middleware('can:edit_journal');
    Route::get('/gl/edit/{id}', 'JournalController@edit')->name('gl.entry.edit')->middleware('can:edit_journal');
    Route::post('/gl/softdelete', 'JournalController@softdelete')->name('gl.entry.softdelete')->middleware('can:delete_journal');

    // account Class
    Route::get('/chart_of_accounts', 'AccountClassController@chart_of_accounts')->name('chart_of_accounts');
    Route::get('/class', 'AccountClassController@index')->name('account.class')->middleware('can:all_account_class');
    Route::post('/class', 'AccountClassController@store')->middleware('can:insert_account_class');
    Route::get('/class/{accountClass}', 'AccountClassController@edit')->name('edit_acc_class')->middleware('can:edit_account_class');
    Route::put('/class/{accountClass}', 'AccountClassController@update')->middleware('can:edit_account_class');
    Route::delete('/class', 'AccountClassController@destroy')->name('softdelete_acc_class')->middleware('can:delete_account_class');

    // Account Group
    Route::get('/group', 'AccountGroupController@index')->name('account.group')->middleware('can:all_account_group');
    Route::post('/group', 'AccountGroupController@store')->middleware('can:insert_account_group');
    Route::get('/group/{accountGroup}', 'AccountGroupController@edit')->name('edit_acc_group')->middleware('can:edit_account_group');
    Route::put('/group/{accountGroup}', 'AccountGroupController@update')->middleware('can:edit_account_group');
    Route::delete('/group', 'AccountGroupController@destroy')->name('softdelete_acc_group')->middleware('can:delete_account_group');

    // GL Account
    Route::get('/gl-account', 'GlAccountController@index')->name('account.gl')->middleware('can:all_gl_account');
    Route::post('/gl-account', 'GlAccountController@store')->middleware('can:insert_gl_account');
    Route::get('/gl-account/{glAccount}', 'GlAccountController@edit')->name('edit_acc_gl')->middleware('can:edit_gl_account');
    Route::put('/gl-account/{glAccount}', 'GlAccountController@update')->middleware('can:edit_gl_account');
    Route::delete('/gl-account', 'GlAccountController@destroy')->name('softdelete_acc_gl')->middleware('can:delete_gl_account');

    // Bank Account
    Route::get('/bank', 'BankAccountController@index')->name('account.bank')->middleware('can:all_bank_account');
    Route::post('/bank', 'BankAccountController@store')->middleware('can:insert_bank_account');
    Route::get('/bank/{bankAccount}', 'BankAccountController@edit')->name('edit_acc_bank')->middleware('can:edit_bank_account');
    Route::put('/bank/{bankAccount}', 'BankAccountController@update')->middleware('can:edit_bank_account');
    Route::delete('/bank', 'BankAccountController@destroy')->name('softdelete_acc_bank')->middleware('can:delete_bank_account');
});

// Account Report
Route::prefix('dashboard/accounts/report')->group(function () {
    Route::get('/cash-flow', 'AccountReportController@cashflow')->name('account_cash_flow_report');
    Route::get('/balance_sheet', 'AccountReportController@balancesheet')->name('account_balance_sheet_report');
});

Route::prefix('dashboard/hr/employee')->group(function () {
    Route::get('details/{slug}/tax/certificate/download','EmployeeCertificateController@taxdwn')->name('emp_tax_certificate');
    Route::get('details/{slug}/tax/certificate','EmployeeCertificateController@taxpdf')->name('emp_tax_certificate_pdf');

    Route::get('details/{slug}/salary/certificate/download','EmployeeCertificateController@salarydwn')->name('emp_salary_certificate');
    Route::get('details/{slug}/salary/certificate','EmployeeCertificateController@salarypdf')->name('emp_salary_certificate_pdf');

    Route::get('details/{slug}/experiance/certificate/download','EmployeeCertificateController@experiancedwn')->name('emp_experiance_certificate');
    Route::get('details/{slug}/experiance/certificate','EmployeeCertificateController@experiancepdf')->name('emp_experiance_certificate_pdf');

    Route::get('details/{slug}/payslip/certificate/download','EmployeeCertificateController@payslipdwn')->name('emp_payslip_certificate');
    Route::get('details/{slug}/payslip/certificate','EmployeeCertificateController@payslippdf')->name('emp_payslip_certificate_pdf');

    Route::get('details/{slug}/attendance/certificate/download','EmployeeCertificateController@attendancedwn')->name('emp_attendance_certificate');
    Route::get('details/{slug}/attendance/certificate','EmployeeCertificateController@attendancepdf')->name('emp_attendance_certificate_pdf');

    Route::get('details/{slug}/information/download','EmployeeCertificateController@infodwn')->name('emp_information');
    Route::get('details/{slug}/information/certificate','EmployeeCertificateController@infopdf')->name('emp_information_pdf');

    Route::get('details/{slug}/increment-letter/download','EmployeeCertificateController@incldwn')->name('emp_increment_letter');
    Route::get('details/{slug}/increment-letter/certificate','EmployeeCertificateController@inclpdf')->name('emp_increment_letter_pdf');

});

Route::group(['prefix' => 'dashboard/'], function () {
    Route::get('roles', 'PermissionController@roles')->name('roles')->middleware('can:all_role');
    Route::get('role/add', 'PermissionController@roleadd')->name('role.add')->middleware('can:insert_role');
    Route::post('role/insert', 'PermissionController@insert')->name('role.insert')->middleware('can:insert_role');
    Route::get('role/eidt/{id}', 'PermissionController@edit')->name('role.edit')->middleware('can:edit_role');
    Route::get('role/delete/{id}', 'PermissionController@delete')->name('role.delete')->middleware('can:delete_role');
    Route::post('role/update', 'PermissionController@update')->name('role.update')->middleware('can:edit_role');
    Route::post('permission/update', 'PermissionController@permissonupdate')->name('permission.update')->middleware('can:edit_role');
});

Route::group(['prefix' => 'dashboard/company-resolution/'], function () {
    Route::get('all', 'CompanyResolutionController@index')->name('resolutions')->middleware('can:all_role');
    Route::get('create', 'CompanyResolutionController@create')->name('resolution.add')->middleware('can:insert_role');
    Route::post('create', 'CompanyResolutionController@store')->name('save_resolution')->middleware('can:insert_role');
    Route::put('create', 'CompanyResolutionController@update')->name('resolution.update')->middleware('can:edit_role');
    Route::get('edit/{slug}', 'CompanyResolutionController@edit')->name('resolution.edit')->middleware('can:edit_role');
    Route::post('delete/', 'CompanyResolutionController@softdelete')->name('resolution.delete')->middleware('can:edit_role');
});
Route::group(['prefix' => 'dashboard/employee/call/'], function () {
    Route::get('all', 'CallListController@index')->name('calllists');
    Route::get('create', 'CallListController@create')->name('call_add');
    Route::post('create', 'CallListController@store')->name('call_save');
    Route::put('create', 'CallListController@update')->name('call_update');
    Route::get('edit/{slug}', 'CallListController@edit')->name('call_edit');
    Route::post('delete/', 'CallListController@softdelete')->name('call_delete');
});
Route::group(['prefix' => 'dashboard/employee/salary/'], function () {
    Route::get('salary-sheet', 'SalaryScaleController@salarysheet')->name('employee_salary_sheet');
    Route::get('bank-sheet', 'SalaryScaleController@banksheet')->name('employee_salary_bank_sheet');
    Route::get('cash-sheet', 'SalaryScaleController@cashsheet')->name('employee_salary_cash_sheet');
});
Route::group(['prefix' => 'dashboard/employee/'], function () {
    Route::get('active', 'EmployeeController@activeemployeelist')->name('employee_active_list');
    Route::get('cash-sheet', 'SalaryScaleController@cashsheet')->name('employee_salary_cash_sheet');
    Route::get('bonus-transfer', 'SalaryScaleController@bonussheet')->name('employee_bonus_sheet');
});

Route::group(['prefix' => 'dashboard/'], function () {
    Route::get('loan/application', 'ApplicationController@loan')->name('apply.loan');
    Route::get('leave/application', 'ApplicationController@leave')->name('apply.leave');
});

Route::prefix('dashboard/student/hear/bsb')->group(function () {
    Route::get('/create', 'HearBsbController@create')->name('add_hear_bsb');
    Route::post('/create', 'HearBsbController@store')->name('save_hear_bsb');
    Route::put('/create', 'HearBsbController@update')->name('save_hear_bsb');
    Route::get('/all', 'HearBsbController@index')->name('all_hear_bsb');
    Route::get('/edit/{id}', 'HearBsbController@edit')->name('edit_hear_bsb');
    Route::get('/delete/{id}', 'HearBsbController@delete')->name('delete_hear_bsb');
});
