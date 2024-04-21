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
                    <div class="py-1.5 px-4 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addFilter(this, 'statut', '2')">Payé</div>
                    <div class="py-1.5 px-4 hover:bg-zinc-100 cursor-pointer rounded-xl" onclick="addFilter(this, 'statut', '1')">Non payé</div>
                </div>
                <div class="flex items-center justify-end gap-2 mt-4">
                    <form action="{{ route('filtre') }}" method="get" class="m-0" id="sub-filters" >
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

        <form action="{{route('comptable.filtre_by_month')}}"  method="get" class="bg-zinc-100 text-zinc-600 border relative min-w-[130px] h-[34px] rounded-md tracking-wide text-sm m-0">
           @csrf
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



<div class="flex items-center text-sm text-zinc-400 font-nunito font-bold py-4 px-6">
    {{-- cols --}}
    <span class="basis-3/12 grow pr-4">VACATAIRE</span>
    <span class="basis-3/12 grow pr-4">EMAIL</span>
    <span class="basis-2/12 grow pr-4">PROVENANCE</span>
    <span class="basis-[160px] pr-4">DUREE TOTALE</span>
    <span class="basis-[180px] text-center">SITUATION</span>
    <span class="basis-[160px] pr-4">DISTANCE</span>
    <span class="basis-[140px] text-center">ACTION</span>
</div>


