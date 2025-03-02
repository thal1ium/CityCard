@props([
    'active' => false,
])

<li class="nav-item">
  <a class="{{ $active ? 'nav-link fw-bold' : 'nav-link' }}" {{ $attributes }}>{{ $slot }}</a>
</li>
