<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\ProductType;
use App\Comment;

class CommentController extends Controller
{
    //
    
    public function getDanhSach(){
        $comment = Comment::all();
        return view('admin.comment.danhsach',['comment'=>$comment]);
    }
}