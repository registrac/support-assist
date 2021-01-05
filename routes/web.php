<?php

use App\Http\Controllers\CustomerUserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return redirect('login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::middleware('user.active')->group( function () {

        /**
         * Display Dashboard
         */
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

        /**
         * Create Ticket
         */
        Route::get('/tickets/create', function () {
            return view('admin.tickets.create');
        })->name('ticket-create');

        /**
         * Display Single Ticket
         */
        Route::get('/ticket/{ticket}', [App\Http\Controllers\TicketController::class, 'show']);

        /**
         * CONTRACTS ROUTES
         */

        /**
         *  Display Contracts
         */
        Route::middleware('user.admin')->get('contracts', [App\Http\Controllers\ContractController::class, 'index'])->name('contracts');

        /**
         * Create Contract
         */
        Route::middleware('user.admin')->get('contracts/create', [App\Http\Controllers\ContractController::class, 'create'])->name('contract-create');

        /**
         * Display Single Contract
         */
        Route::get('contract/{contract}', [App\Http\Controllers\ContractController::class, 'show']);

        /**
         * Edit Contract
         */
        Route::middleware('user.admin')->get('contract/{contract}/edit', [App\Http\Controllers\ContractController::class, 'edit']);

        /**
         * Grab Contract Attachment
         */
        Route::get('contract/{contract}/view-file', [App\Http\Controllers\FileController::class, 'grab_contract']);



        /**
         * BILLING PORTAL ROUTE
         */
        Route::get('customer/{company}/billing/', [App\Http\Controllers\CompanyController::class, 'billingPortal']);


        /**
         * ###########################
         * ONLY ADMIN ROUTES
         * ###########################
         */
        Route::middleware('user.admin')->group( function () {

            /**
             * CUSTOMER ROUTES
             */

            /**
             * Display Customers
             */
            Route::get('/customers', [App\Http\Controllers\CompanyController::class, 'index'])->name('customers');

            /**
             * Create Customer
             */
            Route::get('/customers/create', function () {
                return view('admin.customers.create');
            })->name('customer-create');

            /**
             * Display Single Customer
             */
            Route::get('/customer/{company}', [App\Http\Controllers\CompanyController::class, 'show']);

            /**
             * Edit Customer
             */
            Route::get('/customer/{company}/edit', [App\Http\Controllers\CompanyController::class, 'edit']);

            /**
             * Display Customer's Users
             */
            Route::get('/customer/{company}/users', [App\Http\Controllers\UserController::class, 'show_company_users'])->name('customer-users');

            /**
             * Resend Customer's Invitation
             */
            Route::post('/customers/user/{user}/invite', [App\Http\Controllers\UserController::class, 'resend_invitation']);

            /**
             * TICKETS ROUTES
             */

            /**
             * Display Tickets
             */
            Route::get('/tickets', [App\Http\Controllers\TicketController::class, 'index'])->name('tickets');

            /**
             * Edit Ticket
             */
            Route::get('/ticket/{ticket}/edit', [App\Http\Controllers\TicketController::class, 'edit']);

            /**
             * Grab Ticket Attachment
             */
            Route::get('ticket/{ticket}/view-attachment', [App\Http\Controllers\FileController::class, 'grab_attachment']);
        });

    });

    /**
     * Activate New Users
     */

    Route::get('activate', function () {
        return view('activate');
    })->name('activate');

    Route::post('activate', [App\Http\Controllers\UserController::class, 'activate']);

    /**
     * End: Activate New Users
     */
});




