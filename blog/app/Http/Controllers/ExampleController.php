<?php

namespace App\Http\Controllers;
use illuminate\support\Facades\DB;

class ExampleController extends Controller{
    
    public function testConn(){
        // $dbname=DB::Connection()->getDatabaseName();
        $dbname=DB::Connection()->select("SELECT *FROM details");
        return $dbname;
    }

 
    
}