@section('title', 'Додати картку')

<x-layout>
    <form action="{{ Route('user.add.card') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="city" class="form-label">Місто</label>
            <select class="form-select" id="city" name="city_id" required>
                <option value="">Оберіть місто</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Тариф</label>
            <select class="form-select" id="tariff" name="tariff_id" required>
                <option value="">Оберіть тариф</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Додати карточку</button>
    </form>
</x-layout>
