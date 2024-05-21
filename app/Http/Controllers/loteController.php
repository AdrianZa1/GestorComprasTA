<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lotes = Lote::all();

        $data = [
            'lotes' => $lotes,
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
            'id_producto' => 'required|exists:productos,id',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $lote = Lote::create([
            'fecha' => $request->fecha,
            'id_producto' => $request->id_producto,
        ]);

        $data = [
            'lote' => $lote,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lote = Lote::find($id);

        if (!$lote) {
            $data = [
                'message' => 'Lote no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'lote' => $lote,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lote = Lote::find($id);

        if (!$lote) {
            $data = [
                'message' => 'Lote no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'fecha' => 'required|date',
            'id_producto' => 'required|exists:productos,id',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $lote->fecha = $request->fecha;
        $lote->id_producto = $request->id_producto;

        $lote->save();

        $data = [
            'message' => 'Lote actualizado',
            'lote' => $lote,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lote = Lote::find($id);

        if (!$lote) {
            $data = [
                'message' => 'Lote no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $lote->delete();

        $data = [
            'message' => 'Lote eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
