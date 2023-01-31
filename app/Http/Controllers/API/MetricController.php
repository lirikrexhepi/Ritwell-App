<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Metrics as MetricsResource;
use App\Models\Metrics;
use App\Models\User;



class MetricController extends BaseController
{
        /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
            /*public function store(Request  $request)
            {
                    
                Metrics::create([
                                        'age'=>$request->age,
                                        'gender'=>$request->gender,
                                        'weight'=>$request->weight,
                                        'height'=>$request->height
                                 ]);

                    return response()->json(['message' => 'Metrics saved successfully.']);
    
            }*/


            public function show($id)
            {
            $metric = Metrics::findOrFail($id);
            
            if ($metric==null) {
            return $this->sendError('Metrics not found.');
            }

            return $this->sendResponse(new MetricsResource($metric), 'Metrics retrieved successfully.');
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
 
                $metric = User::find($id);
                $metric->age = $request->input('age');
                $metric->gender = $request->input('gender');
                $metric->weight = $request->input('weight');
                $metric->height = $request->input('height');
                $metric->save();

                return response()->json($metric, 200);
            }
               

}  