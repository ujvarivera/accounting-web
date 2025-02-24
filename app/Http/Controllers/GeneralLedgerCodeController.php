<?php

namespace App\Http\Controllers;

use App\Models\GeneralLedgerCode;
use Illuminate\Http\Request;

class GeneralLedgerCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $glcodes = GeneralLedgerCode::all();

        return view('glcodes.index', compact('glcodes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric',
            'name' => 'required|string|max:30',
        ]);

        GeneralLedgerCode::create([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        return redirect()->route('glcodes.index')->with('success', 'General ledger code added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(GeneralLedgerCode $generalLedgerCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GeneralLedgerCode $generalLedgerCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GeneralLedgerCode $generalLedgerCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GeneralLedgerCode $generalLedgerCode)
    {
        //
    }
}
