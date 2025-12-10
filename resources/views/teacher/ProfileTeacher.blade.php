<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรไฟล์อาจารย์</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style> body { font-family: 'Kanit', sans-serif; background-color: #f7f8fa; } </style>
</head>
<body class="max-w-lg mx-auto pb-24">
    
    <header class="bg-white p-4 pt-8 pb-4 shadow-sm sticky top-0 z-20 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">โปรไฟล์</h1>
        <form action="{{ route('logout') }}" method="GET"> 
            @csrf
            <button type="submit" class="text-red-500 bg-red-50 px-3 py-1.5 rounded-lg text-sm font-medium hover:bg-red-100 transition">ออกจากระบบ</button>
        </form>
    </header>

    <main class="p-4 space-y-6">
        
        <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl p-6 text-white shadow-lg relative overflow-hidden">
            <div class="flex items-center space-x-4 relative z-10">
                <div class="w-20 h-20 bg-white p-1 rounded-full shadow-md flex items-center justify-center text-blue-600 text-2xl font-bold overflow-hidden">
                    @if(Auth::user()->image)
                        <img src="{{ Storage::url(Auth::user()->image) }}" class="w-full h-full object-cover">
                    @else
                        {{ substr(Auth::user()->name, 0, 1) }}
                    @endif
                </div>
                <div>
                    <h2 class="text-xl font-bold">{{ Auth::user()->name }}</h2>
                    <p class="text-blue-100 text-sm">{{ Auth::user()->position ?? 'อาจารย์ที่ปรึกษา' }}</p>
                </div>
            </div>
            
            <div class="mt-4 pt-4 border-t border-white/20 space-y-1">
                <p class="text-sm opacity-90 flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> {{ Auth::user()->email }}</p>
                <p class="text-sm opacity-90 flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg> {{ Auth::user()->tel ?? '-' }}</p>
            </div>

            <div class="flex space-x-2 mt-4 pt-2">
                <a href="{{ route('teacher.editProfile') }}" class="text-xs bg-white/20 hover:bg-white/30 px-3 py-1.5 rounded-full text-white transition flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg> แก้ไขข้อมูล
                </a>
                <a href="{{ route('teacher.changePassword') }}" class="text-xs bg-white/20 hover:bg-white/30 px-3 py-1.5 rounded-full text-white transition flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg> เปลี่ยนรหัสผ่าน
                </a>
            </div>
        </div>

        <div>
            <div class="flex justify-between items-end mb-3 px-1">
                <h3 class="text-gray-700 font-bold text-lg">ประวัตินิสิตทั้งหมด</h3>
                <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full shadow-sm">{{ $allRequests->count() }} รายการ</span>
            </div>

            <div class="space-y-3">
                @if($allRequests->isEmpty())
                    <div class="bg-white p-8 rounded-xl shadow-sm text-center border border-dashed border-gray-200 text-gray-400">
                        ยังไม่มีประวัติคำขอ
                    </div>
                @else
                    @foreach($allRequests as $req)
                        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow">
                            <div class="flex items-center space-x-3 overflow-hidden">
                                <div class="w-10 h-10 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center font-bold text-sm flex-shrink-0">
                                    {{ substr($req->student->name ?? 'S', 0, 1) }}
                                </div>
                                <div class="min-w-0">
                                    <h4 class="font-semibold text-gray-800 text-sm truncate">{{ $req->student->name ?? 'ไม่ระบุชื่อ' }}</h4>
                                    <p class="text-xs text-gray-500 truncate">{{ $req->topic_th ?? $req->project_name }}</p>
                                </div>
                            </div>
                            
                            <div class="flex-shrink-0 ml-2">
                                @if($req->status == 'pending')
                                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-lg text-xs font-bold whitespace-nowrap">รออนุมัติ</span>
                                @elseif($req->status == 'approved')
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded-lg text-xs font-bold whitespace-nowrap">อนุมัติแล้ว</span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded-lg text-xs font-bold whitespace-nowrap">ปฏิเสธ</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    </main>

    <nav class="fixed bottom-0 left-0 right-0 bg-white shadow-[0_-2px_10px_rgba(0,0,0,0.05)] max-w-lg mx-auto border-t z-10">
      <div class="flex justify-around py-3">
        <a href="{{ route('teacher.home') }}" class="flex flex-col items-center text-gray-400 hover:text-blue-500">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
          <span class="text-xs mt-1">หน้าหลัก</span>
        </a>
        <a href="{{ route('teacher.notification') }}" class="flex flex-col items-center text-gray-400 hover:text-blue-500">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
          <span class="text-xs mt-1">แจ้งเตือน</span>
        </a>
        <a href="{{ route('teacher.profile') }}" class="flex flex-col items-center text-blue-500">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
          <span class="text-xs mt-1">โปรไฟล์</span>
        </a>
      </div>
    </nav>

</body>
</html>