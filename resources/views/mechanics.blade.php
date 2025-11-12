@extends('layouts.app')
@section('title','Home')

@push('head')
  {{-- Critical CSS to avoid first-paint jumps --}}
  <style>
    [x-cloak]{display:none!important}
    html{scroll-behavior:smooth;overflow-x:hidden}
    body{margin:0;overflow-x:hidden;width:100%}
  </style>

  {{-- AOS CSS must be in <head> --}}
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

  {{-- Alpine (safe to include here if your app.js doesn't already register Alpine).
       If your Vite app.js already loads Alpine, you can remove this script. --}}
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush

@section('content')
  <!-- Full-viewport background -->
  <div class="fixed inset-0 bg-[url('{{ asset('images/backgroundPhoto1.png') }}')] bg-cover bg-center bg-no-repeat opacity-25 -z-10"></div>

  {{-- NOTE: We REMOVED the <header> navbar here to avoid a second navbar repaint.
           The layout already renders <x-navbar>. Duplicating it causes a visible flash/reflow. --}}

  <main class="site">
    <div class="bg-blue-50/80 my-4 rounded-md py-3">
      <div class="flex flex-col justify-center gap-3 text-center mx-8">
        <h1 class="font-bold text-[clamp(1.25rem,3.5vw,2.75rem)]">How to play?</h1>

        <h2 class="text-lg lg:text-2xl font-bold text-start">Wilyonaryo®</h2>
        <p class="text-xs lg:text-lg text-start font-medium">
          Powerball® costs $2 per play. In Idaho and Montana, Powerball is
          bundled with Power Play® for a minimum purchase price of $3 per play.
          Select five numbers between 1 and 69 for the white balls, then select
          one number between 1 and 26 for the red Powerball. Choose your numbers
          on a play slip or let the lottery terminal randomly pick your numbers.
          Drawings are held every Monday, Wednesday, and Saturday at 10:59 pm ET
          at the Florida Lottery draw studio in Tallahasee.
        </p>

        <h2 class="text-lg lg:text-2xl font-bold text-start">Lucky Pick®</h2>
        <p class="text-xs lg:text-lg text-start font-medium">
          Ask for Power Play® with your Powerball purchase! For an additional
          $1 per play, the Power Play feature can multiply non-jackpot prizes
          by 2, 3, 4, 5 or 10 times! Note: the Match 5 prize with Power Play is
          always $2 million. The multiplier number is randomly selected before
          each drawing. The 10X multiplier is only in play when the advertised
          jackpot annuity is $150 million or less.
        </p>
      </div>

      <div class="flex flex-col justify-center gap-3 text-center mx-4 my-2">
        <h1 class="font-bold text-[clamp(1.25rem,3.5vw,2.75rem)]">5 Ways to Win!</h1>
        <p class="mx-auto max-w-3xl text-[clamp(.8rem,1.1vw,1.1rem)]">
          Jackpot winners may choose to receive their prize as an annuity,
          paid in 30 graduated payments over 29 years, or a lump-sum payment.
        </p>
        <p class="mx-auto max-w-3xl text-[clamp(.8rem,1.1vw,1.1rem)]">
          All lower-tier prizes are set cash amounts.
        </p>
        <p class="mx-auto max-w-3xl text-[clamp(.8rem,1.1vw,1.1rem)]">
          In California, prize payout amounts are pari-mutuel and determined
          by sales and the number of winners.
        </p>
      </div>

      <!-- Alpine scope: keep hidden until hydrated -->
      <div class="mt-6 rounded-xl border mx-2 lg:mx-8 overflow-x-auto"
           x-data="prizeChart()" x-cloak>
        <table class="min-w-[560px] md:min-w-[720px] w-full table-fixed text-[10px] sm:text-[clamp(.7rem,1vw,1rem)]">
          <colgroup>
            <col class="w-[50%] sm:w-[44%]" />
            <col class="w-[32%] sm:w-[36%]" />
            <col class="w-[18%] sm:w-[20%]" />
          </colgroup>

          <thead class="bg-blue-600 text-white text-[11px] sm:text-[clamp(.8rem,1.4vw,1.4rem)]">
            <tr>
              <th class="text-left font-semibold px-2 py-1 sm:px-3 sm:py-2">Match</th>
              <th class="text-left font-semibold px-2 py-1 sm:px-3 sm:py-2">Visual</th>
              <th class="text-right font-semibold px-2 py-1 sm:px-3 sm:py-2">Prize</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-slate-200">
            <template x-for="t in tiers" :key="t.key + '-row'">
              <tr class="bg-orange-50/70">
                <!-- Match -->
                <td class="px-2 py-1 sm:px-3 sm:py-2 font-medium leading-tight truncate" x-text="t.label"></td>

                <!-- Visual -->
                <td class="px-2 py-1 sm:px-3 sm:py-2">
                  <div class="flex items-center gap-1 sm:gap-2">
                    <span class="inline-flex items-center gap-1 sm:gap-1.5">
                      <!-- letters with + between -->
                      <template x-for="(_, idx) in arr(t.letters)" :key="idx">
                        <span class="inline-flex items-center gap-1 sm:gap-1.5">
                          <span class="w-5 h-5 sm:w-6 sm:h-6 rounded-[4px] bg-white grid place-items-center font-bold leading-none"
                                x-text="sampleLetter(idx)"></span>
                          <template x-if="idx < t.letters - 1">
                            <span class="font-bold leading-none select-none text-black text-[10px] sm:text-xs">+</span>
                          </template>
                        </span>
                      </template>

                      <!-- + before color dot (if any) -->
                      <template x-if="t.color">
                        <span class="font-bold leading-none select-none text-black text-[10px] sm:text-xs">+</span>
                      </template>
                    </span>

                    <!-- color dot -->
                    <template x-if="t.color">
                      <span class="w-3 h-3 sm:w-4 sm:h-4 rounded-full bg-red-500" title="Color"></span>
                    </template>
                  </div>
                </td>

                <!-- Prize -->
                <td class="px-2 py-1 sm:px-3 sm:py-2 text-right font-bold tabular-nums leading-tight" x-text="formatP(t)"></td>
              </tr>
            </template>
          </tbody>
        </table>
      </div>

      <!-- Next Draw -->
      <section class="mx-auto px-3 mt-6 lg:px-6">
        <div
          x-data="{
            target:new Date(Date.now()+1000*60*60*24).toISOString(),
            now:Date.now(), t:null,
            get left(){ return Math.max(0, new Date(this.target) - this.now) },
            fmt(ms){ const s=Math.floor(ms/1000),h=Math.floor(s/3600),m=Math.floor(s%3600/60),sec=s%60; return `${h}h ${m}m ${sec}s`; },
            start(){ this.t=setInterval(()=>this.now=Date.now(),1000) },
            stop(){ clearInterval(this.t) }
          }"
          x-init="start()" x-cloak
          class="rounded-2xl bg-gradient-to-r from-blue-600 to-blue-500 text-white p-[clamp(1rem,2.5vw,1.5rem)]
                 flex flex-col md:flex-row items-center justify-between gap-4 shadow-lg">
          <div class="text-center md:text-left">
            <h3 class="text-[clamp(1.1rem,1.8vw,1.6rem)] font-bold">Next Draw</h3>
            <p class="text-white/90 text-[clamp(.8rem,1vw,1rem)]">Closes soon — don’t miss out.</p>
          </div>
          <div class="text-[clamp(1.25rem,2.2vw,1.8rem)] font-extrabold tabular-nums">
            <span x-text="fmt(left)"></span>
          </div>
          <div class="flex items-center gap-3">
            <a href="{{ url('register') }}" class="px-[clamp(.9rem,2.2vw,1.25rem)] py-[clamp(.45rem,1.2vw,.7rem)]
               rounded-full bg-orange-400 hover:bg-orange-500 font-semibold">Register</a>
            <a href="{{ url('login') }}" class="px-[clamp(.9rem,2.2vw,1.25rem)] py-[clamp(.45rem,1.2vw,.7rem)]
               rounded-full bg-white text-blue-700 hover:bg-blue-50 font-semibold">Play Now</a>
          </div>
        </div>
      </section>

      <!-- Winning Combination History -->
      <section class="mx-auto px-3 mt-6 pb-8 lg:px-6">
        <div class="bg-blue-50/80 rounded-xl border border-blue-200">
          <div class="px-4 py-2 bg-blue-600 text-white font-bold rounded-t-xl text-[clamp(1rem,1.8vw,1.5rem)]">
            Winning Combination History
          </div>
          <ul class="divide-y divide-blue-100 text-[clamp(.85rem,1.1vw,1.15rem)]">
            <li class="flex items-center justify-between px-4 py-2">
              <span class="font-medium">Oct 24, 12:00</span>
              <span class="flex items-center gap-2">
                <span class="inline-flex gap-1">
                  <span class="w-6 h-6 rounded-md bg-white grid place-items-center font-bold">A</span>
                  <span class="w-6 h-6 rounded-md bg-white grid place-items-center font-bold">R</span>
                  <span class="w-6 h-6 rounded-md bg-white grid place-items-center font-bold">M</span>
                  <span class="w-6 h-6 rounded-md bg-white grid place-items-center font-bold">Y</span>
                </span>
                <span class="w-4 h-4 rounded-full bg-red-500" title="Color"></span>
              </span>
            </li>
            <li class="flex items-center justify-between px-4 py-2">
              <span class="font-medium">Oct 24, 12:03</span>
              <span class="flex items-center gap-2">
                <span class="inline-flex gap-1">
                  <span class="w-6 h-6 rounded-md bg-white grid place-items-center font-bold">B</span>
                  <span class="w-6 h-6 rounded-md bg-white grid place-items-center font-bold">K</span>
                  <span class="w-6 h-6 rounded-md bg-white grid place-items-center font-bold">W</span>
                  <span class="w-6 h-6 rounded-md bg-white grid place-items-center font-bold">N</span>
                </span>
                <span class="w-4 h-4 rounded-full bg-yellow-400" title="Color"></span>
              </span>
            </li>
            <li class="flex items-center justify-between px-4 py-2">
              <span class="font-medium">Oct 24, 12:03</span>
              <span class="flex items-center gap-2">
                <span class="inline-flex gap-1">
                  <span class="w-6 h-6 rounded-md bg-white grid place-items-center font-bold">Y</span>
                  <span class="w-6 h-6 rounded-md bg-white grid place-items-center font-bold">K</span>
                  <span class="w-6 h-6 rounded-md bg-white grid place-items-center font-bold">W</span>
                  <span class="w-6 h-6 rounded-md bg-white grid place-items-center font-bold">O</span>
                </span>
                <span class="w-4 h-4 rounded-full bg-green-400" title="Color"></span>
              </span>
            </li>
            <li class="flex items-center justify-between px-4 py-2">
              <span class="font-medium">Oct 24, 12:03</span>
              <span class="flex items-center gap-2">
                <span class="inline-flex gap-1">
                  <span class="w-6 h-6 rounded-md bg-white grid place-items-center font-bold">A</span>
                  <span class="w-6 h-6 rounded-md bg-white grid place-items-center font-bold">D</span>
                  <span class="w-6 h-6 rounded-md bg-white grid place-items-center font-bold">T</span>
                  <span class="w-6 h-6 rounded-md bg-white grid place-items-center font-bold">I</span>
                </span>
                <span class="w-4 h-4 rounded-full bg-blue-400" title="Color"></span>
              </span>
            </li>
          </ul>
        </div>
      </section>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="max-w-screen-2xl mx-auto px-4 md:px-6 mt-6 md:mt-10">
    <div class="text-white bg-blue-400/65 rounded-lg p-3 sm:p-4 md:p-6 border-2 border-blue-600">
      <div class="grid grid-cols-2 md:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        <!-- Left -->
        <div class="leading-snug">
          <h4 class="font-bold text-base sm:text-lg md:text-2xl">Wilyonaryo™</h4>
          <p class="text-[7px] lg:text-lg mt-1 sm:mt-2">
            Wilyonaryo seats in the heart of Clark Freeport Zone, formerly Clark Air Base, Philippines
          </p>
          <h5 class="font-bold text-xs sm:text-sm md:text-xl mt-2 sm:mt-3">Official License & Gaming Responsibility</h5>
          <p class="text-[7px] lg:text-lg mt-1 sm:mt-2">
            Wilyonaryo seats in the heart of Clark Freeport Zone, formerly Clark Air Base, Philippines
          </p>
          <img src="{{ asset('images/pagcor-logo.png') }}" alt="" class="h-5 w-auto sm:h-6 md:h-10 mt-2 sm:mt-2 md:ml-2" />
          <p class="text-[7px] sm:text-[11px] md:text-[16px] mt-2 sm:mt-2">
            Gambling doesn't guarantee earnings or financial improvement. Stay within your limits. Need Help? Contact PAGCOR at (02) 8527-9831 or visit www.pagcor.ph/regulatory/responsible-gaming.php
          </p>
        </div>

        <!-- Right -->
        <div class="flex flex-col mx-4">
          <h1 class="font-bold text-xs 2xl:text-xl">Web Map</h1>
          <div class="flex lg:gap-32">
            <div class="flex flex-col">
              <a href="#" class="text-[8px] mt-2 2xl:text-[16px] hover:underline">Live Game</a>
              <a href="#" class="text-[8px] mt-2 2xl:text-[16px] hover:underline">Home</a>
              <a href="#" class="text-[8px] mt-2 2xl:text-[16px] hover:underline">Promotion</a>
            </div>
            <div class="flex flex-col mx-2">
              <a href="#" class="text-[8px] mt-2 2xl:text-[16px] hover:underline">Support</a>
              <a href="#" class="text-[8px] mt-2 2xl:text-[16px] hover:underline">FAQs</a>
              <a href="#" class="text-[8px] mt-2 2xl:text-[16px] hover:underline">Terms and Conditions</a>
            </div>
            <div class="flex flex-col">
              <a href="#" class="text-[8px] mt-2 2xl:text-[16px] hover:underline">Privacy Policy</a>
            </div>
          </div>

          <div class="col-span-3 sm:col-span-3">
            <h6 class="font-bold text-xs sm:text-sm md:text-xl mt-2">Join our community</h6>
            <div class="flex items-center gap-2 sm:gap-3 mt-1 sm:mt-2">
              <a href="#"><img src="{{ asset('images/FbLogo.png') }}" alt="" class="h-4 sm:h-5 md:h-8 w-auto" /></a>
              <a href="#"><img src="{{ asset('images/teleLogo2.png') }}" alt="" class="h-4 sm:h-5 md:h-8 w-auto" /></a>
            </div>

            <h6 class="font-bold text-xs sm:text-sm md:text-xl mt-3 sm:mt-4">Follow Us</h6>
            <div class="flex flex-wrap items-center gap-1 sm:gap-3 mt-1 sm:mt-2">
              <a href="#"><img src="{{ asset('images/FbLogo.png') }}" alt="" class="h-4 sm:h-5 md:h-8 w-auto" /></a>
              <a href="#"><img src="{{ asset('images/xlogo.png') }}" alt="" class="h-4 sm:h-5 md:h-8 w-auto" /></a>
              <a href="#"><img src="{{ asset('images/tiktoklogo.png') }}" alt="" class="h-4 sm:h-5 md:h-8 w-auto" /></a>
              <a href="#"><img src="{{ asset('images/instagramLogo.png') }}" alt="" class="h-4 sm:h-5 md:h-8 w-auto" /></a>
              <a href="#"><img src="{{ asset('images/youtubelogo.png') }}" alt="" class="h-4 sm:h-5 md:h-8 w-auto" /></a>
            </div>
          </div>
        </div>
      </div>
  </footer>

  <div class="flex justify-center items-center my-2 sm:mt-3">
    <p class="text-[10px] md:text-[12px] text-gray-800 text-center bg-orange-50/60 rounded px-2 py-0.5 sm:py-1">
      ©2024-2025 WILYONARYO PLUS ALL RIGHT RESERVED
    </p>
  </div>
