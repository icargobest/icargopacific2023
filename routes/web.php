<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;
use Illuminate\Http\Request;

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
Route::get('/', function () {
    return view('login/index');
});

// REGISTER ACCOUNT PAGE
Route::get('/register', function () {
    return view('login/register');
});

// FORGOT PASSWORD PAGE
Route::get('/forgot-password', function () {
    return view('login/forgot-password');
});

// DASHBOARD PAGE
Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
});

//FREIGHT PAGE
Route::get('/freight', function () {
    return view('freight/freight');
});

//DRIVER PAGE
Route::get('/driver', function () {
    return view('driver/driver');
});

Route::get('/company', [CompanyController::class, 'index']);

//Employee Panel
Route::controller(EmployeeController::class)->group(function(){
    Route::get('/employees','index')->name('EmployeePanel');
    Route::post('/add_employee', 'addEmployee')->name('addEmployee');
    Route::get('/update_employee/{id}','updateEmployee')->name('updateEmployee');
    Route::post('/save_updated_employee','saveUpdatedEmployee')->name('saveUpdatedEmployee');
    Route::get('/view_employee/{id}','viewEmployee')->name('viewEmployee');
    Route::get('/view_employee_archive','viewArchive')->name('viewArchive');
    Route::get('/employees/archive/{id}', 'archive')->name('archiveEmployee');
    Route::get('/employees/unarchive/{id}', 'unarchive')->name('unarchiveEmployee');
});

//Waybill Panel
Route::controller(ShipmentController::class)->group(function(){
    Route::get('/waybill','index')->name('waybillPanel');
    Route::post('add_waybill','addShipment')->name('addShipment');
    Route::get('/view_shipment/{id}','viewShipment')->name('viewShipment');
    Route::get('/invoice/{id}','viewInvoice')->name('generate');
    Route::get('/invoice/{id}/generate','generateInvoice')->name('print');
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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


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

