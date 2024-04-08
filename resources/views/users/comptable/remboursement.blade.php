@extends('base')

@section('section')
<section class="px-6 min-h-screen h-screen">

<div class="px-4 py-3 bg-white rounded-md border border-zinc-200 flex items-center justify-between mb-6">
    {{-- barre de recherche --}}
    <form action="" class="flex items-center p-0 m-0">
        <div class="flex items-center relative">
            <label for="" class="absolute left-2.5 top-1/2 -translate-y-1/2">
                <svg width="15" height="16" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.178 16.0683L10.4655 11.0455M12.052 6.87446C12.0433 10.1027 9.56776 12.7132 6.52264 12.7052C3.47752 12.6971 1.01599 10.0736 1.02465 6.84531C1.03332 3.61704 3.5089 1.00652 6.55402 1.01457C9.59914 1.02262 12.0607 3.64618 12.052 6.87446Z" stroke="#71717A" stroke-width="1.56321" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </label>
            <input type="text" name='search' id="search" placeholder="Rechercher" class="pr-3 pl-9 py-1.5 outline-none w-60 bg-transparent text-sm text-zinc-500 border border-zinc-300 bg-zinc-100 rounded focus:border-zinc-500">
        </div>
    </form>

    {{-- les options --}}
    <div class="flex items-center gap-2 ">

        <button class="btn-1 bg-zinc-100 text-zinc-600 border">
            <svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.75 4.17999H3.75C3.58424 4.17999 3.42527 4.24584 3.30806 4.36305C3.19085 4.48026 3.125 4.63923 3.125 4.80499C3.125 4.97075 3.19085 5.12972 3.30806 5.24693C3.42527 5.36415 3.58424 5.42999 3.75 5.42999H13.75C13.9158 5.42999 14.0747 5.36415 14.1919 5.24693C14.3092 5.12972 14.375 4.97075 14.375 4.80499C14.375 4.63923 14.3092 4.48026 14.1919 4.36305C14.0747 4.24584 13.9158 4.17999 13.75 4.17999Z" fill="#52525B"/>
                <path d="M16.875 0.429993H0.625C0.45924 0.429993 0.300268 0.495841 0.183058 0.613051C0.065848 0.730261 0 0.889232 0 1.05499C0 1.22075 0.065848 1.37972 0.183058 1.49693C0.300268 1.61414 0.45924 1.67999 0.625 1.67999H16.875C17.0408 1.67999 17.1997 1.61414 17.3169 1.49693C17.4342 1.37972 17.5 1.22075 17.5 1.05499C17.5 0.889232 17.4342 0.730261 17.3169 0.613051C17.1997 0.495841 17.0408 0.429993 16.875 0.429993Z" fill="#52525B"/>
                <path d="M10.625 7.92999H6.875C6.70924 7.92999 6.55027 7.99584 6.43306 8.11305C6.31585 8.23026 6.25 8.38923 6.25 8.55499C6.25 8.72075 6.31585 8.87972 6.43306 8.99693C6.55027 9.11415 6.70924 9.17999 6.875 9.17999H10.625C10.7908 9.17999 10.9497 9.11415 11.0669 8.99693C11.1842 8.87972 11.25 8.72075 11.25 8.55499C11.25 8.38923 11.1842 8.23026 11.0669 8.11305C10.9497 7.99584 10.7908 7.92999 10.625 7.92999Z" fill="#52525B"/>
            </svg>
            <span class="font-medium">Filtres</span>
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.933058 0.879586C1.17714 0.613462 1.57286 0.613462 1.81694 0.879586L5.93306 5.36749C6.17714 5.63362 6.57286 5.63362 6.81694 5.36749L10.9331 0.879587C11.1771 0.613463 11.5729 0.613463 11.8169 0.879587C12.061 1.14571 12.061 1.57718 11.8169 1.84331L7.70082 6.33121C6.96859 7.12959 5.78141 7.12959 5.04918 6.33121L0.933058 1.84331C0.688981 1.57718 0.688981 1.14571 0.933058 0.879586Z" fill="#52525B"/>
            </svg>
        </button>
        <button class="btn-1 bg-zinc-100 text-zinc-600 border">
            <span class="font-medium">Janvier</span>
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.933058 0.879586C1.17714 0.613462 1.57286 0.613462 1.81694 0.879586L5.93306 5.36749C6.17714 5.63362 6.57286 5.63362 6.81694 5.36749L10.9331 0.879587C11.1771 0.613463 11.5729 0.613463 11.8169 0.879587C12.061 1.14571 12.061 1.57718 11.8169 1.84331L7.70082 6.33121C6.96859 7.12959 5.78141 7.12959 5.04918 6.33121L0.933058 1.84331C0.688981 1.57718 0.688981 1.14571 0.933058 0.879586Z" fill="#52525B"/>
            </svg>
        </button>
    </div>
</div>



