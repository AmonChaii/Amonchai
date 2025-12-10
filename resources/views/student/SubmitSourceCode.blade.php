<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ส่ง Source Code</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Kanit", sans-serif;
        background-color: #f0f2f5;
      }
    </style>
  </head>
  <body class="max-w-lg mx-auto">
    <!-- Header Section -->
    <header
      class="bg-gradient-to-b from-blue-500 to-blue-400 p-4 pb-16 relative rounded-b-[3rem] text-center text-white shadow-lg"
    >
      <button class="absolute top-6 left-4 text-white">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M15 19l-7-7 7-7"
          />
        </svg>
      </button>
      <div class="mt-8">
        <img
          class="w-24 h-24 rounded-full object-cover mx-auto border-4 border-white/50 shadow-lg"
          src="https://placehold.co/96x96/EBF5FF/3B82F6?text=Teacher"
          alt="Profile picture of Amonchai Boonjan"
        />
        <h1 class="text-xl font-semibold mt-5">อาจารย์จารุวัฒน์ ไพใหล</h1>
        <p class="text-sm text-blue-100 mt-1">ช่องทางการติดต่อ : 0934389902</p>
        <p class="text-sm text-blue-100">ความเชี่ยวชาญ : -</p>
        <p class="text-sm text-blue-100">จำนวนนิสิต : 1/3</p>
      </div>
    </header>

    <!-- Main Content -->
    <main class="p-4 -mt-0 space-y-6">
      <!-- Source Code Card -->
      <div class="bg-white p-4 rounded-xl shadow-md">
        <h2 class="font-semibold text-gray-700 mb-3">
          รหัสต้นฉบับ (Source code)
        </h2>
        <div class="relative">
          <div
            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 text-gray-400"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"
              />
            </svg>
          </div>
          <input
            type="text"
            class="w-full pl-10 pr-4 py-3 bg-gray-100 text-gray-600 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-400"
            placeholder="https://github.com/..."
          />
        </div>
        <button
          class="w-full mt-4 bg-blue-500 text-white font-semibold py-3 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
        >
          ส่ง
        </button>
      </div>
    </main>
  </body>
</html>
