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

Route::get('dashboard/user', 'UserController@index')->name('');
Route::get('dashboard/user/add', 'UserController@add')->name('');
Route::post('dashboard/user/submit', 'UserController@insert')->name('');

Route::prefix('dashboard/student/guest')->group(function () {
    Route::get('/create', 'GuestStudentController@create')->name('add_guest_student');
    Route::post('/create', 'GuestStudentController@store')->name('save_guest_student');
    Route::put('/create', 'GuestStudentController@update')->name('save_guest_student');
    Route::put('/details/{slug}', 'GuestStudentController@view')->name('view_guest_student');
    Route::get('/all', 'GuestStudentController@index')->name('all_guest_student');
    Route::get('/edit/{id}', 'GuestStudentController@edit')->name('edit_guest_student');
    Route::get('/delete/{id}', 'GuestStudentController@destroy')->name('delete_guest_student');
});

Route::prefix('dashboard/student/admission')->group(function () {
    Route::get('/create', 'GuestStudentController@admissioncreate')->name('add_student_admission');
    Route::post('/create', 'GuestStudentController@admissionstore')->name('save_student_admission');
    Route::put('/create', 'GuestStudentController@admissionupdate')->name('save_student_admission');

});
route::get('dashboard/get/country/{id}', 'GuestStudentController@getuniversity');
route::get('dashboard/get/course-category/{id}', 'GuestStudentController@getcoursecategory');
route::post('dashboard/get/course/', 'GuestStudentController@getcourse');

Route::get('dashboard/country', 'CountryController@index')->name('');
Route::get('dashboard/country/add', 'CountryController@add')->name('');
Route::get('dashboard/country/edit/{slug}', 'CountryController@edit')->name('');
Route::get('dashboard/country/view/{slug}', 'CountryController@view')->name('');
Route::post('dashboard/country/submit', 'CountryController@insert')->name('');
Route::post('dashboard/country/update', 'CountryController@update')->name('');
Route::post('dashboard/country/softdelete', 'CountryController@softdelete')->name('');

Route::get('dashboard/university', 'UniversityController@index')->name('');
Route::get('dashboard/university/add', 'UniversityController@add')->name('');
Route::get('dashboard/university/edit/{slug}', 'UniversityController@edit')->name('');
Route::get('dashboard/university/view/{slug}', 'UniversityController@view')->name('');
Route::post('dashboard/university/submit', 'UniversityController@insert')->name('');
Route::post('dashboard/university/update', 'UniversityController@update')->name('');
Route::post('dashboard/university/uniprogram', 'UniversityController@uniprogram')->name('');

Route::get('dashboard/university/program', 'UniversityProgramController@index')->name('');
Route::get('dashboard/university/program/add', 'UniversityProgramController@add')->name('');
Route::get('dashboard/university/program/edit/{slug}', 'UniversityProgramController@edit')->name('');
Route::get('dashboard/university/program/view/{slug}', 'UniversityProgramController@view')->name('');
Route::post('dashboard/university/program/submit', 'UniversityProgramController@insert')->name('');
Route::post('dashboard/university/program/update', 'UniversityProgramController@update')->name('');
Route::post('dashboard/university/program/softdelete', 'UniversityProgramController@softdelete')->name('');

Route::get('dashboard/university/program/category', 'UniversityProgramCategoryController@index')->name('');
Route::get('dashboard/university/program/category/add', 'UniversityProgramCategoryController@add')->name('');
Route::get('dashboard/university/program/category/edit/{slug}', 'UniversityProgramCategoryController@edit')->name('');
Route::get('dashboard/university/program/category/view/{slug}', 'UniversityProgramCategoryController@view')->name('');
Route::post('dashboard/university/program/category/submit', 'UniversityProgramCategoryController@insert')->name('');
Route::post('dashboard/university/program/category/update', 'UniversityProgramCategoryController@update')->name('');
Route::post('dashboard/university/program/category/softdelete', 'UniversityProgramCategoryController@softdelete')->name('');

