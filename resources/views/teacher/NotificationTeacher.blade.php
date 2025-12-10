<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แจ้งเตือน</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style> body { font-family: 'Kanit', sans-serif; background-color: #f7f8fa; } </style>
</head>
<body class="max-w-lg mx-auto pb-24">
    <header class="bg-white p-4 shadow-sm text-center sticky top-0 z-20">
        <h1 class="text-lg font-bold text-gray-700">การแจ้งเตือน</h1>
    </header>

    <main class="p-4 space-y-4">
        
        @if($notifications->isEmpty())
            <!-- กรณีไม่มีการแจ้งเตือน (แสดงหน้าว่างเดิม) -->
            <div class="text-center text-gray-500 pt-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                <p>ไม่มีการแจ้งเตือนใหม่</p>
            </div>
        @else
            <!-- กรณีมีรายการคำขอ (แสดงรายการ) -->
            <div>
                <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3 ml-1">ล่าสุด</h2>
                <div class="space-y-3">
                    @foreach($notifications as $noti)
                        <div class="bg-blue-50 p-4 rounded-xl border border-blue-100 flex items-start space-x-3 relative">
                            <!-- จุดสีฟ้าแสดงสถานะใหม่ -->
                            <div class="w-2 h-2 rounded-full bg-blue-500 absolute top-4 right-4 animate-pulse"></div>
                            
                            <div class="bg-white p-2 rounded-full shadow-sm text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" /></svg>
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-800">มีคำขอโครงงานใหม่</p>
                                <p class="text-xs text-gray-600 mt-0.5 line-clamp-2">
                                    นิสิต <span class="font-medium text-blue-600">{{ $noti->student->name ?? 'ไม่ระบุชื่อ' }}</span> ได้ส่งคำขอเสนอหัวข้อ "{{ $noti->topic_th ?? $noti->project_name }}"
                                </p>
                                <span class="text-[10px] text-gray-400 mt-2 block">
                                    {{ $noti->created_at->diffForHumans() }} <!-- แสดงเวลาแบบ "เมื่อสักครู่", "10 นาทีที่แล้ว" -->
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </main>

    <nav class="fixed bottom-0 left-0 right-0 bg-white shadow-[0_-2px_10px_rgba(0,0,0,0.05)] max-w-lg mx-auto border-t z-10">
      <div class="flex justify-around py-3">
        <!-- หน้าหลัก -->
        <a href="{{ route('teacher.home') }}" class="flex flex-col items-center text-gray-400 hover:text-blue-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
          <span class="text-xs mt-1">หน้าหลัก</span>
        </a>
        
        <!-- แจ้งเตือน (Active) -->
        <a href="{{ route('teacher.notification') }}" class="flex flex-col items-center text-blue-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
          <span class="text-xs mt-1">แจ้งเตือน</span>
        </a>
        
        <!-- โปรไฟล์ -->
        <a href="{{ route('teacher.profile') }}" class="flex flex-col items-center text-gray-400 hover:text-blue-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
          <span class="text-xs mt-1">โปรไฟล์</span>
        </a>
      </div>
    </nav>
</body>
</html>