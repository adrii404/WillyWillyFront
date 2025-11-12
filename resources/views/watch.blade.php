{{-- resources/views/watch.blade.php --}}
@extends('layouts.app')
@section('title','Watch')

@section('content')
  <section class="site flex-1">
    <div class="relative overflow-hidden bg-blue-50/80 my-4 rounded-md py-6 w-full lg:w-[90%] mx-auto p-3 lg:p-5">
      <h1 class="font-bold text-xl my-2 lg:text-3xl lg:my-4 text-center">
        Watch Wilyonaryo Now!
      </h1>

      <p class="font-medium text-xs lg:text-xl lg:my-4">
        Powerball® drawings are broadcast live every Monday, Wednesday, and
        Saturday at 10:59 pm ET from the Florida Lottery draw studio in
        Tallahassee.
        <br /><br />
        Powerball and Double Play® drawings are also live streamed right here
        on the Powerball website.
        <br /><br />
        Check out our YouTube channel for more draw show clips.
      </p>

      <a href="#"
         class="flex w-fit mx-auto items-center justify-center text-white bg-blue-600 px-4 py-2 lg:px-6 lg:py-3 rounded-full text-center my-2 lg:text-xl lg:my-4">
        View our Youtube channel
      </a>

      <div class="flex justify-center mt-4">
        <img
          src="{{ asset('images/WilyoPoster.png') }}"
          alt="Wilyonaryo poster"
          class="h-auto w-[200px] sm:w-[520px] lg:w-[820px] max-w-none"
        />
      </div>
    </div>

    {{-- FOOTER WRAPPER with mt-auto so it stays at the bottom together --}}
    <div class="mt-auto">
      <footer class="max-w-screen-2xl mx-auto px-4 md:px-6 mt-6 md:mt-10">
        <div class="text-white bg-blue-400/65 rounded-lg p-3 sm:p-4 md:p-6 border-2 border-blue-600">
          <div class="grid grid-cols-2 md:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
            <!-- Left -->
            <div class="leading-snug">
              <h4 class="font-bold text-base sm:text-lg md:text-2xl">
                Wilyonaryo™
              </h4>
              <p class="text-[7px] lg:text-lg mt-1 sm:mt-2">
                Wilyonaryo seats in the heart of Clark Freeport Zone, formerly
                Clark Air Base, Philippines
              </p>
              <h5 class="font-bold text-xs sm:text-sm md:text-xl mt-2 sm:mt-3">
                Official License & Gaming Responsibility
              </h5>
              <p class="text-[7px] lg:text-lg mt-1 sm:mt-2">
                Wilyonaryo seats in the heart of Clark Freeport Zone, formerly
                Clark Air Base, Philippines
              </p>
              <img
                src="{{ asset('images/pagcor-logo.png') }}"
                alt="PAGCOR"
                class="h-5 w-auto sm:h-6 md:h-10 mt-2 sm:mt-2 md:ml-2"
              />
              <p class="text-[7px] sm:text-[11px] md:text-[16px] mt-2 sm:mt-2">
                Gambling doesn't guarantee earnings or financial improvement.
                Stay within your limits. Need Help? Contact PAGCOR at (02)
                8527-9831 or visit
                www.pagcor.ph/regulatory/responsible-gaming.php
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
                <h6 class="font-bold text-xs sm:text-sm md:text-xl mt-2">
                  Join our community
                </h6>
                <div class="flex items-center gap-2 sm:gap-3 mt-1 sm:mt-2">
                  <a href="#"><img src="{{ asset('images/FbLogo.png') }}" alt="Facebook" class="h-4 sm:h-5 md:h-8 w-auto" /></a>
                  <a href="#"><img src="{{ asset('images/teleLogo2.png') }}" alt="Telegram" class="h-4 sm:h-5 md:h-8 w-auto" /></a>
                </div>

                <h6 class="font-bold text-xs sm:text-sm md:text-xl mt-3 sm:mt-4">
                  Follow Us
                </h6>
                <div class="flex flex-wrap items-center gap-1 sm:gap-3 mt-1 sm:mt-2">
                  <a href="#"><img src="{{ asset('images/FbLogo.png') }}" alt="Facebook" class="h-4 sm:h-5 md:h-8 w-auto" /></a>
                  <a href="#"><img src="{{ asset('images/xlogo.png') }}" alt="X" class="h-4 sm:h-5 md:h-8 w-auto" /></a>
                  <a href="#"><img src="{{ asset('images/tiktoklogo.png') }}" alt="TikTok" class="h-4 sm:h-5 md:h-8 w-auto" /></a>
                  <a href="#"><img src="{{ asset('images/instagramLogo.png') }}" alt="Instagram" class="h-4 sm:h-5 md:h-8 w-auto" /></a>
                  <a href="#"><img src="{{ asset('images/youtubelogo.png') }}" alt="YouTube" class="h-4 sm:h-5 md:h-8 w-auto" /></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>

      <div class="flex justify-center items-center mt-2">
        <p class="text-[10px] md:text-[12px] text-gray-800 text-center bg-orange-50/60 rounded px-2 py-0.5 sm:py-1">
          ©2024-2025 WILYONARYO PLUS ALL RIGHT RESERVED
        </p>
      </div>
    </div>
  </section>
@endsection
