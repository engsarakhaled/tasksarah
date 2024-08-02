<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\File;//to use
use Illuminate\Support\Facades\Log; //to use try and catch


class CarController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       Car::get();
       $cars=Car::get();
       return view('cars',compact('cars'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('add_car');
    }


    /**
     * Store a newly created resource in storage.
     */
    //validate to make rules so if the rules dont follow the validation ;it will not add into database
    
    public function store(Request $request) {
   
        $data=$request->validate([
            'carTitle'=>'required|string',
            'description'=>'required|string|max:1000',
            'price'=>'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        $imageName = time().'.'.$request->image->extension();//Generates a Unix timestamp (a number representing the current time).
        $request->image->move(public_path('assests/images/'), $imageName);//the uploaded image will move into the path (assets/\images) and renamed $imageName
        $data['image'] = 'assests/images/'.$imageName;
        $data['published']=isset($request->published);
        Car::create($data);
        return redirect()->route('cars.index');
        }
    

       
    
    

        
        
        
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
        $car=Car::findorfail($id);
        return view('car_details',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $car=Car::findorfail($id);
        return view('edit_car',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       //dd($request,$id);
       $data=$request->validate([
        'carTitle'=>'required|string',
        'description'=>'required|string|max:1000',
        'price'=>'required|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif',
    ]);
    
    if ($request->hasFile('image')) {
        $oldImagePath = 'assests/images/' . $data['image'];
    
        try {
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        } catch (\Exception $e) {
            Log::error('Error deleting old image: ' . $e->getMessage());
            // Handle the error, e.g., return a response or notify the user
        }
    
        
       }
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('assests/images/'), $imageName);
        $data['image'] = 'assests/images/'.$imageName;
        $data['published']=isset($request->published);
        Car::where('id',$id)->update($data);
        return redirect()->route('cars.index');
       }
       //Checks if a new image was uploaded.
//If a new image was uploaded, it attempts to delete the old image.
//Generates a new filename for the uploaded image.
//Moves the uploaded image to the specified directory.
//Updates the image and published fields in the $data array.
//Updates the car record with the new data.
//Redirects the user to the cars index page.
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

   public function upload(Request $request){
    $file_extension = $request->image->getClientOriginalExtension();
    $file_name = time() . '.' . $file_extension;
    $path = 'assests/images';
    $request->image->move($path, $file_name);
    return '';
  }
  
  }

 