@section('title', 'Головна')

<x-layout>
    @guest
        <h1>Привіт, авторизуйся !</h1>
    @endguest
    @auth
      <h1>Вітаємо на сайті !</h1>
    @endauth
</x-layout>
