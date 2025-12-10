<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - Project Board</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Kanit', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl overflow-hidden">
        
        <!-- ส่วนหัว (Logo / Title) -->
        <div class="bg-blue-600 p-8 text-center relative overflow-hidden">
            <!-- Decorative Circles -->
            <div class="absolute top-0 left-0 -ml-10 -mt-10 w-32 h-32 rounded-full bg-white opacity-10"></div>
            <div class="absolute bottom-0 right-0 -mr-10 -mb-10 w-32 h-32 rounded-full bg-white opacity-10"></div>
            
            <h1 class="text-3xl font-bold text-white mb-2 relative z-10">Project Board</h1>
            <p class="text-blue-100 text-sm relative z-10">ระบบบริหารจัดการโครงงานนิสิต</p>
        </div>

        <!-- ส่วนฟอร์ม -->
        <div class="p-8">
            
            <h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">เข้าสู่ระบบ</h2>

            <!-- แสดง Error Message -->
            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r shadow-sm" role="alert">
                    <p class="font-bold text-sm">พบข้อผิดพลาด:</p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('student.login.submit') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- อีเมล -->
                <div>
                    <label for="user_email" class="block text-sm font-medium text-gray-700 mb-1">อีเมล</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                        <input type="email" name="user_email" id="user_email" required 
                            class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition shadow-sm placeholder-gray-400" 
                            placeholder="example@university.ac.th">
                    </div>
                </div>

                <!-- รหัสผ่าน -->
                <div>
                    <label for="user_password" class="block text-sm font-medium text-gray-700 mb-1">รหัสผ่าน</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="password" name="user_password" id="user_password" required 
                            class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition shadow-sm placeholder-gray-400" 
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- ปุ่ม Submit -->
                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out transform hover:-translate-y-0.5">
                        เข้าสู่ระบบ
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-xs text-gray-500">
                    หากลืมรหัสผ่าน กรุณาติดต่อเจ้าหน้าที่ดูแลระบบ
                </p>
            </div>
        </div>
        
        <!-- Footer ของ Card -->
        <div class="bg-gray-50 px-8 py-4 border-t border-gray-100 flex justify-center">
            <p class="text-xs text-gray-400">© 2025 Project Management System</p>
        </div>
    </div>

</body>
</html>