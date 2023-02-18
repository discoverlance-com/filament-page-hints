@props([
    'hints',
])

<x-filament::modal
    id="page-hints"
    close-button
    slide-over
    width="md"
>
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
                        'py-2 pl-4 pr-2 bg-primary-50 -mb-px space-y-2',
                        'dark:bg-gray-700' => config('notifications.dark_mode'),
                    ])>
                        <div class="flex justify-between gap-2">
                            <p class="text-2xl font-bold">{{ $hint->title }}</p>
                            <x-filament::button
                                size="sm"
                                color="{{ config('filament-page-hints.upsert_hint_button_color') }}"
                            >
                                <x-heroicon-o-pencil-alt class="w-5 h-5" />
                            </x-filament::button>
                            <x-filament::button
                                size="sm"
                                color="{{ config('filament-page-hints.delete_hint_button_color') }}"
                            >
                                <x-heroicon-o-trash class="w-5 h-5" />
                            </x-filament::button>
                        </div>
                        <div class="prose prose-sm mt-2">
                            {!! $hint->hint !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <x-filament-page-hints::modal.empty-state />
    @endif
</x-notifications::modal>
