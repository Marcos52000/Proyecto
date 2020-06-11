<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curs;
use BootstrapComponents;

class CursosController extends Controller
{
    public function index(Request $request)
    {
		
        $cursos = Curs::orderBy('id','DESC')->paginate(5);
        return view('curs.index',compact('cursos')); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('curs.create');
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
        $this->validate($request,[ 'curs'=>'required']);
		$curs = new Curs();
		$curs->curs = $request->curs;
		$curs->save();
        return redirect()->route('curs.index')->with('success','Registro creado satisfactoriamente');
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
        $curs=Curs::find($id);
        return view('curs.edit',compact('curs'));
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
        $this->validate($request,[ 'curs'=>'required']);
 
        $curs = Curs::find($id);
		$curs->curs = $request->curs;
		$curs->save();
        return redirect()->route('curs.index')->with('success','Registro actualizado satisfactoriamente');
 
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
        Curs::find($id)->delete();
        return redirect()->route('curs.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
