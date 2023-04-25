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

    // Lock Account Panel
    Route::get('/drivers/status/{user_id}/{status_code}', [DriverController::class, 'updateStatus'])->name('driver.status.update');
    Route::get('/dispatcher/status/{user_id}/{status_code}', [DispatcherController::class, 'updateStatus'])->name('dispatcher.status.update');

    // Chnage Password
    Route::get('settings/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');
});

// User/Customer Routes
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])
    ->name('dashboard');
});

// Company Manager Routes
Route::middleware(['auth', 'user-access:company'])->group(function () {
    Route::get('/company/dashboard', [IncomeController::class, 'index'])
    ->name('company.dashboard')->middleware('verified');
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

// Super Admin Routes
Route::middleware(['auth', 'user-access:super-admin'])->group(function () {
    Route::get('/super-admin/dashboard', [HomeController::class, 'superAdminDashboard'])
    ->name('super.admin.dashboard');
});

// Driver Routes
Route::middleware(['auth', 'user-access:driver'])->group(function () {
    Route::get('/driver/dashboard', [HomeController::class, 'driverDashboard'])
    ->name('driver.dashboard');
});

// Dispatcher Routes
Route::middleware(['auth', 'user-access:dispatcher'])->group(function () {
    Route::get('/dispatcher/dashboard', [HomeController::class, 'dispatcherDashboard'])
    ->name('dispatcher.dashboard')->middleware('verified');
});

// Staff Routes
Route::middleware(['auth', 'user-access:staff'])->group(function () {
    Route::get('/staff/dashboard', [HomeController::class, 'staffDashboard'])
    ->name('staff.dashboard')->middleware('verified');
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
Route::get('/incomestaff', [IncomeStaffController::class, 'index']);
Route::get('/dispatcherdashboard', [DispatcherDashboardController::class, 'index']);
Route::get('/driverdashboard', [DriverDashboardController::class, 'index']);

//FREIGHT PAGE
/*Route::get('/freight', function () {
    return view('freight/freight');
});*/

//DRIVER PAGE
Route::get('driver', ['uses' => 'App\Http\Controllers\DriverQrScannerController@index']);
Route::post('driver/check-user', ['uses' => 'App\Http\Controllers\DriverQrScannerController@checkUser']);
Route::post('driver/update-pickup', ['uses' => 'App\Http\Controllers\DriverQrScannerController@updatePickup']);
Route::post('driver/update-delivered', ['uses' => 'App\Http\Controllers\DriverQrScannerController@updateDelivered']);

//DISPATCHER PAGE
Route::get('dispatchers', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@index']);
Route::post('dispatchers/check-user', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@checkUser']);
Route::post('dispatchers/update-pickup', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@updateReceived']);
Route::post('dispatchers/update-delivery', ['uses' => 'App\Http\Controllers\DispatcherQrScannerController@updateOutfordelivery']);


Route::get('/company', [CompanyController::class, 'index']);



Route::get('/order-form', function () {
    return view('order/waybill-form');
});

//Order Panel
Route::controller(ShipmentController::class)->group(function(){
    Route::get('/company/order','index')->name('companyOrderPanel');
    Route::get('/order','userIndex')->name('userOrderPanel');
    Route::get('/company/freight','freight')->name('freightPanel');
    Route::post('/add_order','addOrder')->name('addOrder');
    Route::get('/view_shipment/{id}','viewOrder')->name('viewOrder');
    Route::get('/company/view_shipment/{id}','viewOrder_Company')->name('viewOrder_Company');
    Route::get('/track_order/{id}','trackOrder')->name('trackOrder');
    Route::get('/company/track_order/{id}','trackOrder_Company')->name('trackOrder_Company');
    Route::get('/invoice/{id}','viewInvoice')->name('generate');
    Route::get('/invoice/{id}/generate','generateInvoice')->name('print');
    Route::post('add_bid', 'addBid')->name('addBid');
    Route::put('/accept_bid/{id}', 'acceptBid')->name('acceptBid');

    Route::group(['prefix' => 'company'], function () {
        Route::get('/transfer/{id}','transferShipment')->name('viewTransfer');
        Route::post('/transfer','transfer')->name('shipment.transfer');
    });
});

Route::get('/waybillForm', function () {
    Route::get('company/order/waybill-form')->name('waybillForm');
});

//QR Code && Barcode Generation
Route::get('/generate-code', function (Request $request) {
    $code = $request->get('tracking_number');

    // Generate QR code with logo
    $qrCode = QrCode::format('svg')->size(500)->generate($code);

    // Add logo to QR code
    $logoPath = public_path('img/icargo.png');
    $logo = file_get_contents($logoPath);
    $svg = new \SimpleXMLElement($qrCode);
    $image = $svg->addChild('image');
    $image->addAttribute('href', 'data:image/png;base64,' . base64_encode($logo));
    $image->addAttribute('x', '58');
    $image->addAttribute('y', '58');
    $image->addAttribute('width', '50');
    $image->addAttribute('height', '50');
    $image->addAttribute('opacity', '0.6');
    $qrCodeWithLogo = $svg->asXML();

    // Generate barcode
    $barcode = DNS1D::getBarcodeSVG($code, 'C39');

    // Generate file name
    $fileName = 'code_' . time() . '.zip';

    // Create zip archive
    $zip = new \ZipArchive();
    $zip->open(storage_path('app/public/' . $fileName), \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
    $zip->addFromString('qr_code.svg', $qrCode);
    $zip->addFromString('barcode.svg', $barcode);
    $zip->close();

    // Generate file path
    $filePath = storage_path('app/public/' . $fileName);

    // Return a response to download the zip archive
    $response = response()->download($filePath)->deleteFileAfterSend(true);

    // Display the barcode and QR code
    $barcodeHtml = '<div> '. $barcode .'</div>';
    $qrCodeHtml = '<div>'. $qrCodeWithLogo .'</div>';
    $codeHtml = '<div style="margin: 5% 30% 5%">' . $barcodeHtml . '</div>' . '<div style="margin: 5% 30% 5%">' . $qrCodeHtml . '</div>' ;

    return view('generate-code')->with('codeHtml', $codeHtml)->with('response', $response);
});

// Route to display the form and generated code
Route::get('/generate-code', function () {
    return view('generate-code');
});


// Plan Controller / Monthly Subscription Routes
Route::middleware("auth")->group(function () {
    Route::get('plans', [PlanController::class, 'index']);
    Route::get('plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
    Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");
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

