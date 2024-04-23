@extends('base')

@section('section')
    <section class="px-6 grid grid-cols-8 grid-rows-[170px_repeat(4,_minmax(0,_1fr))] gap-7">
        <div class="grid col-span-8 row-span-1 grid-cols-4 gap-x-7 *:p-6">
            <div class="bg-white rounded-3xl shadow_3 flex flex-col justify-between">
                <div class=" flex items-start justify-between">
                    <div>
                        <p class="mb-3 py-1 font-medium">Vacataires</p>
                        <h1 class="text-3xl font-bold text-zinc-800">{{$total_vacataires}}</h1>
                    </div>
                    <span class="bg-zinc-100 px-2.5 py-1.5 rounded-xl flex items-center justify-center h-12 w-12">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" color="#52525b" fill="none">
                            <path d="M12 22L10 16H2L4 22H12ZM12 22H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 13V12.5C12 10.6144 12 9.67157 11.4142 9.08579C10.8284 8.5 9.88562 8.5 8 8.5C6.11438 8.5 5.17157 8.5 4.58579 9.08579C4 9.67157 4 10.6144 4 12.5V13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M19 13C19 14.1046 18.1046 15 17 15C15.8954 15 15 14.1046 15 13C15 11.8954 15.8954 11 17 11C18.1046 11 19 11.8954 19 13Z" stroke="currentColor" stroke-width="1.5" />
                            <path d="M10 4C10 5.10457 9.10457 6 8 6C6.89543 6 6 5.10457 6 4C6 2.89543 6.89543 2 8 2C9.10457 2 10 2.89543 10 4Z" stroke="currentColor" stroke-width="1.5" />
                            <path d="M14 17.5H20C21.1046 17.5 22 18.3954 22 19.5V20C22 21.1046 21.1046 22 20 22H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>                                                            
                    </span>
                </div>
                <div class="flex gap-1 items-center text-[small]">
                    <svg width="14" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13L7.64645 6.35355C7.84171 6.15829 8.15829 6.15829 8.35355 6.35355L11.6464 9.64645C11.8417 9.84171 12.1583 9.84171 12.3536 9.64645L20 2M15 1H20.5C20.7761 1 21 1.22386 21 1.5V7" stroke="#34d399" stroke-width="2" stroke-linecap="round"/>
                    </svg>                        
                    <p><span class="text-emerald-400 mr-2">+{{$percent_vacataires_add_on_month}}%</span>de vacataires ajoutés</p>
                </div>
                    
            </div>

            <div class="bg-white rounded-3xl shadow_3 flex flex-col justify-between">
                <div class=" flex items-start justify-between">
                    <div>
                        <p class="mb-3 font-medium py-1">Active</p>
                        <h1 class="text-3xl font-bold text-zinc-800">{{$vacataires_active}}</h1>
                    </div>
                    <span class="bg-green-100 px-2.5 py-1.5 rounded-xl flex items-center justify-center h-12 w-12">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" color="#4ade80" fill="none">
                            <path d="M12 22L10 16H2L4 22H12ZM12 22H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 13V12.5C12 10.6144 12 9.67157 11.4142 9.08579C10.8284 8.5 9.88562 8.5 8 8.5C6.11438 8.5 5.17157 8.5 4.58579 9.08579C4 9.67157 4 10.6144 4 12.5V13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M19 13C19 14.1046 18.1046 15 17 15C15.8954 15 15 14.1046 15 13C15 11.8954 15.8954 11 17 11C18.1046 11 19 11.8954 19 13Z" stroke="currentColor" stroke-width="1.5" />
                            <path d="M10 4C10 5.10457 9.10457 6 8 6C6.89543 6 6 5.10457 6 4C6 2.89543 6.89543 2 8 2C9.10457 2 10 2.89543 10 4Z" stroke="currentColor" stroke-width="1.5" />
                            <path d="M14 17.5H20C21.1046 17.5 22 18.3954 22 19.5V20C22 21.1046 21.1046 22 20 22H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </span>
                </div>
                <div class="flex gap-1 items-center text-[small]">
                    <svg width="14" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13L7.64645 6.35355C7.84171 6.15829 8.15829 6.15829 8.35355 6.35355L11.6464 9.64645C11.8417 9.84171 12.1583 9.84171 12.3536 9.64645L20 2M15 1H20.5C20.7761 1 21 1.22386 21 1.5V7" stroke="#34d399" stroke-width="2" stroke-linecap="round"/>
                    </svg>                        
                    <p><span class="text-emerald-400 mr-2">+{{$percent_vac_active}}%</span>de vacataires actifs</p>
                </div>
                    
            </div>


            <div class="bg-white rounded-3xl shadow_3 flex flex-col justify-between">
                <div class=" flex items-start justify-between">
                    <div>
                        <p class="mb-3 font-medium py-1">Non approuvé</p>
                        <h1 class="text-3xl font-bold text-zinc-800">{{$sceance_cours_non_approuve}}</h1>
                    </div>
                    <span class="bg-red-100 px-2.5 py-1.5 rounded-xl flex items-center justify-center h-12 w-12">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" color="#f87171" fill="none">
                            <path d="M7.5 4.94531H16C16.8284 4.94531 17.5 5.61688 17.5 6.44531V7.94531" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15 12.9453H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 16.9453H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M18.497 2L6.30767 2.00002C5.81071 2.00002 5.30241 2.07294 4.9007 2.36782C3.62698 3.30279 2.64539 5.38801 4.62764 7.2706C5.18421 7.7992 5.96217 7.99082 6.72692 7.99082H18.2835C19.077 7.99082 20.5 8.10439 20.5 10.5273V17.9812C20.5 20.2007 18.7103 22 16.5026 22H7.47246C5.26886 22 3.66619 20.4426 3.53959 18.0713L3.5061 5.16638" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>                          
                    </span>
                </div>
                <div class="flex gap-1 items-center text-[small]">
                    <svg width="14" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13L7.64645 6.35355C7.84171 6.15829 8.15829 6.15829 8.35355 6.35355L11.6464 9.64645C11.8417 9.84171 12.1583 9.84171 12.3536 9.64645L20 2M15 1H20.5C20.7761 1 21 1.22386 21 1.5V7" stroke="#34d399" stroke-width="2" stroke-linecap="round"/>
                    </svg>                        
                    <p><span class="text-emerald-400 mr-2">+{{$percent_cours_non_approuve}}%</span>de cours à approuver</p>
                </div>
                    
            </div>


            <div class="bg-white rounded-3xl shadow_3 flex flex-col justify-between">
                <div class=" flex items-start justify-between">
                    <div>
                        <p class="mb-3 font-medium py-1">Demandes</p>
                        <h1 class="text-3xl font-bold text-zinc-800">{{$total_demandes}}</h1>
                    </div>
                    <span class="bg-amber-100 px-2.5 py-1.5 rounded-xl flex items-center justify-center h-12 w-12">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32" color="#fbbf24" fill="none">
                            <path d="M7.5 4.94531H16C16.8284 4.94531 17.5 5.61688 17.5 6.44531V7.94531" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15 12.9453H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 16.9453H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M18.497 2L6.30767 2.00002C5.81071 2.00002 5.30241 2.07294 4.9007 2.36782C3.62698 3.30279 2.64539 5.38801 4.62764 7.2706C5.18421 7.7992 5.96217 7.99082 6.72692 7.99082H18.2835C19.077 7.99082 20.5 8.10439 20.5 10.5273V17.9812C20.5 20.2007 18.7103 22 16.5026 22H7.47246C5.26886 22 3.66619 20.4426 3.53959 18.0713L3.5061 5.16638" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>                           
                    </span>
                </div>
                <div class="flex gap-1 items-center text-[small]">
                    <svg width="14" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13L7.64645 6.35355C7.84171 6.15829 8.15829 6.15829 8.35355 6.35355L11.6464 9.64645C11.8417 9.84171 12.1583 9.84171 12.3536 9.64645L20 2M15 1H20.5C20.7761 1 21 1.22386 21 1.5V7" stroke="#34d399" stroke-width="2" stroke-linecap="round"/>
                    </svg>                        
                    <p><span class="text-emerald-400 mr-2">+{{$percent_cours_envoye}}%</span>de cours en demande </p>
                </div>
                    
            </div>


           
        </div>
        <div class="bg-white col-span-5 rounded-3xl p-6 row-span-2">
            <div>
                <p class="mb-4 font-medium">Vacataires recemment ajoutés</p>
                
                <div class="relative">
                    {{-- t-head --}}
                    <div class="flex items-center text-sm text-zinc-400 font-nunito font-bold py-5 border-b ">
                        {{-- cols --}}
                        <span class="basis-[28%] pr-4 grow">PRENOM & NOM</span>
                        <span class="basis-[110px] pr-4">UFR</span>
                        <span class="basis-[12%] pr-4 grow">ROLE</span>
                        <span class="basis-[110px] pr-4">STATUT</span>
                    </div>
                    {{-- t-body --}}
                    <div>
                        {{-- rows 1 --}}
                        @foreach($users as $user)
        
        
                        <div class="flex items-center text-sm text-zinc-500 font-medium py-5 border-b border-b-zinc-200">
                            {{-- cols --}}
    
                            <span class="basis-[28%]  pr-4 grow flex items-center gap-4">
                                @if($user->image)
                                    <img src="{{ asset('storage/'.$user->image) }}" alt="" class="w-8 h-8 object-cover rounded-full object-center" >
                                @else
                                    <img src="{{ asset('images/user.png') }}" alt="" class="w-8 h-8 object-cover rounded-full object-center" >
                                @endif
                               {{$user->prenom }} {{$user->nom}}
                            </span>
    
                            <span class="basis-[110px] pr-4">SET</span>

                            <span class="basis-[12%] grow pr-4 capitalize">{{$user->role}}</span>

                            @if($user->status==1)
                            <span class="basis-[110px]  pr-4 flex items-center">
                                <span class="w-2 h-2 rounded-full bg-green-500 block mr-2"></span>
                                <span class="font-semibold text">Active</span>
                            </span>
                            @else
                                <span class="basis-[110px]  pr-4 flex items-center">
                                <span class="w-2 h-2 rounded-full bg-zinc-400 block mr-2"></span>
                                <span class="font-semibold text-zinc-400">Inactive</span>
                            </span>
                            @endif
                        </div>
        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white col-span-3 rounded-3xl p-6 row-span-2">diskpart list disk select diks one list volume detail volume</div>

        <div class="bg-white col-span-8 rounded-3xl p-6 row-span-2">
            <div>
                <p class="mb-4 font-medium">Scéance de cours recemment ajoutés</p>
                
                <div class="relative">
                    {{-- t-head --}}
                    <div class="flex items-center text-sm text-zinc-400 font-bold py-6 border-b border-b-zinc-200 font-nunito">
                        {{-- cols --}}
                        <span class="basis-[24%] grow pr-4">PRENOM & NOM</span>
                        <span class="basis-[25%] grow pr-4">EMAIL</span>
                        <span class="basis-[15%] grow pr-4">TELEPHONE</span>
                        <span class="basis-[160px] pr-4">PROVENANCE</span>
                        <span class="basis-[150px] text-center">SITUATION</span>
                        <span class="basis-[130px] text-center">STATUT</span>
                    </div>
                    {{-- t-body --}}
                    <div>
                        {{-- rows 1 --}}
                        @foreach($vacataires as $vacataire)
                        <div class="flex items-center text-sm py-6 font-medium border-b border-b-zinc-200">
                            {{-- cols --}}
                            <span class="basis-[24%] grow pr-4">
                                {{$vacataire->prenom}}  {{$vacataire->nom}}
                            </span>
                            <span class="basis-[25%] grow pr-4"> {{$vacataire->email}} </span>
                            <span class="basis-[15%] grow pr-4"> {{$vacataire->telephone}} </span>
                            <span class="basis-[160px] font-medium pr-4"> {{$vacataire->provenance}} </span>
                            <span class="basis-[150px] flex">
                                <span class="flex mx-auto @if($vacataire->situation)  bg-blue-100 text-blue-500 @else bg-fuchsia-100 text-fuchsia-500 @endif  px-4 py-1 rounded font-semibold text-xs">
                                    @if($vacataire->situation)  Véhiculé @else Non @endif
                                </span>
                            </span>
                            @if($vacataire->status=='1')
                            <span class="basis-[130px] flex items-center justify-center">
                                <span class="w-2 h-2 rounded-full bg-green-500 block mr-2"></span>
                                <span class="font-semibold text">Active</span>
                            </span>
                            @else
                                <span class="basis-[130px] flex items-center justify-center">
                                <span class="w-2 h-2 rounded-full bg-zinc-400 block mr-2"></span>
                                <span class="font-semibold text-zinc-400">Inactif</span>
                            </span>
                            @endif
                        </div>
                        @endforeach
        
        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@endsection
