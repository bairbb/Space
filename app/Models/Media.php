<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'space_id',
        'path',
        'main'
    ];

    public function spaces()
    {
        return $this->belongsTo(Space::class);
    }
}
