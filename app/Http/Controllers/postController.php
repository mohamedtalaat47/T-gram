<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\User;

class postController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $following = auth()->user()->following()->pluck('profiles.user_id');

        $posts = post::wherein('user_id',$following)->with('user')->latest()->paginate(5);

        $suggested = User::whereHas('post')->limit(5)->get();

        return view('posts.index', compact('posts','suggested'));

    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {

        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $img_path = request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$img_path}"))->fit(1200,1200);
        $image->save();

        auth()->user()->post()->create([
            'caption'=> $data['caption'],
            'image'=> $img_path
        ]);
        
        return redirect('/profile/' . auth()->user()->id);
    }


    public function show(\App\Models\post $post){
        return view('posts.show', compact('post'));
    }

    
}
