<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;
use Illuminate\Http\Request;
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

Auth::routes(['verify' => true]);

// company account registration
Route::get('/registerCompany', function () {
    return view('/registerCompany');
});
Route::post('/store', [CompanyController::class, 'store']);

// Authenticated Account Routes
Route::middleware('auth')->group(function(){
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
    Route::controller(ShipmentController::class)->group(function(){
        Route::get('/order','userIndex')->name('userOrderPanel');
        Route::post('/add_order','addOrder')->name('addOrder');
        Route::get('/view_shipment/{id}','viewOrder')->name('viewOrder');
        Route::get('/track_order/{id}','trackOrder')->name('trackOrder');
        Route::put('/accept_bid/{id}', 'acceptBid')->name('acceptBid');
        Route::put('/cancel_order/{id}', 'cancelOrder')->name('cancelOrder');
        Route::get('/invoice/{id}','viewInvoice')->name('generate');
    });
});

// Company Manager Panel
Route::middleware(['auth', 'user-access:company'])->group(function () {
    Route::get('/company/dashboard', [IncomeController::class, 'index'])
    ->name('company.dashboard')->middleware('verified');

    //Order Routes
    Route::controller(ShipmentController::class)->group(function(){
        Route::get('/company/order','index')->name('company.order');
        Route::get('/company/freight','freight')->name('freightPanel');
        Route::get('/company/view_shipment/{id}','viewOrder_Company')->name('viewOrder_Company');
        Route::get('/company/track_order/{id}','trackOrder_Company')->name('trackOrder_Company');
        Route::get('/company/invoice/{id}','viewInvoiceCompany')->name('generateInvoice');
        Route::post('add_bid', 'addBid')->name('addBid');
        Route::get('/order/history', 'orderHistory')->name('orderHistory');

        Route::group(['prefix' => 'company'], function () {
            Route::get('/transfer/{id}','transferShipment')->name('viewTransfer');
            Route::put('/transfer/{id}','transfer')->name('shipment.transfer');
        });
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
    Route::controller(StaffController::class)->group(function(){
        Route::get('/staff','index')->name('staff.view');
        Route::get('/archived_staff','viewArchive')->name('staff.viewArchive');
        Route::put('/staff/archive/{id}', 'archive')->name('staff.archive');
        Route::put('/staff/unarchive/{id}', 'unarchive')->name('staff.unarchive');
    });


    //DRIVER
    Route::resource('company/drivers', DriverController::class);
    Route::controller(DriverController::class)->group(function(){
        Route::get('/drivers/delete/{id}', 'destroy')->name('drivers.delete');
        Route::get('archived-drivers', 'viewArchive')->name('drivers.viewArchive');
        Route::put('/drivers/archive/{id}', 'archive')->name('drivers.archive');
        Route::put('/drivers/unarchive/{id}','unarchive')->name('drivers.unarchive');
    });

    //DISPATCHER
    Route::resource('company/dispatcher', DispatcherController::class);
    Route::controller(DispatcherController::class)->group(function(){
        Route::get('/dispatcher/delete/{id}', 'destroy')->name('dispatcher.delete');
        Route::get('archived-dispatcher', 'viewArchive')->name('dispatcher.viewArchive');
        Route::put('/dispatcher/archive/{id}', 'archive')->name('dispatcher.archive');
        Route::put('/dispatcher/unarchive/{id}','unarchive')->name('dispatcher.unarchive');
    });
});

// Super Admin Panel
Route::middleware(['auth', 'user-access:super-admin'])->group(function () {
    Route::get('/super-admin/dashboard', [HomeController::class, 'superAdminDashboard'])
    ->name('super.admin.dashboard');
});

// Driver Panel
Route::middleware(['auth', 'user-access:driver'])->group(function () {
    Route::get('/driver/dashboard', [DriverDashboardController::class, 'index'])
    ->name('driver.dashboard');
});

// Dispatcher Panel
Route::middleware(['auth', 'user-access:dispatcher'])->group(function () {
    Route::get('/dispatcher/dashboard', [DispatcherDashboardController::class, 'index'])
    ->name('dispatcher.dashboard')->middleware('verified');
});

// Staff Panel
Route::middleware(['auth', 'user-access:staff'])->group(function () {
    Route::get('/staff/dashboard', [HomeController::class, 'staffDashboard'])
    ->name('staff.dashboard')->middleware('verified');

      //Order Routes
       Route::controller(ShipmentController::class)->group(function(){
         Route::get('/staff/order','staffIndex')->name('staff.order');
         Route::get('/staff/freight','freightStaff')->name('freightStaff');
    //     Route::post('/add_order','addOrder')->name('addOrder');
    //     Route::get('/view_shipment/{id}','viewOrder')->name('viewOrder');
    //     Route::get('/company/view_shipment/{id}','viewOrder_Company')->name('viewOrder_Company');
    //     Route::get('/track_order/{id}','trackOrder')->name('trackOrder');
    //     Route::get('/company/track_order/{id}','trackOrder_Company')->name('trackOrder_Company');
    //     Route::get('/invoice/{id}','viewInvoice')->name('generate');
    //     Route::get('/invoice/{id}/generate','generateInvoice')->name('print');
    //     Route::post('add_bid', 'addBid')->name('addBid');
    //     Route::put('/accept_bid/{id}', 'acceptBid')->name('acceptBid');
    //     Route::put('/cancel_order/{id}', 'cancelOrder')->name('cancelOrder');
    //     Route::get('/order/history', 'orderHistory')->name('orderHistory');

    //     Route::group(['prefix' => 'company'], function () {
    //         Route::get('/transfer/{id}','transferShipment')->name('viewTransfer');
    //         Route::put('/transfer/{id}','transfer')->name('shipment.transfer');
    //     });
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

// DASHBOARD PAGE
Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
});
Route::get('/income', [IncomeController::class, 'index']);


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


Route::get('/company', [CompanyController::class, 'index']);



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
