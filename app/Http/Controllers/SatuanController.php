<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SatuanController extends Controller
{
    public function index(): View
    {
        $satuans = Satuan::latest()->paginate(10);

        return view('satuan.index', compact('satuans'));
    }

    public function create(): View
    {
        return view('satuan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        Satuan::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('satuan.index')->with('success', 'satuan created successfully.');
    }

    public function show(string $id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('satuan.show', compact('satuan'));
    }

    public function edit(string $id): View
    {
        $satuan = Satuan::findOrFail($id);
        return view('satuan.edit', compact('satuan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $satuan = Satuan::findOrFail($id);
        $satuan->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('satuan.index')->with('success', 'Satuan updated successfully.');
    }

    public function destroy(string $id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();

        // Mengembalikan respons dalam format JSON
        return response()->json([
            'success' => true,
            'message' => 'Satuan deleted successfully.'
        ]);
    }
}
