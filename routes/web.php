<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CompanyController;
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
use App\Http\Controllers\UserController;
use App\Http\Controllers\DispatcherDashboardController;
use App\Http\Controllers\DriverDashboardController;
use App\Models\OrderTrackingLog;
use App\Http\Controllers\SuperDashboardController;



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


/* Users Tab */
Route::get('/userpanel/orderHistory', function () {
    return view('userpanel.orderHistory');
});

/* Company Tab */

Route::get('/company/history/orderHistory', function () {
    return view('company.history.orderHistory');
});


Route::get('/company/freight/transfers', function () {
    return view('company.freight.transfers');
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



Auth::routes(['verify' => true]);

//Company registration account
Route::get('company_registration', function () {
    return view('registerCompany');
});
Route::post(
    'company_registration/store',
    [CompaniesController::class, 'companyRegistrationOutsidePanel']
)->name('add.company');


// Authenticated Account Routes
Route::middleware('auth')->group(function () {
    // Lock Account
    Route::get('/users/status/{user_id}/{status_code}', [UsersController::class, 'updateStatus'])->name('users.status.update');

    // Lock Account CRUD
    Route::get('/drivers/status/{user_id}/{status_code}', [DriverController::class, 'updateStatus'])->name('driver.status.update');
    Route::get('/dispatcher/status/{user_id}/{status_code}', [DispatcherController::class, 'updateStatus'])->name('dispatcher.status.update');
    Route::get('/staff/status/{user_id}/{status_code}', [StaffController::class, 'updateStatus'])->name('staff.status.update');

    // Change Password
    Route::get('settings/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');
});

// User/Customer Panel
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])
        ->name('dashboard');

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
        Route::get('/user/invoice/{id}', 'viewInvoice')->name('generate');
        Route::get('/user/waybill/{id}', 'viewWaybill')->name('user.generateWaybill');
    });
});

