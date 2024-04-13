@extends('users.comptable.dotation')

@section('dotation')
<div class="px-4 py-3 bg-white rounded-md border border-zinc-200 flex items-center justify-between mb-6">
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
            <span class="font-medium">Janvier</span>
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.933058 0.879586C1.17714 0.613462 1.57286 0.613462 1.81694 0.879586L5.93306 5.36749C6.17714 5.63362 6.57286 5.63362 6.81694 5.36749L10.9331 0.879587C11.1771 0.613463 11.5729 0.613463 11.8169 0.879587C12.061 1.14571 12.061 1.57718 11.8169 1.84331L7.70082 6.33121C6.96859 7.12959 5.78141 7.12959 5.04918 6.33121L0.933058 1.84331C0.688981 1.57718 0.688981 1.14571 0.933058 0.879586Z" fill="#52525B"/>
            </svg>
        </button>
    </div>
</div>

{{-- ========================================================================================================= --}}


<div class="bg-white border border-zinc-200 rounded-lg text-sm mb-8">
    <div class="px-6 py-4 flex items-center justify-between border-b border-b-zinc-200">
        <div class="flex items-center gap-4">
            <h2 class="text-lg font-semibold text-zinc-700 m-0">Départements</h2>
            <div class="flex justify-center items-center">
                <span class="flex items-center bg-[#E2FBD7] px-4 text-[#34B53A] py-1.5 rounded-xl font-semibold text-sm">Janvier</span>
            </div>
        </div>
        <div class="px-3 py-1.5 border border-zinc-200 rounded-md font-semibold text-slate-400">
            UFR SET
        </div>
    </div>



    @foreach ($dotation_depart as $item)
        <div class="px-6 py-3 flex items-center justify-between border-b border-b-zinc-200">
            <div>
                <h2 class="text-base font-semibold mb-1">{{ $item->departement->nom }}</h2>
                <span class="text-[small] font-medium text-[#9FA6B2]">{{ $item->created_at }}</span>
            </div>

            <div class="flex items-center gap-4">
                <span class="text-[#9FA6B2] font-bold">{{ $item->nombre_tickets }} Tickets</span>
                <span class="icon-hover cursor-pointer">
                    <svg width="16" height="4" viewBox="0 0 16 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 2.75C8.41421 2.75 8.75 2.41421 8.75 2C8.75 1.58579 8.41421 1.25 8 1.25C7.58579 1.25 7.25 1.58579 7.25 2C7.25 2.41421 7.58579 2.75 8 2.75Z" stroke="#6B7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.833 2.75C14.2472 2.75 14.583 2.41421 14.583 2C14.583 1.58579 14.2472 1.25 13.833 1.25C13.4188 1.25 13.083 1.58579 13.083 2C13.083 2.41421 13.4188 2.75 13.833 2.75Z" stroke="#6B7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2.16699 2.75C2.58121 2.75 2.91699 2.41421 2.91699 2C2.91699 1.58579 2.58121 1.25 2.16699 1.25C1.75278 1.25 1.41699 1.58579 1.41699 2C1.41699 2.41421 1.75278 2.75 2.16699 2.75Z" stroke="#6B7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>                                       
                </span>
            </div>

        </div>
    @endforeach

    

    <div class="flex gap-6 px-6 py-5 items-center">
        <span class="text-zinc-400 font-semibold">TOTAL:</span>
        <span class="text-blue-500 font-bold bg-blue-100 btn-1">{{ $total_dep }} Tickets</span>
    </div>
</div> 

{{-- ========================================================================================================= --}}

<div class="bg-white border border-zinc-200 rounded-lg text-sm">
    <div class="px-6 py-4 flex items-center justify-between border-b border-b-zinc-200">
        <div class="flex items-center gap-4">
            <h2 class="text-lg font-bold text-zinc-700 m-0">Administration</h2>
            <div class="flex justify-center items-center">
                <span class="flex items-center bg-[#E2FBD7] px-4 text-[#34B53A] py-1.5 rounded-xl font-semibold text-sm">Janvier</span>
            </div>
        </div>
        <div class="px-3 py-1.5 border border-zinc-200 rounded-md font-semibold text-slate-400">
            UFR SET
        </div>
    </div>



    @foreach ($dotation_admin as $item)
        <div class="px-6 py-3 flex items-center justify-between border-b border-b-zinc-200">
            <div>
                <h2 class="text-base font-semibold">{{ $item->nom }}</h2>
                <p class="text-[small] font-medium text-[#9FA6B2]">{{ $item->email }}</p>
            </div>

            <div class="flex items-center gap-4">
                <span class="text-[#9FA6B2] font-bold">{{ $item->nombre_tickets }} Tickets</span>
                <span class="icon-hover cursor-pointer">
                    <svg width="16" height="4" viewBox="0 0 16 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 2.75C8.41421 2.75 8.75 2.41421 8.75 2C8.75 1.58579 8.41421 1.25 8 1.25C7.58579 1.25 7.25 1.58579 7.25 2C7.25 2.41421 7.58579 2.75 8 2.75Z" stroke="#6B7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.833 2.75C14.2472 2.75 14.583 2.41421 14.583 2C14.583 1.58579 14.2472 1.25 13.833 1.25C13.4188 1.25 13.083 1.58579 13.083 2C13.083 2.41421 13.4188 2.75 13.833 2.75Z" stroke="#6B7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2.16699 2.75C2.58121 2.75 2.91699 2.41421 2.91699 2C2.91699 1.58579 2.58121 1.25 2.16699 1.25C1.75278 1.25 1.41699 1.58579 1.41699 2C1.41699 2.41421 1.75278 2.75 2.16699 2.75Z" stroke="#6B7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>                                       
                </span>
            </div>

        </div>
    @endforeach

    <div class="flex gap-6 px-6 py-5 items-center">
        <span class="text-zinc-400 font-semibold">TOTAL:</span>
        <span class="text-blue-500 font-bold bg-blue-100 btn-1">{{ $total_admin }} Tickets</span>
    </div>
</div>                  

@endsection