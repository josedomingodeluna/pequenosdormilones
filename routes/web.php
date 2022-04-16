<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BranchController;
use App\Http\Controllers\FolioController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentDataController;

// Sales Controllers
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AssignUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. Theses
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('can:dashboard')->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Branch
Route::prefix('sucursal')->group(function() {
    Route::get('/consulta',[BranchController::class,'index'])->name('branch.index');
    Route::get('/registro', [BranchController::class, 'create'])->name('branch.create');
    Route::post('/guardar', [BranchController::class, 'store'])->name('branch.store');
    Route::get('/editar/{id}', [BranchController::class, 'edit'])->name('branch.edit');
    Route::post('/actualizar/{id}', [BranchController::class, 'update'])->name('branch.update');
    Route::get('/eliminar/{id}', [BranchController::class, 'destroy'])->name('branch.destroy');
});

// Folio
Route::prefix('folio')->group(function() {
    Route::get('/consulta', [FolioController::class, 'index'])->name('folio.index');
    Route::get('/registro', [FolioController::class, 'create'])->name('folio.create');
    Route::post('/guardar', [FolioController::class, 'store'])->name('folio.store');
    Route::get('/editar/{id}', [FolioController::class, 'edit'])->name('folio.edit');
    Route::post('/actualizar/{id}', [FolioController::class, 'update'])->name('folio.update');
    Route::get('/eliminar/{id}', [FolioController::class, 'destroy'])->name('folio.destroy');
});

