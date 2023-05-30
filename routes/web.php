<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\DispatcherController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\IncomeStaffController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DispatcherDashboardController;

use App\Http\Controllers\DriverDashboardController;
use App\Http\Controllers\SubscriptionController;
use App\Models\OrderTrackingLog;
use App\Http\Controllers\SuperDashboardController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\StaffDashboardController;



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


// LOGIN PAGE
// Route::get('/', function () {
//     return view('login/index');
// });

// // REGISTER ACCOUNT PAGE
// Route::get('/register', function () {
//     return view('login/register');
// });


Route::get('/', function () {
    return view('welcome');
});


/* Profile Tab */
/*  Route::get('/', function () {
   return view('staff_panel.profile.user');
});   */


/* Users Tab */
Route::get('/userpanel/orderHistory', function () {
   return view('userpanel.orderHistory');
});

/* Company Tab */

Route::get('/company/history/orderHistory', function () {
   return view('company.history.orderHistory');
});


/* Drivers Tab */
Route::get('/driver/qr', function () {
   return view('driver_panel.driver');
});


Route::get('/driver/history', function () {
   return view('driver_panel.deliverHistory');
});

/* Dispatcher Tab */
Route::get('/dispatcher/qr', function () {
   return view('dispatcher_panel.dispatcher');
});


Route::get('/dispatcher/history', function () {
   return view('dispatcher_panel.dispatchHistory');
});

/* Staff Tab */

Route::get('/staff/advance_freight/index', function () {
    return view('staff_panel.advance_freight.index');
 });

 /* Contact Us */
Route::post('/contactUS', [QueryController::class, 'save'])->name('sendQuery');


Auth::routes(['verify' => true]);

//Company registration account
Route::get('company_registration', function () {
    return view('registerCompany');
});
Route::post(
    'company_registration/addCompany',
    [CompaniesController::class, 'addCompany']
)->name('add.company');


// Authenticated Account Routes
Route::middleware('auth')->group(function () {
    // Lock Account
    Route::get('/users/status/{user_id}/{status_code}', [UsersController::class, 'updateStatus'])->name('users.status.update');

    // Lock Account CRUD
    Route::get('/drivers/status/{user_id}/{status_code}', [DriverController::class, 'updateStatus'])->name('driver.status.update');
    Route::get('/dispatcher/status/{user_id}/{status_code}', [DispatcherController::class, 'updateStatus'])->name('dispatcher.status.update');
    Route::get('/staff/status/{user_id}/{status_code}', [StaffController::class, 'updateStatus'])->name('staff.status.update');
    Route::get('/icargo/companies/status/{user_id}/{status_code}', [CompaniesController::class, 'updateStatus'])->name('company.status.update');

    // Change Password
    Route::get('settings/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');
});

// User/Customer Panel
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])
        ->name('dashboard')->middleware("verified");

    //Edit Profile
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/user/edit_profile/{id}', 'index_edit')->name('edit_profile');
        Route::post('/user/edit_profile/{id}', 'edit_profile')->name('edit');
        Route::post('/user/upload_photo/{id}', 'upload_photo')->name('upload_photo');
        Route::get('/customer-info', 'getCustomerInfo');
    });

    //Order Routes
    Route::controller(ShipmentController::class)->group(function () {
        Route::get('/user/order', 'userIndex')->name('userOrderPanel');
        Route::post('/user/add_order', 'addOrder')->name('addOrder');
        Route::get('/user/order_history', 'orderHistory_user')->name('orderHistory.user');
        Route::get('/user/edit_order/{id}', 'edit_order')->name('edit_order');
        Route::put('/user/edit_order/{id}/submit', 'update_order')->name('update_order');
        Route::get('/user/view_shipment/{id}', 'viewOrder')->name('viewOrder');
        Route::get('/user/track_order/{id}', 'trackOrder')->name('trackOrder');
        Route::put('/user/accept_bid/{id}', 'acceptBid')->name('acceptBid');
        Route::put('/user/cancel_order/{id}', 'cancelOrder')->name('cancelOrder');
        Route::get('/user/invoice/{id}', 'viewInvoice')->name('user.generate');
        Route::get('/user/waybill/{id}', 'viewWaybill')->name('user.generateWaybill');
    });
});

