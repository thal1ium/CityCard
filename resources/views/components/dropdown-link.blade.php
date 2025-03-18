@props([
    'title' => '',
    'links' => [],
])

<li class="dropdown">
    <button class="nav-link dropdown-toggle" type="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        {{ $title }}
    </button>
    <ul class="dropdown-menu">
        @foreach ($links as $link)
            <li><a class="dropdown-item" href="{{route($link['href'])}}">{{$link['title']}}</a></li>
        @endforeach
    </ul>
</li>
