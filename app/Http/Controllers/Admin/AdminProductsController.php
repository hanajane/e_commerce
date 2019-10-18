<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product; //use the Product model
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class AdminProductsController extends Controller
{
    //display all products
    public function index()
    {
        $products = Product::paginate(3);
        return view("admin.displayProducts", ['products'=>$products]);
    }

    //store new product to database
    public  function sendCreateProductForm(Request $request) //somehow use $request to pass the post request
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $type = $request->input('type');
        $price = $request->input('price');
        $size = $request->input('size');

        Validator::make($request->all(), ['image' => "required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate(); //required, to not to proceed without adding an image | type of file is file | mimes, are the extensions allowed
        $ext = $request->file('image')->getClientOriginalExtension(); //usually jpg
        $stringImageReFormat = str_replace(" ","", $request->input('name')); // the name of the image will be the name thats assigned to the name of the product

        $imageName = $stringImageReFormat. ".".$ext; // same image name as the name product
        $imageEncoded = File::get($request->image);  //use the File class to the image encoded version
        Storage::disk('local')->put('public/product_images/'.$imageName, $imageEncoded);  //another way of uploading an image

        $newProductArray = array("name"=>$name, "description" => $description, "image"=> $imageName, "type" => $type, "price" => $price, "size"=> $size); //array were updating

        $created = DB::table('products')->insert($newProductArray); // inserts the new product

        if($created)    //to check if works or doesnt
        {
            return redirect()->route("adminDisplayProducts");
        }
        else{
            return "product wast created"; //TO IMPROVE : create a new page for error
        }
    }

    //display edit product form
    public function editProductForm($id)
    {
        $product = Product::find($id);
        return view('admin.editProductForm', ['product'=>$product]);
    }

    //display edit  product image form
    public function editProductImageForm($id)
    {
        $product = Product::find($id);
        return view('admin.editProductImageForm', ['product'=>$product]);
    }

    //display edit  product image form
    public function updateProductImage(Request $request, $id)
    {
        Validator::make($request->all(), ['image' => "required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate(); //required, to not to proceed without adding an image | type of file is file | mimes, are the extensions allowed
        if ($request->hasFile('image')) //extra layer of protection
            {
                $product = Product::find($id);
                $doesExist = Storage::disk('local')->exists("public/product_images/".$product->image); //returning true if the image exists

                if($doesExist)
                {
                    Storage::delete('public/product_images/'.$product->image);
                }
                //      upload new image // to remember
                $ext = $request->file('image')->getClientOriginalExtension(); //jpg
                $request->image->storeAs("public/product_images/", $product->image); //uploads the file inside the priameter

                $arrayToUpdate = array('image'=>$product->image);
                DB::table('products')->where('id', $id)->update($arrayToUpdate); //passing the name of the table which is 'products' where the column is 'id'

                return redirect()->route("adminDisplayProducts");
            }
        else
            {
                $error = "No image is selected";
                return $error;
            }
    }

    //ADMIN - update product
    public function updateProduct(Request $request, $id)
    {
    //  $price = (int) str_replace("$", "", $product->price);  //implement a result that removes the dollar sign when editing the price

        $name = $request->input('name');
        $description = $request->input('description');
        $type = $request->input('type');
        $price = $request->input('price');

        $updateArray = array('name'=>$name, "description" => $description, "type" => $type, "price" => $price); //array were updating

        DB::table('products')->where('id', $id)->update($updateArray); //passing the name of the table which is 'products' where the column is 'id'

        return redirect()->route("adminDisplayProducts");
    }

    //ADMIN - create product form
    public function createProductForm()
    {
        return view('admin.createProductForm');
    }

    //ADMIN delete product
    public function deleteProductForm($id)
    {
        $product = Product::find($id);
        $doesExist = Storage::disk("local")->exists("public/product_images/".$product->image); //returning true if the image exists

        if($doesExist)
        {
            Storage::delete('public/product_images/' .$product->image);
        }
        Product::destroy($id);
        return redirect()->route("adminDisplayProducts");
    }

}


