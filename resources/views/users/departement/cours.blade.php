@extends('base')

@section('section')
<section class="px-6 min-h-screen ">

    {{-- liens utiles au chef de departement --}}
    <div class="border-b-zinc-200 border-b-2 mb-10">
        <a href="" class="py-3 px-6 inline-block text-sm font-medium text-zinc-400">Tous les cours</a>
        <a href="" class="py-3 px-6 inline-block text-sm font-semibold relative cr text-zinc-600">Approbation</a>
    </div>
        
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

            <button  type="menu" class="btn-1 bg-zinc-800 text-white" onclick="displayContainer(2)">
                <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="">
                    <path d="M6.5 1.30493V12.3049M12 6.80493L1 6.80493" stroke="white" stroke-width="2" stroke-linecap="round"/>
                </svg>                        
                Cours
            </button>
        </div>
    </div>

    {{-- choix entre les deux liens : tous les cours ou approbation --}}
    @yield('cours')

    {{-- pagination --}}
    <div class="flex p-4 items-center justify-between text-zinc-500 font-medium mt-2">
        <div class="font-medium text-zinc-400">
            page 1 / 10
        </div>

        <div class="flex items-center gap-1 *:w-9 *:h-9">
            <a href="" class="icon-hover-2">
                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1L1.70711 6.29289C1.31658 6.68342 1.31658 7.31658 1.70711 7.70711L7 13" stroke="#a1a1aa" stroke-width="2" stroke-linecap="round"/>
                </svg>                                
            </a>
            <a href="" class="icon-hover-2 rounded-lg bg-zinc-200">1</a>
            <a href="" class="icon-hover-2">2</a>
            <a href="" class="icon-hover-2">3</a>
            <a href="" class="icon-hover-2">4</a>
            <a href="" class="icon-hover-2">5</a>
            <a href="" class="icon-hover-2">
                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L6.29289 6.29289C6.68342 6.68342 6.68342 7.31658 6.29289 7.70711L1 13" stroke="#737373" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </a>
        </div>
    </div>
    
</section>
    
@endsection


{{-- FORMULAIRE D'AJOUT D'UN COURS --}}
@section('new-cours')
<div class="bg-white border border-zinc-200 rounded-lg px-8 py-6 w-7/12 scale-75 opacity-0 trans-2">
    <div class="flex items-center justify-between">
        <h1 class="font-semibold text-lg text-zinc-800">nouvelle scéance de cours</h1>
        <div class="icon-hover-2 cursor-pointer" id="closer" >
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 1L1 13M13 13L1 1.00001" stroke="#111111" stroke-width="2" stroke-linecap="round"/>
            </svg>                    
        </div>
    </div>
    <form action="" method="" class="m-0 mt-6">
        @csrf

        <div class="mb-10 ">
            
            <div class="w-full flex gap-4">
                <div class="w-full  flex flex-col mb-4">
                    <label for="filiere" class="font-medium text-zinc-800">Filiere</label>
                    <select name="filiere" id="filiere" class="input-2">
                        <option value="">Informatique</option>
                    </select>
                </div>
                
                <div class="w-full  flex flex-col mb-4">
                    <label for="matiere" class="font-medium text-zinc-800">Matière</label>
                    <select name="matiere" id="matiere" class="input-2">
                        <option value="">Masculin</option>
                        <option value="">Féminin</option>
                    </select>
                </div>
            </div>
            
            <div class="w-full  flex flex-col mb-4">
                <label for="vacataire" class="font-medium text-zinc-800">Vacataire</label>
                <select name="vacataire" id="vacataire" class="input-2">
                    <option value="">Seny Mbaye</option>
                    <option value="">Mouhamadou Mansour Diouf</option>
                </select>
            </div>

            <div class="w-full flex gap-4">
                <div class="w-full flex flex-col relative mb-4">
                    <label for="heure" class="text-zinc-800 font-medium">Nombre d’heures</label>
                    <div class="w-full relative ">
                        <input type="number" name="heure" id="heure" value="5" class="input-2 w-full">
                        <div class="absolute right-2 top-7 -translate-y-1/2 flex">
                            <button type="button" class="w-8 h-8 mr-1  bg-zinc-100 flex items-center justify-center rounded-md">
                                <svg width="12" height="3" viewBox="0 0 12 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 1.4999C12 1.65903 11.9473 1.81165 11.8536 1.92417C11.7598 2.03669 11.6326 2.0999 11.5 2.0999H0.5C0.367392 2.0999 0.240215 2.03669 0.146447 1.92417C0.0526785 1.81165 0 1.65903 0 1.4999C0 1.34077 0.0526785 1.18816 0.146447 1.07564C0.240215 0.963117 0.367392 0.899902 0.5 0.899902H11.5C11.6326 0.899902 11.7598 0.963117 11.8536 1.07564C11.9473 1.18816 12 1.34077 12 1.4999Z" fill="#1C1C1C"/>
                                </svg>                                    
                            </button>
                            <button type="button" class="w-8 h-8 bg-zinc-100 flex items-center justify-center rounded-md">
                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 6.5C12 6.63261 11.9473 6.75979 11.8536 6.85355C11.7598 6.94732 11.6326 7 11.5 7H6.5V12C6.5 12.1326 6.44732 12.2598 6.35355 12.3536C6.25979 12.4473 6.13261 12.5 6 12.5C5.86739 12.5 5.74021 12.4473 5.64645 12.3536C5.55268 12.2598 5.5 12.1326 5.5 12V7H0.5C0.367392 7 0.240215 6.94732 0.146447 6.85355C0.0526785 6.75979 0 6.63261 0 6.5C0 6.36739 0.0526785 6.24021 0.146447 6.14645C0.240215 6.05268 0.367392 6 0.5 6H5.5V1C5.5 0.867392 5.55268 0.740215 5.64645 0.646447C5.74021 0.552679 5.86739 0.5 6 0.5C6.13261 0.5 6.25979 0.552679 6.35355 0.646447C6.44732 0.740215 6.5 0.867392 6.5 1V6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5Z" fill="#1C1C1C"/>
                                </svg>   
                            </button>
                        </div>
                    </div>   
                </div>

                <div class="w-full  flex flex-col mb-4">
                    <label for="date" class="font-medium text-zinc-700">Date</label>
                    <input type="date" name="date" placeholder="ahmada@univ-thies.sn" id="date" class="input-2">
                </div>

                {{-- <div class="w-full  flex flex-col mb-4">
                    <label for="ufr" class="font-medium text-zinc-700">Statut</label>
                    <select name="ufr" id="ufr" class="input-2">
                        <option value="">Validé</option>
                        <option value="">Non</option>
                    </select>
                </div>  --}}
            </div>

            <div class="w-full flex gap-4">
                <textarea name="description" id="description" rows="8" placeholder="Décrivez .... " class="input-2 w-full"></textarea> 
            </div>   
                
        </div>
        <div class="flex gap-4 items-center">
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-zinc-800 text-white font-medium flex justify-center items-center gap-2">
                Ajouter
            </button>
            <button type="reset" class="px-6 py-2.5 rounded-lg bg-zinc-200 text-zinc-800 font-semibold flex justify-center items-center gap-2">
                Restaurer
            </button>
        </div>
    </form>
</div>
@endsection
