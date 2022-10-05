<?php

namespace App\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UsersController extends Controller
{

    private $key = "secretkey";
    public function login(Request $request,Response $response){
//        User::create(["username"=>"kingwanyama","password"=>password_hash("passwor",PASSWORD_BCRYPT)]);
        $username = $request->getParsedBody('username');
        $password = $request->getParsedBody('password');
        $user = User::where('username',$username)->first();
        if(empty($user)){
             $response->getBody()->write(json_encode([
                'success' => false,
                'message' => "Username or Password false"
            ]));
            return  $response->withHeader("Content-Type","application/json")->withStatus(200);

        }
        $token = [
            "iss" => "utopian",
            "iat" => time(),
            "exp" => time() + 60*60*24,
            "data" => [
                "user_id" => $user->id
            ]
        ];
        $jwt = JWT::encode($token, $this->key,'HS256');
        $response->getBody()->write(json_encode(['success' => true,
            'message' => "Login Successfull",
            'token' => $jwt]));
        return  $response->withHeader("Content-Type","application/json")->withStatus(200);
    }

    public function users(Request $request,Response $response)
    {
        $response->getBody()->write(json_encode(['success' => true,
            'message' => "Login Successfull",
            'token' => "I hacked"]));
        return  $response->withHeader("Content-Type","application/json")->withStatus(200);
    }
}