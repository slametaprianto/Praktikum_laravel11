<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::latest()->paginate(10);

        return view('categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->withSuccess('Category created successfully.');
    }

    public function show(string $id): View
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    public function edit(string $id): View
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Temukan kategori dan perbarui
        $category = Category::findOrFail($id);
        $category->update($request->only('name'));

        // Redirect dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        try {
            // Temukan kategori berdasarkan ID dan hapus
            $category = Category::findOrFail($id);
            $category->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->route('categories.index')->with('error', 'Failed to delete category.');
        }
    }
    public function categoryPdf()
    {
        $categories = Category::get();
        $data = [
            'title' => 'Welcome To fti.uniska-bjm.ac.id',
            'date' => date('d/m/Y'),
            'categories' => $categories
        ];
        $pdf = PDF::loadView('categorypdf', $data);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('Data Kategori.pdf', array("attachment" => false));
    }
}
