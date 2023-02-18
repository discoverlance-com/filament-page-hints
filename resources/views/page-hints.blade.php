<div class="flex items-center">

    <x-filament-page-hints::modal
        :hints="$pageHints"
    />

    {{-- Create Page Hint Modal --}}
    <x-filament::modal id="create-hint">
        <form wire:submit.prevent="submit">
            {{ $this->form }}
        
            <x-filament::button type="submit" 
                color="{{ config('filament-page-hints.upsert_hint_button_color') }}"
            >
                Submit
            </x-filament::button>
        </form>
    </x-filament::modal>
</div>