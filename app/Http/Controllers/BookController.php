<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Book;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::latest()->get();
        /* dd($books); */
          if ($request->ajax()) {
            $data = Book::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('bookAjax',compact('books'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Log::info($request->all());
        Book::updateOrCreate(['id' => $request->Book_id],
                ['title' => $request->title, 'description' => $request->description, 'author' => $request->author]);

        return response()->json(['success'=>'Book saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Log::info($id);
       Book::find($id)->delete();

        return response()->json(['success'=>'Book deleted successfully.']);
    }














    //Sin ajax












     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function index()
    {
        $items = Item::latest()->paginate(5);

        return view('items.index',compact('items'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function create()
    {
        return view('items.create');
    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')
                        ->with('success','Item created successfully.');
    }
 */
    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $Item
     * @return \Illuminate\Http\Response
     */
    /*
    public function show(Item $item)
    {
        return view('items.show',compact('item'));
    } */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $Item
     * @return \Illuminate\Http\Response
     */
    /*
    public function edit(Item $item)
    {
        return view('items.edit',compact('item'));
    } */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $Item
     * @return \Illuminate\Http\Response
     */
    /*
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')
                        ->with('success','Item updated successfully');
    } */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $Item
     * @return \Illuminate\Http\Response
     */
    /*
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')
                        ->with('success','Item deleted successfully');
    } */









}
