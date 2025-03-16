import axios from "axios";

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const citySelect = document.querySelector("#city");

if (citySelect) {
  citySelect.addEventListener("change", (e) => {
    getTariffsByCity(e.target.value);
  });
}

function getTariffsByCity(id) {
  const tariffSelect = document.querySelector("#tariff");

  if (id) {
    axios.get(`/data/tariffs/${id}`).then((response) => {
      tariffSelect.innerHTML = '<option value="">Оберіть тариф</option>';

      response.data.forEach(function (tariff) {
        tariffSelect.innerHTML += `<option value="${tariff.id}">${tariff.type} | Ціна: ${tariff.price}</option>`;
      });
    });
  } else {
    tariffSelect.innerHTML = '<option value="">Оберіть тариф</option>';
  }
}
