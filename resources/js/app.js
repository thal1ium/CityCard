import axios from "axios";

axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
axios.defaults.headers.common["X-CSRF-TOKEN"] = document
  .querySelector('meta[name="csrf-token"]')
  .getAttribute("content");

const citySelect = document.querySelector("#city");

if (citySelect) {
  citySelect.addEventListener("change", (e) => {
    console.log(e.target.value);
    getTariffsByCity(e.target.value);
  });
}

function getTariffsByCity(cityId) {
  const tariffSelect = document.querySelector("#tariff");

  if (cityId) {
    axios.get(`/data/tariffs/${cityId}`).then((response) => {
      console.log(response.data);

      tariffSelect.innerHTML = '<option value="">Оберіть тариф</option>';

      response.data.forEach(function (tariff) {
        console.log(tariff);
        tariffSelect.innerHTML += `<option value="${tariff.tariff_id}">${tariff.tariff.type} | Ціна: ${tariff.price}</option>`;
      });
    });
  } else {
    tariffSelect.innerHTML = '<option value="">Оберіть тариф</option>';
  }
}
