{{-- @php
function hasErrors(){
    $prenom = session()->has('prenom');
    $nom = session()->has('nom');
    $email = session()->has('email');
    $telephone = session()->has('telephone');
    $password = session()->has('password');

    return $prenom || $nom || $email || $telephone || $password ? true : false;
}
@endphp

@if (hasErrors())
    {{ hasErrors() }}
@endif --}}





@extends('base')

@section('section')
    <section class="px-6 min-h-screen h-screen ">

        <div class="px-4 py-3 bg-white rounded-md border border-zinc-200 flex items-center justify-between mb-4">
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
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 10V10.75C1 11.3467 1.23705 11.919 1.65901 12.341C2.08097 12.7629 2.65326 13 3.25 13H10.75C11.3467 13 11.919 12.7629 12.341 12.341C12.7629 11.919 13 11.3467 13 10.75V10M10 4L7 1M7 1L4 4M7 1V10" stroke="#52525B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="font-medium">csv</span>
                </button>

                <button  type="menu" class="btn-1 bg-zinc-800 text-white border border-zinc-800" id="new-user" onclick="displayContainer()">
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="">
                        <path d="M6.5 1.30493V12.3049M12 6.80493L1 6.80493" stroke="white" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Utilisateur
                </button>
            </div>
        </div>

    <div class="text-green-500" id="success"></div>

        <div class="bg-white rounded-md border border-zinc-200 relative">
            {{-- t-head --}}
            <div class="flex items-center text-sm text-zinc-400 font-nunito font-bold py-5 border-b border-b-zinc-200 ">
                {{-- cols --}}
                <span class="px-4">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
                    </svg>
                </span>
                <span class="basis-[23%] pr-4 grow">PRENOM & NOM</span>
                <span class="basis-[25%] pr-4 grow">EMAIL</span>
                <span class="basis-[170px] pr-4">TELEPHONE</span>
                <span class="basis-[15%] pr-4">ROLE</span>
                <span class="basis-[100px] pr-4">UFR</span>
                <span class="basis-[130px] pr-4">STATUT</span>
                <span class="basis-[210px] text-center">ACTION</span>
            </div>
            {{-- t-body --}}
            <div>
                {{-- rows 1 --}}
                @foreach($users as $user)


                <div class="flex items-center text-sm text-zinc-500 font-medium py-4 border-b border-b-zinc-200 ">
                    {{-- cols --}}
                    <span class="px-4">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
                        </svg>
                    </span>
                    <span class="basis-[23%]  pr-4 grow flex items-center gap-2">
                        @if($user->image)
                            <img src="{{ asset('storage/'.$user->image) }}" alt="" class="w-8 h-8 object-cover rounded-full object-center" >
                        @else
                            <img src="{{ asset('images/user.png') }}" alt="" class="w-8 h-8 object-cover rounded-full object-center" >
                        @endif
                       {{$user->prenom }} {{$user->nom}}
                    </span>
                    <span class="basis-[25%]  pr-4 grow">{{$user->email}}</span>
                    @if($user->telephone)
                    <span class="basis-[170px] pr-4 ">{{$user->telephone}}</span>
                    @else
                        <span class="w-[170px] pr-4 ">Pas disponible</span>
                    @endif
                    <span class="basis-[15%]  pr-4 capitalize">{{$user->role}}</span>
                    <span class="basis-[100px]">SET</span>
                    @if($user->status==1)
                    <span class="basis-[130px]  pr-4 flex items-center">
                        <span class="w-2 h-2 rounded-full bg-green-500 block mr-2"></span>
                        <span class="font-semibold text">Active</span>
                    </span>
                    @else
                        <span class="basis-[130px]  pr-4 flex items-center">
                        <span class="w-2 h-2 rounded-full bg-zinc-400 block mr-2"></span>
                        <span class="font-semibold text-zinc-400">Inactive</span>
                    </span>
                    @endif
                    <span class="flex basis-[210px] justify-center">
                        <form action="" method="" class="border border-zinc-200 px-3 py-1.5 rounded-l-lg bg-zinc-100 m-0">
                            <button type="submit">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.16755 2.78381H2.76216C2.2948 2.78381 1.84659 2.96947 1.51612 3.29994C1.18566 3.63041 1 4.07862 1 4.54597V14.2378C1 14.7052 1.18566 15.1534 1.51612 15.4839C1.84659 15.8143 2.2948 16 2.76216 16H12.454C12.9214 16 13.3696 15.8143 13.7001 15.4839C14.0305 15.1534 14.2162 14.7052 14.2162 14.2378V9.83245M12.9703 1.53797C13.1329 1.36966 13.3273 1.23542 13.5423 1.14306C13.7573 1.05071 13.9886 1.0021 14.2225 1.00007C14.4565 0.998033 14.6885 1.04262 14.9051 1.13122C15.1217 1.21982 15.3184 1.35067 15.4839 1.51612C15.6493 1.68158 15.7802 1.87833 15.8688 2.09489C15.9574 2.31145 16.002 2.54349 15.9999 2.77747C15.9979 3.01145 15.9493 3.24268 15.8569 3.45767C15.7646 3.67266 15.6303 3.8671 15.462 4.02966L7.89709 11.5946H5.4054V9.10291L12.9703 1.53797Z" stroke="#737373" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </form>
                        <form action="{{route('delete.user')}}" method="post" class="border border-zinc-200 px-3 py-1.5 rounded-r-lg bg-zinc-100 m-0">
                            @csrf
                            @method('delete')
                            <button>
                                <input type="hidden" value="{{$user->id}}" name="id">
                                <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.875 7.66667V12.6667M9.125 7.66667V12.6667M1 4.33333H14M13.1875 4.33333L12.4831 14.4517C12.4539 14.8722 12.2704 15.2657 11.9697 15.553C11.6689 15.8403 11.2731 16 10.8621 16H4.13787C3.72686 16 3.33112 15.8403 3.03034 15.553C2.72957 15.2657 2.54612 14.8722 2.51694 14.4517L1.8125 4.33333H13.1875ZM9.9375 4.33333V1.83333C9.9375 1.61232 9.8519 1.40036 9.69952 1.24408C9.54715 1.0878 9.34049 1 9.125 1H5.875C5.65951 1 5.45285 1.0878 5.30048 1.24408C5.1481 1.40036 5.0625 1.61232 5.0625 1.83333V4.33333H9.9375Z" stroke="#F87171" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </form>
                    </span>
                </div>

                @endforeach
            </div>

            {{-- pagination --}}
            @include('partials.pagination')

        </div>
    </section>
