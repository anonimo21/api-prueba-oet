<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOwnerRequest;
use Illuminate\Http\Request;
use App\Models\Owner;
use App\Http\Resources\Owner as OwnerResource;
use App\Models\Person;
use Exception;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    public function index()
    {
        return OwnerResource::collection(Owner::with('person')->get());
    }

    public function store(StoreOwnerRequest $request)
    {
        // if (!$request->ajax()) {
        //     return redirect('/');
        // }
        try {
            DB::beginTransaction();

            $person = new Person();
            $person->cedula = $request->cedula;
            $person->primer_nombre = $request->primer_nombre;
            $person->segundo_nombre = $request->segundo_nombre;
            $person->apellidos = $request->apellidos;
            $person->direccion = $request->direccion;
            $person->telefono = $request->telefono;
            $person->ciudad = $request->ciudad;
            $person->save();

            $owner = new Owner();
            $owner->person_id = $person->id;
            $owner->save();

            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
        }
        return response()->json(new OwnerResource($owner), 201);
    }

    public function show($id)
    {
        // if (!$request->ajax()) {
        //     return redirect('/');
        // }
        $owner = Owner::where('person_id', $id)->get();
        $person = Person::find($id);

        if (count($owner) > 0) { //si existe el driver buscamos la person correspondiente
            if (is_object($person)) {
                return response()->json(new OwnerResource(Owner::where('person_id', $id)->with('person')->first()), 201);
            } else {
                return response()->json(['msg' => 'no exite el owner'], 404);
            }
        } else {
            return response()->json(['msg' => 'no exite el owner'], 404);
        }
    }

    public function update(StoreOwnerRequest $request, $id)
    {
        // if (!$request->ajax()) {
        //     return redirect('/');
        // }
        $owner = Owner::where('person_id', $id)->get();
        $person = Person::find($id);

        if (count($owner) > 0) { //si existe el owner actualizamos la person correspondiente
            if (is_object($person)) {
                $person->update($request->all());
                return response()->json($person, 200);
            } else {
                return response()->json(['msg' => 'no exite el owner'], 404);
            }
        } else {
            return response()->json(['msg' => 'no exite el owner'], 404);
        }
    }

    public function destroy($id)
    {
        // if (!$request->ajax()) {
        //     return redirect('/');
        // }
        $owner = Owner::where('person_id', $id)->get();
        $person = Person::find($id);

        if (count($owner) > 0) { //si existe el driver eliminamos la person correspondiente
            if (is_object($person)) {
                $person->delete();
                $person->owner()->delete();
                return response()->json(null, 204);
            } else {
                return response()->json(['msg' => 'no exite el owner'], 404);
            }
        } else {
            return response()->json(['msg' => 'no exite el owner'], 404);
        }
    }
}
