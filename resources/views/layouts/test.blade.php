//delete product


public function deleteProduct($id)
{
    $product = Product::find($id);
    $exists =  Storage::disk("local")->exists("public/product_images/".$product->image);

//if old image exists
if($exists)
{
    //delete it
    Storage::delete('public/product_images/'.$product->image);
}


Product::destroy($id);

return redirect()->route("adminDisplayProducts");

}
