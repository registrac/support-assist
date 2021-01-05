<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     *  Display customers list
     */
    public function index ()
    {
        $c = array();

        foreach (Company::all() as $company) {
            $total_hours = array_sum( $company->tickets()->whereMonth('tickets.created_at', '=', date('m'))->pluck('tickets.total_hours')->toArray() );
            $c[] = array(
                'id' => $company->id,
                'name' => $company->name,
                'date_created' => $company->created_at,
                'total_hours' => $total_hours
             );
        }

        return view('admin.customers.index', [
            'customers' => $c,
        ]);
    }

    /**
     * Display single customer
     */
    public function show (Company $company)
    {

        $mtd_remote = $company->tickets()->where('mode', 'remote')->whereMonth('tickets.created_at', '=', date('m'))->sum('total_hours');
        $mtd_onsite = $company->tickets()->where('mode', 'on-site')->whereMonth('tickets.created_at', '=', date('m'))->sum('total_hours');

        return view('admin.customers.show', [
            'customer'  =>  $company,
            'tickets'   =>  $company->tickets()->orderBy('created_at', 'desc')->paginate(10),
            'mtd_remote' => $mtd_remote,
            'mtd_onsite' => $mtd_onsite
        ]);
    }

    /**
     * Edit Company
     */
    public function edit (Company $company)
    {
        return view('admin.customers.edit', [
            'company' => $company
        ]);
    }

    /**
     * Redirect to Billing Portal
     */
    public function billingPortal (Company $company)
    {
        return $company->redirectToBillingPortal( url( '/customer/'.$company->id ) );
    }
}
