@props([
    'number' => null,
    'phone' => null,
    'city' => null,
    'type' => null,
    'balance' => 0,
])

@php
    $colors = [
        'Стандартний' => 'standart',
        'Студентський/Учнівський' => 'student',
        'Пільговий' => 'preferential',
        'Службовий' => 'service',
    ];
@endphp

<li class="list__item">
    <div class="type {{ $colors[$type] }}">
        <i class="fa-solid fa-id-card"></i>
    </div>
    <div>
        <p class="mb-1 h5"><strong>Тип:</strong> {{ $type }}</p>
        <p class="mb-1"><strong>Номер картки:</strong> {{ $number }}</p>
        <p class="mb-1"><strong>Телефон:</strong> {{ $phone }}</p>
        <p class="mb-1"><strong>Місто:</strong> {{ $city }}</p>
        <p class="mb-1"><strong>Баланс:</strong> {{ $balance }}</p>
    </div>
</li>
