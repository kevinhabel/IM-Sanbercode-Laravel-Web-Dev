<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['book', 'user'])->latest()->get();
        return view('transaksi.indeks', compact('transactions'));
    }

    public function create()
    {
        $books = Book::all();
        return view('transaksi.tambah', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:books,id',
            'type' => 'required|in:in,out',
            'amount' => 'required|integer|min:1',
            'notes' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            $book = Book::findOrFail($request->product_id);

            // Create Transaction Record
            Transaction::create([
                'user_id' => Auth::id(),
                'book_id' => $book->id,
                'type' => $request->type,
                'amount' => $request->amount,
                'notes' => $request->notes,
            ]);

            // Update Book Stock
            if ($request->type === 'in') {
                $book->increment('stock', $request->amount);
            } else {
                // Optional: Check if stock is enough for 'out' transaction
                if ($book->stock < $request->amount) {
                    throw new \Exception('Stok tidak cukup untuk transaksi keluar.');
                }
                $book->decrement('stock', $request->amount);
            }

            DB::commit();
            return redirect()->route('transaksi.index')->with('success', 'Transaksi Berhasil! Stok buku telah diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }
}
