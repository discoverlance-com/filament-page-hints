<div
    x-data="{}"
    x-on:click="$dispatch('open-modal', { id: 'page-hints' })"
    {{ $attributes->class(['inline-block']) }}
>
    {{ $slot }}
</div>
