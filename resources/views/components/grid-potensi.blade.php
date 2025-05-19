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

<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
    @foreach ($items as $i => $item)
        @php
            $clr = $colors_potensi[$i % count($colors_potensi)];
            $from = $gradientClasses[$clr]['from'];
            $to = $gradientClasses[$clr]['to'];
        @endphp

        <div class="relative group overflow-hidden rounded-lg p-4 bg-white border border-gray-200 shadow transition duration-300
                    hover:shadow-lg hover:scale-[1.02] hover:-translate-y-1 active:scale-95">

            {{-- Shine Effect --}}
            <span class="absolute top-0 left-0 w-full h-full bg-white opacity-10 transform rotate-45 translate-x-[-100%]
                         group-hover:translate-x-[200%] transition-transform duration-1000 ease-in-out"></span>

            {{-- Gradient Background on Hover --}}
            <span class="absolute inset-0 w-full h-full group-hover:bg-gradient-to-r {{ $from }} {{ $to }} opacity-0
                         group-hover:opacity-100 transition-opacity duration-500 rounded-lg"></span>

            {{-- Content --}}
            <div class="relative z-10 flex items-center space-x-4">
                <div class="text-{{ $clr }}-600 group-hover:text-white transition duration-300 text-3xl">
                    <i class="fa-solid fa-{{ $item['icon'] }}"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 group-hover:text-white transition duration-300">
                        {{ $item['label'] }}
                    </p>
                    <p class="text-xl font-semibold text-gray-700 group-hover:text-white transition duration-300">
                        {{ $item['value'] }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
