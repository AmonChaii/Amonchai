<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>คำขอจากนิสิต</title>
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
  <body class="max-w-lg mx-auto bg-white">
    <!-- Header Section -->
    <header class="p-4 flex items-center relative">
      <button class="text-gray-600">
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
    </header>

    <!-- Main Content -->
    <main class="px-4 pb-8">
      <!-- Student Info Section -->
      <div class="text-center">
        <img
          class="w-28 h-28 rounded-full object-cover mx-auto border-4 border-blue-200 shadow-md"
          src="https://placehold.co/128x128/EBF5FF/3B82F6?text=A"
          alt="Profile Picture"
        />
        <h1 class="text-xl font-semibold text-gray-800 mt-4">
          นายอมรชัย บุญจันทร์
        </h1>
        <p class="text-sm text-gray-500">รหัสนิสิต : 6540205157</p>
        <p class="text-sm text-gray-500">ช่องทางการติดต่อ : Amonchai.b@ku.th</p>
      </div>

      <!-- Project Details Card -->
      <div
        class="bg-white p-4 rounded-xl shadow-md mt-6 border border-gray-100"
      >
        <div>
          <h2 class="font-semibold text-gray-700 mb-2">หัวข้อโครงงาน</h2>
          <p class="w-full p-3 bg-gray-100 text-gray-600 rounded-lg">
            ระบบการจัดการโครงงานวิทยาการคอมพิวเตอร์
          </p>
        </div>
        <div class="mt-4">
          <h2 class="font-semibold text-gray-700 mb-2">
            คำอธิบายเกี่ยวกับโครงงาน
          </h2>
          <p class="w-full p-3 bg-gray-100 text-gray-600 rounded-lg h-24">
            ระบบการจัดการโครงงานวิทยาการคอมพิวเตอร์
          </p>
        </div>
      </div>

      <!-- Approval Form Card -->
      <div
        class="bg-white p-4 rounded-xl shadow-md mt-6 border border-gray-100"
      >
        <h2 class="font-semibold text-gray-700 mb-3">แบบขออนุมัติโครงงาน</h2>
        <a
          href="#"
          class="flex justify-between items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 transition"
        >
          <div class="flex items-center space-x-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6 text-green-500"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
              />
            </svg>
            <span class="text-blue-500 font-medium">แบบขออนุมัติโครงงาน</span>
          </div>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 text-gray-500"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"
            />
          </svg>
        </a>
      </div>

      <!-- Action Buttons -->
      <div class="mt-8 flex space-x-4">
        <button
          class="w-full bg-green-500 text-white font-semibold py-3 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors"
        >
          ยอมรับ
        </button>
        <button
          class="w-full bg-red-500 text-white font-semibold py-3 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors"
        >
          ปฏิเสธ
        </button>
      </div>
    </main>
  </body>
</html>
