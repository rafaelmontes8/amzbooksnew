<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\ApiKeys;

class ApiController extends Controller
{


    public function getbooks($key) {
        $apis= ApiKeys::all();
        $validation=false;
        foreach ($apis as $api) {
            if ($api->apikey == $key){
                $validation=true;
            }
        }
        $books= Book::all();
        if($validation){
            return response()->json($books);
        }else{
            return response()->json(['fail'=>'Api Key incorrecta']);
        }
    }

    public function slugify($text){

        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '+', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
        }

    public function addbook(Request $request) {
        $busqueda=$this->slugify($request->busqueda);
        $datos=file_get_contents('https://www.googleapis.com/books/v1/volumes?q='.$busqueda.'&key=AIzaSyBaF1Qgm592Z14Tjyzi_I9pGnVk9DoC6sI');
        $libro = json_decode($datos);
        /*
                if(isset($_POST['busqueda'])){
                    $datos=file_get_contents('https://www.googleapis.com/books/v1/volumes?q='.$_POST['busqueda'].'&key=AIzaSyBaF1Qgm592Z14Tjyzi_I9pGnVk9DoC6sI');
                }else{
                    $datos=file_get_contents('https://www.googleapis.com/books/v1/volumes?q=harry+potter&key=AIzaSyBaF1Qgm592Z14Tjyzi_I9pGnVk9DoC6sI');
                }
        */
        /* dd($libro); */

        foreach ($libro->items as $item){
            if(isset($item->volumeInfo->title)){
                $descripcion='null';

                if(isset($item->volumeInfo->authors) && !isset($item->volumeInfo->publisher)){
                    $titulo = $item->volumeInfo->title;
                    if(isset($item->volumeInfo->description)){
                        $descripcion = $item->volumeInfo->description;
                    }
                    if(isset($item->volumeInfo->imageLinks->large)){
                        $portada = $item->volumeInfo->imageLinks->large;
                    }elseif(isset($item->volumeInfo->imageLinks->thumbnail)){
                        $portada = $item->volumeInfo->imageLinks->thumbnail;
                    }elseif(!isset($item->volumeInfo->imageLinks->thumbnail)){
                        $portada = 'img/no-image.png';
                    }
                    $autor = $item->volumeInfo->authors[0];
                    $editorial = "desconocida";
                    Book::Create(['title' => $titulo,
                                'description' => $descripcion,
                                'author' => $autor,
                                'image' => $portada,
                                'editorial' => $editorial]);

                   /*  $conexion->exec("INSERT INTO libro(titulo, portada, autor) VALUES ('$titulo', '$portada', '$autor' ) "); */
                }
                if(isset($item->volumeInfo->publisher) && isset($item->volumeInfo->authors[0])){
                    $titulo = $item->volumeInfo->title;
                    if(isset($item->volumeInfo->description)){
                        $descripcion = $item->volumeInfo->description;
                    }
                    if(isset($item->volumeInfo->imageLinks->large)){
                        $portada = $item->volumeInfo->imageLinks->large;
                    }elseif(isset($item->volumeInfo->imageLinks->thumbnail)){
                        $portada = $item->volumeInfo->imageLinks->thumbnail;
                    }elseif(!isset($item->volumeInfo->imageLinks->thumbnail)){
                        $portada = 'img/no-image.png';
                    }
                    $autor = $item->volumeInfo->authors[0];
                    $editorial = $item->volumeInfo->publisher;

                    Book::Create(['title' => $titulo,
                                'description' => $descripcion,
                                'author' => $autor,
                                'image' => $portada,
                                'publisher' => $editorial]);
                }
                if(!isset($item->volumeInfo->authors[0]) && !isset($item->volumeInfo->publisher)){
                    $titulo = $item->volumeInfo->title;
                    if(isset($item->volumeInfo->description)){
                        $descripcion = $item->volumeInfo->description;
                    }
                    if(isset($item->volumeInfo->imageLinks->large)){
                        $portada = $item->volumeInfo->imageLinks->large;
                    }elseif(isset($item->volumeInfo->imageLinks->thumbnail)){
                        $portada = $item->volumeInfo->imageLinks->thumbnail;
                    }elseif(!isset($item->volumeInfo->imageLinks->thumbnail)){
                        $portada = 'img/no-image.png';
                    }
                    $autor = 'Desconocido';

                    Book::Create(['title' => $titulo,
                                'description' => $descripcion,
                                'author' => $autor,
                                'image' => $portada,
                                'publisher' => 'desconocida']);

                }
            }
        }
        return view('bookAjax');



    }

    public function filtersearchbook(Request $request){
        $search=$request->get('search');
        $key=$request->get('key');
        $apis= ApiKeys::all();
        $validation=false;
        foreach ($apis as $api) {
            if ($api->apikey == $key){
                $validation=true;
            }
        }
        $books=Book::where('title','like','%'.$search.'%')->orderBy('id','DESC')->get();
        if($validation){
            return response()->json($books);
        }else{
            return response()->json(['fail'=>'Api Key incorrecta']);
        }
    }

    public function filtersearchauthor(Request $request){
        $search=$request->get('search');
        $key=$request->get('key');
        $apis= ApiKeys::all();
        $validation=false;
        foreach ($apis as $api) {
            if ($api->apikey == $key){
                $validation=true;
            }
        }
        $books=Book::where('author', 'like', '%'.$search.'%')->orderBy('id','DESC')->get();
        if($validation){
            return response()->json($books);
        }else{
            return response()->json(['fail'=>'Api Key incorrecta']);
        }
    }

}
