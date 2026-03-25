<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartMutasiResource\Pages;
use App\Models\PartMutasi;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PartMutasiResource extends Resource
{
    protected static ?string $model = PartMutasi::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Riwayat Mutasi';
    protected static ?string $slug = 'riwayat-mutasi';
    protected static ?string $modelLabel = 'Riwayat Mutasi';
    protected static ?string $pluralModelLabel = 'Riwayat Mutasi';
    protected static ?string $navigationGroup = 'Sparepart';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('part.kode')
                    ->label('Kode Part')
                    ->searchable(),
                Tables\Columns\TextColumn::make('part.nama')
                    ->label('Nama Part')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode_transaksi')
                    ->label('Kode Transaksi')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('qty')
                    ->label('Qty'),
                Tables\Columns\BadgeColumn::make('tipe')
                    ->label('Tipe')
                    ->colors([
                        'success' => 'IN',
                        'danger' => 'OUT',
                    ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('tipe')
                    ->options([
                        'IN' => 'Part In',
                        'OUT' => 'Part Out',
                    ]),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        \Filament\Forms\Components\DatePicker::make('dari')->label('Dari Tanggal'),
                        \Filament\Forms\Components\DatePicker::make('sampai')->label('Sampai Tanggal'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['dari'], fn ($q) => $q->whereDate('created_at', '>=', $data['dari']))
                            ->when($data['sampai'], fn ($q) => $q->whereDate('created_at', '<=', $data['sampai']));
                    })
            ])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartMutasis::route('/'),
        ];
    }
}