// Category
Route::prefix('categoria')->group(function() {
    Route::get('/consulta', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/registro', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/guardar', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/editar/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/actualizar/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/eliminar/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

// Product
Route::prefix('producto')->group(function() {
    Route::get('/consulta', [ProductController::class, 'index'])->name('product.index');
    Route::get('/registro', [ProductController::class, 'create'])->name('product.create');
    Route::post('/guardar', [ProductController::class, 'store'])->name('product.store');
    Route::get('/editar/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/actualizar/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/eliminar/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::post('/importar', [ProductController::class, 'import'])->name('product.import');

});

// Employee
Route::prefix('empleado')->group(function() {
    Route::get('/consulta', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/registro', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/guardar', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/editar/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('/actualizar/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('/eliminar/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
});

// Payroll
Route::prefix('pagos')->group(function() {
    Route::get('/consulta', [PayrollController::class, 'index'])->name('payroll.index');
});

// Assign Users
Route::prefix('asignar')->group(function() {
    Route::get('/consultar', [AssignUserController::class,'index'])->name('assign_user.index');
    Route::get('/vincular/{id}', [AssignUserController::class,'create'])->name('assign_user.create');
    Route::post('/guardar', [AssignUserController::class, 'store'])->name('assign_user.store');
});

// Commission
Route::prefix('comision')->group(function() {
    Route::get('/consulta', [CommissionController::class, 'index'])->name('commission.index');
    Route::get('/registro', [CommissionController::class, 'create'])->name('commission.create');
    Route::post('/guardar', [CommissionController::class, 'store'])->name('commission.store');
    Route::get('/editar/{id}', [CommissionController::class, 'edit'])->name('commission.edit');
    Route::post('/actualizar/{id}', [CommissionController::class, 'update'])->name('commission.update');
    Route::get('/eliminar/{id}', [CommissionController::class, 'destroy'])->name('commission.destroy');
});

// Role
Route::prefix('rol')->group(function() {
    Route::get('/consulta', [RoleController::class, 'index'])->name('role.index');
    Route::get('/registro', [RoleController::class, 'create'])->name('role.create');
    Route::post('/guardar', [RoleController::class, 'store'])->name('role.store');
    Route::get('/editar/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/actualizar/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::get('/eliminar/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
});

// Customer
Route::prefix('cliente')->group(function() {
    Route::get('/consulta', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/registro', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/guardar', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/editar/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/actualizar/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('/eliminar/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
});

// User
Route::prefix('usuario')->group(function() {
    Route::get('/consulta', [UserController::class, 'index'])->name('user.index');
    Route::get('/registro', [UserController::class, 'create'])->name('user.create');
    Route::post('/guardar', [UserController::class, 'store'])->name('user.store');
    Route::get('/editar/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/actualizar/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/eliminar/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/cerrarsesion', [UserController::class, 'logout'])->name('user.logout');
});

// Inventory
Route::prefix('inventario')->group(function() {
    Route::get('/', [InventoryController::class, 'index'])->name('inventory.index');
    Route::post('/nuevo', [InventoryController::class, 'create'])->name('inventory.create');
});

// Quotes
Route::prefix('cotizacion')->group(function() {
    Route::get('/consulta', [QuoteController::class,'index'])->name('quote.index');
    Route::get('/previo', [QuoteController::class,'preview'])->name('quote.preview');
    Route::get('/registro', [QuoteController::class,'create'])->name('quote.create');
    Route::post('/guardar', [QuoteController::class, 'store'])->name('quote.store');
    Route::get('/eliminar/{id}', [QuoteController::class, 'destroy'])->name('quote.destroy');
    Route::get('/imprimir/{id}', [QuoteController::class,'print'])->name('quote.print');
    Route::get('/formato', [QuoteController::class,'format'])->name('quote.format');
    // Product
    Route::get('/agregar/{id}/{name}/{price}', [QuoteController::class,'addItemQuote'])->name('quote.addItemQuote');
    Route::get('/actualizar/{id}', [QuoteController::class,'editItem'])->name('quote.editItem');
    Route::get('/eliminar/{id}', [QuoteController::class,'removeItem'])->name('quote.removeItem');
    Route::get('/eliminar', [QuoteController::class,'delete'])->name('quote.delete');

    Route::get('/foliosucursal/ajax/{branch_id}', [PurchaseOrderController::class, 'getBranchFolios']);
});

// Document
Route::prefix('documento')->group(function() {
    Route::get('/consultar', [DocumentController::class,'index'])->name('document.index');
    Route::get('/registro', [DocumentController::class,'create'])->name('document.create');
    Route::post('/guardar', [DocumentController::class, 'store'])->name('document.store');

});

// DocumentData
Route::prefix('datosdocumento')->group(function() {
    Route::get('/consulta', [DocumentDataController::class,'index'])->name('document_data.index');
    Route::get('/registro', [DocumentDataController::class,'create'])->name('document_data.create');
    Route::post('/guardar', [DocumentDataController::class, 'store'])->name('document_data.store');
    Route::get('/eliminar/{id}', [QuoteController::class, 'destroy'])->name('document_data.destroy');

});

// PurchaseOrder
Route::prefix('ordendecompra')->group(function() {
    Route::get('/consulta', [PurchaseOrderController::class,'index'])->name('purchase_order.index');
    Route::get('/previo', [PurchaseOrderController::class,'preview'])->name('purchase_order.preview');
    Route::get('/registro', [PurchaseOrderController::class,'create'])->name('purchase_order.create');
    Route::post('/guardar', [PurchaseOrderController::class, 'store'])->name('purchase_order.store');
    Route::get('/eliminar/{id}', [PurchaseOrderController::class, 'destroy'])->name('purchase_order.destroy');
    Route::get('/descuento/{id}', [PurchaseOrderController::class, 'addDiscount'])->name('purchase_order.addDiscount');
    Route::get('/iva/{id}', [PurchaseOrderController::class, 'addTax'])->name('purchase_order.addTax');
    Route::get('/imprimir/{id}', [PurchaseOrderController::class,'print'])->name('purchase_order.print');
    // Product
    Route::get('/agregar/{id}/{name}/{price}', [PurchaseOrderController::class,'addItem'])->name('purchase_order.addItem');
    Route::get('/actualizar/{id}', [PurchaseOrderController::class,'editItem'])->name('purchase_order.editItem');
    Route::get('/eliminar/{id}', [PurchaseOrderController::class,'removeItem'])->name('purchase_order.removeItem');
    Route::get('/eliminar', [PurchaseOrderController::class,'delete'])->name('purchase_order.delete');

    Route::get('/foliosucursal/ajax/{branch_id}', [PurchaseOrderController::class, 'getBranchFolios']);
});

// Sale
Route::prefix('ventas')->group(function() {
    Route::get('/consultar', [SaleController::class,'index'])->name('sale.index');
    Route::get('/generar/{id}', [SaleController::class,'generate'])->name('sale.generate');
});

// Payment
Route::prefix('pagos')->group(function() {
    Route::get('/consultar/{id}', [PaymentController::class,'index'])->name('payment.index');
    Route::post('/guardar', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/registrar/{id}', [PaymentController::class,'create'])->name('payment.create');
});