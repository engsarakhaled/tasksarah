<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

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
    public function store(Request $request)
    {
        $data=$request->validate([
            'carTitle'=>'required|string',
            'description'=>'required|string|max:1000',
            'price'=>'required|numeric',
        ]);
        //dd($request);
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
    ]);
    //dd($request);
        $data['published']=isset($request->published);
        Car::where('id',$id)->update($data);
        return redirect()->route('cars.index');
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