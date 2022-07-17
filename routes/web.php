<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('portafolios.portafolios');
});
Route::get('/login', function () {
    return view('logins.login');
});
Route::get('/citas', function () {
    return view('citas.citas');
});
Route::get('/actualizarpass', function () {
    return view('logins.actualizarpass');
});
Route::get('/estudiantes', function () {
    return view('estudiantes.estudiantes');
});
Route::get('/nivels', function () {
    return view('nivels.nivels');
});
Route::get('/grados', function () {
    return view('grados.grados');
});
Route::get('/ciclos', function () {
    return view('ciclos.ciclos');
});
Route::get('/cursos', function () {
    return view('cursos.cursos');
});
Route::get('/maestros', function () {
    return view('maestros.maestros');
});
Route::get('/anuncios', function () {
    return view('anuncios.anuncios');
});
Route::get('/mostraranuncios', function () {
    return view('anuncios.mostraranuncios');
});
Route::get('/cuotas', function () {
    return view('cuotas.cuotas');
});
Route::get('/galerias', function () {
    return view('albums.albums');
});

Route::get('/actividades', function () {
    return view('actividades.actividades');
});
Route::get('/eactividades', function () {
    return view('actividades.eactividades');
});
Route::get('/pactividades', function () {
    return view('actividades.pactividades');
});
Route::get('/onlines/{mc_id}', function ($mc_id) {
    $data['mc_id']=$mc_id;
    return view('onlines.onlines',$data);
});
Route::get('/eonlines/{mc_id}', function ($ec_id) {
    $data['ec_id']=$ec_id;
    return view('onlines.eonlines',$data);
});
Route::get('/tareas/{mc_id}', function ($mc_id) {
    $data['mc_id']=$mc_id;
    return view('tareas.tareas',$data);
});
Route::get('/ptareas/{esc_id}', function ($esc_id) {
    $data['esc_id']=$esc_id;
    return view('ptareas.ptareas',$data);
});
Route::get('/etareas/{ec_id}', function ($ec_id) {
    $data['ec_id']=$ec_id;
    return view('entregatareas.entregatareas',$data);
});

Route::get('/ecuestionarios/{ec_id}', function ($ec_id) {
    $data['ec_id']=$ec_id;
    return view('ecuestionarios.ecuestionarios',$data);
});
Route::get('/pcuestionarios/{esc_id}', function ($esc_id) {
    $data['esc_id']=$esc_id;
    return view('pcuestionarios.pcuestionarios',$data);
});

Route::get('/cuestionarios/{mc_id}', function ($mc_id) {
    $data['mc_id']=$mc_id;
    return view('cuestionarios.cuestionarios',$data);
});
Route::get('cuestionarios/calificarcuestionarios/{cu_id}', function ($cu_id) {
    $data['cu_id']=$cu_id;
    return view('calificaractividades.cuestionarios',$data);
});
Route::get('tareas/calificartareas/{ta_id}', function ($ta_id) {
    $data['ta_id']=$ta_id;
    return view('calificaractividades.tareas',$data);
});

Route::get('/zonas', function () {
    return view('zonas.zonas');
});
Route::get('/zonase', function () {
    return view('zonas.zonase');
});
Route::get('/zonasp', function () {
    return view('zonas.zonasp');
});
Route::get('/fotos', function () {
    return view('fotos.fotos');
});

Route::get('/categorias', function () {
    return view('categorias.categorias');
});
Route::get('/productos', function () {
    return view('productos.productos');
});

Route::get('/ventas', function () {
    return view('ventas.ventas');
});

Route::get('/eventas', function () {
    return view('eventas.eventas');
});

Route::get('/entradas', function () {
    return view('entradas.entradas');
});

Route::get('/reportes', function () {
    return view('reportes.reportes');
});
Route::get('/reportestocks', function () {
    return view('reportes.reportestocks');
});
Route::get('/rstocks', function () {
    return view('reportes.rstock');
});
Route::get('/reportecuotas', function () {
    return view('reportes.reportecuotas');
});


