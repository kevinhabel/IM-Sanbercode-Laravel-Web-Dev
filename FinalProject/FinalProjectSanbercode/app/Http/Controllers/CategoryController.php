<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('kategori.indeks', compact('categories'));
    }

    public function create()
    {
        return view('kategori.tambah');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Category::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(Category $kategori)
    {
        $books = $kategori->books;
        $category = $kategori;
        return view('kategori.detail', compact('category', 'books'));
    }

    public function edit(Category $kategori)
    {
        $category = $kategori;
        return view('kategori.ubah', compact('category'));
    }

    public function update(Request $request, Category $kategori)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
