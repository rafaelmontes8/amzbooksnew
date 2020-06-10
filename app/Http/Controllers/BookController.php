<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Book;
use App\UserBook;
use App\Comments;
use Auth;

class BookController extends Controller
{

    /**
     * __construct
     *
     * @return void
     */
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
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook"><i class="fas fa-edit"></i></a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook"><i class="fas fa-trash"></i></a>';
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
                ['title' => $request->title, 'description' => $request->description, 'author' => $request->author, 'image' => $request->image]);

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
    /**
     * Add the specified book to the list.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addtolist($id){
        $user=Auth::user()->id;
        UserBook::Create(['userId' => $user, 'bookId' => $id]);
        return back()->withInput();
    }
    /**
     * Remove the specified book from the list.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removefromlist($id){
        $user=Auth::user()->id;
        UserBook::where(['userId' => $user, 'bookId' => $id])->delete();
        return back()->withInput();

    }
    /**
     * Shows a specified book from the page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showbook($id){
        $libro=Book::find($id);
        $comments=Comments::where('bookid','=',$id)->orderBy('id','DESC')->paginate(5);
        $userbooks=UserBook::all();

        return view('showbook',compact('libro','comments','userbooks'));
    }
    /**
     * Creates a new comment in the book page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function writecomment(Request $request){
        $username=Auth::user()->name;
        $user=Auth::user()->id;
        Comments::Create(['username' =>$username,'userid' => $user, 'bookid' => $request->bookid,'comment' => $request->comment]);

        return back()->withInput();
    }

    /**
     * Deletes a comment if the user is the owner.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletecomment($id){
        $user=Auth::user()->id;
        $username=Auth::user()->name;
        \Log::info('Comentario borrado por '.$username);
        Comments::find($id)->delete();
        return back()->withInput();
    }
    /**
     * Creates or Updates a Rating in a specified book and user.
     *
     * @return \Illuminate\Http\Response
     */
    public function rating(Request $request){
        $user=Auth::user()->id;
        $old=UserBook::where('userId',$user)->where('bookId',$request->idbook)->first();
        if($old){
            UserBook::find($old->id)->update(['rating' => $request->rating]);
        }else{
            UserBook::updateOrCreate(['userId' => $user, 'bookId' => $request->idbook,'rating' => $request->rating]);
        }
        return back()->withInput();
    }

    /**
     * Destroys a book from the front if you are using an admin user.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroybook(Request $request){
    if(Auth::user()->role == 'admin'){
        Book::find($request->id)->delete();
    }
       return redirect('home');
    }

    /**
     * Returns the book search in Api view.
     *
     * @return view with $books param
     */
    public function search(){
        $books=Book::all();
        return view('searchbook',compact('books'));
    }
}
