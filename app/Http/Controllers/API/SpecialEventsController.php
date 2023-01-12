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
            public function store(Request  $request)
            {
            

            $events = new SpecialEvents();
            $events['title'] = $request->title;
            $events['description'] = $request->description;

            $eventType = $request->eventType;

            if($eventType === eventType::Value1){
                $events->eventType = "Holidays";
            }
            elseif($eventType === eventType::Value2){
                $events->eventType = "Exchange";
            }
            elseif($eventType === eventType::Value3){
                $events->eventType = "Absent";
            }
            

            
            $events->save();
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

    return response()->json($events, 200);
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