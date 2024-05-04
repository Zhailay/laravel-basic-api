<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Loans;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LoansController extends Controller
{
    public function index()
    {
        return response()->json(Loans::all());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|integer',
            'duration' => 'required|integer',
            'inter_rate' => 'required|integer'
        ]);
    
        $loans = Loans::create($validatedData);

        return response()->json($loans,201);
    }

    public function show($id)
    {
        $loans = Loans::findOrFail($id);

        return response()->json($loans);
    }

    public function update(Request $request, $id)
    {
        $loan = Loans::findOrFail($id);
   
        $validatedData = $request->validate([
            'amount' => 'required|integer',
            'duration' => 'required|integer',
            'inter_rate' => 'required|integer'
        ]);

        $loan->update($validatedData);

        return response()->json($loan,200);
    }

    public function destroy($id)
    {
        $loans = Loans::findOrFail($id);
        $loans->delete();

        return response()->json(null,204);
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = $validator->errors()->toJson();

        return new JsonResponse(['error' => $errors], 422);
    }
}
