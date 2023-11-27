<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

use App\PhoneBookModel;

class PhoneBookController extends Controller{
    
            function onInsert(Request $request){

                        $token=$request->input('access_token');
                        $key=env('TOKEN_KEY');

                        $decoded = JWT::decode($token, new Key($key, 'HS256'));
                        $decoded_array=(array)$decoded ;
                        //json string to json array

                        $user=$decoded_array['user'];
                        //select user from full jason array

                        $one= $request->input('one');
                        $two= $request->input('two');
                        $name= $request->input('name');
                        $email= $request->input('email');

                        $result=PhoneBookModel::insert([
                                'username'=>$user,
                                'phone_number_one'=>$one,
                                'phone_number_two'=>$two,
                                'name'=>$name,
                                'email'=>$email
                            ]);
                        if($result==true){
                            return "Save Success";
                        } 
                        else{
                            return "Fail ! Try Again";
                        }
            }



            function onSelect(Request $request){
                $token=$request->input('access_token');
                $key=env('TOKEN_KEY');
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                $decoded_array=(array)$decoded ;
                $user=$decoded_array['user'];
                $result=PhoneBookModel::where('username', $user)->get();
                return  $result;
                
            }
            

            function onDelete(Request $request){
                $email=$request->input('email');
                $token=$request->input('access_token');
                $key=env('TOKEN_KEY');
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                $decoded_array=(array)$decoded ;
                $user=$decoded_array['user'];
            
                $result=PhoneBookModel::where(['username'=>$user, 'email'=> $email])->delete();
               // $result=PhoneBookModel::where('username', $user)->delete();
               //if we delete,userwise all data will be deleted 
            
            
                if($result==true){
                    return "Delete Success";
                }
                else{
            
                    return "Delete Fail! Try Again";
                }
            }


 
            
}