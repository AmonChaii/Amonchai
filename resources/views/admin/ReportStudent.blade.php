<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>รายงาน - ProjectBoard Admin</title>
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
      tr:nth-child(even) {
        background-color: #f8f9fa;
      }
      .table-container::-webkit-scrollbar {
        width: 8px;
      }
      .table-container::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
      }
      .table-container::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 10px;
      }
      .table-container::-webkit-scrollbar-thumb:hover {
        background: #9ca3af;
      }
    </style>
  </head>
  <body class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside
      class="w-20 bg-gray-800 text-white flex flex-col items-center py-6 space-y-6"
    >
      <a href="#" class="sidebar-icon p-3 rounded-xl">
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
      </a>
      <a href="#" class="sidebar-icon active p-3 rounded-xl">
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
      </a>
      <a href="#" class="sidebar-icon p-3 rounded-xl">
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
      </a>
      <a href="#" class="!mt-auto sidebar-icon p-3 rounded-xl">
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
      </a>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 flex flex-col">
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
        <button class="text-gray-600">
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
              d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
            />
          </svg>
        </button>
      </header>

      <!-- Report Table -->
      <div
        class="bg-white rounded-xl shadow-md flex flex-col flex-1 overflow-hidden"
      >
        <div class="p-6 flex justify-between items-center">
          <h2 class="text-xl font-bold text-gray-800">รายงานนิสิต</h2>
          <div class="flex space-x-3">
            <button
              class="bg-white text-blue-500 border border-blue-500 font-semibold px-4 py-2 rounded-lg hover:bg-blue-50 transition"
            >
              ส่งไฟล์ไปที่ปรึกษา
            </button>
            <button
              class="bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-600 transition"
            >
              ส่งเอกสารจบโครงงาน
            </button>
          </div>
        </div>
        <div class="overflow-y-auto table-container flex-1">
          <table class="w-full text-left">
            <thead class="bg-blue-500 text-white sticky top-0">
              <tr>
                <th class="p-4 font-semibold">ลำดับ</th>
                <th class="p-4 font-semibold">จำนวนบท</th>
                <th class="p-4 font-semibold">ชื่อ-นามสกุล</th>
                <th class="p-4 font-semibold">รหัสนิสิต</th>
                <th class="p-4 font-semibold">ช่องทางการติดต่อ</th>
                <th class="p-4 font-semibold">ที่ปรึกษาโครงงาน</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b">
                <td class="p-4">01</td>
                <td class="p-4">3/3</td>
                <td class="p-4">นายอมรชัย บุญจันทร์</td>
                <td class="p-4">6540205157</td>
                <td class="p-4">Amonchai.b@ku.th</td>
                <td class="p-4">อาจารย์จารุวัฒน์ ไพใหล</td>
              </tr>
              <tr class="border-b">
                <td class="p-4">02</td>
                <td class="p-4">3/3</td>
                <td class="p-4">นางสาวธิดารัตน์ จันทรประสา</td>
                <td class="p-4">6540205152</td>
                <td class="p-4">0934445550</td>
                <td class="p-4">อาจารย์ศิริพร ทับทิม</td>
              </tr>
              <tr class="border-b">
                <td class="p-4">03</td>
                <td class="p-4">3/3</td>
                <td class="p-4">นางสาวอรัญญา ชินนะมาศ</td>
                <td class="p-4">6540205153</td>
                <td class="p-4">0845676542</td>
                <td class="p-4">อาจารย์ฐาปนี เฮงสนั่นกูล</td>
              </tr>
              <tr class="border-b">
                <td class="p-4">04</td>
                <td class="p-4">3/3</td>
                <td class="p-4">นายปรัชญาพงศ์ศรี แก้วณีย์โชติ</td>
                <td class="p-4">6540205154</td>
                <td class="p-4">0634356660</td>
                <td class="p-4">อาจารย์ถนอมศักดิ์ วงศ์มีแก้ว</td>
              </tr>
              <tr class="border-b">
                <td class="p-4">05</td>
                <td class="p-4">0/3</td>
                <td class="p-4">นายอนิบษิ ผางชมภู</td>
                <td class="p-4">6540205155</td>
                <td class="p-4">0934765210</td>
                <td class="p-4">-</td>
              </tr>
              <tr class="border-b">
                <td class="p-4">06</td>
                <td class="p-4">0/3</td>
                <td class="p-4">นายชัยชาญ ศรีสุวรรณ์</td>
                <td class="p-4">6540205156</td>
                <td class="p-4">0974523417</td>
                <td class="p-4">-</td>
              </tr>
              <tr class="border-b">
                <td class="p-4">07</td>
                <td class="p-4">3/3</td>
                <td class="p-4">Mr.Anousone Dilaphon</td>
                <td class="p-4">6540205158</td>
                <td class="p-4">0812653876</td>
                <td class="p-4">อาจารย์ถนอมศักดิ์ วงศ์มีแก้ว</td>
              </tr>
              <tr class="border-b">
                <td class="p-4">08</td>
                <td class="p-4">3/3</td>
                <td class="p-4">นายปรัชญาพงศ์ศรี แก้วณีย์โชติ</td>
                <td class="p-4">6540205154</td>
                <td class="p-4">0634356660</td>
                <td class="p-4">-</td>
              </tr>
              <tr class="border-b">
                <td class="p-4">09</td>
                <td class="p-4">3/3</td>
                <td class="p-4">นายอนิบษิ ผางชมภู</td>
                <td class="p-4">6540205155</td>
                <td class="p-4">0934765210</td>
                <td class="p-4">-</td>
              </tr>
              <tr class="border-b">
                <td class="p-4">10</td>
                <td class="p-4">3/3</td>
                <td class="p-4">นายชัยชาญ ศรีสุวรรณ์</td>
                <td class="p-4">6540205156</td>
                <td class="p-4">0974523417</td>
                <td class="p-4">-</td>
              </tr>
              <tr class="hover:bg-gray-50">
                <td class="p-4">11</td>
                <td class="p-4">3/3</td>
                <td class="p-4">Mr.Anousone Dilaphon</td>
                <td class="p-4">6540205158</td>
                <td class="p-4">0812653876</td>
                <td class="p-4">อาจารย์พีระ ลิ่วลม</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </body>
</html>
