<?php

namespace App\Firebase;

use Firebase\Auth\Token\Verifier;

class Guard{
    protected $verifier;

    public function __constructor(Verifier $verifier){
        $this->verifier = $verifier;
    }

    public function user($request){
        $token = $request->bearerToken();

        try{
            $token = $this->verifier->verifyToken($token);
            return new User($token->getClaims());
        }catch (\Exception $e){
            return;
        }
    }
}