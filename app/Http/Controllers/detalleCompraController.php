<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetalleCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detalleCompras = DetalleCompra::all();

        $data = [
            'detalle_compras' => $detalleCompras,
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
            'id_compra' => 'required|exists:compras,id',
            'id_producto' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_compra' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $detalleCompra = DetalleCompra::create([
            'id_compra' => $request->id_compra,
            'id_producto' => $request->id_producto,
            'cantidad' => $request->cantidad,
            'precio_compra' => $request->precio_compra,
        ]);

        $data = [
            'detalle_compra' => $detalleCompra,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detalleCompra = DetalleCompra::find($id);

        if (!$detalleCompra) {
            $data = [
                'message' => 'Detalle de compra no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'detalle_compra' => $detalleCompra,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $detalleCompra = DetalleCompra::find($id);

        if (!$detalleCompra) {
            $data = [
                'message' => 'Detalle de compra no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'id_compra' => 'required|exists:compras,id',
            'id_producto' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_compra' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $detalleCompra->id_compra = $request->id_compra;
        $detalleCompra->id_producto = $request->id_producto;
        $detalleCompra->cantidad = $request->cantidad;
        $detalleCompra->precio_compra = $request->precio_compra;

        $detalleCompra->save();

        $data = [
            'message' => 'Detalle de compra actualizado',
            'detalle_compra' => $detalleCompra,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detalleCompra = DetalleCompra::find($id);

        if (!$detalleCompra) {
            $data = [
                'message' => 'Detalle de compra no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $detalleCompra->delete();

        $data = [
            'message' => 'Detalle de compra eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
