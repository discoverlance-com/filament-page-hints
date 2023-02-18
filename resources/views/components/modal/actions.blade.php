<div {{ $attributes }}>
    <div class="mt-2 text-sm">
        <x-filament::link
            x-on:click="$dispatch('open-modal', { id: 'create-hint' })"
            color="secondary"
            tag="button"
            tabindex="-1"
            wire:loading.attr="disabled"
            wire:loading.class="opacity-70 cursor-wait"
        >
            {{ __('filament-page-hints::translations.modal.buttons.create.label') }}
        </x-filament::link>

        <span>
            &bull;
        </span>
    </div>
</div>
