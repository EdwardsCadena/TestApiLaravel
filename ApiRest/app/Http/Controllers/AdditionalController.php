<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponse; //me permite hacer uso del archivo apiresponse y todas sus funciones
use App\Additional;

class AdditionalController extends Controller
{
    use ApiResponse;

    /**
     * Return additionals list
     * @param Illuminate\Htpp\Response
     */
    public function index(){
        $additional = Additional::all();
        return $this->successResponse($additional);
    }

    /**
     * Create an instance of Additional.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule=[
            'art'=>'required|max:55',
            'cinema'=>'required|max:55',
            'music'=>'required|max:55',
            'iduser'=>'required|max:12'
        ];
        $this->validate($request,$rule);
        $additional = Additional::create($request->all());
        return $this->successResponse($additional, Response::HTTP_CREATED);
    }

    /**
     * Return an specific Additional.
     *
     * @param  int  $additional
     * @return \Illuminate\Http\Response
     */
    public function show($additional)
    {
        $additional = Additional::findOrFail($additional);
        return $this->successResponse($additional);
    }

    /**
     * Update the information of an existing Additional.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $additional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $additional)
    {
        $rule=[
            'art'=>'max:55',
            'cinema'=>'max:55',
            'music'=>'max:55',
            'iduser'=>'max:12',
        ];
        $this->validate($request,$rule);
        $additional = Additional::findOrFail($additional);
        $additional->fill($request->all());
        if($additional->isClean()){
            return $this->errorResponse('Al menos un valor debe cambiar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $additional->save();
        return $this->successResponse($additional);
    }

    /**
     * Remove on existing Additional.
     *
     * @param  int  $additional
     * @return \Illuminate\Http\Response
     */
    public function destroy($additional)
    {
        $additionals = Additional::findOrFail($additional);
        $additionals->delete();
        return $this->successResponse($additionals);
    }
}
