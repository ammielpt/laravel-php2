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

// aprendible.com= Route::get('/', function)
//  aprendible.com/contacto= Route::get(contacto,function)

//use Symfony\Component\Routing\Annotation\Route;

/*Route::get('/', function () {
    return "Hola desde la pagina de inicio";
});

Route::get('contacto', function () {
    return "Hola desde la pagina de contacto";
});
Route::get('saludo/{nombre?}', function ($nombre = "Invitado") {
    return "Saludos:" . $nombre;
});

Route::get('contactenos',function(){
    return "Seccion de contactos";
})->name('contactos');

Route::get('/',function(){
    echo "<a href='".route('contactos')."'>Contactos 1</a><br/>";
    echo "<a href='".route('contactos')."'>Contactos 2</a><br/>";
    echo "<a href='".route('contactos')."'>Contactos 3</a><br/>";
    echo "<a href='".route('contactos')."'>Contactos 4</a><br/>";
    echo "<a href='".route('contactos')."'>Contactos 5</a><br/>";
});
*/

use Illuminate\Support\Facades\Route;

App::setlocale('es'); //cambiar el lenguaje dinamicamente

Route::view('/', 'home')->name('home');
Route::view('/quienes-somos', 'about')->name('about');

/*
Route::get('/portafolio', 'ProjectController@index')->name('projects.index');
Route::get('/portafolio/crear', 'ProjectController@create')->name('projects.create');
Route::get('/portafolio/{project}/editar', 'ProjectController@edit')->name('projects.edit');
Route::patch('/portafolio/{project}', 'ProjectController@update')->name('projects.update');
Route::post('/portafolio', 'ProjectController@store')->name('projects.store');
Route::get('/portafolio/{project}', 'ProjectController@show')->name('projects.show');
Route::delete('/portafolio/{project}','ProjectController@destroy')->name('projects.destroy');
*/
Route::resource('portafolio', 'ProjectController')->names('projects')
    ->parameters(['portafolio' => 'project']);


Route::view('/contact', 'contact')->name('contact');
Route::post('contact', 'MessageController@store')->name('messages.store');

// Route::resource('projects', 'PortfolioController')->only(['index', 'show']);

//Route::resource('projects', 'PortfolioController')->except(['index', 'show']);

//Route::apiResource('projects', 'PortafolioController2');

//Route::resource('proyectos', 'PortafolioController2');

//Route::view('/', 'home', ['nombre'=>'Ammiel Pajuelo']); // Politicas de privacidad.

/*Route::get('/', function(){
    $nombre="Ammiel";
   // return view('home')->with('nombre', $nombre);
   // return view('home')->with(['nombre'=>$nombre]);
   //  return view('home',['nombre'=>$nombre]);
   return view('home',compact('nombre'));
})->name('home');
*/
//Auth::routes(['register' => false]);

Route::get('/', function () {
    echo "<a href=" . route('contactanos') . ">Contacto</a><br/>";
    echo "<a href=" . route('contactanos') . ">Contacto</a><br/>";
    echo "<a href=" . route('contactanos') . ">Contacto</a><br/>";
    echo "<a href=" . route('contactanos') . ">Contacto</a><br/>";
})->name('home');;

Route::get('pages', 'PagesController@home');

/*Route::get('contacto', function(){
    return "Seccion de contactos";
})->name('contactanos')->middleware('example');*/
Route::get('contacto', function () {
    return "Seccion de contactos";
})->name('contactanos');

Route::get('saludos/{nombre?}', function ($nombre = 'Invitado') {
    return 'Hola';
})->where('nombre', '[A-Za-z]');


Route::get('saludo/{nombre?}', 'PagesController@saludo')->name('saludo');

Route::get('contactame-mio', 'PagesController@mostrarContacto')->name('contactame');
Route::post('contactame-mio', 'PagesController@mensaje');


Route::get('mensajes', ['as' => 'messages.index', 'uses' => 'MessagesController@index']);
Route::get('mensajes/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
Route::post('mensajes', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
Route::get('mensajes/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
Route::get('mensajes/{id}/edit', ['as' => 'messages.edit', 'uses' => 'MessagesController@edit']);
Route::put('mensajes/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
Route::delete('mensajes/{id}', ['as' => 'messages.destroy', 'uses' => 'MessagesController@destroy']);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('test', function(){
    $user= new App\User();
    $user->name='Ammiel';
    $user->phone='123456';
    $user->email='ammiel@gmail.com';
    $user->password=bcrypt('123123');
    $user->save();
    return $user;
});
Route::get('logout', 'Auth\LoginController@logout');
