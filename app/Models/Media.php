<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'mediable_id',
        'mediable_type',
        'type',
        'path',
        'order',
    ];

    public function mediable()
    {
        return $this->morphTo();
    }
}
