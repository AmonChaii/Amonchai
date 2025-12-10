<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลส่วนตัว (นิสิต)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Kanit', sans-serif;
        background-color: #f0f2f5;
    }
    </style>
</head>

<body class="max-w-lg mx-auto pb-24">

    <header class="bg-white sticky top-0 z-10 shadow-sm">
        <div class="flex items-center p-4">
            <button onclick="history.back()" class="mr-4 text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <h1 class="text-lg font-semibold text-gray-800">แก้ไขข้อมูลส่วนตัว</h1>
        </div>
    </header>

    <main class="p-4 space-y-6">
        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 rounded shadow-sm">
            {{ session('success') }}</div>
        @endif

        <form action="{{ route('student.profile.update') }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf

            <!-- รูปโปรไฟล์ -->
            <div class="flex justify-center">
                <div class="relative">
                    <div
                        class="w-32 h-32 bg-gray-200 rounded-full border-4 border-blue-500 flex items-center justify-center overflow-hidden shadow-lg">
                        <img id="preview-image"
                            src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : 'https://placehold.co/200x200/EBF5FF/3B82F6?text='.substr(Auth::user()->name, 0, 1) }}"
                            class="w-full h-full object-cover">
                    </div>
                    <label for="image"
                        class="absolute bottom-1 right-1 bg-white p-2 rounded-full shadow-md cursor-pointer hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <input type="file" id="image" name="image" class="hidden" accept="image/*"
                            onchange="previewImage(event)">
                    </label>
                </div>
            </div>

            <!-- ข้อมูลส่วนตัว -->
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 space-y-4">
                <h2 class="text-lg font-semibold text-gray-700">ข้อมูลทั่วไป</h2>

                <div>
                    <label class="text-sm font-medium text-gray-600">ชื่อ-นามสกุล</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}"
                        class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-600">เบอร์โทรศัพท์</label>
                    <input type="tel" name="tel" value="{{ Auth::user()->tel }}"
                        class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-600">รหัสนิสิต</label>
                    <input type="text" value="{{ Auth::user()->student_id ?? '-' }}" disabled
                        class="mt-1 w-full p-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-500">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-600">อีเมล (แก้ไขไม่ได้)</label>
                    <input type="email" value="{{ Auth::user()->email }}" disabled
                        class="mt-1 w-full p-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-500">
                </div>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 shadow-md transition">บันทึกการเปลี่ยนแปลง</button>
        </form>
    </main>

    <!-- Navbar นิสิต -->
    <nav
        class="fixed bottom-0 left-0 right-0 bg-white shadow-[0_-2px_10px_rgba(0,0,0,0.05)] max-w-lg mx-auto border-t z-10">
        <div class="flex justify-around py-3">
            <a href="{{ route('student.home') }}" class="flex flex-col items-center text-gray-400 hover:text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="text-xs mt-1">หน้าหลัก</span>
            </a>
            <a href="{{ route('student.notification') }}"
                class="flex flex-col items-center text-gray-400 hover:text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <span class="text-xs mt-1">แจ้งเตือน</span>
            </a>
            <a href="{{ route('student.profile') }}" class="flex flex-col items-center text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-xs mt-1">โปรไฟล์</span>
            </a>
        </div>
    </nav>

    <script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('preview-image');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>
</body>

</html>