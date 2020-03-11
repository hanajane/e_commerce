<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Product; //use the Product model
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

use App\Images;

class AdminProductsController extends Controller
{
    //display all products
    public function index()
    {
        // $products = Product::paginate(10);
        // return view("admin.displayProducts", ['products'=>$products]);

        $products = Product::with('image')->get(); //get the images that relative to products //go see Classes and Product
                
        return view('admin.displayProducts')->with('products', $products);

    }

    //store new product to database
    public  function sendCreateProductForm(Request $request) //somehow use $request to pass the post request
    {
        // $product_type = DB::table('product_type')->get();
        // $image = DB::table('product_image')->get(); table has replaced by "Images"

        $name = $request->input('name');
        $description = $request->input('description');
        // $productType = $request->input('type');
        $price = $request->input('price');
        $swimwearSize_id = $request->input('productSize_id');
        $swimwearType_id = $request->input('swimwearType_id');
        $productType_id = $request->input('productType_id');
        $hashtags = $request->input('hashtags');

        Validator::make($request->all(), ['image' => "required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate(); //required, to not to proceed without adding an image | type of file is file | mimes, are the extensions allowed
        $ext = $request->file('image')->getClientOriginalExtension(); //usually jpg
        $stringImageReFormat = str_replace(" ","", $request->input('name')); // the name of the image will be the name thats assigned to the name of the product

        $imageName = $stringImageReFormat. ".".$ext; // same image name as the name product
        $imageEncoded = File::get($request->image);  //use the File class to the image encoded version
        Storage::disk('local')->put('public/Images/'.$imageName, $imageEncoded);  //another way of uploading an image
        $newImage= array("imageName" => $imageName, "image" => $imageName); //array were updating

        if ($newImage)
        {
            DB::table("Images")->insert($newImage);
            $image_id = DB::getPdo()->lastInsertId(); //getting the ID of the last image inserted
        }
        $newProductArray = array("name"=>$name, "description" => $description, "price" => $price, "productSize_id" => $swimwearSize_id, "swimwearType_id" => $swimwearType_id, "productType_id" => $productType_id, "hashtags" => $hashtags, "productImage_id" => $image_id); //array were updating

        $created = DB::table('products')->insert($newProductArray); // inserts the new product


        if($created)    //to check if works or doesnt
        {
            return redirect()->route("adminDisplayProducts");
        }
        else{
            return "product was not created"; //TO IMPROVE : create a new page for error
        }
    }

    //display edit product form
    public function editProductForm(Request $request, $id)
    {
         $product_type = DB::table('product_type')->get();
         $swimwearType = DB::table('swimwearType')->get();
         $swimwearSize = DB::table('productSize')->get();

        $productType_info = $product_type;
        $swimwearType_info = $swimwearType;
        $swimwearSize_info = $swimwearSize;
        $request->session()->put('productType_info', $productType_info, 'swimwearType_info', $swimwearType_info, 'swimwearSize_info', $swimwearSize_info);  // this is to send the variable to the view // function used: AdminProductForm

        $product = Product::find($id);
        return view('admin.editProductForm', ['product'=>$product, 'productType_info'=> $productType_info, 'swimwearType_info' => $swimwearType_info, 'swimwearSize_info' => $swimwearSize_info]);
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
        // update image doesnt work!!!
        Validator::make($request->all(), ['image' => "required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate(); //required, to not to proceed without adding an image | type of file is file | mimes, are the extensions allowed
        if ($request->hasFile('image')) //extra layer of protection
            {
                $product = Product::find($id);
                $doesExist = Storage::disk('local')->exists("public/Images/".$product->image); //returning true if the image exists

                if($doesExist)
                {
                    Storage::delete('public/Images/'.$product->image);
                }
                //      upload new image // to remember
                $ext = $request->file('image')->getClientOriginalExtension(); //jpg
                $request->image->storeAs("public/Images/", $product->image); //uploads the file inside the priameter

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

    //type of swimwear filter // ??
    // public function swimwearTypeProducts()
    // {
    //     $products = DB::table('products')->where('swimwearType_id', "swimwearType_id")->get();
    //     return view("adminEditProductForm", compact("products"));
    // }

    //ADMIN - update product
    public function updateProduct(Request $request, $id)
    {
    //  $price = (int) str_replace("$", "", $product->price);  //implement a result that removes the dollar sign when editing the price

        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $swimwearSize_id = $request->input('productSize_id');
        $swimwearType_id = $request->input('swimwearType_id');
        $productType_id = $request->input('productType_id');
        $hashtags = $request->input('hashtags');

        // $name = $request->input('name');
        // $description = $request->input('description');
        // $type = $request->input('type');
        // $price = $request->input('price');
        // $size = $request->input('size');
        // $swimwearType_id = $request->input('swimwearType_id');
        // $hashtags = $request->input('hashtags');

        $updateArray = array('name'=>$name, "description" => $description, "productType_id" => $productType_id, "price" => $price,
                                "productSize_id" => $swimwearSize_id, "swimwearType_id" => $swimwearType_id, "hashtags" => $hashtags); //array were updating

        DB::table('products')->where('id', $id)->update($updateArray); //passing the name of the table which is 'products' where the column is 'id'

        return redirect()->route("adminDisplayProducts");
    }

    //ADMIN - create product form
    public function createProductForm(Request $request)
    {
         $product_type = DB::table('product_type')->get();
         $swimwearType = DB::table('swimwearType')->get();
         $swimwearSize = DB::table('productSize')->get();

        $productType_info = $product_type;
        $swimwearType_info = $swimwearType;
        $swimwearSize_info = $swimwearSize;
        $request->session()->put('productType_info', $productType_info, 'swimwearType_info', $swimwearType_info, 'swimwearSize_info', $swimwearSize_info);  // this is to send the variable to the view // function used: AdminProductForm

        return view('admin.createProductForm', ['productType_info'=> $productType_info, 'swimwearType_info' => $swimwearType_info, 'swimwearSize_info' => $swimwearSize_info]);
    }

    //ADMIN delete product
    public function deleteProductForm($id)
    {
        $product = Product::find($id);
        $doesExist = Storage::disk("local")->exists("public/Images/".$product->image); //returning true if the image exists

        if($doesExist)
        {
            Storage::delete('public/Images/' .$product->image);
        }
        Product::destroy($id);
        return redirect()->route("adminDisplayProducts");
    }

}


