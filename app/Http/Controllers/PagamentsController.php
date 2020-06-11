<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pagaments;
use App\Categoria;
use App\Compte;
use App\Curs;


//realitzar pagaments

class PagamentsController extends Controller
{
  public function getPagaments(){
    return view("index",array('Pagaments' => pagaments::all()));  
  }

  public function getPagament($id){

    $Pagament = pagaments::findOrFail($id);
    $Compte = Compte::findOrFail($Pagament->compte_id);
    $Pagaments = pagaments::all();
    return view("pagament",['Pagament'=> $Pagament,'Pagaments' => $Pagaments,'Compte'=>$Compte]);

  }

//gestio pagaments

  public function index(Request $request)
    {
        //

        $pagaments = pagaments::orderBy('id','DESC')->paginate(5);
        $categorias = Categoria::all();
        $comptes = Compte::all();
        $cursos = Curs::all();
        return view('pagament.index',['pagaments' => $pagaments, 'categorias' => $categorias, 'comptes'=> $comptes,'cursos' => $cursos]); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagaments = pagaments::orderBy('id','DESC')->paginate(5);
        $categorias = Categoria::all();
        $comptes = Compte::all();
        $cursos = Curs::all();
        return view('pagament.create',['pagaments' => $pagaments, 'categorias' => $categorias, 'comptes'=> $comptes,'cursos' => $cursos]);
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
        $this->validate($request,[ 'categoria'=>'required','compte'=> 'required', 'nivell'=>'required', 'curs'=>'required','titol'=>'required|max:150', 'desc'=>'required','preu'=>'required','data_inici'=>'required','data_fi'=>'required|after:data_inici' ,'estat'=>'required']);
		$pagament = new pagaments();
		$pagament->categoria_id = $request->categoria;
		$pagament->compte_id =$request->compte;
		$pagament->nivell =$request->nivell;
		$pagament->titol = $request->titol;
		$pagament->descripcio = $request->desc;
		$pagament->preu = $request->preu;
		$pagament->data_inici = $request->data_inici;
		$pagament->data_fi = $request->data_fi;
		$pagament->estat = $request->estat;
		$pagament->curs_id = $request->curs;
		$pagament->save();
        return redirect()->route('pagament.index')->with('success','Registro creado satisfactoriamente');
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
        $pagaments=pagaments::find($id);
        $categorias = Categoria::all();
        $comptes = Compte::all();
        $cursos = Curs::all();
        return view('pagament.edit',['pagaments' => $pagaments, 'categorias' => $categorias, 'comptes'=> $comptes,'cursos' => $cursos]);
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
        $this->validate($request,[ 'categoria'=>'required','compte'=> 'required', 'nivell'=>'required', 'curs'=>'required','titol'=>'required|max:150', 'desc'=>'required','preu'=>'required','data_inici'=>'required','data_fi'=>'required|after:data_inici' ,'estat'=>'required']);
		$pagament = pagaments::find($id);
		$pagament->categoria_id = $request->categoria;
		$pagament->compte_id =$request->compte;
		$pagament->nivell =$request->nivell;
		$pagament->titol = $request->titol;
		$pagament->descripcio = $request->desc;
		$pagament->preu = $request->preu;
		$pagament->data_inici = $request->data_inici;
		$pagament->data_fi = $request->data_fi;
		$pagament->estat = $request->estat;
		$pagament->curs_id = $request->curs;
		$pagament->save();
        return redirect()->route('pagament.index')->with('success','Registro actualizado satisfactoriamente');
 
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
        pagaments::find($id)->delete();
        return redirect()->route('pagament.index')->with('success','Registro eliminado satisfactoriamente');
    }

}
