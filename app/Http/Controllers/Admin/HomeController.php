<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;

class HomeController
{
    public function index()
    {
     /*  $users = User::all();
       
        foreach ($users as $user){
        
            foreach ($user->roles as $role){
                foreach ($role->permissions as $permission){
    echo($permission->title);


                }

      
            }
        }*/

        //return view('home',compact('users'));
        return view('home');
    }
}
