<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthServiceProvider extends ServiceProvider{
  
    public function register(){
        
    }

    public function boot(){
      
        $this->app['auth']->viaRequest('api', function ($request) {
            $token=$request->input('access_token');
            $key=env('TOKEN_KEY');
            try{
                $decodedData = JWT::decode($token, new Key($key, 'HS256'));
                return new User();
                
            } catch(\Exception $e){
                return null;
            }
            
        });
    }


}