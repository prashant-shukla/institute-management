@props(['page'])
<x-filament-fabricator::layouts.base :title="$page->title">
    {{-- Header Here --}}
    @include('header')
    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />

    @include('footer')
</x-filament-fabricator::layouts.base>