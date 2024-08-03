<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait WithUuidColumn
{
    protected static function bootWithUuidColumn()
    {
        static::creating(function (Model $model) {
            if (! $model->getKey()) {
                $model->{$model->getUuidKey()} = Str::uuid()->toString();
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return $this->getUuidKey();
    }

    public function getUuidKey(): string
    {
        return 'uuid';
    }
}
