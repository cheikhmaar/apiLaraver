<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Http\Resources\Classe as ClasseResource;
use Validator;
use App\Http\Controllers\Api\BaseController as BaseController;

class ClasseController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::all();

        return $this->sendResponse(ClasseResource::collection($classes), 'Posts fetched.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'libelle' => 'required',
            'droitInscription' => 'required',
            'mensualite' => 'required',
            'autreFrais' => 'required',
            'filiere_id' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $classe = Classe::create($input);
        return $this->sendResponse(new ClasseResource($classe), 'Classe created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classe = Classe::find($id);
        if (is_null($classe)) {
            return $this->sendError('Classe does not exist.');
        }
        return $this->sendResponse(new ClasseResource($classe), 'Classe fetched.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'libelle' => 'required',
            'droitInscription' => 'required',
            'mensualite' => 'required',
            'autreFrais' => 'required',
            'filiere_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $classe=Classe::find($id);
        $classe->update($input);

        return $this->sendResponse(new ClasseResource($classe), 'Classe updated.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classe=Classe::find($id);
        $classe->delete();
        return $this->sendResponse([], 'Classe deleted.');
    }
}
