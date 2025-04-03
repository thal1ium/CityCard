@section('title', 'Поповнити гаманець')

<x-layout>
    <div class="container mt-5">
        <h2 class="mb-4">Баланс на рахунку: {{ $balance }}</h2>
        <div class="card p-4 shadow">
            <h2 class="text-center">Поповнення балансу</h2>
            <form action="{{ route('user.wallet.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="cardName" class="form-label">Ім'я власника</label>
                    <input type="text" class="form-control" name="name" id="cardName" placeholder="Ім'я" required>
                </div>
                <div class="mb-3">
                    <label for="cardNumber" class="form-label">Номер карточки</label>
                    <input type="text" class="form-control" name="card-number" id="cardNumber" placeholder="•••• •••• •••• ••••"
                        required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="expiryDate" class="form-label">Термін придатності картки</label>
                        <input type="text" class="form-control" name="expiry-date" id="expiryDate" placeholder="MM/YY" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cvv" class="form-label">CVV</label>
                        <input type="text" class="form-control" name="cvv" id="cvv" placeholder="***" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="sum" class="form-label">Сума</label>
                    <input type="number" min="1" class="form-control" id="sum" name="sum"
                        placeholder="0" required>
                </div>
                <button type="submit" onclick="return confirm('Виконати транзакію ?')"
                    class="btn btn-primary w-100">Submit Payment</button>
            </form>
        </div>
    </div>
</x-layout>