Route::prefix('dashboard/hr/employee')->group(function () {
    Route::get('/create', 'EmployeeController@add')->name('add_employee');
    Route::post('/create', 'EmployeeController@insert')->name('save_employee');
    Route::put('/create', 'EmployeeController@update')->name('save_employee');
    Route::get('/all', 'EmployeeController@index')->name('all_employee');
    Route::get('/details/{slug}', 'EmployeeController@view')->name('view_employee');
    Route::get('/details/{slug}/personal', 'EmployeeController@view')->name('view_employee_personal');
    Route::get('/details/{slug}/academic', 'EmployeeController@view')->name('view_employee_academic');
    Route::get('/details/{slug}/traininig', 'EmployeeController@view')->name('view_employee_training');
    Route::get('/details/{slug}/experience', 'EmployeeController@view')->name('view_employee_experience');
    Route::get('/details/{slug}/credential', 'EmployeeController@view')->name('view_employee_credential');
    Route::get('/details/{slug}/official', 'EmployeeController@view')->name('view_employee_official');
    Route::get('/details/{slug}/contact', 'EmployeeController@view')->name('view_employee_contact');
    Route::get('/details/{slug}/statements', 'EmployeeController@view')->name('view_employee_statements');
    Route::get('/details/{slug}/providentfund', 'EmployeeController@view')->name('view_employee_providentfund');
    Route::get('/details/{slug}/commission', 'EmployeeController@view')->name('view_employee_commission');
    Route::get('/details/{slug}/advancesalary', 'EmployeeController@view')->name('view_employee_advancesalary');
    Route::get('/edit/{slug}', 'EmployeeController@edit')->name('edit_employee');
    Route::post('/official', 'EmployeeController@officialupdate')->name('official_update');
    Route::post('/providentfund', 'EmployeeController@providentfundupdate')->name('providentfund_update');
    Route::post('/commission', 'EmployeeController@commissionupdate')->name('commission_update');
    Route::post('/advancesalary', 'EmployeeController@advancesalaryupdate')->name('advancesalary_update');
    Route::post('/contact', 'EmployeeController@contactupdate')->name('contact_update');
    Route::post('/', 'EmployeeController@softdelete')->name('softdelete_employee');
    Route::post('/restore', 'EmployeeController@restore')->name('restore_employee');
    Route::delete('/', 'EmployeeController@delete')->name('delete_employee');
});

    Route::get('dashboard/hr/counsellor/all','EmployeeController@allcounsellor')->name('all_counsellor');
    Route::get('dashboard/hr/agent/all','EmployeeController@allagent')->name('all_agent');
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
    Route::get('/create', 'DepartmentController@create')->name('add_department');
    Route::post('/create', 'DepartmentController@store')->name('save_department');
    Route::put('/create', 'DepartmentController@update')->name('save_department');
    Route::get('/all', 'DepartmentController@index')->name('all_department');
    Route::get('/edit/{slug}', 'DepartmentController@edit')->name('edit_department');
    Route::post('/', 'DepartmentController@softdelete')->name('softdelete_department');
    Route::post('/restore', 'DepartmentController@restore')->name('restore_department');
    Route::delete('/', 'DepartmentController@destroy')->name('delete_department');
});

Route::prefix('dashboard/hr/branch')->group(function () {
    Route::get('/create', 'BranchController@create')->name('add_branch');
    Route::post('/create', 'BranchController@store')->name('save_branch');
    Route::put('/create', 'BranchController@update')->name('save_branch');
    Route::get('/all', 'BranchController@index')->name('all_branch');
    Route::get('/edit/{id}', 'BranchController@edit')->name('edit_branch');
    Route::post('/', 'BranchController@softdelete')->name('softdelete_branch');
    Route::post('/restore', 'BranchController@restore')->name('restore.branch');
    Route::delete('/', 'BranchController@destroy')->name('delete_branch');
});

