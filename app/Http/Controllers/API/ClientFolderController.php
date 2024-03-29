<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ClientFolderController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == "1") {
            $users = User::select('name', 'email')->get();
            return response()->json($users, 200);
        } else {
            return response()->json(['message' => 'Unauthenticated user']);
        }
    }



    public function show($email)
    {
        if (!$email) {
            return response()->json(['error' => 'Please provide an email address.'], 400);
        }

        if (Auth::user()->role == "1") {
            $user = User::where('email', $email)->first();
            if (!$user) {
                return response()->json(['error' => 'User not found.'], 404);
            }
            return response()->json($user, 200);
        } else {
            return response()->json(['error' => 'Unauthenticated user.'], 401);
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
        if (Auth::user()->role == "1") {
            $user = User::select('strongPoints', 'weakPoints')
                ->where('email', $email)
                ->first();
            return response()->json($user, 200);
        } else {
            return response()->json(['message' => 'Unauthenticated user']);
        }
    }
}
