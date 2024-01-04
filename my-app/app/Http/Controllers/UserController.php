<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    public function delete(Request $request){
        $user = User::find($request->id);
        $user->delete();

        return redirect()->route('user.index');
    }


}