// Company Manager Panel
Route::middleware(['auth', 'user-access:company'])->group(function () {
    Route::get('/company/dashboard', [IncomeController::class, 'index'])
        ->name('company.dashboard')->middleware('verified');

    // profile page
    Route::get('/company/profile', [CompaniesController::class, 'profile'])->name('company.profile');
    Route::put('/company/profile/{id}/submit', [CompaniesController::class, 'updateProfile'])->name('company.updateProfile');
    Route::put('/company/profile+image/{id}/submit', [CompaniesController::class, 'updateImage'])->name('company.updateImage');

    //Order Routes
    Route::controller(ShipmentController::class)->group(function(){
        Route::get('/company/order','index')->name('company.order');
        Route::get('/company/freight','freight')->name('freightPanel');
        Route::get('/company/advFreight','company_advFreightPanel')->name('company.advFreightPanel');
        Route::get('/company/freight/transfers/{id}','advfreight')->name('adv_Freight');
        Route::put('/company/freight/transfers/{id}', 'advTransfer')->name('advFreight.transfer');
        Route::get('/company/advFreight/accept/{id}', 'accept_transfer');
        Route::get('/company/advFreight/decline/{id}', 'decline_transfer');
        Route::get('/company/view_shipment/{id}','viewOrder_Company')->name('viewOrder_Company');
        Route::get('/company/track_order/{id}','trackOrder_Company')->name('trackOrder_Company');
        Route::get('/company/invoice/{id}','viewInvoiceCompany')->name('company.generateInvoice');
        Route::get('/company/waybill/{id}','viewWaybillCompany')->name('company.generateWaybill');
        Route::post('/company/add_bid', 'addBid')->name('addBid.company');
        Route::get('/company/order_history', 'orderHistory_company')->name('orderHistory_Company');
        Route::put('/transfer/{id}','transfer')->name('transfer.company');
        Route::get('/company/transfer/{id}', 'freight_transfer')->name('freight_transfer');
        Route::get('/company/track_parcel', ['uses' => 'App\Http\Controllers\CompanyQrScannerController@index']);
        Route::post('/company/track_parcel/checkUser', ['uses' => 'App\Http\Controllers\CompanyQrScannerController@checkUser']);

    });

    //stations
    Route::resource('company/stations', StationController::class);
    Route::controller(StationController::class)->group(function () {
        Route::get('company/stations', 'index')->name('stations.view');
        Route::get('company/archived_stations', 'viewArchive')->name('view.stations.archived');
        Route::put('company/stations/archive/{id}', 'archive')->name('archive.station');
        Route::put('company/stations/unarchive/{id}', 'unarchive')->name('unarchive.station');
    });

    //Staff
    Route::resource('company/staff', StaffController::class);
    Route::controller(StaffController::class)->group(function () {
        Route::get('/staff', 'index')->name('staff.view');
        Route::put('company/staff/update+staff/{id}', 'updateStaff')->name('staff.update');
        Route::get('company/archived_staff', 'viewArchive')->name('staff.viewArchive');
        Route::put('company/staff/archive/{id}', 'archive')->name('staff.archive');
        Route::put('company/staff/unarchive/{id}', 'unarchive')->name('staff.unarchive');
    });

    //DRIVER
    Route::resource('company/drivers', DriverController::class);
    Route::controller(DriverController::class)->group(function () {
        Route::get('/drivers/delete/{id}', 'destroy')->name('drivers.delete');
        Route::get('archived-drivers', 'viewArchive')->name('drivers.viewArchive');
        Route::put('/drivers/archive/{id}', 'archive')->name('drivers.archive');
        Route::put('/drivers/unarchive/{id}', 'unarchive')->name('drivers.unarchive');
    });

    //DISPATCHER
    Route::resource('company/dispatcher', DispatcherController::class);
    Route::controller(DispatcherController::class)->group(function () {
        Route::get('/dispatcher/delete/{id}', 'destroy')->name('dispatcher.delete');
        Route::get('archived-dispatcher', 'viewArchive')->name('dispatcher.viewArchive');
        Route::put('/dispatcher/archive/{id}', 'archive')->name('dispatcher.archive');
        Route::put('/dispatcher/unarchive/{id}', 'unarchive')->name('dispatcher.unarchive');
    });

});

