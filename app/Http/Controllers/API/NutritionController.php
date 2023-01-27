<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Nutrition as NutritionResource;
use App\Models\Nutrition;
use App\Enums\timeOfDay;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
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
        public function store(Request $request)
        {

            if(Auth::user()->role=="1"){

                $path = $request->file('image')->store('images');
                Nutrition::create([
                                    'title'=>$request->title,
                                    'description'=>$request->description,
                                    'calories'=>$request->calories,
                                    'proteins'=>$request->proteins,
                                    'carbohydrates'=>$request->carbohydrates,
                                    'image'=>$path
                                ]);

    
                return response()->json(['message' => 'Image uploaded and nutrition info saved successfully.']);
            }else{
                return response()->json(['message' => 'Unauthenticated user']);
            }

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
                if(Auth::user()->role=="1"){
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

                    return response()->json(['message' => 'Updated Nutrition successfully']);
}
                    else{
                        return response()->json(['message' => 'Unauthorized']);
                    }
            }


            
            public function show($id)
            {
            $nutrition = Nutrition::findOrFail($id);
            
            if ($nutrition==null) {
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