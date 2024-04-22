@extends('base')

@section('section')
    <section class="px-6 grid grid-cols-8 grid-rows-[170px_repeat(4,_minmax(200px,_1fr))] gap-7">
        <div class="grid col-span-8 row-span-1 grid-cols-4 gap-x-7 *:p-6">
            <div class="bg-white rounded-3xl shadow_3 flex flex-col justify-between">
                <div class=" flex items-start justify-between">
                    <div>
                        <p class="mb-3 py-1 font-medium">Demandes</p>
                        <h1 class="text-3xl font-bold text-zinc-800">58</h1>
                    </div>
                    <span class="bg-zinc-100 px-2.5 py-1.5 rounded-xl flex items-center justify-center h-12 w-12">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" color="#52525b" fill="none">
                            <path d="M13.4659 4.02246C15.9701 4.02246 18 6.03463 18 8.51676C18 10.9989 15.9701 13.0111 13.4659 13.0111C11.2439 13.0111 9.39528 11.4269 9.00684 9.33581" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M21.9977 14.0098H19.6047C19.3107 14.0098 19.0208 14.076 18.7579 14.2031L16.7176 15.1899C16.4547 15.317 16.1648 15.3831 15.8708 15.3831H14.829C13.8214 15.3831 13.0045 16.1732 13.0045 17.1478C13.0045 17.1871 13.0315 17.2218 13.0706 17.2326L15.6096 17.9343C16.0651 18.0601 16.5528 18.0163 16.9765 17.8113L19.1577 16.7566M13.0045 16.5066L8.41518 15.0973C7.6016 14.8439 6.72215 15.1443 6.21251 15.8497C5.84403 16.3597 5.99406 17.0901 6.53091 17.3997L14.0408 21.7305C14.5184 22.0059 15.082 22.0731 15.6073 21.9173L21.9977 20.022" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2.00195 4.51946C3.52934 3.92192 5.70251 2.46381 6.89042 2.16488C9.52307 1.63627 10.9042 2.41475 14.0218 4.02328C12.7097 4.05108 10.9458 4.8019 10.0777 6.51749M10.0777 6.51749H8.29356M10.0777 6.51749H11.3866C11.7803 6.54609 12.6286 6.78318 12.9555 7.54414C13.0867 7.84952 13.1241 8.21246 12.8665 8.39582C12.5192 8.7541 12.0207 8.74007 11.5785 8.81844M11.5785 8.81844C11.071 8.90838 10.5821 9.00828 10.071 9.1077M11.5785 8.81844L10.071 9.1077M10.071 9.1077C9.95817 9.12964 9.84428 9.15156 9.72886 9.17335M10.071 9.1077L9.72886 9.17335M9.72886 9.17335C8.93219 9.26231 6.99002 10.1914 6.04417 10.4516C5.72222 10.6054 3.14121 11.1057 2.01609 11.0179" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>                                                            
                    </span>
                </div>
                <div class="flex gap-1 items-center text-[small]">
                    <svg width="14" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13L7.64645 6.35355C7.84171 6.15829 8.15829 6.15829 8.35355 6.35355L11.6464 9.64645C11.8417 9.84171 12.1583 9.84171 12.3536 9.64645L20 2M15 1H20.5C20.7761 1 21 1.22386 21 1.5V7" stroke="#34d399" stroke-width="2" stroke-linecap="round"/>
                    </svg>                        
                    <p><span class="text-emerald-400 mr-2">+68%</span><span>de demandes</span></p>
                </div>
                    
            </div>


            <div class="bg-white rounded-3xl shadow_3 flex flex-col justify-between">
                <div class=" flex items-start justify-between">
                    <div>
                        <p class="mb-3 font-medium py-1">Non approuvé</p>
                        <h1 class="text-3xl font-bold text-zinc-800">34</h1>
                    </div>
                    <span class="bg-red-100 px-2.5 py-1.5 rounded-xl flex items-center justify-center h-12 w-12">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" color="#f87171" fill="none">
                            <path d="M13.4659 4.02246C15.9701 4.02246 18 6.03463 18 8.51676C18 10.9989 15.9701 13.0111 13.4659 13.0111C11.2439 13.0111 9.39528 11.4269 9.00684 9.33581" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M21.9977 14.0098H19.6047C19.3107 14.0098 19.0208 14.076 18.7579 14.2031L16.7176 15.1899C16.4547 15.317 16.1648 15.3831 15.8708 15.3831H14.829C13.8214 15.3831 13.0045 16.1732 13.0045 17.1478C13.0045 17.1871 13.0315 17.2218 13.0706 17.2326L15.6096 17.9343C16.0651 18.0601 16.5528 18.0163 16.9765 17.8113L19.1577 16.7566M13.0045 16.5066L8.41518 15.0973C7.6016 14.8439 6.72215 15.1443 6.21251 15.8497C5.84403 16.3597 5.99406 17.0901 6.53091 17.3997L14.0408 21.7305C14.5184 22.0059 15.082 22.0731 15.6073 21.9173L21.9977 20.022" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2.00195 4.51946C3.52934 3.92192 5.70251 2.46381 6.89042 2.16488C9.52307 1.63627 10.9042 2.41475 14.0218 4.02328C12.7097 4.05108 10.9458 4.8019 10.0777 6.51749M10.0777 6.51749H8.29356M10.0777 6.51749H11.3866C11.7803 6.54609 12.6286 6.78318 12.9555 7.54414C13.0867 7.84952 13.1241 8.21246 12.8665 8.39582C12.5192 8.7541 12.0207 8.74007 11.5785 8.81844M11.5785 8.81844C11.071 8.90838 10.5821 9.00828 10.071 9.1077M11.5785 8.81844L10.071 9.1077M10.071 9.1077C9.95817 9.12964 9.84428 9.15156 9.72886 9.17335M10.071 9.1077L9.72886 9.17335M9.72886 9.17335C8.93219 9.26231 6.99002 10.1914 6.04417 10.4516C5.72222 10.6054 3.14121 11.1057 2.01609 11.0179" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>                           
                    </span>
                </div>
                <div class="flex gap-1 items-center text-[small]">
                    <svg width="14" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13L7.64645 6.35355C7.84171 6.15829 8.15829 6.15829 8.35355 6.35355L11.6464 9.64645C11.8417 9.84171 12.1583 9.84171 12.3536 9.64645L20 2M15 1H20.5C20.7761 1 21 1.22386 21 1.5V7" stroke="#34d399" stroke-width="2" stroke-linecap="round"/>
                    </svg>                        
                    <p><span class="text-emerald-400 mr-2">+45%</span>de demandes à approuver</p>
                </div>
                    
            </div>


            <div class="bg-white rounded-3xl shadow_3 flex flex-col justify-between">
                <div class=" flex items-start justify-between">
                    <div>
                        <p class="mb-3 font-medium py-1">Activités</p>
                        <h1 class="text-3xl font-bold text-zinc-800">48</h1>
                    </div>
                    <span class="bg-green-100 px-2.5 py-1.5 rounded-xl flex items-center justify-center h-12 w-12">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" color="#4ade80" fill="none">
                            <path d="M18 2V4M6 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10 17L9.99999 13.3472C9.99999 13.1555 9.86325 13 9.69458 13H9M13.6297 17L14.9842 13.3492C15.0475 13.1785 14.9128 13 14.7207 13H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M2.5 12.2432C2.5 7.88594 2.5 5.70728 3.75212 4.35364C5.00424 3 7.01949 3 11.05 3H12.95C16.9805 3 18.9958 3 20.2479 4.35364C21.5 5.70728 21.5 7.88594 21.5 12.2432V12.7568C21.5 17.1141 21.5 19.2927 20.2479 20.6464C18.9958 22 16.9805 22 12.95 22H11.05C7.01949 22 5.00424 22 3.75212 20.6464C2.5 19.2927 2.5 17.1141 2.5 12.7568V12.2432Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6 8H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <div class="flex gap-1 items-center text-[small]">
                    <svg width="14" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13L7.64645 6.35355C7.84171 6.15829 8.15829 6.15829 8.35355 6.35355L11.6464 9.64645C11.8417 9.84171 12.1583 9.84171 12.3536 9.64645L20 2M15 1H20.5C20.7761 1 21 1.22386 21 1.5V7" stroke="#34d399" stroke-width="2" stroke-linecap="round"/>
                    </svg>                        
                    <p><span class="text-emerald-400 mr-2">+88%</span>d'activités créés </p>
                </div>
                    
            </div>


            <div class="bg-white rounded-3xl shadow_3 flex flex-col justify-between">
                <div class=" flex items-start justify-between">
                    <div>
                        <p class="mb-3 font-medium py-1">Non validée</p>
                        <h1 class="text-3xl font-bold text-zinc-800">22</h1>
                    </div>
                    <span class="bg-amber-100 px-2.5 py-1.5 rounded-xl flex items-center justify-center h-12 w-12">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" color="#fbbf24" fill="none">
                            <path d="M18 2V4M6 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10 17L9.99999 13.3472C9.99999 13.1555 9.86325 13 9.69458 13H9M13.6297 17L14.9842 13.3492C15.0475 13.1785 14.9128 13 14.7207 13H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M2.5 12.2432C2.5 7.88594 2.5 5.70728 3.75212 4.35364C5.00424 3 7.01949 3 11.05 3H12.95C16.9805 3 18.9958 3 20.2479 4.35364C21.5 5.70728 21.5 7.88594 21.5 12.2432V12.7568C21.5 17.1141 21.5 19.2927 20.2479 20.6464C18.9958 22 16.9805 22 12.95 22H11.05C7.01949 22 5.00424 22 3.75212 20.6464C2.5 19.2927 2.5 17.1141 2.5 12.7568V12.2432Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6 8H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>                          
                    </span>
                </div>
                <div class="flex gap-1 items-center text-[small]">
                    <svg width="14" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13L7.64645 6.35355C7.84171 6.15829 8.15829 6.15829 8.35355 6.35355L11.6464 9.64645C11.8417 9.84171 12.1583 9.84171 12.3536 9.64645L20 2M15 1H20.5C20.7761 1 21 1.22386 21 1.5V7" stroke="#34d399" stroke-width="2" stroke-linecap="round"/>
                    </svg>                        
                    <p><span class="text-emerald-400 mr-2">+45%</span>d'activités non validées </p>
                </div>
                    
            </div>


           
        </div>
        <div class="bg-white col-span-5 rounded-3xl p-6 row-span-2">
            <div>
                <p class="mb-4 font-medium">Activités récemment ajoutés</p>
                
                <div class="relative">
                    {{-- t-head --}}
                    <div class="flex items-center text-sm text-zinc-400 font-nunito font-bold py-5 border-b ">
                        {{-- cols --}}
                        <span class="basis-[28%] pr-4 grow">TITRE</span>
                        <span class="basis-[130px] pr-4">DATE</span>
                        <span class="basis-[17%] pr-4 grow">ADRESSE</span>
                        <span class="basis-[10%] pr-4 grow">TICKETS</span>
                        <span class="basis-[150px] text-center">STATUT</span>
                    </div>
                    {{-- t-body --}}
                    <div>
                        {{-- rows 1 --}}
                        @foreach($activites as $item)
        
        
                        <div class="flex items-center text-sm text-zinc-500 font-medium py-5 border-b border-b-zinc-200">
                            {{-- cols --}}
    
                            <span class="basis-[28%]  pr-4 grow flex items-center gap-4">
                                {{ $item->titre }}
                            </span>
    
                            <span class="basis-[130px] pr-4">{{ $item->date }}</span>

                            <span class="basis-[17%] grow pr-4">{{$item->lieux}}</span>

                            @php
                                $ticket = ($item->ticket == 0) ? $item->ticket_demande : $item->ticket;
                            @endphp

                            <span class="basis-[10%] grow pr-4 font-bold">{{ $ticket }}</span>

                            <span class="basis-[150px] flex justify-center">
                                <span class="flex mx-auto @if($item->statut)  bg-green-100 text-green-500 @else bg-fuchsia-100 text-fuchsia-500 @endif  px-4 py-1 rounded font-semibold text-xs">
                                    @if($item->statut)  Validé @else Non @endif
                                </span>
                            </span>
                        </div>
        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white col-span-3 rounded-3xl p-6 row-span-2">diskpart list disk select diks one list volume detail volume</div>

        <div class="bg-white col-span-8 rounded-3xl p-6 row-span-2">
            <div>
                <p class="mb-4 font-medium">Demandes de remboursements récentes</p>
                
                <div class="relative">
                    {{-- t-head --}}
                    <div class="flex items-center text-sm text-zinc-400 font-nunito font-bold py-5 border-b ">
                        {{-- cols --}}
                        <span class="basis-[20%] pr-4 grow">VACATAIRE</span>
                        <span class="basis-[28%] pr-4 grow">MATIERE</span>
                        <span class="basis-[140px] pr-4">HEURES</span>
                        <span class="basis-[140px] pr-4">DATE</span>
                        <span class="basis-[12%] pr-4 grow">TICKETS</span>
                        <span class="basis-[150px] text-center">STATUT</span>
                    </div>
                    {{-- t-body --}}
                    <div>
                        {{-- rows 1 --}}
                        @foreach($remboursements as $item)
        
        
                        <div class="flex items-center text-sm text-zinc-500 font-medium py-5 border-b border-b-zinc-200">
                            {{-- cols --}}
    
                            <span class="basis-[20%] pr-4 grow">{{ $item->cours->vacataire->prenom ." ". $item->cours->vacataire->nom }}</span>
                            <span class="basis-[28%] pr-4 grow">{{ $item->cours->matiere->nom }}</span>
                            <span class="basis-[140px] pr-4">{{ $item->cours->duree }}</span>
                            <span class="basis-[140px] pr-4">{{ $item->cours->date }}</span>
                            <span class="basis-[12%] pr-4 grow">{{ $item->nombre_tickets }} Tickets</span>

                            <span class="basis-[150px] flex justify-center">
                                <span class="flex mx-auto @if($item->statut)  bg-green-100 text-green-500 @else bg-fuchsia-100 text-fuchsia-500 @endif  px-4 py-1 rounded font-semibold text-xs">
                                    @if($item->statut)  Validé @else Non @endif
                                </span>
                            </span>
                        </div>
        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        

        
    </section>
@endsection
