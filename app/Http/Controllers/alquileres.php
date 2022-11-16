<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class alquileres extends Controller
{
    //
    public function actualizaralquileres(Request $request, $id_alquiler)
    {
        try {
            $id_alquiler = $request->input('id_alquiler');
            $DNI = $request->input('DNI');
            $matricula = $request->input('Matricula');
            $FechaSalida = Carbon::now()->toDateTimeString();
            $FechaDevuelto = Carbon::now()->toDateTimeString();
            $precio_dia = $request->input('precio_dia');
            $multa = $request->input('Multa');
            $alquileres = DB::table('alquileres')
                ->where('id_alquiler', $id_alquiler)
                ->update(['DNI' => $DNI, 'Matricula' => $matricula, 'fecha_salida' => $FechaSalida, 'fecha_devuelto' => $FechaDevuelto, 'precio_dia' => $precio_dia, 'Multa' => $multa]);
        } catch (\Exception $e) {
            $datos = [
                'mensaje' => $e->getMessage(),
                'codigo' => $e->getCode(),
                'fila' => $e->getLine(),
                'dato' => 'Error al actualizar el alquiler'
            ];
        }
        return response()->json([$datos => 'Actualizado alquiler ' . $alquileres], 200);
    }


    public function insertaralquiler(Request $req)
    {
        //calculo el campo de MULTA para que al subir el registro del alquiler automáticamente se calcule el importe
        $multa = 0;
        $date1 = Carbon::now()->toDateTimeString();
        $date2 = $req->get('fecha_devuelto');
        $date1 = new DateTime($date1);
        $date2 = new DateTime($date2);
        $diff = $date1->diff($date2);
        $dias = $diff->days;
        $precio_dia = $req->get('precio_dia');
        $multa = $dias * $precio_dia;
        if ($dias > 3) {
            $multa = $multa + ($dias - 3) * $precio_dia;
        } else {
            $multa=0;
        }
        try {

            DB::table('alquileres')->insert([
                'id_alquiler' => $req->get('id_alquiler'),
                'Matricula' => $req->get('Matricula'),
                'DNI' => $req->get('DNI'),
                'Fecha_salida' => Carbon::now()->toDateTimeString(),
                'Fecha_devuelto' => Carbon::now()->toDateTimeString(),
                'precio_dia' => $req->get('precio_dia'),
                'Multa' => $multa
            ]);

            $datos = [
                'mensaje' => 'alquiler insertado correctamente'
            ];
        } catch (\Exception $e) {
            $datos = [
                $e->getMessage(),
                $e->getLine(),
                $e->getCode(),
                'mensaje' => 'Error al insertar el alquiler'

            ];
        }
        return response()->json($datos, 200, [], JSON_UNESCAPED_UNICODE);
    }


    public function listaralquileres()
    {

        $alquileres = DB::table('alquileres')->get();

        $datos = [
            'alquileres' => $alquileres
        ];

        //return view('listado', $datos);
        return response()->json($datos, 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function borraralquiler($DNI)
    {
        $alquiler = DB::table('alquileres')
            ->where('DNI', $DNI)
            ->delete();

        $datos = [
            'alquiler' => $alquiler,
            'mensaje' => 'alquiler borrado correctamente'

        ];

        //return view('listado', $datos);
        return response()->json($datos, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function buscaralquiler($id_alquiler)
    {
        $alquiler = DB::table('alquileres')
            ->where('id_alquiler', $id_alquiler)
            ->get();

        $datos = [
            'alquiler' => $alquiler,
            'mensaje' => 'alquiler encontrado correctamente',

        ];

        //return view('listado', $datos);
        return response()->json($datos, 200, [], JSON_UNESCAPED_UNICODE);
    }

}
