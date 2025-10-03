<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasSlug;

class Space extends Model
{
    use HasSlug;

    protected $table = 'spaces';

    protected $fillable = [
        'title',
        'slug',
        'district_id',
        'user_id',
        'description',
        'directions',
        'latitude',
        'longitude',
        'locality',
        'street',
        'building',
        'phone',
        'email',
        'website',
    ];
    
    protected $slugSource = 'title';

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medias()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
}
