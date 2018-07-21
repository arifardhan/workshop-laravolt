<?php
/**
 * Created by PhpStorm.
 * User: javan
 * Date: 21/07/18
 * Time: 20:05
 */

use Laravolt\Envi\Http\Controllers\TesController;

Route::group(
    [
        'namespace'  => '\Laravolt\Envi\Http\Controllers',
        'middleware' => ['web', 'auth'],
        'prefix'     => 'envi',
        'as'         => 'envi::',
    ],
    function ($router) {
        $router->get('tes', function ()
        {
            return view('envi::home');
        } );

        $router->get('coba', array(
            'as' => 'show',
            'uses' => 'TesController@edit',
        ));

        $router->post('update', array(
            'as' => 'update',
            'uses' => 'TesController@update',
        ));
    }
);