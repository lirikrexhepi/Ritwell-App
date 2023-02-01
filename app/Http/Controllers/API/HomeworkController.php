<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    
    public function store(Request  $request)
    {
        if(Auth::user()->role=="1"){
            Homework::create([
                'title'=>$request->title,
                'instruction'=>$request->instruction,

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
