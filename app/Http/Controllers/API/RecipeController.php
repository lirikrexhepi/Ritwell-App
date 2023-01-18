<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Recipe as RecipeResource;
use Validator;
use App\Models\Recipe;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log as FacadesLog;
use Log;


class RecipeController extends BaseController
{
        /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
            public function store(Request  $request)
            {
            

            $recipe = new Recipe();
            $recipe['title'] = $request->title;
            $recipe['recipe'] = $request->recipe;
            $recipe['time'] = $request->time;

             // Add image handling code here
             $image = $request->file('image');
             $path = Storage::putFile('public/images', $image);
             $url = Storage::url($path);
             $recipe['image'] = $url; // add the path to the database

            $recipe->save();

            return Response::json(['message' => 'Image uploaded and recipe info saved successfully.']);
            }


            public function show($id)
            {
            $recipe = Recipe::findOrFail($id);
            
            if ($recipe->isEmpty()) {
            return $this->sendError('Recipe not found.');
            }

            return $this->sendResponse(new RecipeResource($recipe), 'Recipe retrieved successfully.');
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
                $recipe = Recipe::find($id);
                $recipe->title = $request->input('title');
                $recipe->recipe = $request->input('recipe');
                $recipe->time = $request->input('time');
                $recipe->save();

                return response()->json($recipe, 200);
            }




    public function destroy(Request $request, $id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return response()->json($recipe);
        return $this->sendResponse([], 'Recipe deleted successfully.');
    }



}  