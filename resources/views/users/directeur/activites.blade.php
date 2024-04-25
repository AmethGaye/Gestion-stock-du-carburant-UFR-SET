@extends('base')

@section('section')
<section class="px-6 min-h-screen h-screen ">

    <div class="px-4 py-3 bg-white rounded-lg shadow_2 flex items-center justify-between mb-6">
        {{-- barre de recherche --}}
        <form action="{{route('search.activite')}}" method="get" class="flex items-center p-0 m-0">
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

            <div class="flex items-center gap-2 ">
                <div class="bg-zinc-100 text-zinc-600 border relative min-w-[118px] h-[34px] rounded-md text-sm">
                    <span class="absolute top-1/2 left-3 -translate-y-1/2">
                        <svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.75 4.17999H3.75C3.58424 4.17999 3.42527 4.24584 3.30806 4.36305C3.19085 4.48026 3.125 4.63923 3.125 4.80499C3.125 4.97075 3.19085 5.12972 3.30806 5.24693C3.42527 5.36415 3.58424 5.42999 3.75 5.42999H13.75C13.9158 5.42999 14.0747 5.36415 14.1919 5.24693C14.3092 5.12972 14.375 4.97075 14.375 4.80499C14.375 4.63923 14.3092 4.48026 14.1919 4.36305C14.0747 4.24584 13.9158 4.17999 13.75 4.17999Z" fill="#52525B"/>
                            <path d="M16.875 0.429993H0.625C0.45924 0.429993 0.300268 0.495841 0.183058 0.613051C0.065848 0.730261 0 0.889232 0 1.05499C0 1.22075 0.065848 1.37972 0.183058 1.49693C0.300268 1.61414 0.45924 1.67999 0.625 1.67999H16.875C17.0408 1.67999 17.1997 1.61414 17.3169 1.49693C17.4342 1.37972 17.5 1.22075 17.5 1.05499C17.5 0.889232 17.4342 0.730261 17.3169 0.613051C17.1997 0.495841 17.0408 0.429993 16.875 0.429993Z" fill="#52525B"/>
                            <path d="M10.625 7.92999H6.875C6.70924 7.92999 6.55027 7.99584 6.43306 8.11305C6.31585 8.23026 6.25 8.38923 6.25 8.55499C6.25 8.72075 6.31585 8.87972 6.43306 8.99693C6.55027 9.11415 6.70924 9.17999 6.875 9.17999H10.625C10.7908 9.17999 10.9497 9.11415 11.0669 8.99693C11.1842 8.87972 11.25 8.72075 11.25 8.55499C11.25 8.38923 11.1842 8.23026 11.0669 8.11305C10.9497 7.99584 10.7908 7.92999 10.625 7.92999Z" fill="#52525B"/>
                        </svg>
                    </span>
                    <div class="font-medium outline-none border-none cursor-pointer absolute left-0 top-0 w-full h-full bg-transparent pl-10 pr-4 flex items-center" onclick="showFiltersContainer()">Filtres</div>
                    <span class="absolute top-1/2 right-3 -translate-y-1/2 transition-transform" id="chevron-2">
                        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.933058 0.879586C1.17714 0.613462 1.57286 0.613462 1.81694 0.879586L5.93306 5.36749C6.17714 5.63362 6.57286 5.63362 6.81694 5.36749L10.9331 0.879587C11.1771 0.613463 11.5729 0.613463 11.8169 0.879587C12.061 1.14571 12.061 1.57718 11.8169 1.84331L7.70082 6.33121C6.96859 7.12959 5.78141 7.12959 5.04918 6.33121L0.933058 1.84331C0.688981 1.57718 0.688981 1.14571 0.933058 0.879586Z" fill="#52525B"/>
                        </svg>
                    </span>
                    <div class="absolute -left-32 top-11  w-[360px] rounded-lg bg-white z-40 border tracking-wide hidden p-4" id="filters-container">
                        <div class="flex items-center flex-wrap gap-2 pb-4 border-b">
                            <div class="py-1.5 px-2 bg-zinc-100 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" color="#52525b" fill="none">
                                    <path d="M4 14H8.42109C9.35119 14 9.81624 14 9.94012 14.2801C10.064 14.5603 9.74755 14.8963 9.11466 15.5684L5.47691 19.4316C4.84402 20.1037 4.52757 20.4397 4.65145 20.7199C4.77533 21 5.24038 21 6.17048 21H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4 9L6.10557 4.30527C6.49585 3.43509 6.69098 3 7 3C7.30902 3 7.50415 3.43509 7.89443 4.30527L10 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M17.5 20V4M17.5 20C16.7998 20 15.4915 18.0057 15 17.5M17.5 20C18.2002 20 19.5085 18.0057 20 17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addOrderBy(this, 'titre')">Titre</div>
                            <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addOrderBy(this, 'lieux')">Lieux</div>
                            <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addOrderBy(this, 'adresse')">Adresse</div>
                            <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addOrderBy(this, 'ticket_demande')">Ticket</div>
                        </div>
                        <div class="flex flex-wrap gap-2 pb-4 border-b mt-4">
                            <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addFilter(this, 'statut', 0)">Non Validé</div>
                            <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addFilter(this, 'statut', 1)">Validé</div>
                            
                        </div>
                        <div class="flex items-center justify-end gap-2 mt-4">
                            <form action="{{route('filtre.activites')}}" method="get" class="m-0" id="sub-filters" >
                            
                                <button type="submit" class="btn-1 bg-zinc-800 text-white">Valider</button>
                            </form>
                            <form action="" method="" class="m-0 " id="sub-filters" >
                                @csrf
                                <button type="submit" class="btn-1 bg-zinc-100 text-zinc-800">restaurer</button>
                            </form>
                        </div>
                    </div>        
                </div>
    
                
    
                <form action="{{route('activite_filtre_by_month')}}"  method="get" class="bg-zinc-100 text-zinc-600 border relative min-w-[130px] h-[34px] rounded-md tracking-wide text-sm m-0">
                    
                    <input type="text" value="" readonly class="font-medium outline-none border-none cursor-pointer absolute left-0 top-0 w-full h-full bg-transparent px-4" onclick="showOptionContainer(this)" id="opt-choosen">
                    <input type="hidden" name="month" value="">
                    <span class="absolute top-1/2 right-3 -translate-y-1/2 transition-transform" id="chevron">
                        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.933058 0.879586C1.17714 0.613462 1.57286 0.613462 1.81694 0.879586L5.93306 5.36749C6.17714 5.63362 6.57286 5.63362 6.81694 5.36749L10.9331 0.879587C11.1771 0.613463 11.5729 0.613463 11.8169 0.879587C12.061 1.14571 12.061 1.57718 11.8169 1.84331L7.70082 6.33121C6.96859 7.12959 5.78141 7.12959 5.04918 6.33121L0.933058 1.84331C0.688981 1.57718 0.688981 1.14571 0.933058 0.879586Z" fill="#52525B"/>
                        </svg>
                    </span>
                    <div class="absolute -left-6 top-10 w-44 rounded-lg bg-white z-40 border tracking-wide py-2 hidden" id="options-container">
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('1', 'Janvier')">Janvier</div>
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('2', 'Février')">Février</div>
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('3', 'Mars')">Mars</div>
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('4', 'Avril')">Avril</div>
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('5', 'Mai')">Mai</div>
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('6', 'Juin')">Juin</div>
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('7', 'Juillet')">Juillet</div>
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('8', 'Aout')">Aout</div>
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('9', 'Septembre')">Septembre</div>
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('10', 'Octobre')">Octobre</div>
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('11', 'Novembre')">Novembre</div>
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('12', 'Décembre')">Décembre</div>
                        <div class="py-2 mt-2 border-t px-5 font-medium text-orange-400 hover:bg-zinc-100 cursor-pointer">
                            <a href="{{ route('directeur.activites.index') }}">Restaurer</a>
                        </div>
                    </div>
                </form>
            </div>

            <button  type="menu" class="btn-1 border border-zinc-800 bg-zinc-800 text-white" onclick="displayContainer(`/directeur/activites`)">
                <svg width="11" height="11" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="">
                    <path d="M6.5 1.30493V12.3049M12 6.80493L1 6.80493" stroke="white" stroke-width="2" stroke-linecap="round"/>
                </svg>
                Activité
            </button>
        </div>
    </div>

