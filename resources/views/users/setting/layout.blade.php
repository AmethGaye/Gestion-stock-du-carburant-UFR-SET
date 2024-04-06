@extends('base')

@section('section')
<section class="px-6 min-h-screen ">

    {{-- liens utiles au chef de departement --}}
    <div class="border-b-zinc-200 border-b-2 mb-8 font-nunito font-medium">
        <a href="{{ route('setting.compte') }}" class="py-3 px-6 inline-block font-semibold relative @if(Route::currentRouteName() == 'setting.compte') cr text-zinc-800 @else text-zinc-400 @endif">Compte</a>
        <a href="{{ route('setting.password') }}" class="py-3 px-6 inline-block font-semibold relative @if(Route::currentRouteName() == 'setting.password') cr text-zinc-800 @else text-zinc-400 @endif">Changer Mot De Passe</a>
    </div>
        
    {{-- choix entre les deux liens : tous les cours ou approbation --}}
    @yield('setting-content')    
</section>
    
@endsection