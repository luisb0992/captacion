<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Prospecto;
use App\Status;
use App\Departamento;
use App\Provincia;
use App\Distrito;
use App\TipoInmueble;
use App\Persona;
use App\Imagen;

class ProspectosController extends Controller
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
            $pros = Prospecto::where('user_id', $user)->get();
        }else{
            return view('login');
        }

        return view("prospectos.index",[
            "pros" => $pros
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("prospectos.create",[
            "status" => Status::all(),
            "tipos" => TipoInmueble::all(),
            "departamentos" => Departamento::all()
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
            'titulo' => 'required|unique:prospectos',
            'tipo_id' => 'required'
        ]);

        // dd($request->imagen);
        $pros = new Prospecto;
        $query = Prospecto::orderBy("id", "DESC")->value("id");
        $codigo = "";

        if ($query) {
            $codigo = $query + 1;
        }else{
            $codigo = 1;
        }

        if ($request->antiguedad_a != '') {
            $pros->antiguedad = $request->antiguedad_a.' años';
        }else{
            $pros->antiguedad = $request->antiguedad;
        }

        $pros->user_id = \Auth::user()->id;
        $pros->codigo = \Auth::user()->name."000".$codigo;
        $pros->fill($request->all());    

        if($pros->save()){

            $per = new Persona;
            $per->fill($request->all());
            $per->prospecto_id = $pros->id;

            if ($per->save()) {
              for ($i = 0; $i < count($request->imagen); $i++) {
                $has = $request->imagen[$i]->isValid();
                if ($has) {
                  $ext = $request->imagen[$i]->extension();
                  $imagen = new Imagen;
                  $imagen->prospecto_id = $pros->id;
                  $imagen->imagen = $request->imagen[$i]->extension();
                  if ($imagen->save()) {
                    $request->imagen[$i]->storeAs('images',"$imagen->id.$ext");
                  }
                }
              }

              return redirect("prospectos")->with([
                  'flash_message' => 'Registrado correctamente.',
                  'flash_class' => 'alert-success'
              ]);

            }else{
              return redirect("prospectos")->with([
                  'flash_message' => 'Ha ocurrido un error.',
                  'flash_class' => 'alert-danger',
                  'flash_important' => true
              ]);
          }
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
        $pro = Prospecto::findOrFail($id);

        return view("prospectos.edit",[
            "pro" => $pro,
            "status" => Status::all(),
            "tipos" => TipoInmueble::all(),
            "departamentos" => Departamento::all(),
            "prov" => Provincia::all(),
            "dist" => Distrito::all(),
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
        $pros = Prospecto::findOrFail($id);

         $this->validate($request, [
            'titulo' => 'required|unique:prospectos,titulo,'.$id.',id',
            'tipo_id' => 'required'
        ]);

        if ($request->antiguedad_a != '') {
            $pros->antiguedad = $request->antiguedad_a.' años';
        }elseif($request->antiguedad != ''){
            $pros->antiguedad = $request->antiguedad;
        }else{
            $pros->antiguedad = $pros->antiguedad;
        }

        $pros->user_id = \Auth::user()->id;

        $pros->fill($request->all());

        if($pros->save()){
            
            // si existe la imagen procedemos a eliminar y guardar nuevamente
            if ($request->imagen) {
              Imagen::where("prospecto_id", $id)->delete();

              // recorremos
              for ($i = 0; $i < count($request->imagen); $i++) {

                // eliminamos antes de guardar las nuevas
                $ext = $request->imagen[$i]->extension();
                $imagen = new Imagen;
                $imagen->prospecto_id = $pros->id;
                $imagen->imagen = $request->imagen[$i]->extension();
                $imagen->save();
                $request->imagen[$i]->storeAs('images',"$imagen->id.$ext");
              }
            }

            $per = Persona::find($request->per_id);
            $per->fill($request->all());
            $per->prospecto_id = $pros->id;
            $per->save();
            return redirect("prospectos")->with([
                'flash_message' => 'Actualizado correctamente.',
                'flash_class' => 'alert-success'
            ]);
        }else{
            return redirect("prospectos")->with([
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
    }

    public function eliminar($id)
    {
        $prospecto = Prospecto::destroy($id);

        return redirect("prospectos")->with([
              'flash_message' => 'prospecto eliminado correctamente.',
              'flash_class' => 'alert-success'
        ]);
    }

    public function pdf($id){

        $pro = Prospecto::findOrFail($id);

        $pdf = PDF::loadView('prospectos.pdf', compact('pro'));

        return $pdf->setPaper('a4', 'landscape')->stream(date("d-m-Y h:m:s").'.pdf');
    }

}
