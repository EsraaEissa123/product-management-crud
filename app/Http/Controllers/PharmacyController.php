<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Http\Requests\PharmacyRequest;

class PharmacyController extends Controller
{
    public function index()
    {
        $pharmacies = Pharmacy::latest()->paginate(20);
        return view('pharmacies.index', compact('pharmacies'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        return view('pharmacies.create');
    }

    public function store(PharmacyRequest $request)
    {
        Pharmacy::create($request->all());

        return redirect()->route('pharmacies.index')
                         ->with('success', 'pharmacy created successfully.');
    }

    public function show(Pharmacy $pharmacy)
    {
        return view('pharmacies.show', compact('pharmacy'));
    }

    public function edit(Pharmacy $pharmacy)
    {
        return view('pharmacies.edit', compact('pharmacy'));
    }

    public function update(PharmacyRequest $request, Pharmacy $pharmacy)
    {
        $pharmacy->update($request->all());
        return redirect()->route('pharmacies.index')
                         ->with('success', 'Pharmacy updated successfully');
    }

    public function destroy(Pharmacy $pharmacy)
    {
        $pharmacy->delete();
        return redirect()->route('pharmacies.index')
                         ->with('success', 'Pharmacy deleted successfully');
    }
}
