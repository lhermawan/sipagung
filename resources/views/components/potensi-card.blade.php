@props([
    'icon',
    'label',
    'value',
    'color' => 'primary',
    'unit' => '',
    'textColor' => 'text-slate-700',
    'bg' => 'bg-white',
    'border' => true,
])

@php
    $borderClass = $border ? "border-b-8 border-{$color}" : "";
    $iconBg = $bg === 'bg-white' ? "bg-{$color}" : "bg-white";
    $iconColor = $bg === 'bg-white' ? "text-white" : "text-{$color}";
    $textWhite = $bg !== 'bg-white' ? 'text-white' : $textColor;
@endphp

<div class="{{ $bg }} rounded-xl shadow-lg p-5 {{ $borderClass }}">
    <div class="flex flex-col space-y-6">
        <div class="flex justify-between items-start">
            <div class="flex items-center justify-center w-12 h-12 {{ $iconBg }} rounded-full">
                <i class="mdi {{ $icon }} {{ $iconColor }} text-2xl"></i>
            </div>
            <i class="mdi mdi-chart-line-variant text-5xl bg-gradient-to-r from-white to-{{ $color }} bg-clip-text text-transparent"></i>
        </div>
        <div class="flex flex-col space-y-1 font-montserrat font-semibold {{ $textWhite }}">
            <p class="text-sm">{{ $label }}</p>
            <p class="text-2xl">{{ $value }}<span class="text-sm">{{ $unit }}</span></p>
        </div>
    </div>
</div>
