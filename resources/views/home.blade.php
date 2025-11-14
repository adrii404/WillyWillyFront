{{-- resources/views/home.blade.php --}}
@extends('layouts.app')
@section('title','Home')

@push('head')
  {{-- AOS CSS must be in <head> --}}
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
@endpush

@section('content')

  <!-- HERO -->
  <section class="max-w-screen-2xl mx-auto px-4 md:px-6 mt-8 md:mt-14 lg:pt-20 lg:pb-32 lg:translate-x-12 lg:translate-y-8">
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-10 items-center">
      <!-- Left: Text -->
      <div class="hidden xl:block">
        <h1 class="font-semibold leading-tight text-[clamp(2rem,2.5vw,3.5rem)]">
          Play
          <span class="text-orange-400 font-bold text-5xl" style="-webkit-text-stroke: 1px #a14900">Wilyonaryo</span>
          now! &amp; Win Money Unlimited
        </h1>
        <p class="mt-6 text-[clamp(1rem,1vw+0.8rem,1.25rem)] max-w-prose">
          Play Wilyonaryo and earn one million pesos, a car, and even a house
          and lot! "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
        </p>
        <a href="{{ url('register') }}"
           class="mt-8 inline-flex items-center justify-center h-10 px-6 lg:p-8 rounded-full font-semibold lg:text-2xl text-white bg-blue-600 hover:bg-blue-700 transition-colors">
          Buy Tickets
        </a>
      </div>

      <!-- Right: layered block -->
      <div class="relative w-full mx-auto max-w-4xl lg:-translate-x-10
                  lg:-mt-20 lg:scale-90
                  min-[1366px]:-mt-20 min-[1366px]:scale-[85%]
                  min-[1600px]:-mt-24 min-[1600px]:scale-90
                  min-[1920px]:-mt-2 min-[1920px]:scale-100">
        <div class="relative aspect-[16/10]">
          <img src="{{ asset('images/lightScreen.gif') }}" alt=""
               class="absolute inset-0 h-full object-contain drop-shadow-2xl
                      w-[90%] translate-x-[5%] top-[5%]
                      min-[1600px]:w-[88%] min-[1600px]:translate-x-[6%] min-[1600px]:top-[4%]
                      min-[1920px]:w-[86%] min-[1920px]:translate-x-[7%] min-[1920px]:top-[3%]" />
          <img src="{{ asset('images/willie.png') }}" alt="picture of koya wel"
               class="absolute left-1/2 -translate-x-1/2 drop-shadow-2xl
                      -top-[15%] w-[82%] max-w-[560px]
                      min-[1600px]:-top-[18%] min-[1600px]:w-[80%] min-[1600px]:max-w-[640px]
                      min-[1920px]:-top-[20%] min-[1920px]:w-[78%] min-[1920px]:max-w-[720px]" />
          <img src="{{ asset('images/frame.gif') }}" alt=""
               class="absolute left-1/2 -translate-x-1/2 drop-shadow-2xl
                      top-[76%] w-[78%] max-w-[980px]
                      min-[1600px]:top-[74%] min-[1600px]:w-[76%] min-[1600px]:max-w-[1100px]
                      min-[1920px]:top-[72%] min-[1920px]:w-[74%] min-[1920px]:max-w-[1220px]" />
        </div>
      </div>

      <!-- Mobile intro text -->
      <div class="xl:hidden text-center px-2 my-20 mx-8">
        <h1 class="font-bold text-[clamp(1.25rem,4vw,2rem)]">Wilyonaryo</h1>
        <p class="text-[clamp(.8rem,2.5vw,.95rem)] mt-2">
          Play Wilyonaryo and earn one million pesos, a brand-new car, and
          even a house and lot! Join the fun, test your luck, and experience
          the excitement of winning life-changing prizes.
        </p>
        <a href="{{ url('register') }}"
           class="inline-flex mt-4 items-center justify-center h-9 px-5 rounded-full font-semibold text-white bg-blue-600 hover:bg-blue-700 transition-colors text-sm">
          Buy Tickets
        </a>
      </div>
    </div>
  </section>

  <!-- HERO / INTRO -->
  <section data-aos="fade-down" data-aos-once="true"
           class="container mx-auto max-w-screen-2xl px-4 md:px-6 lg:mt-72 pt-[clamp(1.5rem,4vw,3.5rem)]">
    <h1 class="text-center font-bold text-[clamp(1.25rem,4vw,3rem)]">Discover the Lottery Experience</h1>
    <p class="mt-3 text-center text-[clamp(.8rem,1.6vw,1.25rem)] max-w-4xl mx-auto">
      From playing your numbers to exploring jackpots and playing responsibly,
      here's everything you need to know. Learn how it works, see today's
      biggest prizes, and enjoy the excitement responsibly.
    </p>
  </section>

  <!-- ROW 1 -->
  <section data-aos="fade-right" class="container mx-auto max-w-screen-2xl px-4 md:px-6 mt-10 lg:my-40">
    <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-6 lg:gap-10">
      <div class="rounded-2xl p-4 md:p-6">
        <h2 class="font-bold text-[clamp(1rem,3vw,2.25rem)]">How It Works</h2>
        <p class="mt-2 text-[clamp(.85rem,1.5vw,1.125rem)] leading-relaxed">
          Playing the lottery has never been simpler. Pick your favorite
          numbers, purchase your ticket online, and tune in for the draw.
          Winners are automatically notified, making your experience smooth
          and exciting.
        </p>
      </div>
      <div class="rounded-2xl overflow-hidden">
        <div class="aspect-[16/10] lg:aspect-[4/3]">
          <img src="{{ asset('images/lottery2.png') }}" alt="How it works"
               class="lg:h-[80%] h-[70%] w-[80%] mx-auto object-cover rounded-2xl shadow-xl" />
        </div>
      </div>
    </div>
  </section>

  <!-- ROW 2 -->
  <section data-aos="fade-right" class="container mx-auto max-w-screen-2xl px-4 md:px-6 mt-10 lg:my-40">
    <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-6 lg:gap-10">
      <div class="order-last md:order-first rounded-2xl overflow-hidden">
        <div class="aspect-[16/10] lg:aspect-[4/3]">
          <img src="{{ asset('images/lottery3.png') }}" alt="Current jackpots"
               class="lg:h-[80%] h-[70%] w-[80%] mx-auto object-cover rounded-2xl shadow-xl" />
        </div>
      </div>
      <div class="rounded-2xl p-4 md:p-6">
        <h2 class="font-bold text-[clamp(1rem,3vw,2.25rem)]">Current Jackpots</h2>
        <p class="mt-2 text-[clamp(.85rem,1.5vw,1.125rem)] leading-relaxed">
          Explore the latest jackpots and see which games are offering the
          biggest prizes today. From local draws to international lotteries,
          there's a chance for everyone to win big.
        </p>
      </div>
    </div>
  </section>

  <!-- ROW 3 -->
  <section data-aos="fade-right" class="container mx-auto max-w-screen-2xl px-4 md:px-6 mt-10 lg:my-40">
    <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-6 lg:gap-10">
      <div class="rounded-2xl p-4 md:p-6">
        <h2 class="font-bold text-[clamp(1rem,3vw,2.25rem)]">Responsible Gaming</h2>
        <p class="mt-2 text-[clamp(.85rem,1.5vw,1.125rem)] leading-relaxed">
          Your fun is important, but safety comes first. Set limits, play
          responsibly, and enjoy the excitement of the lottery without
          overextending yourself.
        </p>
      </div>
      <div class="rounded-2xl overflow-hidden">
        <div class="aspect-[16/10] lg:aspect-[4/3]">
          <img src="{{ asset('images/lottery1.png') }}" alt="Responsible gaming"
               class="lg:h-[80%] h-[70%] w-[80%] mx-auto object-cover rounded-2xl shadow-xl" />
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section data-aos="fade-down" data-aos-once="true" class="container mx-auto max-w-screen-2xl px-4 md:px-6 mt-14 mb-10">
    <h2 class="text-center font-bold text-[clamp(1.1rem,3.5vw,2.5rem)]">Win Life-Changing Prizes Today!</h2>
    <p class="mt-3 text-center text-[clamp(.85rem,1.6vw,1.25rem)] max-w-4xl mx-auto">
      Step into the excitement of our lottery and get the opportunity to
      change your life. Imagine driving away in a brand-new car, moving into
      your dream house & lot, or holding a check for ₱6 Million pesos. Even
      ₱50,000 in cash could be yours—just one lucky ticket away!
    </p>
  </section>

  <div class="flex justify-center -mt-[100px] 2xl:mt-[200px] 2xl:scale-125 w-full overflow-x-hidden px-4">
    @foreach (['grandprize.png','newcar.png','houseandlot.png','fifty.png'] as $img)
      <div class="relative flex justify-center items-end h-60 mx-2">
        <img src="{{ asset('images/openBox.png') }}" alt="Box opening" class="h-24 w-auto 2xl:h-60 drop-shadow-xl" />
        <img src="{{ asset('images/'.$img) }}" alt="Prize" data-aos="zoom-out-up" data-aos-delay="100" data-aos-once="false"
             class="absolute bottom-12 h-14 w-14 2xl:h-28 2xl:left-[40px] left-[12px] 2xl:bottom-[105px] 2xl:w-28 rounded-full shadow-xl shadow-orange-500/50" />
      </div>
    @endforeach
  </div>

  <!-- JACKPOT BANNER -->
  <section class="max-w-screen-2xl mx-auto px-4 md:px-6 mt-16">
    <div class="relative flex justify-center items-center">
      <img src="{{ asset('images/WillieBanner.png') }}" alt=""
           class="w-[92%] md:w-[90%] rounded-lg h-auto md:h-[320px] object-cover" />
      <div class="absolute inset-0 flex items-center justify-center lg:justify-start"></div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="max-w-7xl mx-auto px-4 md:px-6 mt-6 md:mt-10">
    <div class="text-white bg-blue-400/65 rounded-lg p-3 sm:p-4 md:p-6 border-2 border-blue-600">
      <div class="grid grid-cols-2 md:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        <!-- Left -->
        <div class="leading-snug">
          <h4 class="font-bold text-base sm:text-lg md:text-2xl">Wilyonaryo™</h4>
          <p class="text-[7px] lg:text-lg mt-1 sm:mt-2">
            Wilyonaryo draws are held at Wil Tower in Quezon City, Philippines.
          </p>
          <h5 class="font-bold text-xs sm:text-sm md:text-xl mt-2 sm:mt-3">Official License & Gaming Responsibility</h5>
          <p class="text-[7px] lg:text-lg mt-1 sm:mt-2">
            Wilyonaryo draws are held at Wil Tower in Quezon City, Philippines.
          </p>
          <img src="{{ asset('images/pagcor-logo.png') }}" alt="" class="h-5 w-auto sm:h-6 md:h-10 mt-2 sm:mt-2 md:ml-2" />
          <p class="text-[7px] sm:text-[11px] md:text-[16px] mt-2 sm:mt-2">
            Joining promos and raffles is for entertainment and does not guarantee winnings or financial gain. Always participate within your means. Need help? Contact PAGCOR at (02) 8527-9831 or visit www.pagcor.ph/regulatory/responsible-gaming.php 
          </p>
        </div>

        <!-- Right -->
        <div class="flex flex-col mx-4">
          <h1 class="font-bold text-xs 2xl:text-xl">Web Map</h1>
          <div class="flex lg:gap-32">
            <div class="flex flex-col">
              <a href="#" class="text-[8px] mt-2 2xl:text-[16px] hover:underline">Live Draws</a>
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
  {{-- AOS JS at the end of body, after content --}}
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 1000, once: false, offset: 150, delay: 0, easing: "ease-in-out", mirror: true, anchorPlacement: "top-bottom" });
    window.addEventListener("load", () => setTimeout(() => AOS.refresh(), 100));
    let scrollTimeout;
    window.addEventListener("scroll", () => { clearTimeout(scrollTimeout); scrollTimeout = setTimeout(() => AOS.refresh(), 50); });

    // Yesterday label (if present)
    const yEl = document.getElementById("yesterday");
    if (yEl) {
      const d = new Date(); d.setDate(d.getDate() - 1);
      yEl.textContent = d.toLocaleDateString("en-PH", { weekday: "long", year: "numeric", month: "long", day: "numeric" });
    }
  </script>
@endpush
