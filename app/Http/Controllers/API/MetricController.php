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
      


            public function show($email)
            {
                $metric = User::where('email', $email)->first();
                if (!$metric) {
                    return $this->sendError('Metrics not found.');
                }
            
                return $this->sendResponse(new MetricsResource($metric), 'Metrics retrieved successfully.');
            }



            public function update(Request $request, $email)
            {
                $metric = User::where('email', $email)->first();
                $metric->age = $request->input('age');
                $metric->gender = $request->input('gender');
                $metric->weight = $request->input('weight');
                $metric->height = $request->input('height');
                $metric->save();

                return response()->json($metric, 200);
            }
               

}  