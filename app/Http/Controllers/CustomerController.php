<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = Customer::latest()->paginate(10);

        return view('customers.index', compact('customers'));
    }

    public function create(): View
    {
        return view('customers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nik' => 'required|string|numeric',
            'name' => 'required|string|max:255',
            'telp' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:customers',
            'alamat' => 'required|string|max:255',
        ]);

        Customer::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'telp' => $request->telp,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => ['required', 'string', 'numeric'],
            'name' => ['required', 'string', 'max:255'],
            'telp' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers,email,' . $id],
            'alamat' => ['required', 'string', 'max:255'],
        ]);

        $customer = Customer::findOrFail($id);
        $customer->nik = $request->nik;
        $customer->name = $request->name;
        $customer->telp = $request->telp;
        $customer->email = $request->email;
        $customer->alamat = $request->alamat;
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();

            return response()->json([
                'success' => true,
                'message' => 'Customer berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data.'
            ], 500);
        }
    }
}
