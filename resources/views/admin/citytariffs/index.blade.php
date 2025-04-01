@section('title', 'Весь транспорт')

<x-admin-layout>
    <div class="w-100">
        <table class="table mt-5">
            <tbody>
                @if ($cityTariffs)
                    @foreach ($cityTariffs as $cityTariff)
                        <tr>
                            <th scope="row">{{ $cityTariff->id }}</th>
                            <td>
                                <form action="{{ route('admin.city-tariffs.update', $cityTariff) }}" method="POST"
                                    class="d-flex gap-2 w-100">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="city" class="form-control"
                                        value="{{ $cityTariff->city->name }}" disabled>
                                    <input type="text" name="tariff" class="form-control"
                                        value="{{ $cityTariff->tariff->type }}" disabled>
                                    <input type="text" name="transport" class="form-control"
                                        value="{{ $cityTariff->transport->type }}" disabled>
                                    <input type="text" name="price" class="form-control"
                                        value="{{ $cityTariff->price }}">
                                    <button type="submit" class="btn btn-primary">Оновити</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('admin.city-tariffs.destroy', $cityTariff) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Видалити ?')">Видалити</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p>Поки пусто</p>
                @endif

            </tbody>
        </table>

    </div>

</x-admin-layout>
