@section('title', 'Мої картки')

<x-layout>  
    <h1 class="h1 mb-3">Мої картки:</h1>
    <ul class="list list-group list-group-flush">
        @foreach ($cards as $card)
            <x-card-item 
                :number="$card->number" 
                :phone="$card->user->phone" :city="$card->cityTariff->city->name" :type="$card->cityTariff->tariff->type"
                :balance="$card->balance"></x-card-item>
        @endforeach
    </ul>
</x-layout>
