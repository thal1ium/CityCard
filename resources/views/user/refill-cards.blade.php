@section('title', content: 'Поповнити картку')

<x-layout>
    <h2 class="mb-4">Баланс на рахунку: {{ $balance }}</h2>
    <form action="{{ route('user.wallet.refill') }}" method="POST">
        @csrf

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <h5>Вибери карту</h5>
                    <div style="max-height: 300px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
                        @if (isset($cards))
                            @foreach ($cards as $card)
                                <div class="form-check d-flex gap-3 align-items-center">
                                    <input class="form-check-input" type="radio" name="selected_card"
                                        id="{{ $card->id }}" value="{{ $card->id }}">
                                    <label class="form-check-label w-100" for="{{ $card->id }}">
                                        <x-card-item :number="$card->number" :phone="$card->user->phone" :city="$card->cityTariff->city->name"
                                            :type="$card->cityTariff->tariff->type" :balance="$card->balance" />
                                    </label>
                                </div>
                            @endforeach
                        @else
                            <p>Немає карт</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <h5>Поповнення карти</h5>

                    <div class="mb-3">
                        <label for="refillAmount" class="form-label">Введіть суму поповнення:</label>
                        <input type="number" class="form-control" id="refillAmount" name="refill_amount" min="1"
                            placeholder="Введіть суму" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100"
                        {{ !isset($cards) ? 'disabled' : '' }}>Поповнення рахунку</button>
                </div>
            </div>
        </div>
    </form>
</x-layout>
