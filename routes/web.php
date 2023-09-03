<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ArchiveExportController;
use App\Http\Controllers\ArchiveNotController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CensorshipController;
use App\Http\Controllers\CensorshipExportController;
use App\Http\Controllers\CensorshipNotController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\ComputerExportController;
use App\Http\Controllers\ComputerNotController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustodyController;
use App\Http\Controllers\CustodyItemController;
use App\Http\Controllers\DieselController;
use App\Http\Controllers\DieselExportController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\HeadController;
use App\Http\Controllers\HistoricalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceExportController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\JibayaController;
use App\Http\Controllers\JibayaexportController;
use App\Http\Controllers\JibayaNotController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\LegalexportController;
use App\Http\Controllers\LegalNotController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\storeController;
use App\Http\Controllers\SubCensorshipController;
use App\Http\Controllers\SubSectionController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SupplierItemController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\TypesFuelController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
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
// *********************************************dashboard****************************************************************
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::prefix('')->middleware('auth')->group(function () {
        Route::get('/dashboard', [HeadController::class, 'nots'])->name('dashboard');
        Route::get('/', [HeadController::class, 'nots1']);
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// ************************************************الأرشيف المركزي*************************************************************
Route::middleware('auth')->group(function () {
    Route::resource('diesel', DieselController::class);
    Route::resource('dieselexport', DieselExportController::class);
    Route::resource('user', UserController::class);
    Route::resource('section', SectionController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('subSection', SubSectionController::class);
    Route::resource('home', HomeController::class);
    Route::resource('legal', LegalController::class);
    Route::resource('legalexport', LegalexportController::class);
    Route::resource('jibaya', JibayaController::class);
    Route::resource('jibayaexport', JibayaexportController::class);
    Route::resource('archive', ArchiveController::class);
    Route::resource('archiveExport', ArchiveExportController::class);
    Route::resource('computer', ComputerController::class);
    Route::resource('computerExport', ComputerExportController::class);
    Route::resource('censorship', CensorshipController::class);
    Route::resource('censorshipExport', CensorshipExportController::class);
    Route::resource('subcensorship', SubCensorshipController::class);
    Route::resource('import', ImportController::class);
    Route::resource('export', ExportController::class);
    Route::resource('type', TypeController::class);
    Route::resource('user', UserController::class);
    Route::resource('employee', EmployeeController::class);

    // Route::get('archive/indexedit', [ArchiveController::class,'indexedit']);

    Route::post('archiveExport/searchdate', [ArchiveExportController::class, 'searchdate']);
    Route::post('archiveExport/searchnumber', [ArchiveExportController::class, 'searchnumber']);

    Route::post('archive/searchdate', [ArchiveController::class, 'searchdate']);
    Route::post('archive/searchnumber', [ArchiveController::class, 'searchnumber']);

    Route::post('censorshipExport/search', [CensorshipExportController::class, 'search']);
    Route::post('censorship/search', [CensorshipController::class, 'search']);

    Route::post('computerExport/search', [ComputerExportController::class, 'search']);
    Route::post('computer/search', [ComputerController::class, 'search']);

    Route::post('jibayaexport/search', [JibayaexportController::class, 'search']);
    Route::post('jibaya/search', [JibayaController::class, 'search']);

    Route::post('legalexport/search', [LegalexportController::class, 'search']);
    Route::post('legal/search', [LegalController::class, 'search']);
});

// ********************************************inventory*****************************************************************
Route::prefix('inventory/')->middleware('auth')->group(function () {
    Route::resource('TypesFuel', TypesFuelController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('item', ItemController::class);
    Route::resource('store', storeController::class);
    Route::resource('supplier_item', SupplierItemController::class);
    Route::resource('invoice', InvoiceController::class);
    Route::resource('invoice_export', InvoiceExportController::class);
    Route::resource('custody', CustodyController::class);
    Route::resource('currency', CurrencyController::class);
    Route::resource('custody_Item', CustodyItemController::class);
    // **********************************************Repooooooooooooooort*************************************************
    Route::get('totalreport', [ReportController::class, 'totalreport'])->name('inventory.totalreport');
    Route::post('searchbalance', [ReportController::class, 'searchbalance']);

    Route::get('/transactions_report', [ReportController::class, 'transactions_report'])->name('transactions_report');
    Route::get('/transactions/{itemId}', [ReportController::class, 'transactions'])->name('transactions');
    Route::post('transactions_report/searchdate', [ReportController::class, 'searchdate']);

    // *****************************************Inside_Search******************************************************
    Route::post('invoice/searchdate', [InvoiceController::class, 'searchdate']);
    Route::post('invoice_export/searchdate', [InvoiceExportController::class, 'searchdate']);
    Route::post('custody/searchdate', [CustodyController::class, 'searchdate']);
});

// *******************************************get_ajax******************************************************************

Route::get('/getUsers/{id}', [CustodyController::class, 'getUsers']);
Route::get('/getsub_section/{id}', [UserController::class, 'getsub_section']);

// **********************************************sendNotification***************************************************************
Route::prefix('sendNotification')->middleware('auth')->group(function () {
    Route::resource('archiveNot', ArchiveNotController::class);
    Route::resource('legalNot', LegalNotController::class);
    Route::resource('censorshipNot', CensorshipNotController::class);
    Route::resource('computerNot', ComputerNotController::class);
    Route::resource('jibayaNot', JibayaNotController::class);
    Route::get('archiveNotshow/{id}', [ArchiveNotController::class, 'archiveshow']);

    Route::post('archiveNot/searchdate', [ArchiveNotController::class, 'searchdate']);
});

// ********************************************Report*****************************************************************
Route::prefix('/')->group(function () {
    // **************************DieselExport********************************************************************
    Route::get('dieselexportfilter', [DieselExportController::class, 'report'])->name('dieselexport.report');
    Route::get('totalreport', [DieselExportController::class, 'totalreport'])->name('dieselexport.totalreport');
    Route::post('dieselexport/searchdate', [DieselExportController::class, 'searchdate'])->name('dieselexport.searchdate');
    Route::post('dieselexport/searchvou', [DieselExportController::class, 'searchvou'])->name('dieselexport.searchvou');
    Route::post('dieselexport/searchsec', [DieselExportController::class, 'searchsec'])->name('dieselexport.searchsec');
    Route::post('dieselexport/searchname', [DieselExportController::class, 'searchname'])->name('dieselexport.searchname');
    Route::post('dieselexport/searchtotal', [DieselExportController::class, 'searchtotal'])->name('dieselexport.searchtotal');
    // **************************Diesel********************************************************************
    Route::get('dieselfilter', [DieselController::class, 'report'])->name('diesel.report');
    Route::post('diesel/searchdate', [DieselController::class, 'searchdate'])->name('diesel.searchdate');
    Route::post('diesel/searchvou', [DieselController::class, 'searchvou'])->name('diesel.searchvou');
    // **************************legal********************************************************************
    Route::get('legalreport', [LegalController::class, 'report']);
});

// ***********************************************historical**************************************************************
Route::prefix('/historical')->group(function () {
    Route::get('exportindex', [HistoricalController::class, 'exportindex'])->name('historical.exportindex');
    Route::get('exportreport', [HistoricalController::class, 'exportreport'])->name('historical.exportreport');
    Route::get('totalreport', [HistoricalController::class, 'totalreport'])->name('historical.totalreport');
    Route::post('searchdate', [HistoricalController::class, 'searchdate'])->name('historical.searchdate');
    Route::post('searchvou', [HistoricalController::class, 'searchvou'])->name('historical.searchvou');
    Route::post('searchsec', [HistoricalController::class, 'searchsec'])->name('historical.searchsec');
    Route::post('searchname', [HistoricalController::class, 'searchname'])->name('historical.searchname');

    Route::post('searchtotal', [HistoricalController::class, 'searchtotal'])->name('historical.searchtotal');

    Route::get('waredindex', [HistoricalController::class, 'waredindex'])->name('historical.waredindex');
    Route::get('waredreport', [HistoricalController::class, 'waredreport'])->name('historical.waredreport');
    Route::post('datewared', [HistoricalController::class, 'datewared'])->name('historical.datewared');
});

// ***********************************************court**************************************************************

Route::prefix('/')->group(function () {
    // ***********************************طلب تنفيذي أمر المحكمة 2 *************************************
    Route::get('court/court_order', [CourtController::class, 'court_order']);

    // ************************قبل عمل الاخطار ******************************
    Route::get('court/B_all_amount', [CourtController::class, 'B_all_amount']);
    Route::get('court/B_part_amount', [CourtController::class, 'B_part_amount']);

    // *****************************************أوامر المنع*************************************
    Route::get('court/travel_ban', [CourtController::class, 'travel_ban']);
    Route::get('court/salary_reservation', [CourtController::class, 'salary_reservation']);
    Route::get('court/detention_order', [CourtController::class, 'detention_order']);

    // ************************بعد عمل الاخطار ******************************
    Route::get('court/A_all_amount', [CourtController::class, 'A_all_amount']);
    Route::get('court/A_part_amount', [CourtController::class, 'A_part_amount']);
    Route::get('court/end_detention', [CourtController::class, 'end_detention']);
});

// *********************************اضافة اخطار 1 ********************************************
Route::resource('court', CourtController::class);

require __DIR__ . '/auth.php';