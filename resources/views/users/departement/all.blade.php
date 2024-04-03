@extends('users.departement.cours')

@section('cours')
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
                    <button class="btn-3 bg-[#00B69B] text-white font-semibold text-xs">envoyer</button>
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
                    <button class="btn-3 bg-[#00B69B] text-white font-semibold">envoyer</button>
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
            <div class="h-20 text-sm font-semibold flex items-center justify-between">
                <div>
                    <span class="text-zinc-400">TOTAL:</span>
                    <span class="text-red-500 font-bold ml-4">8 Heures</span>
                </div>
                
                <div class="text-zinc-600">
                    <button class="btn-2 bg-gray-200">
                        <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-0.5">
                            <path d="M6.5 1.5V12.5M12 7L1 7" stroke="#52525B" stroke-width="2" stroke-linecap="round"/>
                        </svg>                            
                        Cours
                    </button>
                </div>
            </div>
        </div>

    </div>

    
</div>
@endsection

