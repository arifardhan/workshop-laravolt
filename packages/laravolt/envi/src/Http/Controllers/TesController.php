<?php
/**
 * Created by PhpStorm.
 * User: javan
 * Date: 21/07/18
 * Time: 20:34
 */

namespace Laravolt\Envi\Http\Controllers;

use Laravolt\Envi\Models\Setting;
use App\Http\Controllers\Controller;
use Dotenv\Dotenv;

class TesController extends Controller
{
    public function edit()
    {
        $dotenv = new Dotenv(base_path(),'.env');
        $dotenv->load();
        $variables = $dotenv->getEnvironmentVariableNames();

        return view('envi::tes', compact('variables'));
    }

    public function update()
    {
        $variables = request()->except('_token');

        foreach ($variables as $key => $value){
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->back()->withSuccess('Environment variables berhasil diupdate');
    }
}