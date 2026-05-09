<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();
        return view('buku.indeks', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('buku.tambah', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stock' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('books', 'public');
        }

        Book::create($data);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(Book $buku)
    {
        $book = $buku;
        return view('buku.detail', compact('book'));
    }

    public function edit(Book $buku)
    {
        $book = $buku;
        $categories = Category::all();
        return view('buku.ubah', compact('book', 'categories'));
    }

    public function update(Request $request, Book $buku)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stock' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($buku->image) {
                Storage::disk('public')->delete($buku->image);
            }
            $data['image'] = $request->file('image')->store('books', 'public');
        }

        $buku->update($data);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Book $buku)
    {
        if ($buku->image) {
            Storage::disk('public')->delete($buku->image);
        }
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
