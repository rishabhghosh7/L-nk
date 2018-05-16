<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use Auth;
use DB;

class LinkController extends Controller
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

    public function feed()
    {
        $collection=DB::table('links')->where('shared', true)->orderBy('votes','desc')->paginate(5);
        // return ['links' => $collection];
        return view('newhome', ['links' => $collection]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();

        $current_user=$user->id;
        $collection = DB::table('links')->where('user_id',$current_user)->paginate(5);

        return view('index', ['links' => $collection]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate by checking if server actually exists at link
        $user = Auth::user();
        $link = new Link;

        $link->link=$request->link;
        $link->votes=0;
        $link->user_id=$user->id;
        $link->shared=false;
        $link->save();

        return redirect()->route('links.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Link::find($id);
        return view('show')->with('link',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link=Link::find($id);
        $link->delete();
        return redirect()->route('links.index');
    }

    public function upvote($id)
    {
        $link=Link::find($id);
        $vote=($link->votes)+1;
        Link::where('id',$id)->update(['votes'=>$vote]);
        return redirect()->back();
    }

    public function downvote($id)
    {
        $link=Link::find($id);
        $vote=($link->votes)-1;
        Link::where('id',$id)->update(['votes'=>$vote]);
        return redirect()->back();
    }

    public function share($id)
    {
        Link::where('id',$id)->update(['shared'=>true]);
        //return redirect()->route('links.index');
        return redirect()->back();
    }
}
