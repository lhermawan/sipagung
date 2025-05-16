@php
    $colors_potensi = ['blue', 'green', 'purple', 'red', 'indigo', 'orange', 'teal', 'rose'];
    $gradientClasses = [
        'blue' => ['from' => 'group-hover:from-blue-500', 'to' => 'group-hover:to-blue-700'],
        'green' => ['from' => 'group-hover:from-green-500', 'to' => 'group-hover:to-green-700'],
        'purple' => ['from' => 'group-hover:from-purple-500', 'to' => 'group-hover:to-purple-700'],
        'red' => ['from' => 'group-hover:from-red-500', 'to' => 'group-hover:to-red-700'],
        'indigo' => ['from' => 'group-hover:from-indigo-500', 'to' => 'group-hover:to-indigo-700'],
        'orange' => ['from' => 'group-hover:from-orange-500', 'to' => 'group-hover:to-orange-700'],
        'teal' => ['from' => 'group-hover:from-teal-500', 'to' => 'group-hover:to-teal-700'],
        'rose' => ['from' => 'group-hover:from-rose-500', 'to' => 'group-hover:to-rose-700'],
    ];
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @foreach ($items as $i => $item)
        @php 
            $clr_potensi = $colors_potensi[$i % count($colors_potensi)];
            $fromClass = $gradientClasses[$clr_potensi]['from'];
            $toClass = $gradientClasses[$clr_potensi]['to'];
        @endphp

        <div class="relative group overflow-hidden rounded-xl p-4 min-h-[6rem]
            bg-{{ $clr_potensi }}-100 border border-gray-200 shadow-sm transition-all duration-300
            hover:shadow-lg hover:scale-[1.03] hover:-translate-y-1 active:scale-95">

            {{-- Hover Shine --}}
            <span class="absolute top-0 left-0 w-full h-full bg-white opacity-10 transform rotate-45
                translate-x-[-100%] group-hover:translate-x-[200%] transition-transform duration-1000 ease-in-out"></span>

            {{-- Hover Gradient Overlay --}}
            <span class="absolute inset-0 w-full h-full group-hover:bg-gradient-to-r {{ $fromClass }} {{ $toClass }} opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>

            <div class="relative z-10 flex items-center space-x-4">
                <div class="icon text-{{ $clr_potensi }}-600 group-hover:text-white transition duration-300">
                    <i class="fa-solid fa-{{ $item['icon'] }} fa-lg"></i>
                </div>
                <div>
                    <div class="text-sm font-medium text-gray-800 group-hover:text-white transition duration-300">
                        {{ $item['label'] }}
                    </div>
                    <div class="text-xl font-bold text-gray-900 group-hover:text-white transition duration-300">
                        {{ $item['value'] }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>