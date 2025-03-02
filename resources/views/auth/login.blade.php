@section('title', 'Login')

<x-layout>
  <section class="auth-section">
    <div class="d-flex flex-column gap-3 align-items-center container py-5">
      <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid"
            alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form id='user-form'>
            <!-- Email input -->
            <h1 class="h1 text-center">Увійти</h1>
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="email" id="form1Example13" class="form-control form-control-lg" />
              <label class="form-label" for="form1Example13">Номер телефону</label>
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="password" id="form1Example23" class="form-control form-control-lg" />
              <label class="form-label" for="form1Example23">Пароль</label>
            </div>

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init
              class="btn btn-primary btn-lg btn-block">Увійти</button>
          </form >
          <form id='admin-form' class="hide-form">
            <!-- Email input -->
            <h1 class="h1 text-center">Увійти для адміна</h1>
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="email" id="form1Example13" class="form-control form-control-lg" />
              <label class="form-label" for="form1Example13">Логін</label>
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="password" id="form1Example23" class="form-control form-control-lg" />
              <label class="form-label" for="form1Example23">Пароль</label>
            </div>

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init
              class="btn btn-primary btn-lg btn-block">Увійти</button>
          </form>
        </div>
      </div>
      <button type="button" class="btn btn-outline-primary" id="toggle-form-button" style="max-width: 300px">Я адмін</button>
    </div>
  </section>
</x-layout>
