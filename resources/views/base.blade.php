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

<div class="w-screen h-screen fixed left-0 top-0 -z-50 light-bg transition-opacity duration-100 ease-in-out flex items-center justify-center invisible opacity-0 scale-0" id="container-2">
    
    <div class="w-4/12 h-2/6 bg-white rounded-md py-6 scale-75 opacity-0 trans-2">
        <div class="flex items-center justify-between mb-4 pl-8 pr-6">
            <h1 class="font-semibold text-lg text-zinc-800">Confirm Action</h1>
            <div class="icon-hover-2 cursor-pointer" id="closer2" >
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L1 13M13 13L1 1.00001" stroke="#111111" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
        <div class="mb-4 pb-4 pl-8 pr-5">
            <p class="mb-2 text-zinc-600 font-medium">Êtes-vous sûr de vouloir continuer ?</p>
            <p class="text-red-500 text-[small]">Cette action est permanente, impossible de retourner en arriere</p>
        </div>

        <div class="bg-zinc-100 h-20 px-8 flex items-center justify-end gap-3">
            <button class="px-3 py-2.5 rounded-md font-medium text-zinc-600 hover:bg-zinc-200" id="cancel">Annuler</button>
            <button class="px-3 py-2.5 rounded-md bg-zinc-800 text-zinc-200 font-mtrph" id="delete">Supprimer</button>
        </div>
    </div>
    
</div>

<div class="w-screen h-screen fixed left-0 top-0 -z-50 light-bg2 transition-opacity duration-75 ease-in-out flex items-center justify-center invisible opacity-0 scale-0" id="container-3">
    <div class="w-4/12 min-h-2/6 bg-white rounded-md pt-6 pb-2 scale-75 opacity-0">
        <div class="flex flex-col items-center justify-center mb-4 pl-8 pr-6">
            <div>
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 43.2001C29.0922 43.2001 33.9758 41.1772 37.5765 37.5765C41.1772 33.9758 43.2001 29.0922 43.2001 24C43.2001 18.9079 41.1772 14.0243 37.5765 10.4236C33.9758 6.8229 29.0922 4.80005 24 4.80005C18.9079 4.80005 14.0243 6.8229 10.4236 10.4236C6.8229 14.0243 4.80005 18.9079 4.80005 24C4.80005 29.0922 6.8229 33.9758 10.4236 37.5765C14.0243 41.1772 18.9079 43.2001 24 43.2001ZM32.8968 20.8968C33.334 20.4442 33.5759 19.838 33.5705 19.2087C33.565 18.5794 33.3126 17.9775 32.8676 17.5325C32.4226 17.0875 31.8207 16.8351 31.1914 16.8296C30.5621 16.8242 29.9559 17.0661 29.5033 17.5033L21.6 25.4065L18.4968 22.3032C18.0442 21.8661 17.438 21.6242 16.8087 21.6296C16.1794 21.6351 15.5775 21.8875 15.1325 22.3325C14.6875 22.7775 14.4351 23.3794 14.4296 24.0087C14.4242 24.638 14.6661 25.2442 15.1032 25.6968L19.9032 30.4968C20.3533 30.9468 20.9637 31.1995 21.6 31.1995C22.2364 31.1995 22.8468 30.9468 23.2968 30.4968L32.8968 20.8968Z" fill="#249F5D"/>
                </svg>                    
            </div>
            <h1 class="font-semibold text-lg text-zinc-800">Action Reussie !</h1>
        </div>
        <div class="mb-4 pb-4 pl-8 pr-5">
            <p class="text-sm text-center" id="success">Cette action est permanente, impossible de retourner en arriere</p>
        </div>

        <div class="h-20 px-8 flex items-center justify-center gap-3">
            <button class="px-3 py-2.5 rounded-md bg-zinc-800 text-zinc-100 font-mtrph  w-full font-bold" id="closeFlash">OK</button>
        </div>
    </div>
</div>

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







