<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homework;
use App\Models\User;

class HomeworkFolderController extends Controller
{

    public function index(Request $request, $email)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json(['message' => 'User not found']);
            $homework = Homework::where('recipient_email', $email)->get();
            return response()->json(['homework' => $homework]);
        }
    }



    public function store(Request  $request, $email)
    {
        if (Auth::user()->role == "1") {
            $user = User::where('email', $email)->first();

            if (!$user) {
                return response()->json(['message' => 'User not found']);
            }

            Homework::create([
                'title' => $request->title,
                'instruction' => $request->instruction,
                'recipient_email' => $email
            ]);

            return response()->json(['message' => 'Homework sent successfully.']);
        } else {
            return response()->json(['message' => 'Unauthorized']);
        }
    }



    public function update(Request $request, $id,)
    {
        if (Auth::user()->role == "1") {
            $homework = Homework::find($id);
            $homework->title = $request->input('title');
            $homework->instruction = $request->input('instruction');
            $homework->recipient_email = $request->input('recipient_email');
            $homework->save();

            return response()->json(['message' => 'Updated homework successfully']);
        } else {
            return response()->json(['message' => 'Unauthorized']);
        }
    }


    public function show(Request $request, $id)
    {
        $homework = Homework::find($id);

        if (!$homework) {
            return response()->json(['message' => 'Homework not found']);
        }


        if ($homework->recipient_email !== $request->user()->email && $request->user()->role !== 1) {
            $role = $request->user()->role;
            return response()->json(['message' => 'Unauthorized']);
        }


        return response()->json(['homework' => $homework]);
    }



    public function markCompleted(Request $request, $id)
    {
        $homework = Homework::find($id);

        if (!$homework) {
            return response()->json(['message' => 'Homework not found']);
        }

        $homework->completed = true;
        $homework->save();

        return response()->json(['message' => 'Homework marked as completed']);
    }
}
