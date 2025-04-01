@section('title', 'Додати транспорт')


<x-admin-layout>
    <form action="{{ route('admin.city-tariffs.store') }}" method="POST" class="mt-5">
        @csrf
        <div class="mb-3">
            <label for="city" class="form-label">Добавити місто:</label>
            <select class="form-select" id="city" name="city_id" required>
                <option value="">Оберіть місто</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="transport" class="form-label">Добавити транспорт:</label>
            <select class="form-select" id="transport" name="transport_id" required>
                <option value="">Оберіть транспорт</option>
                @foreach ($transports as $transport)
                    <option value="{{ $transport->id }}">{{ $transport->type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tariff" class="form-label">Добавити тариф:</label>
            <select class="form-select" id="tariff" name="tariff_id" required>
                <option value="">Оберіть тариф</option>
                @foreach ($tariffs as $tariff)
                    <option value="{{ $tariff->id }}">{{ $tariff->type }}</option>
                @endforeach
                {{old($tariff->type)}}
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Добавити ціну:</label>
            <input type="number" name="price" class="form-control" min="0">
        </div>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Добавити ?')">Додати</button>
    </form>
</x-admin-layout>
