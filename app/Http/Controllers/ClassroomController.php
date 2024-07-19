<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $className ='Hr';
        $capacity='50';
        $is_fulled=true;
        $price='100';
        $time_from='1:30:00';
        $time_to='2:35:00';
         Classroom::create([
        'className' =>$className ,
        'capacity' =>$capacity,
        'is_fulled'=>$is_fulled,
        'price'=> $price,
        'time_from'=>$time_from,
        'time_to' =>$time_to,

         ]);
         return "Data added succesfully";

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
