<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class coches extends Controller
{
    //
    public function actualizarCoches(Request $request,$matricula){
        $marca=$request->input('Marca');
        $modelo=$request->input('Modelo');
        $matricula=DB::table('coches')
        ->where('matricula',$matricula)
        ->update(['Marca'=>$marca,'Modelo'=>$modelo]);

        return response()->json(['mensaje'=>'Actualizado coche '.$matricula],200);
    }


    public function insertarCoche(Request $req)
    {
try{
            DB::table('coches')->insert([
            'Matricula' => $req-> get('Matricula'),
             'Marca' => $req-> get('Marca'),
             'Modelo'   => $req-> get('Modelo')]);

        $datos = [

            'mensaje' => 'Coche insertado correctamente'

        ];
    }catch(\Exception $e){
        $datos = [
            'mensaje' => $e->getMessage(),
            'codigo' => $e->getCode(),
            'fila' => $e->getLine(),
            'dato' => 'Error al insertar el coche'
        ];
        return response()->json($datos, 200, [], JSON_UNESCAPED_UNICODE);
    }
        return response()->json($datos, 200, [], JSON_UNESCAPED_UNICODE);
    }
    // public function borrarTabla() {

    //     $matricula = DB::table('coches')
    //       ->truncate();

    //     $datos = [
    //         'coches' => $matricula
    //     ];

    //     //return view('listado', $datos);
    //     //return response()->json($datos,200,[],JSON_UNESCAPED_UNICODE);
    // }
    public function listarCoches()
    {

        $coches = DB::table('coches')->get();

        $datos = [
            'coches' => $coches
        ];

        //return view('listado', $datos);
        return response()->json($datos, 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function borrarCoche($matricula)
    {
        $coche = DB::table('coches')
            ->where('Matricula', $matricula)
            ->delete();

        $datos = [
            'coche' => $coche,
            'mensaje' => 'Coche borrado correctamente'

        ];

        //return view('listado', $datos);
        return response()->json($datos, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
