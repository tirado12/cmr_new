<nav class="sticky top-0 bg-blue-cmr1 ">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-20">
    <div  class="absolute inset-y-0 left-0 flex items-center " style="z-index: 1000;">
        <!-- Mobile menu button-->
        <button type="button" @click="sidebar = true" class="inline-flex items-left justify-left p-2 rounded-md text-white hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">  
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        
        </button>
    </div>

    <div class="flex-shrink-0 flex items-center justify-center w-full">
        <img class="block lg:hidden h-10 w-auto" src="{{asset('image/Icono CMR White.png')}}" alt="Workflow">
        <img class="hidden lg:block h-14 w-auto" src="{{asset('image/CMR logo blanco.png')}}" alt="Workflow">
    </div>
    
    
    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:inset-auto sm:pr-0 w-full justify-end">
    <button class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
        <span class="sr-only">Ver notificaciones</span>
        
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
    </button>

    <!-- Profile dropdown -->
    <div class="ml-3 relative z-40" x-data="{ open: false }">
        <div>
        <button x-on:click="open = true" type="button" class=" flex text-sm rounded-full " id="user-menu" aria-expanded="false" aria-haspopup="true">
            <span class="sr-only">hola </span>
            <h6 class="font-bold ml-2 mr-2 text-white">{{ Auth::user()->name }}</h6>
            <!--<img class="h-9 w-9 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">-->
        </button>
        </div>

        <div x-show="open" x-on:click.away="open = false"  x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
        <p class="block px-4 py-2 text-sm text-gray-700 border-b-2 ">¡Bienvenid@ !</p>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Perfil</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Configuracion</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
        <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left" role="menuitem">Cerrar Sesion</button>
        </form>
        </div>
    </div>
    </div>
    </div>
    </div>
</nav>

<script>
    function myFunction() {
    event.preventDefault();
    this.closest('form').submit();
    }
</script>