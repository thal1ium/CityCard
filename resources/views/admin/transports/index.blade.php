@section('title', 'Весь транспорт')

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
            @foreach ($transports as $transport)
                <tr>
                    <th scope="row">{{ $transport->id }}</th>
                    <td>
                        <form action="{{ route('admin.transports.update', $transport->id) }}" method="POST" class="d-flex gap-2 w-100">
                            @csrf
                            @method('PUT')
                            <input type="text" name="type" class="form-control" value="{{ $transport->type }}">
                            <button type="submit" class="btn btn-primary">Оновити</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.transports.destroy', $transport->id) }}" method="POST">
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
