@extends('layout')

@section('title', 'Calendar')

@section('content')
    <div class="lg:flex lg:h-full lg:flex-col">
        @include('components.calendar.header')

        <div class="shadow ring-1 ring-black ring-opacity-5 lg:flex lg:flex-auto lg:flex-col">
            <div
                class="grid grid-cols-7 gap-px border-b border-gray-300 bg-gray-200 text-center text-xs font-semibold leading-6 text-gray-700 lg:flex-none">
                @foreach($daysLabels as $dayLabel)
                    <div class="bg-white py-2">{{ $dayLabel  }}</div>
                @endforeach
            </div>

            <div class="flex bg-gray-200 text-xs leading-6 text-gray-700 lg:flex-auto">
                <div class="hidden w-full lg:grid lg:grid-cols-7 lg:grid-rows-{{ $numberOfWeeks }} lg:gap-px">
                    @if ($monthStartDay > 1)
                        @for ($i = 1; $i < $monthStartDay; $i++)
                            <div class="relative bg-gray-50 py-2 px-3 text-gray-500">
                                <time></time>
                            </div>
                        @endfor
                    @endif

                    @for ($i = 1; $i <= $numberOfDays; $i++)
                        @php
                            $date = $year . '-' . $month . '-' . sprintf('%02d', $i);
                        @endphp
                        <div class="relative bg-white py-2 px-3 hover:bg-gray-100">
                            <time datetime="{{ $date }}">{{ $i }}</time>

                            <a class="flex float-right cursor-pointer text-blue-800"
                               href="{{ url('/events/?date='.$date) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="22" fill="currentColor"
                                     class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                                Add
                            </a>

                            @if (isset($events[$date]))
                                <ol class="mt-2">
                                    @foreach($events[$date] as $event)
                                        <li class="flex">
                                            <a href="{{ url('event/'.$event['id']) }}" class="group flex">
                                                <p class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">{{ $event['name'] }}</p>
                                            </a>
                                            <a class="delete-event float-right text-red-500 inline-block cursor-pointer pl-2" data-id="{{ $event['id'] }}">delete</a>
                                        </li>
                                    @endforeach
                                </ol>
                            @endif
                        </div>
                    @endfor

                    @if($monthEndingDay < 7)
                        @for ($i = 1; $i <= $monthEndingDay; $i++)
                            <div class="relative bg-gray-50 py-2 px-3 text-gray-500">
                                <time></time>
                            </div>
                        @endfor
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