@endsection

{{-- FORMULAIRE D'AJOUT D'UN NOUVEL UTILISATEUR --}}
@section('new-user')
<div class="bg-white border border-zinc-200 rounded-lg px-8 py-6 w-8/12 scale-75 opacity-0 trans-2 font-mtrph">

    <div class="flex items-center justify-between">
        <h1 class="font-semibold text-lg text-zinc-800">Ajouter un nouveau utilisateur</h1>
        <div class="icon-hover-2 cursor-pointer" id="closer" >
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 1L1 13M13 13L1 1.00001" stroke="#111111" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
    </div>
    <form action="{{route('add.user')}}" method="post" class="m-0 mt-6" id="subscription">
        @csrf

        <div class="mb-10 ">
            <div class="w-full flex gap-4">
                <div class="w-full flex flex-col relative mb-4">
                    <label for="prenom" class="text-zinc-800 font-medium">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="input-2" placeholder="Ahmada">
                    {{-- erreur gerée en js --}}
                    <div class="text-sm text-red-600 font-medium mt-2">
                    </div>
                </div>

                <div class="w-full flex flex-col relative mb-4">
                    <label for="nom" class="text-zinc-800 font-medium">Nom</label>
                    <input type="text" name="nom" id="nom" class="input-2" placeholder="Gaye">
                    {{-- erreur gerée en js --}}
                    <div class="text-sm text-red-600 font-medium mt-2">
                    </div>
                </div>

            </div>

            <div class="w-full flex gap-4">
                <div class="w-full  flex flex-col mb-4">
                    <label for="Sexe" class="font-medium text-zinc-800">Sexe</label>
                    <select name="sexe" id="Sexe" class="input-2">
                        <option value="M">Masculin</option>
                        <option value="F">Féminin</option>
                    </select>

                </div>

                <div class="w-full flex flex-col relative mb-4">
                    <label for="email" class="text-zinc-800 font-medium">Adresse email universitaire</label>
                    <input type="text" name="email" id="email" class="input-2" placeholder="Example@univ-thies.sn">
                    {{-- erreur gerée en js --}}
                    <div class="text-sm text-red-600 font-medium mt-2">
                    </div>
                </div>

            </div>

            <div class="w-full flex gap-4">
                <div class="w-full flex flex-col relative mb-4">
                    <label for="telephone" class="text-zinc-800 font-medium">Numéro de téléphone</label>
                    <input type="telephone" name="telephone" id="telephone" class="input-2" placeholder="784532081">
                    {{-- erreur gerée en js --}}
                    <div class="text-sm text-red-600 font-medium mt-2">
                    </div>
                </div>

                <div class="w-full  flex flex-col mb-4">
                    <label for="role" class="font-medium text-zinc-800">Rôle</label>
                    <select name="role" id="role" class="input-2">
                        <option value="admin">Admin</option>
                        <option value="directeur">Directeur</option>
                        <option value="assistant">Assistant</option>
                        <option value="comptable">Comptable</option>
                        <option value="chef_departement">Chef De Département</option>
                    </select>
                </div>
            </div>


            <div class="w-full flex gap-4">
                <div class="w-1/2 flex flex-col relative mb-4">
                    <label for="password" class="text-zinc-700 font-medium">Mot de passe par défaut</label>
                    <input type="password" name="password" id="password" class="input-2" placeholder="***************">
                    {{-- erreur gerée en js --}}
                    <div class="text-sm text-red-600 font-medium mt-2">
                    </div>
                    <svg width="16" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute right-4 top-[43px] hidden cursor-pointer">
                        <path d="M1.24666 9.17176C0.917778 8.42865 0.917778 7.57136 1.24666 6.82824C2.76905 3.38843 6.11596 1 10 1C13.884 1 17.2309 3.38843 18.7533 6.82824C19.0822 7.57136 19.0822 8.42865 18.7533 9.17176C17.2309 12.6116 13.884 15 10 15C6.11596 15 2.76905 12.6116 1.24666 9.17176Z" stroke="#4B5563" stroke-width="2"/>
                        <path d="M12.8886 8C12.8886 9.65685 11.5953 11 10 11C8.40467 11 7.11141 9.65685 7.11141 8C7.11141 6.34315 8.40467 5 10 5C11.5953 5 12.8886 6.34315 12.8886 8Z" stroke="#4B5563" stroke-width="2"/>
                    </svg>
                    <svg width="16" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute right-4 top-[43px] cursor-pointer">
                        <path d="M1.24667 6.97471L2.13901 7.42607L2.13901 7.42607L1.24667 6.97471ZM18.7533 9.02529L17.861 8.57394L17.861 8.57394L18.7533 9.02529ZM1.24667 9.02529L0.35432 9.47665L0.354321 9.47665L1.24667 9.02529ZM18.7533 6.97471L17.861 7.42606L17.861 7.42606L18.7533 6.97471ZM15.7296 2.41076C15.2535 2.13087 14.6406 2.28995 14.3607 2.76606C14.0808 3.24217 14.2399 3.85503 14.716 4.13491L15.7296 2.41076ZM5.32457 11.8888C4.84697 11.6115 4.23497 11.7738 3.95763 12.2514C3.6803 12.729 3.84264 13.341 4.32024 13.6184L5.32457 11.8888ZM1.52637 11.263C1.87829 11.6887 2.50862 11.7485 2.93427 11.3966C3.35992 11.0446 3.41969 10.4143 3.06778 9.98866L1.52637 11.263ZM11.7443 3.03344C12.2874 3.13363 12.809 2.77456 12.9091 2.23144C13.0093 1.68832 12.6503 1.16681 12.1071 1.06662L11.7443 3.03344ZM18.3754 1.74007C18.7842 1.36864 18.8144 0.736195 18.443 0.327467C18.0716 -0.0812608 17.4391 -0.111497 17.0304 0.259933L18.3754 1.74007ZM1.62453 14.2599C1.21581 14.6314 1.18557 15.2638 1.557 15.6725C1.92843 16.0813 2.56087 16.1115 2.9696 15.7401L1.62453 14.2599ZM10 0.875C5.76284 0.875 2.05748 3.15614 0.35432 6.52336L2.13901 7.42607C3.48063 4.77362 6.46908 2.875 10 2.875V0.875ZM10 15.125C14.2372 15.125 17.9425 12.8439 19.6457 9.47664L17.861 8.57394C16.5194 11.2264 13.5309 13.125 10 13.125V15.125ZM0.35432 6.52336C-0.118107 7.45737 -0.118107 8.54264 0.35432 9.47665L2.13901 8.57394C1.95366 8.2075 1.95366 7.79251 2.13901 7.42607L0.35432 6.52336ZM17.861 7.42606C18.0463 7.7925 18.0463 8.20749 17.861 8.57394L19.6457 9.47664C20.1181 8.54264 20.1181 7.45737 19.6457 6.52336L17.861 7.42606ZM19.6457 6.52336C18.786 4.82376 17.4151 3.4016 15.7296 2.41076L14.716 4.13491C16.0922 4.94387 17.185 6.08969 17.861 7.42606L19.6457 6.52336ZM4.32024 13.6184C5.96758 14.5749 7.91735 15.125 10 15.125V13.125C8.27084 13.125 6.66747 12.6686 5.32457 11.8888L4.32024 13.6184ZM0.354321 9.47665C0.676621 10.1138 1.07087 10.7121 1.52637 11.263L3.06778 9.98866C2.70418 9.54888 2.39236 9.07482 2.13901 8.57394L0.354321 9.47665ZM12.1071 1.06662C11.4252 0.94083 10.7205 0.875 10 0.875V2.875C10.5985 2.875 11.1818 2.92968 11.7443 3.03344L12.1071 1.06662ZM7.28492 10.5962C8.79437 11.9679 11.2056 11.9679 12.7151 10.5962L11.37 9.11609C10.6233 9.79464 9.37667 9.79464 8.62999 9.11609L7.28492 10.5962ZM12.7151 10.5962C14.2798 9.17432 14.2798 6.82568 12.7151 5.40378L11.37 6.88391C12.0615 7.51226 12.0615 8.48774 11.37 9.11609L12.7151 10.5962ZM17.0304 0.259933L1.62453 14.2599L2.9696 15.7401L18.3754 1.74007L17.0304 0.259933Z" fill="#4B5563"/>
                    </svg>
                </div>
            </div>


        </div>
        <div class="flex gap-4 items-center">
            <button type="submit" id="submit" class="px-6 py-2.5 rounded-lg bg-zinc-800 text-white font-medium flex justify-center items-center gap-2">
                Ajouter
            </button>
            <button type="reset" class="px-6 py-2.5 rounded-lg bg-zinc-100 text-zinc-800 font-medium flex justify-center items-center gap-2">
                Restaurer
            </button>
        </div>
    </form>
</div>
@endsection





