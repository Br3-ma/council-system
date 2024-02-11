<div>
  <!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demo.tailadmin.com/signin by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jan 2024 13:49:26 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In | Council</title>

    <link rel="icon" href="fav.webp">
  <link href="{{ asset('public/css/style.css')}}" rel="stylesheet">
  
  {{-- <script nonce="264409ac-18b5-4b14-863a-287dbec5920a">try { (function(w,d){!function(o,p,q,r){o[q]=o[q]||{};o[q].executed=[];o.zaraz={deferred:[],listeners:[]};o.zaraz.q=[];o.zaraz._f=function(s){return async function(){var t=Array.prototype.slice.call(arguments);o.zaraz.q.push({m:s,a:t})}};for(const u of["track","set","debug"])o.zaraz[u]=o.zaraz._f(u);o.zaraz.init=()=>{var v=p.getElementsByTagName(r)[0],w=p.createElement(r),x=p.getElementsByTagName("title")[0];x&&(o[q].t=p.getElementsByTagName("title")[0].text);o[q].x=Math.random();o[q].w=o.screen.width;o[q].h=o.screen.height;o[q].j=o.innerHeight;o[q].e=o.innerWidth;o[q].l=o.location.href;o[q].r=p.referrer;o[q].k=o.screen.colorDepth;o[q].n=p.characterSet;o[q].o=(new Date).getTimezoneOffset();if(o.dataLayer)for(const B of Object.entries(Object.entries(dataLayer).reduce(((C,D)=>({...C[1],...D[1]})),{})))zaraz.set(B[0],B[1],{scope:"page"});o[q].q=[];for(;o.zaraz.q.length;){const E=o.zaraz.q.shift();o[q].q.push(E)}w.defer=!0;for(const F of[localStorage,sessionStorage])Object.keys(F||{}).filter((H=>H.startsWith("_zaraz_"))).forEach((G=>{try{o[q]["z_"+G.slice(7)]=JSON.parse(F.getItem(G))}catch{o[q]["z_"+G.slice(7)]=F.getItem(G)}}));w.referrerPolicy="origin";w.src="cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(o[q])));v.parentNode.insertBefore(w,v)};["complete","interactive"].includes(p.readyState)?zaraz.init():o.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document) } catch (err) {
      console.error('Failed to run Cloudflare Zaraz: ', err)
      fetch('/cdn-cgi/zaraz/t', {
        credentials: 'include',
        keepalive: true,
        method: 'GET',
      })
    };
    
  </script> --}}

  
  @livewireStyles
  </head>

  <body
    x-data="{ page: 'signin', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
          darkMode = JSON.parse(localStorage.getItem('darkMode'));
          $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}"
  >
    <!-- ===== Preloader Start ===== -->
    <div
  x-show="loaded"
  x-init="window.addEventListener('DOMContentLoaded', () => {setTimeout(() => loaded = false, 500)})"
  class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black"
>
  <div
    class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-primary border-t-transparent"
  ></div>
</div>
    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden relative" style="background-image: url('{{ asset('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKHuHB6g_q3mpFMk40_ObH1mPid8eyDIsYig&usqp=CAU') }}'); background-size: cover;">
      <div class="absolute inset-0" style="background-color: rgba(0, 0, 0, 0.5); backdrop-filter: blur(2px);"></div>
  

      <!-- ===== Content Area Start ===== -->
      <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
        <!-- ===== Main Content Start ===== -->
        <main>
          <div class="mx-auto p-4 2xl:p-10">

            <!-- ====== Forms Section Start -->
            <div class="rounded-sm ">
              <div class="flex flex-wrap items-center">
                <div class="hidden w-full xl:block xl:w-1/2 bg-transparent">
                  <div class="py-17.5 px-26 text-center">
                    <a class="mb-5.5 inline-block" href="#">
                      {{-- <img
                        class="hidden dark:block"
                        src="src/images/logo/logo.svg"
                        alt="Logo"
                      />
                      <img
                        class="dark:hidden"
                        src="src/images/logo/logo-dark.svg"
                        alt="Logo"
                      /> --}}
                    </a>

                    <p class="font-medium text-white 2xl:px-20">
                      For administration use only
                    </p>
                    <p class="mt-2 font-bold text-white 2xl:px-20">
                      Nakonde City Council Management System
                    </p>
                    <span class="mt-15 inline-block">
                      <img width="50" src="fav.webp"
                        alt="illustration" />
                    </span> 
                  </div>
                </div>

                <div style="background-color: #ffffff76" class="w-full rounded-lg p-6 text-primary xl:w-1/2 ">
                  <div class="w-full p-8 sm:p-12.5 xl:p-17.5">
                    <h2 style="color: rgb(21, 65, 88)" class="mb-10 text-2xl font-bold text-black dark:text-white sm:text-title-xl2">
                      Sign In
                    </h2>
                    <x-validation-errors class="mb-4 text-danger" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600 alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="mb-4">
                        {{-- <label  style="color: black"
                          class="mb-2.5 block font-medium text-black dark:text-white"
                          >User</label> --}}
                        <div class="relative">
                          <input
                            type="email"
                            class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                            type="email" name="email" required autofocus autocomplete="username" 
                          />

                          <span class="absolute right-4 top-4">
                            <svg
                              class="fill-current"
                              width="22"
                              height="22"
                              viewBox="0 0 22 22"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <g opacity="0.5">
                                <path
                                  d="M19.2516 3.30005H2.75156C1.58281 3.30005 0.585938 4.26255 0.585938 5.46567V16.6032C0.585938 17.7719 1.54844 18.7688 2.75156 18.7688H19.2516C20.4203 18.7688 21.4172 17.8063 21.4172 16.6032V5.4313C21.4172 4.26255 20.4203 3.30005 19.2516 3.30005ZM19.2516 4.84692C19.2859 4.84692 19.3203 4.84692 19.3547 4.84692L11.0016 10.2094L2.64844 4.84692C2.68281 4.84692 2.71719 4.84692 2.75156 4.84692H19.2516ZM19.2516 17.1532H2.75156C2.40781 17.1532 2.13281 16.8782 2.13281 16.5344V6.35942L10.1766 11.5157C10.4172 11.6875 10.6922 11.7563 10.9672 11.7563C11.2422 11.7563 11.5172 11.6875 11.7578 11.5157L19.8016 6.35942V16.5688C19.8703 16.9125 19.5953 17.1532 19.2516 17.1532Z"
                                  fill=""
                                />
                              </g>
                            </svg>
                          </span>
                        </div>
                      </div>

                      <div class="mb-6">
                      {{-- <label  style="color: black"
                          class="mb-2.5 block font-medium text-black dark:text-white"
                          >Password</label> --}}
                        <div class="relative">
                          <input
                            type="password" name="password" required autocomplete="password"
                            class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                          />

                          <span class="absolute right-4 top-4">
                            <svg
                              class="fill-current"
                              width="22"
                              height="22"
                              viewBox="0 0 22 22"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <g opacity="0.5">
                                <path
                                  d="M16.1547 6.80626V5.91251C16.1547 3.16251 14.0922 0.825009 11.4797 0.618759C10.0359 0.481259 8.59219 0.996884 7.52656 1.95938C6.46094 2.92188 5.84219 4.29688 5.84219 5.70626V6.80626C3.84844 7.18438 2.33594 8.93751 2.33594 11.0688V17.2906C2.33594 19.5594 4.19219 21.3813 6.42656 21.3813H15.5016C17.7703 21.3813 19.6266 19.525 19.6266 17.2563V11C19.6609 8.93751 18.1484 7.21876 16.1547 6.80626ZM8.55781 3.09376C9.31406 2.40626 10.3109 2.06251 11.3422 2.16563C13.1641 2.33751 14.6078 3.98751 14.6078 5.91251V6.70313H7.38906V5.67188C7.38906 4.70938 7.80156 3.78126 8.55781 3.09376ZM18.1141 17.2906C18.1141 18.7 16.9453 19.8688 15.5359 19.8688H6.46094C5.05156 19.8688 3.91719 18.7344 3.91719 17.325V11.0688C3.91719 9.52189 5.15469 8.28438 6.70156 8.28438H15.2953C16.8422 8.28438 18.1141 9.52188 18.1141 11V17.2906Z"
                                  fill=""
                                />
                                <path
                                  d="M10.9977 11.8594C10.5852 11.8594 10.207 12.2031 10.207 12.65V16.2594C10.207 16.6719 10.5508 17.05 10.9977 17.05C11.4102 17.05 11.7883 16.7063 11.7883 16.2594V12.6156C11.7883 12.2031 11.4102 11.8594 10.9977 11.8594Z"
                                  fill=""
                                />
                              </g>
                            </svg>
                          </span>
                        </div>
                      </div>

                      <div class="mb-5">
                        <p wire:loading>Please waiting...</p>
                        <input wire:loading.remove
                          type="submit"
                          value="Login"
                          class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90"
                        />
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- ====== Forms Section End -->
          </div>
        </main>
        <!-- ===== Main Content End ===== -->
      </div>
      <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
    <script defer src="{{ asset('public/js/bundle.js')}}"></script><script defer src="../static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"8487c5a7ca635fd6","version":"2024.1.0","r":1,"token":"67f7a278e3374824ae6dd92295d38f77","b":1}' crossorigin="anonymous"></script>


    @stack('modals')

    @livewireScripts
</body>

<!-- Mirrored from demo.tailadmin.com/signin by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jan 2024 13:49:29 GMT -->
</html>

</div>