// Super Admin Panel
Route::middleware(['auth', 'user-access:super-admin'])->group(function () {
    Route::get('/icargo/dashboard', [SuperDashboardController::class, 'index'])
        ->name('super.admin.dashboard')->middleware("verified");

    Route::get('/customer-queries', [QueryController::class, 'show'])->name('show.queries');
    Route::get('/customer-queries/{id}', [QueryController::class, 'show_Query'])->name('showQuery');
    //Registered User Accounts
    Route::resource('icargo/registered_users', UsersController::class);
    Route::controller(UsersController::class)->group(function () {
        Route::get('icargo/registered_users', 'index')->name('registered_users.view');
        Route::get('registered_users/archived', 'viewArchive')->name('registered_users.viewArchive');

        // track parcel
        Route::get('/icargo/track_parcel', ['uses' => 'App\Http\Controllers\SuperQrScannerController@index']);
        Route::post('/icargo/track_parcel/checkUser', ['uses' => 'App\Http\Controllers\SuperQrScannerController@checkUser']);
    });

    //Companies
    Route::resource('icargo/companies', CompaniesController::class);
    Route::controller(CompaniesController::class)->group(function () {
        Route::get('icargo/companies', 'index')->name('registered_companies.index');
        Route::get('icargo/companies+archived', 'viewArchive')->name('companies.viewArchive');
        Route::put('icargo/companies/archive/{id}', 'archive')->name('companies.archive');
        Route::put('icargo/companies/unarchive/{id}', 'unarchive')->name('companies.unarchive');
        Route::get('icargo/companies/send_otp/{id}', 'sendOTP');
    });

    //Customers
    Route::resource('icargo/customers', CustomerController::class);
    Route::controller(CustomerController::class)->group(function () {
        Route::get('icargo/customers', 'index')->name('registered_customers.index');
        Route::get('icargo/customers+archived', 'viewArchive')->name('registered_customers.viewArchive');
        Route::put('icargo/customers/archive/{id}', 'archive')->name('registered_customers.archive');
        Route::put('icargo/customers/unarchive/{id}', 'unarchive')->name('registered_customers.unarchive');
        Route::get('icargo/customers/send_otp/{id}', 'sendOTP');
    });

    //Drivers
    Route::resource('icargo/drivers', DriverController::class);
    Route::controller(DriverController::class)->group(function () {
        Route::get('icargo/drivers', 'superadminIndex')->name('registered_drivers.index');
        Route::put('icargo/registered_users/update+dispatcher/{id}','superadminUpdate')->name('update.driver');
        Route::get('icargo/drivers+archived', 'superadminviewArchive')->name('viewArchive.drivers');
        Route::put('icargo/registered_users/archive+dispatcher/{id}', 'archive')->name('archive.driver');
        Route::put('icargo/registered_users/unarchive+dispatcher/{id}','unarchive')->name('unarchive.driver');
        Route::get('icargo/registered_users/send_otp/{id}', 'sendOTP');
    });

    //Dispatchers
    Route::resource('icargo/dispatchers', DispatcherController::class);
    Route::controller(DispatcherController::class)->group(function () {
        Route::get('icargo/dispatchers', 'superadminIndex')->name('registered_dispatchers.index');
        Route::put('icargo/dispatchers/update+dispatcher/{id}', 'superadminUpdate')->name('update.dispatcher');
        Route::get('icargo/dispatchers+archived', 'superadminviewArchive')->name('viewArchive.dispatchers');
        Route::put('icargo/dispatchers/archive+dispatcher/{id}', 'archive')->name('archive.dispatcher');
        Route::put('icargo/dispatchers/unarchive+dispatcher/{id}', 'unarchive')->name('unarchive.dispatcher');
        Route::get('icargo/dispatchers/send_otp/{id}', 'sendOTP');
    });

    //Staff
    Route::controller(StaffController::class)->group(function () {
        Route::get('icargo/staff', 'superadminIndex')->name('registered_staff.index');
        Route::put('icargo/staff/update+staff/{id}', 'superadminUpdate')->name('update.staff');
        Route::get('icargo/staff+archived', 'superadminviewArchive')->name('viewArchive.staff');
        Route::put('icargo/staff/archive+staff/{id}', 'archive')->name('archive.staff');
        Route::put('icargo/staff/unarchive+staff/{id}', 'unarchive')->name('unarchive.staff');
        Route::get('icargo/staff/send_otp/{id}', 'sendOTP');
    });
});