Route::prefix('dashboard/hr/shift')->group(function () {
    Route::get('/create', 'ShiftController@create')->name('add_shift');
    Route::post('/create', 'ShiftController@store')->name('save_shift');
    Route::put('/create', 'ShiftController@update')->name('save_shift');
    Route::get('/all', 'ShiftController@index')->name('all_shift');
    Route::get('/edit/{id}', 'ShiftController@edit')->name('edit_shift');
    Route::post('/', 'ShiftController@softdelete')->name('softdelete_shift');
    Route::post('/restore', 'ShiftController@restore')->name('restore.shift');
    Route::delete('/', 'ShiftController@destroy')->name('delete_shift');
});

Route::prefix('dashboard/hr/emp_nature')->group(function () {
    Route::get('/create', 'EmpNatureController@create')->name('add_emp_nature');
    Route::post('/create', 'EmpNatureController@store')->name('save_emp_nature');
    Route::put('/create', 'EmpNatureController@update')->name('save_emp_nature');
    Route::get('/all', 'EmpNatureController@index')->name('all_emp_nature');
    Route::get('/edit/{id}', 'EmpNatureController@edit')->name('edit_emp_nature');
    Route::post('/', 'EmpNatureController@softdelete')->name('softdelete_emp_nature');
    Route::post('/restore', 'EmpNatureController@restore')->name('restore.emp_nature');
    Route::delete('/', 'EmpNatureController@destroy')->name('delete_emp_nature');
});

Route::prefix('dashboard/hr/pay_type')->group(function () {
    Route::get('/create', 'PayTypeController@create')->name('add_pay_type');
    Route::post('/create', 'PayTypeController@store')->name('save_pay_type');
    Route::get('/all', 'PayTypeController@index')->name('all_pay_type');
    Route::post('/all', 'PayTypeController@softdelete')->name('softdelete_pay_type');
    Route::post('/restore', 'PayTypeController@restore')->name('restore_pay_type');
    Route::delete('/all', 'PayTypeController@destroy')->name('delete_pay_type');
});

Route::prefix('dashboard/hr/emp_status')->group(function () {
    Route::get('/create', 'EmpStatusController@create')->name('add_emp_status');
    Route::post('/create', 'EmpStatusController@store')->name('save_emp_status');
    Route::put('/create', 'EmpStatusController@update')->name('save_emp_status');
    Route::get('/all', 'EmpStatusController@index')->name('all_emp_status');
    Route::get('/edit/{id}', 'EmpStatusController@edit')->name('edit_emp_status');
    Route::post('/', 'EmpStatusController@softdelete')->name('softdelete_emp_status');
    Route::post('/restore', 'EmpStatusController@restore')->name('restore.emp_status');
    Route::delete('/', 'EmpStatusController@destroy')->name('delete_emp_status');
});

Route::prefix('dashboard/hr/salary_scale')->group(function () {
    Route::get('/string', 'SalaryScaleController@salaryString')->name('salary_string');
    Route::post('/string', 'SalaryScaleController@addSalaryString')->name('add_salary_string');
    Route::get('/create', 'SalaryScaleController@create')->name('add_salary_scale');
    Route::post('/create', 'SalaryScaleController@store')->name('save_salary_scale');
    Route::put('/create', 'SalaryScaleController@update')->name('save_salary_scale');
    Route::get('/all', 'SalaryScaleController@index')->name('all_salary_scale');
    Route::get('/edit/{id}', 'SalaryScaleController@edit')->name('edit_salary_scale');
    Route::post('/delete', 'SalaryScaleController@softdelete')->name('softdelete_salary_scale');
    Route::post('/', 'SalaryScaleController@restore')->name('srestore.scale');
    Route::delete('/', 'SalaryScaleController@destroy')->name('delete_salary_scale');
});

Route::prefix('dashboard/hr/designation')->group(function () {
    Route::get('/create', 'DesignationController@create')->name('add_designation');
    Route::post('/create', 'DesignationController@store')->name('save_designation');
    Route::put('/create', 'DesignationController@update')->name('save_designation');
    Route::get('/all', 'DesignationController@index')->name('all_designation');
    Route::get('/edit/{id}', 'DesignationController@edit')->name('edit_designation');
    Route::post('/', 'DesignationController@softdelete')->name('softdelete_designation');
    Route::post('/restore', 'DesignationController@restore')->name('restore.designation');
    Route::delete('/', 'DesignationController@destroy')->name('delete_designation');
});

