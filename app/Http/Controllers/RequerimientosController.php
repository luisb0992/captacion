<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Requerimiento;
use App\Status;
use App\Departamento;
use App\Provincia;
use App\Distrito;
use App\TipoInmueble;
use App\Persona;
use App\Unidad;

class RequerimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::check()) {
            $user = \Auth::user()->id;
            $req = Requerimiento::where('user_id', $user)->get();
        }else{
            return view('login');
        }

        return view("reqs.index",[
            "req" => $req
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("reqs.create",[
            "tipos" => TipoInmueble::all(),
            "departamentos" => Departamento::all(),
            "unidades" => Unidad::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tipo_id' => 'required'
        ]);

        $req = new Requerimiento;

        if ($request->antiguedad_a != '') {
            $req->antiguedad = $request->antiguedad_a.' años';
        }else{
            $req->antiguedad = $request->antiguedad;
        }

        $req->user_id = \Auth::user()->id;
        $req->presupuesto = $request->pre1.' entre '.$request->pre2;

        $req->fill($request->all());

        if($req->save()){
            
            $per = new Persona;
            $per->fill($request->all());
            $per->requerimiento_id = $req->id;
            $per->save();

            return redirect("req")->with([
                'flash_message' => 'Registrado correctamente.',
                'flash_class' => 'alert-success'
            ]);

        }else{
            
            return redirect("req")->with([
                'flash_message' => 'Ha ocurrido un error.',
                'flash_class' => 'alert-danger',
                'flash_important' => true
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
        $r = Requerimiento::findOrFail($id);

        return view("reqs.edit",[
            "r" => $r,
            "tipos" => TipoInmueble::all(),
            "departamentos" => Departamento::all(),
            "prov" => Provincia::all(),
            "dist" => Distrito::all(),
            "unidades" => Unidad::all()
        ]);
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
        $this->validate($request, [
            'tipo_id' => 'required'
        ]);

        $req = Requerimiento::findOrFail($id);

        if ($request->antiguedad_a != '') {
            $req->antiguedad = $request->antiguedad_a.' años';
        }else{
            $req->antiguedad = $request->antiguedad;
        }

        $req->user_id = \Auth::user()->id;

        $req->fill($request->all());

        if($req->save()){
            
            $per = Persona::find($request->per_id);
            $per->fill($request->all());
            $per->requerimiento_id = $req->id;
            $per->save();

            return redirect("req")->with([
                'flash_message' => 'Actualizado correctamente.',
                'flash_class' => 'alert-success'
            ]);

        }else{
            
            return redirect("req")->with([
                'flash_message' => 'Ha ocurrido un error.',
                'flash_class' => 'alert-danger',
                'flash_important' => true
            ]);
        }
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

    public function eliminar($id)
    {
        $prospecto = Requerimiento::destroy($id);

        return redirect("req")->with([
              'flash_message' => 'requerimiento eliminado correctamente.',
              'flash_class' => 'alert-success'
        ]);
    }

    public function pdf($id){

        $req = Requerimiento::findOrFail($id);

        $pdf = PDF::loadView('reqs.pdf', compact('req'));

        return $pdf->setPaper('a4', 'landscape')->download(date("d-m-Y h:m:s").'.pdf');
    }
}
