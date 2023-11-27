<?php

namespace App\Http\Controllers;
use illuminate\support\Facades\DB;
use illuminate\Http\Request;

class BuilderController extends Controller{
   
            function AllRow(){
                // $result=DB::table('details')->get();
                //return $result;
                //$result=DB::table('details')->where('name','Rabbil')->get();
                //return $result;
                //$result=DB::table('details')->where('name','Rabbil')->first();
                //first method call korle eta akta object hoye jay
                //return $result->roll;

                $result=DB::table('details')->find(2);
                    return $result->roll;
            }


            function Insert(Request $request){
                $name = $request->input("name");
                $roll = $request->input("roll");
                $city = $request->input("city");
                $phn = $request->input("phn");
                $class = $request->input("class");
  
                $result=DB::table('details')->insert(['name'=>$name, 'roll'=>$roll, 'city'=>$city, 'phn'=>$phn, 'class'=>$class]);

                if($result==true){
                    return "Data save success";  
                }
                else{
                    return "Data save fail";  
                }
            }



            function Update(Request $request){
                $id = $request->input("id");
                $name = $request->input("name");

                $result=DB::table('details')->where('id',$id)->update(['name'=>$name]);

                if($result==true){
                    return "update Success";  
                }
                else{
                    return "update Fail";  
                }
            }


           
            function Delete(Request $request){
                $id = $request->input("id");
                $result=DB::table('details')->where('id',$id)->delete();

                if($result==true){
                    return "Delete success";  
                }
                else{
                    return "Delete Fail";  
                }           
            }
            
}