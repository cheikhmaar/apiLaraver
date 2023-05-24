<?php

namespace App\Http\Controllers\Api;

use App\Models\Filiere;
use App\Http\Resources\Filiere as FiliereResource;
use Validator;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;
class FiliereController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filieres = Filiere::all();
        return $this->sendResponse(FiliereResource::collection($filieres), 'Posts fetched.');
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
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $filiere = Filiere::create($input);
        return $this->sendResponse(new FiliereResource($filiere), 'Filiere created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filiere = Filiere::find($id);
        if (is_null($filiere)) {
            return $this->sendError('Filiere does not exist.');
        }
        return $this->sendResponse(new FiliereResource($filiere), 'Filiere fetched.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @param $filiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filiere $filiere)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'libelle' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $filiere->libelle = $input['libelle'];
        $filiere->save();
        return $this->sendResponse(new FiliereResource($filiere), 'Filiere updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param $filiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filiere $filiere)
    {
        $filiere->delete();
        return $this->sendResponse([], 'Filiere deleted.');
    }
}
