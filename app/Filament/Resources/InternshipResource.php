<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InternshipResource\Pages;
use App\Filament\Resources\InternshipResource\RelationManagers;
use App\Models\Internship;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InternshipResource extends Resource
{
    protected static ?string $model = Internship::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    ->label('Student')
                    ->options(\App\Models\Student::with('user')->get()->pluck('user.name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('industry_id')
                    ->options(
                        \App\Models\Industry::pluck('name', 'id')->toArray()
                    )
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('teacher_id')
                    ->label('Teacher')
                    ->options(\App\Models\Teacher::with('user')->get()->pluck('user.name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\DatePicker::make('start')
                    ->required(),
                Forms\Components\DatePicker::make('end')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.user.name')
                    ->label('Student')
                    ->sortable(),
                Tables\Columns\TextColumn::make('industry.name')
                    ->label('Industry')
                    ->sortable(),
                Tables\Columns\TextColumn::make('teacher.user.name')
                    ->label('Teacher')
                    ->sortable(),
                Tables\Columns\TextColumn::make('start')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageInternships::route('/'),
        ];
    }
}
