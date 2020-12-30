<?php

namespace App\Http\Controllers;
  
use App\Models\Product;
use Illuminate\Http\Request;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(6);
  
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
         if ($files = $request->file('image')) {
        // Define upload path
           $destinationPath = public_path('/images/'); // upload path
        // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);

           $insert['image'] = "$profileImage";
        // Save In Database
            $imagemodel= new product();
            $imagemodel->name=$request->name;
            $imagemodel->detail=$request->detail;
            $imagemodel->image="$profileImage";
            $imagemodel->save();
        }
       
        // Product::create(request()
        //     ->all());
   
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
   $request->validate([
'name' => 'required',
'detail' => 'required',
]);
$update = ['name' => $request->name];
if ($files = $request->file('image')) {
$destinationPath = public_path('/images/');
$profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
$files->move($destinationPath, $profileImage);
$update['image'] = "$profileImage";
}
$update['name'] = $request->get('name');
$update['detail'] = $request->get('detail');
Product::where('id',$id)->update($update);
      //product::whereid($product)->update($form_data);
       return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
        
        
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
  
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
    

}