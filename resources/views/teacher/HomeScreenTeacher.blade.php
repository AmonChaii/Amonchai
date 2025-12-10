<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลักอาจารย์</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Kanit', sans-serif; background-color: #f7f8fa; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
    </style>
</head>
<body class="max-w-lg mx-auto pb-24">
    
    <header class="bg-blue-500 rounded-b-3xl text-white p-6 pt-10 shadow-lg relative">
      <div class="flex items-center space-x-4">
          <div class="w-20 h-20 bg-white rounded-full border-4 border-blue-300 flex-shrink-0 overflow-hidden flex items-center justify-center text-blue-500 text-2xl font-bold">
             @if(Auth::user()->image)
                <img src="{{ Storage::url(Auth::user()->image) }}" class="w-full h-full object-cover">
             @else
                {{ substr(Auth::user()->name, 0, 1) }}
             @endif
          </div>
          <div>
            <h1 class="text-xl font-semibold">{{ Auth::user()->name }}</h1>
            <p class="text-sm text-blue-100">{{ Auth::user()->position ?? 'อาจารย์ที่ปรึกษา' }}</p>
          </div>
      </div>
    </header>

    <main class="p-4">
      
      @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 mb-4 rounded text-sm flex items-center shadow-sm relative animate-pulse">
            <span>{{ session('success') }}</span>
        </div>
      @endif

      @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 mb-4 rounded text-sm flex items-center shadow-sm relative">
            <span>{{ session('error') }}</span>
        </div>
      @endif

      <div class="flex bg-gray-200 rounded-full p-1 my-4">
        <button id="exam-tab-btn" class="w-1/2 text-gray-500 font-semibold py-2 rounded-full transition-all duration-200">ตารางสอบ</button>
        <button id="advisor-tab-btn" class="w-1/2 bg-white text-gray-800 font-semibold py-2 rounded-full shadow transition-all duration-200">
          รายการคำขอ <span class="text-xs bg-red-500 text-white px-1.5 py-0.5 rounded-full ml-1">{{ $requests->count() }}</span>
        </button>
      </div>

      <div id="exam-content" class="tab-content">
           <div class="bg-white rounded-2xl shadow-sm min-h-[40vh] flex flex-col items-center justify-center text-gray-400 p-8 border border-gray-100">
                 <p class="text-sm font-medium">ยังไม่มีตารางสอบ</p>
           </div>
      </div>

      <div id="advisor-content" class="tab-content active">
        <div class="space-y-4">
            @if($requests->isEmpty())
                <div class="text-center text-gray-500 py-12 bg-white rounded-xl shadow-sm border border-dashed border-gray-300">
                    <p>ไม่มีคำขอใหม่ในขณะนี้</p>
                </div>
            @else
                @foreach($requests as $req)
                <div class="bg-white p-5 rounded-xl shadow-md flex flex-col space-y-3 border border-gray-50 relative overflow-hidden">
                    <div class="absolute top-0 right-0 bg-yellow-100 text-yellow-600 text-xs px-2 py-1 rounded-bl-lg font-bold">รออนุมัติ</div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-14 h-14 rounded-full bg-indigo-50 text-indigo-500 flex items-center justify-center font-bold flex-shrink-0 text-lg overflow-hidden">
                            {{ substr($req->student->name ?? 'S', 0, 1) }}
                        </div>
                        <div class="flex-grow min-w-0">
                            <h3 class="font-bold text-gray-800 text-lg truncate">{{ $req->student->name ?? 'ไม่ระบุชื่อ' }}</h3>
                            <div class="text-indigo-600 font-medium text-sm mt-1">
                                {{ $req->topic_th ?? $req->project_name }}
                            </div>
                            <p class="text-xs text-gray-500 mt-2 bg-gray-50 p-2 rounded line-clamp-2">{{ $req->description }}</p>
                        </div>
                    </div>

                    <div class="flex space-x-3 pt-3 mt-2 border-t border-gray-100">
                        <form action="{{ route('teacher.updateStatus') }}" method="POST" class="w-1/2">
                            @csrf
                            <input type="hidden" name="project_id" value="{{ $req->id }}">
                            <input type="hidden" name="status" value="approved">
                            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg text-sm hover:bg-green-600 transition">ยืนยันรับ</button>
                        </form>
                        <form action="{{ route('teacher.updateStatus') }}" method="POST" class="w-1/2" onsubmit="return confirm('ปฏิเสธคำขอนี้?');">
                            @csrf
                            <input type="hidden" name="project_id" value="{{ $req->id }}">
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="w-full border border-red-200 text-red-500 py-2 rounded-lg text-sm hover:bg-red-50 transition">ปฏิเสธ</button>
                        </form>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
      </div>
    </main>

    <nav class="fixed bottom-0 left-0 right-0 bg-white shadow-[0_-2px_10px_rgba(0,0,0,0.05)] max-w-lg mx-auto border-t z-10">
      <div class="flex justify-around py-3">
        <a href="{{ route('teacher.home') }}" class="flex flex-col items-center text-blue-500">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
          <span class="text-xs mt-1">หน้าหลัก</span>
        </a>
        <a href="{{ route('teacher.notification') }}" class="flex flex-col items-center text-gray-400 hover:text-blue-500">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
          <span class="text-xs mt-1">แจ้งเตือน</span>
        </a>
        <a href="{{ route('teacher.profile') }}" class="flex flex-col items-center text-gray-400 hover:text-blue-500">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
          <span class="text-xs mt-1">โปรไฟล์</span>
        </a>
      </div>
    </nav>

    <script>
       const examTabBtn = document.getElementById("exam-tab-btn");
       const advisorTabBtn = document.getElementById("advisor-tab-btn");
       const examContent = document.getElementById("exam-content");
       const advisorContent = document.getElementById("advisor-content");

       examTabBtn.addEventListener("click", () => {
         examContent.classList.add("active");
         advisorContent.classList.remove("active");
         examTabBtn.classList.replace("text-gray-500", "bg-white");
         examTabBtn.classList.add("text-gray-800", "shadow");
         advisorTabBtn.classList.replace("bg-white", "text-gray-500");
         advisorTabBtn.classList.remove("text-gray-800", "shadow");
       });

       advisorTabBtn.addEventListener("click", () => {
         advisorContent.classList.add("active");
         examContent.classList.remove("active");
         advisorTabBtn.classList.replace("text-gray-500", "bg-white");
         advisorTabBtn.classList.add("text-gray-800", "shadow");
         examTabBtn.classList.replace("bg-white", "text-gray-500");
         examTabBtn.classList.remove("text-gray-800", "shadow");
       });
    </script>
</body>
</html>