<?php
 
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Nutrition extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'calories' => $this->calories,
            'proteins' => $this->proteins,
            'carbohydrates' => $this->carbohydrates,
            'timeOfDay' => $this->timeOfDay,
            'image' => $this->image,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
