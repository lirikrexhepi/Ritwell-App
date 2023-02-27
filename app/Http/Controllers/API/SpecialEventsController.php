<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Events;
use Validator;
use App\Models\SpecialEvents;
use Illuminate\Support\Facades\Log as FacadesLog;
use Log;
use App\Enums\eventType;


class SpecialEventsController extends BaseController
{
        /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */

        public function index()
        {
            $events = SpecialEvents::all();

            return $this->sendResponse(Events::collection($events), 'SpecialEvents retrieved successfully.');
        }
        
            public function store(Request  $request)
            {
                if(Auth::user()->role=="1"){
                    $validatedData = $request->validate([
                        'eventType' => 'required|in:Holidays,Exchange,Absent'
                    ]);

                    $event = SpecialEvents::create([
                        'title'=>$request->title,
                        'description'=>$request->description,
                        'eventType'=>$validatedData['eventType']
                    ]);

                    return response()->json(['message' => 'Special Event saved successfully.','event' => $event ]);
            }
            else{
                    return response()->json(['message' => 'Unauthorized']);
            }
            
            }





        public function update(Request $request, $id)
        {
            if(Auth::user()->role=="1"){
                    $events = SpecialEvents::find($id);
                    $events->title = $request->input('title');
                    $events->description = $request->input('description');
                    $option = $request->input('eventType');

                    if($option === eventType::Value1){
                        $events->eventType = "Holidays";
                    }
                    elseif($option === eventType::Value2){
                        $events->eventType = "Exchange";
                    }
                    elseif($option === eventType::Value3){
                        $events->eventType = "Absent";
                    }


                    $events->save();

                    return response()->json(['message' => 'Updated Event successfully']);
        }
            else{
                return response()->json(['message' => 'Unauthorized']);
            }
        }



public function show($id)
{
        $events = SpecialEvents::findOrFail($id);
        

        /*if ($events->isEmpty()) {
        return $this->sendError('Event not found.');
        }*/

        return $this->sendResponse(new Events($events), 'Event retrieved successfully.');
} 






    public function destroy(Request $request, $id)
    {
        $events = SpecialEvents::find($id);
        $events->delete();
        return response()->json($events);
        return $this->sendResponse([], 'Event deleted successfully.');
    }



}