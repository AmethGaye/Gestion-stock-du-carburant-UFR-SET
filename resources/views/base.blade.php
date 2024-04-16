@extends('layout')

{{-- inclusion du sidebar --}}
@include('partials.side-bar')
{{-- inclusion de la barre de navigation --}}
@include('partials.nav-bar')
<main class="relative left-[280px] top-[69.5px] pb-10 ">
    <div class="px-6  py-4 text-sm font-medium text-zinc-400 mb-4">
        pages
        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline mx-2">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.292894 9.70711C-0.0976307 9.31658 -0.0976307 8.68342 0.292894 8.29289L3.58579 5L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683418 0.292893 0.292894C0.683417 -0.0976312 1.31658 -0.0976312 1.70711 0.292894L5.70711 4.29289C6.09763 4.68342 6.09763 5.31658 5.70711 5.70711L1.70711 9.70711C1.31658 10.0976 0.683418 10.0976 0.292894 9.70711Z" fill="#A1A1AA"/>
        </svg>            
        <span class="text-sm font-semibold text-zinc-500">@yield('page', 'Dashboard')</span> 
    </div>

    {{-- section principale --}}
    @yield('section')

</main>



{{-- toutes les formulaires et les messages d'alertes --}}

<div class="w-screen h-screen fixed left-0 top-0 -z-50 light-bg transition-opacity duration-100 ease-in-out flex items-center justify-center invisible opacity-0 scale-0" id="container">
    
    {{-- FIRST : FORMULAIRE D'AJOUT D'UN NOUVEL UTILISATEUR--}}
     @yield('new-user') 

    {{-- SECOND : FORMULAIRE D'AJOUT D'UN VACATAIRE --}}
    @yield('new-vacataire')

    {{-- THIRD : FORMULAIRE D'AJOUT D'UN COURS--}}
    @yield('new-cours')

    {{-- THIRD : FORMULAIRE D'AJOUT D'UNe ACTIVITE--}}
    @yield('new-activity')

</div>





