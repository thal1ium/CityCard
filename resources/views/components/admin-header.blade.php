<header class="header container mb-2">
    <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between align-items-center">
        <div class="d-flex">
            <a class="navbar-brand text-primary mt-2 mt-lg-0" href="{{ route('admin.index') }}">
                CityCard | Адмін панель
            </a>
            @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <x-dropdown-link title="Міста" :links="[
                        [
                            'href' => 'admin.cities.index',
                            'title' => 'Всі міста',
                        ],
                        [
                            'href' => 'admin.cities.create',
                            'title' => 'Додати місто',
                        ],
                    ]"></x-dropdown-link>
                    <x-dropdown-link title="Тарифи" :links="[
                        [
                            'href' => 'admin.cities.index',
                            'title' => 'Всі тарифи',
                        ],
                        [
                            'href' => 'admin.cities.create',
                            'title' => 'Додати тариф',
                        ],
                    ]"></x-dropdown-link>
                    <x-dropdown-link title="Транспорт" :links="[
                        [
                            'href' => 'admin.cities.index',
                            'title' => 'Всі транспорти',
                        ],
                        [
                            'href' => 'admin.cities.create',
                            'title' => 'Додати транспорт',
                        ],
                    ]"></x-dropdown-link>
                    <x-dropdown-link title="Тарифи для міст" :links="[
                        [
                            'href' => 'admin.cities.index',
                            'title' => 'Всі тарифи для міст',
                        ],
                        [
                            'href' => 'admin.cities.create',
                            'title' => 'Додати тариф для міста',
                        ],
                    ]"></x-dropdown-link>
                </ul>
            @endauth
        </div>

        <div class="d-flex align-items-center gap-1">
            @auth
                <form action="{{ Route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">Вийти</button>
                </form>
            @endauth
        </div>
    </nav>

</header>
