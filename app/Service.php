<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Service extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
                $model->id = IdGenerator::generate
                           (['table' => 'services',
                             'length' => 4, 'prefix' => 'S']);
            });
    }
}
