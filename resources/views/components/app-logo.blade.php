@props([
    'sidebar' => false,
])

@if($sidebar)
    <flux:sidebar.brand name="GPT Group" {{ $attributes }}>
        <x-slot name="logo">
            <div class="flex size-10 items-center justify-center overflow-hidden rounded-xl bg-white shadow-sm">
                <img
                    src="{{ asset('assets/logo/GPT-Group-Logo.webp') }}"
                    alt="GPT Group Logo"
                    class="h-full w-full object-contain p-1"
                >
            </div>
        </x-slot>
    </flux:sidebar.brand>
@else
    <flux:brand name="GPT Group" {{ $attributes }}>
        <x-slot name="logo">
            <div class="flex size-10 items-center justify-center overflow-hidden rounded-xl bg-white shadow-sm">
                <img
                    src="{{ asset('assets/logo/GPT-Group-Logo.webp') }}"
                    alt="GPT Group Logo"
                    class="h-full w-full object-contain p-1"
                >
            </div>
        </x-slot>
    </flux:brand>
@endif