// Driver Panel
Route::middleware(['auth', 'user-access:driver'])->group(function () {
    Route::get('/driver/dashboard', [DriverDashboardController::class, 'index'])
    ->name('driver.dashboard')->middleware('verified');

    //DRIVER PAGE
    Route::get('/driver/track_parcel', ['uses' => 'App\Http\Controllers\DriverQrScannerController@index']);
    Route::post('/driver/track_parcel/check-user', ['uses' => 'App\Http\Controllers\DriverQrScannerController@checkUser']);
    Route::post('/driver/track_parcel/update-pickup', ['uses' => 'App\Http\Controllers\DriverQrScannerController@updatePickup']);
    Route::post('/driver/track_parcel/update-delivered', ['uses' => 'App\Http\Controllers\DriverQrScannerController@updateDelivered']);
    Route::post('/driver/track_parcel/order-tracking-log', ['uses' => 'App\Http\Controllers\OrderTrackingLogController@store']);

    Route::controller(ShipmentController::class)->group(function(){
        Route::get('/driver/history', 'driverHistory_view')->name('driver.history');
        Route::get('/driver/order', 'driverOrder_view')->name('driver.order');
    });

    //Profile Page
    Route::controller(DriverController::class)->group(function () {
        Route::get('/driver/profile',  'driverProfile')->name('driver.profile');
        Route::put('/driver/update-info/{id}',  'updateProfile')->name('driver.personinfo.update');
        Route::put('/driver/update-image/{id}',  'updateImage')->name('driver.profile.update');
    });

});

