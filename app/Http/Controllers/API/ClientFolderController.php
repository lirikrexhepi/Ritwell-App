<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ClientFolderController extends Controller
{
            public function index()
            {
                if(Auth::user()->role=="1"){

                $users = User::select('name')->get();
                return response()->json($users, 200);
                }
                else{
                    return response()->json(['message' => 'Unauthenticated user']);
                }

            }



            public function show($email)
            {
                if(Auth::user()->role=="1"){
                $user = User::where('email', $email)->first();
                return response()->json($user, 200);
            }
            else{
                return response()->json(['message' => 'Unauthenticated user']);
            }
            }




            public function clientProperties(Request $request, $email)
            {
                $clientProperties = User::where('email', $email)->first();
                $clientProperties->strongPoints = $request->input('strongPoints');
                $clientProperties->weakPoints = $request->input('weakPoints');
                $clientProperties->save();

                return response()->json($clientProperties, 200);
            }


            public function clientPropertiesShow($email)
            {
                if(Auth::user()->role=="1"){
                    $user = User::select('strongPoints', 'weakPoints')
                                ->where('email', $email)
                                ->first();
                    return response()->json($user, 200);
                }
                else{
                    return response()->json(['message' => 'Unauthenticated user']);
                }
            }



            
}
