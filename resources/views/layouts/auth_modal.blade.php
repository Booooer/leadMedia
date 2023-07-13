<div class="modal fade" id="regModal" tabindex="-1" aria-labelledby="regModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form class="modal-content" action="/reg" method="post">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Никнейм" id="validationCustom01" aria-label="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Пароль не менее 8 символов" id="validationCustom02" aria-label="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Повторите пароль" id="validationCustom03" aria-label="Username" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
          <button type="submit" id="reg-btn" class="btn btn-primary" disabled>Зарегистрироваться</button>
        </div>
      </form>
    </div>
  </div>
  <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form class="modal-content" action="/auth" method="post">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Авторизация</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Никнейм" aria-label="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" id="auth-pass" placeholder="Пароль не менее 8 символов" aria-label="Username" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
          <button type="submit" id="auth-btn" class="btn btn-primary" disabled>Войти</button>
        </div>
      </form>
    </div>
  </div>
  @guest
  <div class="auth-button d-flex m-2">
      <button type="button" class="btn btn-dark m-2" data-bs-toggle="modal" data-bs-target="#regModal">Регистрация</button>
      <button type="button" class="btn btn-dark m-2" data-bs-toggle="modal" data-bs-target="#authModal">Авторизация</button>
  </div>
  @endguest
  @auth
  <div class="auth-button d-flex m-2">
      <a href={{ route('profile') }}><button type="button" class="btn btn-dark m-2">В профиль</button></a>
  </div>
  @endauth
