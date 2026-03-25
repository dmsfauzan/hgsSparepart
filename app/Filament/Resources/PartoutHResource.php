<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartoutHResource\Pages;
use App\Models\PartoutH;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;

class PartoutHResource extends Resource
{
    protected static ?string $model = PartoutH::class;
    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-tray';
    protected static ?string $navigationLabel = 'Sparepart Out';
    protected static ?string $slug = 'sparepart-out';
    protected static ?string $modelLabel = 'Sparepart Out';
    protected static ?string $pluralModelLabel = 'Sparepart Out';
    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Section::make('Informasi Transaksi')
                ->schema([
                    TextInput::make('code')->disabled()->columnSpan(1),
                    DatePicker::make('tanggal')->required()->columnSpan(1),
                    TextInput::make('pengirim')->columnSpan(1),
                    TextInput::make('penerima')->columnSpan(1),
                ])->columns(2),

            Forms\Components\Section::make('Detail Part')
                ->schema([
                    Repeater::make('details')
                        ->relationship()
                        ->schema([
                            Select::make('part_id')
                                ->relationship('part', 'nama')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->columnSpan(2),

                            TextInput::make('qty')
                                ->numeric()
                                ->required()
                                ->columnSpan(1),
                        ])->columns(3)
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Kode')
                    ->searchable()
                    ->sortable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date('d M Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pengirim')
                    ->searchable()
                    ->default('-'),
                Tables\Columns\TextColumn::make('penerima')
                    ->searchable()
                    ->default('-'),
                Tables\Columns\TextColumn::make('operator')
                    ->badge()
                    ->color('success'),
            ])
            ->defaultSort('tanggal', 'desc')
            ->filters([
                Tables\Filters\Filter::make('tanggal')
                    ->form([
                        \Filament\Forms\Components\DatePicker::make('dari')->label('Dari Tanggal'),
                        \Filament\Forms\Components\DatePicker::make('sampai')->label('Sampai Tanggal'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['dari'], fn ($q) => $q->whereDate('tanggal', '>=', $data['dari']))
                            ->when($data['sampai'], fn ($q) => $q->whereDate('tanggal', '<=', $data['sampai']));
                    })
            ])
            ->actions([
                Tables\Actions\Action::make('pdf')
                    ->label('Print')
                    ->icon('heroicon-o-printer')
                    ->color('success')
                    ->url(fn ($record) => route('partout.pdf', $record->id))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartoutHS::route('/'),
            'create' => Pages\CreatePartoutH::route('/create'),
            'edit' => Pages\EditPartoutH::route('/{record}/edit'),
        ];
    }
}