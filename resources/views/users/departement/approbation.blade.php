@extends('users.departement.cours')

@section('cours')
<div class="">
    {{-- t-head --}}
    <div class="flex items-center text-sm text-zinc-400 font-nunito font-bold py-4 *:px-4 ">
        {{-- cols --}}
        <span>
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
            </svg>                        
        </span>
        <span class="w-[23%]">VACATAIRE</span>
        <span class="w-[23%]">EMAIL</span>
        <span class="w-[22%]">MATIERE</span>
        <span class="w-[17%]">FILIERE</span>
        <span class="w-[130px]">DUREE</span>
        <span class="w-[150px]">DATE</span>
        <span class="w-[150px] text-center">ACTION</span>
    </div>
    
    {{-- t-body --}}

    {{-- row 1 --}}
    <div class="flex items-center text-sm text-zinc-500 font-medium py-3 border border-zinc-200 *:px-4 rounded-md bg-white mb-4">
        {{-- cols --}}
        <span>
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
            </svg>                        
        </span>
        <span class="w-[23%]">Mouhamadou Mansour Diouf</span>
        <span class="w-[23%]">Mansour@gmail.com</span>
        <span class="w-[22%]">Programmation Orientée Objet</span>
        <span class="w-[17%]">Informatique</span>
        <span class="w-[130px] font-bold">4 Heures</span>
        <span class="w-[150px]">18/02/2024</span>
        <span class="w-[150px] text-center">
            <form action="" method="" class="m-0">
                <button class="btn-2 bg-[#00B69B] text-white font-semibold">Approuver</button>
            </form>
        </span>
    </div>

    {{-- row 2 --}}
    <div class="flex items-center text-sm text-zinc-500 font-medium py-3 border border-zinc-200 *:px-4 rounded-md bg-white mb-4">
        {{-- cols --}}
        <span>
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
            </svg>                        
        </span>
        <span class="w-[23%]">Mouhamadou Mansour Diouf</span>
        <span class="w-[23%]">Mansour@gmail.com</span>
        <span class="w-[22%]">Programmation Orientée Objet</span>
        <span class="w-[17%]">Informatique</span>
        <span class="w-[130px] font-bold">4 Heures</span>
        <span class="w-[150px]">18/02/2024</span>
        <span class="w-[150px] text-center">
            <form action="" method="" class="m-0">
                <button type="submit" disabled class="btn-2 bg-zinc-200 text-zinc-500 *: font-bold">Approuver</button>
            </form>
        </span>
    </div>


</div>
@endsection
