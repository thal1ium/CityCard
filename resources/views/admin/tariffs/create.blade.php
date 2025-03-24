@section('title', 'Додати місто')


<x-admin-layout>
    <form action="{{ route('admin.tariffs.store') }}" method="POST" class="mt-5">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Добавити тариф:</label>
            <input type="text" name="type" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Добавити тариф?')">Додати</button>
    </form>
</x-admin-layout>
