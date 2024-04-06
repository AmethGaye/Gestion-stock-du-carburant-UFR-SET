@extends('base')

@section('section')
<section class="px-6 min-h-screen ">

    {{-- liens utiles au chef de departement --}}
    <div class="border-b-zinc-200 border-b-2 mb-8 font-nunito font-medium">
        <a href="" class="py-3 px-6 inline-block font-semibold relative cr text-zinc-600">Compte</a>
        <a href="" class="py-3 px-6 inline-block font-semibold relative text-zinc-400">Changer Mot De Passe</a>
    </div>
        
    {{-- choix entre les deux liens : tous les cours ou approbation --}}
    @yield('setting-content')    
</section>
    
@endsection