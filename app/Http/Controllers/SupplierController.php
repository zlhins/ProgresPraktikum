<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('master-data.supplier-master.index', compact('suppliers'));
    }

    public function create()
    {
        return view('master-data.supplier-master.create-supplier');
    }

    public function store(Request $request)
    {
        $validasi_data = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'supplier_address' => 'nullable|string|max:500',
            'phone' => 'required|string|max:15',
            'comment' => 'nullable|string',
        ]);

        Supplier::create($validasi_data);
        return redirect()->back()->with('success', 'Supplier created successfully!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
       //
    }

    public function update(Request $request, string $id)
    {
       //
    }

    public function destroy(string $id)
    {
        //
    }
}
