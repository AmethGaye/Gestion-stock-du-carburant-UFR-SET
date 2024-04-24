@extends('users.departement.cours')

@section('cours')

<div class="px-4 py-3 bg-white rounded-md border border-zinc-200 flex items-center justify-between mb-6">
    {{-- barre de recherche --}}
    <form action="{{route('shearch.cours')}}" method="post" class="flex items-center p-0 m-0">
        @csrf
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
            <div class="absolute -left-32 top-11 w-[360px] rounded-lg bg-white z-40 border tracking-wide hidden p-4" id="filters-container">
                <div class="flex items-center flex-wrap gap-2 pb-4 border-b">
                    <div class="py-1.5 px-2">
                        <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 0C0.734784 0 0.48043 0.105357 0.292893 0.292893C0.105357 0.48043 0 0.734784 0 1C0 1.26522 0.105357 1.51957 0.292893 1.70711C0.48043 1.89464 0.734784 2 1 2H12C12.2652 2 12.5196 1.89464 12.7071 1.70711C12.8946 1.51957 13 1.26522 13 1C13 0.734784 12.8946 0.48043 12.7071 0.292893C12.5196 0.105357 12.2652 0 12 0H1ZM1 4C0.734784 4 0.48043 4.10536 0.292893 4.29289C0.105357 4.48043 0 4.73478 0 5C0 5.26522 0.105357 5.51957 0.292893 5.70711C0.48043 5.89464 0.734784 6 1 6H6C6.26522 6 6.51957 5.89464 6.70711 5.70711C6.89464 5.51957 7 5.26522 7 5C7 4.73478 6.89464 4.48043 6.70711 4.29289C6.51957 4.10536 6.26522 4 6 4H1ZM1 8C0.734784 8 0.48043 8.10536 0.292893 8.29289C0.105357 8.48043 0 8.73478 0 9C0 9.26522 0.105357 9.51957 0.292893 9.70711C0.48043 9.89464 0.734784 10 1 10H5C5.26522 10 5.51957 9.89464 5.70711 9.70711C5.89464 9.51957 6 9.26522 6 9C6 8.73478 5.89464 8.48043 5.70711 8.29289C5.51957 8.10536 5.26522 8 5 8H1ZM11 13C11 13.2652 11.1054 13.5196 11.2929 13.7071C11.4804 13.8946 11.7348 14 12 14C12.2652 14 12.5196 13.8946 12.7071 13.7071C12.8946 13.5196 13 13.2652 13 13V7.414L14.293 8.707C14.4816 8.88916 14.7342 8.98995 14.9964 8.98767C15.2586 8.9854 15.5094 8.88023 15.6948 8.69482C15.8802 8.50941 15.9854 8.2586 15.9877 7.9964C15.99 7.7342 15.8892 7.4816 15.707 7.293L12.707 4.293C12.5195 4.10553 12.2652 4.00021 12 4.00021C11.7348 4.00021 11.4805 4.10553 11.293 4.293L8.293 7.293C8.19749 7.38525 8.12131 7.49559 8.0689 7.6176C8.01649 7.7396 7.9889 7.87082 7.98775 8.0036C7.9866 8.13638 8.0119 8.26806 8.06218 8.39095C8.11246 8.51385 8.18671 8.6255 8.28061 8.71939C8.3745 8.81329 8.48615 8.88754 8.60905 8.93782C8.73194 8.9881 8.86362 9.0134 8.9964 9.01225C9.12918 9.0111 9.2604 8.98351 9.3824 8.9311C9.50441 8.87869 9.61475 8.80251 9.707 8.707L11 7.414V13Z" fill="#52525b"/>
                        </svg>
                    </div>
                    <div class="py-1.5 px-4 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addOrderBy(this, 'prenom')">Prénom</div>
                    <div class="py-1.5 px-4 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addOrderBy(this, 'nom')">Nom</div>
                    <div class="py-1.5 px-4 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addOrderBy(this, 'provenance')">Provenance</div>
                </div>
                <div class="flex flex-wrap gap-2 pb-4 border-b mt-4">
                    <div class="py-1.5 px-4 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addFilter(this, 'situation', 0)">Non Véhiculé</div>
                    <div class="py-1.5 px-4 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addFilter(this, 'situation', 1)">Véhiculé</div>
                    <div class="py-1.5 px-4 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addFilter(this, 'demande', 1)">Approuvé</div>
                    <div class="py-1.5 px-4 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addFilter(this, 'demande', 0)">Non Approuvé</div>
                </div>
                <div class="flex items-center justify-end gap-2 mt-4">
                    <form action="{{route('cours.all.filtre')}}" method="get" class="m-0" id="sub-filters" >
                        @csrf
                        <button type="submit" class="btn-1 bg-zinc-800 text-white">Valider</button>
                    </form>
                    <form action="" method="" class="m-0 " id="sub-filters" >
                        @csrf
                        <button type="submit" class="btn-1 bg-zinc-100 text-zinc-800">restaurer</button>
                    </form>
                </div>
            </div>        
        </div>

        <form action="{{route('cours.all.filtre.month')}}"  method="get" class="bg-zinc-100 text-zinc-600 border relative min-w-[130px] h-[34px] rounded-md tracking-wide text-sm m-0">
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
                    <a href="{{ route('cours.all') }}">Restaurer</a>
                </div>
            </div>
        </form>

        <button  type="menu" class="btn-1 bg-zinc-800 border border-zinc-800 text-white" onclick="displayContainer(`/departement/cours`)">
            <svg width="11" height="11" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="">
                <path d="M6.5 1.30493V12.3049M12 6.80493L1 6.80493" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
            Cours
        </button>
    </div>
