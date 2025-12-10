<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>แก้ไขตารางสอบ - ProjectBoard Admin</title>
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

      <!-- Exam Schedule Edit Form -->
      <div class="bg-white rounded-xl shadow-md p-8 flex-1">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">แก้ไขตารางสอบ</h2>

        <div class="space-y-6 max-w-2xl mx-auto">
          <div>
            <label
              for="topic"
              class="block text-sm font-medium text-gray-700 mb-1"
              >หัวข้อ</label
            >
            <input
              type="text"
              id="topic"
              value="ตารางสอบโครงงานวิทยาการคอมพิวเตอร์ บทที่ 3 ภาคปลาย ปีการศึกษา 2567"
              class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
            />
          </div>
          <div>
            <label
              for="description"
              class="block text-sm font-medium text-gray-700 mb-1"
              >คำอธิบาย</label
            >
            <input
              type="text"
              id="description"
              value="หากมีข้อสงสัย สอบถามผ่าน email siriporn.tu@ku.th ภายในวันที่ 9"
              class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
            />
          </div>

          <div>
            <div class="flex items-center justify-center w-full">
              <label
                for="dropzone-file"
                class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100"
              >
                <div
                  class="flex flex-col items-center justify-center pt-5 pb-6"
                >
                  <svg
                    class="w-8 h-8 mb-4 text-gray-500"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 20 16"
                  >
                    <path
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"
                    />
                  </svg>
                  <p class="mb-2 text-sm text-gray-500">
                    <span class="font-semibold">Click to upload</span> or drag
                    and drop
                  </p>
                  <p class="text-xs text-gray-500">
                    PDF, DOC, or PNG (MAX. 800x400px)
                  </p>
                </div>
                <input id="dropzone-file" type="file" class="hidden" />
              </label>
            </div>
          </div>

          <div
            class="border rounded-lg p-4 flex items-center justify-between bg-gray-50"
          >
            <div class="flex items-center space-x-3">
              <img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAAXNSR0IArs4c6QAAAERlWElmTU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAA6ABAAMAAAABAAEAAKACAAQAAAABAAAAQKADAAQAAAABAAAAQAAAAABJ8AnEAAADlElEQVR4Ae2bvWtTURjG5w/ihxJBEARsVAQE/O+kKCoicKgI4iAIIoig1pZ/QrcO6iC4CDrYQReHiKKDiIuDiIggOijooKCBg8S/rvfA5e49uR/uPfcew4eEW25y7/m+7znn3kNCmBPTYI8e/H/A/wK8E/gXuE/g+5lJ961A3AasEbhg5j2BHYF3Af41mR/AEsCjwJ4z3w7sy/8a+a5A7AZsWzM/gY+B2wTeBfysAuwJPDyzf4GPAb8O/Mhg9gD2B14e2X/gL4A/Dvw+n9kGeBVYE3h9ZL/BnwD/J/DLwZgC+BqYAWgC1gS23gL/AvgZ8KvB9AzgVuBNYI2fAXYGfhf4peAzBNAD3AxMA1wCTAPb3gK/D/wM+FXg6y4Au4G3ApsEbjyz/YEfAr8F/Ktg5gD2A14f2R/wM+DXgV8GzgyAV4EVgdcHdgj8AfA/ge8E9gZcDkwDGAu8MvMb8G3g/+R1fALsCjw88/2BG/zXyPcKxG7AsjP/A/YGXhH418g3BWI3YEWZfwf+D/wN+G09gN3A2wK/E9j/yP4Afg/8MvAb8G0AsB/Y7sjfBDYHfhR4Hfj4e8AuYDbw2sA3An0f2f/Ay8M2KxATgY0h3h/Y28gXA/eH1T+H2E/gXmDrS1/A7pC+p8F7B59sB6YDv+73B3YHXh34TWB2ALsDvw68MfBfYHtgMvBWYJtK+p4Fdhv4dcA50/1XgY3xN5gX2NnINwA7/AN+b8E/D6w2k/m3ge2BvC/gPwQ+n09gC2AG3t+vAru/A34G/CDw+wC7A/sDfwX+cWBpYAJgB94XmAXc7T8Ab/H/AXYGfgL8O/B/gH0F0Pewt/j3sM1/fATmAN4GfAjs/H2vA/sK2AFYEjhJ4M/D7H3AfcAy4GbB20e+G/jMvA1YE3gB8MvB2d0E0Pewf/m/gT/53T0W+G2vA/sKOAHYEnhg4NuBb7b6C8CuwGbBrbO+gbWv8RvgO/8r+G/BP8B3r0L/E/h+gP+b18B+n/v/wF/A/wX+C/g/gL/0H/kL+BWwF2gC+hD/BPwc+FXg+QdwG3gzsAlgS2DnXwA3AGeAz45t2f8Ab2e+J7A/cE/k0wLxG7BM4Dcz5xPYHfgz4Ld9P+An/S//Al8c/wS+MP4C/wQ/51+A/4A/9f8D/gH+Hf8L8N8sQpD2+2lGkK/k5WlGUK8G0z3+AnL4+4fL8+v3AAAAAElFTkSuQmCC"
                alt="File icon"
                class="w-10 h-10 object-contain"
              />
              <div>
                <p class="font-semibold text-gray-700">Score01418321...</p>
                <p class="text-sm text-gray-500">PDF</p>
              </div>
            </div>
            <button class="text-gray-500 hover:text-red-500 transition">
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
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                />
              </svg>
            </button>
          </div>

          <div class="mt-8 text-right">
            <button
              class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-700 transition shadow-sm"
            >
              ส่งอีกครั้ง
            </button>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
