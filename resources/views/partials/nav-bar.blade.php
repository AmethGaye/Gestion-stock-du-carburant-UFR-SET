<div class="bg-white h-[69.5px] shadow_2 flex items-center justify-between px-6 fixed left-[280px] nav-bar z-50">
    {{-- Rechercher  sur l'ensemble du site --}}
    <form action=""  method=""class="flex items-center p-0 m-0">
        <div class="flex items-center relative">
            <label for="main-search" class="absolute left-2.5 top-1/2 -translate-y-1/2">
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.178 16.0683L10.4655 11.0455M12.052 6.87446C12.0433 10.1027 9.56776 12.7132 6.52264 12.7052C3.47752 12.6971 1.01599 10.0736 1.02465 6.84531C1.03332 3.61704 3.5089 1.00652 6.55402 1.01457C9.59914 1.02262 12.0607 3.64618 12.052 6.87446Z" stroke="#71717A" stroke-width="1.56321" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                
                
              
            </label>
            
            <input type="text" name='search' id="main-search" value="" placeholder="Rechercher" class="pr-3 pl-9 py-1.5 outline-none w-80 bg-transparent text-sm text-zinc-500 border border-zinc-300 bg-zinc-100 rounded focus:border-zinc-500">
        </div>
    </form>
    <div class="flex items-center gap-3 relative">
        
        
        <div class="icon-hover relative" onclick="notifBox()">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 17H20L18.595 15.595C18.4063 15.4063 18.2567 15.1822 18.1546 14.9357C18.0525 14.6891 18 14.4249 18 14.158V11C18.0002 9.75894 17.6156 8.54834 16.8992 7.53489C16.1829 6.52144 15.17 5.75496 14 5.341V5C14 4.46957 13.7893 3.96086 13.4142 3.58579C13.0391 3.21071 12.5304 3 12 3C11.4696 3 10.9609 3.21071 10.5858 3.58579C10.2107 3.96086 10 4.46957 10 5V5.341C7.67 6.165 6 8.388 6 11V14.159C6 14.697 5.786 15.214 5.405 15.595L4 17H9M15 17H9M15 17V18C15 18.7956 14.6839 19.5587 14.1213 20.1213C13.5587 20.6839 12.7956 21 12 21C11.2044 21 10.4413 20.6839 9.87868 20.1213C9.31607 19.5587 9 18.7956 9 18V17" stroke="#71717a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg> 
            @if(auth()->user()->unreadNotifications->count())
                <span class="w-2.5 h-2.5 rounded-full bg-red-500 block mr-2 absolute right-[1px] top-[10px]"></span>               
            @endif
        </div>

        {{-- notification --}}
        <div class="w-80 max-h-96 overflow-y-scroll bg-white absolute top-[146%] shadow_2 rounded-md border -left-10 opacity-0 invisible px-4 py-6 text-[small] transition-all duration-75"  id="notification">
            <h3 class="font-medium text-zinc-600 text-base pb-4 border-b">notifications</h3>

            @if(auth()->user()->roles->nom == 'directeur')
            {{-- type remboursement vacataire --}}
            <div class="flex flex-col pb-3 border-b">
                <p class="font-medium text-zinc-600 pt-3 pb-1.5">Remboursement vacataires</p>
                @foreach(auth()->user()->unreadNotifications as $notification)
                    @if($notification->type == 'App\Notifications\DemandeNotification')
                        @php
                            $remboursement = App\Models\Remboursement_vac::find($notification->data['id_demande']);
                        @endphp
                        @if($remboursement)
                            <a href="{{route('mark_read_notification',$notification->id)}}" class="px-3 py-1 hover:bg-zinc-100 rounded-md flex flex-col text-zinc-600">
                                <span class="font-medium">{{ $notification->created_at->format('D H:i') }}</span>
                                <span>Vous avez une scéance de cours à approuver. Demandeur : <span class="font-semibold">{{ $remboursement->user->prenom }} {{ $remboursement->user->nom }}</span></span>
                            </a>
                        @endif
                    @endif
                @endforeach
            </div>
        @endif

        @if(auth()->user()->roles->nom == 'comptable')
        {{-- type remboursement vacataire --}}
        <div class="flex flex-col pb-3 border-b">
            <p class="font-medium text-zinc-600 pt-3 pb-1.5">Remboursement vacataires</p>
            @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\ComptableNotification') as $notification)
                <a href="{{ route('mark_read_notification', $notification->id) }}" class="px-3 py-1 hover:bg-zinc-100 rounded-md flex flex-col text-zinc-600">
                    <span class="font-medium">{{ $notification->created_at->format('D H:i') }}</span>
                    <span>Vous avez une séance de cours à rembourser. Directeur: <span class="font-semibold">{{ $notification->data['nom_directeur'] }}</span></span>
                </a>
            @endforeach
        </div>
    
        {{-- type activité --}}
        <div class="flex flex-col pb-3 border-b">
            <p class="font-medium text-zinc-600 pt-3 pb-1.5">Activités</p>
            @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\ActiviteNotification') as $notification)
                <a href="{{ route('mark_read_notification_activite', $notification->id) }}" class="px-3 py-1 hover:bg-zinc-100 rounded-md flex flex-col text-zinc-600">
                    <span class="font-medium">{{ $notification->created_at->format('D H:i') }}</span>
                    <span>Sortie Pédagogique à <span class="font-semibold">{{ $notification->data['lieux'] }}</span>. Tickets : <span class="font-semibold">{{ $notification->data['ticket_demande'] }}</span> </span>
                </a>
            @endforeach
        </div>
    @endif
    

            @if(auth()->user()->roles->nom == 'chef_departement')
                {{-- type cours --}}
                <div class="flex flex-col pb-3 border-b">
                    <p class="font-medium text-zinc-600 pt-3 pb-1.5">Cours à approuver </p>
                    @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\CoursNotification') as $notification)
                    <a href="{{ route('mark_read_notification', $notification->id) }}" class="px-3 py-1 hover:bg-zinc-100 rounded-md flex flex-col text-zinc-600">
                        <span class="font-medium">{{ $notification->created_at->format('D H:i') }}</span>
                        <span>Vous avez une scéance de cours à approuver. Vacataire : <span class="font-semibold">{{ $notification->data['prenom_vacataire'] }} {{ $notification->data['nom_vacataire'] }}</</span></span>
                    </a>
                    @endforeach
                </div>
            @endif

            
            
        </div>
     
        {{-- profile utilisateur --}}
        <div class="flex items-center gap-3">
            <div>
                <h2 class="text-sm font-semibold text-right text-zinc-800 capitalize mb-1">{{ auth()->user()->prenom." ".auth()->user()->nom }}</h2>
                <p class="text-xs text-right text-zinc-600 font-medium tracking-wide capitalize">{{ auth()->user()->roles->nom }}</p>
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
 
