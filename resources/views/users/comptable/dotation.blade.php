
@extends('base')

@section('section')
<section class="px-6 min-h-screen overflow-hidden">

    {{-- liens utiles au chef de departement --}}
    <div class="border-b-zinc-200 border-b-2 mb-8 font-nunito">
        <a href="" class="py-3 px-6 inline-block font-semibold relative cr text-zinc-600">Département</a>
        <a href="" class="py-3 px-6 inline-block font-semibold relative text-zinc-400">Administration</a>
        <a href="" class="py-3 px-6 inline-block font-semibold relative text-zinc-400">Historique</a>
    </div>

    
    @yield('dotation')
    
</section>
    
@endsection
