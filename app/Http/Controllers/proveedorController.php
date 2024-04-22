<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();

        $data = [
            'proveedores' => $proveedores,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            'direccion' => 'required|max:255',
            'telefono' => 'required|max:15',
            'contacto' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $proveedor = Proveedor::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'contacto' => $request->contacto,
        ]);

        $data = [
            'proveedor' => $proveedor,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            $data = [
                'message' => 'Proveedor no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'proveedor' => $proveedor,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            $data = [
                'message' => 'Proveedor no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255',
            'direccion' => 'required|max:255',
            'telefono' => 'required|max:15',
            'contacto' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $proveedor->nombre = $request->nombre;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->contacto = $request->contacto;

        $proveedor->save();

        $data = [
            'message' => 'Proveedor actualizado',
            'proveedor' => $proveedor,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            $data = [
                'message' => 'Proveedor no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $proveedor->delete();

        $data = [
            'message' => 'Proveedor eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
