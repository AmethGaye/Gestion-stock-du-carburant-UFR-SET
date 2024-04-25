@extends('base')

@section('section')
    <section class="px-6 min-h-[76vh] flex flex-start gap-8 relative">
        <div class="px-6 pt-6 w-7/12 bg-white rounded-3xl shadow_3">
            <div>
                <div>
                    <p class="mb-6 text-lg font-medium text-zinc-600">Gestion Des Rôles</p>
                </div>
                
                <div class="relative">
                    {{-- t-head --}}
                    <div class="flex items-center text-sm text-zinc-400 font-nunito font-bold py-4 border-b ">
                        {{-- cols --}}
                        <span class="basis-[100px] px-4">ID</span>
                        <span class="basis-[35%] pr-4 grow">ROLE</span>
                        <span class="basis-[110px] pr-4">PRIORITE</span>
                        <span class="basis-[150px] pr-4 text-center">ACTION</span>
                    </div>
                    {{-- t-body --}}
                    <div>
                        {{-- rows 1 --}}
                        @foreach($roles as $role)
        
        
                        <div class="flex items-center text-zinc-500  py-4 border-b border-b-zinc-200 text-[15px] font-medium">
                            {{-- cols --}}
    
                            <span class="basis-[100px] px-4">{{ $role->id }}</span>

                            <span class="basis-[35%]  pr-4 grow flex items-center gap-4">
                                {{$role->nom}}
                            </span>
    

                            <span class="basis-[110px] pr-4 capitalize">{{$role->priorite}}</span>

                            <span class="basis-[150px]  pr-4 flex items-center justify-center relative">
                                <span class="icon-hover cursor-pointer" onclick="showOptions(this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#71717a" fill="none">
                                        <rect x="18" y="10.5" width="3" height="3" rx="1" stroke="currentColor" stroke-width="1.5" />
                                        <rect x="10.5" y="10.5" width="3" height="3" rx="1" stroke="currentColor" stroke-width="1.5" />
                                        <rect x="3" y="10.5" width="3" height="3" rx="1" stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                </span>
                                <div class="bg-white border py-3 rounded-lg shadow_3 w-36 text-sm font-medium absolute top-[110%] z-50 left-1/2 translate-x-10 opacity-0 invisible transition">
                                    <form action="{{ route('admin.roles.edit', $role->id) }}" method="GET" class="flex items-center hover:bg-zinc-100 hover:text-zinc-600 tracking-wide" id="roleSubs">
                                        @csrf
                                        <button class="px-4 py-2.5">
                                            Modifier
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post" class="m-0 w-full flex" id="delSubmit">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" value="" name="id">
                                        <button class="px-4 py-2.5 w-full text-left hover:bg-zinc-100 hover:text-zinc-600">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </span>
                           
                        </div>
        
                        @endforeach
                    </div>
                    {{-- pagination --}}
                    {{ $roles->links() }}
                    
                </div>
            </div>
        </div>
        <div class="px-6 py-8 w-5/12 h-5/6 bg-white rounded-3xl shadow_3 flex flex-col">

            <div class="flex items-center justify-between mb-12">
                <h1 class="text-lg font-medium text-zinc-600">Ajouter / Modifier un rôle</h1>
            </div>
            <form action="{{ route('admin.roles') }}" method="post" class="m-0 font-mtrph" id="roleForm">
                @csrf
                <div class="">
                    <div class="w-full flex gap-4">
                        <div class="w-full flex flex-col relative mb-4">
                            <label for="nom" class="text-zinc-800 font-medium">Nom</label>
                            <input type="text" name="nom" id="nom" value="{{ @old('nom') }}" class="text-zinc-600 px-4 py-4 rounded-lg border-zinc-300 border-[1.5px] bg-transparent mt-1 outline-none transition duration-200 focus:border-zinc-800" placeholder="Tapez son nom">
                            {{-- erreur gerée en js --}}
                            <div class="text-sm text-red-600 font-medium mt-2">
                                @error('nom'){{ $message }}@enderror
                            </div>
                        </div>
                    </div>
        
                    <div class="w-full flex gap-4">
                        <div class="w-full flex flex-col relative mb-3">
                            <label for="priorite" class="text-zinc-800 font-medium">Priorité</label>
                            <div class="w-full relative ">
                                <input type="number" name="priorite" id="priorite" value="{{ @old('priorite', 20) }}" class="w-full text-zinc-600 px-4 py-4 rounded-lg border-zinc-300 border-[1.5px] bg-transparent mt-1 outline-none transition duration-200 focus:border-zinc-800">
                                {{-- erreur gerée en js --}}
                                <div class="text-sm text-red-600 font-medium mt-2">
                                    @error('priorite'){{ $message }}@enderror
                                </div>
                                <div class="absolute right-2 top-1/2 -translate-y-1/2 flex">
                                    <button type="button" class="w-10 h-10 mr-1  bg-zinc-100 hover:bg-zinc-200 flex items-center justify-center rounded-md" onclick="decrementer(this, 10)">
                                        <svg width="12" height="3" viewBox="0 0 12 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 1.4999C12 1.65903 11.9473 1.81165 11.8536 1.92417C11.7598 2.03669 11.6326 2.0999 11.5 2.0999H0.5C0.367392 2.0999 0.240215 2.03669 0.146447 1.92417C0.0526785 1.81165 0 1.65903 0 1.4999C0 1.34077 0.0526785 1.18816 0.146447 1.07564C0.240215 0.963117 0.367392 0.899902 0.5 0.899902H11.5C11.6326 0.899902 11.7598 0.963117 11.8536 1.07564C11.9473 1.18816 12 1.34077 12 1.4999Z" fill="#1C1C1C"/>
                                        </svg>
                                    </button>
                                    <button type="button" class="w-10 h-10 bg-zinc-100 hover:bg-zinc-200 flex items-center justify-center rounded-md" onclick="incrementer(this, 10)">
                                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 6.5C12 6.63261 11.9473 6.75979 11.8536 6.85355C11.7598 6.94732 11.6326 7 11.5 7H6.5V12C6.5 12.1326 6.44732 12.2598 6.35355 12.3536C6.25979 12.4473 6.13261 12.5 6 12.5C5.86739 12.5 5.74021 12.4473 5.64645 12.3536C5.55268 12.2598 5.5 12.1326 5.5 12V7H0.5C0.367392 7 0.240215 6.94732 0.146447 6.85355C0.0526785 6.75979 0 6.63261 0 6.5C0 6.36739 0.0526785 6.24021 0.146447 6.14645C0.240215 6.05268 0.367392 6 0.5 6H5.5V1C5.5 0.867392 5.55268 0.740215 5.64645 0.646447C5.74021 0.552679 5.86739 0.5 6 0.5C6.13261 0.5 6.25979 0.552679 6.35355 0.646447C6.44732 0.740215 6.5 0.867392 6.5 1V6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5Z" fill="#1C1C1C"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="flex gap-4 items-center mt-12">
                    <button type="submit" class="px-6 py-2.5 w-1/2 rounded-lg bg-zinc-800 text-white font-medium flex justify-center items-center gap-2">
                        Ajouter
                    </button>
                    <button type="reset" class="px-6 py-2.5 w-1/2 rounded-lg bg-zinc-100 text-zinc-800 font-medium flex justify-center items-center gap-2">
                        Restaurer
                    </button>
                </div>
            </form>
        </div>
         {{-- <div class="text-green-500" id="success"></div> --}}
    </section>
@endsection







