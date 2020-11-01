<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Payement extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
                $model->id = IdGenerator::generate
                           (['table' => 'payements',
                             'length' => 10, 'prefix' => 'PAY']);
            });
    }
}
