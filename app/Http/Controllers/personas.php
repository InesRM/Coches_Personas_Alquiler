<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class personas extends Controller
{
    //
    public function actualizarpersonas(Request $request,$DNI){
        $nombre=$request->input('Nombre');
        $telefono=$request->input('Tfno');
        $edad=$request->input('edad');
        $DNI=DB::table('personas')
        ->where('DNI',$DNI)
        ->update(['Nombre'=>$nombre,'Tfno'=>$telefono, 'edad'=>$edad]);

        return response()->json(['mensaje'=>'Actualizado persona '.$nombre],200);
    }


    public function insertarpersona(Request $req)
    {
try{
        $persona = DB::table('personas')->insert(['DNI' => $req-> get('DNI'),
             'Nombre' => $req-> get('Nombre'),
             'Tfno'   => $req-> get('Tfno'),
             'edad'   => $req-> get('edad')]);

        $datos = [
            'persona' => $persona,
            'mensaje' => 'persona insertado correctamente'

        ];
    }catch(\Exception $e){
        $datos = [
            'persona' => $persona,
            'mensaje' => 'Error al insertar el persona, duplicado'

        ];
        return response()->json($datos, 200, [], JSON_UNESCAPED_UNICODE);
    }
        return response()->json($datos, 200, [], JSON_UNESCAPED_UNICODE);
    }
    // public function borrarTabla() {

    //     $DNI = DB::table('personas')
    //       ->truncate();

    //     $datos = [
    //         'personas' => $DNI
    //     ];

    //     //return view('listado', $datos);
    //     //return response()->json($datos,200,[],JSON_UNESCAPED_UNICODE);
    // }
    public function listarpersonas()
    {

        $personas = DB::table('personas')->get();

        $datos = [
            'personas' => $personas
        ];

        //return view('listado', $datos);
        return response()->json($datos, 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function borrarpersona($DNI)
    {
        $persona = DB::table('personas')
            ->where('DNI', $DNI)
            ->delete();

        $datos = [
            'persona' => $persona,
            'mensaje' => 'persona borrado correctamente'

        ];

        //return view('listado', $datos);
        return response()->json($datos, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
