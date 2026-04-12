<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(StoreSupplierRequest $request)
    {
        $validated = $request->validated();

        try {
            Supplier::create($validated);

            return redirect()
                ->route('suppliers.index')
                ->with('success', 'Supplier created successfully.');

        } catch (QueryException $e) {
            Log::error('Supplier store database error', [
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Database error while creating supplier.');
        } catch (\Throwable $e) {
            Log::error('Supplier store unexpected error', [
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Unexpected error occurred.');
        }
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $validated = $request->validated();

        try {
            $supplier->update($validated);

            return redirect()
                ->route('suppliers.index')
                ->with('success', 'Supplier updated successfully.');

        } catch (QueryException $e) {
            Log::error('Supplier update database error', [
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Database error while updating supplier.');
        } catch (\Throwable $e) {
            Log::error('Supplier update unexpected error', [
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Unexpected error occurred.');
        }
    }

    public function destroy(Supplier $supplier)
    {
        try {
            $supplier->delete();

            return redirect()
                ->route('suppliers.index')
                ->with('success', 'Supplier deleted successfully.');

        } catch (\Throwable $e) {
            Log::error('Supplier delete unexpected error', [
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->route('suppliers.index')
                ->with('error', 'Unexpected error occurred.');
        }
    }
}
