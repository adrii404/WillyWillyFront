{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-Content-Type-Options" content="nosniff" />
  <meta name="referrer" content="no-referrer" />

  {{-- CSP:
      - Allows local assets and Vite dev server (http://localhost:5173 + ws://).
      - Allows Google Fonts, AOS, CDN Tailwind (for fallback only).
      - Tighten for prod by moving CSP to headers and removing CDN Tailwind if you don’t need fallback.
  --}}
  <meta http-equiv="Content-Security-Policy" content="
    default-src 'self';
    script-src  'self' 'unsafe-inline' 'unsafe-eval'
                http://localhost:5173
                https://cdn.tailwindcss.com
                https://cdnjs.cloudflare.com
                https://unpkg.com
                https://cdn.jsdelivr.net;
    style-src   'self' 'unsafe-inline'
                http://localhost:5173
                https://fonts.googleapis.com
                https://cdnjs.cloudflare.com
                https://unpkg.com;
    font-src    'self' https://fonts.gstatic.com https://cdnjs.cloudflare.com;
    img-src     'self' data:;
    connect-src 'self' ws://localhost:5173 http://localhost:5173;
    base-uri    'self';
    form-action 'self';
  ">

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title','Home')</title>

  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />

  {{-- Fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet" />

  {{-- Icons --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />

  {{-- === Critical anti-FOUC styles (tiny, safe to inline) === --}}
  <style>
    /* Alpine cloak */
    [x-cloak]{display:none!important}

    /* AOS custom (your prize icons) */
    [data-aos="zoom-out-up"]{transform:translateY(50%) scale(.1);opacity:0}
    [data-aos="zoom-out-up"].aos-animate{transform:translateY(0) scale(3);opacity:1}

    /* Baseline page */
    html{scroll-behavior:smooth;overflow-x:hidden}
    body{margin:0;overflow-x:hidden;width:100%}

    /* Navbar fallback so it never shows as plain */
    .nav-fallback{
      background:linear-gradient(to bottom,#1d4ed8,#2563eb 50%,#2563eb);
      box-shadow:0 10px 15px -3px rgba(0,0,0,.1),0 4px 6px -4px rgba(0,0,0,.1);
    }

    /* Make body background visible even before Tailwind paints */
    .bg-boot {
      background-image:url('{{ asset('images/backgroundPhoto1.png') }}');
      background-size:cover; background-position:center; background-repeat:no-repeat;
    }
  </style>

  {{-- === Vite (Tailwind build + your JS) ===
       IMPORTANT: This was wrong in your previous layout (you pointed to css/app.js).
       Keep both in a single @vite call to get proper preloads (prevents FOUC). --}}
  @vite(['resources/css/app.css','resources/js/app.js'])

  {{-- === Tailwind Fallback Loader ===
       If the compiled Tailwind hasn’t applied yet (e.g., Vite cold start),
       we inject CDN Tailwind instantly to prevent FOUC. --}}
  <script>
    (function () {
      function hasTailwind() {
        const el = document.createElement('div');
        el.className = 'hidden';
        document.documentElement.appendChild(el);
        const ok = getComputedStyle(el).display === 'none';
        el.remove();
        return ok;
      }
      // Run ASAP
      if (!hasTailwind()) {
        var s = document.createElement('script');
        s.src = 'https://cdn.tailwindcss.com';
        s.referrerPolicy = 'no-referrer';
        s.onload = function () {
          // minimal config to keep fonts consistent if fallback kicked in
          window.tailwind = window.tailwind || {};
          window.tailwind.config = {
            theme: { extend: {
              fontFamily: { sans: ['Poppins','sans-serif'], luckiest: ['"Luckiest Guy"','cursive'] }
            } }
          };
        };
        document.head.appendChild(s);
      }
    })();
  </script>

  {{-- Allow pages to push head content (e.g., AOS CSS) --}}
  @stack('head')
</head>

<body class="min-h-screen relative bg-gradient-to-b from-orange-300 via-orange-200 to-orange-100 font-sans">
  {{-- Full-viewport background (has CSS fallback via .bg-boot in case Tailwind delays) --}}
  <div class="fixed inset-0 opacity-25 -z-10 bg-boot"></div>

  {{-- Reusable navbar (kept here to ensure it’s always present) --}}
  <x-navbar
    :links="[
      ['label'=>'Home','route'=>'home'],
      ['label'=>'Watch','route'=>'watch'],
      ['label'=>'How to play?','route'=>'mechanics'],
      ['label'=>'Contact Us','route'=>'contact'],
    ]"
    logo="images/logo.gif"
    :rounded="true"
    :sticky="true"
  />

  <main class="min-h-dvh">
    @yield('content')
  </main>

  {{-- Page-level scripts --}}
  @stack('scripts')
</body>
</html>
    