{{--    les message flash : type -> success --}}
    <div class="text-green-500" id="success"></div>

    {{-- activites --}}
    {{-- row 1 --}}
    @foreach($activities as $activitie)
    <div class="bg-white mb-6 rounded-2xl shadow_2 px-6 overflow-y-hidden h-20 transition-[height]" id="act-container">
        <div class="flex items-center justify-between text-sm text-zinc-500 font-medium h-20">
            <div class="">
                <div class="flex items-center gap-4 mb-2.5">
                    <h2 class="text-[15px] font-semibold text-zinc-600 capitalize">{{ $activitie->titre }}</h2>
                    <span class="flex justify-center items-center">
                        @if($activitie->statut)
                            <span class="flex items-center bg-[#E2FBD7] px-4 text-[#34B53A] py-1.5 rounded-md font-semibold text-xs">Validé</span>
                        @else
                            <span class="w-4 h-1 rounded-full bg-amber-500">
                            </span>
                        @endif
                    </span>
                </div>
                <div class="flex items-center gap-2">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path d="M4.33333 3.66667V1M9.66667 3.66667V1M3.66667 6.33333H10.3333M2.33333 13H11.6667C12.0203 13 12.3594 12.8595 12.6095 12.6095C12.8595 12.3594 13 12.0203 13 11.6667V3.66667C13 3.31304 12.8595 2.97391 12.6095 2.72386C12.3594 2.47381 12.0203 2.33333 11.6667 2.33333H2.33333C1.97971 2.33333 1.64057 2.47381 1.39052 2.72386C1.14048 2.97391 1 3.31304 1 3.66667V11.6667C1 12.0203 1.14048 12.3594 1.39052 12.6095C1.64057 12.8595 1.97971 13 2.33333 13Z" stroke="#6F727A" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    {{$activitie->date}}
                    <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.9375 5.13068C2.53646 5.13068 2.17022 5.03291 1.83878 4.83736C1.50734 4.63849 1.24219 4.37334 1.04332 4.0419C0.847775 3.71046 0.75 3.34422 0.75 2.94318C0.75 2.53883 0.847775 2.17259 1.04332 1.84446C1.24219 1.51302 1.50734 1.24953 1.83878 1.05398C2.17022 0.855113 2.53646 0.755682 2.9375 0.755682C3.34186 0.755682 3.7081 0.855113 4.03622 1.05398C4.36766 1.24953 4.63116 1.51302 4.8267 1.84446C5.02557 2.17259 5.125 2.53883 5.125 2.94318C5.125 3.34422 5.02557 3.71046 4.8267 4.0419C4.63116 4.37334 4.36766 4.63849 4.03622 4.83736C3.7081 5.03291 3.34186 5.13068 2.9375 5.13068Z" fill="#6F727A"/>
                    </svg>
                    Adresse : <span class="font-bold">{{$activitie->adresse}}</span>
                    <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.9375 5.13068C2.53646 5.13068 2.17022 5.03291 1.83878 4.83736C1.50734 4.63849 1.24219 4.37334 1.04332 4.0419C0.847775 3.71046 0.75 3.34422 0.75 2.94318C0.75 2.53883 0.847775 2.17259 1.04332 1.84446C1.24219 1.51302 1.50734 1.24953 1.83878 1.05398C2.17022 0.855113 2.53646 0.755682 2.9375 0.755682C3.34186 0.755682 3.7081 0.855113 4.03622 1.05398C4.36766 1.24953 4.63116 1.51302 4.8267 1.84446C5.02557 2.17259 5.125 2.53883 5.125 2.94318C5.125 3.34422 5.02557 3.71046 4.8267 4.0419C4.63116 4.37334 4.36766 4.63849 4.03622 4.83736C3.7081 5.03291 3.34186 5.13068 2.9375 5.13068Z" fill="#6F727A"/>
                    </svg>
                    Région : <span class="font-bold">{{$activitie->lieux}}</span>
                    <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.9375 5.13068C2.53646 5.13068 2.17022 5.03291 1.83878 4.83736C1.50734 4.63849 1.24219 4.37334 1.04332 4.0419C0.847775 3.71046 0.75 3.34422 0.75 2.94318C0.75 2.53883 0.847775 2.17259 1.04332 1.84446C1.24219 1.51302 1.50734 1.24953 1.83878 1.05398C2.17022 0.855113 2.53646 0.755682 2.9375 0.755682C3.34186 0.755682 3.7081 0.855113 4.03622 1.05398C4.36766 1.24953 4.63116 1.51302 4.8267 1.84446C5.02557 2.17259 5.125 2.53883 5.125 2.94318C5.125 3.34422 5.02557 3.71046 4.8267 4.0419C4.63116 4.37334 4.36766 4.63849 4.03622 4.83736C3.7081 5.03291 3.34186 5.13068 2.9375 5.13068Z" fill="#6F727A"/>
                    </svg>
                    Distance : <span class="font-bold">76km</span>
                </div>
            </div>
            <div class="flex items-center font-mtrph text-zinc-600 gap-3">
                <button  onclick="displayContainer('/directeur/activites/update/'+{{ $activitie->id }}, true, {{ json_encode($activitie) }})"
                    class="text-sm font-semibold @if($activitie->statut) text-zinc-400 @endif "  @if($activitie->statut) @disabled(true) @endif >
                    Editer
                </button>
                {{-- separator --}}
                <div class=" w-0.5 h-[20px] bg-zinc-200"></div>
                <form action="{{route('d.activites.delete', $activitie->id)}}" method="post" class="m-0" id="delSubmit">
                    @csrf
                    @method('delete')
                    <button class="font-mtrph font-semibold text-sm text-[#FFB200] ">Supprimer</button>
                </form>

                {{-- separator --}}
                <div class=" w-0.5 h-[20px] bg-zinc-200"></div>

                <span class="icon-hover cursor-pointer" id="plus">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" color="#9FA6B2" fill="none">
                        <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" color="#9FA6B2" fill="none" class="hidden">
                        <path d="M20 12L4 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </div>
        </div>
        <div class="border-t border-t-zinc-200 py-4" id="desc">
            <h3 class="text-[15px] font-semibold text-zinc-600">Description </h3>

            <p class="mt-2 text-sm">
                {{$activitie->description}}
            </p>
            <div class="flex py-2 justify-end">
                <div class="flex items-center">
                    <span class="font-medium text-sm mr-4">Demande:</span>
                    <span class="flex justify-center">
                        <span class="flex items-center bg-orange-100 px-4 text-orange-500 py-1.5 rounded
                        font-semibold text-sm font-inter">{{$activitie->ticket_demande}} Tickets</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="flex justify-end mt-8">
        <a href="" class="btn bg-zinc-800 text-white font-medium trans hover:bg-[#27272ae6]">Voir plus</a>
    </div>
