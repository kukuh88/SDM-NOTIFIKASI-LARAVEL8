<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();

        return view('book.index', compact(['book']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|max:255|unique:book',
            'name' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'golongan' => 'required|max:255',
            'tmt_golongan' => 'required|max:255',
            'eselon' => 'required|max:255',
            'tmt_eselon' => 'required|max:255'
        ]);

        $book = Book::create($validatedData);

        return redirect()->route('book.index')->with('success', 'Data has been saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('book.edit', compact(['book']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        // $book = Book::find($id);
        $book->update($request->all());
        toastr()->success('Data has been updated successfully!');

        return redirect()->route('book.index')->with('success','Data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        if(request()->ajax()){
            return response()->json([
                'code' => 0,
                'message' => ('message berhasil')
            ]);
        }
        return redirect()->route('book.index')->with('success','Data has been deleted successfully!');
    }

    public function notif()
    {
        $now = Carbon::today();
        $books = Book::select()
            ->where('tmt_golongan', $now)
            ->orWhere('tmt_eselon', $now)
            ->get();

        return response()->json(['data' => $books]);
    }
}