Route::prefix('dashboard/hr/attendanc')->group(function () {
    Route::get('/create', 'EmployeeAttendancController@index')->name('employee.attendanc');
    Route::post('/create', 'EmployeeAttendancController@create')->name('employee.attendanc.create');
    Route::post('/store', 'EmployeeAttendancController@store')->name('employee.attendanc.store');
    Route::get('/absent/{id}', 'EmployeeAttendancController@absent')->name('employee.absent');

    Route::get('/day-wish-attendanc', 'EmployeeAttendancController@dayWishAttendanc')->name('employee.daywishattendanc');
    Route::post('/day-wish-attendanc', 'EmployeeAttendancController@dayWishAttendancview')->name('employee.daywishattendancview');

    Route::get('/employee-wish-attendanc', 'EmployeeAttendancController@employeeWishAttendanc')->name('employee.wishattendanc');
    Route::post('/employee-wish-attendanc', 'EmployeeAttendancController@employeeWishAttendancview')->name('employee.wishattendancview');
    Route::post('/getajax-employee', 'EmployeeAttendancController@getajaxEmployee')->name('employee.getAjax');
});

Route::prefix('dashboard/hr/holiday')->group(function () {
    Route::get('/create', 'HolidayController@create')->name('add_holiday');
    Route::post('/create', 'HolidayController@store')->name('save_holiday');
    Route::put('/create', 'HolidayController@update')->name('save_holiday');
    Route::get('/all', 'HolidayController@index')->name('all_holiday');
    Route::get('/edit/{id}', 'HolidayController@edit')->name('edit_holiday');
    Route::post('/', 'HolidayController@softdelete')->name('softdelete_holiday');
    Route::post('/restore', 'HolidayController@restore')->name('restore_holiday');
    Route::delete('/', 'HolidayController@destroy')->name('delete_holiday');
});

Route::prefix('dashboard/hr/employeeleave')->group(function () {
    Route::get('/create', 'EmployeeLeaveController@create')->name('add_emp_leave');
    Route::post('/create', 'EmployeeLeaveController@store')->name('save_emp_leave');
    Route::put('/create', 'EmployeeLeaveController@update')->name('save_emp_leave');
    Route::get('/all', 'EmployeeLeaveController@index')->name('all_emp_leave');
    Route::get('/edit/{id}', 'EmployeeLeaveController@edit')->name('edit_emp_leave');
    Route::post('/', 'EmployeeLeaveController@softdelete')->name('softdelete_emp_leave');
    Route::post('/restore', 'EmployeeLeaveController@restore')->name('restore_emp_leave');
    Route::delete('/', 'EmployeeLeaveController@destroy')->name('delete_emp_leave');
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
    Route::get('/create', 'LeaveController@create')->name('add_leave');
    Route::post('/create', 'LeaveController@store')->name('save_leave');
    Route::put('/create', 'LeaveController@update')->name('save_leave');
    Route::get('/all', 'LeaveController@index')->name('all_leave');
    Route::get('/edit/{id}', 'LeaveController@edit')->name('edit_leave');
    Route::post('/', 'LeaveController@softdelete')->name('softdelete_leave');
    Route::post('/restore', 'LeaveController@restore')->name('restore_leave');
    Route::delete('/', 'LeaveController@destroy')->name('delete_leave');
});

Route::prefix('dashboard/hr/resignation')->group(function () {
    Route::get('/create', 'ResignationController@create')->name('add_resignation');
    Route::post('/create', 'ResignationController@store')->name('save_resignation');
    Route::put('/create', 'ResignationController@update')->name('save_resignation');
    Route::get('/all', 'ResignationController@index')->name('all_resignation');
    Route::get('/edit/{id}', 'ResignationController@edit')->name('edit_resignation');
    Route::post('/', 'ResignationController@softdelete')->name('softdelete_resignation');
    Route::post('/restore', 'ResignationController@restore')->name('restore_resignation');
    Route::delete('/', 'ResignationController@destroy')->name('delete_resignation');
});

