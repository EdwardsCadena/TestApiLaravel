<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponse; //me permite hacer uso del archivo apiresponse y todas sus funciones
use App\User;

class UserController extends Controller
{
    use ApiResponse;

    /**
     * Return users list
     * @param Illuminate\Htpp\Response
     */
    public function index(){
        $users = User::all();
        return $this->successResponse($users);
    }

    /**
     * Create an instance of User.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule=[
            'name'=>'required|max:55',
            'lastname'=>'required|max:55',
            'phone'=>'required|max:20',
            'email'=>'required|max:75',
            'address'=>'required|max:99',
        ];
        $this->validate($request,$rule);
        $user = User::create($request->all());
        return $this->successResponse($user, Response::HTTP_CREATED);
    }

    /**
     * Return an specific User.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $users = User::findOrFail($user);
        return $this->successResponse($users);
    }

    /**
     * Update the information of an existing user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $rule=[
            'name'=>'max:55',
            'lastname'=>'max:55',
            'phone'=>'max:20',
            'email'=>'max:70',
            'address'=>'max:9',
        ];
        $this->validate($request,$rule);
        $user = User::findOrFail($user);
        $user->fill($request->all());
        if($user->isClean()){
            return $this->errorResponse('Al menos un valor debe cambiar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $user->save();
        return $this->successResponse($user);
    }

    /**
     * Remove on existing user.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $users = User::findOrFail($user);
        $users->delete();
        return $this->successResponse($users);
    }
   
}
