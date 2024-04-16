@extends('users.comptable.dotation')

@section('dotation')
    <div class="bg-white border border-zinc-200 rounded-lg px-8 py-6 font-mtrph">
        <h1 class="font-semibold text-lg text-zinc-600 mb-10">Dotation Régulier Des Départements</h1>
        <form action="{{ route('dotation.depart') }}" method="POST" class="m-0 mt-6">
            @csrf
            <div class="mb-10">

                <div class="w-full  flex flex-col mb-4">
                    <label for="departement" class="font-medium text-zinc-700">Département</label>
                    <select name="departement" id="departement" class="input-2">
                        <option value="" selected>Sélectionner un département</option>
                        @foreach ($departements as $item)
                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                        @endforeach
                        
                    </select>
                    @error('departement')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>


                <div class="w-full  flex flex-col mb-4">
                    <label for="ticket" class="font-medium text-zinc-700">Tickets</label>
                    <div class="w-full relative ">
                        <input type="number" name="ticket" id="ticket" value="@old('ticket')" class="input-2 w-full">
                        @error('ticket')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="absolute right-2 top-7 -translate-y-1/2 flex">
                            <button type="button" class="w-8 h-8 mr-1  bg-zinc-100 hover:bg-zinc-200 flex items-center justify-center rounded-md" onclick="decrementer()">
                                <svg width="12" height="3" viewBox="0 0 12 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 1.4999C12 1.65903 11.9473 1.81165 11.8536 1.92417C11.7598 2.03669 11.6326 2.0999 11.5 2.0999H0.5C0.367392 2.0999 0.240215 2.03669 0.146447 1.92417C0.0526785 1.81165 0 1.65903 0 1.4999C0 1.34077 0.0526785 1.18816 0.146447 1.07564C0.240215 0.963117 0.367392 0.899902 0.5 0.899902H11.5C11.6326 0.899902 11.7598 0.963117 11.8536 1.07564C11.9473 1.18816 12 1.34077 12 1.4999Z" fill="#1C1C1C"/>
                                </svg>                                    
                            </button>
                            <button type="button" class="w-8 h-8 bg-zinc-100 hover:bg-zinc-200 flex items-center justify-center rounded-md" onclick="incrementer()">
                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 6.5C12 6.63261 11.9473 6.75979 11.8536 6.85355C11.7598 6.94732 11.6326 7 11.5 7H6.5V12C6.5 12.1326 6.44732 12.2598 6.35355 12.3536C6.25979 12.4473 6.13261 12.5 6 12.5C5.86739 12.5 5.74021 12.4473 5.64645 12.3536C5.55268 12.2598 5.5 12.1326 5.5 12V7H0.5C0.367392 7 0.240215 6.94732 0.146447 6.85355C0.0526785 6.75979 0 6.63261 0 6.5C0 6.36739 0.0526785 6.24021 0.146447 6.14645C0.240215 6.05268 0.367392 6 0.5 6H5.5V1C5.5 0.867392 5.55268 0.740215 5.64645 0.646447C5.74021 0.552679 5.86739 0.5 6 0.5C6.13261 0.5 6.25979 0.552679 6.35355 0.646447C6.44732 0.740215 6.5 0.867392 6.5 1V6H11.5C11.6326 6 11.7598 6.05268 11.8536 6.14645C11.9473 6.24021 12 6.36739 12 6.5Z" fill="#1C1C1C"/>
                                </svg>   
                            </button>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="flex gap-4 items-center">
                <button type="submit" class="px-4 py-2.5 rounded-lg bg-zinc-800 text-white flex justify-center items-center gap-2">
                    Valider
                </button>
                <button type="submit" class="px-4 py-2.5 rounded-lg bg-zinc-200 text-zinc-800 flex justify-center items-center gap-2">
                    Annuler
                </button>
            </div>
        </form>
    </div>
@endsection
