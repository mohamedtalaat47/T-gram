<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class profileController extends Controller
{

    public function index(\App\Models\User $user)
    {

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profile.index',compact('user','follows'));
    }

    public function edit(\App\Models\User $user){

        $this->authorize('update',$user->profile);

        return view('profile.edit',compact('user'));

    }

    public function update(\App\Models\User $user){

        $this->authorize('update',$user->profile);

        $data = request()->validate([

            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'nullable'
        ]);

        if(request('image')){

        $img_path = request('image')->store('profilePics','public');

        $image = Image::make(public_path("storage/{$img_path}"))->fit(1000,1000);
        $image->save();

        $imageArray = [ 'image' => $img_path ];
        }
        $user->profile->update(array_merge(

            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }

    
}
