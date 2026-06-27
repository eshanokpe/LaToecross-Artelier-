<?php

namespace App\Filament\Resources\ArtworkEnquiries\Pages;

use App\Filament\Resources\ArtworkEnquiries\ArtworkEnquiryResource;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\ListRecords;

class ListArtworkEnquiries extends ListRecords
{
    protected static string $resource = ArtworkEnquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
}
