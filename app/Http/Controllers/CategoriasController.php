<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use BootstrapComponents;

class CategoriasController extends Controller
{
    public function index(Request $request)
    {
        //
		
		
        $categorias = Categoria::orderBy('id','DESC')->paginate(5);
        return view('categoria.index', compact('categorias')); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categoria.create');
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
        $this->validate($request,[ 'categoria'=>'required|max:150']);
		$categoria = new Categoria();
		$categoria->categoria = $request->categoria;
		$categoria->save();
        return redirect()->route('categoria.index')->with('success','Registro creado satisfactoriamente');
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
        $categoria=Categoria::find($id);
        return view('categoria.edit',compact('categoria'));
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
        $this->validate($request,[ 'categoria'=>'required|max:150']);
 
        $categoria = Categoria::find($id);
		$categoria->categoria = $request->categoria;
		$categoria->save();
        return redirect()->route('categoria.index')->with('success','Registro actualizado satisfactoriamente');
 
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
        Categoria::find($id)->delete();
        return redirect()->route('categoria.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
