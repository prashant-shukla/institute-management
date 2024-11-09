@props(['page'])

<x-filament-fabricator::layouts.base :title="$page->title">
    {{-- Header Here --}}
    @include('header')

    {{-- Render page blocks --}}
    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />

    {{-- Display block images --}}
    @foreach ($page->blocks as $block)
        @if (isset($block->img))
            <img src="{{ asset($block->img) }}" alt="">
        @endif
    @endforeach

    @include('footer')
</x-filament-fabricator::layouts.base>
