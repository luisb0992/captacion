<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Perfil;
use App\Prospecto;
use App\Red;
use App\Departamento;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = User::all();
    	return view('users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view("users.create",[
          "perfiles" => Perfil::all(),
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
        'name' => 'required',
        'email' =>'required|email|unique:users',
        'password' => 'required|min:6|confirmed'
      ]);

      $user = new User;
      $user->fill($request->all());
      $user->clave = $request->password;
      $user->password = bcrypt($request->input('password'));

      if($user->save()){
        return redirect("users")->with([
          'flash_message' => 'Usuario agregado correctamente.',
          'flash_class' => 'alert-success'
          ]);
      }else{
        return redirect("users")->with([
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
      $user = user::findOrFail($id);

      return view("users.view", [
      		"user" => $user,
      		"prospectos" => Prospecto::where('user_id', $id)->get(),
      		"redes" => Red::where('user_id', $id)->get()
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = user::findOrFail($id);
      return view("users.edit", ["user" => $user, "perfiles" => Perfil::all()]);
    }

    public function userStatus($id)
    {
      $user = user::findOrFail($id);
      // return view("users.edit", ["user" => $user, "perfiles" => Perfil::all()]);
      return response()->json($user);
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
      $user = User::findOrFail($id);

      $this->validate($request, [
        'name' => 'required',
        'email' =>'required|email|unique:users,email,'.$user->id.',id'
      ]);

      $user->fill($request->all());
      $user->password = bcrypt($request->input('clave'));

      if($user->save()){
        return redirect("users")->with([
          'flash_message' => 'Usuario actualizado correctamente.',
          'flash_class' => 'alert-success'
          ]);
      }else{
        return redirect("users")->with([
          'flash_message' => 'Ha ocurrido un error.',
          'flash_class' => 'alert-danger',
          'flash_important' => true
          ]);
      }
    }

    public function updateStatusUser(Request $request, $id){

        $user = User::findOrFail($id);
        $this->validate($request, [
          'status' => 'required'
        ]);
        $user->status = $request->status;
        $user->save();
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$user = User::findOrFail($id);

    	if($user->delete()){
    		return redirect('users')->with([
    			'flash_class'   => 'alert-success',
    			'flash_message' => 'Usuario eliminado con exito.'
    		]);
    	}else{
    		return redirect('users')->with([
    			'flash_class'     => 'alert-danger',
    			'flash_message'   => 'Ha ocurrido un error.',
    			'flash_important' => true
    		]);
    	}
    }

    public function perfil(){
    	$user = Auth::user();
    	return view('users.perfil',['perfil'=>$user]);
    }

    public function update_perfil(Request $request)
    {
    	$user = User::find(Auth::user()->id);

      $this->validate($request, [
        'name' => 'required',
        'email' =>'required|email|unique:users,email,'.$user->id.',id'
      ]);

    	$user->fill($request->all());

      if($request->input('checkbox') === "Yes"){
      	$this->validate($request,[
          'password' => 'required|min:6|confirmed'
    		]);
  			$user->password = bcrypt($request->input('password'));
      }

    	if($user->save()){
        return redirect('perfil')->with([
          'flash_message' => 'Cambios guardados correctamente.',
          'flash_class' => 'alert-success'
          ]);
    	}else{
        return redirect('perfil')->with([
          'flash_message' => 'Ha ocurrido un error.',
          'flash_class' => 'alert-danger',
          'flash_important' => true
        	]);
    	}
    }
}
