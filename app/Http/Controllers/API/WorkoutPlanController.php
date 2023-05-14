<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WorkoutPlan;
use App\Models\Exercise;

class WorkoutPlanController extends BaseController
{

    //Add the workout plan into the database
    public function storeWorkoutPlan(Request $request, $email)
    {
        if (Auth::user()->role == "1") {
            $user = User::where('email', $email)->first();

            if (!$user) {
                return response()->json(['message' => 'User not found']);
            }

            $workoutPlan = WorkoutPlan::create([
                'name' => $request->name,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'user_email' => $user["email"],
                'created_by' => Auth::user()->name, // Change this line
            ]);

            return response()->json(['message' => 'Workout Plan added successfully.', 'exercise' => $workoutPlan]);
        } else {
            return response()->json(['message' => 'Unauthorized']);
        }
    }




    //Add the workouts into the workoutplan
    public function storeExercises(Request $request, $workoutPlanId)
    {
        if (Auth::user()->role == "1") {
            $id = WorkoutPlan::where('id', $workoutPlanId)->first();

            if (!$id) {
                return response()->json(['message' => 'Workout Plan not found']);
            }

            $exercise = Exercise::create([
                'workout_plan_id' => $id["id"],
                'exercise_name' => $request->exercise_name,
                'exercise_description' => $request->exercise_description,
                'week' => $request->week,
                'day' => $request->day,
                'sets' => $request->sets,
                'reps' => $request->reps,
                'rest' => $request->rest, // Change this line
            ]);


            return response()->json(['message' => 'Exercise added successfully.', 'exercise' => $exercise]);
        } else {
            return response()->json(['message' => 'Unauthorized']);
        }
    }

    public function showWorkoutPlans()
    {
        $workoutPlans = WorkoutPlan::where('user_email', Auth::user()->email)->get();

        return response()->json(['workoutPlans' => $workoutPlans]);
    }

    public function showExercises($workoutPlanId)
    {
        $workoutPlan = WorkoutPlan::find($workoutPlanId);

        if (!$workoutPlan) {
            return response()->json(['message' => 'Workout Plan not found']);
        }

        $exercises = Exercise::where('workout_plan_id', $workoutPlanId)->get();

        return response()->json(['workoutPlan' => $workoutPlan, 'exercises' => $exercises]);
    }
}
