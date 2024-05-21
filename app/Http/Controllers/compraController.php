<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras = Compra::all();

        $data = [
            'compras' => $compras,
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
            'fecha' => 'required|date',
            'id_proveedor' => 'required|exists:proveedores,id',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $compra = Compra::create([
            'fecha' => $request->fecha,
            'id_proveedor' => $request->id_proveedor,
        ]);

        $data = [
            'compra' => $compra,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $compra = Compra::find($id);

        if (!$compra) {
            $data = [
                'message' => 'Compra no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'compra' => $compra,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $compra = Compra::find($id);

        if (!$compra) {
            $data = [
                'message' => 'Compra no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'fecha' => 'required|date',
            'id_proveedor' => 'required|exists:proveedores,id',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $compra->fecha = $request->fecha;
        $compra->id_proveedor = $request->id_proveedor;

        $compra->save();

        $data = [
            'message' => 'Compra actualizada',
            'compra' => $compra,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $compra = Compra::find($id);

        if (!$compra) {
            $data = [
                'message' => 'Compra no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $compra->delete();

        $data = [
            'message' => 'Compra eliminada',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
