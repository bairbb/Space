<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasSlug;

class District extends Model
{
    use HasSlug;

    protected $table = 'districts';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'media',
    ];
    
    protected $slugSource = 'title';

    public function spaces()
    {
        return $this->hasMany(Space::class);
    }

    // protected function casts(): array
    // {
    //     return [
    //         'media' => 'array'
    //     ];
    // }
}
