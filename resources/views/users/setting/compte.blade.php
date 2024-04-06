@extends('users.setting.layout')

@section('setting-content')
<div class="bg-white border border-zinc-200 rounded-lg px-8 py-6">

    <form action="" method="" class="m-0 mt-6">
        @csrf
        <div class="flex items-center justify-center mb-12">
            <span class="w-[25%] flex items-center flex-col gap-2">
                <img src="{{ asset('images/user.png') }}" alt="" class="w-20 h-20 object-cover rounded-full object-center" >
                <span class="font-nunito text-[#4379EE] font-semibold cursor-pointer">Modifier votre photo</span>
            </span>
        </div>
        <div class="mb-10 ">
            <div class="w-full flex flex-col relative mb-4">
                <label for="prenom" class="text-zinc-700 font-medium">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="input-2" placeholder="Ahmada">   
            </div>

            <div class="w-full flex flex-col relative mb-4">
                <label for="nom" class="text-zinc-700 font-medium">Nom</label>
                <input type="text" name="nom" id="nom" class="input-2" placeholder="Gaye">   
            </div>

            <div class="w-full flex flex-col relative mb-4">
                <label for="email" class="text-zinc-700 font-medium">Email</label>
                <input type="text" name="email" id="email" class="input-2" placeholder="Example@univ-thies.sn">   
            </div>

            <div class="w-full flex flex-col relative mb-4">
                <label for="tel" class="text-zinc-700 font-medium">Numéro de téléphone</label>
                <input type="tel" name="tel" id="tel" class="input-2" placeholder="784532081">   
            </div>

            
               
        </div>
        <div class="flex gap-4 items-center">
            <button type="submit" class="px-4 py-2.5 rounded-lg bg-zinc-800 text-white font-medium flex justify-center items-center gap-2">
                Mise à jour
            </button>
            <button type="submit" class="px-4 py-2.5 rounded-lg bg-zinc-200 text-zinc-800 font-semibold flex justify-center items-center gap-2">
                Restaurer
            </button>
        </div>
    </form>
</div>
@endsection
