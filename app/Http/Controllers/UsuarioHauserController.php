<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Institucion;
use Storage;
use File;
use DB;
class UsuarioHauserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $UsuariosHauser =DB::Table('users')
                    ->join('institucions','institucions.id', '=','users.institucion_id')
                    ->select('users.*','institucions.nombre_institucion')
                    ->get();
        //dd($UsuariosHauser);
        return view('admin.usuario.home-usuario')->with(['UsuariosHauser'=>$UsuariosHauser]);
    }

    public function indexUsuarioInstitucion($institucion_id){

        $UsuariosInstitucionHauser =DB::Table('users')
                    ->join('institucions','institucions.id', '=','users.institucion_id')
                    ->where('institucions.id', '=',$institucion_id)
                    ->select('users.*','institucions.nombre_institucion')
                    ->get();
        //dd($UsuariosHauser);

        return view('admin.usuario.home-usuario-insitucion')->with(['UsuariosInstitucionHauser'=>$UsuariosInstitucionHauser,
                                                                    'institucion_id'=>$institucion_id
                                                                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institucionesHauser= Institucion::all();
        return view('admin.usuario.add_user')->with(['institucionesHauser'=>$institucionesHauser]);
    }

    public function createUsuarioInstitucion($institucion_id)
    {
        $institucionesHauser= Institucion::all();
        return view('admin.usuario.add_user_institucion')->with(['institucionesHauser'=>$institucionesHauser,
                                                                 'institucion_id'=>$institucion_id
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
        $name=$request['name'];
        $lastname=$request['lastname'];
        $username=$request['username'];
        $email=$request['email'];
        $numero=$request['numero'];
        $password=$request['password'];
        $institucion_id=$request['institucion_id'];
        //dd($institucion_id);
        //$avatar=$request['avatar'];
        if($request->hasFile('avatar')){
        $avatar = $request->file('avatar');
        //dd($anexo,'kjhksj');
        $nombreArchivo = strtotime("now").'-'.$avatar->getClientOriginalName();

        Storage::disk('user')->put($nombreArchivo,file_get_contents($avatar->getRealPath()));
        }else
        $nombreArchivo="default-user-image.png";

        $User = new User;
        $User-> name = $name;
        $User-> lastname = $lastname;
        $User-> username = $username;
        $User-> email = $email;
        $User-> numero = $numero;
        $User-> password = bcrypt($password);
        $User-> avatar = $nombreArchivo;
        $User-> institucion_id = $institucion_id;
        $User-> save();
        
        return redirect('/hauser/home-usuario-institucion');

    }

    public function storeUsuarioInstitucion(Request $request)
    {
        $name=$request['name'];
        $lastname=$request['lastname'];
        $username=$request['username'];
        $email=$request['email'];
        $numero=$request['numero'];
        $password=$request['password'];
        $institucion_id=$request['institucion_id'];
        //dd($institucion_id);
        //$avatar=$request['avatar'];
        if($request->hasFile('avatar')){
        $avatar = $request->file('avatar');
        //dd($anexo,'kjhksj');
        $nombreArchivo = strtotime("now").'-'.$avatar->getClientOriginalName();

        Storage::disk('user')->put($nombreArchivo,file_get_contents($avatar->getRealPath()));
        }else
        $nombreArchivo="default-user-image.png";

        $User = new User;
        $User-> name = $name;
        $User-> lastname = $lastname;
        $User-> username = $username;
        $User-> email = $email;
        $User-> numero = $numero;
        $User-> password = bcrypt($password);
        $User-> avatar = $nombreArchivo;
        $User-> institucion_id = $institucion_id;
        $User-> save();
        
        return redirect('/hauser/home-institucion-usuario/'.$institucion_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarioSeleccionado=User::find($id);
        $institucionesHauser= Institucion::all();
        //dd($usuarioSeleccionado);
        return view('admin.usuario.edit_user')->with(['usuarioSeleccionado'=>$usuarioSeleccionado,
                                                      'institucionesHauser'=>$institucionesHauser
                                                    ]);

    }

    public function editUsuarioInstitucion($id)
    {
        $usuarioInstitucionSeleccionado=User::find($id);
       
        //dd($usuarioSeleccionado);
        return view('admin.usuario.edit_user_institucion')->with(['usuarioInstitucionSeleccionado'=>$usuarioInstitucionSeleccionado
                                                      
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
        $name=$request['name'];
        $lastname=$request['lastname'];
        $username=$request['username'];
        $email=$request['email'];
        $numero=$request['numero'];
        $institucion_id=$request['institucion_id'];
        //dd($institucion_id);
        //$avatar=$request['avatar'];
        $User =  User::find($id);
        if($request->hasFile('avatar')){
        
        $fotoBorrar=$User->avatar;
        if ($fotoBorrar!="default-user-image.png") {
           File::delete( storage_path('app').'/public/User/'.$fotoBorrar);
        }
        

        
        $avatar = $request->file('avatar');
        //dd($anexo,'kjhksj');
        $nombreArchivo = strtotime("now").'-'.$avatar->getClientOriginalName();

        Storage::disk('user')->put($nombreArchivo,file_get_contents($avatar->getRealPath()));

        }else{
            
            $nombreArchivo=$User->avatar;
        }
        

     
        $User-> name = $name;
        $User-> lastname = $lastname;
        $User-> username = $username;
        $User-> email = $email;
        $User-> numero = $numero;
        $User-> avatar = $nombreArchivo;
        $User-> institucion_id = $institucion_id;
        $User-> save();
        
        return redirect('/hauser/home-usuario-institucion');
    }
    public function updateUsuarioInstitucion(Request $request, $id)
    {
        $name=$request['name'];
        $lastname=$request['lastname'];
        $username=$request['username'];
        $email=$request['email'];
        $numero=$request['numero'];
        $institucion_id=$request['institucion_id'];
        //dd($institucion_id);
        //$avatar=$request['avatar'];
        $User =  User::find($id);
        if($request->hasFile('avatar')){
        
        $fotoBorrar=$User->avatar;
        if ($fotoBorrar!="default-user-image.png") {
           File::delete( storage_path('app').'/public/User/'.$fotoBorrar);
        }
        

        
        $avatar = $request->file('avatar');
        //dd($anexo,'kjhksj');
        $nombreArchivo = strtotime("now").'-'.$avatar->getClientOriginalName();

        Storage::disk('user')->put($nombreArchivo,file_get_contents($avatar->getRealPath()));

        }else{
            
            $nombreArchivo=$User->avatar;
        }
        

     
        $User-> name = $name;
        $User-> lastname = $lastname;
        $User-> username = $username;
        $User-> email = $email;
        $User-> numero = $numero;
        $User-> avatar = $nombreArchivo;
        $User-> institucion_id = $institucion_id;
        $User-> save();
        
        return redirect('/hauser/home-institucion-usuario/'.$institucion_id);
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
