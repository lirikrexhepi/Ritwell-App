<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Nutrition as NutritionResource;
use App\Models\Nutrition;
use App\Enums\timeOfDay;
use Validator;
use Illuminate\Support\Facades\Log as FacadesLog;
use Log;


class NutritionController extends BaseController
{
        /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
            public function store(Request  $request)
            {
            

            $nutrition = new Nutrition();
            $nutrition['title'] = $request->title;
            $nutrition['description'] = $request->description;
            $nutrition['calories'] = $request->calories;
            $nutrition['proteins'] = $request->proteins;
            $nutrition['carbohydrates'] = $request->carbohydrates;
        

            $timeOfDay = $request->timeOfDay;

            if($timeOfDay === timeOfDay::OptionOne){
                $nutrition->timeOfDay = "Breakfast";
            }
            elseif($timeOfDay === timeOfDay::OptionTwo){
                $nutrition->timeOfDay = "Lunch";
            }
            elseif($timeOfDay === timeOfDay::OptionThree){
                $nutrition->timeOfDay = "Dinner";
            }



            $nutrition->save();
            }


            /**
                * Update the specified resource in storage.
                *
                * @param  \Illuminate\Http\Request  $request
                * @param  int  $id
                * @return \Illuminate\Http\Response
                */

                public function update(Request $request, $id)
            {
                $nutrition = Nutrition::find($id);
                $nutrition->title = $request->input('title');
                $nutrition->description = $request->input('description');
                $nutrition->calories = $request->input('calories');
                $nutrition->proteins = $request->input('proteins');
                $nutrition->carbohydrates = $request->input('carbohydrates');

                $option = $request->input('timeOfDay');


                if($option === timeOfDay::OptionOne){
                    $nutrition->timeOfDay = "Breakfast";
                }
                elseif($option === timeOfDay::OptionTwo){
                    $nutrition->timeOfDay = "Lunch";
                }
                elseif($option === timeOfDay::OptionThree){
                    $nutrition->timeOfDay = "Dinner";
                }
                

                $nutrition->save();

                return response()->json($nutrition, 200);
            }


            
            public function show($id)
            {
            $nutrition = Nutrition::findOrFail($id);
            
            if ($nutrition->isEmpty()) {
            return $this->sendError('Nutrition not found.');
            }

            return $this->sendResponse(new NutritionResource($nutrition), 'Nutrition retrieved successfully.');
            } 





    public function destroy(Request $request, $id)
    {
        $nutrition = Nutrition::find($id);
        $nutrition->delete();
        return response()->json($nutrition);
        return $this->sendResponse([], 'Nutrition deleted successfully.');
    }



}