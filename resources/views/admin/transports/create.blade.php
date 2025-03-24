@section('title', 'Додати транспорт')


<x-admin-layout>
    <form action="{{ route('admin.transports.store') }}" method="POST" class="mt-5">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Добавити транспорт:</label>
            <input type="text" name="type" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Добавити транспорт?')">Додати</button>
    </form>
</x-admin-layout>
