
@extends('base')

@section('section')
<section class="px-6 min-h-screen overflow-hidden">

    {{-- liens utiles au chef de departement --}}
    <div class="border-b-zinc-200 border-b-2 mb-8 text-zinc-500">
        <a href="{{ route('dotation.depart') }}" class="py-3 px-6 inline-block  relative @if(Route::currentRouteName() == 'dotation.depart') cr text-zinc-600 font-medium @endif">Département</a>
        <a href="{{ route('dotation.admin') }}" class="py-3 px-6 inline-block relative @if(Route::currentRouteName() == 'dotation.admin') cr text-zinc-600 font-medium @endif">Administration</a>
        <a href="{{ route('dotation.historique') }}" class="py-3 px-6 inline-block relative @if(Route::currentRouteName() == 'dotation.historique') cr text-zinc-600 font-medium @endif">Historique</a>
    </div>

    
    @yield('dotation')
    
</section>
    
@endsection
