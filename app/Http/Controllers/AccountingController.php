<?php

namespace App\Http\Controllers;

use App\Models\AccountedItem;
use App\Models\GeneralLedgerCode;
use App\Models\Invoice;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    public function index()
    {
        $glcodes = GeneralLedgerCode::all();
        $invoices = Invoice::with('accountedItems')->get();

        return view('accounting.index', compact('invoices', 'glcodes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'tartozik' => 'required|string|max:255',
            'kovetel' => 'required|string|max:255',
        ]);

        AccountedItem::create([
            'invoice_id' => $request->invoice_id,
            'tartozik' => $request->tartozik,
            'kovetel' => $request->kovetel,
            'total' => $request->total,  // Total can be nullable
        ]);

        return redirect()->route('accounting.index')->with('success', 'Invoice accounted successfully!');
    }
}