</div>

<div class="">
    {{-- t-head --}}
    <div class="flex items-center text-sm text-zinc-400 font-nunito font-bold py-4 px-4">
        {{-- cols --}}
        <span class="pr-4">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox"
                class="cursor-pointer">
            <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z"
                    fill="#1C1C1C" fill-opacity="0.2"/>
        </svg>
    </span>
        <span class="basis-[23%] grow pr-4">VACATAIRE</span>
        <span class="basis-[22%] grow pr-4">EMAIL</span>
        <span class="basis-[160px] pr-4 ">TOTAL</span>
        <span class="basis-[160px] pr-4">PROVENANCE</span>
        <span class="basis-[170px] text-center">SITUATION</span>
        <span class="basis-[170px] text-center">ACTION</span>
    </div>

    {{-- t-body --}}



    {{-- row 1 --}}
    @foreach($vacataires_sceances as $sceance_cour)
        @php
            $total_duree=0;    
        @endphp
        @if($sceance_cour->status && $sceance_cour->cours->count() > 0)
        <div class="text-sm h-20 overflow-hidden font-medium border border-zinc-200 rounded-md px-4 bg-white mb-4 relative transition-[height] duration-150" id="super-contain">

            {{-- resume --}}
            <div class="min-h-20 flex items-center border-b border-zinc-200 mb-4">
                {{-- cols --}}
                <span class="pr-4">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
                    </svg>
                </span>
                <span class="basis-[23%] grow pr-4">{{$sceance_cour->prenom." ".$sceance_cour->nom}}</span>
                <span class="basis-[22%] grow pr-4">{{$sceance_cour->email}}</span>

                {{--calcul du total d'heure effectuer  par le vacataire--}}
                @php
                    $total=0;
                    foreach ($sceance_cour->cours as $cour)
                        {
                        $total +=  $cour->duree;
                        }
                @endphp
                {{--calcul du total d'heure effectuer  par le vacataire--}}
                <span class="basis-[160px] font-bold pr-4">{{$total}} Heures</span>
                <span class="basis-[160px] pr-4">{{$sceance_cour->provenance}}</span>
                <span class="basis-[170px] flex justify-center">
                    <span class="flex mx-auto @if($sceance_cour->situation) bg-blue-100 text-blue-500 @else bg-fuchsia-100 text-fuchsia-500 @endif px-4 py-1 rounded font-semibold text-xs">
                        @if($sceance_cour->situation) Véhiculé @else Non @endif
                    </span>
                </span>

                <span class="basis-[170px] relative flex items-center justify-center gap-4">
                    <form action="{{ route('dep.remboursement') }}" method="post" class="m-0">
                        @csrf
                        @php $cour_vide=[] @endphp
                        @foreach($sceance_cour->cours as $cours)
                            @if ($cours->statut && $cours->demande == 0)
                                <input type="hidden" name="cours_id[]" value="{{$cours->id}}">
                                @php $cour_vide=$cours->id @endphp
                            @endif

                        @endforeach
                        <button class="px-4 py-1 rounded bg-[#00B69B] text-white font-mtrph" @if(empty($cour_vide)) disabled @endif >envoyer</button>
                    </form>
                    {{-- separator --}}
                    <div class=" w-0.5 h-6 bg-zinc-200"></div>

                    {{--  --}}
                    <div class="transition-all duration-300 w-8 h-8 flex items-center justify-center mr-2 icon-hover"
                        id="ch-container">
                        <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="transition-transform rotate-0" id="chevron">
                            <path d="M13.5 1.5L8.20711 6.79289C7.81658 7.18342 7.18342 7.18342 6.79289 6.79289L1.5 1.5"
                                stroke="#9FA6B2" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                </span>
            </div>

            {{-- detail --}}
            <div class="mx-4">
                {{-- t-head --}}
                <div class="flex items-center text-sm text-zinc-800 font-nunito font-bold h-12  bg-[#F1F4F9] rounded">
                    {{-- cols --}}
                    <span class="px-4">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
                        </svg>
                    </span>
                    <span class="pr-4 basis-[23%] grow">Matière</span>
                    <span class="pr-4 basis-[15%] grow">Semestre</span>
                    <span class="pr-4 basis-[22%] grow">Filière</span>
                    <span class="pr-4 basis-[14%] grow">Date</span>
                    <span class="pr-4 basis-[150px]">Durée</span>
                    <span class="basis-[170px] text-center">Statut</span>
                    <span class="basis-[130px] text-center">Action</span>
                </div>

                {{-- t-body --}}
                {{-- rows --}}
                <div class="max-h-44 overflow-y-scroll">
                    {{-- row 1 --}}
                    @foreach($sceance_cour->cours as $cours)
                    @php
                    $flag = false;  
                    foreach($cours->matiere->filieres as $filiere){
                        if($filiere->departement->id == auth()->user()->departement->id){
                            $flag = true;
                        }
                    }     
                    @endphp
                    @if($cours->demande==0 && $flag)
                    <div class="flex items-center text-sm py-3 border-b min-h-14">
                        {{-- cols --}}
                        <span class="px-4">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
                            </svg>
                        </span>
                        <span class="basis-[23%] grow pr-4">{{$cours->matiere->nom}}</span>
                        <span class="basis-[15%] grow pr-4">semestre {{$cours->matiere->semestre}}</span>
                        @php
                            $nom_filiere = "inconnu";
                            // dd($cours->matiere->filieres);
                            foreach($cours->matiere->filieres as $filiere){
                                if($filiere->departement->id == auth()->user()->departement->id){
                                    $nom_filiere = $filiere->nom; 
                                }
                            }
                        @endphp
                        <span class="basis-[22%] grow pr-4">{{$nom_filiere}}</span>
                        <span class="basis-[14%] grow pr-4">{{date('d-m-Y', strtotime($cours->date))}}</span>
                        <span class="basis-[150px] font-semibold pr-4">{{$cours->duree}} Heure</span>
                        <span class="basis-[170px] flex justify-center text-xs">
                            <span class="flex mx-auto px-4 @if($cours->statut) bg-emerald-100  text-emerald-500 @else text-amber-500 bg-amber-100 @endif py-1 rounded font-semibold">
                                @if($cours->statut) Approuvé @else Non @endif
                            </span>
                        </span>
                        <span class="flex basis-[130px] justify-center">
                            <div class="border border-zinc-200 rounded-l-lg bg-zinc-100 m-0">
                                <button class="px-3 py-1.5" onclick="displayContainer(`/departement/cours/all/update/`+{{ $cours->id }}, true, {{ json_encode($cours) }} ) ">
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.16755 2.78381H2.76216C2.2948 2.78381 1.84659 2.96947 1.51612 3.29994C1.18566 3.63041 1 4.07862 1 4.54597V14.2378C1 14.7052 1.18566 15.1534 1.51612 15.4839C1.84659 15.8143 2.2948 16 2.76216 16H12.454C12.9214 16 13.3696 15.8143 13.7001 15.4839C14.0305 15.1534 14.2162 14.7052 14.2162 14.2378V9.83245M12.9703 1.53797C13.1329 1.36966 13.3273 1.23542 13.5423 1.14306C13.7573 1.05071 13.9886 1.0021 14.2225 1.00007C14.4565 0.998033 14.6885 1.04262 14.9051 1.13122C15.1217 1.21982 15.3184 1.35067 15.4839 1.51612C15.6493 1.68158 15.7802 1.87833 15.8688 2.09489C15.9574 2.31145 16.002 2.54349 15.9999 2.77747C15.9979 3.01145 15.9493 3.24268 15.8569 3.45767C15.7646 3.67266 15.6303 3.8671 15.462 4.02966L7.89709 11.5946H5.4054V9.10291L12.9703 1.53797Z"
                                            stroke="#737373" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                            <form action="{{route('cours.delete',$cours->id)}}" method="post" class="border border-zinc-200 rounded-r-lg bg-zinc-100 m-0" id="delSubmit">
                                @csrf
                                @method('delete')
                                <button class="px-3 py-1.5">
                                    <svg width="15" height="17" viewBox="0 0 15 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.875 7.66667V12.6667M9.125 7.66667V12.6667M1 4.33333H14M13.1875 4.33333L12.4831 14.4517C12.4539 14.8722 12.2704 15.2657 11.9697 15.553C11.6689 15.8403 11.2731 16 10.8621 16H4.13787C3.72686 16 3.33112 15.8403 3.03034 15.553C2.72957 15.2657 2.54612 14.8722 2.51694 14.4517L1.8125 4.33333H13.1875ZM9.9375 4.33333V1.83333C9.9375 1.61232 9.8519 1.40036 9.69952 1.24408C9.54715 1.0878 9.34049 1 9.125 1H5.875C5.65951 1 5.45285 1.0878 5.30048 1.24408C5.1481 1.40036 5.0625 1.61232 5.0625 1.83333V4.33333H9.9375Z"
                                            stroke="#F87171" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </form>
                        </span>
                    </div>
                    @php
                        $total_duree += $cours->duree;
                    @endphp
                        @endif
                    @endforeach
                </div>

                {{-- t-foot --}}
                <div class="h-20 flex items-center justify-between">
                    <div class="flex gap-2 items-center">
                        <span class="text-zinc-400 font-semibold">Total :</span>
                        <span class="text-zinc-500 font-medium bg-zinc-100 px-3 py-1.5 rounded">{{$total_duree}} Heures</span>
                    </div>

                    <div class="">
                        <button class="flex items-center px-4 py-1.5 gap-2 roundedborder bg-[#4C535F] text-white font-mtrph rounded">
                            <svg width="11" height="11" viewBox="0 0 13 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="mr-0.5">
                                <path d="M6.5 1.5V12.5M12 7L1 7" stroke="#ffffff" stroke-width="2"
                                        stroke-linecap="round"/>
                            </svg>
                            Cours
                        </button>
                    </div>
                </div>
            </div>

        </div>
        @endif
    @endforeach


</div>
@endsection

