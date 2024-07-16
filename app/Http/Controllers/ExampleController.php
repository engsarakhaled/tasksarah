<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ExampleController extends Controller
{
     function content(){
   return view('content');
    }
}
{
    function datatask(){
  return view('datatask');
   }
}

//{
   // function datatask(Request $request){

   // $name = $request['name'];
 //   $email = $request['email'];
   // $subject = $request['subject'];
   // $message = $request['message'];

   

   // return 'NAME= '. $name .'Email='.$email.'Subject='.$subject.'Message='.$message
   // ;
    
    
//}
//}
