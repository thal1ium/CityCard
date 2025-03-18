@section('title', 'Всі міста')

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
            @foreach ($cities as $city)
                <tr>
                    <th scope="row">{{ $city->id }}</th>
                    <td>
                        <form action="{{ route('admin.cities.update', $city->id) }}" method="POST" class="d-flex gap-2 w-100">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" class="form-control" value="{{ $city->name }}">
                            <button type="submit" class="btn btn-primary">Оновити</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.cities.destroy', $city->id) }}" method="POST">
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
