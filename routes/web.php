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
Route::get('/','HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', 'Front\JobsController@index')->name('front.jobs');
Route::get('/jobs/details/{id}', 'Front\JobsController@details')->name('front.jobdetails');
Route::get('/jobs/create/', 'Front\JobsController@create')->name('front.apply');
Route::post('/jobs/store', 'Front\JobsController@store')->name('front.store');
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});
//Home
Route::get('/','Front\HomeController@index')->name('index');
Route::get('/front/login','Front\HomeController@login')->name('Job_Login');
Route::get('/sign-up','Front\HomeController@signUp')->name('signup');
Route::post('/sign-up','Auth\RegisterController@register')->name('job_register');
Route::get('front/login','Front\HomeController@login')->name('front.login');
Route::post('front/login', 'Auth\LoginController@loginUser');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/profile/{id}','Front\FrontUserController@edit')->name('UpdateUser');
Route::post('/updateProfile/{id}','Front\FrontUserController@update')->name('ProfileUpdate');
Route::post('/changePassword/{id}','Front\FrontUserController@ChangePassword')->name('ChangePassword');

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

/****
 * ADMIN
 * ROUTES
 * */

Route::get('/admin', 'Admin\HomeController@index')->name('admin.home');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/home', 'Admin\HomeController@index')->name('admin.home');

    //Users
    Route::get('/users', 'Admin\UsersController@index')->name('users');
    Route::get('/addUser', 'Admin\UsersController@addUser')->name('addUser');
    Route::post('/DoAddUser', 'Admin\UsersController@DoAddUser')->name('DoAddUser');
    Route::get('/editUser/{id}/{tab?}', 'Admin\UsersController@editUser')->name('editUser');
    Route::post('/DoEditUserConfiguration/{id}', 'Admin\UsersController@DoEditUserConfiguration')->name('DoEditUserConfiguration');
    Route::post('/DoChangePassword/{id}', 'Admin\UsersController@DoChangePassword')->name('DoChangePassword');
    Route::post('/DoEditUser/{id}', 'Admin\UsersController@DoEditUser')->name('DoEditUser');
    Route::post('/CheckDublicateUser', 'Admin\UsersController@CheckDublicateUser')->name('CheckDublicateUser');
    Route::post('/CheckDublicateUsername', 'Admin\UsersController@CheckDublicateUsername')->name('CheckDublicateUsername');
    Route::get('/DeleteUser/{id}', 'Admin\UsersController@DeleteUser')->name('DeleteUser');
    Route::get('/UserList', 'Admin\UsersController@UserList')->name('UserList');

    // Profile
    Route::get('/profile/{id}/{tab?}', 'Admin\HomeController@adminProfile')->name('profile');
    Route::post('/AdminChangePassword/{id}', 'Admin\HomeController@AdminChangePassword')->name('AdminChangePassword');
    Route::post('/DoEditAdmin/{id}', 'Admin\HomeController@DoEditAdmin')->name('DoEditAdmin');

    /** Users Ends */
    //Menus
    Route::get('/ManageMenus/{id}', 'Admin\MainMenusController@ManageMenus')->name('ManageMenus');
    Route::post('/menu_insert', 'Admin\MainMenusController@menu_insert')->name('menu_insert');
    Route::post('/menu_save', 'Admin\MainMenusController@menu_save')->name('menu_save');
    Route::post('/menu_delete', 'Admin\MainMenusController@menu_delete')->name('menu_delete');
    /**Menus Ends */

    //Roles
    Route::get('/RolePermissions/{id}/{parent}', 'Admin\RolesController@RolePermissions')->name('RolePermissions');
    Route::get('/display_access', 'Admin\RolesController@display_access')->name('display_access');
    /**Ends */
    //SlidersController
    Route::get('/datatable/SlidersList/', 'Admin\SlidersController@SlidersList')->name('datatable.SlidersList');

    //PagesController
    Route::get('/datatable/PagesList/', 'Admin\PagesController@PagesList')->name('datatable.PagesList');


    Route::resources([
        'menus' => 'Admin\MainMenusController',
        'roles' => 'Admin\RolesController',
        'settings' => 'Admin\SettingController',
        'sliders' => 'Admin\SlidersController',
        'home_page_settings' => 'Admin\HomePageSettingsController',
        'pages' => 'Admin\PagesController',
        'categories'=> 'Admin\CategoriesController',
        'working_hours'=>'Admin\WorkingHoursController',
        'contracts' => 'Admin\ContractsController',
        'experience_levels' => 'Admin\Experience_LevelsController',
        'jobs' => 'Admin\JobsController',
        'job_offer'=> 'Admin\JobsOfferController',
        'contactUs'=>'Admin\ContactUsController'
        
    ]);

    //Categories
    Route::get('datatable/categories','Admin\CategoriesController@CategoriesList')->name('CategoriesList');


    //Working Hours
    Route::get('datatable/working_hours','Admin\WorkingHoursController@WorkingHoursList')->name('WorkingHoursList');

    //Contracts
    Route::get('datatable/contracts','Admin\ContractsController@ContractsList')->name('ContractsList');

    //Contracts
    Route::get('datatable/experience_levels','Admin\Experience_LevelsController@ExperienceLevelsList')->name('ExperienceLevelsList');

    //Jobs
    Route::get('datatable/jobs','Admin\JobsController@JobsList')->name('JobsList');
    Route::get('/addJobs', 'Admin\JobsController@addJobs')->name('addJobs');
    Route::get('/editJobs/{id}', 'Admin\JobsController@editJobs')->name('editJobs');
    Route::get('/approve-job/{id}', 'Admin\JobsController@jobApprove')->name('approve');
    Route::get('/viewApplicants/{id}','Admin\JobsController@viewApplicants')->name('viewApplicants');
    Route::get('/download/{id}','Admin\JobsController@DownloadResume')->name('DownloadResume');
});


