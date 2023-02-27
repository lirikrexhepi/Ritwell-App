<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class Events extends JsonResource
{
   /**
            * Transform the resource into an array.
            *
            * @param  \Illuminate\Http\Request  $request
            * @return array
            */
            public function toArray($request)
            {
                return [
                    'id' => $this->id,
                    'title' => $this->title,
                    'description' => $this->description,
                    'eventType' => $this->eventType,
                    'created_at' => $this->created_at->format('d/m/Y'),
                    'updated_at' => $this->updated_at->format('d/m/Y'),
                ]; 
            }
    
}