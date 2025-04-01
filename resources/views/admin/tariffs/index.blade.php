@section('title', 'Всі тарифи')

<x-admin-layout>
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Назва</th>
                <th scope="col">Видалити</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tariffs as $tariff)
                <tr>
                    <th scope="row">{{ $tariff->id }}</th>
                    <td>
                        <form action="{{ route('admin.tariffs.update', $tariff) }}" method="POST" class="d-flex gap-2 w-100">
                            @csrf
                            @method('PUT')
                            <input type="text" name="type" class="form-control" value="{{ $tariff->type }}">
                            <button type="submit" class="btn btn-primary">Оновити</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.tariffs.destroy', $tariff) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Видалити це місто?')">Видалити</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>
