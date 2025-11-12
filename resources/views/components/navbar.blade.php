{{-- resources/views/components/navbar.blade.php --}}
@props([
  'links' => [
    ['label' => 'Home',         'route' => 'home'],
    ['label' => 'Watch',        'route' => 'watch'],
    ['label' => 'How to play?', 'route' => 'mechanics'],
    ['label' => 'Contact Us',   'route' => 'contact'],
  ],
  'logo'    => 'images/logo.gif',
  'rounded' => true,
  'sticky'  => true,
])

@php
  $linkUrl = function(array $l) {
      if (!empty($l['route'] ?? null) && \Illuminate\Support\Facades\Route::has($l['route'])) {
          return route($l['route']);
      }
      return $l['href'] ?? '#';
  };

  $isActive = function(array $l) {
      if (!empty($l['route'] ?? null)) {
          return request()->routeIs($l['route']);
      }
      return isset($l['href']) && str_contains(url()->current(), trim($l['href'], '/'));
  };

  $headerClasses = 'nav-fallback bg-gradient-to-b from-blue-700 via-blue-600 to-blue-600 shadow-lg';
  if ($rounded) $headerClasses .= ' rounded-b-[20px]';
  if ($sticky)  $headerClasses .= ' sticky top-0 z-50';
@endphp

<header class="{{ $headerClasses }}">
  <div class="max-w-screen-2xl mx-auto px-2.5 md:px-5">
    {{-- Mobile drawer (peer toggle) --}}
    <input id="nav-toggle" type="checkbox" class="peer sr-only" aria-hidden="true" />

    <nav class="flex items-center justify-between py-1 md:py-0 lg:h-20 md:overflow-visible">
      {{-- Logo --}}
      <a href="{{ \Illuminate\Support\Facades\Route::has('home') ? route('home') : url('/') }}" class="shrink-0 md:-my-4">
        <img src="{{ asset($logo) }}" alt="Logo" class="h-7 w-auto md:h-20 2xl:h-24" />
      </a>

      {{-- Desktop links --}}
      <div class="hidden md:flex items-center justify-center gap-4 lg:gap-28 text-[8px] lg:text-xl md:leading-none">
        @foreach ($links as $l)
          @php $active = $isActive($l); @endphp
          <a href="{{ $linkUrl($l) }}" class="group relative font-semibold px-1 {{ $active ? 'text-white' : 'text-white' }}">
            {{ $l['label'] }}
            <span class="pointer-events-none absolute left-1/2 -translate-x-1/2 -bottom-[3px]
                          block h-0.5 w-0 rounded-full bg-orange-400
                          transition-all duration-300 ease-out group-hover:w-full"></span>
            @if ($active)
              <span class="pointer-events-none absolute left-1/2 -translate-x-1/2 -bottom-[3px]
                            block h-0.5 w-6 rounded-full bg-orange-400"></span>
            @endif
          </a>
        @endforeach
      </div>

      {{-- Desktop CTAs --}}
      <div class="hidden md:flex items-center gap-1.5 lg:gap-2 text-[8px] lg:text-xl md:leading-none">
        @auth
          <a href="{{ \Illuminate\Support\Facades\Route::has('dashboard') ? route('dashboard') : url('/dashboard') }}"
             class="bg-gray-200 rounded-full px-2 py-0.5 lg:px-10 lg:py-3 font-semibold hover:bg-gray-300 text-slate-900">
            Dashboard
          </a>
          <form method="POST" action="{{ \Illuminate\Support\Facades\Route::has('logout') ? route('logout') : url('/logout') }}">
            @csrf
            <button class="bg-orange-500 rounded-full px-2 py-0.5 lg:px-10 lg:py-3 font-semibold text-white hover:bg-orange-600">
              Logout
            </button>
          </form>
        @else
          <a href="{{ url('/login') }}"
             class="bg-gray-200 rounded-full px-2 py-0.5 lg:px-10 lg:py-3 font-semibold hover:bg-gray-300 text-slate-900">
            Login
          </a>
          <a href="{{ url('/register') }}"
             class="bg-orange-500 rounded-full px-2 py-0.5 lg:px-10 lg:py-3 font-semibold text-white hover:bg-orange-600">
            Register
          </a>
        @endauth
      </div>

      {{-- Mobile burger --}}
      <label for="nav-toggle" class="md:hidden inline-flex items-center gap-2 py-2 px-3 rounded-md text-white/90">
        <svg viewBox="0 0 24 24" class="h-6 w-6" aria-hidden="true">
          <path fill="currentColor" d="M3 6h18M3 12h18M3 18h18"/>
        </svg>
        <span class="sr-only">Open navigation</span>
      </label>
    </nav>

    {{-- Mobile drawer --}}
    <div class="md:hidden max-h-0 overflow-hidden transition-all duration-300 peer-checked:max-h-[60vh]">
      <ul class="px-2.5 pb-3 pt-1 space-y-1">
        @foreach ($links as $l)
          @php $active = $isActive($l); @endphp
          <li>
            <a href="{{ $linkUrl($l) }}"
               class="block rounded-md px-3 py-2 text-sm font-semibold
                      {{ $active ? 'bg-white/15 text-white' : 'text-white/90 hover:text-white hover:bg-white/10' }}">
              {{ $l['label'] }}
            </a>
          </li>
        @endforeach

        <li class="pt-2 border-t border-white/20 mt-2">
          @auth
            <a href="{{ \Illuminate\Support\Facades.Route::has('dashboard') ? route('dashboard') : url('/dashboard') }}"
               class="block px-3 py-2 text-sm text-white/90 hover:text-white hover:bg-white/10 rounded-md">
               Dashboard
            </a>
            <form method="POST" action="{{ \Illuminate\Support\Facades\Route::has('logout') ? route('logout') : url('/logout') }}" class="px-3 py-2">
              @csrf
              <button class="text-sm text-white/90 hover:text-white">Logout</button>
            </form>
          @else
            <a href="{{ url('/login') }}" class="block px-3 py-2 text-sm text-white/90 hover:text-white hover:bg-white/10 rounded-md">Login</a>
            <a href="{{ url('/register') }}" class="block px-3 py-2 text-sm text-white hover:bg-orange-600 rounded-md bg-orange-500 mt-1">Register</a>
          @endauth
        </li>
      </ul>
    </div>
  </div>
</header>
