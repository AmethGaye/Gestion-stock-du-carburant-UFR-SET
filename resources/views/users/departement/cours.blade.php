@extends('base')

@section('section')
<section class="px-6 min-h-screen ">

    {{-- liens utiles au chef de departement --}}
    @if (auth()->user()->role == 'chef_departement')
    <div class="border-b-zinc-200 border-b-2 mb-10 text-zinc-500">
        <a href="{{ route('cours.all') }}" class="relative py-3 px-6 inline-block  @if(Route::currentRouteName() == 'cours.all') cr text-zinc-700 font-medium @endif">Tous les cours</a>
        <a href="{{ route('cours.approbation') }}" class="relative py-3 px-6 inline-block @if(Route::currentRouteName() == 'cours.approbation') cr text-zinc-700 font-medium @endif">A approuver</a>
    </div>
    @endif

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

            <div class="bg-zinc-100 text-zinc-600 border relative min-w-[130px] h-[34px] rounded-md tracking-wide text-sm">
                <input type="text" value="Janvier" readonly class="font-medium outline-none border-none cursor-pointer absolute left-0 top-0 w-full h-full bg-transparent px-4" onclick="showOptionContainer(this)" id="opt-choosen">
                <span class="absolute top-1/2 right-3 -translate-y-1/2 transition-transform" id="chevron">
                    <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.933058 0.879586C1.17714 0.613462 1.57286 0.613462 1.81694 0.879586L5.93306 5.36749C6.17714 5.63362 6.57286 5.63362 6.81694 5.36749L10.9331 0.879587C11.1771 0.613463 11.5729 0.613463 11.8169 0.879587C12.061 1.14571 12.061 1.57718 11.8169 1.84331L7.70082 6.33121C6.96859 7.12959 5.78141 7.12959 5.04918 6.33121L0.933058 1.84331C0.688981 1.57718 0.688981 1.14571 0.933058 0.879586Z" fill="#52525B"/>
                    </svg>
                </span>
                <div class="absolute -left-6 top-10 w-44 rounded-lg bg-white z-40 border tracking-wide py-2 hidden" id="options-container">
                    <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('Janvier')">Janvier</div>
                    <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('Février')">Février</div>
                    <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('Mars')">Mars</div>
                    <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('Avril')">Avril</div>
                    <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('Mai')">Mai</div>
                    <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('Juin')">Juin</div>
                    <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('Juillet')">Juillet</div>
                    <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('Aout')">Aout</div>
                    <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('Septembre')">Septembre</div>
                    <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('Octobre')">Octobre</div>
                    <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('Novembre')">Novembre</div>
                    <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer" onclick="getOption('Décembre')">Décembre</div>
                </div>
            </div>

            <button  type="menu" class="btn-1 bg-zinc-800 border border-zinc-800 text-white" onclick="displayContainer(`/departement/cours`)">
                <svg width="11" height="11" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="">
                    <path d="M6.5 1.30493V12.3049M12 6.80493L1 6.80493" stroke="white" stroke-width="2" stroke-linecap="round"/>
                </svg>
                Cours
            </button>
        </div>
    </div>

    {{--    les message flash : type -> success --}}
    <div class="text-green-500" id="success"></div>


    {{-- choix entre les deux liens : tous les cours ou approbation --}}
    @yield('cours')

    {{-- pagination --}}
    @include('partials.pagination')

</section>

@endsection


