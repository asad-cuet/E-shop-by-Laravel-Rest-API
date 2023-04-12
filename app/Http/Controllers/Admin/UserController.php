<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users=User::orderBy('id','DESC')->get();
        return view('admin.users.users',['users'=>$users]);
    }

    public function view_user($user_id)
    {
        $user=User::find($user_id);
        return view('admin.users.view-user',['user'=>$user]);
    }
}
