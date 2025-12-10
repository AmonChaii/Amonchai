<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style> 
        body { font-family: 'Kanit', sans-serif; background-color: #f7f8fa; } 
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="max-w-lg mx-auto pb-24 bg-gray-50">
    
    <!-- Header Design -->
    <header class="bg-blue-500 rounded-b-[2.5rem] pt-8 pb-10 px-6 shadow-md relative z-10 text-white">
        <div class="flex items-center space-x-4">
            <!-- Profile Circle -->
            <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center border-4 border-blue-300 shadow-sm overflow-hidden text-blue-500">
                 <!-- แสดงตัวอักษรแรกของชื่อ -->
                 <span class="font-bold text-2xl">{{ substr(Auth::user()->name ?? 'S', 0, 1) }}</span>
            </div>
            
            <!-- User Info -->
            <div>
                <h1 class="text-xl font-bold">{{ Auth::user()->name ?? 'ชื่อนิสิต' }}</h1>
                <p class="text-blue-100 text-sm font-light">รหัสนิสิต: {{ Auth::user()->student_id ?? '-' }}</p>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="p-4">
        
        <!-- ปุ่มสลับแท็บ -->
        <div class="flex bg-gray-200 rounded-full p-1 my-4">
            <button id="exam-tab-btn" class="w-1/2 text-gray-500 font-semibold py-2 rounded-full transition-all duration-200">
                ตารางสอบ
            </button>
            <button id="advisor-tab-btn" class="w-1/2 bg-white text-gray-800 font-semibold py-2 rounded-full shadow transition-all duration-200">
                ที่ปรึกษา
            </button>
        </div>

        <!-- เนื้อหา 1: ตารางสอบ -->
        <div id="exam-content" class="tab-content">
            <div class="bg-white rounded-2xl shadow-sm min-h-[40vh] flex flex-col items-center justify-center text-gray-400 p-8 border border-gray-100">
                 <div class="bg-blue-50 p-4 rounded-full text-blue-400 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                 </div>
                 <p class="text-sm font-medium">ยังไม่มีตารางสอบในขณะนี้</p>
                 <p class="text-xs text-gray-300 mt-1">โปรดรอประกาศจากเจ้าหน้าที่</p>
            </div>
        </div>

        <!-- เนื้อหา 2: รายการที่ปรึกษา (เลือกอาจารย์) -->
        <div id="advisor-content" class="tab-content active">
            <div class="space-y-3">
                <p class="text-sm text-gray-500 ml-1">เลือกอาจารย์ที่ปรึกษาเพื่อเสนอหัวข้อ</p>
                
                <!-- วนลูปแสดงรายชื่ออาจารย์ -->
                @if(isset($teachers) && count($teachers) > 0)
                    @foreach($teachers as $teacher)
                    <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold overflow-hidden">
                                {{ substr($teacher->name, 0, 1) }}
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 text-sm">{{ $teacher->name }}</h3>
                                <p class="text-xs text-gray-500">{{ $teacher->department ?? 'สาขาวิชาวิศวกรรมคอมพิวเตอร์' }}</p>
                            </div>
                        </div>
                        
                        <!-- ปุ่มเลือก -->
                        <a href="{{ route('student.project.create', ['advisor_id' => $teacher->id]) }}" class="bg-blue-50 text-blue-600 px-4 py-1.5 rounded-full text-xs font-bold hover:bg-blue-100 transition">
                            เลือก
                        </a>
                    </div>
                    @endforeach
                @else
                    <div class="text-center py-8 text-gray-400 bg-white rounded-2xl border border-dashed border-gray-200">
                        ไม่พบรายชื่ออาจารย์ที่ปรึกษา
                    </div>
                @endif
            </div>
        </div>

    </main>

    <!-- Bottom Navbar -->
    <nav class="fixed bottom-0 left-0 right-0 bg-white shadow-[0_-2px_10px_rgba(0,0,0,0.05)] max-w-lg mx-auto border-t z-30">
      <div class="flex justify-around py-3">
        <a href="{{ route('student.home') }}" class="flex flex-col items-center text-blue-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
          <span class="text-xs mt-1">หน้าหลัก</span>
        </a>
        <a href="{{ route('student.notification') }}" class="flex flex-col items-center text-gray-400 hover:text-blue-500 transition-colors duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
          <span class="text-xs mt-1">แจ้งเตือน</span>
        </a>
        <a href="{{ route('student.profile') }}" class="flex flex-col items-center text-gray-400 hover:text-blue-500 transition-colors duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
          <span class="text-xs mt-1">โปรไฟล์</span>
        </a>
      </div>
    </nav>

    <!-- Script สำหรับสลับ Tab -->
    <script>
        const examTabBtn = document.getElementById("exam-tab-btn");
        const advisorTabBtn = document.getElementById("advisor-tab-btn");
        const examContent = document.getElementById("exam-content");
        const advisorContent = document.getElementById("advisor-content");

        function switchTab(showExam) {
            if (showExam) {
                examContent.classList.add("active");
                advisorContent.classList.remove("active");
                
                examTabBtn.classList.add("bg-white", "text-gray-800", "shadow");
                examTabBtn.classList.remove("text-gray-500");
                
                advisorTabBtn.classList.remove("bg-white", "text-gray-800", "shadow");
                advisorTabBtn.classList.add("text-gray-500");
            } else {
                advisorContent.classList.add("active");
                examContent.classList.remove("active");
                
                advisorTabBtn.classList.add("bg-white", "text-gray-800", "shadow");
                advisorTabBtn.classList.remove("text-gray-500");
                
                examTabBtn.classList.remove("bg-white", "text-gray-800", "shadow");
                examTabBtn.classList.add("text-gray-500");
            }
        }

        // เริ่มต้นที่หน้า Advisor (ตามที่เคยตั้งค่าไว้) หรือจะให้เป็นหน้า Exam ก็ได้
        // ในที่นี้ตั้ง Default เป็น Advisor Active เพื่อให้เห็นรายชื่ออาจารย์ก่อน
        switchTab(false); 

        examTabBtn.addEventListener("click", () => switchTab(true));
        advisorTabBtn.addEventListener("click", () => switchTab(false));
    </script>

</body>
</html>