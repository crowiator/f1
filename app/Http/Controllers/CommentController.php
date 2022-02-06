<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

        //validation
        $request->validate([
            'text'=>'required|min:5',
            'post_id'=>'required|integer|exists:posts,id'
        ]);
        //create comment for logged in user
        $comment = auth()->user()->comments()->create(
            $request->all()
        );
        return redirect('/posts/'.$comment->post->id. '#comments')
            ->with('flash', 'Comment was added');
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Comment $comment)
    {
        //
        $this->authorize('delete',$comment);
        $comment->delete();
        return back();
    }
}
