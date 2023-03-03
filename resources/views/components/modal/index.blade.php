@props(['hints'])

<x-filament::modal id="page-hints" close-button slide-over width="md">
    @if ($hints->count())
        <x-slot name="header">
            <x-filament-page-hints::modal.heading />

            <x-filament-page-hints::modal.actions />
        </x-slot>

        <div class="mt-[calc(-1rem-1px)]">
            @foreach ($hints as $hint)
                <div @class([
                    '-mx-6 border-b border-t',
                    'dark:border-gray-700' => config('notifications.dark_mode'),
                    'dark:border-gray-800' => config('notifications.dark_mode'),
                ])>
                    <div @class([
                        'py-2 pl-4 pr-2 -mb-px space-y-2',
                        'dark:bg-gray-700' => config('notifications.dark_mode'),
                    ])>
                        <div class="flex justify-between gap-2 flex-wrap">
                            <p class="text-xl font-bold">{{ $hint->title }}</p>
                            <div>
                                <x-filament-page-hints::link
                                    x-on:click="
                                    $wire.editPageHint('{{ $hint->uuid }}')
                                        .then(() => $dispatch('open-modal', { id: 'create-hint' }))
                                    "
                                    class="text-sm" color="{{ config('filament-page-hints.upsert_hint_button_color') }}"
                                    wire:target="editPageHint('{{ $hint->uuid }}')" tag="button" wire:loading.attr="disabled"
                                    wire:loading.class="opacity-70 cursor-wait">
                                    {{ __('filament-page-hints::translations.modal.buttons.edit.label') }}
                                </x-filament-page-hints::link>

                                <span>
                                    &bull;
                                </span>
                            </div>
                            <div>
                                <x-filament-page-hints::link
                                    x-on:click="
                                        await $wire.deletePageHint('{{ $hint->uuid }}')
                                    "
                                    class="text-sm" color="{{ config('filament-page-hints.delete_hint_button_color') }}"
                                    wire:target="deletePageHint('{{ $hint->uuid }}')" tag="button" wire:loading.attr="disabled"
                                    wire:loading.class="opacity-70 cursor-wait">
                                    {{ __('filament-page-hints::translations.modal.buttons.delete.label') }}
                                </x-filament-page-hints::link>
                            </div>
                        </div>
                        <div @class([
                            'prose prose-sm mt-2',
                            'dark:prose-invert' => config('notifications.dark_mode'),
                        ])>
                            {!! $hint->hint !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <x-filament-page-hints::modal.empty-state />
    @endif
</x-filament::modal>
