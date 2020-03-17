<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index(){
        
        if(Auth::check()){
        
            $user_id = Auth::id();
            $user = User::Find($user_id);
            
            return view('pages.index')->with('posts',$user->post );
        }

        return redirect('/login');

    }

    public function about(){
        return view('pages.about');
    }

    public function services(){
        $data = array(
            'title' => 'Services Page',
            'services'=> ['Web Design', 'Logo Design', 'Branding' ,'apple','mango']
        );
        return view('pages.services')->with($data);
    }
}
