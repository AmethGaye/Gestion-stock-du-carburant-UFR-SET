@extends('users.setting.layout')

@section('setting-content')
<div class="bg-white  rounded-3xl shadow_2 px-8 py-6 font-mtrph">

    <form action="{{route('setting.compte')}}" method="post" enctype="multipart/form-data" class="m-0 mt-6">
        @csrf
        <div class="flex items-center justify-center mb-12">
            <span class="w-[25%] flex items-center flex-col gap-2">
                @if(Auth::user()->image)
                    <img src="{{asset('storage/' . Auth::user()->image) }}" alt="" class="w-20 h-20 object-cover rounded-full object-center" >
                @else
                    <img src="{{ asset('images/user.png') }}" alt="" class="w-20 h-20 object-cover rounded-full object-center" >
                @endif
                <label for="photo" class="font-nunito text-[#4379EE] font-semibold cursor-pointer">Modifier votre photo</label>
                <input type="file" name="image" id="photo" class="hidden">
            </span>
        </div>
        <div class="mb-10 ">
            <div class="w-full flex flex-col relative mb-4">
                <label for="prenom" class="text-zinc-700 font-medium">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="input-2" placeholder="Ahmada" value="{{$user->prenom}}">
            </div>

            <div class="w-full flex flex-col relative mb-4">
                <label for="nom" class="text-zinc-700 font-medium">Nom</label>
                <input type="text" name="nom" id="nom" class="input-2" placeholder="Gaye" value="{{$user->nom}}">
            </div>

            <div class="w-full flex flex-col relative mb-4">
                <label for="email" class="text-zinc-700 font-medium">Email</label>
                <input type="text" name="email" id="email" class="input-2" placeholder="example@univ-thies.sn" value="{{$user->email}}">
            </div>

            <div class="w-full flex flex-col relative mb-4">
                <label for="tel" class="text-zinc-700 font-medium">Numéro de téléphone</label>
                <input type="tel" name="telephone" id="tel" class="input-2" placeholder="784532081" value="{{$user->telephone}}">
            </div>



        </div>
        <div class="flex gap-4 items-center">
            <button type="submit" class="px-4 py-2.5 rounded-lg bg-zinc-800 text-white font-medium flex justify-center items-center gap-2">
                Mise à jour
            </button>
            <button type="submit" class="px-4 py-2.5 rounded-lg bg-zinc-100 text-zinc-800 font-medium flex justify-center items-center gap-2">
                Restaurer
            </button>
        </div>
    </form>
</div>
@endsection
