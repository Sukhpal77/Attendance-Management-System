@extends('student.layout')

@section('heading')
<div class="font-extrabold text-xl text-green-600">Attendance</div>
@endsection

@section('content')
<div class="w-5/6 h-4/5 rounded-lg  shadow-xl md-9 px-10 py-8  top-0 overflow-y-scroll overflow-x-hidden no-scrollbar">
    <form id="filterForm" action="{{ route('sAttendance') }}" method="GET" class="mb-6 flex justify-between">
        <div class="w-1/4">
            <label for="subjectFilter" class="block text-sm font-medium text-gray-700">Filter by Subject:</label>
            <select id="subjectFilter" name="filter_subject" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                <option value="">All Subjects</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject }}" {{ request('filter_subject') == $subject ? 'selected' : '' }}>{{ $subject }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-1/4">
            <label for="sortOption" class="block text-sm font-medium text-gray-700">Sort by:</label>
            <select id="sortOption" name="sort_option" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                <option value="percentage_asc" {{ request('sort_option') == 'percentage_asc' ? 'selected' : '' }}>Percentage: Low to High</option>
                <option value="percentage_desc" {{ request('sort_option') == 'percentage_desc' ? 'selected' : '' }}>Percentage: High to Low</option>
                <option value="total_asc" {{ request('sort_option') == 'total_asc' ? 'selected' : '' }}>Total: Low to High</option>
                <option value="total_desc" {{ request('sort_option') == 'total_desc' ? 'selected' : '' }}>Total: High to Low</option>
            </select>
        </div>
        <div class="w-1/4 flex items-end">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg">Apply</button>
        </div>
    </form>

    @foreach($subjectAttendance as $subject => $data)
        @php
            $total = $data['total'];
            $present = $data['present'];
            $percentage = $total ? round(($present / $total) * 100) : 0;

            $bgColor = $percentage < 75 ? 'bg-red-500' : 'bg-green-500';

            $requiredAttendance = max(0, ceil((0.75 * ($total + 1)) - $present));
            $maxMissedLectures = $total ? max(0, floor($total - ($present / 0.75))) : 0;
        @endphp

        <div class="relative my-6 bg-white shadow-md rounded-lg flex flex-row items-center p-4 overflow-hidden {{ $bgColor }}">
            <div class="w-1/4 text-lg font-semibold text-white">
                {{ $subject }}
            </div>
            <div class="w-4/6 flex items-center relative">
                <div class="z-10 bg-white h-6 rounded-lg overflow-hidden flex items-center justify-center text-xs font-semibold text-gray-800" style="width: {{ $percentage }}%;">{{ $percentage }}%</div>
                <div class="z-1 bg-gray-300 rounded-lg absolute inset-0 "></div>
            </div>
            <div class="w-1/4 text-lg font-semibold text-white text-center">
                {{ $present }} / {{ $total }} ({{ $percentage }}%)
            </div>
            <div class="relative  right-2 w-28 ">
                <button type="button" data-subject="{{ $subject }}" class=" w-full show-details bg-white text-gray-500 hover:text-white hover:bg-gray-300 px-2 py-1 rounded-md text-xs">Show Details</button>
            </div>
        </div>

        @if ($percentage < 75)
            <div class="text-red-600 font-semibold mb-4">
                To reach 75% attendance, you need to attend {{ $requiredAttendance }} more lectures.
            </div>
        @else
            <div class="text-green-600 font-semibold mb-4">
                You can miss up to {{ $maxMissedLectures }} lectures and still maintain your attendance above 75%.
            </div>
        @endif
    @endforeach
</div>
@endsection

@push('css')
<style>
    .bg-green-500 {
        background-color: #388E3C;
    }
    .bg-gray-100 {
        background-color: #F5F5F5;
    }
    .bg-red-500 {
        background-color: #D32F2F;
    }
    .overflow-hidden {
        overflow: hidden;
    }
    .Attendance {
        background-color: #057A55;
        color: white;
    }
    .TimeTable {
        background-color: white;
        color: #057A55;
    }
    .Attendance:hover{
        background-color: #057A55;
    }
    .TimeTable:hover{
        background-color: rgb(243 244 246);
    }    
</style>
@endpush

@push('js')
<script>
    document.querySelectorAll('.show-details').forEach(button => {
        button.addEventListener('click', function() {
            const subject = this.getAttribute('data-subject');
            // Implement modal or redirect logic here
            alert('Show details for subject: ' + subject);
        });
    });
</script>
@endpush

