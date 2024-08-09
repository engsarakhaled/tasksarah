<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\Common;
class ProductController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Product::get();
           $products=Product::get();
           return view('products',compact('products'));
    
    }

    public function about()
    {
        Product::get();
           $products=Product::get();
           return view('about');
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data=$request->validate([
                'title'=>'required|string',
                'short_description'=>'required|string|max:200',
                'price'=>'required|numeric',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
                
            ]);
          
            $data['image'] =$this->uploadFile($request->image,'assests/images');
            
            Product::create($data);
            return redirect()->route('products.store');
            }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product=Product::findorfail($id);
        return view('edit_product',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request,$id);
        $data=$request->validate([
         'title'=>'required|string',
         'short_description'=>'required|string|max:200',
         'price'=>'required|numeric',
         'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif',//sometimes not required so if the user dont want to update the image ok
     ]);
     if($request->hasfile('image')){ //if there a request with a new image ,the orders will execute.
         $data['image'] =$this->uploadFile($request->image,'assests/images');
     }
    
       
          Product::where('id',$id)->update($data); //as previous lecture
         return redirect()->route('products.index');
        }
 
       


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function home(){

        Product::get();
           $products=Product::get(); 
          $products = Product::orderBy('created_at', 'desc')->take(3)->get();
          return view('home', compact('products'));
      }
      
}