// Dispatcher Panel
Route::middleware(['auth', 'user-access:dispatcher'])->group(function () {
    Route::get('/dispatcher/dashboard', [DispatcherDashboardController::class, 'index'])
        ->name('dispatcher.dashboard')->middleware('verified');

    //DISPATCHER PAGE
    Route::get('/dispatcher/track_parcel', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@index']);
    Route::post('/dispatcher/track_parcel/check-user', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@checkUser']);
    Route::post('/dispatcher/track_parcel/update-received', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@updateReceived']);
    Route::post('/dispatcher/track_parcel/update-delivery', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@updateOutfordelivery']);
    Route::post('/dispatcher/track_parcel/update-transfer', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@updateTransfer']);
    Route::post('/dispatcher/track_parcel/update-arrived', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@updateArrived']);

    Route::controller(ShipmentController::class)->group(function () {
        Route::get('/dispatcher/order_list/pickup', 'toPickUp_view')->name('toPickUp_view');
        Route::get('/dispatcher/order_list/dispatch', 'toDispatch_view')->name('toDispatch_view');
        Route::get('/dispatcher/history', 'dispatcherHistory_view')->name('driver.history');
    });
    //DISPATCHER
    Route::controller(DispatcherController::class)->group(function(){
        Route::get('/dispatcher/order_list/dispatch/{shipment_id}/{driver_id}', 'assignDriver')->name('dispatcher.assign');
    });

    //Profile Page
    Route::controller(DispatcherController::class)->group(function () {
        Route::get('/dispatcher/profile',  'dispatcherProfile')->name('dispatcher.profile');
        Route::put('/dispatcher/update-info/{id}',  'updateProfile')->name('dispatcher.personinfo.update');
        Route::put('/dispatcher/update-image/{id}',  'updateImage')->name('dispatcher.profile.update');
    });

});

// Staff Panel
Route::middleware(['auth', 'user-access:staff'])->group(function () {
    Route::get('/staff/dashboard', [HomeController::class, 'staffDashboard'])
        ->name('staff.dashboard')->middleware('verified');

      //Order Routes
       Route::controller(ShipmentController::class)->group(function(){
        Route::get('/staff/order', 'staffIndex')->name('staff.order');
        Route::get('/staff/freight', 'freightStaff')->name('freightStaff');
        Route::get('/staff/advfreight', 'staff_advFreightPanel')->name('staff.advFreightPanel');
        Route::get('/staff/advfreight/transfers/{id}','staff_advfreight')->name('staff_advFreight');
        Route::put('staff/advfreight/transfers/{id}', 'staff_advTransfer')->name('staff_advFreight.transfer');
        Route::get('/staff/advfreight/accept/{id}', 'staff_accept_transfer');
        Route::get('/staff/advfreight/decline/{id}', 'staff_decline_transfer');
        Route::get('/staff/order_history', 'orderHistory_staff')->name('orderHistory_Staff');
        Route::get('/staff/view_shipment/{id}', 'viewOrder_Staff')->name('viewOrder_Staff');
        Route::get('/staff/track_order/{id}', 'trackOrder_Staff')->name('trackOrder_Staff');
        Route::get('/staff/invoice/{id}', 'viewInvoiceStaff')->name('staff.generateInvoice');
        Route::post('/staff/add_bid', 'staff_addBid')->name('staff_addBid');
        Route::put('/staff/transfer/{id}', 'transfer')->name('transfer.staff');
        Route::get('/staff/waybill/{id}', 'viewWaybillStaff')->name('staff.generateWaybill');
        Route::get('/staff/track_parcel', ['uses' => 'App\Http\Controllers\StaffQrScannerController@index']);
        Route::post('/staff/track_parcel/checkUser', ['uses' => 'App\Http\Controllers\StaffQrScannerController@checkUser']);
        Route::get('/staff/order_list/station', 'assignStation_view')->name('assignStation_view');
     });

    //Stations
    Route::resource('staff/stations', StationController::class);
    Route::controller(StationController::class)->group(function () {
        Route::get('staff/stations', 'index')->name('stations.viewStaff');
        Route::get('staff/archived_stations', 'viewArchive')->name('view.stations.archivedStaff');
    });

    //Assign Station
    Route::controller(StaffController::class)->group(function(){
       Route::get('/staff/order_list/station/{shipment_id}/{station_id}', 'assignStation')->name('station.assign');
       Route::get('/staff/edit_profile/{id}', 'index_edit')->name('staff.edit_profile');
       Route::post('/staff/edit_profile/{id}', 'edit_profile')->name('staff.edit');
       Route::post('/staff/upload_photo/{id}', 'upload_photo')->name('staff.upload_photo');
    });

    //DRIVER
    Route::resource('staff/driver', DriverController::class);
    Route::controller(DriverController::class)->group(function () {
        Route::get('/staff/driver', 'staffIndex')->name('driver.index');;
        Route::get('/driver/delete/{id}', 'destroy')->name('drivers.delete');
        Route::get('archived-driver', 'staffviewArchive')->name('driver.viewArchive');
        Route::put('/driver/archive/{id}', 'archive')->name('driver.archive');
        Route::put('/driver/unarchive/{id}', 'unarchive')->name('driver.unarchive');
    });

    //DISPATCHER
    Route::resource('staff/dispatchers', DispatcherController::class);
    Route::controller(DispatcherController::class)->group(function () {
        Route::get('/staff/dispatcher', 'staffIndex')->name('dispatchers.index');;
        Route::get('/dispatchers/delete/{id}', 'destroy')->name('dispatchers.delete');
        Route::get('archived-dispatchers', 'staffviewArchive')->name('dispatchers.viewArchive');
        Route::put('/dispatchers/archive/{id}', 'archive')->name('dispatchers.archive');
        Route::put('/dispatchers/unarchive/{id}', 'unarchive')->name('dispatchers.unarchive');
    });
});


// FORGOT PASSWORD PAGE
Route::get('/forgot-password', function () {
    return view('login/forgot-password');
});

// FIND TRACKING ID
Route::get('/find', function () {
    return view('search');
});

Route::post('/search', [SearchController::class, 'search']);

Route::post('/searchStaff', [SearchController::class, 'searchStaff']);

Route::post('/searchCompany', [SearchController::class, 'searchCompany']);

Route::post('/searchDriver', [SearchController::class, 'searchDriver']);

Route::post('/searchDispatcher', [SearchController::class, 'searchDispatcher']);

Route::get('/income', [IncomeController::class, 'index']);


//DRIVER PAGE
//Route::get('driver', ['uses' => 'App\Http\Controllers\DriverQrScannerController@index']);
//Route::post('driver/check-user', ['uses' => 'App\Http\Controllers\DriverQrScannerController@checkUser']);
//Route::post('driver/update-pickup', ['uses' => 'App\Http\Controllers\DriverQrScannerController@updatePickup']);
//Route::post('driver/update-delivered', ['uses' => 'App\Http\Controllers\DriverQrScannerController@updateDelivered']);
//Route::post('driver/order-tracking-log', ['uses' => 'App\Http\Controllers\OrderTrackingLogController@store']);

//DISPATCHER PAGE
//Route::get('dispatchers', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@index']);
//Route::post('dispatchers/check-user', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@checkUser']);
//Route::post('dispatchers/update-pickup', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@updateReceived']);
//Route::post('dispatchers/update-delivery', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@updateOutfordelivery']);


// Route::get('/company', [CompanyController::class, 'index']);



Route::get('/order-form', function () {
    return view('order/waybill-form');
});



Route::get('/waybillForm', function () {
    Route::get('company/order/waybill-form')->name('waybillForm');
});


/*Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        /*Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        /**
         * User Routes
         */
        /*Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });
    });*/
