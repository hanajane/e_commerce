//delete product


public function deleteProduct($id)
{
    $product = Product::find($id);
    $exists =  Storage::disk("local")->exists("public/Image/".$product->image);

//if old image exists
if($exists)
{
    //delete it
    Storage::delete('public/Image/'.$product->image);
}


Product::destroy($id);

return redirect()->route("adminDisplayProducts");

}
