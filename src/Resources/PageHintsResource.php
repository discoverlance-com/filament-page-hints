<?php

namespace Discoverlance\FilamentPageHints\Resources;

use Discoverlance\FilamentPageHints\Resources\PageHintsResource\Pages;
use Discoverlance\FilamentPageHints\Models\PageHint;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Route;
use Livewire\Component as Livewire;

class PageHintsResource extends Resource
{
    protected static ?string $model = PageHint::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $recordTitleAttribute = "title";

    protected static function shouldRegisterNavigation(): bool
    {
        return config('filament-page-hints.show_resource_in_navigation', true);
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label(__('filament-page-hints::translations.resource.form.title'))
                            ->placeholder(__('filament-page-hints::translations.resource.form.title.placeholder.label'))
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('route')
                            ->label(__('filament-page-hints::translations.resource.form.route'))
                            ->placeholder(__('filament-page-hints::translations.resource.form.route.placeholder.label'))
                            ->required()
                            ->rules([
                                function () {
                                    return function (string $attribute, $value, Closure $fail) {
                                        if (Route::has($value) === false) {
                                            $fail("The {$attribute} is an invalid route.");
                                        }
                                    };
                                },
                            ]),
                        Forms\Components\TextInput::make('url')
                            ->label(__('filament-page-hints::translations.resource.form.url'))
                            ->placeholder(__('filament-page-hints::translations.resource.form.url.placeholder.label'))
                            ->url()
                            ->hidden(fn(Livewire $livewire) => $livewire instanceof Pages\CreatePageHints)
                            ->nullable(),
                        Forms\Components\RichTextEditor::make('hint')
                            ->label(__('filament-page-hints::translations.resource.form.hint'))
                            ->placeholder(__('filament-page-hints::translations.resource.form.hint.placeholder.label'))
                            ->required()
                            ->toolbarButtons(config('filament-page-hints.toolbar_buttons',[])),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(trans('filament-page-hints::translations.resource.table.title'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('url')
                    ->label(trans('filament-page-hints::translations.resource.table.url'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('route')
                    ->label(trans('filament-page-hints::translations.resource.table.route'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('hint')
                    ->html()
                    ->label(trans('filament-page-hints::translations.resource.table.hint'))
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageHints::route('/'),
            'create' => Pages\CreatePageHints::route('/create'),
            'edit' => Pages\EditPageHints::route('/{record}/edit'),
        ];
    }
    public static function getModelLabel(): string
    {
        return __('filament-page-hints::translations.resource.label.hint');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-page-hints-menu::translations.resource.label.hints');
    }
    protected static function getNavigationLabel(): string
    {
        return __('filament-page-hints::translations.nav.label');
    }

    protected static function getNavigationIcon(): string
    {
        return __('filament-page-hints::translations.nav.icon');
    }
}