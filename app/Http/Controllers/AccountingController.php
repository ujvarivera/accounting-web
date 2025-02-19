<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();

        return view('accounting.index', compact('invoices'));
    }
}
