<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login - ProjectBoard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Kanit", sans-serif;
      }
    </style>
  </head>
  <body class="bg-gray-50">
    <div class="flex items-center justify-center min-h-screen">
      <div
        class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0"
      >
        <!-- Left Section -->
        <div class="flex flex-col justify-center p-8 md:p-14">
          <div class="flex items-center mb-6">
            <svg
              class="w-10 h-10 text-blue-600"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M3.75 19.5h16.5m-16.5 0a2.25 2.25 0 01-2.25-2.25V6.75A2.25 2.25 0 013.75 4.5h16.5a2.25 2.25 0 012.25 2.25v10.5A2.25 2.25 0 0120.25 19.5m-16.5 0v-2.625c0-.621.504-1.125 1.125-1.125h14.25c.621 0 1.125.504 1.125 1.125V19.5m-16.5 0h16.5"
              />
            </svg>
            <h1 class="ml-3 text-3xl font-bold text-gray-800">ProjectBoard</h1>
          </div>
          <h2 class="font-bold text-2xl text-gray-700">Admin Control Panel</h2>
          <p class="max-w-sm mt-2 text-gray-500">
            กรุณาลงชื่อเข้าสู่ระบบเพื่อเข้าถึงแดชบอร์ดสำหรับผู้ดูแล
          </p>
          <form class="flex flex-col gap-4 mt-8" action="#" method="POST">
            <div>
              <label
                for="email-address"
                class="text-sm font-medium text-gray-600"
                >อีเมล</label
              >
              <input
                id="email-address"
                name="email"
                type="email"
                autocomplete="email"
                required
                class="w-full p-3 mt-1 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="กรอกอีเมลของคุณ"
              />
            </div>
            <div>
              <label for="password" class="text-sm font-medium text-gray-600"
                >รหัสผ่าน</label
              >
              <input
                id="password"
                name="password"
                type="password"
                autocomplete="current-password"
                required
                class="w-full p-3 mt-1 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="กรอกรหัสผ่าน"
              />
            </div>
            <div>
              <button
                type="submit"
                class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold p-3 rounded-lg hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 shadow-lg hover:shadow-xl"
              >
                เข้าสู่ระบบ
              </button>
            </div>
          </form>
        </div>

        <!-- Right Section (Image) -->
        <div class="relative">
          <img
            src="https://placehold.co/400x484/3B82F6/FFFFFF?text=Admin\nPanel"
            alt="Admin Panel Image"
            class="w-[400px] h-full hidden rounded-r-2xl md:block object-cover"
            onerror="this.onerror=null;this.src='https://placehold.co/400x484/EBF5FF/3B82F6?text=Image+Error';"
          />
        </div>
      </div>
    </div>
  </body>
</html>
