<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\FuturoCliente;
use App\User;
use App\Persona;

class FcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->perfil_id == 1) {
      		$fc = FuturoCliente::all();
      	}else{
      		$user = \Auth::user()->id;
      		$fc = FuturoCliente::where('user_id', $user)->get();
      	}

        return view('fc.index',[
        	'fc' => $fc
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("fc.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fc = new FuturoCliente;
        $fc->status = $request->status;
        $fc->opcion = $request->opcion;
        $fc->comentario = $request->comentario;
        $fc->user_id = \Auth::user()->id;

        if($fc->save()){
          $p = new Persona;
          $p->fill($request->all());
          $p->ft_id = $fc->id;
          $p->save();

          return redirect("fc")->with([
              'flash_message' => 'Registrado correctamente.',
              'flash_class' => 'alert-success'
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

    public function eliminar($id)
    {
        $prospecto = FuturoCliente::destroy($id);

        return redirect("fc")->with([
              'flash_message' => 'Futuro cliente eliminado correctamente.',
              'flash_class' => 'alert-success'
        ]);
    }

    public function pdf($id){

        $fc = FuturoCliente::findOrFail($id);

        $pdf = PDF::loadView('fc.pdf', compact('fc'));

        return $pdf->setPaper('a4', 'landscape')->stream(date("d-m-Y h:m:s").'.pdf');
    }
}
