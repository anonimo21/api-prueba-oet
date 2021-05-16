<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRequest;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Http\Resources\Vehicle as VehicleResource;
use Illuminate\Http\JsonResponse;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        // if (!$request->ajax()) {
        //     return redirect('/');
        // }
        return VehicleResource::collection(Vehicle::all());
    }

    public function store(StoreVehicleRequest $request)
    {
        // if (!$request->ajax()) {
        //     return redirect('/');
        // }
        $vehicle = new Vehicle($request->all());
        $vehicle->save();
        return response()->json(new VehicleResource($vehicle), 201);
    }

    public function show(Vehicle $vehicle)
    {
        // if (!$request->ajax()) {
        //     return redirect('/');
        // }
        return response()->json(new VehicleResource($vehicle), 200);
    }

    public function update(StoreVehicleRequest $request, Vehicle $vehicle)
    {
        // if (!$request->ajax()) {
        //     return redirect('/');
        // }
        $vehicle->update($request->all());
        return response()->json($vehicle, 200);
    }

    public function destroy(Vehicle $vehicle)
    {
        // if (!$request->ajax()) {
        //     return redirect('/');
        // }
        $vehicle->delete();
        return response()->json(null, 204);
    }
}
