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
    <div class="">
        {{-- t-head --}}
        <div class="flex items-center text-sm text-zinc-400 font-nunito font-bold py-4 *:px-4 pr-4">
            {{-- cols --}}
            <span>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
                </svg>                        
            </span>
            <span class="w-[23%]">VACATAIRE</span>
            <span class="w-[22%]">EMAIL</span>
            <span class="w-[17%]">FILIERE</span>
            <span class="w-[130px]">TOTAL</span>
            <span class="w-[14%]">PROVENANCE</span>
            <span class="w-[170px] text-center">SITUATION</span>
            <span class="w-[210px] text-center">ACTION</span>
        </div>
        
        {{-- t-body --}}
        {{-- row 2 --}}
        <div class="text-sm text-zinc-500 font-medium border border-zinc-200 rounded-md px-4 bg-white mb-4 relative">
    
            {{-- resume --}}
            <div class="py-4 flex items-center">
                {{-- cols --}}
                <span class="pr-4">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
                    </svg>                        
                </span>
                <span class="w-[23%] px-4">Mouhamadou Mansour</span>
                <span class="w-[22%] px-4">Mansour@gmail.com</span>
                <span class="w-[17%] px-4">Mathématique</span>
                <span class="w-[130px] font-bold px-4">14 Heures</span>
                <span class="w-[14%] px-4">Diourbel</span>
                <span class="w-[170px] flex px-4 justify-center">
                    <span class="flex items-center bg-fuchsia-100 px-4 text-fuchsia-500 py-1 rounded font-semibold text-xs">Non</span>
                </span>
    
                <span class="w-[210px] relative flex items-center justify-center">
                    {{-- demander un remboursement --}}
                    {{-- 
                        [
                            "id_matiere" => 1,
                            'id_vacataire' => 1,
                            'id_comptable' => 1,
                            'id_cours' => [1, 2, 4, 6]
                        ]    
                    --}}
                    <form action="" method="" class="m-0 mr-4">
                        <button class="btn-3 bg-[#00B69B] text-white font-semibold text-xs">Approuver</button>
                    </form>
                    {{-- separator --}}
                    <div class=" w-0.5 bg-zinc-200 self-stretch mr-2"></div>
    
                    {{--  --}}
                    <div class="transition-all duration-300 w-8 h-8 flex items-center justify-center hover:bg-zinc-100 rounded-lg">
                        <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                            <path d="M13.5 1.5L8.20711 6.79289C7.81658 7.18342 7.18342 7.18342 6.79289 6.79289L1.5 1.5" stroke="#9FA6B2" stroke-width="2" stroke-linecap="round"/>
                        </svg> 
                    </div> 
                </span>
            </div>
    
        </div>
    
        {{-- row 1 --}}
        <div class="text-sm text-zinc-500 font-medium border border-zinc-200 rounded-md px-4 bg-white mb-4 relative">
    
            {{-- resume --}}
            <div class="py-4 flex items-center border-b border-zinc-200 mb-4">
                {{-- cols --}}
                <span class="pr-4">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
                    </svg>                        
                </span>
                <span class="w-[23%] px-4">Mouhamadou Mansour Diouf</span>
                <span class="w-[22%] px-4">Mansour@gmail.com</span>
                <span class="w-[17%] px-4">Mathématique</span>
                <span class="w-[130px] font-bold px-4">14 Heures</span>
                <span class="w-[14%] px-4">Diourbel</span>
                <span class="w-[170px] flex px-4">
                    <span class="flex mx-auto bg-blue-100 px-4 text-blue-500 py-1 rounded font-semibold text-xs">Véhiculé</span>
                </span>
    
                <span class="w-[210px] relative flex items-center justify-center">
                    {{-- demander un remboursement --}}
                    {{-- 
                        [
                            "id_matiere" => 1,
                            'id_vacataire' => 1,
                            'id_comptable' => 1,
                            'id_cours' => [1, 2, 4, 6]
                        ]    
                    --}}
                    <form action="" method="" class="m-0 mr-4">
                        <button class="btn-3 bg-[#00B69B] text-white font-semibold">Approuver</button>
                    </form>
                    {{-- separator --}}
                    <div class=" w-0.5 bg-zinc-200 self-stretch mr-2"></div>
    
                    {{--  --}}
                    <div class="transition-all duration-300 w-8 h-8 flex items-center justify-center hover:bg-zinc-100 rounded-lg">
                        <svg width="15" height="8" viewBox="0 0 15 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer">
                            <path d="M1.5 7.00009L6.79289 1.7072C7.18342 1.31668 7.81658 1.31668 8.20711 1.7072L13.5 7.00009" stroke="#9FA6B2" stroke-width="2" stroke-linecap="round"/>
                        </svg>                        
                    </div> 
                </span>
            </div>
    
            {{-- detail --}}
            <div class="mx-4">
                {{-- t-head --}}
                <div class="flex items-center text-sm text-zinc-800 font-nunito font-bold py-3 *:px-4 pr-4 bg-[#F1F4F9] rounded">
                    {{-- cols --}}
                    <span>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
                        </svg>                        
                    </span>
                    <span class="w-[23%]">Matière</span>
                    <span class="w-[15%]">Semestre</span>
                    <span class="w-[22%]">Filière</span>
                    <span class="w-[14%]">Date</span>
                    <span class="w-[150px]">Durée</span>
                    <span class="w-[170px] text-center">Statut</span>
                    <span class="w-[140px] text-center">Action</span>
                </div>
    
                {{-- t-body --}}
                {{-- row 1 --}}
                <div class="flex items-center text-sm text-zinc-600 font-medium py-3 *:px-4 pr-4 border-b ">
                    {{-- cols --}}
                    <span>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
                        </svg>                        
                    </span>
                    <span class="w-[23%]">Développement Web</span>
                    <span class="w-[15%]">Semestre 4</span>
                    <span class="w-[22%]">Informatique</span>
                    <span class="w-[14%]">18/01/2024</span>
                    <span class="w-[150px] font-bold">3 Heure</span>
                    <span class="w-[170px] flex px-4 text-xs">
                        <span class="flex mx-auto bg-emerald-100 px-4 text-emerald-500 py-1 rounded font-semibold">Approuvé</span>
                    </span>
                    <span class="w-[140px] flex items-center justify-center cursor-pointer">
                        <span class="icon-hover">
                            <svg width="19" height="5" viewBox="0 0 19 5" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                <path d="M9.12476 2.12494H9.87476M9.12476 2.87494H9.87476M2.12476 2.12494H2.87476M2.12476 2.87494H2.87476M16.1248 2.12494H16.8748M16.1248 2.87494H16.8748M10.5 2.5C10.5 3.05228 10.0523 3.5 9.5 3.5C8.94772 3.5 8.5 3.05228 8.5 2.5C8.5 1.94772 8.94772 1.5 9.5 1.5C10.0523 1.5 10.5 1.94772 10.5 2.5ZM3.5 2.5C3.5 3.05228 3.05229 3.5 2.5 3.5C1.94772 3.5 1.5 3.05228 1.5 2.5C1.5 1.94772 1.94772 1.5 2.5 1.5C3.05229 1.5 3.5 1.94772 3.5 2.5ZM17.5 2.5C17.5 3.05228 17.0523 3.5 16.5 3.5C15.9477 3.5 15.5 3.05228 15.5 2.5C15.5 1.94772 15.9477 1.5 16.5 1.5C17.0523 1.5 17.5 1.94772 17.5 2.5Z" stroke="#4C535F" stroke-width="2" stroke-linecap="round"/>
                            </svg> 
                        </span>                       
                    </span>
                </div>    
                {{-- row 2 --}}
                <div class="flex items-center text-sm text-zinc-600 font-medium py-3 *:px-4 pr-4 border-b ">
                    {{-- cols --}}
                    <span>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
                        </svg>                        
                    </span>
                    <span class="w-[23%]">Développement Web</span>
                    <span class="w-[15%]">Semestre 4</span>
                    <span class="w-[22%]">Informatique</span>
                    <span class="w-[14%]">18/01/2024</span>
                    <span class="w-[150px] font-bold">3 Heure</span>
                    <span class="w-[170px] flex px-4 text-xs">
                        <span class="flex mx-auto bg-orange-100 px-4 text-orange-500 py-1 rounded font-semibold">Non</span>
                    </span>
                    <span class="w-[140px] flex items-center justify-center cursor-pointer">
                        <span class="icon-hover">
                            <svg width="19" height="5" viewBox="0 0 19 5" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                <path d="M9.12476 2.12494H9.87476M9.12476 2.87494H9.87476M2.12476 2.12494H2.87476M2.12476 2.87494H2.87476M16.1248 2.12494H16.8748M16.1248 2.87494H16.8748M10.5 2.5C10.5 3.05228 10.0523 3.5 9.5 3.5C8.94772 3.5 8.5 3.05228 8.5 2.5C8.5 1.94772 8.94772 1.5 9.5 1.5C10.0523 1.5 10.5 1.94772 10.5 2.5ZM3.5 2.5C3.5 3.05228 3.05229 3.5 2.5 3.5C1.94772 3.5 1.5 3.05228 1.5 2.5C1.5 1.94772 1.94772 1.5 2.5 1.5C3.05229 1.5 3.5 1.94772 3.5 2.5ZM17.5 2.5C17.5 3.05228 17.0523 3.5 16.5 3.5C15.9477 3.5 15.5 3.05228 15.5 2.5C15.5 1.94772 15.9477 1.5 16.5 1.5C17.0523 1.5 17.5 1.94772 17.5 2.5Z" stroke="#4C535F" stroke-width="2" stroke-linecap="round"/>
                            </svg> 
                        </span>                       
                    </span>
                </div>
                
                {{-- t-foot --}}
                <div class="h-20 text-sm font-semibold flex items-center">
                    <div>
                        <span class="text-zinc-400">TOTAL:</span>
                        <span class="text-red-500 font-bold ml-4">8 Heures</span>
                    </div>
                    
                </div>
            </div>
    
        </div>
    
        
    </div>

    {{-- pagination --}}
    @include('partials.pagination')
    
</section>
    
@endsection
