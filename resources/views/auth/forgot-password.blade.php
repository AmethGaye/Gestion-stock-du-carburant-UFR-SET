@extends('layout')

@section('content')
    <div class="w-full h-full relative flex justify-center items-center bg-white">
        <div class="w-5/12 relative">
            <div class="w-full  flex items-center flex-col">
                <div class="overflow-hidden rounded-lg  border border-zinc-200 shadow_1">
                    <img src="{{ asset('images/ufr_set.jpg') }}" alt="" class="w-32 h-32 object-cover ">
                </div>
                <h2 class="text-xl font-medium mt-4">Gestion Stock du carburant de l’UFR SET</h2>
                <p class=" text-zinc-400">Page de Restauration de mot de passe</p>
            </div>
            <form action="{{route('password.email')}}" method="post" class="mt-10">
                @csrf
                <div class="mb-6">
                    <div class="w-full  flex flex-col mb-4">
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="ahmada@gmail.com" id="email" class="input">
                    </div>
                    @error('email')
                         <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <button type="submit" class="px-4 py-2.5 rounded-lg bg-zinc-800 text-white font-medium flex justify-center items-center gap-2">
                        Envoyer
                        <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.2688 4.2457L16.0434 0.987004C15.966 0.908889 15.8738 0.846886 15.7722 0.804574C15.6707 0.762263 15.5617 0.740479 15.4517 0.740479C15.3417 0.740479 15.2327 0.762263 15.1312 0.804574C15.0296 0.846886 14.9374 0.908889 14.86 0.987004C14.7047 1.14316 14.6176 1.35439 14.6176 1.57457C14.6176 1.79475 14.7047 2.00598 14.86 2.16213L17.827 5.15413H0.833425C0.612387 5.15413 0.400402 5.24194 0.244105 5.39823C0.087807 5.55453 0 5.76652 0 5.98755H0C0 6.20859 0.087807 6.42058 0.244105 6.57687C0.400402 6.73317 0.612387 6.82098 0.833425 6.82098H17.877L14.86 9.82964C14.7819 9.90712 14.7198 9.9993 14.6775 10.1009C14.6352 10.2024 14.6134 10.3114 14.6134 10.4214C14.6134 10.5314 14.6352 10.6403 14.6775 10.7419C14.7198 10.8435 14.7819 10.9356 14.86 11.0131C14.9374 11.0912 15.0296 11.1532 15.1312 11.1955C15.2327 11.2378 15.3417 11.2596 15.4517 11.2596C15.5617 11.2596 15.6707 11.2378 15.7722 11.1955C15.8738 11.1532 15.966 11.0912 16.0434 11.0131L19.2688 7.77942C19.737 7.31061 20 6.67513 20 6.01256C20 5.34998 19.737 4.7145 19.2688 4.2457Z" fill="white"/>
                        </svg>
                    </button>
                    <a href="{{ route('auth.login') }}" class="w-full text-center mt-2 transition-all duration-100 hover:underline">Retour à la page de connexion</a>
                </div>
            </form>
        </div>
    </div>
@endsection
