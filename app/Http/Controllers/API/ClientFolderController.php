<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;



class ClientFolderController extends BaseController
{


            public function index()
            {
                $users = User::select('name')->get();
                return view('users.index', compact('users'));
            }


        

            public function show($id)
            {
                $user = User::find($id);
                return view('users.show', compact('user'));
            }
               

}  