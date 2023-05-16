<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

//    after create asign role user
    public function save()
    {
        $this->record->save();
        $this->record->assignRole('user');
        $this->redirect(
            static::route('index', $this->record),
            ['saved' => true],
        );
    }
}
