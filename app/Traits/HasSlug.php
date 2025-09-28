<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    protected static function bootHasSlug(): void
    {
        static::saving(function ($model) {
            $sourceField = property_exists($model, 'slugSource') ? $model->slugSource : 'title';
            if (empty($model->slug) && !empty($model->{$sourceField})) {
                $model->slug = Str::slug($model->{$sourceField});
            }
        });
    }
}
