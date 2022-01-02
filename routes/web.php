<?php

use Illuminate\Support\Facades\Route;

use App\Models\{
    Curso,
    Permission,
    User,
    Preference
};

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
    return view('welcome');
});

Route::get('/one-to-one', function () {
    //$user = User::first();

    $user = User::with('preference')->find(2);

    $data = [
        'background_color' => '#987'
    ];

    if($user->preferences){
        $user->preferences->update($data);
    } else {
        //$user->preferences()->create($data);

        $preference = new Preference ($data);
        $user->preference()->save ($preference);
    }

    $user->refresh();

    var_dump($user->preference);

    $user->preference->delete();

    $user->refresh();

    dd($user->preference);
});

Route::get('/one-to-many', function () {

    //$curso = Curso::create(['nome'=> 'Curso Relacionamento tabelas']);

    $curso = Curso::with('modulos.aulas')->first();

    echo $curso->nome;
    echo '<br>';
    foreach ($curso->modulos as $modulo){
        echo "Modulo{$modulo->nome} <br>";

        foreach ($modulo->aulas as $aula){
            echo "aula {$aula->nome} <br>";
        }

        dd($curso);
    }
});


Route::get('/many-to-many', function () {
    $user = User::with('permissions')->find(1);

    $permission = Permission::find(1);
    $user->permissions()->save($permission);
    $user->permissions()->saveMany([
        Permission::find(1),
        Permission::find(3),
        Permission::find(2),
    ]);
    // $user->permissions()->sync([2]);
    // $user->permissions()->attach([1, 3]);
    //$user->permissions()->detach([1, 3]);

    //$user->refresh();

    dd($user->permissions);

});
