@section('title', "My cards")

<x-layout>

  {{-- <i class="fa-solid fa-bus"></i>
  <i class="fa-solid fa-train-tram"></i> --}}
  <h1 class="h1">Мої картки:</h1>

  <div class="container mt-4">
    <ul class="list list-group list-group-flush">
      <x-card-item type="Стандартна" number="1234-4321-90" phone="+380636413475" city="Kiev" balance="300" ></x-card-item>
      <x-card-item type="Службова" number="0000-0000-00" phone="+380636413475" city="Lutsk" balance="0" ></x-card-item>
      <x-card-item type="Службова" number="0000-0000-00" phone="+380636413475" city="Lutsk" balance="0" ></x-card-item>
      <x-card-item type="Службова" number="0000-0000-00" phone="+380636413475" city="Lutsk" balance="0" ></x-card-item>
    </ul>
  </div>
</x-layout>
