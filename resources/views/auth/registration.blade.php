<x-layout>
  <section class="auth-section">
    <div class="d-flex flex-column gap-3 align-items-center container py-5">
      <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid"
            alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form id='user-form' action="{{ Route('user.register') }}" method="POST">
            @csrf
            <!-- Email input -->
            <h1 class="h1 text-center">Реєстрація</h1>
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="tel" id="phone" name="phone" class="form-control form-control-lg"
                value="{{ old('phone') }}" />
              @error('phone')
                <label class="text-danger" for="phone">Не вірний номер телефону</label>
              @else
                <label class="form-label" for="phone">Номер телефону</label>
              @enderror
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="password" id="password" name="password" class="form-control form-control-lg" />
              @error('phone')
                <label class="text-danger" for="password">Не вірний пароль</label>
              @else
                <label class="form-label" for="password">Пароль</label>
              @enderror
            </div>

            
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" />
              @error('phone')
                <label class="text-danger" for="password_confirmation">Не вірний пароль</label>
              @else
                <label class="form-label" for="password_confirmation">Підтвердіть пароль</label>
              @enderror
            </div>

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init
              class="btn btn-primary btn-lg btn-block">Реєстрація</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</x-layout>
