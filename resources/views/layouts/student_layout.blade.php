<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'ProjectBoard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Kanit", sans-serif;
        background-color: #f7f8fa;
      }
    </style>
  </head>
  <body class="max-w-lg mx-auto">
    <div class="pb-24">
      <header class="bg-blue-500 rounded-b-3xl text-white p-6 pt-10 shadow-lg">
        <div class="flex justify-between items-center">
          <div class="flex items-center space-x-4">
            <div class="w-20 h-20 bg-white rounded-full border-4 border-blue-300 flex-shrink-0 flex items-center justify-center text-blue-500 text-2xl font-bold">
              {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div>
              <h1 class="text-xl font-semibold">{{ Auth::user()->name }}</h1>
              <p class="text-sm text-blue-100">ID: {{ Auth::user()->student_id ?? '-' }}</p>
              <p class="text-sm text-blue-100">{{ Auth::user()->email }}</p>
            </div>
          </div>

          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <button class="hover:bg-blue-600 p-2 rounded-full transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </button>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </div>
      </header>

      <main class="p-4">
        @yield('content')
      </main>
    </div>

    <nav class="fixed bottom-0 left-0 right-0 bg-white shadow-[0_-2px_10px_rgba(0,0,0,0.05)] max-w-lg mx-auto border-t z-50">
      <div class="flex justify-around py-3">
        
        <a href="{{ route('student.home') }}" 
           class="flex flex-col items-center {{ Request::routeIs('student.home') ? 'text-blue-500' : 'text-gray-400 hover:text-blue-300' }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
          <span class="text-xs mt-1">หน้าหลัก</span>
        </a>

        <a href="{{ route('student.notification') }}" 
           class="flex flex-col items-center {{ Request::routeIs('student.notification') ? 'text-blue-500' : 'text-gray-400 hover:text-blue-300' }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
          <span class="text-xs mt-1">แจ้งเตือน</span>
        </a>

        <a href="{{ route('student.profile') }}" 
           class="flex flex-col items-center {{ Request::routeIs('student.profile') ? 'text-blue-500' : 'text-gray-400 hover:text-blue-300' }}">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
          <span class="text-xs mt-1">โปรไฟล์</span>
        </a>

      </div>
    </nav>
  </body>
</html>