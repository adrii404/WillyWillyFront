@extends('layouts.app')
@section('title','Home')

@push('head')
  {{-- Critical CSS to avoid first-paint jumps --}}
  <style>
    [x-cloak]{display:none!important}
    html{scroll-behavior:smooth;overflow-x:hidden}
    body{margin:0;overflow-x:hidden;width:100%}
  </style>

  {{-- AOS CSS (if used on this page) --}}
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

  {{-- Alpine (only if not already loaded in app.js) --}}
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush

@section('content')
  <!-- Full-viewport background (remove this if you prefer the layout’s bg-boot only) -->
  <div class="fixed inset-0 bg-[url('{{ asset('images/backgroundPhoto1.png') }}')] bg-cover bg-center bg-no-repeat opacity-25 -z-10"></div>

  <!-- MAIN (flex layout: image + form) -->
  <main class="site flex-1">
    <section
      class="relative overflow-hidden my-5 mx-auto w-[96%] max-w-[1400px] rounded-2xl p-[1px] bg-gradient-to-b from-blue-500/30 via-blue-400/20 to-blue-300/10 shadow-lg border border-blue-500/50"
    >
      <!-- thin gradient border wrapper -->
      <div
        class="relative rounded-[calc(1rem-1px)] bg-blue-50/80 p-5 sm:p-7 lg:p-10 bg-[radial-gradient(30rem_18rem_at_15%_-10%,rgba(59,130,246,.08),transparent),radial-gradient(28rem_18rem_at_110%_10%,rgba(255,159,28,.07),transparent),linear-gradient(transparent,transparent)] [background-size:cover]"
      >
        <!-- soft glows -->
        <div class="pointer-events-none absolute -top-16 -left-24 h-56 w-56 rounded-full bg-blue-400/20 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-20 h-64 w-64 rounded-full bg-orange-400/20 blur-3xl"></div>
        <!-- subtle grid overlay -->
        <div class="pointer-events-none absolute inset-0 opacity-[0.08] [background:linear-gradient(transparent_31px,rgba(2,6,23,.15)_32px),linear-gradient(90deg,transparent_31px,rgba(2,6,23,.15)_32px)] [background-size:32px_32px]"></div>

        <div class="relative mb-7">
          <h1 class="text-3xl sm:text-4xl font-bold text-center text-blue-900">Have some questions?</h1>
          <p class="text-center text-slate-600 mt-2">Got feedback or issues? We’re listening.</p>
          <span class="block mx-auto mt-3 h-1 w-24 rounded-full bg-gradient-to-r from-blue-500 via-sky-400 to-orange-400"></span>
        </div>

        <!-- FLEX ROW: keeps image and form aligned -->
        <div class="relative flex flex-col lg:flex-row items-center lg:items-start gap-8 lg:gap-10">
          <!-- LEFT: Visual -->
          <div class="w-full lg:basis-[55%] flex justify-center">
            <div class="relative pb-6">
              <img
                src="{{ asset('images/BoxLetter.png') }}"
                alt="Contact Visual"
                class="w-full max-w-[clamp(28rem,52vw,56rem)] sm:max-w-[clamp(32rem,58vw,60rem)]
                       lg:max-w-[clamp(36rem,60vw,68rem)] 2xl:max-w-[72rem] drop-shadow-md rounded-xl"/>
              <!-- centered chip -->
              <div class="absolute -bottom-3 inset-x-0 flex justify-center">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[12px] font-semibold bg-white/80 backdrop-blur border border-blue-200/70 shadow-sm text-slate-700">
                  <span class="inline-block h-2.5 w-2.5 rounded-full bg-green-500 animate-pulse"></span>
                  Support Online
                </span>
              </div>
            </div>
          </div>

          <!-- RIGHT: Form -->
          <form action="#" method="post" class="w-full lg:basis-[45%] bg-white/85 backdrop-blur rounded-2xl p-5 sm:p-7 lg:p-8 border border-blue-200/70 shadow-sm">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
              <!-- First Name -->
              <div class="relative">
                <label for="first_name" class="sr-only">First Name</label>
                <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2">
                  <i class="fa-regular fa-user text-slate-400"></i>
                </span>
                <input id="first_name" name="first_name" type="text" required
                       class="w-full rounded-full border border-slate-300 pl-10 pr-4 py-3 text-[15px]
                              focus:outline-none focus:ring-2 focus:ring-blue-500/70 focus:border-blue-500
                              bg-white placeholder:slate-400"
                       placeholder="First Name"/>
              </div>

              <!-- Last Name -->
              <div class="relative">
                <label for="last_name" class="sr-only">Last Name</label>
                <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2">
                  <i class="fa-regular fa-user text-slate-400"></i>
                </span>
                <input id="last_name" name="last_name" type="text" required
                       class="w-full rounded-full border border-slate-300 pl-10 pr-4 py-3 text-[15px]
                              focus:outline-none focus:ring-2 focus:ring-blue-500/70 focus:border-blue-500
                              bg-white placeholder:slate-400"
                       placeholder="Last Name"/>
              </div>

              <!-- Email -->
              <div class="relative sm:col-span-2">
                <label for="email" class="sr-only">Email</label>
                <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2">
                  <i class="fa-regular fa-envelope text-slate-400"></i>
                </span>
                <input id="email" name="email" type="email" required
                       class="w-full rounded-full border border-slate-300 pl-10 pr-4 py-3 text-[15px]
                              focus:outline-none focus:ring-2 focus:ring-blue-500/70 focus:border-blue-500
                              bg-white placeholder:slate-400"
                       placeholder="Email"/>
              </div>

              <!-- Message -->
              <div class="relative sm:col-span-2">
                <label for="message" class="sr-only">Your questions</label>
                <span class="pointer-events-none absolute left-4 top-4">
                  <i class="fa-regular fa-comment-dots text-slate-400"></i>
                </span>
                <textarea id="message" name="message" rows="6" required
                          class="w-full rounded-2xl border border-slate-300 pl-10 pr-4 py-4 text-[15px]
                                 focus:outline-none focus:ring-2 focus:ring-blue-500/70 focus:border-blue-500
                                 bg-white placeholder:slate-400"
                          placeholder="Your questions..."></textarea>
              </div>
            </div>

            <!-- actions + contact badges -->
            <div class="mt-6 space-y-3">
              <div class="flex items-center justify-between gap-3">
                <p class="text-xs sm:text-[13px] text-slate-500">We respond within 24–48 hours.</p>
                <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-orange-500 text-white font-semibold px-6 py-3
                               hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition">
                  <i class="fa-solid fa-paper-plane text-sm"></i>
                  Send Message
                </button>
              </div>

              <div class="relative">
                <div class="h-px w-full bg-slate-300/60"></div>
                <span class="absolute -top-2 left-1/2 -translate-x-1/2 bg-white/80 px-2 text-[11px] text-slate-500">or reach us</span>
              </div>

              <div class="flex flex-wrap items-center justify-center gap-2">
                <a href="mailto:support@wilyonaryo.ph"
                   class="inline-flex items-center gap-2 rounded-full border border-slate-300 bg-white/80 px-3 py-1.5 text-[12px]
                          text-slate-700 hover:border-blue-400 hover:text-blue-700 transition">
                  <i class="fa-regular fa-envelope"></i> support@wilyonaryo.ph
                </a>
                <a href="#"
                   class="inline-flex items-center gap-2 rounded-full border border-slate-300 bg-white/80 px-3 py-1.5 text-[12px]
                          text-slate-700 hover:border-blue-400 hover:text-blue-700 transition">
                  <i class="fa-brands fa-telegram"></i> Telegram Support
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="mt-auto w-full">
    <div class="max-w-screen-2xl mx-auto px-4 md:px-6 mt-6 md:mt-10">
      <div class="text-white bg-blue-400/65 rounded-lg p-3 sm:p-4 md:p-6 border-2 border-blue-600">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
          <!-- Left -->
          <div class="leading-snug">
            <h4 class="font-bold text-base sm:text-lg md:text-2xl">Wilyonaryo™</h4>
            <p class="text-[10px] sm:text-sm md:text-base mt-2">
              Wilyonaryo seats in the heart of Clark Freeport Zone, formerly Clark Air Base, Philippines
            </p>
            <h5 class="font-bold text-sm md:text-xl mt-3">Official License & Gaming Responsibility</h5>
            <p class="text-[10px] sm:text-sm md:text-base mt-2">
              Wilyonaryo seats in the heart of Clark Freeport Zone, formerly Clark Air Base, Philippines
            </p>
            <img src="{{ asset('images/pagcor-logo.png') }}" alt="PAGCOR" class="h-5 w-auto sm:h-6 md:h-10 mt-2 md:ml-2"/>
            <p class="text-[10px] sm:text-xs md:text-base mt-2">
              Gambling doesn't guarantee earnings or financial improvement. Stay within your limits.
              Need Help? Contact PAGCOR at (02) 8527-9831 or visit www.pagcor.ph/regulatory/responsible-gaming.php
            </p>
          </div>

          <!-- Right -->
          <div class="flex flex-col">
            <h6 class="font-bold text-sm md:text-xl">Web Map</h6>
            <div class="mt-2 flex gap-10 md:gap-20">
              <div class="flex flex-col">
                <a href="#" class="text-[12px] md:text-base mt-2 hover:underline">Live Game</a>
                <a href="#" class="text-[12px] md:text-base mt-2 hover:underline">Home</a>
                <a href="#" class="text-[12px] md:text-base mt-2 hover:underline">Promotion</a>
              </div>
              <div class="flex flex-col">
                <a href="#" class="text-[12px] md:text-base mt-2 hover:underline">Support</a>
                <a href="#" class="text-[12px] md:text-base mt-2 hover:underline">FAQs</a>
                <a href="#" class="text-[12px] md:text-base mt-2 hover:underline">Terms and Conditions</a>
              </div>
              <div class="flex flex-col">
                <a href="#" class="text-[12px] md:text-base mt-2 hover:underline">Privacy Policy</a>
              </div>
            </div>

            <div class="mt-4">
              <h6 class="font-bold text-sm md:text-xl">Join our community</h6>
              <div class="flex items-center gap-3 mt-2">
                <a href="#"><img src="{{ asset('images/FbLogo.png') }}" alt="Facebook" class="h-5 md:h-8 w-auto"/></a>
                <a href="#"><img src="{{ asset('images/teleLogo2.png') }}" alt="Telegram" class="h-5 md:h-8 w-auto"/></a>
              </div>

              <h6 class="font-bold text-sm md:text-xl mt-4">Follow Us</h6>
              <div class="flex flex-wrap items-center gap-3 mt-2">
                <a href="#"><img src="{{ asset('images/FbLogo.png') }}" alt="Facebook" class="h-5 md:h-8 w-auto"/></a>
                <a href="#"><img src="{{ asset('images/xlogo.png') }}" alt="X" class="h-5 md:h-8 w-auto"/></a>
                <a href="#"><img src="{{ asset('images/tiktoklogo.png') }}" alt="TikTok" class="h-5 md:h-8 w-auto"/></a>
                <a href="#"><img src="{{ asset('images/instagramLogo.png') }}" alt="Instagram" class="h-5 md:h-8 w-auto"/></a>
                <a href="#"><img src="{{ asset('images/youtubelogo.png') }}" alt="YouTube" class="h-5 md:h-8 w-auto"/></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Copyright -->
        <div class="flex justify-center items-center my-2 sm:mt-3">
          <p class="text-[10px] md:text-[12px] text-gray-800 text-center bg-orange-50/60 rounded px-2 py-0.5 sm:py-1">
            ©2024-2025 WILYONARYO PLUS ALL RIGHT RESERVED
          </p>
        </div>
      </div>
    </div>
  </footer>
@endsection

@push('scripts')
  {{-- AOS JS (if used) --}}
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script> AOS.init({ duration: 700, once: true, offset: 120, easing: "ease-out" }); </script>
@endpush