Route::prefix('dashboard/hr/termination')->group(function () {
    Route::get('/create', 'TerminationController@create')->name('add_termination');
    Route::post('/create', 'TerminationController@store')->name('save_termination');
    Route::put('/create', 'TerminationController@update')->name('save_termination');
    Route::get('/all', 'TerminationController@index')->name('all_termination');
    Route::get('/edit/{id}', 'TerminationController@edit')->name('edit_termination');
    Route::post('/', 'TerminationController@softdelete')->name('softdelete_termination');
    Route::post('/restore', 'TerminationController@restore')->name('restore_termination');
    Route::delete('/', 'TerminationController@destroy')->name('delete_termination');
});

Route::prefix('dashboard/hr/employee')->group(function () {
    Route::get('/report', 'EmployeeReportController@report')->name('employee_report');
    Route::post('/report', 'EmployeeReportController@searchreport')->name('employee_report_search');
    Route::get('/report/export', 'EmployeeReportController@reportexport')->name('employee_report_export');
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
    Route::get('/create', 'ClientSatisfactionQuestionController@create')->name('add_cs_question');
    Route::post('/create', 'ClientSatisfactionQuestionController@store')->name('save_cs_question');
    Route::put('/create', 'ClientSatisfactionQuestionController@update')->name('save_cs_question');
    Route::get('/all', 'ClientSatisfactionQuestionController@index')->name('all_cs_question');
    Route::get('/edit/{id}', 'ClientSatisfactionQuestionController@edit')->name('edit_cs_question');
    Route::delete('/', 'ClientSatisfactionQuestionController@destroy')->name('delete_cs_question');
    Route::post('/publish', 'ClientSatisfactionQuestionController@publish')->name('publish_cs_question');
    Route::post('/unpublish', 'ClientSatisfactionQuestionController@unpublish')->name('unpublish_cs_question');
});

Route::prefix('dashboard/client-staisfaction/survey')->group(function () {
    Route::get('/create', 'ClientSatisfactionSurveyController@create')->name('add_cs_survey');
    Route::post('/create', 'ClientSatisfactionSurveyController@store')->name('save_cs_survey');
    Route::put('/create', 'ClientSatisfactionSurveyController@update')->name('save_cs_survey');
    Route::get('/all', 'ClientSatisfactionResponseController@index')->name('all_cs_survey');
    Route::get('/view/{id}', 'ClientSatisfactionResponseController@view')->name('view_cs_survey');
});

Route::prefix('dashboard/complain')->group(function () {
    Route::get('/create', 'ClientSatisfactionSurveyController@complaincreate')->name('add_complain');
    Route::post('/create', 'ClientSatisfactionSurveyController@complainstore')->name('save_complain');
    Route::get('/all', 'ComplainController@index')->name('all_complain');
    Route::get('/view/{id}', 'ComplainController@view')->name('view_complain');
    Route::get('/edit/{id}', 'ComplainController@edit')->name('edit_complain');
    Route::get('/solve/{id}', 'ComplainController@solve')->name('solve_complain');
    Route::get('/pending/{id}', 'ComplainController@pending')->name('pending_complain');
    Route::delete('/', 'ComplainController@destroy')->name('delete_complain');
});

Route::prefix('dashboard/event')->group(function () {
    Route::get('/create', 'EventManagementController@create')->name('add_event');
    Route::post('/create', 'EventManagementController@store')->name('save_event');
    Route::put('/create', 'EventManagementController@update')->name('save_event');
    Route::get('/all', 'EventManagementController@index')->name('all_event');
    Route::get('/edit/{id}', 'EventManagementController@edit')->name('edit_event');
    Route::get('/view/{id}', 'EventManagementController@view')->name('view_event');
    Route::post('/softdelete', 'EventManagementController@softdelete')->name('softdelete_event');
    Route::post('/restore', 'EventManagementController@restore')->name('restore_event');
    Route::get('/delete/{id}', 'EventManagementController@destroy')->name('delete_event');
});

