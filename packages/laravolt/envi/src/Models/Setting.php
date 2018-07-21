<?php
/**
 * Created by PhpStorm.
 * User: javan
 * Date: 21/07/18
 * Time: 20:03
 */

namespace Laravolt\Envi\Models;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'update-env';

    protected $fillable = ['key', 'value', 'id'];
}