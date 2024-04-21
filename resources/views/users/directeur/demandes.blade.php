@extends('base')

@section('section')
<section class="px-6 min-h-screen h-screen ">
    {{-- {{ \Carbon\Carbon::parse(Auth::user()->created_at)->translatedFormat('d F Y à H\hi') }} --}}

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
                <div class="absolute -left-32 top-11 w-[400px] rounded-lg bg-white z-40 border tracking-wide hidden p-4" id="filters-container">
                    <div class="flex flex-wrap gap-2 pb-4 border-b">
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addOrderBy(this, 'prenom')">Prénom</div>
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addOrderBy(this, 'nom')">Nom</div>
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addOrderBy(this, 'provenance')">Provenance</div>
                    </div>
                    <div class="flex flex-wrap gap-2 pb-4 border-b mt-4">
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addFilter(this, 'situation', '0')">Non Véhiculé</div>
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addFilter(this, 'situation', '1')">Véhiculé</div>
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addFilter(this, 'demande', '1')">Approuvé</div>
                        <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addFilter(this, 'demande', '0')">Non Approuvé</div>
                        {{-- @foreach($departements as $dep)
                            <div class="py-1.5 px-5 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addFilter(this, 'departement', {{ $dep->id }})">{{ $dep->nom }}</div>
                        @endforeach --}}
                    </div>
                    <div class="flex items-center justify-end gap-2 mt-4">
                        <form action="{{route('filtre.demande')}}" method="get" class="m-0" id="sub-filters" >
                            @csrf
                            <button type="submit" class="btn-1 bg-zinc-800 text-white">Valider</button>
                        </form>
                       <a href="{{ route('directeur.demandes') }}">
                            <button type="submit" class="btn-1 bg-zinc-100 text-zinc-800">restaurer</button>
                        </a>
                    </div>
                </div>        
            </div>

            <form action="{{route('filtre_by_month')}}"  method="get" class="bg-zinc-100 text-zinc-600 border relative min-w-[130px] h-[34px] rounded-md tracking-wide text-sm m-0">
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
        </div>
    </div>

    {{-- choix entre les deux liens : tous les cours ou approbation --}}
    <div class="relative">
        {{-- t-head --}}
        <div class="flex items-center text-sm text-zinc-400 font-nunito font-bold py-4 px-6">
            {{-- cols --}}
            <span class="basis-[24%] grow pr-4">VACATAIRE</span>
            <span class="basis-[22%] grow pr-4">EMAIL</span>
            <span class="w-[150px] pr-4">TOTAL</span>
            <span class="basis-[130px] grow pr-4">PROVENANCE</span>
            <span class="w-[190px] text-center">SITUATION</span>
            <span class="w-[210px] text-center ">ACTION</span>
        </div>

        {{-- t-body --}}

        @foreach($liste_remboursement as $vacataire)
        {{-- row 1 --}}
        @if ($vacataire->cours->count() > 0)
        <div class="text-sm h-20 overflow-hidden text-zinc-600 font-medium border border-zinc-200 rounded-md px-4 bg-white mb-4 relative transition-[height] duration-150" id="super-contain">
            @php $total_cours_dispense=0;
            foreach($vacataire->cours as $cours){  $total_cours_dispense += $cours->duree; }
            @endphp
            {{-- resume --}}
            <div class="h-20 relative flex items-center border-b border-zinc-300 mb-4 ">
                <div class="flex items-center w-full py-3">
                    <span class="basis-[24%] grow pl-2 pr-4">{{$vacataire->prenom." ".$vacataire->nom}}</span>
                    <span class="basis-[22%] grow pr-4">{{$vacataire->email}}</span>
                    <span class="w-[150px] font-bold pr-4">{{$total_cours_dispense}} Heures</span>
                    <span class="basis-[130px] grow pr-4">{{$vacataire->provenance}}</span>
                    <span class="w-[190px] flex items-center justify-center">
                        <span class="flex mx-auto @if($vacataire->situation)  bg-blue-100 px-4 text-blue-500 @else bg-orange-100 px-4 text-orange-500 @endif py-1 rounded font-semibold text-xs">@if($vacataire->situation) Vehiculé @else Non @endif</span>
                    </span>

                    <span class="w-[210px] relative flex items-center justify-center gap-4 ">
                        {{-- demander un remboursement --}}
                        {{--
                            [
                                "id_matiere" => 1,
                                'id_vacataire' => 1,
                                'id_comptable' => 1,
                                'id_cours' => [1, 2, 4, 6]
                            ]
                        --}}
                        @php
                            $id_cours = [];
                            foreach($vacataire->cours as $cours) {
                                if ($cours->statut == 1) {
                                    $id_cours[] = $cours->id;
                                }
                            }
                        @endphp
                        <form action="{{route('approuver.directeur')}}" method="post" class="m-0 mr-2">
                            @csrf
                            @foreach($id_cours as $cours)
                                <input type="hidden" name="id_cours[]" value="{{$cours}}">
                            @endforeach
                            <button class="px-4 py-1 font-mtrph rounded @if(!empty($id_cours)) bg-teal-500 @else bg-gray-400 @endif  text-white font-medium" @if(empty($id_cours))disabled @endif  >Approuver</button>
                        </form>
                        {{-- separator --}}
                        <div class=" w-0.5 h-6 bg-zinc-200"></div>

                        {{--  --}}
                        <div class="transition-all duration-300 w-8 h-8 flex items-center justify-center mr-2 icon-hover cursor-pointer" id="ch-container">
                            <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg" class="transition-transform rotate-0" id="chevron">
                                <path d="M13.5 1.5L8.20711 6.79289C7.81658 7.18342 7.18342 7.18342 6.79289 6.79289L1.5 1.5" stroke="#9FA6B2" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </span>
                </div>
            </div>


            {{-- t-head --}}
            <div class="flex items-center text-sm text-zinc-800 font-nunito font-bold h-12 bg-[#F1F4F9] rounded mx-4">
                {{-- cols --}}
                <span class="basis-[23%] grow px-4">Matière</span>
                <span class="basis-[15%] grow pr-4">Semestre</span>
                <span class="basis-[22%] grow pr-4">Filière</span>
                <span class="basis-[15%] grow pr-4">Date</span>
                <span class="w-[120px] pr-4">Durée</span>
                <span class="w-[170px] text-center">Statut</span>
            </div>

            {{-- detail --}}
            <div class="mx-4">

                {{-- t-body --}}

                <div class="max-h-44 overflow-y-scroll ">
                    {{-- row 1 --}}
                    @foreach($vacataire->cours as $cours)
                    <div class="flex items-center text-sm text-zinc-600 font-medium min-h-14 border-b ">
                        {{-- cols --}}
                        <span class="basis-[23%] grow px-4">{{$cours->matiere->nom}}</span>
                        <span class="basis-[15%] grow pr-4">Semestre {{$cours->matiere->semestre}} </span>
                        <span class="basis-[22%] grow pr-4">{{$cours->filiere->nom}}</span>
                        <span class="basis-[15%] grow pr-4">{{$cours->date}}</span>
                        <span class="w-[120px] font-bold pr-4">{{$cours->duree}} Heure</span>
                        @php
                            $statut = ($cours->remboursement->statut == '0') ? 'En cours' : 'Approuvé' ;
                            $classes = ($cours->remboursement->statut == '0') ? 'bg-orange-100 px-4 text-orange-500' : 'bg-violet-100 px-4 text-violet-500';
                        @endphp
                        <span class="w-[170px] flex justify-center text-xs">
                        <span class="flex mx-auto py-1.5 {{ $classes }} rounded font-semibold"> {{ $statut }} </span>
                        </span>
                    </div>
                    @endforeach

                    </div>

                </div>

                {{-- t-foot --}}
                {{-- t-foot --}}
            @php $total_cours_valide=0;
            foreach($vacataire->cours as $cours){ if ($cours->statut){$total_cours_valide += $cours->duree;} }
            @endphp
                <div class="h-20 flex items-center justify-between px-4 text-[small]">
                    <div class="flex gap-1.5 items-center">
                        <span class="text-zinc-400 font-semibold ">Total : </span>
                        <span class="text-zinc-600 font-semibold bg-zinc-100 btn-2 ml-4">{{$total_cours_valide}} Heures</span>
                    </div>

                   <div>
                        <p class="mr-2 text-[small] font-medium">Demandé par : Mr Idrissa Gaye</p>
                   </div>
                </div>
            </div>

        </div>
        @endif
        @endforeach

    </div>


    {{-- pagination --}}
    @include('partials.pagination')

</section>

@endsection