{{-- row 1 --}}
@foreach($vacataires as $vacataire)
    @if ($vacataire->cours->count() > 0)
        <div class="text-sm h-20 overflow-hidden text-zinc-600 font-medium border border-zinc-200 rounded-md px-6 bg-white mb-4 relative transition-[height]" id="super-contain">

            {{-- resume --}}
            <div class="h-20 relative flex items-center border-b border-zinc-300 mb-4">
                {{-- cols --}}
                <span class="basis-3/12 grow pr-4">{{ $vacataire->prenom }} {{ $vacataire->nom }}</span>
                <span class="basis-3/12 grow pr-4">{{ $vacataire->email }}</span>
                <span class="basis-2/12 grow pr-4">{{ $vacataire->provenance }}</span>
                <span class="basis-[160px] pr-4 font-bold">{{ $vacataire->cours->sum('duree') }} Heures</span>
                @php
                    $array = ['bg-blue-100', 'px-4 text-blue-500' => $vacataire->situation == 1, 'bg-fuchsia-100', 'text-fuchsia-500' => $vacataire->situation == 0];
                    $classes = Arr::toCssClasses($array);
                @endphp
                <span class="basis-[180px] flex  justify-center">
                    <span class="flex items-center {{ $classes }}px-4  py-1 rounded font-semibold text-xs">  @if ($vacataire->situation) Véhiculé @else Non @endif</span>
                </span>
                <span class="w-[160px] font-bold pr-4">423.23 KM</span>

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
                <div class="flex items-center text-sm text-zinc-800 font-nunito font-bold h-12  bg-[#F1F4F9] rounded">
                    {{-- cols --}}
                    <span class="px-4">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.3"/>
                        </svg>
                    </span>
                    <span class="basis-3/12 grow pr-4">Matière</span>
                    <span class="basis-40 shrink-0 pr-4">Semestre</span>
                    <span class="basis-2/12 grow pr-4">Date</span>
                    <span class="basis-32 pr-4">Durée</span>
                    <span class="basis-[140px] pr-4 text-center">Tickets</span>
                    <span class="basis-[160px] text-center">Statut</span>
                    <span class="basis-[215px] text-center">Action</span>
                </div>
                {{-- t-body --}}
                <div class="max-h-44 overflow-y-scroll">
                @foreach ($vacataire->cours as $cours)
                    <div class="flex items-center text-[small] text-zinc-600 font-medium min-h-14 border-b">
                        {{-- cols --}}
                        <span class="px-4">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.3"/>
                            </svg>
                        </span>
                        <span class="basis-3/12 grow pr-4">{{ $cours->matiere->nom }}</span>
                        <span class="basis-40 shrink-0 pr-4 pl-[1.5px]"> Semestre {{ $cours->matiere->semestre }} </span>
                        <span class="basis-2/12 grow pr-4  pl-[1.5px]">{{ date('d-m-Y', strtotime($cours->date)) }}</span>
                        <span class="basis-32 font-bold pr-4  pl-[1.5px]">{{ $cours->duree }} heures</span>
                        <span class="basis-[140px] flex pr-4 justify-center">
                                <div class="w-28 relative ">
                                    <input type="number" name="" id="number"  value="{{ $cours->remboursement->nombre_tickets }}" class="border-[1.5px] border-zinc-200 w-full rounded-md outline-none focus:border-zinc-500 px-4 py-2 font-bold text-zinc-600 disabled:text-zinc-400" @if ($cours->remboursement->statut == 2) @disabled(true) @endif>
                                    <div class="absolute right-2 top-1/2 -translate-y-1/2 flex bg-white ">
                                        <button type="button" class="w-7 h-7 mr-1  bg-zinc-100 hover:bg-zinc-200 disabled:hover:bg-zinc-100 flex items-center justify-center rounded-md" onclick="decrementer(this)" @if ($cours->remboursement->statut == 2) @disabled(true) @endif>
                                            <svg width="12" height="3" viewBox="0 0 12 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 1.4999C12 1.65903 11.9473 1.81165 11.8536 1.92417C11.7598 2.03669 11.6326 2.0999 11.5 2.0999H0.5C0.367392 2.0999 0.240215 2.03669 0.146447 1.92417C0.0526785 1.81165 0 1.65903 0 1.4999C0 1.34077 0.0526785 1.18816 0.146447 1.07564C0.240215 0.963117 0.367392 0.899902 0.5 0.899902H11.5C11.6326 0.899902 11.7598 0.963117 11.8536 1.07564C11.9473 1.18816 12 1.34077 12 1.4999Z" fill="#1C1C1C"/>
                                            </svg>
                                        </button>
                                        <button type="button" class="w-7 h-7 bg-zinc-100 hover:bg-zinc-200 disabled:hover:bg-zinc-100 flex items-center justify-center rounded-md" onclick="incrementer(this)" @if ($cours->remboursement->statut == 2) @disabled(true) @endif>
                                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 6.5C12 6.63261 11.9473 6.75979 11.8536 6.85355C11.7598 6.94732 11.6326 7 11.5 7H6.5V12C6.5 12.1326 6.44732 12.2598 6.35355 12.3536C6.25979 12.4473 6.13261 12.5 6 12.5C5.86739 12.5 5.74021 12.4473 5.64645 12.3536C5.55268 12.2598 5.5 12.1326 5.5 12V7H0.5C0.367392 7 0.240215 6.94732 0.146447 6.85355C0.0526785 6.75979 0 6.63261 0 6.5C0 6.36739 0.0526785 6.24021 0.146447 6.14645C0.240215 6.05268 0.367392 6 0.5 6H5.5V1C5.5 0.867392 5.55268 0.740215 5.64645 0.646447C5.74021 0.552679 5.86739 0.5 6 0.5C6.13261 0.5 6.25979 0.552679 6.35355 0.646447C6.44732 0.740215 6.5 0.867392 6.5 1V6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5Z" fill="#1C1C1C"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                        </span>
                        
                        <span class="basis-[160px] flex items-center justify-center">
                            @if ($cours->remboursement->statut == 1) 
                            <span class="px-3 py-1 rounded font-medium text-xs @if ($cours->remboursement->statut == 1) text-violet-500 bg-violet-100  @else text-emerald-500 bg-emerald-100 @endif">
                                Approuvé
                            </span>
                            @else
                            <span class="h-8 w-9 flex items-center justify-center rounded-lg font-medium text-xs bg-green-50">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" color="#4ade80" fill="none">
                                    <path d="M17 3.33782C15.5291 2.48697 13.8214 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.3151 21.9311 10.6462 21.8 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M8 12.5C8 12.5 9.5 12.5 11.5 16C11.5 16 17.0588 6.83333 22 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            @endif
                        </span>
                        <span class="basis-[215px] flex items-center justify-center gap-3 box-border">
                            <form action="{{ route('c.remboursements.update', $cours->remboursement->id) }}"  method="post"  class="m-0">
                                @csrf
                                <input type="hidden" name="tickets" id="tickets" value="{{ $cours->remboursement->nombre_tickets }}">
                                <button type="submit"  @if ($cours->remboursement->statut == 2) @disabled(true) @endif
                                        class=" font-mtrph btn-2 @if ($cours->remboursement->statut == 1) bg-[#4C535F] text-white  @else bg-zinc-200 text-zinc-500 @endif  text-xs">
                                        Rembourser
                                </button>
                            </form>
                            {{-- separator --}}
                            <div class=" w-0.5 h-5 bg-zinc-200"></div>
                            <form action="{{ route('c.remboursements.reset',$cours->remboursement->id ) }}" method="POST" class="m-0">
                                @csrf
                                <button @if ($cours->remboursement->statut == 1) @disabled(true) @endif>
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 7C13 10.3137 10.3137 13 7 13C3.68629 13 1 10.3137 1 7C1 3.68629 3.68629 1 7 1C8.53671 1 9.93849 1.57771 11 2.52779M11.6667 1V3C11.6667 3.36819 11.3682 3.66667 11 3.66667H9" stroke=" @if ($cours->remboursement->statut == 2) #4C535F @else #a1a1aa @endif " stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            </form>
                        </span>
                    </div>
                @endforeach
                </div>

                {{-- t-foot --}}
                <div class="h-20 text-sm flex items-center justify-between">
                    <div class="flex gap-2 items-center text-[small]">
                        <span class="text-zinc-400 font-semibold">Total :</span>
                        <span class="text-zinc-600 font-semibold bg-zinc-100 btn-2 ml-2">8 Heures</span>
                        {{-- separator --}}
                        <div class=" w-0.5 h-5 bg-zinc-200"></div>
                        <span class="text-zinc-600 font-semibold bg-zinc-100 btn-2 ">10 tickets</span>
                    </div>

                    <div class="flex gap-2">
                        <form class="text-zinc-600 m-0">
                            <button type="submit" class=" font-mtrph px-3 py-1.5 rounded-md bg-[#4C535F] text-white ">
                                Rembourser
                            </button>
                        </form>
                        <form class="text-zinc-600 m-0">
                            <button class="font-mtrph px-3 py-1.5 rounded-md bg-zinc-200 font-medium">
                                Restaurer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach






{{-- pagination --}}
@include('partials.pagination')
</section>
@endsection
