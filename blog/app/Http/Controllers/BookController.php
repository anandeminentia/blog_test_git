<?php
 
namespace App\Http\Controllers;
 
use App\Book;
use App\Bear;
use App\Fish;
use App\Picnic;
use App\Tree;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
 
class BookController extends Controller{
 
 
    public function index(){
 
        $Books  = Book::select('id','title','author')->get();
 
        return response()->json($Books);
 
    }  
    public function GetSelectedBook($id)  
    {
        $Books = Book::select('id','title','author')->where('id','=',$id)->get();

        return response()->json($Books);
    }
    public function GetBookDetailsById(Request $request)
    {
        $Books = Book::select('id','title','author')->where('id','=',$request->book_id)->get();
        if(count($Books) != 0 )
        {
            return response()->json($Books);
        }
        else{
            return response()->json(['message' => 'Ivalid Book Id']);
        }        
    }
    public function AddNewBook(Request $request)
    {
        //echo ("hiiiiii"); exit;
        $ObjNewBook = new Book();
        $ObjNewBook->title = $request->b_title;
        $ObjNewBook->author = $request->b_author;
        $ObjNewBook->publisher = $request->b_publisher;
        $ObjNewBook->save();
        return response()->json(['message' => 'New Book Added Successfully']);
    }
    public function UpdateDetails(Request $request)
    {
        $ObjUpdate = Book::find($request->book_id);
        $ObjUpdate->title = $request->b_title;
        $ObjUpdate->author = $request->b_author;
        $ObjUpdate->publisher = $request->b_publisher;
        $ObjUpdate->save();
        return response()->json(['message' => 'Book Details Successfully', 'data'=>$ObjUpdate]);
    }    
}