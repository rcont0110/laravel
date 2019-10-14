<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = \DB::table('usuarios')->select('id', 'nombres', 'apellidos', 'email', 'user', 'pass')->get();
    

		 return view('listaUsuarios', compact('usuarios'));
		
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
		try{
			$usuario = new Usuario;
			$usuario->nombres = $request->input('nombres');
			$usuario->apellidos = $request->input('apellidos');
			$usuario->email = $request->input('email');
			$usuario->user = $request->input('user');
			$usuario->pass = $request->input('pass');
		
			$usuario->save();
			
			return '0';
			
		}catch(\Exception $e) {
		
			return ''.$e->getMessage();
		}
		
		
		
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
	
		try{
		
			$id_usuario = $request->input('id');
			$usuario = Usuario::find($id_usuario);
			$usuario->fill($request->all());
			$usuario->save();
			
			return 0;
			
		}catch(\Exception $e){
		
			return ''.$e->getMessage();
		}
		
	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
	
		try{

			$usuario = Usuario::find($id);
			$usuario->delete();
			
			return '0';
			
		}catch(\Exception $e){
		
			return ''.$e->getMessage();
		}
		
        
		
		
    }
	
	
	
}
