@php
    \Carbon\Carbon::setLocale('pt_BR');
@endphp
<x-layout>

    @include('/posts/header')

<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    @if ($posts->count())
        <x-posts-grid :posts="$posts"/>

        {{$posts->links()}}
    @else
        <p class="text-center">Sem posts tente mais tarde</p>
    @endif
</main>
</x-layout>