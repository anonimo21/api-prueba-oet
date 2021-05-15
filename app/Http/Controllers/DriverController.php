<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriverRequest;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Http\Resources\Driver as DriverResource;
use App\Models\Person;
use Exception;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    public function index()
    {
        //dd(Driver::with('person')->get());
        return DriverResource::collection(Driver::with('person')->get());
    }

    public function store(StoreDriverRequest $request)
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

            $driver = new Driver();
            $driver->person_id = $person->id;
            $driver->save();

            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
        }
        return response()->json(new DriverResource($driver), 201);
    }

    public function show($id)
    {
        //
    }

    public function update(StoreDriverRequest $request, $id)
    {
        // if (!$request->ajax()) {
        //     return redirect('/');
        // }
        $driver = Driver::where('person_id', $id)->get();
        $person = Person::find($id);

        if (count($driver) > 0) { //si existe el driver actualizamos la person correspondiente
            if (is_object($person)) {
                $person->update($request->all());
                return response()->json($person, 200);
            } else {
                return response()->json(['msg' => 'no exite el driver'], 404);
            }
        }else{
            return response()->json(['msg' => 'no exite el driver'], 404);
        }
    }

    public function destroy($id)
    {
        // if (!$request->ajax()) {
        //     return redirect('/');
        // }
        $driver = Driver::where('person_id', $id)->get();
        $person = Person::find($id);

        if (count($driver) > 0) { //si existe el driver eliminamos la person correspondiente
            if (is_object($person)) {
                $person->delete();
                $person->driver()->delete();
                return response()->json(null, 204);
            } else {
                return response()->json(['msg' => 'no exite el driver'], 404);
            }
        }else{
            return response()->json(['msg' => 'no exite el driver'], 404);
        }
    }
}
