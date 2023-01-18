<?php
// app/Http/Controllers/API/ProductController.php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Http\Resources\Product as ProductResource;
use App\Models\Products;
use Illuminate\Support\Facades\Storage;


class ProductController extends BaseController
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $products = Products::all();

        return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
{
    $input = $request->all();

    $validator = Validator::make($input, [
        'name' => 'required',
        'details' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());
    }

    $image = $request->file('image');
    $path = Storage::putFile('public/images', $image);
    $input['image'] = Storage::url($path);
    $product = Products::create($input);

    return $this->sendResponse(new ProductResource($product), 'Product created successfully.');
}

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show($id)
    {
        $product = Products::findOrFail($id);
        //dd($product);
        /*if ($product->isEmpty()) {
            return $this->sendError('Product not found.');
        }*/
        
        return $this->sendResponse(new ProductResource($product), 'Product retrieved successfully.');
    } 

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update(Request $request, Products $product)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'details' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $product->name = $input['name'];
        $product->detail = $input['details'];
        $product->save();

        return $this->sendResponse(new ProductResource($product), 'Product updated successfully.');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy(Request $request, $id)
    {
        $product = Products::find($id);
        $product->delete();
        return response()->json($product);
        return $this->sendResponse([], 'Product deleted successfully.');
    }
}
