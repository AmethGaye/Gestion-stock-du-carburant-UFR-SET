@extends('base')

@section('section')
<section class="px-6 min-h-screen h-screen ">

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


        {{-- row 1 --}}
        <div class="text-sm h-20 overflow-hidden text-zinc-600 font-medium border border-zinc-200 rounded-md px-4 bg-white mb-4 relative transition-[height] duration-150" id="super-contain">

            {{-- resume --}}
            <div class="h-20 relative flex items-center border-b border-zinc-300 mb-4 ">
                <div class="flex items-center w-full py-3">
                    <span class="basis-[24%] grow pl-2 pr-4">Mouhamadou Mansour Diouf</span>
                    <span class="basis-[22%] grow pr-4">Mansour@gmail.com</span>
                    <span class="w-[150px] font-bold pr-4">14 Heures</span>
                    <span class="basis-[130px] grow pr-4">Diourbel</span>
                    <span class="w-[190px] flex items-center justify-center">
                        <span class="flex mx-auto bg-blue-100 px-4 text-blue-500 py-1 rounded font-semibold text-xs">Véhiculé</span>
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
                        <form action="" method="" class="m-0 mr-2">
                            <button class="btn-3 bg-teal-500 text-white font-medium">Approuver</button>
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

                <div class="max-h-44 overflow-y-scroll">
                    {{-- row 1 --}}
                    <div class="flex items-center text-sm text-zinc-600 font-medium min-h-14 border-b ">
                        {{-- cols --}}
                        <span class="basis-[23%] grow px-4">Développement Web</span>
                        <span class="basis-[15%] grow pr-4">Semestre 4</span>
                        <span class="basis-[22%] grow pr-4">Informatique</span>
                        <span class="basis-[15%] grow pr-4">18 / 01 / 2024</span>
                        <span class="w-[120px] font-bold pr-4">3 Heure</span>
                        <span class="w-[170px] flex justify-center text-xs">
                            <span class="flex mx-auto bg-emerald-100 px-4 text-emerald-500 py-1 rounded font-semibold">Approuvé</span>
                        </span>
                    </div>
                    <div class="flex items-center text-sm text-zinc-600 font-medium min-h-14 border-b ">
                        {{-- cols --}}
                        <span class="basis-[23%] grow px-4">Développement Web</span>
                        <span class="basis-[15%] grow pr-4">Semestre 4</span>
                        <span class="basis-[22%] grow pr-4">Informatique</span>
                        <span class="basis-[15%] grow pr-4">18 / 01 / 2024</span>
                        <span class="w-[120px] font-bold pr-4">3 Heure</span>
                        <span class="w-[170px] flex justify-center text-xs">
                            <span class="flex mx-auto bg-emerald-100 px-4 text-emerald-500 py-1 rounded font-semibold">Approuvé</span>
                        </span>
                    </div>
                    <div class="flex items-center text-sm text-zinc-600 font-medium min-h-14 border-b ">
                        {{-- cols --}}
                        <span class="basis-[23%] grow px-4">Développement Web</span>
                        <span class="basis-[15%] grow pr-4">Semestre 4</span>
                        <span class="basis-[22%] grow pr-4">Informatique</span>
                        <span class="basis-[15%] grow pr-4">18 / 01 / 2024</span>
                        <span class="w-[120px] font-bold pr-4">3 Heure</span>
                        <span class="w-[170px] flex justify-center text-xs">
                            <span class="flex mx-auto bg-emerald-100 px-4 text-emerald-500 py-1 rounded font-semibold">Approuvé</span>
                        </span>
                    </div>
                    <div class="flex items-center text-sm text-zinc-600 font-medium min-h-14 border-b ">
                        {{-- cols --}}
                        <span class="basis-[23%] grow px-4">Développement Web</span>
                        <span class="basis-[15%] grow pr-4">Semestre 4</span>
                        <span class="basis-[22%] grow pr-4">Informatique</span>
                        <span class="basis-[15%] grow pr-4">18 / 01 / 2024</span>
                        <span class="w-[120px] font-bold pr-4">3 Heure</span>
                        <span class="w-[170px] flex justify-center text-xs">
                            <span class="flex mx-auto bg-emerald-100 px-4 text-emerald-500 py-1 rounded font-semibold">Approuvé</span>
                        </span>
                    </div>

                </div>

                {{-- t-foot --}}
                {{-- t-foot --}}
                <div class="h-20 flex items-center justify-between ">
                    <div class="flex gap-1.5 items-center">
                        <span class="text-zinc-400 font-semibold">TOTAL:</span>
                        <span class="text-red-500 font-bold bg-red-100 btn ml-4">8 Heures</span>
                    </div>

                   <div>
                      <p class="mr-2">Demandé par : Mr Idrissa Gaye</p>
                   </div>
                </div>
            </div>

        </div>

    </div>

    {{-- pagination --}}
    @include('partials.pagination')

</section>

@endsection
