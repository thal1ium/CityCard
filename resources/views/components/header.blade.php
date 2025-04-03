<header class="header container mb-2">
    <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between align-items-center">
        <div class="d-flex">
            <a class="navbar-brand text-primary mt-2 mt-lg-0" href="/">
                CityCard
            </a>
            @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <x-nav-link 
                        :active="request()->routeIs('user.user.show.cards')" 
                        :href="route('user.show.cards')"><i class="fa-regular fa-credit-card"></i> Мої картки</x-nav-link>
                    <x-nav-link 
                        :active="request()->routeIs('user.show.transactions')" 
                        :href="route('user.show.transactions')"><i class="fa-solid fa-money-bill-transfer"></i> Мої транзакції</x-nav-link>
                    <x-nav-link 
                        :active="request()->routeIs('user.show.add-card')" 
                        :href="route('user.show.add-card')"><i class="fa-solid fa-id-card"></i> Додати картку</x-nav-link>
                    <x-dropdown-link icon="fa-solid fa-wallet" title="Гаманець" :links="[
                        [
                            'href' => 'user.wallet.index',
                            'title' => 'Поповнити баланс',
                        ],
                        [
                            'href' => 'user.wallet.create',
                            'title' => 'Поповнити картку',
                        ],
                    ]">

                    </x-dropdown-link>
                </ul>
            @endauth
        </div>

        <div class="d-flex align-items-center gap-1">
            @guest
                <a href="{{ route('user.show.login') }}" class="btn btn-primary">Увійти</a>
                <a href="{{ route('user.show.register') }}" class="btn btn-outline-primary">Реєстрація</a>
            @endguest
            @auth
                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">Вийти</button>
                </form>
            @endauth
        </div>
    </nav>

</header>