Route::prefix('dashboard/ad-details')->group(function () {
    Route::get('/create', 'AdDetailsController@create')->name('add_ads');
    Route::post('/create', 'AdDetailsController@store')->name('save_ads');
    Route::put('/create', 'AdDetailsController@update')->name('save_ads');
    Route::get('/all', 'AdDetailsController@index')->name('all_ads');
    Route::get('/edit/{id}', 'AdDetailsController@edit')->name('edit_ads');
    Route::get('/view/{id}', 'AdDetailsController@view')->name('view_ads');
    Route::post('/softdelete', 'AdDetailsController@softdelete')->name('softdelete_ads');
    Route::post('/restore', 'AdDetailsController@restore')->name('restore_ads');
    Route::get('/delete/{id}', 'AdDetailsController@destroy')->name('delete_ads');
});

Route::prefix('dashboard/loan-details')->group(function () {
    Route::get('/create', 'LoanDetailsController@create')->name('add_loan');
    Route::post('/create', 'LoanDetailsController@store')->name('save_loan');
    Route::put('/create', 'LoanDetailsController@update')->name('save_loan');
    Route::get('/all', 'LoanDetailsController@index')->name('all_loan');
    Route::get('/edit/{id}', 'LoanDetailsController@edit')->name('edit_loan');
    Route::get('/view/{id}', 'LoanDetailsController@view')->name('view_loan');
    Route::post('/softdelete', 'LoanDetailsController@softdelete')->name('softdelete_loan');
    Route::post('/restore', 'LoanDetailsController@restore')->name('restore_loan');
    Route::get('/delete/{id}', 'LoanDetailsController@destroy')->name('delete_loan');
});

Route::prefix('dashboard/installment-details')->group(function () {
    Route::get('/create', 'InstallmentDetailsController@create')->name('add_installment');
    Route::post('/create', 'InstallmentDetailsController@store')->name('save_installment');
    Route::put('/create', 'InstallmentDetailsController@update')->name('save_installment');
    Route::get('/all', 'InstallmentDetailsController@index')->name('all_installment');
    Route::get('/edit/{id}', 'InstallmentDetailsController@edit')->name('edit_installment');
    Route::get('/view/{id}', 'InstallmentDetailsController@view')->name('view_installment');
    Route::post('/softdelete', 'InstallmentDetailsController@softdelete')->name('softdelete_installment');
    Route::post('/restore', 'InstallmentDetailsController@restore')->name('restore_installment');
    Route::get('/delete/{id}', 'InstallmentDetailsController@destroy')->name('delete_installment');
    Route::post('/getajax-loan', 'InstallmentDetailsController@getajaxLoan')->name('loan.getAjax');
});