@endsection

@push('scripts')
  {{-- AOS JS after content --}}
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 700, once: true, offset: 120, easing: "ease-out" });
    window.addEventListener("load", () => setTimeout(() => AOS.refresh(), 100));
  </script>

  <script>
    function prizeChart() {
      return {
        multiplier: 1,
        tiers: [
          { key: "jackpot", label: "4 LETTERS + COLOR (JACKPOT)", letters: 4, color: true,  base: 1200000, fixed: true  },
          { key: "four",    label: "4 LETTERS",                   letters: 4, color: false, base: 30000,   fixed: false },
          { key: "3c",      label: "3 LETTERS + COLOR",           letters: 3, color: true,  base: 10000,   fixed: false },
          { key: "3",       label: "3 LETTERS",                   letters: 3, color: false, base: 500,     fixed: false },
          { key: "2c",      label: "2 LETTERS + COLOR",           letters: 2, color: true,  base: 300,     fixed: false },
        ],
        peso(n){ return "₱" + Number(n).toLocaleString("en-PH") },
        formatP(t){ return t.fixed ? this.peso(t.base) : this.peso(t.base * (this.multiplier || 1)) },
        arr(n){ return Array.from({ length: n }) },
        sampleLetter(i){ const A="ABCDEFGHIJKLMNOPQRSTUVWXYZ"; return A[i % A.length] },
      }
    }
  </script>
@endpush
