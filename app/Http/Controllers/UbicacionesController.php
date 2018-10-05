<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Provincia;
use App\Distrito;

class UbicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("ubicaciones.index",[
          "departamentos" => Departamento::all(),
          "prov" => Provincia::all(),
          "dist" => Distrito::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prov = new Provincia;
        $prov->fill($request->all());
        $prov->provincia = strtoupper($request->provincia);
        $query = Provincia::where("provincia", $request->provincia)->count();

        if ($query == 0) {
            $prov->save();
            return redirect("ubi")->with([
                'flash_message' => 'Registrado correctamente.',
                'flash_class' => 'alert-success'
            ]);
        }else{
          return redirect("ubi")->with([
              'flash_message' => 'Provincia ya registrada',
              'flash_class' => 'alert-danger'
          ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
