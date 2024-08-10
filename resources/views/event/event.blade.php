@extends($userrole . '.layout')

@section('heading')
<div class="font-extrabold text-xl text-green-600">Event</div>
@endsection

@section('content')

@if($userrole == 'teacher' || $userrole == 'admin')
    <a href="{{ route($userrole . '.events.create') }}"
        class=" absolute lg:right-36 sm:right-24 py-2 px-4 top-28 sm:top-24 bg-green-600 text-white font-bold rounded-lg hover:bg-green-800  transition">
        ADD Event</a>
@endif  <div class="w-5/6 h-5/6 rounded-lg shadow-xl md-9 px-10 py-8 top-0 ">
    <div class="grid justify-center text-xl font-bold text-white w-full py-4 overflow-hidden bg-green-600 rounded-t-xl">
        College Events</div>
        <div
            class="eventh grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-x-2  rounded-b-lg overflow-y-scroll overflow-x-hidden no-scrollbar">
            @forelse($events as $event)
            <div class=" relative sm:col-span-1">
                <div class="relative flex  flex-col overflow-hidden py-3 sm:py-6">
                    <div
                        class="group relative cursor-pointer overflow-hidden bg-white shadow-xl pt-1 ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-xl sm:px-10">
                        <span
                            class="absolute top-1 z-0 h-20 w-20 rounded-full bg-green-600 transition-all duration-300 group-hover:scale-[10]"></span>
                        <div class="relative z-10 mx-auto max-w-md ">
                            <span
                                class=" justify-center h-20 w-20 place-items-center rounded-full bg-green-600 transition-all duration-300 group-hover:bg-green-500 inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="h-10 w-10 text-white transition-all inline">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                </svg>
                            </span>
                            <span
                                class="flex absolute top-2 right-0 font-bold text-lg text-green-600 transition-all duration-300 group-hover:text-white/90">Venue
                                : {{ $event->place }}</span>
                            <div
                                class=" pt-2 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90 ">
                                <h1
                                    class=" font-bold text-lg text-green-600 transition-all duration-300 group-hover:text-white/90">
                                    {{ $event->heading }}
                                </h1>
                                <p class="w-full h-28 overflow-y-scroll no-scrollbar ">{{ $event->description }}</p>
                            </div>
                            <div
                                class="py-2 flex justify-between text-green-600 rounded-lg text-base  leading-7 font-medium transition-all duration-300 group-hover:text-white/90">
                                <p>Date : {{ $event->date }}</p>
                                <p>Time : {{ $event->time }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @empty
        <div class="'w-5/6 h-4/6"><img src="img/no-event.jpg" alt="No Events"></div>
     @endforelse
     </div>
</div>
@endsection

@push('css')
    <style>
        .eventh {
            height: 94%;

        }

        .Events {
            background-color: #057A55;
            color: white;
        }

        .TimeTable {
            background-color: white;
            color: #057A55;
        }

        .Events:hover {
            background-color: #057A55;
        }

        .TimeTable:hover {
            background-color: rgb(243 244 246);
        }
    </style>
@endpush


@push('script')
    <script>
        toastr.options = {
            "positionClass": "toast-top-center",
        };
        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>
@endpush