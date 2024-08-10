@extends('admin.layout')
@section('heading')
<div class="text-xl text-green-600 font-extrabold flex flex-row items-center h-1/6">Update Profile</div>
@endsection

@section('content')
<div class="w-full h-5/6">
    <form method="GET" action="{{ route('admin.updateProfile') }}" class="w-full h-1/5">
        <div class="relative w-full max-w-xl mx-auto bg-white rounded-full">
            <input placeholder="Search by name"
                class="rounded-full w-full h-16 bg-transparent py-2 pl-8 pr-32 outline-none border-2 border-gray-100 shadow-md hover:outline-none focus:ring-2 focus:ring-green-200 focus:border-green-200"
                type="text" name="query" id="query" value="{{ request()->get('query') }}">
            <button type="submit"
                class="absolute inline-flex items-center h-10 px-4 py-2 text-sm text-white transition duration-150 ease-in-out rounded-full outline-none right-3 top-3 bg-green-600 sm:px-6 sm:text-base sm:font-medium hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <svg class="-ml-0.5 sm:-ml-1 mr-2 w-4 h-4 sm:h-5 sm:w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Search
            </button>
        </div>
        <div class="flex justify-center py-4">
            <nav
                class="flex overflow-x-auto items-center p-1 space-x-1 rtl:space-x-reverse text-sm text-gray-600 bg-gray-500/5 rounded-xl dark:bg-gray-500/20">
                <button type="submit" name="role" value="teacher"
                    class="flex whitespace-nowrap items-center h-8 px-5 font-medium rounded-lg outline-none focus:ring-2 focus:ring-gray-100 focus:ring-inset transition-colors duration-300 {{ request()->get('role') == 'teacher' ? 'text-white bg-green-600' : 'hover:text-gray-800 hover:bg-green-100 focus:text-green-600' }}">
                    Teacher
                </button>
                <button type="submit" name="role" value="student"
                    class="flex whitespace-nowrap items-center h-8 px-5 font-medium rounded-lg outline-none focus:ring-2 focus:ring-gray-200 focus:ring-inset transition-colors duration-300 {{ request()->get('role') == 'student' ? 'text-white bg-green-600' : 'hover:text-gray-800 hover:bg-green-100 focus:text-green-600' }}">
                    Student
                </button>
            </nav>
        </div>
    </form>

    <div class="flex flex-col w-full main justify-center items-center">
        @if($usersInfo->count())
            <div class="w-5/6 flex justify-center content-center align-middle rounded-xl overflow-hidden shadow-xl">
                <div class="w-full max-h-[500px] overflow-y-auto no-scrollbar">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-green-600 text-white sticky top-0">
                                <th scope="col" class="p-5 text-left text-sm font-semibold capitalize">Name</th>
                                <th scope="col" class="p-5 text-left text-sm font-semibold capitalize">User ID</th>
                                <th scope="col" class="p-5 text-left text-sm font-semibold capitalize">Role</th>
                                <th scope="col" class="p-5 text-left text-sm font-semibold capitalize">
                                    @if ($role == 'student')
                                        Course
                                    @else
                                        Department
                                    @endif
                                </th>
                                <th scope="col" class="p-5 text-left text-sm font-semibold capitalize">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300">
                            @foreach ($usersInfo as $user)
                                <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                                    <td class="p-5 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{$user->first_name}} {{$user->last_name}}
                                    </td>
                                    <td class="p-5 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $user->id }}
                                    </td>
                                    <td class="p-5 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $role }}
                                    </td>
                                    <td class="p-5 whitespace-nowrap text-sm font-medium text-gray-900">
                                        @if ($role == 'student')
                                            {{ $user->course->course_name }}
                                        @else
                                            {{ $user->department }}
                                        @endif
                                    </td>
                                    <td class="p-5">
                                        <div class="flex items-center gap-1">
                                            <form id="conditionalForm-{{ $user->id }}" method="POST"
                                                action="{{ $role == 'student' ? route('StudentForm') : route('TeacherForm') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <button type="submit"
                                                    class="p-2 rounded-full group transition-all duration-500 flex items-center">
                                                    <svg class="-ml-0.5 sm:-ml-1 mr-2 w-4 h-4 sm:h-5 sm:w-5"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <form action="{{ route('deleteUser') }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <input type="hidden" name="role" value="{{ $role }}">
                                                <button type="submit"
                                                    class="p-2 rounded-full group transition-all duration-500 flex items-center"
                                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M6 6v9h8V6H6zM5 4h10l-1-1H6l-1 1z" stroke="currentColor" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <form id="userinfo-{{ $user->id }}" action="{{ route('Profile') }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <input type="hidden" name="role" value="{{ $role }}">
                                                <button type="submit"
                                                    class="p-2 rounded-full group transition-all duration-500 flex items-center">
                                                    <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12ZM12 4a1 1 0 1 0 0 2h-1v3h1a1 1 0 1 0 0 2h-4a1 1 0 1 0 0-2h1v-4a1 1 0 0 0-1-1h-2ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        @else
            <div class="flex justify-center">
                <img src="img/find.jpg" alt="Find" class="w-1/2 h-auto">
            </div>
        @endif
    </div>
</div>
@endsection

@push('css')
    <style>
        .UpdateProfile {
            background-color: #057A55;
            color: white;
        }

        .TimeTable {
            background-color: white;
            color: #057A55;
        }

        .UpdateProfile:hover {
            background-color: #057A55;
        }

        .TimeTable:hover {
            background-color: rgb(243 244 246);
        }

        .main {
            height: 80%;
        }

        .overflow-y-auto {
            max-height: 500px;
        }

        thead th {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            background: #057A55;
            color: white;
            z-index: 10;
        }

        tbody tr {
            z-index: 1;
        }
    </style>
@endpush