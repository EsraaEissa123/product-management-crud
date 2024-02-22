<?php

namespace App\Http\Controllers\api;

use App\Models\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PharmacyRequest;
use App\Http\Resources\PharmacyResource;

class PharmacyController extends Controller
{
    
    public function index()
    {
        $pharmacies=Pharmacy::latest()->paginate(20);
        return successMessageWithData('The data has been returned successfully', $pharmacies);
    }
    
    public function store(PharmacyRequest $request)
    {
        Pharmacy::create($request->all());
     
        return successMessage('The pharmacy has been created successfully');

    }

    public function show(Pharmacy $pharmacy)
    {
        $pharmacy = new PharmacyResource($pharmacy);
        return successMessageWithData('The data has been returned successfully', $pharmacy);
    }

    public function update(PharmacyRequest $request, Pharmacy $pharmacy)
    {
        $pharmacy->update($request->all());    
        return successMessage('The pharmacy has been modified successfully');

    }

    public function destroy(Pharmacy $pharmacy)
    {
        $pharmacy->delete();    
        return successMessage('Pharmacy has been deleted successfully');

    }
}
