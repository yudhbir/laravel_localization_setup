

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/favicon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ setting('meta_description') }}">
    <meta name="keyword" content="{{ setting('meta_keyword') }}">

    @include('frontend.includes.meta')
    <!-- tailwind css link -->     

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <link rel="icon" type="image/ico" href="{{asset('img/favicon.png')}}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap');</style>
    @stack('before-styles')

    <link rel="stylesheet" href="{{ mix('css/frontend.css') }}">
    <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>  

    @stack('after-styles')

    <x-google-analytics />
    
</head>
<?php //echo session()->get('locale');?>
<body>
<nav class="bg-white " x-data="{ showMobileNav: false }">

     <!-- navbar -->
   <header class="text-gray-600 body-font shadow-md md:shadow-none md:static fixed w-full bg-white z-50 ">
    <div class="container mx-auto flex flex-wrap p-5 flex-row items-center justify-between">
      <a href="{{route('frontend.index')}}" class="title-font font-medium items-center text-gray-900 mb-4 md:mb-0 hidden md:block">
         <img src="{{asset('img/logo-with-text.jpg')}}" alt="{{ app_name() }}" height="50px">
      </a>
        <div class="flex items-center md:w-auto w-full md:justify-end justify-between">
                     <button id="toggle-menu-button" class="z-50 md:hidden relative">
            <span class="sr-only">Toggle Menu</span>
           <!--  <div id="open" class="h-7 flex flex-col items-end justify-between">
              <span class="block h-0.5 w-8 bg-blue-900 rounded-full"></span>
            <span class="block h-0.5 w-6 bg-blue-900 rounded-full"></span>
            <span class="block h-0.5 w-8 bg-blue-900 rounded-full"></span>
            </div> -->
             <div id="open" class="flex title-font font-medium items-center text-gray-900 md:mb-0 block md:hidden">
                <img src="{{asset('img/logo-with-text.jpg')}}" alt="{{ app_name() }}" style="height: 50px;"> <i class="fa fa-caret-down" aria-hidden="true"></i>
            </div>
            <div id="close" class="hidden h-7 flex flex-col items-end justify-between fixed top-6 ">
              <span class="block h-0.5 w-8 bg-blue-800 rounded-full origin-left transform rotate-45 translate-y-0.5"></span>
            <span class="block h-0.5 w-8 bg-blue-800 rounded-full origin-left transform -rotate-45 -translate-y-0.5"></span>
            </div>
          </button>
          <div id="toggle-menu" class="hidden flex flex-col md:block font-bold text-blue-100 text-center text-3xl bg-gray-800_custom fixed top-0 left-0 h-screen w-screen  items-center justify-center md:text-lg md:relative md:text-blue-900 md:bg-transparent md:w-auto md:h-auto md:text-left">
            <ul class="flex gap-y-7 flex-col md:flex-row md:gap-2">
                <li class="md:hidden list-item md:px-4">
                    <a href="{{route('frontend.index')}}" class="md:mr-5 mr:0 hover:text-blue-700 text-blue-900 cursor-pointer">{{__('Home')}}</a>
                </li>
                <li class="md:px-4">
                    <a href="#" class="md:mr-5 mr:0 hover:text-blue-700 text-blue-900 cursor-pointer">{{__('Despre')}}</a>
                </li>
                
                   <?php
                        $userid = Auth::id();
                        $roles = DB::table('model_has_roles')->select('*')->where('model_id', $userid)->first();
                            if($roles){
                                if($roles->role_id=='5' && Auth::check()){// for agent
                            ?>
                            <li class="md:px-4">
                            <a href="{{route('backend.agent_dashboard')}}" class="md:mr-5 mr:0 hover:text-blue-700 text-blue-900 cursor-pointer">{{__('Account')}}</a>
                            </li>
                            <?php
                            }elseif($roles->role_id=='6' && Auth::check()){ // for applicant
                            ?>
                            <li class="md:px-4">
                              <a href="{{route('backend.applicantviewproperty')}}" class="md:mr-5 mr:0 hover:text-blue-700 text-blue-900 cursor-pointer">{{__('Account')}}</a>
                            </li>
                            <?php
                                }
                            ?>
                        <?php
                        }
                    ?>

                <li class="md:px-4">
                   <a href="#" class="md:mr-5 mr:0 hover:text-blue-700 text-blue-900 cursor-pointer">{{__('Contact')}}</a>
                </li>
            </ul>
          </div>
            @if (Auth::check())
                <a href="{{ route('logout') }}"  class="inline-flex items-center bg-white border-2 border-blue-900 text-blue-900 px-5 py-2 sm:py-3 sm:px-6 focus:outline-none hover:bg-blue-900 hover:text-white rounded text-base md:mt-0">{{__('Logout')}}</a>
            @else
                <a href="{{ route('login') }}"  class="inline-flex items-center bg-white border-2 border-blue-900 text-blue-900 px-5 py-2 sm:py-3 sm:px-6 focus:outline-none hover:bg-blue-900 hover:text-white rounded text-base md:mt-0">{{__('Intra in cont')}}</a>            
            @endif
			@foreach (config('app.available_locales') as $locale)
			<?php 
				$active_locale=(!empty($locale) && $locale=="ro")?"":$locale;
			?>
			<a href="{{url('/', $active_locale)}}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
				<span @if (app()->getLocale() == $locale) 
					style="font-weight: bold; text-decoration: underline"
					@endif>
					{{ strtoupper($locale) }}
				</span>
			</a>
			@endforeach
 
        </div>

    </div>
  </header>
   <!-- end navbar -->



