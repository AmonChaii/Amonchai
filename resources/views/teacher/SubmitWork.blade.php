<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ตรวจสอบงานนิสิต</title>
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

      <div class="space-y-6 mt-6">
        <!-- Project Topic Card -->
        <div class="bg-white p-4 rounded-xl shadow-md border border-gray-100">
          <h2 class="font-semibold text-gray-700 mb-2">หัวข้อโครงงาน</h2>
          <p class="w-full p-3 bg-gray-100 text-gray-600 rounded-lg">
            ระบบการจัดการโครงงานวิทยาการคอมพิวเตอร์
          </p>
        </div>

        <!-- Approval Form Card -->
        <div class="bg-white p-4 rounded-xl shadow-md border border-gray-100">
          <h2 class="font-semibold text-gray-700 mb-3">แบบขออนุมัติโครงงาน</h2>
          <a
            href="#"
            class="flex justify-between items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition"
          >
            <div class="flex items-center space-x-3">
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
          </a>
        </div>

        <!-- Project Scope Card -->
        <div class="bg-white p-4 rounded-xl shadow-md border border-gray-100">
          <h2 class="font-semibold text-gray-700 mb-3">ขอบเขตโครงงาน</h2>
          <div class="space-y-3">
            <a
              href="#"
              class="flex justify-between items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition"
            >
              <div class="flex items-center space-x-3">
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
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                  />
                </svg>
                <span class="text-blue-500 font-medium">บทที่ 1.pdf</span>
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
                  d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                />
              </svg>
            </a>
            <a
              href="#"
              class="flex justify-between items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition"
            >
              <div class="flex items-center space-x-3">
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
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                  />
                </svg>
                <span class="text-blue-500 font-medium">บทที่ 2.pdf</span>
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
                  d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                />
              </svg>
            </a>
            <a
              href="#"
              class="flex justify-between items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition"
            >
              <div class="flex items-center space-x-3">
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
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                  />
                </svg>
                <span class="text-blue-500 font-medium">บทที่ 3.pdf</span>
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
                  d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                />
              </svg>
            </a>
            <a
              href="#"
              class="flex justify-between items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition"
            >
              <div class="flex items-center space-x-3">
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
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                  />
                </svg>
                <span class="text-blue-500 font-medium">บทที่ 4.pdf</span>
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
                  d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                />
              </svg>
            </a>
            <a
              href="#"
              class="flex justify-between items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition"
            >
              <div class="flex items-center space-x-3">
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
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                  />
                </svg>
                <span class="text-blue-500 font-medium">บทที่ 5.pdf</span>
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
                  d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                />
              </svg>
            </a>
          </div>
        </div>

        <!-- Source Code Card -->
        <div class="bg-white p-4 rounded-xl shadow-md border border-gray-100">
          <h2 class="font-semibold text-gray-700 mb-3">
            รหัสต้นฉบับ (Source code)
          </h2>
          <a
            href="https://github.com/example/project-repo"
            target="_blank"
            class="flex items-center space-x-2 p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition"
          >
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
                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"
              />
            </svg>
            <span class="text-blue-500 font-medium truncate"
              >https://github.com/example/project-repo</span
            >
          </a>
        </div>
      </div>
    </main>
  </body>
</html>