<div class="flex items-center text-sm text-zinc-400 font-nunito font-bold py-4 px-6">
    {{-- cols --}}
    <span class="basis-3/12 grow pr-4">VACATAIRE</span>
    <span class="basis-3/12 grow pr-4">EMAIL</span>
    <span class="basis-2/12 grow px-4">PROVENANCE</span>
    <span class="basis-[160px] shrink-0 px-4">DUREE TOTALE</span>
    <span class="basis-[180px] text-center px-4">SITUATION</span>
    <span class="basis-[160px] px-4">DISTANCE</span>
    <span class="basis-[140px] text-center">ACTION</span>
</div>



{{-- row 1 --}}
<div class="text-sm h-20 overflow-hidden text-zinc-600 font-medium border border-zinc-200 rounded-md px-4 bg-white mb-4 relative transition-[height]" id="super-contain">

    {{-- resume --}}
    <div class="h-20 relative flex items-center border-b border-zinc-300 mb-4">
        {{-- cols --}}
        <span class="basis-3/12 grow pr-4">Mouhamadou Mansour</span>
        <span class="basis-3/12 grow pr-4">Mouhamadou@univ-thies.sn</span>
        <span class="basis-2/12 grow px-4">Tambacounda</span>
        <span class="basis-[160px] shrink-0 px-4 font-bold">20 Heures</span>
        <span class="basis-[180px] flex px-4 justify-center">
            <span class="flex items-center bg-fuchsia-100 px-4 text-fuchsia-500 py-1 rounded font-semibold text-xs">Non</span>
        </span>
        <span class="w-[160px] font-bold px-4">423.23 KM</span>

        <span class="w-[140px] relative flex items-center justify-center gap-4">
            <div class="icon-hover rounded-lg bg-zinc-100 font-semibold text-zinc-800">0</div>

            {{--  --}}
            <div class="transition-all duration-300 w-8 h-8 flex items-center justify-center mr-2 icon-hover" id="ch-container">
                <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg" class="transition-transform rotate-0" id="chevron">
                    <path d="M13.5 1.5L8.20711 6.79289C7.81658 7.18342 7.18342 7.18342 6.79289 6.79289L1.5 1.5" stroke="#9FA6B2" stroke-width="2" stroke-linecap="round"/>
                </svg>                                                       
            </div> 
        </span>
    </div>

    {{-- detail --}}
    <div class="relative mx-4">
        {{-- t-head --}}
        <div class="flex items-center text-sm text-zinc-800 font-nunito font-bold h-12 pr-4 bg-[#F1F4F9] rounded">
            {{-- cols --}}
            <span class="px-4">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.3"/>
                </svg>
            </span>
            <span class="basis-3/12 grow px-4">Matière</span>
            <span class="basis-40 shrink-0">Semestre</span>
            <span class="basis-2/12 grow">Date</span>
            <span class="basis-32">Durée</span>
            <span class="basis-[140px] pl-4">Tickets</span>
            <span class="basis-[160px] text-center">Statut</span>
            <span class="basis-[215px] text-center">Action</span>
        </div>
        {{-- t-body --}}
        <div class="max-h-44 overflow-y-scroll">
            <div class="flex items-center text-sm text-zinc-600 font-medium h-14 border-b">
                {{-- cols --}}
                <span class="px-4">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.3"/>
                    </svg>
                </span>
                <span class="basis-3/12 grow px-4">Developpement Web</span>
                <span class="basis-40 shrink-0">Semestre 5</span>
                <span class="basis-2/12 grow">24/01/2024</span>
                <span class="basis-32 font-bold">4 heures</span>
                <span class="basis-[140px] flex pl-4">
                        <div class="w-28 relative ">
                            <input type="text" name="" id="" value="5" class="border-[1.5px] border-zinc-200 w-full rounded-md outline-none focus:border-zinc-500 px-4 py-2 font-bold text-zinc-600">
                            <div class="absolute right-2 top-1/2 -translate-y-1/2 flex">
                                <button type="button" class="w-7 h-7 mr-1  bg-zinc-100 flex items-center justify-center rounded-md">
                                    <svg width="12" height="3" viewBox="0 0 12 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 1.4999C12 1.65903 11.9473 1.81165 11.8536 1.92417C11.7598 2.03669 11.6326 2.0999 11.5 2.0999H0.5C0.367392 2.0999 0.240215 2.03669 0.146447 1.92417C0.0526785 1.81165 0 1.65903 0 1.4999C0 1.34077 0.0526785 1.18816 0.146447 1.07564C0.240215 0.963117 0.367392 0.899902 0.5 0.899902H11.5C11.6326 0.899902 11.7598 0.963117 11.8536 1.07564C11.9473 1.18816 12 1.34077 12 1.4999Z" fill="#1C1C1C"/>
                                    </svg>
                                </button>
                                <button type="button" class="w-7 h-7 bg-zinc-100 flex items-center justify-center rounded-md">
                                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6.5C12 6.63261 11.9473 6.75979 11.8536 6.85355C11.7598 6.94732 11.6326 7 11.5 7H6.5V12C6.5 12.1326 6.44732 12.2598 6.35355 12.3536C6.25979 12.4473 6.13261 12.5 6 12.5C5.86739 12.5 5.74021 12.4473 5.64645 12.3536C5.55268 12.2598 5.5 12.1326 5.5 12V7H0.5C0.367392 7 0.240215 6.94732 0.146447 6.85355C0.0526785 6.75979 0 6.63261 0 6.5C0 6.36739 0.0526785 6.24021 0.146447 6.14645C0.240215 6.05268 0.367392 6 0.5 6H5.5V1C5.5 0.867392 5.55268 0.740215 5.64645 0.646447C5.74021 0.552679 5.86739 0.5 6 0.5C6.13261 0.5 6.25979 0.552679 6.35355 0.646447C6.44732 0.740215 6.5 0.867392 6.5 1V6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5Z" fill="#1C1C1C"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                </span>
                <span class="basis-[160px] flex items-center justify-center">
                    <span class="bg-emerald-100 px-3 text-emerald-500 py-1 rounded font-semibold text-xs">Approuvé</span>
                </span>
                <span class="basis-[215px] flex items-center justify-center gap-3 box-border">
                    <form action="" class="m-0">
                        <button class="font-medium btn-2 bg-[#4C535F] text-white text-xs">Rembourser</button>
                    </form>
                    {{-- separator --}}
                    <div class=" w-0.5 h-5 bg-zinc-200"></div>
                    <form action="" method="" class="m-0">
                        <button class="">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 7C13 10.3137 10.3137 13 7 13C3.68629 13 1 10.3137 1 7C1 3.68629 3.68629 1 7 1C8.53671 1 9.93849 1.57771 11 2.52779M11.6667 1V3C11.6667 3.36819 11.3682 3.66667 11 3.66667H9" stroke="#4C535F" stroke-width="2" stroke-linecap="round"/>
                            </svg>                            
                        </button>
                    </form>
                </span>
            </div>
      
            <div class="flex items-center text-sm text-zinc-600 font-medium h-14 border-b">
                {{-- cols --}}
                <span class="px-4">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.3"/>
                    </svg>
                </span>
                <span class="basis-3/12 grow px-4">Developpement Web</span>
                <span class="basis-40 shrink-0">Semestre 5</span>
                <span class="basis-2/12 grow">24/01/2024</span>
                <span class="basis-32 font-bold">4 heures</span>
                <span class="basis-[140px] flex pl-4">
                        <div class="w-28 relative ">
                            <input type="text" name="" id="" value="5" class="border-[1.5px] border-zinc-200 w-full rounded-md outline-none focus:border-zinc-500 px-4 py-2 font-bold text-zinc-600">
                            <div class="absolute right-2 top-1/2 -translate-y-1/2 flex">
                                <button type="button" class="w-7 h-7 mr-1  bg-zinc-100 flex items-center justify-center rounded-md">
                                    <svg width="12" height="3" viewBox="0 0 12 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 1.4999C12 1.65903 11.9473 1.81165 11.8536 1.92417C11.7598 2.03669 11.6326 2.0999 11.5 2.0999H0.5C0.367392 2.0999 0.240215 2.03669 0.146447 1.92417C0.0526785 1.81165 0 1.65903 0 1.4999C0 1.34077 0.0526785 1.18816 0.146447 1.07564C0.240215 0.963117 0.367392 0.899902 0.5 0.899902H11.5C11.6326 0.899902 11.7598 0.963117 11.8536 1.07564C11.9473 1.18816 12 1.34077 12 1.4999Z" fill="#1C1C1C"/>
                                    </svg>
                                </button>
                                <button type="button" class="w-7 h-7 bg-zinc-100 flex items-center justify-center rounded-md">
                                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6.5C12 6.63261 11.9473 6.75979 11.8536 6.85355C11.7598 6.94732 11.6326 7 11.5 7H6.5V12C6.5 12.1326 6.44732 12.2598 6.35355 12.3536C6.25979 12.4473 6.13261 12.5 6 12.5C5.86739 12.5 5.74021 12.4473 5.64645 12.3536C5.55268 12.2598 5.5 12.1326 5.5 12V7H0.5C0.367392 7 0.240215 6.94732 0.146447 6.85355C0.0526785 6.75979 0 6.63261 0 6.5C0 6.36739 0.0526785 6.24021 0.146447 6.14645C0.240215 6.05268 0.367392 6 0.5 6H5.5V1C5.5 0.867392 5.55268 0.740215 5.64645 0.646447C5.74021 0.552679 5.86739 0.5 6 0.5C6.13261 0.5 6.25979 0.552679 6.35355 0.646447C6.44732 0.740215 6.5 0.867392 6.5 1V6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5Z" fill="#1C1C1C"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                </span>
                <span class="basis-[160px] flex items-center justify-center">
                    <span class="bg-emerald-100 px-3 text-emerald-500 py-1 rounded font-semibold text-xs">Approuvé</span>
                </span>
                <span class="basis-[215px] flex items-center justify-center gap-3 box-border">
                    <form action="" class="m-0">
                        <button class="font-medium btn-2 bg-[#4C535F] text-white text-xs">Rembourser</button>
                    </form>
                    {{-- separator --}}
                    <div class=" w-0.5 h-5 bg-zinc-200"></div>
                    <form action="" method="" class="m-0">
                        <button class="">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 7C13 10.3137 10.3137 13 7 13C3.68629 13 1 10.3137 1 7C1 3.68629 3.68629 1 7 1C8.53671 1 9.93849 1.57771 11 2.52779M11.6667 1V3C11.6667 3.36819 11.3682 3.66667 11 3.66667H9" stroke="#4C535F" stroke-width="2" stroke-linecap="round"/>
                            </svg>                            
                        </button>
                    </form>
                </span>
            </div>
      
            <div class="flex items-center text-sm text-zinc-600 font-medium h-14 border-b">
                {{-- cols --}}
                <span class="px-4">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.3"/>
                    </svg>
                </span>
                <span class="basis-3/12 grow px-4">Developpement Web</span>
                <span class="basis-40 shrink-0">Semestre 5</span>
                <span class="basis-2/12 grow">24/01/2024</span>
                <span class="basis-32 font-bold">4 heures</span>
                <span class="basis-[140px] flex pl-4">
                        <div class="w-28 relative ">
                            <input type="text" name="" id="" value="5" class="border-[1.5px] border-zinc-200 w-full rounded-md outline-none focus:border-zinc-500 px-4 py-2 font-bold text-zinc-600">
                            <div class="absolute right-2 top-1/2 -translate-y-1/2 flex">
                                <button type="button" class="w-7 h-7 mr-1  bg-zinc-100 flex items-center justify-center rounded-md">
                                    <svg width="12" height="3" viewBox="0 0 12 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 1.4999C12 1.65903 11.9473 1.81165 11.8536 1.92417C11.7598 2.03669 11.6326 2.0999 11.5 2.0999H0.5C0.367392 2.0999 0.240215 2.03669 0.146447 1.92417C0.0526785 1.81165 0 1.65903 0 1.4999C0 1.34077 0.0526785 1.18816 0.146447 1.07564C0.240215 0.963117 0.367392 0.899902 0.5 0.899902H11.5C11.6326 0.899902 11.7598 0.963117 11.8536 1.07564C11.9473 1.18816 12 1.34077 12 1.4999Z" fill="#1C1C1C"/>
                                    </svg>
                                </button>
                                <button type="button" class="w-7 h-7 bg-zinc-100 flex items-center justify-center rounded-md">
                                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6.5C12 6.63261 11.9473 6.75979 11.8536 6.85355C11.7598 6.94732 11.6326 7 11.5 7H6.5V12C6.5 12.1326 6.44732 12.2598 6.35355 12.3536C6.25979 12.4473 6.13261 12.5 6 12.5C5.86739 12.5 5.74021 12.4473 5.64645 12.3536C5.55268 12.2598 5.5 12.1326 5.5 12V7H0.5C0.367392 7 0.240215 6.94732 0.146447 6.85355C0.0526785 6.75979 0 6.63261 0 6.5C0 6.36739 0.0526785 6.24021 0.146447 6.14645C0.240215 6.05268 0.367392 6 0.5 6H5.5V1C5.5 0.867392 5.55268 0.740215 5.64645 0.646447C5.74021 0.552679 5.86739 0.5 6 0.5C6.13261 0.5 6.25979 0.552679 6.35355 0.646447C6.44732 0.740215 6.5 0.867392 6.5 1V6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5Z" fill="#1C1C1C"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                </span>
                <span class="basis-[160px] flex items-center justify-center">
                    <span class="bg-emerald-100 px-3 text-emerald-500 py-1 rounded font-semibold text-xs">Approuvé</span>
                </span>
                <span class="basis-[215px] flex items-center justify-center gap-3 box-border">
                    <form action="" class="m-0">
                        <button class="font-medium btn-2 bg-[#4C535F] text-white text-xs">Rembourser</button>
                    </form>
                    {{-- separator --}}
                    <div class=" w-0.5 h-5 bg-zinc-200"></div>
                    <form action="" method="" class="m-0">
                        <button class="">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 7C13 10.3137 10.3137 13 7 13C3.68629 13 1 10.3137 1 7C1 3.68629 3.68629 1 7 1C8.53671 1 9.93849 1.57771 11 2.52779M11.6667 1V3C11.6667 3.36819 11.3682 3.66667 11 3.66667H9" stroke="#4C535F" stroke-width="2" stroke-linecap="round"/>
                            </svg>                            
                        </button>
                    </form>
                </span>
            </div>
      
            <div class="flex items-center text-sm text-zinc-600 font-medium h-14 border-b">
                {{-- cols --}}
                <span class="px-4">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.3"/>
                    </svg>
                </span>
                <span class="basis-3/12 grow px-4">Developpement Web</span>
                <span class="basis-40 shrink-0">Semestre 5</span>
                <span class="basis-2/12 grow">24/01/2024</span>
                <span class="basis-32 font-bold">4 heures</span>
                <span class="basis-[140px] flex pl-4">
                        <div class="w-28 relative ">
                            <input type="text" name="" id="" value="5" class="border-[1.5px] border-zinc-200 w-full rounded-md outline-none focus:border-zinc-500 px-4 py-2 font-bold text-zinc-600">
                            <div class="absolute right-2 top-1/2 -translate-y-1/2 flex">
                                <button type="button" class="w-7 h-7 mr-1  bg-zinc-100 flex items-center justify-center rounded-md">
                                    <svg width="12" height="3" viewBox="0 0 12 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 1.4999C12 1.65903 11.9473 1.81165 11.8536 1.92417C11.7598 2.03669 11.6326 2.0999 11.5 2.0999H0.5C0.367392 2.0999 0.240215 2.03669 0.146447 1.92417C0.0526785 1.81165 0 1.65903 0 1.4999C0 1.34077 0.0526785 1.18816 0.146447 1.07564C0.240215 0.963117 0.367392 0.899902 0.5 0.899902H11.5C11.6326 0.899902 11.7598 0.963117 11.8536 1.07564C11.9473 1.18816 12 1.34077 12 1.4999Z" fill="#1C1C1C"/>
                                    </svg>
                                </button>
                                <button type="button" class="w-7 h-7 bg-zinc-100 flex items-center justify-center rounded-md">
                                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6.5C12 6.63261 11.9473 6.75979 11.8536 6.85355C11.7598 6.94732 11.6326 7 11.5 7H6.5V12C6.5 12.1326 6.44732 12.2598 6.35355 12.3536C6.25979 12.4473 6.13261 12.5 6 12.5C5.86739 12.5 5.74021 12.4473 5.64645 12.3536C5.55268 12.2598 5.5 12.1326 5.5 12V7H0.5C0.367392 7 0.240215 6.94732 0.146447 6.85355C0.0526785 6.75979 0 6.63261 0 6.5C0 6.36739 0.0526785 6.24021 0.146447 6.14645C0.240215 6.05268 0.367392 6 0.5 6H5.5V1C5.5 0.867392 5.55268 0.740215 5.64645 0.646447C5.74021 0.552679 5.86739 0.5 6 0.5C6.13261 0.5 6.25979 0.552679 6.35355 0.646447C6.44732 0.740215 6.5 0.867392 6.5 1V6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5Z" fill="#1C1C1C"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                </span>
                <span class="basis-[160px] flex items-center justify-center">
                    <span class="bg-emerald-100 px-3 text-emerald-500 py-1 rounded font-semibold text-xs">Approuvé</span>
                </span>
                <span class="basis-[215px] flex items-center justify-center gap-3 box-border">
                    <form action="" class="m-0">
                        <button class="font-medium btn-2 bg-[#4C535F] text-white text-xs">Rembourser</button>
                    </form>
                    {{-- separator --}}
                    <div class=" w-0.5 h-5 bg-zinc-200"></div>
                    <form action="" method="" class="m-0">
                        <button class="">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 7C13 10.3137 10.3137 13 7 13C3.68629 13 1 10.3137 1 7C1 3.68629 3.68629 1 7 1C8.53671 1 9.93849 1.57771 11 2.52779M11.6667 1V3C11.6667 3.36819 11.3682 3.66667 11 3.66667H9" stroke="#4C535F" stroke-width="2" stroke-linecap="round"/>
                            </svg>                            
                        </button>
                    </form>
                </span>
            </div>
      
            <div class="flex items-center text-sm text-zinc-600 font-medium h-14 border-b">
                {{-- cols --}}
                <span class="px-4">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.3"/>
                    </svg>
                </span>
                <span class="basis-3/12 grow px-4">Developpement Web</span>
                <span class="basis-40 shrink-0">Semestre 5</span>
                <span class="basis-2/12 grow">24/01/2024</span>
                <span class="basis-32 font-bold">4 heures</span>
                <span class="basis-[140px] flex pl-4">
                        <div class="w-28 relative ">
                            <input type="text" name="" id="" value="5" class="border-[1.5px] border-zinc-200 w-full rounded-md outline-none focus:border-zinc-500 px-4 py-2 font-bold text-zinc-600">
                            <div class="absolute right-2 top-1/2 -translate-y-1/2 flex">
                                <button type="button" class="w-7 h-7 mr-1  bg-zinc-100 flex items-center justify-center rounded-md">
                                    <svg width="12" height="3" viewBox="0 0 12 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 1.4999C12 1.65903 11.9473 1.81165 11.8536 1.92417C11.7598 2.03669 11.6326 2.0999 11.5 2.0999H0.5C0.367392 2.0999 0.240215 2.03669 0.146447 1.92417C0.0526785 1.81165 0 1.65903 0 1.4999C0 1.34077 0.0526785 1.18816 0.146447 1.07564C0.240215 0.963117 0.367392 0.899902 0.5 0.899902H11.5C11.6326 0.899902 11.7598 0.963117 11.8536 1.07564C11.9473 1.18816 12 1.34077 12 1.4999Z" fill="#1C1C1C"/>
                                    </svg>
                                </button>
                                <button type="button" class="w-7 h-7 bg-zinc-100 flex items-center justify-center rounded-md">
                                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6.5C12 6.63261 11.9473 6.75979 11.8536 6.85355C11.7598 6.94732 11.6326 7 11.5 7H6.5V12C6.5 12.1326 6.44732 12.2598 6.35355 12.3536C6.25979 12.4473 6.13261 12.5 6 12.5C5.86739 12.5 5.74021 12.4473 5.64645 12.3536C5.55268 12.2598 5.5 12.1326 5.5 12V7H0.5C0.367392 7 0.240215 6.94732 0.146447 6.85355C0.0526785 6.75979 0 6.63261 0 6.5C0 6.36739 0.0526785 6.24021 0.146447 6.14645C0.240215 6.05268 0.367392 6 0.5 6H5.5V1C5.5 0.867392 5.55268 0.740215 5.64645 0.646447C5.74021 0.552679 5.86739 0.5 6 0.5C6.13261 0.5 6.25979 0.552679 6.35355 0.646447C6.44732 0.740215 6.5 0.867392 6.5 1V6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5Z" fill="#1C1C1C"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                </span>
                <span class="basis-[160px] flex items-center justify-center">
                    <span class="bg-emerald-100 px-3 text-emerald-500 py-1 rounded font-semibold text-xs">Approuvé</span>
                </span>
                <span class="basis-[215px] flex items-center justify-center gap-3 box-border">
                    <form action="" class="m-0">
                        <button class="font-medium btn-2 bg-[#4C535F] text-white text-xs">Rembourser</button>
                    </form>
                    {{-- separator --}}
                    <div class=" w-0.5 h-5 bg-zinc-200"></div>
                    <form action="" method="" class="m-0">
                        <button class="">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 7C13 10.3137 10.3137 13 7 13C3.68629 13 1 10.3137 1 7C1 3.68629 3.68629 1 7 1C8.53671 1 9.93849 1.57771 11 2.52779M11.6667 1V3C11.6667 3.36819 11.3682 3.66667 11 3.66667H9" stroke="#4C535F" stroke-width="2" stroke-linecap="round"/>
                            </svg>                            
                        </button>
                    </form>
                </span>
            </div>
      
            <div class="flex items-center text-sm text-zinc-600 font-medium h-14 border-b">
                {{-- cols --}}
                <span class="px-4">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.3"/>
                    </svg>
                </span>
                <span class="basis-3/12 grow px-4">Developpement Web</span>
                <span class="basis-40 shrink-0">Semestre 5</span>
                <span class="basis-2/12 grow">24/01/2024</span>
                <span class="basis-32 font-bold">4 heures</span>
                <span class="basis-[140px] flex pl-4">
                        <div class="w-28 relative ">
                            <input type="text" name="" id="" value="5" class="border-[1.5px] border-zinc-200 w-full rounded-md outline-none focus:border-zinc-500 px-4 py-2 font-bold text-zinc-600">
                            <div class="absolute right-2 top-1/2 -translate-y-1/2 flex">
                                <button type="button" class="w-7 h-7 mr-1  bg-zinc-100 flex items-center justify-center rounded-md">
                                    <svg width="12" height="3" viewBox="0 0 12 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 1.4999C12 1.65903 11.9473 1.81165 11.8536 1.92417C11.7598 2.03669 11.6326 2.0999 11.5 2.0999H0.5C0.367392 2.0999 0.240215 2.03669 0.146447 1.92417C0.0526785 1.81165 0 1.65903 0 1.4999C0 1.34077 0.0526785 1.18816 0.146447 1.07564C0.240215 0.963117 0.367392 0.899902 0.5 0.899902H11.5C11.6326 0.899902 11.7598 0.963117 11.8536 1.07564C11.9473 1.18816 12 1.34077 12 1.4999Z" fill="#1C1C1C"/>
                                    </svg>
                                </button>
                                <button type="button" class="w-7 h-7 bg-zinc-100 flex items-center justify-center rounded-md">
                                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6.5C12 6.63261 11.9473 6.75979 11.8536 6.85355C11.7598 6.94732 11.6326 7 11.5 7H6.5V12C6.5 12.1326 6.44732 12.2598 6.35355 12.3536C6.25979 12.4473 6.13261 12.5 6 12.5C5.86739 12.5 5.74021 12.4473 5.64645 12.3536C5.55268 12.2598 5.5 12.1326 5.5 12V7H0.5C0.367392 7 0.240215 6.94732 0.146447 6.85355C0.0526785 6.75979 0 6.63261 0 6.5C0 6.36739 0.0526785 6.24021 0.146447 6.14645C0.240215 6.05268 0.367392 6 0.5 6H5.5V1C5.5 0.867392 5.55268 0.740215 5.64645 0.646447C5.74021 0.552679 5.86739 0.5 6 0.5C6.13261 0.5 6.25979 0.552679 6.35355 0.646447C6.44732 0.740215 6.5 0.867392 6.5 1V6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5Z" fill="#1C1C1C"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                </span>
                <span class="basis-[160px] flex items-center justify-center">
                    <span class="bg-emerald-100 px-3 text-emerald-500 py-1 rounded font-semibold text-xs">Approuvé</span>
                </span>
                <span class="basis-[215px] flex items-center justify-center gap-3 box-border">
                    <form action="" class="m-0">
                        <button class="font-medium btn-2 bg-[#4C535F] text-white text-xs">Rembourser</button>
                    </form>
                    {{-- separator --}}
                    <div class=" w-0.5 h-5 bg-zinc-200"></div>
                    <form action="" method="" class="m-0">
                        <button class="">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 7C13 10.3137 10.3137 13 7 13C3.68629 13 1 10.3137 1 7C1 3.68629 3.68629 1 7 1C8.53671 1 9.93849 1.57771 11 2.52779M11.6667 1V3C11.6667 3.36819 11.3682 3.66667 11 3.66667H9" stroke="#4C535F" stroke-width="2" stroke-linecap="round"/>
                            </svg>                            
                        </button>
                    </form>
                </span>
            </div>
      
        </div>              

        {{-- t-foot --}}
        <div class="h-20 text-sm font-semibold flex items-center justify-between">
            <div class="flex gap-2 items-center">
                <span class="text-zinc-400">TOTAL:</span>
                <span class="text-red-500 font-bold bg-red-100 btn-2 ml-4">8 Heures</span>
                {{-- separator --}}
                <div class=" w-0.5 h-5 bg-zinc-200"></div>
                <span class="text-red-500 font-bold bg-red-100 btn-2">10 Tickets</span>
            </div>

            <form class="text-zinc-600 m-0">
                <button class="btn-1 bg-zinc-800 text-white font-medium">
                    Rembourser
                </button>
            </form>
        </div>
    </div>
