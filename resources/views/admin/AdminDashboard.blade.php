<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - ProjectBoard</title>
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
      .clickable-row:hover {
        background-color: #e9ecef;
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
      .stat-card.active {
        border-bottom: 4px solid #2563eb;
      }
    </style>
  </head>
  <body class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside
      class="w-20 bg-gray-800 text-white flex flex-col items-center py-6 space-y-6"
    >
      <a href="#" class="sidebar-icon active p-3 rounded-xl">
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

      <!-- Stat Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div
          id="student-card-btn"
          class="stat-card active bg-white p-6 rounded-xl shadow-md flex items-center space-x-6 cursor-pointer transform transition hover:-translate-y-1 hover:shadow-lg"
        >
          <div class="bg-blue-100 p-4 rounded-full">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-8 w-8 text-blue-600"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
              />
            </svg>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-gray-700">
              จำนวนนิสิตทั้งหมด
            </h3>
            <p class="text-2xl font-bold text-gray-900">จำนวน 53 คน</p>
          </div>
        </div>
        <div
          id="teacher-card-btn"
          class="stat-card bg-white p-6 rounded-xl shadow-md flex items-center space-x-6 cursor-pointer transform transition hover:-translate-y-1 hover:shadow-lg"
        >
          <div class="bg-indigo-100 p-4 rounded-full">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-8 w-8 text-indigo-600"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0l15.482 0m-15.482 0a50.57 50.57 0 01-2.658-.813A59.905 59.905 0 0012 3.493a59.902 59.902 0 0010.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0l15.482 0"
              />
            </svg>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-gray-700">
              จำนวนอาจารย์ทั้งหมด
            </h3>
            <p class="text-2xl font-bold text-gray-900">จำนวน 15 คน</p>
          </div>
        </div>
      </div>

      <!-- Table Container -->
      <div
        class="bg-white rounded-xl shadow-md flex flex-col flex-1 overflow-hidden"
      >
        <!-- Student Table (Visible by default) -->
        <div id="student-table" class="">
          <div class="p-6">
            <h2 class="text-xl font-bold text-gray-800">รายชื่อนิสิต</h2>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full text-left">
              <thead class="bg-blue-500 text-white">
                <tr>
                  <th class="p-3">ลำดับ</th>
                  <th class="p-3">ชื่อ-นามสกุล</th>
                  <th class="p-3">รหัสนิสิต</th>
                  <th class="p-3">ช่องทางการติดต่อ</th>
                </tr>
              </thead>
              <tbody>
                <tr class="clickable-row cursor-pointer transition-colors">
                  <td class="p-3">01</td>
                  <td class="p-3">นายอมรชัย บุญจันทร์</td>
                  <td class="p-3">6540205157</td>
                  <td class="p-3">Amonchai.b@ku.th</td>
                </tr>
                <tr class="clickable-row cursor-pointer transition-colors">
                  <td class="p-3">02</td>
                  <td class="p-3">นางสาวธิดารัตน์ จันทรประสา</td>
                  <td class="p-3">6540205152</td>
                  <td class="p-3">0934445550</td>
                </tr>
                <tr class="clickable-row cursor-pointer transition-colors">
                  <td class="p-3">03</td>
                  <td class="p-3">นางสาวอรัญญา ชินนะมาศ</td>
                  <td class="p-3">6540205153</td>
                  <td class="p-3">0845676542</td>
                </tr>
                <tr class="clickable-row cursor-pointer transition-colors">
                  <td class="p-3">04</td>
                  <td class="p-3">นายปรัชญาพงศ์ศรี แก้วณีย์โชติ</td>
                  <td class="p-3">6540205154</td>
                  <td class="p-3">0634356660</td>
                </tr>
                <tr class="clickable-row cursor-pointer transition-colors">
                  <td class="p-3">05</td>
                  <td class="p-3">นายอนิบษิ ผางชมภู</td>
                  <td class="p-3">6540205155</td>
                  <td class="p-3">0934765210</td>
                </tr>
                <tr class="clickable-row cursor-pointer transition-colors">
                  <td class="p-3">06</td>
                  <td class="p-3">นายชัยชาญ ศรีสุวรรณ์</td>
                  <td class="p-3">6540205156</td>
                  <td class="p-3">0974523417</td>
                </tr>
                <tr class="clickable-row cursor-pointer transition-colors">
                  <td class="p-3">07</td>
                  <td class="p-3">Mr.Anousone Dilaphon</td>
                  <td class="p-3">6540205158</td>
                  <td class="p-3">0812653876</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Teacher Table (Hidden by default) -->
        <div id="teacher-table" class="hidden flex flex-col flex-1">
          <div class="p-6">
            <h2 class="text-xl font-bold text-gray-800">รายชื่ออาจารย์</h2>
          </div>
          <div class="overflow-y-auto table-container flex-1">
            <table class="w-full text-left">
              <thead class="bg-blue-500 text-white sticky top-0">
                <tr>
                  <th class="p-4 font-semibold">ลำดับ</th>
                  <th class="p-4 font-semibold">ชื่อ-นามสกุล</th>
                  <th class="p-4 font-semibold">จำนวนนิสิต</th>
                  <th class="p-4 font-semibold">ช่องทางการติดต่อ</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-b hover:bg-gray-50 cursor-pointer">
                  <td class="p-4">01</td>
                  <td class="p-4">อาจารย์สาวิณี แสงสุริยันต์</td>
                  <td class="p-4">0/3</td>
                  <td class="p-4">081-123-4567</td>
                </tr>
                <tr class="border-b hover:bg-gray-50 cursor-pointer">
                  <td class="p-4">02</td>
                  <td class="p-4">ผู้ช่วยศาสตราจารย์จักรนรินทร์ คงเจริญ</td>
                  <td class="p-4">0/3</td>
                  <td class="p-4">082-234-5678</td>
                </tr>
                <tr class="border-b hover:bg-gray-50 cursor-pointer">
                  <td class="p-4">03</td>
                  <td class="p-4">ผู้ช่วยศาสตราจารย์จารุวัฒน์ ไพใหล</td>
                  <td class="p-4">3/3</td>
                  <td class="p-4">093-438-9902</td>
                </tr>
                <tr class="border-b hover:bg-gray-50 cursor-pointer">
                  <td class="p-4">04</td>
                  <td class="p-4">ผู้ช่วยศาสตราจารย์จิตสราญ สีกู่กา</td>
                  <td class="p-4">0/3</td>
                  <td class="p-4">084-456-7890</td>
                </tr>
                <tr class="border-b hover:bg-gray-50 cursor-pointer">
                  <td class="p-4">05</td>
                  <td class="p-4">ผู้ช่วยศาสตราจารย์ฐาปนี เฮงสนั่นกูล</td>
                  <td class="p-4">1/3</td>
                  <td class="p-4">085-567-8901</td>
                </tr>
                <tr class="border-b hover:bg-gray-50 cursor-pointer">
                  <td class="p-4">06</td>
                  <td class="p-4">ผู้ช่วยศาสตราจารย์ถนอมศักดิ์ วงศ์มีแก้ว</td>
                  <td class="p-4">3/3</td>
                  <td class="p-4">086-678-9012</td>
                </tr>
                <tr class="border-b hover:bg-gray-50 cursor-pointer">
                  <td class="p-4">07</td>
                  <td class="p-4">อาจารย์ปฏิพัทธ์ สิทธิ์ประเสริฐ</td>
                  <td class="p-4">0/3</td>
                  <td class="p-4">087-789-0123</td>
                </tr>
                <tr class="border-b hover:bg-gray-50 cursor-pointer">
                  <td class="p-4">08</td>
                  <td class="p-4">รองศาสตราจารย์พีระ ลิ่วลม</td>
                  <td class="p-4">0/3</td>
                  <td class="p-4">088-890-1234</td>
                </tr>
                <tr class="border-b hover:bg-gray-50 cursor-pointer">
                  <td class="p-4">09</td>
                  <td class="p-4">ผู้ช่วยศาสตราจารย์วไลลักษณ์ วงษ์รื่น</td>
                  <td class="p-4">0/3</td>
                  <td class="p-4">089-901-2345</td>
                </tr>
                <tr class="border-b hover:bg-gray-50 cursor-pointer">
                  <td class="p-4">10</td>
                  <td class="p-4">ผู้ช่วยศาสตราจารย์ศศิธร สุชัยยะ</td>
                  <td class="p-4">0/3</td>
                  <td class="p-4">090-012-3456</td>
                </tr>
                <tr class="border-b hover:bg-gray-50 cursor-pointer">
                  <td class="p-4">11</td>
                  <td class="p-4">ผู้ช่วยศาสตราจารย์ศิริพร ทับทิม</td>
                  <td class="p-4">0/3</td>
                  <td class="p-4">091-123-4567</td>
                </tr>
                <tr class="border-b hover:bg-gray-50 cursor-pointer">
                  <td class="p-4">12</td>
                  <td class="p-4">ผู้ช่วยศาสตราจารย์สุภาพ กัญญาคำ</td>
                  <td class="p-4">0/3</td>
                  <td class="p-4">092-234-5678</td>
                </tr>
                <tr class="border-b hover:bg-gray-50 cursor-pointer">
                  <td class="p-4">13</td>
                  <td class="p-4">ผู้ช่วยศาสตราจารย์สุรศักดิ์ ตั้งสกุล</td>
                  <td class="p-4">0/3</td>
                  <td class="p-4">093-345-6789</td>
                </tr>
                <tr class="border-b hover:bg-gray-50 cursor-pointer">
                  <td class="p-4">14</td>
                  <td class="p-4">ผู้ช่วยศาสตราจารย์อัจฉรา นามบุรี</td>
                  <td class="p-4">0/3</td>
                  <td class="p-4">094-456-7890</td>
                </tr>
                <tr class="hover:bg-gray-50 cursor-pointer">
                  <td class="p-4">15</td>
                  <td class="p-4">อาจารย์สมมติ ท่านหนึ่ง</td>
                  <td class="p-4">2/3</td>
                  <td class="p-4">095-567-8901</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>

    <script>
      const studentCardBtn = document.getElementById("student-card-btn");
      const teacherCardBtn = document.getElementById("teacher-card-btn");
      const studentTable = document.getElementById("student-table");
      const teacherTable = document.getElementById("teacher-table");

      studentCardBtn.addEventListener("click", () => {
        studentTable.classList.remove("hidden");
        teacherTable.classList.add("hidden");
        studentCardBtn.classList.add("active");
        teacherCardBtn.classList.remove("active");
      });

      teacherCardBtn.addEventListener("click", () => {
        teacherTable.classList.remove("hidden");
        studentTable.classList.add("hidden");
        teacherCardBtn.classList.add("active");
        studentCardBtn.classList.remove("active");
      });
    </script>
  </body>
</html>
