<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ข้อมูลอาจารย์ - ProjectBoard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Kanit", sans-serif;
        background-color: #f4f7fc;
      }
      .sidebar-icon {
        transition: all 0.2s ease-in-out;
      }
      .sidebar-icon:hover {
        background-color: #4a5568;
      }
      .sidebar-icon.active {
        background-color: #2563eb;
        color: white;
      }
    </style>
  </head>
  <body class="flex min-h-screen">
    <!-- Sidebar -->
    <aside
      class="w-20 bg-gray-800 text-white flex flex-col items-center py-6 space-y-6"
    >
      <div class="sidebar-icon active p-3 rounded-xl">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-7 w-7"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
          />
        </svg>
      </div>
      <div class="sidebar-icon p-3 rounded-xl">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-7 w-7"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
          />
        </svg>
      </div>
      <div class="sidebar-icon p-3 rounded-xl">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-7 w-7"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"
          />
        </svg>
      </div>
      <div class="!mt-auto sidebar-icon p-3 rounded-xl">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-7 w-7"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
          />
        </svg>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
      <!-- Header -->
      <header class="flex justify-between items-center mb-8">
        <div class="flex items-center space-x-4">
          <button class="text-gray-500">
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
          <h1 class="text-2xl font-bold text-gray-800">ProjectBoard</h1>
        </div>
      </header>

      <!-- Main Card -->
      <div class="bg-white p-8 rounded-xl shadow-md">
        <!-- Teacher Info Section -->
        <div
          class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-8"
        >
          <img
            class="w-32 h-32 rounded-full object-cover ring-4 ring-blue-100"
            src="https://i.ibb.co/D5bFzJt/teacher3.png"
            alt="Teacher Profile Picture"
          />
          <div class="text-center md:text-left">
            <h2 class="text-2xl font-bold text-gray-800">ข้อมูลอาจารย์</h2>
            <p class="mt-2 text-lg font-medium text-gray-700">
              อาจารย์จารุวัฒน์ ไพใหล
            </p>
            <p class="text-gray-500">ช่องทางการติดต่อ : 0934389902</p>
            <p class="text-gray-500">ความเชี่ยวชาญ : -</p>
            <p class="text-gray-500">คำขอ : 3/3</p>
          </div>
        </div>

        <hr class="my-8 border-gray-200" />

        <!-- Advisees Section -->
        <div class="mt-10">
          <div
            class="bg-blue-500 text-white font-semibold text-center text-lg py-3 rounded-t-lg"
          >
            นิสิตในที่ปรึกษา
          </div>
          <div
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-center p-6 border border-t-0 rounded-b-lg border-gray-200"
          >
            <!-- Advisee 1 -->
            <div class="flex flex-col items-center p-4 bg-gray-50 rounded-lg">
              <img
                class="w-24 h-24 rounded-full object-cover ring-4 ring-green-200"
                src="https://i.ibb.co/2Zt9z2b/student-profile.png"
                alt="Advisee 1"
              />
              <p class="mt-3 font-medium text-gray-800">นายอมรชัย บุญจันทร์</p>
              <p
                class="mt-2 text-sm text-green-600 font-semibold flex items-center justify-center"
              >
                <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                ดำเนินการ
              </p>
            </div>

            <!-- Advisee 2 -->
            <div class="flex flex-col items-center p-4 bg-gray-50 rounded-lg">
              <img
                class="w-24 h-24 rounded-full object-cover ring-4 ring-green-200"
                src="https://placehold.co/96x96/EBF5FF/7F9CF5?text=Student"
                alt="Advisee 2"
              />
              <p class="mt-3 font-medium text-gray-800">Mr.Anousone Dilaphon</p>
              <p
                class="mt-2 text-sm text-green-600 font-semibold flex items-center justify-center"
              >
                <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                ดำเนินการ
              </p>
            </div>

            <!-- Advisee 3 -->
            <div class="flex flex-col items-center p-4 bg-gray-50 rounded-lg">
              <img
                class="w-24 h-24 rounded-full object-cover ring-4 ring-green-200"
                src="https://placehold.co/96x96/EBF5FF/7F9CF5?text=Student"
                alt="Advisee 3"
              />
              <p class="mt-3 font-medium text-gray-800">นายไม่มุ่ก จีนพริ้ม</p>
              <p
                class="mt-2 text-sm text-green-600 font-semibold flex items-center justify-center"
              >
                <span class="w-3 h-3 bg-green-500 rounded-full mr-2"></span>
                ดำเนินการ
              </p>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
