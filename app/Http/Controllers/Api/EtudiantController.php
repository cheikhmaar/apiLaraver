<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use Validator;
use App\Models\Etudiant;
use App\Http\Resources\Etudiant as EtudiantResource;

class EtudiantController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return $this->sendResponse(EtudiantResource::collection($etudiants), 'Etudiants fetched.');
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
            'matricule' => 'required',
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required',
            'dateNaiss' => 'required',
            'tel' => 'required'

        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $etudiant = Etudiant::create($input);
        return $this->sendResponse(new EtudiantResource($etudiant), 'Etudiant created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etudiant = Etudiant::find($id);
        if (is_null($etudiant)) {
            return $this->sendError('Etudiant does not exist.');
        }
        return $this->sendResponse(new EtudiantResource($etudiant), 'Etudiant fetched.');
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
            'matricule' => 'required',
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required',
            'dateNaiss' => 'required',
            'tel' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $etudiant=Etudiant::find($id);
        $etudiant->update($input);

        return $this->sendResponse(new EtudiantResource($etudiant), 'Etudiant updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return $this->sendResponse([], 'Etudiant deleted.');
    }
}
