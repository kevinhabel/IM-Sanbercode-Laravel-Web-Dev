<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function create(){
        return view('category.createcategory');
    }
    public function store(Request $request) {
    $validated = $request->validate([
        'name' => 'required|min:5',
        'description' => 'required',
    ], [
        'name.required'        => 'Nama wajib diisi!',
        'name.min'             => 'Nama minimal 5 karakter!',
        'description.required' => 'Deskripsi wajib diisi!',
    ]);

        DB::table('categories')->insert([
            'name'        => $request->name,
            'description' => $request->description,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    
    return redirect('/category')->with('success', 'Kategori berhasil ditambahkan!');
    }
     public function index(){
        $categories = DB::table('categories')->get();
        return view('category.index', compact('categories'));
    }
    public function show($id){
        $category = DB::table('categories')->where('id', $id)->first();
        return view('category.show', compact('category'));
    }

    public function edit($id){
        $category = DB::table('categories')->where('id', $id)->first();
        return view('category.editcategory', compact('category'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'        => 'required|min:5',
            'description' => 'required',
        ], [
            'name.required'        => 'Nama wajib diisi!',
            'name.min'             => 'Nama minimal 5 karakter!',
            'description.required' => 'Deskripsi wajib diisi!',
        ]);

        DB::table('categories')->where('id', $id)->update([
            'name'        => $request->name,
            'description' => $request->description,
            'updated_at'  => now(),
        ]);

        return redirect('/category')->with('success', 'Kategori berhasil diupdate!');
    }

    public function destroy($id){
        DB::table('categories')->where('id', $id)->delete();

        return redirect('/category')->with('success', 'Kategori berhasil dihapus!');
    }
}
