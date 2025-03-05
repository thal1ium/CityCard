<header class="header container mb-2">
  <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between align-items-center">
    <div class="d-flex">
      <a class="navbar-brand text-primary mt-2 mt-lg-0" href="/">
        CityCard
      </a>
      <!-- Left links -->
      @auth
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <x-nav-link :active="request()->routeIs('/cards')" href="/">Мої картки</i></x-nav-link>
          <x-nav-link :active="request()->routeIs('/cards')" href="/cards">Мої транзакції</i></x-nav-link>
          <x-nav-link :active="request()->routeIs('/cards')" href="/cards">Додати картку</i></x-nav-link>
        </ul>
      @endauth
    </div>

    <!-- Right elements -->
    <div class="d-flex align-items-center gap-1">
      @guest
        <a href="{{ Route('user.show.login') }}" class="btn btn-primary">Увійти</a>
        <a href="{{ Route('user.show.register') }}" class="btn btn-outline-primary">Реєстрація</a>
      @endguest
      @auth
        <form action="{{ Route('user.logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-outline-primary">Logout</button>
        </form>
      @endauth
    </div>
  </nav>

</header>
