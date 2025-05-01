<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UUIDs
{
    //Generate a custom ID as UUID
    protected static function bootUUIDs()
    {
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    //Change ID incrementing attribute to no increment
    public function getIncrementing()
    {
        return false;
    }

    //Convert ID to string(uuid)
    public function getKeyType()
    {
        return 'string';
    }
}
