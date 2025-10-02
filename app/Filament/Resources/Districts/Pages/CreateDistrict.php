<?php

namespace App\Filament\Resources\Districts\Pages;

use App\Filament\Resources\Districts\DistrictResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\District;

class CreateDistrict extends CreateRecord
{
    protected static string $resource = DistrictResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected static bool $canCreateAnother = false;

    protected function afterCreate(): void
    {
        // После создания района сохраняем медиафайлы
        if ($this->data['media'] && !empty($this->data['media'])) {
            $district = $this->record;
            foreach ($this->data['media'] as $index => $filePath) {
                $district->media()->create([
                    'mediable_type' => District::class,
                    'mediable_id' => $district->id,
                    'type' => 'image',
                    'path' => $filePath,
                    // 'order' => $index,
                ]);
            }
        }
    }
}
