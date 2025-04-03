@section('title', 'Мої транзакції')

<x-layout>
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Сума</th>
                <th scope="col">Транзакція</th>
                <th scope="col">Час</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <th scope="row">{{ $transaction->id }}</th>
                    <td>
                        <p>{{ $transaction->amount }}</p>
                    </td>
                    <td>
                        <p>{{ $transaction->transaction_type }}</p>
                    </td>
                    <td>
                        <p>{{ $transaction->time }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
