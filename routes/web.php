<?php 
  
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () { 
//     return view('welcome');
// });


Route::get('/hauser/home-instituciones','InstitucionHauserController@index');

Route::get('/hauser/create-institucion','InstitucionHauserController@create');

Route::post('/hauser/registrar-institucion','InstitucionHauserController@store');

Route::get('/hauser/editar-instituciones/{institucion_id}','InstitucionHauserController@edit');

Route::post('/hauser/modificar-institucion/{institucion_id}','InstitucionHauserController@update');


/*USUARIO General  HAUSER*/

Route::get('/hauser/home-usuario-institucion','UsuarioHauserController@index');

Route::get('/hauser/create-usuario-institucion','UsuarioHauserController@create');

Route::post('/hauser/registrar-usuario-institucion','UsuarioHauserController@store');

Route::get('/hauser/editar-usuario-institucion/{user_id}','UsuarioHauserController@edit');

Route::post('/hauser/actualizar-usuario-institucion/{user_id}','UsuarioHauserController@update');

/*RUTA USUARIOS POR INSTITUCION HAUSER*/

Route::get('/hauser/home-institucion-usuario/{institucion_id}','UsuarioHauserController@indexUsuarioInstitucion');

Route::get('/hauser/create-institucion-usuario/{institucion_id}','UsuarioHauserController@createUsuarioInstitucion');

Route::post('/hauser/registrar-institucion-usuario','UsuarioHauserController@storeUsuarioInstitucion');

Route::get('/hauser/editar-institucion-usuario/{user_id}','UsuarioHauserController@editUsuarioInstitucion');

Route::post('/hauser/actualizar-institucion-usuario/{user_id}','UsuarioHauserController@updateUsuarioInstitucion');


/*RESGITRO TEMA CON FRONDEND*/
Route::get('/tema/create-tema-hauser','TemaHauserController@create');

Route::post('/tema/registrar-tema-hauser','TemaHauserController@store');

Route::get('/tema/home-tema-hauser','TemaHauserController@index'); 
 
Route::get('/tema/vista-editar-tema-hauser/{id}', 'TemaHauserController@edit');

Route::post('/tema/modificar-tema-hauser/{id}','TemaHauserController@update');


/*REGISTRO CURSO FRONDEND*/
Route::get('/curso/home-curso-hauser','CursosHauserController@index');

Route::get('/curso/create-curso-hauser','CursosHauserController@create');

Route::post('/curso/create-curso','CursosHauserController@store');

Route::get('/curso/vista-editar-curso-hauser/{id}', 'CursosHauserController@edit');

Route::post('/curso/modificar-curso-hauser/{id}','CursosHauserController@update');
//FATLA EL SHOW
Route::get('/curso/detalle-curso/{id}','CursosHauserController@show');


/*REGISTRO CONTENIDO FRONDEND*/
Route::get('/contenido/home-contenido-curso-hauser','ContenidoHauserController@index');

Route::get('/contenido/vista-create-contenido-curso-hauser','ContenidoHauserController@create');

Route::post('/contenido/create-contenido-hauser','ContenidoHauserController@store');

Route::get('/contenido/vista-editar-contenido-curso-hauser/{id}', 'ContenidoHauserController@edit');

Route::post('/contenido/modificar-contenido-curso-hauser/{id}','ContenidoHauserController@update');
//FALTA EL SHOW

Route::get('/contenido/detalle-contenido/{id}','ContenidoHauserController@show'); 

/*REGISTRO SUBCONTENIDO HAUSER*/

Route::get('/subcontenido/home-subcontenido-contenido-curso-hauser','SubcontenidoHauserController@index');

Route::get('/subcontenido/vista-create-subcontenido-contenido-curso-hauser','SubcontenidoHauserController@create');

Route::post('/subcontenido/create-subcontenido-hauser','SubcontenidoHauserController@store');

Route::get('/subcontenido/vista-editar-subcontenido-contenido-curso-hauser/{id}', 'SubcontenidoHauserController@edit');

Route::post('/subcontenido/modificar-subcontenido-contenido-curso-hauser/{id}','SubContenidoHauserController@update');

/*REGISTRO DE  TEST*/
Route::get('/hauser/home-test','TestHauserController@index');

Route::get('/hauser/create-test','TestHauserController@create');

Route::post('/hauser/registrar-test','TestHauserController@store');

Route::get('/hauser/editar-test/{test_id}','TestHauserController@edit');

Route::post('/hauser/modificar-test/{test_id}','TestHauserController@update');

/*REGISTRO PREGUNTAS TESTS*/
Route::get('/hauser/home-test-preguntas-activas/{test_id}','PreguntasTestHauserController@indexPreguntasActivasTest');

Route::get('/hauser/home-test-preguntas-inactivas/{test_id}','PreguntasTestHauserController@indexPreguntasInactivasTest');

Route::get('/hauser/create-test-pregunta/{test_id}','PreguntasTestHauserController@createPreguntaTest');

Route::get('/hauser/home-test-preguntas','PreguntasTestHauserController@index');

Route::get('/hauser/create-test-pregunta','PreguntasTestHauserController@create');

Route::post('/hauser/registrar-test-pregunta','PreguntasTestHauserController@store');

Route::get('/hauser/editar-test-pregunta/{pregunta_id}','PreguntasTestHauserController@edit');

Route::post('/hauser/modificar-test-pregunta/{pregunta_id}','PreguntasTestHauserController@update');


//VISUALIZAR SIMULACION DE TEST

Route::get('/hauser/simulacion-test/{test_id}','TestHauserController@simulacionTest');

/*SUBCONTENIDO*/



//VER REGISTROS DE LOS CONTENIDOS DE UN CURSO SELECCIONADO




Route::get('/subcontenido/detalle-subcontenido/{id}','SubContenidoHauserController@show'); 

/*PRUEBA SUMMERNOTE*/
Route::get('/vista-summernote','CursosHauserController@vistaSummernote');



// PUBLIC ROUTES
Route::get('/','PagesPublicController@home');
Route::get('/cursos/','PagesPublicController@muestraCursos');
Route::get('/contactanos/','PagesPublicController@contactanos');


// CLASES ROUTES
Route::get('/clases/','PagesClaseController@vistaEntrenamiento');
Route::get('/clases/entrenamiento/','PagesClaseController@vistaEntrenamiento');




Route::get('/detalle-curso2', function () {
    return view('tema.tema-admin-add');
});


 Route::get('storageArchivoCurso/{archivo}', function ($archivo) {
     $storage_path = storage_path('app').'/storage/curso';
     $url = $storage_path.'/'.$archivo;
     //verificamos si el archivo existe y lo retornamos
     if (Storage::disk('curso')->exists($archivo))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);
      
     })->name('descargarArchivoCurso');

 Route::get('storageArchivoPregunta/{archivo}', function ($archivo) {
     $storage_path = storage_path('app').'/storage/preguntas';
     $url = $storage_path.'/'.$archivo;
     //verificamos si el archivo existe y lo retornamos
     if (Storage::disk('preguntas')->exists($archivo))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);
      
     })->name('descargarArchivoPregunta');


 Route::get('storageArchivoContenido/{archivo}', function ($archivo) {
     $storage_path = storage_path('app').'/storage/contenido';
     $url = $storage_path.'/'.$archivo;
     //verificamos si el archivo existe y lo retornamos
     if (Storage::disk('contenido')->exists($archivo))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);
      
     })->name('descargarArchivoContenido');

  Route::get('storageArchivoSubcontenido/{archivo}', function ($archivo) {
     $storage_path = storage_path('app').'/storage/subcontenido';
     $url = $storage_path.'/'.$archivo;
     //verificamos si el archivo existe y lo retornamos
     if (Storage::disk('subcontenido')->exists($archivo))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);
      
     })->name('descargarArchivoSubcontenido');

Route::get('/admin', function(){
    return view('page-admin.index'); 
});
Route::get('/1', function(){
    return view('page-admin.radio_checkbox');

});



//form_editors -> Editores de Texto
Route::get('/admin/user', function(){
    return view('page-admin.user.home-users'); 
});
Route::get('/admin-form/', function(){
    return view('page-admin.form_elements');
});

Route::get('/pagina', function(){
    return view('page-admin.form_wizards');
});

// tema
Route::get('/admin/tema/', function(){
    return view('page-admin.tema.home-tema');
});

Route::get('/admin/tema/create', function(){
    return view('page-admin.tema.create-tema');
});

// user 
Route::get('/admin/user/', function(){
    return view('page-admin.user.home-users');
});


