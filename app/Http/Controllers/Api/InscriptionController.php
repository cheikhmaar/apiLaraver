<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Http\Resources\Inscription as InscriptionResource;
use Validator;
use App\Http\Controllers\Api\BaseController as BaseController;

class InscriptionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscriptions = Inscription::all();
        return $this->sendResponse(InscriptionResource::collection($inscriptions), 'Inscriptions fetched.');
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
            'date' => 'required',
            'anneAcademique' => 'required',
            'etudiant_id' => 'required',
            'classe_id' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $inscription = Inscription::create($input);
        return $this->sendResponse(new InscriptionResource($inscription ), 'Inscription created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inscription = Inscription::find($id);
        if (is_null($inscription )) {
            return $this->sendError('inscription does not exist.');
        }
        return $this->sendResponse(new InscriptionResource($inscription), 'Inscription fetched.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @param $inscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscription $inscription)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'date' => 'required',
            'anne_academique' => 'required',
            'etudiant_id' => 'required',
            'classe_id' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $inscription ->date = $input['date'];
        $inscription ->anneAcademique = $input['anneAcademique'];
        $inscription ->etudiant_id = $input['etudiant_id'];
        $inscription->classe_id = $input['classe_id'];
        $inscription->save();

        return $this->sendResponse(new InscriptionResource($inscription ), 'Inscription updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param $inscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscription $inscription)
    {
        $inscription->delete();
        return $this->sendResponse([], 'Inscription deleted.');
    }
}
