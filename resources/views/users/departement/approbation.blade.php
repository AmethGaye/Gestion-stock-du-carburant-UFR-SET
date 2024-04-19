@extends('users.departement.cours')

@section('cours')
<div class="">
    @if ($errors->has('msg'))
        <div class="text-red-600">
            {{ $errors->first('msg') }}
        </div>
    @endif
    {{-- t-head --}}
    <div class="flex items-center text-sm text-zinc-400 font-nunito font-bold py-4 ">
        {{-- cols --}}
        <span class="px-4">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
            </svg>
        </span>
        <span class="basis-[23%] grow pr-4">VACATAIRE</span>
        <span class="basis-[22%] grow pr-4">MATIERE</span>
        <span class="basis-[17%] grow pr-4">FILIERE</span>
        <span class="basis-[130px] pr-4">DUREE</span>
        <span class="basis-[150px] pr-4">DATE</span>
        <span class="basis-[170px] text-center mr-4">ACTION</span>
    </div>

    {{-- t-body --}}

    {{-- row 1 --}}
    @foreach($sceance_cours as $sceance_cour)
    <div class="flex items-center text-sm font-medium border border-zinc-200 h-[70px] py-2 rounded-md bg-white mb-4">
        {{-- cols --}}
        <span class="px-4">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" id="checkbox" class="cursor-pointer">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4444 0.888889H3.55556C2.0828 0.888889 0.888889 2.0828 0.888889 3.55556V12.4444C0.888889 13.9172 2.0828 15.1111 3.55556 15.1111H12.4444C13.9172 15.1111 15.1111 13.9172 15.1111 12.4444V3.55556C15.1111 2.0828 13.9172 0.888889 12.4444 0.888889ZM3.55556 0C1.59188 0 0 1.59188 0 3.55556V12.4444C0 14.4081 1.59188 16 3.55556 16H12.4444C14.4081 16 16 14.4081 16 12.4444V3.55556C16 1.59188 14.4081 0 12.4444 0H3.55556Z" fill="#1C1C1C" fill-opacity="0.2"/>
            </svg>
        </span>
        <span class="basis-[23%] grow pr-4">{{$sceance_cour->vacataire->prenom." ".$sceance_cour->vacataire->nom}}</span>
        <span class="basis-[22%] grow pr-4">{{$sceance_cour->matiere->nom}}</span>
        <span class="basis-[17%] grow pr-4">{{$sceance_cour->filiere->nom}}</span>
        <span class="basis-[130px] font-bold pr-4">{{$sceance_cour->duree}} Heures</span>
        <span class="basis-[150px] pr-4">{{date('d-m-Y', strtotime($sceance_cour->date))}}</span>
        @if($sceance_cour->statut==0)
        <span class="basis-[170px] relative flex items-center justify-center gap-4 mr-4">
            @php $id=$sceance_cour->id @endphp
            <form action="{{route('approuver',compact('id'))}}" method="post" class="m-0">
                @csrf
                <button class="btn-1 bg-[#00B69B] text-white">Approuver</button>
            </form>
            {{-- separator --}}
            <div class=" w-0.5 h-6 bg-zinc-200"></div>
            <form action="" method="" class="m-0">
                <button class="icon-hover cursor-pointer" disabled>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 8C14 11.3137 11.3137 14 8 14C4.68629 14 2 11.3137 2 8C2 4.68629 4.68629 2 8 2C9.53671 2 10.9385 2.57771 12 3.52779M12.6667 2V4C12.6667 4.36819 12.3682 4.66667 12 4.66667H10" stroke="#E4E4E7" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
            </form>

        </span>
        @else
            @php $id=$sceance_cour->id @endphp
            <span class="basis-[170px] relative flex items-center justify-center gap-4 mr-4">
            <form action="" method="" class="m-0">
                <button class="btn-1 bg-zinc-200" disabled>Approuver</button>
            </form>
            {{-- separator --}}
            <div class=" w-0.5 h-6 bg-zinc-200"></div>
            <form action="{{route('restaurer',compact('id'))}}" method="post" class="m-0">
                @csrf
                <button class="icon-hover" >
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 8C14 11.3137 11.3137 14 8 14C4.68629 14 2 11.3137 2 8C2 4.68629 4.68629 2 8 2C9.53671 2 10.9385 2.57771 12 3.52779M12.6667 2V4C12.6667 4.36819 12.3682 4.66667 12 4.66667H10" stroke="#4C535F" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
            </form>

        </span>
        @endif
    </div>
    @endforeach




</div>
@endsection
