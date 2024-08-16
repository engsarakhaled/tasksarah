<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Support\Facades\File;//to use
use Illuminate\Support\Facades\Log; //to use try and catch
use App\Traits\Common;

class CarController extends Controller

{
    use Common;
    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       Car::get();
       $cars=Car::with('category')->get();
       return view('cars',compact('cars'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::select('id','category_name')->get(); 
       return view('add_car',compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    //validate to make rules so if the rules dont follow the validation ;it will not add into database
    
    public function store(Request $request) {
  //dd($request);
        $data=$request->validate([
            'carTitle'=>'required|string',
            'description'=>'required|string|max:1000',
            'price'=>'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'category_id' => 'required|integer',
        ]);
       
        $data['image'] =$this->uploadFile($request->image,'assests/images/cars');
        $data['published']=isset($request->published);
        Car::create($data);
        return redirect()->route('cars.index');
        }

      
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
        $car = Car::with('category')->findOrFail($id);
        return view('car_details',compact('car'));
    }
 //Find a car with the given ID, also include its category details, and if you can't find the car, throw an error."




        //$car = Car::with('category')->findOrFail($id);
       //Purpose: Retrieves a specific car record based on its ID and eagerly loads its associated category.
       //Breakdown:
       //Car::: Targets the Car model.
       // with('category'): Eager loads the related category for the retrieved car. This means it fetches the category data in a single query, improving performance.
       // findOrFail($id): Finds a car with the specified ID. If not found, throws a ModelNotFoundException.

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //$car=Car::findorfail($id);
        $car = Car::with('category')->findOrFail($id);
        $categories = Category::all();
        return view('edit_car',compact('car','categories'));
       //$categories = Category::all();
       //sending categories or cars means you will you this variable $car->carTitle as exmaple 
    }
    //for more information
    //so here i will use categories in foreach 
    //$categories = Category::all();
    //Purpose: Retrieves all category records from the database.
    //Breakdown:
    //Category::: Targets the Category model.
    //all(): Retrieves all records from the categories table.
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {
            //dd($request,$id);
            $data=$request->validate([
                'carTitle'=>'required|string',
                'description'=>'required|string|max:1000',
                'price'=>'required|numeric',
                'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif',
                'category_id' =>'sometimes|required|integer',
                    ]);
                      
            if($request->hasfile('image')){ //if there a request with a new image ,the orders will execute.
            $data['image'] =$this->uploadFile($request->image,'assests/images/cars');
                  } 
            $data['published']=isset($request->published);
                Car::where('id',$id)->update($data);
                return redirect()->route('cars.index');
            
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id',$id)->delete();
        return redirect()->route('cars.index');
    

    } 
    
     public function showDeleted(){

    $cars=Car::onlyTrashed()->get();
    return view('trashedcars',compact('cars'));


     }
     public function restore(string $id)
    {
        Car::where('id',$id)->restore();
        return redirect()->route('cars.showDeleted');
   
    }

    public function forceDelete (string $id)
    {
    Car::where('id',$id)->forceDelete();
    return redirect()->route('cars.showDeleted');
 
  }
  }

 