<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>เลือกที่ปรึกษาร่วม</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600&display=swap" rel="stylesheet" />
    <style> body { font-family: "Kanit", sans-serif; background-color: #f0f2f5; } </style>
  </head>
  <body class="max-w-lg mx-auto pb-10">
    
    @php
        $coAdvisors = $teachers ?? [];
        $selectedAdvisorId = $selectedAdvisorId ?? 0;
        $advisorNameText = $advisorName ?? 'ไม่ระบุ';
        // รับค่า Co-Advisor ปัจจุบันที่ส่งมาจาก Controller
        $currentCoAdvisor = $currentCoAdvisor ?? null;
    @endphp

    <header class="bg-gradient-to-b from-blue-500 to-blue-400 p-4 pb-16 relative rounded-b-[3rem] text-center text-white shadow-lg">
      <a href="{{ route('student.project.create', ['advisor_id' => $selectedAdvisorId]) }}" class="absolute top-6 left-4 text-white hover:text-blue-100 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
      </a>
      <div class="mt-4">
        <h1 class="text-xl font-semibold mt-4">เลือกที่ปรึกษาร่วม</h1>
        <p class="text-sm text-blue-100 mt-1">สามารถเลือก เพิ่ม เปลี่ยน หรือลบออกได้</p>
      </div>
    </header>

    <main class="p-4 mt-4 relative z-10 space-y-4">
        
        <!-- แสดงอาจารย์ที่ปรึกษาหลัก -->
        <div class="bg-white p-4 rounded-2xl shadow-sm border border-blue-100">
            <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wide mb-1">อาจารย์ที่ปรึกษาหลัก</h3>
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold text-sm">
                    {{ substr($advisorNameText, 0, 1) }}
                </div>
                <p class="text-base text-gray-800 font-medium">{{ $advisorNameText }}</p>
            </div>
        </div>

        <!-- ส่วนแสดงที่ปรึกษาร่วมปัจจุบัน (ถ้ามี) -->
        @if($currentCoAdvisor)
        <div class="bg-yellow-50 p-4 rounded-2xl shadow-sm border border-yellow-200">
            <div class="flex justify-between items-center mb-2">
                <h3 class="text-xs font-bold text-yellow-600 uppercase tracking-wide">ที่ปรึกษาร่วมที่เลือกไว้</h3>
                <span class="bg-yellow-200 text-yellow-800 text-[10px] px-2 py-0.5 rounded-full font-bold">Selected</span>
            </div>
            
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-600 font-bold text-sm">
                        {{ substr($currentCoAdvisor->name, 0, 1) }}
                    </div>
                    <p class="text-base text-gray-800 font-medium">{{ $currentCoAdvisor->name }}</p>
                </div>
                <!-- ปุ่มลบออก -->
                <a href="{{ route('student.co_advisor.remove', ['main_advisor_id' => $selectedAdvisorId]) }}" class="text-red-500 hover:text-red-700 bg-white p-2 rounded-full shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
        @endif

        <div class="border-t border-gray-200 my-4"></div>

        <p class="text-sm text-gray-500 ml-1">รายชื่ออาจารย์ท่านอื่น</p>
        
        <!-- รายการอาจารย์ให้เลือก -->
        <div class="space-y-3">
            @forelse($coAdvisors as $advisor)
            <!-- ซ่อนคนที่เลือกไปแล้ว -->
            @if(optional($currentCoAdvisor)->id !== $advisor->id)
            <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center space-x-3 overflow-hidden">
                    <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 font-bold text-lg flex-shrink-0 border border-gray-200">
                        {{ substr(optional($advisor)->name ?? '?', 0, 1) }}
                    </div>
                    <div class="min-w-0">
                        <h3 class="font-bold text-gray-800 text-sm truncate pr-2">{{ optional($advisor)->name ?? 'ไม่ระบุชื่อ' }}</h3>
                        <p class="text-xs text-gray-500 truncate">{{ optional($advisor)->department ?? 'อาจารย์' }}</p>
                    </div>
                </div>
                
                <form method="POST" action="{{ route('student.co_advisor.confirm', ['id' => optional($advisor)->id]) }}">
                    @csrf
                    <input type="hidden" name="main_advisor_id" value="{{ $selectedAdvisorId }}">
                    <button type="submit" class="bg-green-500 text-white px-5 py-2 rounded-xl text-xs font-bold hover:bg-green-600 transition shadow-md">
                        เลือก
                    </button>
                </form>
            </div>
            @endif
            @empty
                <div class="text-center py-8 text-gray-400 bg-white rounded-2xl border border-dashed border-gray-200">
                    ไม่พบรายชื่ออาจารย์ท่านอื่น
                </div>
            @endforelse
        </div>
        
        <!-- ปุ่มล่างสุด -->
        <a href="{{ route('student.co_advisor.remove', ['main_advisor_id' => $selectedAdvisorId]) }}" class="block w-full text-center mt-6 bg-white border border-gray-300 text-gray-600 font-semibold py-3.5 rounded-xl hover:bg-gray-50 hover:text-red-500 transition-all shadow-sm">
            {{ $currentCoAdvisor ? 'เอาที่ปรึกษาร่วมออกทั้งหมด' : 'ไม่เพิ่มที่ปรึกษาร่วม' }}
        </a>

    </main>
  </body>
</html>