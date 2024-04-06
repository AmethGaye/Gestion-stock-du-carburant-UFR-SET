@extends('layout')

{{-- inclusion du sidebar --}}
@include('partials.side-bar')
{{-- inclusion de la barre de navigation --}}
@include('partials.nav-bar')
<main class="relative left-[280px] top-[69.5px] pb-10">
    <div class="px-6  py-3 text-sm font-medium text-zinc-400 mb-4">
        pages
        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline mx-2">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.292894 9.70711C-0.0976307 9.31658 -0.0976307 8.68342 0.292894 8.29289L3.58579 5L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683418 0.292893 0.292894C0.683417 -0.0976312 1.31658 -0.0976312 1.70711 0.292894L5.70711 4.29289C6.09763 4.68342 6.09763 5.31658 5.70711 5.70711L1.70711 9.70711C1.31658 10.0976 0.683418 10.0976 0.292894 9.70711Z" fill="#A1A1AA"/>
        </svg>            
        <span class="text-sm font-semibold text-zinc-500">@yield('page', 'Dashboard')</span> 
    </div>

    {{-- section principale --}}
    @yield('section')


</main>

<div class="w-full h-screen absolute left-0 top-0 z-50 light-bg transition-opacity duration-100 ease-in-out flex items-center justify-center text-sm invisible opacity-0" id="container">
    {{-- FIRST : FORMULAIRE D'AJOUT D'UN NOUVEL UTILISATEUR--}}
    <div class="bg-white border border-zinc-200 rounded-lg px-8 py-6 w-8/12 scale-75 opacity-0 trans-2 ">
        <div class="flex items-center justify-between">
            <h1 class="font-semibold text-lg text-zinc-800">Ajouter un nouveau utilisateur</h1>
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
                    <div class="w-full flex flex-col relative mb-4">
                        <label for="prenom" class="text-zinc-800 font-medium">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="input-2" placeholder="Ahmada">   
                    </div>
    
                    <div class="w-full flex flex-col relative mb-4">
                        <label for="nom" class="text-zinc-800 font-medium">Nom</label>
                        <input type="text" name="nom" id="nom" class="input-2" placeholder="Gaye">   
                    </div>
                </div>

                <div class="w-full flex gap-4">
                    <div class="w-full  flex flex-col mb-4">
                        <label for="Sexe" class="font-medium text-zinc-800">Sexe</label>
                        <select name="Sexe" id="Sexe" class="input-2">
                            <option value="">Masculin</option>
                            <option value="">Féminin</option>
                        </select>
                    </div>
    
                    <div class="w-full flex flex-col relative mb-4">
                        <label for="email" class="text-zinc-800 font-medium">Adresse email universitaire</label>
                        <input type="text" name="email" id="email" class="input-2" placeholder="Example@univ-thies.sn">
                        <div class="text-[small] text-red-600 font-medium mt-2">Adresse email invalide !</div>
                    </div>
                </div>

                <div class="w-full flex gap-4">
                    <div class="w-full flex flex-col relative mb-4">
                        <label for="tel" class="text-zinc-800 font-medium">Numéro de téléphone</label>
                        <input type="tel" name="tel" id="tel" class="input-2" placeholder="784532081">   
                    </div>
    
                    <div class="w-full  flex flex-col mb-4">
                        <label for="role" class="font-medium text-zinc-800">Rôle</label>
                        <select name="role" id="role" class="input-2">
                            <option value="">Admin</option>
                            <option value="">Directeur</option>
                            <option value="">Assistant</option>
                            <option value="">Chef De Département</option>
                        </select>
                    </div>
                </div>


                <div class="w-full flex gap-4">
                    <div class="w-full flex flex-col relative mb-4">
                        <label for="password" class="text-zinc-700 font-medium">Mot de passe par défaut</label>
                        <input type="password" name="password" id="password" class="input-2" placeholder="***************">
                        <svg width="16" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute right-4 top-[40px] hidden cursor-pointer">
                            <path d="M1.24666 9.17176C0.917778 8.42865 0.917778 7.57136 1.24666 6.82824C2.76905 3.38843 6.11596 1 10 1C13.884 1 17.2309 3.38843 18.7533 6.82824C19.0822 7.57136 19.0822 8.42865 18.7533 9.17176C17.2309 12.6116 13.884 15 10 15C6.11596 15 2.76905 12.6116 1.24666 9.17176Z" stroke="#4B5563" stroke-width="2"/>
                            <path d="M12.8886 8C12.8886 9.65685 11.5953 11 10 11C8.40467 11 7.11141 9.65685 7.11141 8C7.11141 6.34315 8.40467 5 10 5C11.5953 5 12.8886 6.34315 12.8886 8Z" stroke="#4B5563" stroke-width="2"/>
                        </svg>
                        <svg width="16" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute right-4 top-[40px] cursor-pointer">
                            <path d="M1.24667 6.97471L2.13901 7.42607L2.13901 7.42607L1.24667 6.97471ZM18.7533 9.02529L17.861 8.57394L17.861 8.57394L18.7533 9.02529ZM1.24667 9.02529L0.35432 9.47665L0.354321 9.47665L1.24667 9.02529ZM18.7533 6.97471L17.861 7.42606L17.861 7.42606L18.7533 6.97471ZM15.7296 2.41076C15.2535 2.13087 14.6406 2.28995 14.3607 2.76606C14.0808 3.24217 14.2399 3.85503 14.716 4.13491L15.7296 2.41076ZM5.32457 11.8888C4.84697 11.6115 4.23497 11.7738 3.95763 12.2514C3.6803 12.729 3.84264 13.341 4.32024 13.6184L5.32457 11.8888ZM1.52637 11.263C1.87829 11.6887 2.50862 11.7485 2.93427 11.3966C3.35992 11.0446 3.41969 10.4143 3.06778 9.98866L1.52637 11.263ZM11.7443 3.03344C12.2874 3.13363 12.809 2.77456 12.9091 2.23144C13.0093 1.68832 12.6503 1.16681 12.1071 1.06662L11.7443 3.03344ZM18.3754 1.74007C18.7842 1.36864 18.8144 0.736195 18.443 0.327467C18.0716 -0.0812608 17.4391 -0.111497 17.0304 0.259933L18.3754 1.74007ZM1.62453 14.2599C1.21581 14.6314 1.18557 15.2638 1.557 15.6725C1.92843 16.0813 2.56087 16.1115 2.9696 15.7401L1.62453 14.2599ZM10 0.875C5.76284 0.875 2.05748 3.15614 0.35432 6.52336L2.13901 7.42607C3.48063 4.77362 6.46908 2.875 10 2.875V0.875ZM10 15.125C14.2372 15.125 17.9425 12.8439 19.6457 9.47664L17.861 8.57394C16.5194 11.2264 13.5309 13.125 10 13.125V15.125ZM0.35432 6.52336C-0.118107 7.45737 -0.118107 8.54264 0.35432 9.47665L2.13901 8.57394C1.95366 8.2075 1.95366 7.79251 2.13901 7.42607L0.35432 6.52336ZM17.861 7.42606C18.0463 7.7925 18.0463 8.20749 17.861 8.57394L19.6457 9.47664C20.1181 8.54264 20.1181 7.45737 19.6457 6.52336L17.861 7.42606ZM19.6457 6.52336C18.786 4.82376 17.4151 3.4016 15.7296 2.41076L14.716 4.13491C16.0922 4.94387 17.185 6.08969 17.861 7.42606L19.6457 6.52336ZM4.32024 13.6184C5.96758 14.5749 7.91735 15.125 10 15.125V13.125C8.27084 13.125 6.66747 12.6686 5.32457 11.8888L4.32024 13.6184ZM0.354321 9.47665C0.676621 10.1138 1.07087 10.7121 1.52637 11.263L3.06778 9.98866C2.70418 9.54888 2.39236 9.07482 2.13901 8.57394L0.354321 9.47665ZM12.1071 1.06662C11.4252 0.94083 10.7205 0.875 10 0.875V2.875C10.5985 2.875 11.1818 2.92968 11.7443 3.03344L12.1071 1.06662ZM7.28492 10.5962C8.79437 11.9679 11.2056 11.9679 12.7151 10.5962L11.37 9.11609C10.6233 9.79464 9.37667 9.79464 8.62999 9.11609L7.28492 10.5962ZM12.7151 10.5962C14.2798 9.17432 14.2798 6.82568 12.7151 5.40378L11.37 6.88391C12.0615 7.51226 12.0615 8.48774 11.37 9.11609L12.7151 10.5962ZM17.0304 0.259933L1.62453 14.2599L2.9696 15.7401L18.3754 1.74007L17.0304 0.259933Z" fill="#4B5563"/>
                        </svg>    
                    </div>
    
                    <div class="w-full  flex flex-col mb-4">
                        <label for="ufr" class="font-medium text-zinc-700">UFR</label>
                        <select name="ufr" id="ufr" class="input-2">
                            <option value="">SET</option>
                            <option value="">SES</option>
                        </select>
                    </div>
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

    {{-- SECOND : FORMULAIRE D'AJOUT D'UN VACATAIRE--}}
    <div class="bg-white border border-zinc-200 rounded-lg px-8 py-6 w-8/12 scale-75 opacity-0 trans-2">
        <div class="flex items-center justify-between">
            <h1 class="font-semibold text-lg text-zinc-800">Ajouter un nouveau Vacataire</h1>
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
                    <div class="w-full flex flex-col relative mb-4">
                        <label for="prenom" class="text-zinc-800 font-medium">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="input-2" placeholder="Ahmada">   
                    </div>
    
                    <div class="w-full flex flex-col relative mb-4">
                        <label for="nom" class="text-zinc-800 font-medium">Nom</label>
                        <input type="text" name="nom" id="nom" class="input-2" placeholder="Gaye">   
                    </div>
                </div>

                <div class="w-full flex gap-4">
                    <div class="w-full  flex flex-col mb-4">
                        <label for="Sexe" class="font-medium text-zinc-800">Sexe</label>
                        <select name="Sexe" id="Sexe" class="input-2">
                            <option value="">Masculin</option>
                            <option value="">Féminin</option>
                        </select>
                    </div>
    
                    <div class="w-full flex flex-col relative mb-4">
                        <label for="email" class="text-zinc-800 font-medium">Adresse email universitaire</label>
                        <input type="text" name="email" id="email" class="input-2" placeholder="Example@univ-thies.sn">
                        <div class="text-[small] text-red-600 font-medium mt-2">Adresse email invalide !</div>
                    </div>
                </div>

                <div class="w-full flex gap-4">
                    <div class="w-full flex flex-col relative mb-4">
                        <label for="tel" class="text-zinc-800 font-medium">Numéro de téléphone</label>
                        <input type="tel" name="tel" id="tel" class="input-2" placeholder="784532081">   
                    </div>
    
                    <div class="w-full  flex flex-col mb-4">
                        <label for="situation" class="font-medium text-zinc-800">Situation</label>
                        <select name="situation" id="situation" class="input-2">
                            <option value="">Véhiculé</option>
                            <option value="">Nom</option>
                        </select>
                    </div>
                </div>


                <div class="w-full flex gap-4">
                    
                    <div class="w-full  flex flex-col mb-4">
                        <label for="ufr" class="font-medium text-zinc-700">Provenance</label>
                        <select name="ufr" id="ufr" class="input-2">
                            <option value="">SET</option>
                            <option value="">SES</option>
                            <option value="">SET</option>
                            <option value="">SES</option>
                            <option value="">SET</option>
                            <option value="">SES</option>
                            <option value="">SET</option>
                            <option value="">SES</option>
                            <option value="">SET</option>
                            <option value="">SES</option>
                            <option value="">SET</option>
                            <option value="">SES</option>
                            <option value="">SET</option>
                            <option value="">SES</option>
                        </select>
                    </div>

                    <div class="w-full  flex flex-col mb-4">
                        <label for="ufr" class="font-medium text-zinc-700">Statut</label>
                        <select name="ufr" id="ufr" class="input-2">
                            <option value="">Actif</option>
                            <option value="">Inactif</option>
                        </select>
                    </div>
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

    {{-- THIRD : FORMULAIRE D'AJOUT D'UN COURS--}}
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


    {{-- THIRD : FORMULAIRE D'AJOUT D'UN COURS--}}
    <div class="bg-white border border-zinc-200 rounded-lg px-8 py-6 w-7/12 scale-75 opacity-0 trans-2">
        <div class="flex items-center justify-between">
            <h1 class="font-semibold text-lg text-zinc-800">nouvelle Activité</h1>
            <div class="icon-hover-2 cursor-pointer" id="closer" >
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L1 13M13 13L1 1.00001" stroke="#111111" stroke-width="2" stroke-linecap="round"/>
                </svg>                    
            </div>
        </div>
        <form action="" method="" class="m-0 mt-6">
            @csrf

            <div class="mb-10 ">
                <div class="w-full flex flex-col relative mb-4">
                    <label for="titre" class="text-zinc-800 font-medium">Titre</label>
                    <input type="text" name="titre" id="titre" class="input-2" placeholder="Sortie Pédagogique">   
                </div>

                <div class="w-full flex gap-4">
                    <div class="w-full flex flex-col relative mb-4">
                        <label for="ticket" class="text-zinc-800 font-medium">Tickets sollicités</label>
                        <div class="w-full relative ">
                            <input type="number" name="ticket" id="ticket" value="5" class="input-2 w-full">
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
                        <label for="vacataire" class="font-medium text-zinc-800">Région</label>
                        <select name="vacataire" id="vacataire" class="input-2">
                            <option value="">Dakar</option>
                            <option value="">Thies</option>
                            <option value="">Kaolack</option>
                            <option value="">Saint-louis</option>
                        </select>
                    </div>
                </div>

                <div class="w-full flex gap-4">
                    <div class="w-full flex flex-col relative mb-4">
                        <label for="adresse" class="text-zinc-800 font-medium">Adresse</label>
                        <input type="text" name="adresse" id="adresse" class="input-2" placeholder="">   
                    </div>

                    <div class="w-full  flex flex-col mb-4">
                        <label for="date" class="font-medium text-zinc-700">Date</label>
                        <input type="date" name="date" id="date" class="input-2">
                    </div>
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

    
</div>

<template id="template-1">
    
</template>
    

