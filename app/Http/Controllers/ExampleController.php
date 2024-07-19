<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function content()
    {
        return view('content'); // Return content view
    }

   //public function datatask(Request $request) 
    //{
      //  $data = [
        //    'name' => $request->input('name'),
         //   'email' => $request->input('email'),
         //   'subject' => $request->input('subject'),
          //  'message' => $request->input('message'),
        //];

       

       // return view('datatask', compact('data')); 
   // }
//}
public function datatask(Request $request)
{
    return $request['name'].'<br>'.$request['email'] .'<br>'.$request['subject'].'<br>'.$request['message'];  
}
}