// Company Manager Panel
Route::middleware(['auth', 'user-access:company'])->group(function () {
    Route::get('/company/dashboard', [IncomeController::class, 'index'])
        ->name('company.dashboard')->middleware('verified');

    //Order Routes
    Route::controller(ShipmentController::class)->group(function () {
        Route::get('/company/order', 'index')->name('company.order');
        Route::get('/company/freight', 'freight')->name('freightPanel');
        Route::get('/company/advFreight', 'company_advFreightPanel')->name('company.advFreightPanel');
        Route::get('/company/view_shipment/{id}', 'viewOrder_Company')->name('viewOrder_Company');
        Route::get('/company/track_order/{id}', 'trackOrder_Company')->name('trackOrder_Company');
        Route::get('/company/invoice/{id}', 'viewInvoiceCompany')->name('generateInvoice');
        Route::get('/company/waybill/{id}', 'viewWaybillCompany')->name('generateWaybill');
        Route::post('/company/add_bid', 'addBid')->name('addBid.company');
        Route::get('/company/order_history', 'orderHistory_company')->name('orderHistory_Company');
        Route::put('/transfer/{id}', 'transfer')->name('transfer.company');
    });

    // stations
    Route::group(['prefix' => 'company/stations'], function () {
        Route::get('/', [StationController::class, 'index'])
            ->name('stations.view');
        Route::post('/add-station', [StationController::class, 'store'])
            ->name('add.station');
        Route::get('/view_station/{id}', [StationController::class, 'show'])
            ->name('show.station');
        Route::get('/stations_archive', [StationController::class, 'viewArchive'])
            ->name('view.stations.archived');
        Route::get('/edit/{id}', [StationController::class, 'edit'])
            ->name('edit.station');
        Route::put('/update/{id}', [StationController::class, 'update'])
            ->name('update.station');
        Route::put('/archive/{id}', [StationController::class, 'archive'])
            ->name('archive.station');
        Route::put('/unarchive/{id}', [StationController::class, 'unarchive'])
            ->name('unarchive.station');
    });

    //Staff
    Route::resource('company/staff', StaffController::class);
    Route::controller(StaffController::class)->group(function () {
        Route::get('/staff', 'index')->name('staff.view');
        Route::get('/archived_staff', 'viewArchive')->name('staff.viewArchive');
        Route::put('/staff/archive/{id}', 'archive')->name('staff.archive');
        Route::put('/staff/unarchive/{id}', 'unarchive')->name('staff.unarchive');
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
    Route::get('/icargo/dashboard', [HomeController::class, 'superAdminDashboard'])
        ->name('super.admin.dashboard');

    //Registered User Accounts
    Route::resource('icargo/registered_users', UsersController::class);
    Route::controller(UsersController::class)->group(function () {
        Route::get('icargo/registered_users', 'index')->name('registered_users.view');
        Route::get('registered_users/archived', 'viewArchive')->name('registered_users.viewArchive');

        // update registered user
        Route::put('icargo/registered_users/update+company/{id}', [CompaniesController::class, 'update'])->name('update.company');
        Route::put('icargo/registered_users/update+driver/{id}', [DriverController::class, 'update'])->name('update.driver');
        Route::put('icargo/registered_users/update+dispatcher/{id}', [DispatcherController::class, 'update'])->name('update.dispatcher');
        Route::put('icargo/registered_users/update+staff/{id}', [StaffController::class, 'update'])->name('update.staff');
        Route::put('icargo/registered_users/update+customer/{id}', [CustomerController::class, 'update'])->name('update.customer');


        //  archive registered user
        Route::put('icargo/registered_users/archive+company/{id}', [CompaniesController::class, 'archive'])->name('archive.company');
        Route::put('icargo/registered_users/archive+driver/{id}', [DriverController::class, 'archive'])->name('archive.driver');
        Route::put('icargo/registered_users/archive+dispatcher/{id}', [DispatcherController::class, 'archive'])->name('archive.dispatcher');
        Route::put('icargo/registered_users/archive+staff/{id}', [StaffController::class, 'archive'])->name('archive.staff');
        Route::put('icargo/registered_users/archive+customer/{id}', [CustomerController::class, 'archive'])->name('archive.customer');

        //  unarchive registered user
        Route::put('icargo/registered_users/unarchive+company/{id}', [CompaniesController::class, 'unarchive'])->name('unarchive.company');
        Route::put('icargo/registered_users/unarchive+driver/{id}', [DriverController::class, 'unarchive'])->name('unarchive.driver');
        Route::put('icargo/registered_users/unarchive+dispatcher/{id}', [DispatcherController::class, 'unarchive'])->name('unarchive.dispatcher');
        Route::put('icargo/registered_users/unarchive+staff/{id}', [StaffController::class, 'unarchive'])->name('unarchive.staff');
        Route::put('icargo/registered_users/unarchive+customer/{id}', [CustomerController::class, 'unarchive'])->name('unarchive.customer');
    });

    //Companies
    Route::resource('icargo/companies', CompaniesController::class);
    Route::controller(CompaniesController::class)->group(function () {
        Route::get('icargo/companies+archived', 'viewArchive')->name('companies.viewArchive');
        Route::put('icargo/companies/archive/{id}', 'archive')->name('companies.archive');
        Route::put('icargo/companies/unarchive/{id}', 'unarchive')->name('companies.unarchive');
    });

    //Customers
    Route::resource('icargo/customers', CustomerController::class);
    Route::controller(CustomerController::class)->group(function () {
        Route::get('icargo/customers+archived', 'viewArchive')->name('registered_customers.viewArchive');
        Route::put('icargo/customers/archive/{id}', 'archive')->name('registered_customers.archive');
        Route::put('icargo/customers/unarchive/{id}', 'unarchive')->name('registered_customers.unarchive');
    });
});

// Driver Panel
Route::middleware(['auth', 'user-access:driver'])->group(function () {
    Route::get('/driver/dashboard', [DriverDashboardController::class, 'index'])
        ->name('driver.dashboard');

    //DRIVER PAGE
    Route::get('driver', ['uses' => 'App\Http\Controllers\DriverQrScannerController@index']);
    Route::post('driver/check-user', ['uses' => 'App\Http\Controllers\DriverQrScannerController@checkUser']);
    Route::post('driver/update-pickup', ['uses' => 'App\Http\Controllers\DriverQrScannerController@updatePickup']);
    Route::post('driver/update-delivered', ['uses' => 'App\Http\Controllers\DriverQrScannerController@updateDelivered']);

    Route::controller(ShipmentController::class)->group(function(){
        Route::get('/driver/history', 'driverHistory_view')->name('driver.history');
    });
});

// Dispatcher Panel
Route::middleware(['auth', 'user-access:dispatcher'])->group(function () {
    Route::get('/dispatcher/dashboard', [DispatcherDashboardController::class, 'index'])
        ->name('dispatcher.dashboard')->middleware('verified');

    //DISPATCHER PAGE
    Route::get('dispatchers', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@index']);
    Route::post('dispatchers/check-user', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@checkUser']);
    Route::post('dispatchers/update-pickup', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@updateReceived']);
    Route::post('dispatchers/update-delivery', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@updateOutfordelivery']);
    Route::post('dispatchers/update-transfer', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@updateTransfer']);
    Route::post('dispatchers/update-arrived', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@updateArrived']);

    Route::controller(ShipmentController::class)->group(function () {
        Route::get('/dispatcher/order_list/pickup', 'toPickUp_view')->name('toPickUp_view');
        Route::get('/dispatcher/order_list/dispatch', 'toDispatch_view')->name('toDispatch_view');
        Route::get('/dispatcher/history', 'dispatcherHistory_view')->name('driver.history');
    });
    //DISPATCHER
    Route::controller(DispatcherController::class)->group(function(){
        Route::get('/dispatcher/order_list/dispatch/{shipment_id}/{driver_id}', 'assignDriver')->name('dispatcher.assign');
    });

});

// Staff Panel
Route::middleware(['auth', 'user-access:staff'])->group(function () {
    Route::get('/staff/dashboard', [HomeController::class, 'staffDashboard'])
        ->name('staff.dashboard')->middleware('verified');

    //Order Routes
    Route::controller(ShipmentController::class)->group(function () {
        Route::get('/staff/order', 'staffIndex')->name('staff.order');
        Route::get('/staff/freight', 'freightStaff')->name('freightStaff');
        Route::get('/staff/advfreight', 'staff_advFreightPanel')->name('staff.advFreightPanel');
        Route::get('/staff/order_history', 'orderHistory_staff')->name('orderHistory_Staff');
        Route::get('/staff/view_shipment/{id}', 'viewOrder_Staff')->name('viewOrder_Staff');
        Route::get('/staff/track_order/{id}', 'trackOrder_Staff')->name('trackOrder_Staff');
        Route::get('/staff/invoice/{id}', 'viewInvoiceStaff')->name('viewInvoiceStaff');
        Route::post('/staff/add_bid', 'staff_addBid')->name('staff_addBid');
        Route::put('/staff/transfer/{id}', 'transfer')->name('transfer.staff');
        Route::get('/staff/waybill/{id}', 'viewWaybillStaff')->name('staff.generateWaybill');
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

Route::post('/search', [UserController::class, 'search']);

Route::get('/income', [IncomeController::class, 'index']);

Route::get('/super-admin/dashboard', [SuperDashboardController::class, 'index']);


//DRIVER PAGE
Route::get('driver', ['uses' => 'App\Http\Controllers\DriverQrScannerController@index']);
Route::post('driver/check-user', ['uses' => 'App\Http\Controllers\DriverQrScannerController@checkUser']);
Route::post('driver/update-pickup', ['uses' => 'App\Http\Controllers\DriverQrScannerController@updatePickup']);
Route::post('driver/update-delivered', ['uses' => 'App\Http\Controllers\DriverQrScannerController@updateDelivered']);
Route::post('driver/order-tracking-log', ['uses' => 'App\Http\Controllers\OrderTrackingLogController@store']);

//DISPATCHER PAGE
Route::get('dispatchers', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@index']);
Route::post('dispatchers/check-user', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@checkUser']);
Route::post('dispatchers/update-pickup', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@updateReceived']);
Route::post('dispatchers/update-delivery', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@updateOutfordelivery']);


// Route::get('/company', [CompanyController::class, 'index']);



Route::get('/order-form', function () {
    return view('order/waybill-form');
});



Route::get('/waybillForm', function () {
    Route::get('company/order/waybill-form')->name('waybillForm');
});

// Plan Controller / Monthly Subscription Routes
Route::middleware("auth")->group(function () {
    Route::group(['prefix' => 'subscriptions'], function () {
        Route::get('/plans', [PlanController::class, 'index']);
        Route::get('/plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
        Route::post('/subscription', [PlanController::class, 'subscription'])->name("subscription.create");
    });
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
