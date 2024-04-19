@extends('users.departement.cours')

@section('cours')

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
                    <form action="{{route('cours.approbation.filtre')}}" method="get" class="m-0" id="sub-filters" >
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

        <form action=""  method="" class="bg-zinc-100 text-zinc-600 border relative min-w-[130px] h-[34px] rounded-md tracking-wide text-sm m-0">
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
    @if ($errors->has('msg'))
        <div class="text-red-600">
            {{ $errors->first('msg') }}
        </div>
    @endif
    {{-- t-head --}}
    <div class="flex items-center text-sm text-zinc-400 font-nunito font-bold py-4 ">
        {{-- cols --}}
        <span class="px-4">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
            </svg>
        </span>
        <span class="basis-[23%] grow pr-4">VACATAIRE</span>
        <span class="basis-[22%] grow pr-4">MATIERE</span>
        <span class="basis-[17%] grow pr-4">FILIERE</span>
        <span class="basis-[130px] pr-4">DUREE</span>
        <span class="basis-[150px] pr-4">DATE</span>
        <span class="basis-[170px] text-center mr-4">ACTION</span>
    </div>

    {{-- t-body --}}

    {{-- row 1 --}}
    @foreach($sceance_cours as $sceance_cour)
    <div class="flex items-center text-sm font-medium border border-zinc-200 h-[70px] py-2 rounded-md bg-white mb-4">
        {{-- cols --}}
        <span class="px-4">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
            </svg>
        </span>
        <span class="basis-[23%] grow pr-4">{{$sceance_cour->vacataire->prenom." ".$sceance_cour->vacataire->nom}}</span>
        <span class="basis-[22%] grow pr-4">{{$sceance_cour->matiere->nom}}</span>
        <span class="basis-[17%] grow pr-4">{{$sceance_cour->filiere->nom}}</span>
        <span class="basis-[130px] font-bold pr-4">{{$sceance_cour->duree}} Heures</span>
        <span class="basis-[150px] pr-4">{{date('d-m-Y', strtotime($sceance_cour->date))}}</span>
        @if($sceance_cour->statut==0)
        <span class="basis-[170px] relative flex items-center justify-center gap-4 mr-4">
            @php $id=$sceance_cour->id @endphp
            <form action="{{route('approuver',compact('id'))}}" method="post" class="m-0">
                @csrf
                <button class="btn-1 bg-[#00B69B] text-white">Approuver</button>
            </form>
            {{-- separator --}}
            <div class=" w-0.5 h-6 bg-zinc-200"></div>
            <form action="" method="" class="m-0">
                <button class="icon-hover cursor-pointer" disabled>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 8C14 11.3137 11.3137 14 8 14C4.68629 14 2 11.3137 2 8C2 4.68629 4.68629 2 8 2C9.53671 2 10.9385 2.57771 12 3.52779M12.6667 2V4C12.6667 4.36819 12.3682 4.66667 12 4.66667H10" stroke="#E4E4E7" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
            </form>

        </span>
        @else
            @php $id=$sceance_cour->id @endphp
            <span class="basis-[170px] relative flex items-center justify-center gap-4 mr-4">
            <form action="" method="" class="m-0">
                <button class="btn-1 bg-zinc-200" disabled>Approuver</button>
            </form>
            {{-- separator --}}
            <div class=" w-0.5 h-6 bg-zinc-200"></div>
            <form action="{{route('restaurer',compact('id'))}}" method="post" class="m-0">
                @csrf
                <button class="icon-hover" >
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 8C14 11.3137 11.3137 14 8 14C4.68629 14 2 11.3137 2 8C2 4.68629 4.68629 2 8 2C9.53671 2 10.9385 2.57771 12 3.52779M12.6667 2V4C12.6667 4.36819 12.3682 4.66667 12 4.66667H10" stroke="#4C535F" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
            </form>

        </span>
        @endif
    </div>
    @endforeach




</div>
@endsection
