<?php

namespace App\Filament\Resources\ArtworkEnquiries\Pages;

use App\Filament\Resources\ArtworkEnquiries\ArtworkEnquiryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditArtworkEnquiry extends EditRecord
{
    protected static string $resource = ArtworkEnquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
