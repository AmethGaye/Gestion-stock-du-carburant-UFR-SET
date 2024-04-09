<div class="bg-white h-[69.5px] shadow_2 flex items-center justify-between px-6 fixed left-[280px] nav-bar z-50">
    {{-- Rechercher  sur l'ensemble du site --}}
    <form action="" class="flex items-center p-0 m-0">
        <div class="flex items-center relative">
            <label for="" class="absolute left-2.5 top-1/2 -translate-y-1/2">
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.178 16.0683L10.4655 11.0455M12.052 6.87446C12.0433 10.1027 9.56776 12.7132 6.52264 12.7052C3.47752 12.6971 1.01599 10.0736 1.02465 6.84531C1.03332 3.61704 3.5089 1.00652 6.55402 1.01457C9.59914 1.02262 12.0607 3.64618 12.052 6.87446Z" stroke="#71717A" stroke-width="1.56321" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </label>
            <input type="text" name='main-search' id="main-search" placeholder="Rechercher" class="pr-3 pl-9 py-1.5 outline-none w-80 bg-transparent text-sm text-zinc-500 border border-zinc-300 bg-zinc-100 rounded-md focus:border-zinc-500">
        </div>
    </form>
    <div class="flex items-center gap-4 ">
        <div class="icon-hover">
            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.74399 8H19.744M7.74399 3H4.94399C3.82388 3 3.26383 3 2.83601 3.21799C2.45968 3.40973 2.15372 3.71569 1.96198 4.09202C1.74399 4.51984 1.74399 5.0799 1.74399 6.2V15.8C1.74399 16.9201 1.74399 17.4802 1.96198 17.908C2.15372 18.2843 2.45968 18.5903 2.83601 18.782C3.26383 19 3.82388 19 4.94399 19H16.544C17.6641 19 18.2241 19 18.652 18.782C19.0283 18.5903 19.3343 18.2843 19.526 17.908C19.744 17.4802 19.744 16.9201 19.744 15.8V6.2C19.744 5.0799 19.744 4.51984 19.526 4.09202C19.3343 3.71569 19.0283 3.40973 18.652 3.21799C18.2241 3 17.6641 3 16.544 3H13.744M7.74399 3H13.744M7.74399 3V2.5C7.74399 1.67157 7.07242 1 6.24399 1C5.41556 1 4.74399 1.67157 4.74399 2.5V3M13.744 3V2.5C13.744 1.67157 14.4156 1 15.244 1C16.0724 1 16.744 1.67157 16.744 2.5V3" stroke="#71717A" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="icon-hover">
            <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.9153 19.6781C12.076 20.3981 10.9735 20.835 9.76606 20.835C8.55862 20.835 7.45615 20.3981 6.61685 19.6781M16.9048 11.7878V8.10743C16.9048 4.26333 13.7206 1.16504 9.76606 1.16504C5.81156 1.16504 2.58425 4.13125 2.58425 8.10743V11.7629C2.58425 12.322 2.49461 12.8774 2.31879 13.4077L1.4398 16.0592C1.41573 16.1318 1.46947 16.2067 1.54559 16.2067H17.9353C18.0158 16.2067 18.0729 16.1305 18.0482 16.0561L17.1632 13.3866C16.992 12.87 16.9048 12.3306 16.9048 11.7878Z" stroke="#71717A" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
        {{-- profile utilisateur --}}
        <div class="flex items-center gap-3">
            <div>
                <h2 class="text-sm font-semibold text-right text-zinc-800 capitalize">{{ auth()->user()->prenom." ".auth()->user()->nom }}</h2>
                <p class="text-xs text-right text-zinc-600 font-medium tracking-wide capitalize">{{ auth()->user()->role }}</p>
            </div>
            <div class="rounded-full border border-zinc-200 overflow-hidden flex items-center justify-center cursor-pointer">
                @if(auth()->user()->image)
                    <img src="{{ asset('storage/' . auth()->user()->image)  }}" alt="" class="w-10 h-10 object-cover rounded-full object-center" >
                @else
                    <img src="{{ asset('images/user.png') }}" alt="" class="w-10 h-10 object-cover rounded-full object-center" >

                @endif
                  </div>
        </div>
    </div>
</div>