</div>
{{-- row 2 --}}
<div class="text-sm h-20 overflow-hidden text-zinc-600 font-medium border border-zinc-200 rounded-md px-4 bg-white mb-4 relative transition-[height]" id="super-contain">

    {{-- resume --}}
    <div class="h-20 relative flex items-center border-b border-zinc-300 mb-4">
        {{-- cols --}}
        <span class="basis-3/12 grow pr-4">Mouhamadou Mansour</span>
        <span class="basis-3/12 grow pr-4">Mouhamadou@univ-thies.sn</span>
        <span class="basis-2/12 grow px-4">Tambacounda</span>
        <span class="basis-[160px] shrink-0 px-4 font-bold">20 Heures</span>
        <span class="basis-[180px] flex px-4 justify-center">
            <span class="flex items-center bg-blue-100 px-4 text-blue-500 py-1 rounded font-semibold text-xs">Véhiculé</span>
        </span>
        <span class="w-[160px] font-bold px-4">423.23 KM</span>

        <span class="w-[140px] relative flex items-center justify-center gap-4">
            <div class="icon-hover rounded-lg bg-zinc-100 font-semibold text-zinc-800">0</div>

            {{--  --}}
            <div class="transition-all duration-300 w-8 h-8 flex items-center justify-center mr-2 icon-hover" id="ch-container">
                <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg" class="transition-transform rotate-0" id="chevron">
                    <path d="M13.5 1.5L8.20711 6.79289C7.81658 7.18342 7.18342 7.18342 6.79289 6.79289L1.5 1.5" stroke="#9FA6B2" stroke-width="2" stroke-linecap="round"/>
                </svg>                                                       
            </div> 
        </span>
    </div>

    {{-- detail --}}
    <div class="relative mx-4">
        {{-- t-head --}}
        <div class="flex items-center text-sm text-zinc-800 font-nunito font-bold h-12 pr-4 bg-[#F1F4F9] rounded">
            {{-- cols --}}
            <span class="px-4">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.3"/>
                </svg>
            </span>
            <span class="basis-3/12 grow px-4">Matière</span>
            <span class="basis-40 shrink-0">Semestre</span>
            <span class="basis-2/12 grow">Date</span>
            <span class="basis-32">Durée</span>
            <span class="basis-[140px] pl-4">Tickets</span>
            <span class="basis-[160px] text-center">Statut</span>
            <span class="basis-[215px] text-center">Action</span>
        </div>
        {{-- t-body --}}
        <div class="max-h-44 overflow-y-scroll">
            {{-- row 1 --}}
            <div class="flex items-center text-sm text-zinc-600 font-medium h-14 border-b">
                {{-- cols --}}
                <span class="px-4">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.3"/>
                    </svg>
                </span>
                <span class="basis-3/12 grow px-4">Developpement Web</span>
                <span class="basis-40 shrink-0">Semestre 5</span>
                <span class="basis-2/12 grow">24/01/2024</span>
                <span class="basis-32 font-bold">4 heures</span>
                <span class="basis-[140px] flex pl-4">
                        <div class="w-28 relative ">
                            <input type="text" name="" id="" value="5" class="border-[1.5px] border-zinc-200 w-full rounded-md outline-none focus:border-zinc-500 px-4 py-2 font-bold text-zinc-600">
                            <div class="absolute right-2 top-1/2 -translate-y-1/2 flex">
                                <button type="button" class="w-7 h-7 mr-1  bg-zinc-100 flex items-center justify-center rounded-md">
                                    <svg width="12" height="3" viewBox="0 0 12 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 1.4999C12 1.65903 11.9473 1.81165 11.8536 1.92417C11.7598 2.03669 11.6326 2.0999 11.5 2.0999H0.5C0.367392 2.0999 0.240215 2.03669 0.146447 1.92417C0.0526785 1.81165 0 1.65903 0 1.4999C0 1.34077 0.0526785 1.18816 0.146447 1.07564C0.240215 0.963117 0.367392 0.899902 0.5 0.899902H11.5C11.6326 0.899902 11.7598 0.963117 11.8536 1.07564C11.9473 1.18816 12 1.34077 12 1.4999Z" fill="#1C1C1C"/>
                                    </svg>
                                </button>
                                <button type="button" class="w-7 h-7 bg-zinc-100 flex items-center justify-center rounded-md">
                                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6.5C12 6.63261 11.9473 6.75979 11.8536 6.85355C11.7598 6.94732 11.6326 7 11.5 7H6.5V12C6.5 12.1326 6.44732 12.2598 6.35355 12.3536C6.25979 12.4473 6.13261 12.5 6 12.5C5.86739 12.5 5.74021 12.4473 5.64645 12.3536C5.55268 12.2598 5.5 12.1326 5.5 12V7H0.5C0.367392 7 0.240215 6.94732 0.146447 6.85355C0.0526785 6.75979 0 6.63261 0 6.5C0 6.36739 0.0526785 6.24021 0.146447 6.14645C0.240215 6.05268 0.367392 6 0.5 6H5.5V1C5.5 0.867392 5.55268 0.740215 5.64645 0.646447C5.74021 0.552679 5.86739 0.5 6 0.5C6.13261 0.5 6.25979 0.552679 6.35355 0.646447C6.44732 0.740215 6.5 0.867392 6.5 1V6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5Z" fill="#1C1C1C"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                </span>
                <span class="basis-[160px] flex items-center justify-center">
                    <span class="bg-emerald-100 px-3 text-emerald-500 py-1 rounded font-semibold text-xs">Approuvé</span>
                </span>
                <span class="basis-[215px] flex items-center justify-center gap-3 box-border">
                    <form action="" class="m-0">
                        <button class="font-medium btn-2 bg-[#4C535F] text-white text-xs">Rembourser</button>
                    </form>
                    {{-- separator --}}
                    <div class=" w-0.5 h-5 bg-zinc-200"></div>
                    <form action="" method="" class="m-0">
                        <button class="">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 7C13 10.3137 10.3137 13 7 13C3.68629 13 1 10.3137 1 7C1 3.68629 3.68629 1 7 1C8.53671 1 9.93849 1.57771 11 2.52779M11.6667 1V3C11.6667 3.36819 11.3682 3.66667 11 3.66667H9" stroke="#4C535F" stroke-width="2" stroke-linecap="round"/>
                            </svg>                            
                        </button>
                    </form>
                </span>
            </div>
      
        </div>              

        {{-- t-foot --}}
        <div class="h-20 text-sm font-semibold flex items-center justify-between">
            <div class="flex gap-2 items-center">
                <span class="text-zinc-400">TOTAL:</span>
                <span class="text-red-500 font-bold bg-red-100 btn-2 ml-4">8 Heures</span>
                {{-- separator --}}
                <div class=" w-0.5 h-5 bg-zinc-200"></div>
                <span class="text-red-500 font-bold bg-red-100 btn-2">10 Tickets</span>
            </div>

            <form class="text-zinc-600 m-0">
                <button class="btn-1 bg-zinc-800 text-white font-medium">
                    Rembourser
                </button>
            </form>
        </div>
    </div>
</div>





{{-- pagination --}}
<div class="flex p-4 items-center justify-between text-zinc-800 font-medium mt-2">
    <div class="font-medium text-zinc-400">
        page 1 / 10
    </div>

    <div class="flex items-center gap-1 *:w-9 *:h-9">
        <a href="" class="icon-hover-2">
            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 1L1.70711 6.29289C1.31658 6.68342 1.31658 7.31658 1.70711 7.70711L7 13" stroke="#27272a" stroke-width="2" stroke-linecap="round"/>
            </svg>                                
        </a>
        <a href="" class="icon-hover-2 rounded-lg bg-zinc-200">1</a>
        <a href="" class="icon-hover-2">2</a>
        <a href="" class="icon-hover-2">3</a>
        <a href="" class="icon-hover-2">4</a>
        <a href="" class="icon-hover-2">5</a>
        <a href="" class="icon-hover-2">
            <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L6.29289 6.29289C6.68342 6.68342 6.68342 7.31658 6.29289 7.70711L1 13" stroke="#27272a" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </a>
    </div>
</div>
</section>
@endsection
