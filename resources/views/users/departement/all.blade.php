@extends('users.departement.cours')

@section('cours')
    @if(session('success'))
        <div class="text-green-500 ">{{session('success')}}</div>
    @endif

    @if ($errors->has('msg'))
        <div class="text-red-600">
            {{ $errors->first('msg') }}
        </div>
    @endif

    <div class="">
        {{-- t-head --}}
        <div class="flex items-center text-sm text-zinc-400 font-nunito font-bold py-4 px-4">
            {{-- cols --}}
            <span class="pr-4">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox"
                 class="cursor-pointer">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z"
                      fill="#1C1C1C" fill-opacity="0.2"/>
            </svg>
        </span>
            <span class="basis-[23%] grow pr-4">VACATAIRE</span>
            <span class="basis-[22%] grow pr-4">EMAIL</span>
            <span class="basis-[160px] pr-4 ">TOTAL</span>
            <span class="basis-[160px] pr-4">PROVENANCE</span>
            <span class="basis-[170px] text-center">SITUATION</span>
            <span class="basis-[170px] text-center">ACTION</span>
        </div>

        {{-- t-body --}}



        {{-- row 1 --}}
        @foreach($vacataires_sceances as $sceance_cour )
            @php
                $total_duree=0;
            @endphp
            <div
                class="text-sm h-20 overflow-hidden font-medium border border-zinc-200 rounded-md px-4 bg-white mb-4 relative transition-[height] duration-150"
                id="super-contain">

                {{-- resume --}}
                <div class="min-h-20 flex items-center border-b border-zinc-200 mb-4">
                    {{-- cols --}}
                    <span class="pr-4">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                     id="checkbox" class="cursor-pointer">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z"
                          fill="#1C1C1C" fill-opacity="0.2"/>
                </svg>
            </span>
                    <span class="basis-[23%] grow pr-4">{{$sceance_cour->prenom." ".$sceance_cour->nom}}</span>
                    <span class="basis-[22%] grow pr-4">{{$sceance_cour->email}}</span>

                    {{--calcul du total d'heure effectuer  par le vacataire--}}

                    @php
                        $total=0;
                        foreach ($sceance_cour->cours as $cour)
                         {
                           $total +=  $cour->duree;
                         }
                    @endphp
                    {{--calcul du total d'heure effectuer  par le vacataire--}}
                    <span class="basis-[160px] font-bold pr-4">{{$total}} Heures</span>
                    <span class="basis-[160px] pr-4">{{$sceance_cour->provenance}}</span>
                    <span class="basis-[170px] flex justify-center">
                <span class="flex mx-auto @if($sceance_cour->situation) bg-blue-100 text-blue-500 @else bg-fuchsia-100
                text-fuchsia-500 @endif px-4 py-1 rounded font-semibold
                text-xs">
                    @if($sceance_cour->situation)
                        Véhiculé
                    @else
                        Non
                    @endif
                </span>
            </span>

                    <span class="basis-[170px] relative flex items-center justify-center gap-4">
                <form action="{{ route('dep.remboursement') }}" method="post" class="m-0">
                    @csrf
                    @foreach($sceance_cour->cours as $cours)
                        <input type="hidden" name="cours_id[]" value="{{$cours->id}}">
                    @endforeach
                    <button class="btn-3 bg-[#00B69B] text-white font-medium">envoyer</button>
                </form>
                {{-- separator --}}
                <div class=" w-0.5 h-6 bg-zinc-200"></div>

                {{--  --}}
                <div class="transition-all duration-300 w-8 h-8 flex items-center justify-center mr-2 icon-hover"
                     id="ch-container">
                    <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg"
                         class="transition-transform rotate-0" id="chevron">
                        <path d="M13.5 1.5L8.20711 6.79289C7.81658 7.18342 7.18342 7.18342 6.79289 6.79289L1.5 1.5"
                              stroke="#9FA6B2" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
            </span>
                </div>

                {{-- detail --}}
                <div class="mx-4">
                    {{-- t-head --}}
                    <div
                        class="flex items-center text-sm text-zinc-800 font-nunito font-bold h-12  bg-[#F1F4F9] rounded">
                        {{-- cols --}}
                        <span class="px-4">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                         id="checkbox" class="cursor-pointer">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z"
                              fill="#1C1C1C" fill-opacity="0.2"/>
                    </svg>
                </span>
                        <span class="pr-4 basis-[23%] grow">Matière</span>
                        <span class="pr-4 basis-[15%] grow">Semestre</span>
                        <span class="pr-4 basis-[22%] grow">Filière</span>
                        <span class="pr-4 basis-[14%] grow">Date</span>
                        <span class="pr-4 basis-[150px]">Durée</span>
                        <span class="basis-[170px] text-center">Statut</span>
                        <span class="basis-[130px] text-center">Action</span>
                    </div>

                    {{-- t-body --}}
                    {{-- rows --}}
                    <div class="max-h-44 overflow-y-scroll">
                        {{-- row 1 --}}

                        @foreach($sceance_cour->cours as $cours)

                            <div class="flex items-center text-sm py-3 border-b min-h-14">
                                {{-- cols --}}
                                <span class="px-4">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                             id="checkbox" class="cursor-pointer">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z"
                                  fill="#1C1C1C" fill-opacity="0.2"/>
                        </svg>
                    </span>
                                <span class="basis-[23%] grow pr-4">{{$cours->matiere->nom}}</span>
                                <span class="basis-[15%] grow pr-4">semestre {{$cours->matiere->semestre}}</span>
                                <span class="basis-[22%] grow pr-4">{{$cours->filiere->nom}}</span>
                                <span class="basis-[14%] grow pr-4">{{date('d/m/Y', strtotime($cours->date))}}</span>
                                <span class="basis-[150px] font-semibold pr-4">{{$cours->duree}} Heure</span>
                                @if($cours->statut)
                                    <span class="basis-[170px] flex justify-center text-xs">
                        <span class="flex mx-auto bg-emerald-100 px-4 text-emerald-500 py-1 rounded font-semibold">Approuvé</span>
                    </span>
                                @else
                                    <span class="basis-[170px] flex justify-center text-xs">
                        <span class="flex mx-auto bg-amber-100 px-4 text-amber-500 py-1 rounded
                        font-semibold">Non</span>
                    </span>
                                @endif
                                <span class="flex basis-[130px] justify-center">
                        <form action="" method=""
                              class="border border-zinc-200 px-3 py-1.5 rounded-l-lg bg-zinc-100 m-0">
                            <button type="submit">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.16755 2.78381H2.76216C2.2948 2.78381 1.84659 2.96947 1.51612 3.29994C1.18566 3.63041 1 4.07862 1 4.54597V14.2378C1 14.7052 1.18566 15.1534 1.51612 15.4839C1.84659 15.8143 2.2948 16 2.76216 16H12.454C12.9214 16 13.3696 15.8143 13.7001 15.4839C14.0305 15.1534 14.2162 14.7052 14.2162 14.2378V9.83245M12.9703 1.53797C13.1329 1.36966 13.3273 1.23542 13.5423 1.14306C13.7573 1.05071 13.9886 1.0021 14.2225 1.00007C14.4565 0.998033 14.6885 1.04262 14.9051 1.13122C15.1217 1.21982 15.3184 1.35067 15.4839 1.51612C15.6493 1.68158 15.7802 1.87833 15.8688 2.09489C15.9574 2.31145 16.002 2.54349 15.9999 2.77747C15.9979 3.01145 15.9493 3.24268 15.8569 3.45767C15.7646 3.67266 15.6303 3.8671 15.462 4.02966L7.89709 11.5946H5.4054V9.10291L12.9703 1.53797Z"
                                        stroke="#737373" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </form>
                        @php
                            $id = $cours->id;
                        @endphp
                        <form action="{{route('cours.delete',compact('id'))}}" method="post"
                              class="border border-zinc-200 px-3 py-1.5 rounded-r-lg bg-zinc-100 m-0">
                            @csrf
                            @method('delete')
                            <button>
                                <svg width="15" height="17" viewBox="0 0 15 17" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.875 7.66667V12.6667M9.125 7.66667V12.6667M1 4.33333H14M13.1875 4.33333L12.4831 14.4517C12.4539 14.8722 12.2704 15.2657 11.9697 15.553C11.6689 15.8403 11.2731 16 10.8621 16H4.13787C3.72686 16 3.33112 15.8403 3.03034 15.553C2.72957 15.2657 2.54612 14.8722 2.51694 14.4517L1.8125 4.33333H13.1875ZM9.9375 4.33333V1.83333C9.9375 1.61232 9.8519 1.40036 9.69952 1.24408C9.54715 1.0878 9.34049 1 9.125 1H5.875C5.65951 1 5.45285 1.0878 5.30048 1.24408C5.1481 1.40036 5.0625 1.61232 5.0625 1.83333V4.33333H9.9375Z"
                                        stroke="#F87171" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </form>
                    </span>
                            </div>

                            @php
                                $total_duree +=$cours->duree;
                            @endphp
                        @endforeach


                    </div>

                    {{-- t-foot --}}
                    <div class="h-20 flex items-center justify-between">
                        <div class="flex gap-1.5 items-center">
                            <span class="text-zinc-400 font-semibold">TOTAL:</span>
                            <span class="text-red-500 font-bold bg-red-100 btn-2 ml-4">{{$total_duree}} Heures</span>
                        </div>

                        <div class="">
                            <button class="btn bg-gray-200 border">
                                <svg width="13" height="14" viewBox="0 0 13 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg" class="mr-0.5">
                                    <path d="M6.5 1.5V12.5M12 7L1 7" stroke="#52525B" stroke-width="2"
                                          stroke-linecap="round"/>
                                </svg>
                                Cours
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach


    </div>
@endsection

