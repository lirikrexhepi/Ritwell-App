<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;
use App\Models\User;


class HomeworkFolderController extends Controller
{

    
    public function store(Request  $request, $email)
{
    if(Auth::user()->role=="1"){
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found']);
        }

        Homework::create([
            'title'=>$request->title,
            'instruction'=>$request->instruction,
            'recipient_email' => $user->recipient_email
        ]);

        return response()->json(['message' => 'Homework sent successfully.']);
    }
    else{
        return response()->json(['message' => 'Unauthorized']);
    }
}



    public function update(Request $request, $id)
        {
            if(Auth::user()->role=="1"){
                    $homework = Homework::find($id);
                    $homework->title = $request->input('title');
                    $homework->instruction = $request->input('instruction');
                    $homework->save();

                    return response()->json(['message' => 'Updated homework successfully']);
        }
            else{
                return response()->json(['message' => 'Unauthorized']);
            }
        }

}


