<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรไฟล์นิสิต</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style> 
        body { font-family: 'Kanit', sans-serif; background-color: #f7f8fa; } 
        .swal2-popup { font-family: 'Kanit', sans-serif; border-radius: 1rem; }
    </style>
</head>
<body class="max-w-lg mx-auto pb-24">
    
    <!-- Header -->
    <header class="bg-white p-4 pt-8 pb-4 shadow-sm sticky top-0 z-20 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">โปรไฟล์ของฉัน</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium flex items-center bg-red-50 px-3 py-1.5 rounded-lg transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
              ออกจากระบบ
            </button>
        </form>
    </header>
    <div class="mt-6 space-y-3 relative z-10 border-t border-white/20 pt-4">
    <!-- ... ข้อมูลอีเมล/เบอร์โทร ... -->
    
    <div class="flex space-x-3 pt-2">
        <!-- ปุ่มเปลี่ยนรหัสผ่าน -->
        <a href="{{ route('student.password.change') }}" class="inline-flex items-center text-xs text-blue-200 hover:text-white transition bg-white/10 px-3 py-1.5 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" /></svg>
            เปลี่ยนรหัสผ่าน
        </a>
        
        <!-- ✅ ปุ่มแก้ไขข้อมูล (เพิ่มใหม่) -->
        <a href="{{ route('student.profile.edit') }}" class="inline-flex items-center text-xs text-blue-200 hover:text-white transition bg-white/10 px-3 py-1.5 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
            แก้ไขข้อมูล
        </a>
    </div>
</div>

    <main class="p-4 space-y-6">
        
        <!-- Alert Messages -->
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'สำเร็จ',
                        text: "{{ session('success') }}",
                        timer: 2000,
                        showConfirmButton: false
                    });
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: "{{ session('error') }}",
                        confirmButtonText: 'ปิด'
                    });
                });
            </script>
        @endif
        
        <!-- ข้อมูลส่วนตัว -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl p-6 text-white shadow-lg relative overflow-hidden">
            <div class="absolute top-0 right-0 -mr-6 -mt-6 w-32 h-32 rounded-full bg-white opacity-10 blur-xl"></div>
            <div class="absolute bottom-0 left-0 -ml-6 -mb-6 w-24 h-24 rounded-full bg-white opacity-10 blur-xl"></div>
            
            <div class="flex items-center space-x-4 relative z-10">
                <div class="w-20 h-20 bg-white p-1 rounded-full shadow-md">
                    <img src="https://placehold.co/100x100/EBF5FF/3B82F6?text=Student" class="w-full h-full object-cover rounded-full">
                </div>
                <div>
                    <h2 class="text-xl font-bold">{{ Auth::user()->name }}</h2>
                    <p class="text-blue-100 text-sm opacity-90">นิสิตปริญญาตรี</p>
                </div>
            </div>

            <div class="mt-6 space-y-3 relative z-10 border-t border-white/20 pt-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-blue-200 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0c0 .884-.876 2-1.667 2C8.5 8 8 7.333 8 6"></path></svg>
                    <span class="text-sm font-medium">รหัสนิสิต: {{ Auth::user()->student_id }}</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-blue-200 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span class="text-sm font-medium truncate">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>

        <!-- รายการคำขอโครงงาน -->
        <div>
            <div class="flex justify-between items-center mb-4 px-1">
                <h3 class="text-gray-700 font-bold text-lg">ประวัติคำขอโครงงาน</h3>
                <a href="{{ route('student.home') }}" class="flex items-center space-x-1 bg-blue-50 text-blue-600 px-3 py-1.5 rounded-full text-xs font-bold hover:bg-blue-100 transition shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                    <span>เพิ่มคำขอใหม่</span>
                </a>
            </div>
            
            @php
                $projects = isset($myProjects) ? $myProjects : (isset($myProject) && $myProject ? [$myProject] : []);
            @endphp

            @if(count($projects) > 0)
                <div class="space-y-4">
                    @foreach($projects as $project)
                    <div class="bg-white p-5 rounded-xl shadow-md border border-gray-100 relative transition hover:shadow-lg">
                        
                        <!-- Header Card -->
                        <div class="flex justify-between items-start mb-3">
                            <div class="flex items-center text-xs text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                {{ $project->created_at->format('d/m/Y H:i') }}
                            </div>
                            
                            @if($project->status == 'pending')
                                <span class="bg-orange-100 text-orange-600 px-2 py-0.5 rounded text-[10px] font-bold border border-orange-200">รอตอบรับ</span>
                            @elseif($project->status == 'approved')
                                <span class="bg-green-100 text-green-600 px-2 py-0.5 rounded text-[10px] font-bold border border-green-200">อนุมัติแล้ว</span>
                            @elseif($project->status == 'rejected')
                                <span class="bg-red-100 text-red-600 px-2 py-0.5 rounded text-[10px] font-bold border border-red-200">ถูกปฏิเสธ</span>
                            @endif
                        </div>
                        
                        <!-- Content -->
                        <div class="pl-2 border-l-4 {{ $project->status == 'approved' ? 'border-green-500' : ($project->status == 'rejected' ? 'border-red-500' : 'border-orange-400') }}">
                            <h4 class="font-bold text-gray-800 text-md mb-1 line-clamp-1">{{ $project->title }}</h4>
                            <p class="text-xs text-gray-500 mb-1">เสนอ: <span class="text-blue-600">{{ $project->teacher->name ?? 'อาจารย์' }}</span></p>
                            @if(isset($project->description))
                                <p class="text-xs text-gray-400 truncate">{{ $project->description }}</p>
                            @endif
                        </div>

                        <!-- Actions -->
                        <div class="mt-4 flex flex-col gap-2">
                            
                            <!-- *** ปุ่มรายละเอียดการส่งงาน (เงื่อนไขที่ปุ่มสีฟ้า) *** -->
                            @if($project->status == 'approved')
                                <!-- กรณีอนุมัติแล้ว: ลิงก์ทำงานปกติ -->
                                <a href="{{ route('student.project.submit_work', ['project_id' => $project->advisor_request_id]) }}" class="flex items-center justify-center w-full bg-blue-600 text-white py-2 rounded-lg text-xs font-semibold hover:bg-blue-700 transition shadow-sm shadow-blue-200">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    รายละเอียดการส่งงาน
                                </a>
                            @else
                                <!-- กรณีไม่อนุมัติ: กดแล้วขึ้น Alert แจ้งเตือน -->
                                <button type="button" onclick="showNotApprovedAlert('{{ $project->status }}')" class="flex items-center justify-center w-full bg-blue-400 text-white py-2 rounded-lg text-xs font-semibold cursor-pointer opacity-70 hover:opacity-100 transition shadow-sm">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                                    รายละเอียดการส่งงาน
                                </button>
                            @endif
                            
                            <!-- ปุ่มยกเลิกคำขอ -->
                            @if($project->status == 'pending')
                                <form id="cancel-form-{{ $project->advisor_request_id }}" action="{{ route('student.project.cancel', $project->advisor_request_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmCancel('{{ $project->advisor_request_id }}')" class="flex items-center justify-center w-full bg-white text-red-500 border border-red-200 py-2 rounded-lg text-xs font-semibold hover:bg-red-50 transition">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        ยกเลิกคำขอ
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white p-8 rounded-xl shadow-sm text-center border-2 border-dashed border-gray-200 flex flex-col items-center justify-center min-h-[250px]">
                    <div class="bg-gray-50 p-4 rounded-full mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    </div>
                    <p class="text-gray-500 text-sm font-medium">ยังไม่มีรายการคำขอ</p>
                    <p class="text-gray-400 text-xs mb-4">คุณสามารถส่งหัวข้อโครงงานให้อาจารย์พิจารณาได้</p>
                    <a href="{{ route('student.home') }}" class="bg-blue-500 text-white px-6 py-2.5 rounded-full text-sm font-semibold hover:bg-blue-600 transition shadow-md shadow-blue-200">
                        สร้างคำขอใหม่
                    </a>
                </div>
            @endif
        </div>

    </main>

    <!-- Bottom Navbar -->
    <nav class="fixed bottom-0 left-0 right-0 bg-white shadow-[0_-5px_20px_rgba(0,0,0,0.03)] max-w-lg mx-auto border-t z-30 pb-safe">
      <div class="flex justify-around py-3">
        <a href="{{ route('student.home') }}" class="flex flex-col items-center text-gray-400 hover:text-blue-500 transition-colors duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
          <span class="text-[10px] font-medium mt-1">หน้าหลัก</span>
        </a>
        <a href="{{ route('student.notification') }}" class="flex flex-col items-center text-gray-400 hover:text-blue-500 transition-colors duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
          <span class="text-xs mt-1">แจ้งเตือน</span>
        </a>
        <a href="{{ route('student.profile') }}" class="flex flex-col items-center text-blue-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
          <span class="text-[10px] font-medium mt-1">โปรไฟล์</span>
        </a>
      </div>
    </nav>

    <!-- Script สำหรับ Alert -->
    <script>
        function confirmCancel(id) {
            Swal.fire({
                title: 'ยืนยันการยกเลิก?',
                text: "ต้องการลบรายการคำขอนี้ใช่หรือไม่?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#e5e7eb',
                confirmButtonText: 'ใช่, ลบเลย',
                cancelButtonText: 'ยกเลิก',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-lg px-4 py-2 font-medium',
                    cancelButton: 'rounded-lg px-4 py-2 font-medium text-gray-600'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('cancel-form-' + id).submit();
                }
            })
        }

        // ฟังก์ชันแจ้งเตือนเมื่อยังไม่อนุมัติ (ปุ่มสีฟ้า)
        function showNotApprovedAlert(status) {
            let msg = 'ต้องรออาจารย์ที่ปรึกษา "อนุมัติ" หัวข้อโครงงานก่อน จึงจะสามารถส่งงานในแต่ละบทได้';
            if(status === 'rejected') {
                msg = 'หัวข้อโครงงานนี้ถูก "ปฏิเสธ" กรุณายกเลิกคำขอแล้วส่งหัวข้อใหม่ หรือติดต่ออาจารย์';
            }

            Swal.fire({
                icon: 'info',
                title: 'ยังไม่สามารถส่งงานได้',
                text: msg,
                confirmButtonText: 'เข้าใจแล้ว',
                confirmButtonColor: '#3B82F6',
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-lg px-4 py-2 font-medium'
                }
            });
        }
    </script>

</body>
</html>