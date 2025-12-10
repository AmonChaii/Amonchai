<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ส่งหัวข้อโครงงาน</title>
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
      textarea {
        resize: none;
      }
    </style>
  </head>
  <body class="max-w-lg mx-auto pb-10">
    
    @php
        // ค้นหาข้อมูลอาจารย์ที่ถูกเลือกจาก ID
        $advisor = $teachers->firstWhere('id', $selectedAdvisorId);
    @endphp

    <!-- เริ่มฟอร์ม -->
    <form id="form-submit-project" action="{{ route('student.project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- ส่งค่า advisor_id ไปด้วย (ซ่อนไว้) -->
        <input type="hidden" name="advisor_id" value="{{ $selectedAdvisorId }}">

        <!-- Header Section -->
        <header
          class="bg-gradient-to-b from-blue-500 to-blue-400 p-4 pb-16 relative rounded-b-[3rem] text-center text-white shadow-lg"
        >
          <!-- ปุ่มย้อนกลับ -->
          <a href="{{ route('student.home') }}" class="absolute top-6 left-4 text-white hover:text-blue-100 transition">
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
          </a>

          <div class="mt-4">
            <!-- รูปโปรไฟล์อาจารย์ -->
            <img
              class="w-24 h-24 rounded-full object-cover mx-auto border-4 border-white/50 shadow-lg bg-white"
              src="{{ optional($advisor)->profile_image ?? 'https://placehold.co/100x100/EBF5FF/3B82F6?text=' . substr(optional($advisor)->name ?? 'T', 0, 1) }}"
              alt="Profile picture"
            />
            <h1 class="text-xl font-semibold mt-4">{{ optional($advisor)->name ?? 'ไม่พบข้อมูลอาจารย์' }}</h1>
            <p class="text-sm text-blue-100 mt-1">ช่องทางการติดต่อ : {{ optional($advisor)->tel ?? '-' }}</p>
            <p class="text-sm text-blue-100">อีเมล : {{ optional($advisor)->email ?? '-' }}</p>
          </div>
        </header>

        <!-- Main Content -->
        <main class="p-4 mt-4 relative z-10">
          
          <!-- แสดง Success Message -->
          @if (session('success'))
              <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg shadow-sm" role="alert">
                  {{ session('success') }}
              </div>
          @endif
          
          <!-- แสดง Error จาก Server -->
          @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg shadow-sm" role="alert">
                <p class="font-bold">เกิดข้อผิดพลาด</p>
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <!-- Project Topic Card -->
          <div class="bg-white p-6 rounded-2xl shadow-md space-y-6">
            
            <!-- สถานะที่ปรึกษาร่วม -->
            @if(isset($coAdvisor))
            <div class="bg-yellow-50 border-l-4 border-yellow-500 text-yellow-800 p-3 rounded-lg text-sm font-semibold flex justify-between items-center">
                <span>ที่ปรึกษาร่วม: {{ $coAdvisor->name }}</span> 
                <a href="{{ route('student.co_advisor.select', ['advisor_id' => $selectedAdvisorId]) }}" class="text-blue-500 font-medium ml-2 hover:underline text-xs">
                  (แก้ไข)
                </a>
            </div>
            @endif

            <div>
                <label class="block font-semibold text-gray-700 mb-2">ชื่อโครงงาน <span class="text-red-500">*</span></label>
                <textarea
                  id="topic_name_th"
                  name="topic_name_th"
                  class="w-full p-3 bg-gray-50 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white transition"
                  rows="2"
                  placeholder="กรอกชื่อโครงงาน..."
                  required
                >{{ old('topic_name_th') }}</textarea>
            </div>

            <div>
                <label class="block font-semibold text-gray-700 mb-2">รายละเอียดโครงงาน <span class="text-red-500">*</span></label>
                <textarea
                  id="topic_name_en"
                  name="topic_name_en"
                  class="w-full p-3 bg-gray-50 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white transition"
                  rows="2"
                  placeholder="กรอกรายละเอียดของโครงงาน..."
                  required
                >{{ old('topic_name_en') }}</textarea>
            </div>
          </div>

          <!-- Project Approval Form Card (File Upload) -->
          <div class="bg-white p-6 rounded-2xl shadow-md mt-6">
            <h2 class="font-semibold text-gray-700 mb-3 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                ไฟล์แบบขออนุมัติโครงงาน (PDF) <span class="text-red-500 ml-1">*</span>
            </h2>
            
            <div class="space-y-3">
              <label id="file-upload-label" class="flex flex-col items-center justify-center w-full h-32 border-2 border-blue-300 border-dashed rounded-lg cursor-pointer bg-blue-50 hover:bg-blue-100 transition">
                  <div class="flex flex-col items-center justify-center pt-5 pb-6">
                      <svg class="w-8 h-8 mb-3 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                      </svg>
                      <p class="text-sm text-gray-500">
                        <span id="file-name-display" class="font-semibold text-gray-700">คลิกเพื่ออัปโหลด</span>
                        <span id="file-type-display" class="text-xs text-gray-500 ml-1">(ยังไม่มีไฟล์)</span>
                      </p>
                      <p class="text-xs text-gray-400 mt-1">เฉพาะไฟล์ PDF (สูงสุด 10MB)</p>
                  </div>
                  <input type="file" name="pdf_file" id="pdf_file_input" class="hidden" accept=".pdf" required />
              </label>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="mt-8 mb-4 flex space-x-4">
            <button
              type="button"
              id="submit-button"
              class="w-full bg-blue-500 text-white font-semibold py-3.5 rounded-xl hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-200 transition-all shadow-md shadow-blue-200"
            >
              ส่งคำขอ
            </button>
            <a
              href="{{ route('student.co_advisor.select', ['advisor_id' => $selectedAdvisorId]) }}"
              class="w-full bg-white text-gray-700 font-semibold py-3.5 rounded-xl border border-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-100 transition-all shadow-sm text-center"
            >
              เพิ่มที่ปรึกษาร่วม
            </a>
          </div>
        </main>
    </form>
    
    <!-- Modal for Error -->
    <div id="error-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center p-4 z-50">
        <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-xs text-center animate-bounce-short">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">ข้อมูลไม่ครบถ้วน</h3>
            <p id="error-message" class="text-sm text-gray-500 mb-4">กรุณากรอกข้อมูลให้ครบทุกช่อง</p>
            <button id="close-modal-btn" class="bg-red-500 text-white font-semibold py-2 w-full rounded-lg hover:bg-red-600 transition">ตกลง</button>
        </div>
    </div>

    <script>
        const fileInput = document.getElementById("pdf_file_input");
        const fileNameDisplay = document.getElementById("file-name-display");
        const fileTypeDisplay = document.getElementById("file-type-display");
        const submitButton = document.getElementById("submit-button");
        const form = document.getElementById("form-submit-project");
        
        const topicThInput = document.getElementById("topic_name_th");
        const topicEnInput = document.getElementById("topic_name_en");
        
        const errorModal = document.getElementById("error-modal");
        const errorMessageText = document.getElementById("error-message");
        const closeModalBtn = document.getElementById("close-modal-btn");
        const fileUploadLabel = document.getElementById("file-upload-label");
        
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        // 1. แสดงชื่อไฟล์
        fileInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                const file = e.target.files[0];
                fileNameDisplay.textContent = file.name;
                fileTypeDisplay.textContent = `(${file.name.split('.').pop().toUpperCase()} | ${formatFileSize(file.size)})`;
                fileUploadLabel.classList.remove('border-red-500', 'bg-red-50');
                fileUploadLabel.classList.add('border-blue-300', 'bg-blue-50');
            } else {
                fileNameDisplay.textContent = 'คลิกเพื่ออัปโหลด';
                fileTypeDisplay.textContent = '(ยังไม่มีไฟล์)';
            }
        });

        // 2. ตรวจสอบเงื่อนไขก่อนส่ง (Validation)
        submitButton.addEventListener('click', (e) => {
            let isValid = true;
            let errorMsg = "";

            // รีเซ็ต Style
            topicThInput.classList.remove('border-red-500', 'ring-red-200');
            topicEnInput.classList.remove('border-red-500', 'ring-red-200');
            fileUploadLabel.classList.remove('border-red-500', 'bg-red-50');

            // ตรวจสอบชื่อไทย
            if (!topicThInput.value.trim()) {
                isValid = false;
                errorMsg = "กรุณากรอกชื่อโครงงาน (ภาษาไทย)";
                topicThInput.classList.add('border-red-500', 'ring-red-200');
            }
            // ตรวจสอบชื่ออังกฤษ
            else if (!topicEnInput.value.trim()) {
                isValid = false;
                errorMsg = "กรุณากรอกชื่อโครงงาน (ภาษาอังกฤษ)";
                topicEnInput.classList.add('border-red-500', 'ring-red-200');
            }
            // ตรวจสอบไฟล์
            else if (fileInput.files.length === 0) {
                isValid = false;
                errorMsg = "กรุณาอัปโหลดไฟล์แบบขออนุมัติโครงงาน (PDF)";
                fileUploadLabel.classList.remove('border-blue-300');
                fileUploadLabel.classList.add('border-red-500', 'bg-red-50');
            }

            if (!isValid) {
                errorMessageText.textContent = errorMsg;
                errorModal.classList.remove('hidden');
                errorModal.classList.add('flex');
            } else {
                form.submit();
            }
        });

        closeModalBtn.addEventListener('click', () => {
            errorModal.classList.add('hidden');
            errorModal.classList.remove('flex');
        });
    </script>
  </body>
</html>