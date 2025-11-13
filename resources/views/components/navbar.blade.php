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
  <div class="max-w-screen-2xl mx-auto px-2 md:px-4">
    <nav
      class="flex flex-nowrap items-center justify-between gap-1
             py-1 md:py-0 lg:h-20 md:overflow-visible">

      {{-- Logo (left) --}}
      <a href="{{ \Illuminate\Support\Facades\Route::has('home') ? route('home') : url('/') }}"
         class="shrink-0">
        <img src="{{ asset($logo) }}" alt="Logo" class="h-5 w-auto md:h-14 2xl:h-20" />
      </a>

      {{-- Links (center) --}}
      <div
        class="min-w-0 flex-1 flex flex-nowrap items-center justify-center
               gap-2 md:gap-6 lg:gap-40
               text-[9px] sm:text-[10px] md:text-xs lg:text-lg
               md:leading-none whitespace-nowrap">
        @foreach ($links as $l)
          @php $active = $isActive($l); @endphp
          <a href="{{ $linkUrl($l) }}"
             class="group relative font-semibold px-0.5 text-white">
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

      {{-- CTAs (right) --}}
      <div
        class="flex flex-nowrap items-center justify-end
               gap-1 md:gap-2
               text-[9px] sm:text-[10px] md:text-xs lg:text-lg
               md:leading-none whitespace-nowrap shrink-0">
        @auth
          <a href="{{ \Illuminate\Support\Facades\Route::has('dashboard') ? route('dashboard') : url('/dashboard') }}"
             class="bg-gray-200 rounded-full px-2 py-0.5 md:px-3 md:py-1 lg:px-6 lg:py-3
                    font-semibold hover:bg-gray-300 text-slate-900">
            Dashboard
          </a>
          <form method="POST" action="{{ \Illuminate\Support\Facades\Route::has('logout') ? route('logout') : url('/logout') }}">
            @csrf
            <button
              class="bg-orange-500 rounded-full px-2 py-0.5 md:px-3 md:py-1 lg:px-6 lg:py-3
                     font-semibold text-white hover:bg-orange-600">
              Logout
            </button>
          </form>
        @else
          <a href="{{ url('/login') }}"
             class="bg-gray-200 rounded-full px-2 py-0.5 md:px-3 md:py-1 lg:px-5 lg:py-3
                    font-semibold hover:bg-gray-300 text-slate-900">
            Login
          </a>
          <a href="{{ url('/register') }}"
             class="bg-orange-500 rounded-full px-2 py-0.5 md:px-3 md:py-1 lg:px-5 lg:py-3
                    font-semibold text-white hover:bg-orange-600">
            Register
          </a>
        @endauth
      </div>
    </nav>
  </div>
</header>