Route::prefix('dashboard/student')->group(function () {
    Route::get('/create', 'StudentController@create')->name('add_student');
    Route::post('/create', 'StudentController@store')->name('save_student');
    Route::put('/create', 'StudentController@update')->name('save_student');
    Route::get('/all', 'StudentController@index')->name('all_student');
    Route::get('/details/{slug}', 'StudentController@view')->name('view_student');
    Route::get('/details/{slug}/document/', 'StudentController@view')->name('view_student_document');
    Route::get('/details/{slug}/academic/', 'StudentController@view')->name('view_student_academic');
    Route::get('/details/{slug}/personal/', 'StudentController@view')->name('view_student_personal');
    Route::get('/details/{slug}/visa/', 'StudentController@view')->name('view_student_visa');
    Route::get('/details/{slug}/admission/', 'StudentController@view')->name('view_student_admission');
    Route::get('/details/{slug}/account/', 'StudentController@view')->name('view_student_account');
    Route::get('/details/{slug}/passport/', 'StudentController@view')->name('view_student_passport');
    Route::get('/details/{slug}/visa/', 'StudentController@view')->name('view_student_visa');
    Route::get('/edit/{id}', 'StudentController@edit')->name('edit_student');
    Route::post('/passport', 'StudentController@passportupdate')->name('passport_update');
    Route::post('/', 'StudentController@softdelete')->name('softdelete_student');
    Route::post('/restore', 'StudentController@restore')->name('restore_student');
    Route::delete('/', 'StudentController@destroy')->name('delete_student');

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
// Accounts
Route::prefix('dashboard/accounts')->group(function () {
    Route::get('/payment', 'PaymentsController@index')->name('payment');
    Route::get('/deposit', 'PaymentsController@deposit')->name('deposit');
    Route::get('/transfer', 'PaymentsController@transfer')->name('transfer');
    Route::get('/reconcile', 'PaymentsController@reconcile')->name('reconcile');
    Route::get('/journal-inquery', 'PaymentsController@journalInquiry')->name('journalInquiry');
    Route::get('/gl-inquery', 'PaymentsController@glInquiry')->name('glInquiry');
    Route::get('/bank-inquery', 'PaymentsController@bankInquiry')->name('bankInquiry');

    // Journal Entry
    Route::get('/gl/entry/all', 'JournalController@index')->name('gl.entry.all');
    Route::get('/gl/entry', 'JournalController@create')->name('gl.entry');
    Route::post('/gl/entry', 'JournalController@store')->name('gl.entry.store');
    Route::put('/gl/entry', 'JournalController@update')->name('gl.entry.update');
    Route::get('/gl/entry/edit/{id}', 'JournalController@edit')->name('gl.entry.edit');
    Route::post('/gl/entry/softdelete', 'JournalController@softdelete')->name('gl.entry.softdelete');

    // account Class
    Route::get('/class', 'AccountClassController@index')->name('account.class');
    Route::post('/class', 'AccountClassController@store');
    Route::get('/class/{accountClass}', 'AccountClassController@edit')->name('edit_acc_class');
    Route::put('/class/{accountClass}', 'AccountClassController@update');
    Route::delete('/class', 'AccountClassController@destroy')->name('softdelete_acc_class');

    // Account Group
    Route::get('/group', 'AccountGroupController@index')->name('account.group');
    Route::post('/group', 'AccountGroupController@store');
    Route::get('/group/{accountGroup}', 'AccountGroupController@edit')->name('edit_acc_group');
    Route::put('/group/{accountGroup}', 'AccountGroupController@update');
    Route::delete('/group', 'AccountGroupController@destroy')->name('softdelete_acc_group');

    // GL Account
    Route::get('/gl-account', 'GlAccountController@index')->name('account.gl');
    Route::post('/gl-account', 'GlAccountController@store');
    Route::get('/gl-account/{glAccount}', 'GlAccountController@edit')->name('edit_acc_gl');
    Route::put('/gl-account/{glAccount}', 'GlAccountController@update');
    Route::delete('/gl-account', 'GlAccountController@destroy')->name('softdelete_acc_gl');

    // Bank Account
    Route::get('/bank', 'BankAccountController@index')->name('account.bank');
    Route::post('/bank', 'BankAccountController@store');
    Route::get('/bank/{bankAccount}', 'BankAccountController@edit')->name('edit_acc_bank');
    Route::put('/bank/{bankAccount}', 'BankAccountController@update');
    Route::delete('/bank', 'BankAccountController@destroy')->name('softdelete_acc_bank');
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

});

Route::group(['prefix' => 'dashboard/'], function () {
    Route::get('roles', 'PermissionController@roles')->name('roles');
    Route::get('role/add', 'PermissionController@roleadd')->name('role.add');
    Route::post('role/insert', 'PermissionController@insert')->name('role.insert');
    Route::get('role/eidt/{id}', 'PermissionController@edit')->name('role.edit');
    Route::post('role/update', 'PermissionController@update')->name('role.update');
    Route::post('permission/update', 'PermissionController@permissonupdate')->name('permission.update');

});
