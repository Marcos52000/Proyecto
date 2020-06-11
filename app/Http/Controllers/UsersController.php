<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use BootstrapComponents;

class UsersController extends Controller
{
    public function index(Request $request)
    {
		
        $usuarios = User::orderBy('id','DESC')->paginate(5);
        return view('user.index',compact('usuarios')); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[ 'pass'=>'required|max:150','nom'=>'required|max:50' ,'correu'=>'required|max:50|unique:usuaris,email']);
		$user = new User();
		$user->usuari = $request->nom;
        $password = Hash::make($request->pass);
        $user->contrasenya = $password;
        $user->email = $request->correu;
		$user->save();
        return redirect()->route('user.index')->with('success','Registro creado satisfactoriamente');
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
        $usuarios=User::find($id);
        return view('user.edit',compact('usuarios'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)    {
        //
        $this->validate($request,[ 'correu|max:150'=>'required','nom'=>'required|max:50' ,'correu'=>'required']);
 
        $user = User::find($id);
        $user->usuari = $request->nom;
        $password = Hash::make($request->pass);
        $user->contrasenya = $password;
        $user->email = $request->correu;
        $user->save();
        return redirect()->route('user.index')->with('success','Registro actualizado satisfactoriamente');
 
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
        User::find($id)->delete();
        return redirect()->route('user.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