{{-- FORMULAIRE D'AJOUT D'UN COURS --}}
@section('new-cours')
<div class="bg-white border border-zinc-200 rounded-lg px-8 py-6 w-7/12 scale-75 opacity-0 trans-2 font-mtrph">
    <div class="flex items-center justify-between">
        <h1 class="font-semibold text-lg text-zinc-800">Nouvelle cours</h1>
        <div class="icon-hover-2 cursor-pointer" id="closer" >
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 1L1 13M13 13L1 1.00001" stroke="#111111" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
    </div>
    <form action="{{{route('cours.store')}}}" method="post" class="m-0 mt-6" id="subscription">
        @csrf

        <div class="mb-10 ">

            <div class="w-full flex gap-4">
                <div class="w-full  flex flex-col mb-4">
                    <label for="filiere" class="font-medium text-zinc-800">Filiere</label>
                    <select name="filiere" id="filiere" class="input-2">
                           @foreach($filieres as $filiere)
                            <option value="{{$filiere->id}}">{{$filiere->nom}}</option>
                           @endforeach
                    </select>
                    {{-- erreur gerée en js --}}
                    <div class="text-sm text-red-600 font-medium mt-2">
                    </div>
                </div>

                <div class="w-full  flex flex-col mb-4">
                    <label for="matiere_id" class="font-medium text-zinc-800">Matière</label>
                    <select name="matiere_id" id="matiere_id" class="input-2">
                       
                        @foreach($matieres as $matiere)
                                <option value="{{$matiere->id}}">{{$matiere->nom}}</option>
                        @endforeach
                    </select>
                    {{-- erreur gerée en js --}}
                    <div class="text-sm text-red-600 font-medium mt-2">
                    </div>
                </div>
            </div>

            <div class="w-full  flex flex-col mb-4">
                <label for="vacataire_id" class="font-medium text-zinc-800">Vacataire</label>
                <select name="vacataire_id" id="vacataire_id" class="input-2">
                    <option value="" class="first-option">Liste des vacataires</option>
                    @foreach($vacataires as $vacataire)
                    <option value="{{$vacataire->id}}">{{$vacataire->prenom." ".$vacataire->nom}}</option>
                    @endforeach
                </select>
                {{-- erreur gerée en js --}}
                <div class="text-sm text-red-600 font-medium mt-2">
                </div>
            </div>

            <div class="w-full flex gap-4">
                <div class="w-full flex flex-col relative mb-4">
                    <label for="duree" class="text-zinc-800 font-medium">Nombre d’heures</label>
                    <div class="w-full relative ">
                        <input type="number" name="duree" id="duree" value="" class="input-2 w-full">
                        {{-- erreur gerée en js --}}
                        <div class="text-sm text-red-600 font-medium mt-2">
                        </div>
                        <div class="absolute right-2 top-7 -translate-y-1/2 flex">
                            <button type="button" class="w-8 h-8 mr-1  bg-zinc-100 hover:bg-zinc-200 flex items-center justify-center rounded-md" onclick="decrementer()">
                                <svg width="12" height="3" viewBox="0 0 12 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 1.4999C12 1.65903 11.9473 1.81165 11.8536 1.92417C11.7598 2.03669 11.6326 2.0999 11.5 2.0999H0.5C0.367392 2.0999 0.240215 2.03669 0.146447 1.92417C0.0526785 1.81165 0 1.65903 0 1.4999C0 1.34077 0.0526785 1.18816 0.146447 1.07564C0.240215 0.963117 0.367392 0.899902 0.5 0.899902H11.5C11.6326 0.899902 11.7598 0.963117 11.8536 1.07564C11.9473 1.18816 12 1.34077 12 1.4999Z" fill="#1C1C1C"/>
                                </svg>
                            </button>
                            <button type="button" class="w-8 h-8 bg-zinc-100 hover:bg-zinc-200 flex items-center justify-center rounded-md" onclick="incrementer()">
                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 6.5C12 6.63261 11.9473 6.75979 11.8536 6.85355C11.7598 6.94732 11.6326 7 11.5 7H6.5V12C6.5 12.1326 6.44732 12.2598 6.35355 12.3536C6.25979 12.4473 6.13261 12.5 6 12.5C5.86739 12.5 5.74021 12.4473 5.64645 12.3536C5.55268 12.2598 5.5 12.1326 5.5 12V7H0.5C0.367392 7 0.240215 6.94732 0.146447 6.85355C0.0526785 6.75979 0 6.63261 0 6.5C0 6.36739 0.0526785 6.24021 0.146447 6.14645C0.240215 6.05268 0.367392 6 0.5 6H5.5V1C5.5 0.867392 5.55268 0.740215 5.64645 0.646447C5.74021 0.552679 5.86739 0.5 6 0.5C6.13261 0.5 6.25979 0.552679 6.35355 0.646447C6.44732 0.740215 6.5 0.867392 6.5 1V6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5Z" fill="#1C1C1C"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    {{-- erreur gerée en js --}}
                    <div class="text-sm text-red-600 font-medium mt-2">
                    </div>
                </div>

                <div class="w-full  flex flex-col mb-4">
                    <label for="date" class="font-medium text-zinc-700">Date</label>
                    <input type="date" name="date" placeholder="ahmada@univ-thies.sn" id="date" class="input-2">
                    {{-- erreur gerée en js --}}
                    <div class="text-sm text-red-600 font-medium mt-2">
                    </div>
                </div>

            </div>

            <div class="w-full flex flex-col">
                <label></label>
                <textarea name="remarque" id="remarque" rows="5" placeholder="Remarque .... " class="input-2 w-full"></textarea>
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
