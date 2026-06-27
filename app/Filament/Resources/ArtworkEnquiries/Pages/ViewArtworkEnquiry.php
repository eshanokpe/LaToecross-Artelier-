<?php

namespace App\Filament\Resources\ArtworkEnquiries\Pages;

use App\Filament\Resources\ArtworkEnquiries\ArtworkEnquiryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewArtworkEnquiry extends ViewRecord
{
    protected static string $resource = ArtworkEnquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
