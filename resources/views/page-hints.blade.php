<div class="flex items-center">

    <x-filament-page-hints::modal :hints="$pageHints" />

    <x-filament-page-hints::modal.trigger>
        @svg(config('filament-page-hints.hint_icon'), config('filament-page-hints.hint_class'))
    </x-filament-page-hints::modal.trigger>

    {{-- Create Page Hint Modal --}}
    <x-filament::modal id="create-hint" width="lg">
        <form wire:submit.prevent="submit">
            {{ $this->form }}

            <x-filament::button type="submit" color="{{ config('filament-page-hints.upsert_hint_button_color') }}"
                wire:target="submit"
                wire:loading.attr="disabled" 
                wire:loading.class="opacity-70 cursor-wait"
                class="mt-4">
                Submit
            </x-filament::button>
        </form>
    </x-filament::modal>
</div>
