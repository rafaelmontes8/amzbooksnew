<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserBook;
use App\Book;
use Auth;
use App\Support\Collection;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books=Book::orderBy('id','DESC')->paginate(24);
        $userbooks=UserBook::all();
        return view('home',compact('books','userbooks'));
    }
    /**
     * Show the Book list of the User.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function lista(){
        $books=Book::orderBy('id','DESC')->get();
        $userbooks=UserBook::all();
        $aux=collect([]);
        foreach ($books as $libro) {
            $comprobacion = false;
            foreach ($userbooks as $userbook){
                if($libro->id == $userbook->bookId && Auth::user()->id == $userbook->userId){
                    $comprobacion = true;
                }
            }
            if($comprobacion){
                $aux->push($libro);
            }
        }
       $finalbooks=$aux;

        return view('lista',compact('finalbooks','userbooks'));
    }
    /**
     * Show the results of the search made by the user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search(Request $request){
        $search= $request->get('search');
        /* $books=Book::query()->where('title', 'LIKE', "%{$request->search}%")->get(); */
        $books=Book::where('title','like','%'.$search.'%')->orWhere('author', 'like', '%'.$search.'%')->orWhere('description', 'like', '%'.$search.'%')->orderBy('id','DESC')->paginate(24);
        $userbooks=UserBook::all();
        return view('home',compact('books','userbooks'));
    }

}
