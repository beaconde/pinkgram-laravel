<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function edit()
    {
        return view('user.edit');
    }

    public function update(Request $request) {

        $data = $request->all();
        $image = $request->file('image');

        if ($image) {
            $image_name = Auth::user()->id."_".$image->getClientOriginalName();//.'.png';

//            no funciona :(
//            if(Auth::user()->image != 'anon.png') {
//                Storage::disk('users')->delete(Auth::user()->image);
//            }
            $image->storeAs('public/users', $image_name);
            $data['image'] = $image_name;
        }

        Auth::user()->update($data);
        return redirect()->route('home');
    }

    public function upload() {
        return view('image.create');
    }

    public function show() {
        $user = User::findOrFail(Auth::user()->id);
        $images = Image::paginate(5);
        $comments = Comment::all();
        return view('user.profile', ['user' => $user, 'images' => $images, 'comments' => $comments]);
    }

}
