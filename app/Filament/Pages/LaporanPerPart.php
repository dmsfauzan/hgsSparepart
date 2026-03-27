<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use App\Models\Part;
use App\Models\PartMutasi;

class LaporanPerPart extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass';
    protected static ?string $navigationLabel = 'Laporan Per Part';
    protected static ?string $navigationGroup = 'Laporan';
    protected static ?int $navigationSort = 2;
    protected static string $view = 'filament.pages.laporan-per-part';

    public ?int $part_id = null;
    public $mutasi = [];
    public $selectedPart = null;

    public function getTitle(): string
    {
        return 'Laporan Per Part';
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Select::make('part_id')
                ->label('Pilih Part')
                ->options(Part::orderBy('kode')->pluck('nama', 'id'))
                ->searchable()
                ->required()
                ->reactive()
                ->afterStateUpdated(fn () => $this->loadData()),
        ]);
    }

    public function loadData(): void
    {
        if ($this->part_id) {
            $this->selectedPart = Part::find($this->part_id);
            $this->mutasi = PartMutasi::with('part')
                ->where('part_id', $this->part_id)
                ->orderBy('created_at', 'desc')
                ->get();
        }
    }

    public function getViewData(): array
    {
        return [
            'mutasi' => $this->mutasi,
            'selectedPart' => $this->selectedPart,
        ];
    }
}
