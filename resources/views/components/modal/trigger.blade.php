<div x-data="{}" x-on:click="$dispatch('open-modal', { id: 'page-hints' })"
    {{ $attributes->class(['inline-block flex ml-4 rtl:mr-4 rtl:ml-0 flex-shrink-0 w-10 h-10 rounded-full bg-gray-200 items-center justify-center']) }}>
    {{ $slot }}
</div>
