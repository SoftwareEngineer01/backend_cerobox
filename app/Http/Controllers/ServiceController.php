<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\ServiceAddRequest;

class ServiceController extends Controller
{

    // Obtiene los servicios y lista el cliente
    public function getServices() {
        $services = Service::with('customer')->get();
        return response()->json($services);
    }

    // Obtiene un servicio por id y lista el cliente
    public function getServiceById($id) {
        $service = Service::with('customer')->find($id);

        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }

        return response()->json($service);
    }

    // Crea un nuevo servicio
    public function addService(ServiceAddRequest $request) {

        $service = Service::create($request->all());

        return response()->json([
            'success' => true,
            'service' => $service,
            'message' => 'Successfully created service!'
        ], 201);

    }

    // Actualiza un servicio
    public function updateService(ServiceAddRequest $request, $id) {

        $service = Service::find($id);

        $service->update($request->all());

        return response()->json([
            'success' => true,
            'service' => $service,
            'message' => 'Successfully updated service!'
        ], 200);

    }

    // Elimina un servicio
    public function deleteService($id) {

        $service = Service::find($id);

        $service->delete();

        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted service!'
        ], 200);

    }

}