</section>
@endsection

{{-- FORMULAIRE D'AJOUT D'UNe ACTIVITE --}}
@section('new-activity')
<div class="bg-white border border-zinc-200 rounded-lg px-8 py-6 w-8/12 scale-75 opacity-0 trans-2 font-mtrph">
    <div class="flex items-center justify-between">
        <h1 class="font-semibold text-lg text-zinc-800">Nouvelle Activité</h1>
        <div class="icon-hover-2 cursor-pointer" id="closer" >
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 1L1 13M13 13L1 1.00001" stroke="#111111" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
    </div>
    <form action="{{route('directeur.activites.store')}}" method="post" class="m-0 mt-6" id="subscription">
        @csrf

        <div class="mb-10 ">
            <div class="w-full flex flex-col relative mb-3">
                <label for="titre" class="text-zinc-800 font-medium">Titre</label>
                <input type="text" name="titre" id="titre" class="input-2" placeholder="Sortie Pédagogique">
                {{-- erreur gerée en js --}}
                <div class="text-sm text-red-600 font-medium mt-2">
                </div>
            </div>

            <div class="w-full flex gap-4">
                <div class="w-full flex flex-col relative mb-3">
                    <label for="ticket" class="text-zinc-800 font-medium">Tickets sollicités</label>
                    <div class="w-full relative ">
                        <input type="number" name="ticket_demande" id="ticket_demande" value="2" class="input-2 w-full">
                        {{-- erreur gerée en js --}}
                        <div class="text-sm text-red-600 font-medium mt-2">
                        </div>
                        <div class="absolute right-2 top-7 -translate-y-1/2 flex">
                            <button type="button" class="w-8 h-8 mr-1  bg-zinc-100 hover:bg-zinc-200 flex items-center justify-center rounded-md" onclick="decrementer(this)">
                                <svg width="12" height="3" viewBox="0 0 12 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 1.4999C12 1.65903 11.9473 1.81165 11.8536 1.92417C11.7598 2.03669 11.6326 2.0999 11.5 2.0999H0.5C0.367392 2.0999 0.240215 2.03669 0.146447 1.92417C0.0526785 1.81165 0 1.65903 0 1.4999C0 1.34077 0.0526785 1.18816 0.146447 1.07564C0.240215 0.963117 0.367392 0.899902 0.5 0.899902H11.5C11.6326 0.899902 11.7598 0.963117 11.8536 1.07564C11.9473 1.18816 12 1.34077 12 1.4999Z" fill="#1C1C1C"/>
                                </svg>
                            </button>
                            <button type="button" class="w-8 h-8 bg-zinc-100 hover:bg-zinc-200 flex items-center justify-center rounded-md" onclick="incrementer(this)">
                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 6.5C12 6.63261 11.9473 6.75979 11.8536 6.85355C11.7598 6.94732 11.6326 7 11.5 7H6.5V12C6.5 12.1326 6.44732 12.2598 6.35355 12.3536C6.25979 12.4473 6.13261 12.5 6 12.5C5.86739 12.5 5.74021 12.4473 5.64645 12.3536C5.55268 12.2598 5.5 12.1326 5.5 12V7H0.5C0.367392 7 0.240215 6.94732 0.146447 6.85355C0.0526785 6.75979 0 6.63261 0 6.5C0 6.36739 0.0526785 6.24021 0.146447 6.14645C0.240215 6.05268 0.367392 6 0.5 6H5.5V1C5.5 0.867392 5.55268 0.740215 5.64645 0.646447C5.74021 0.552679 5.86739 0.5 6 0.5C6.13261 0.5 6.25979 0.552679 6.35355 0.646447C6.44732 0.740215 6.5 0.867392 6.5 1V6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5Z" fill="#1C1C1C"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="w-full  flex flex-col mb-3">
                    <label for="region" class="font-medium text-zinc-800">Région</label>
                    <select name="lieux" id="lieux" class="input-2">
                        <option value="Dakar">Dakar</option>
                        <option value="Thies">Thies</option>
                        <option value="Kaolack">Kaolack</option>
                        <option value="Saint-louis">Saint-louis</option>
                        <option value="Diourbel">Diourbel</option>
                        <option value="Louga">Louga</option>
                        <option value="tambacounda">Tambacounda</option>
                        <option value="Kedougou">Kedougou</option>
                        <option value="Kolda">Kolda</option>
                        <option value="Sedhiou">Sedhiou</option>
                        <option value="Ziguinchor">Ziguinchor</option>
                        <option value="Matam">Matam</option>
                        <option value="Fatick">Fatick</option>
                        <option value="Kaffrine">Kaffrine</option>
                    </select>
                    {{-- erreur gerée en js --}}
                    <div class="text-sm text-red-600 font-medium mt-2">
                    </div>
                </div>
            </div>

            <div class="w-full flex gap-4">
                <div class="w-full flex flex-col relative mb-3">
                    <label for="adresse" class="text-zinc-800 font-medium">Adresse</label>
                    <input type="text" name="adresse" id="adresse" class="input-2" placeholder="">
                    {{-- erreur gerée en js --}}
                    <div class="text-sm text-red-600 font-medium mt-2">
                    </div>
                </div>

                <div class="w-full  flex flex-col mb-3">
                    <label for="date" class="font-medium text-zinc-700">Date</label>
                    <input type="date" name="date" id="date" class="input-2">
                    {{-- erreur gerée en js --}}
                    <div class="text-sm text-red-600 font-medium mt-2">
                    </div>
                </div>

            </div>

            <div class="w-full flex flex-col">
                <label></label>
                <textarea name="description" id="description" rows="5" placeholder="Décrivez .... " class="input-2 w-full"></textarea>
                {{-- erreur gerée en js --}}
                <div class="text-sm text-red-600 font-medium mt-2">
                </div>
            </div>

        </div>
        <div class="flex gap-4 items-center">
            <button type="submit" id="submit" class="px-6 py-2.5 rounded-lg bg-zinc-800 text-white flex justify-center items-center gap-2">
                Ajouter
            </button>
            <button type="reset" class="px-6 py-2.5 rounded-lg bg-zinc-200 text-zinc-800 flex justify-center items-center gap-2">
                Restaurer
            </button>
        </div>
    </form>
</div>
@endsection
