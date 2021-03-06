<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\User;

class UserController extends Controller
{
    public function register(Request $request)
    {   
        return $request->status;
        // return response($request['email']);
        // return $request['email'];

        // $rules = [
        //     'username' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //  ];

        // $customMessages = [
        //      'required' => 'Please fill attribute :attribute'
        // ];
        
        // $this->validate($request, $rules, $customMessages);

        try {
            $hasher = app()->make('hash');
            $username = $request['username'];
            $email =  $request['email'];
            $password = $hasher->make( $request['password']);

            $save = User::create([
                'username'=> $username,
                'email'=> $email,
                'password'=> $password,
                'api_token'=> ''
            ]);
            $res['status'] = true;
            $res['message'] = 'Registration success!';
            return response($res, 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }

    public function get_user()
    {
        $user = User::all();
        if ($user) {
              $res['status'] = true;
              $res['message'] = $user;

              return response($res);
        }else{
          $res['status'] = false;
          $res['message'] = 'Cannot find user!';

          return response($res);
        }
    }
}