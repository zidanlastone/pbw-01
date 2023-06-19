<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Forum</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>" defer></script>
</head>

<body>

  <main>

    <div class="offcanvas offcanvas-start" style="max-width: 80vw;" tabindex="-1" id="offcanvasMenu"
      aria-labelledby="offcanvasMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasMenuLabel">Simple Forum</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div id="offcanvas-nav">
          Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists,
          etc.
        </div>
        <div class="dropdown mt-3">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            Dropdown button
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div>
      </div>
    </div>

    <header class="p-3 mb-3 border-bottom">
      <nav class="container-md">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

          <div class="d-flex me-auto">
            <a href="#" class="text-decoration-none link-body-emphasis mx-2">
              <span class="fs-4">Simple Forum</span>
            </a>
            <a class="btn btn-light me-auto d-sm-block d-md-none" data-bs-toggle="offcanvas" href="#offcanvasMenu"
              role="button" aria-controls="offcanvasMenu">
              O
            </a>
          </div>

          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
          </form>

          <button id="view-mode" class="btn btn-dark">☀️</button>

          <a href="" class="btn btn-outline-secondary mx-1">Join</a>

          <!-- account bar -->
          <div class="dropdown text-end d-none">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
              data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small">
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
          </div>

        </div>
      </nav>
    </header>

    <div class="container">
      <div class="row justify-content-center" style="height:80vh">
        <div class="col-md-4 col-sm-10 align-self-center">

          <div class="card border-end-0 border-top-0 border-start-0 shadow-sm">
            <div class="card-body my-5 mx-4">

              <h3 class="text-center">Selamat datang di <br> Simple Forum</h3>
              <p class="text-center mb-4">Disini kita berbagi informasi terbaru dan saling berdiskusi sehat</p>

              <div class="tab-content">
                <div id="login-tab" class="d-block">
                  <?= form_open('auth/login', 'class="my-3"') ?>
                    <div class="form-group mb-3">
                      <input class="form-control" placeholder="Masukan email/nama pengguna" type="text" name="username">
                    </div>

                    <div class="form-group mb-3">
                      <input class="form-control" placeholder="Masukan kata sandi" type="password" name="password">
                    </div>

                    <button class="btn btn-secondary form-control">Lanjutkan</button>
                  </form>
                </div>
                <div id="register-tab" class="d-none">
                  <?= form_open('auth/register', 'class="my-3"') ?>

                  <div class="form-group mb-3">
                    <input class="form-control" placeholder="Masukan email" type="text" name="email">
                  </div>

                  <div class="form-group mb-3">
                    <input class="form-control" placeholder="Masukan nama pengguna" type="text" name="username">
                  </div>

                  <div class="form-group mb-3">
                    <input class="form-control" placeholder="Nama lengkap / panggilan" type="text" name="name">
                  </div>

                  <div class="form-group mb-3">
                    <input class="form-control" placeholder="Masukan kata sandi" type="password" name="password">
                  </div>

                  <div class="form-group mb-3">
                    <input class="form-control" placeholder="Konfirmasi kata sandi" type="password"
                      name="password_confirmation">
                  </div>

                  <button class="btn btn-secondary form-control">Daftar Akun</button>
                  </form>
                </div>
              </div>

              <div class="nav" id="myTab">
                <button class="nav-link d-none" id="register-tab-button" type="button">Sudah
                  Punya Akun? Silahkan Login</button>
                <button class="nav-link d-block" id="login-tab-button" type="button">Belum Punya Akun? Mandaftar
                  disini</button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function () {

      document.getElementById('login-tab-button').addEventListener('click', function () {
        document.getElementById('login-tab').classList.replace('d-block', 'd-none')
        document.getElementById('register-tab').classList.replace('d-none', 'd-block')
        document.getElementById('register-tab-button').classList.replace('d-none', 'd-block')
        document.getElementById('login-tab-button').classList.replace('d-block', 'd-none')
      })

      document.getElementById('register-tab-button').addEventListener('click', function () {
        document.getElementById('register-tab').classList.replace('d-block', 'd-none')
        document.getElementById('login-tab').classList.replace('d-none', 'd-block')
        document.getElementById('register-tab-button').classList.replace('d-block', 'd-none')
        document.getElementById('login-tab-button').classList.replace('d-none', 'd-block')
      })
    })

    // dark mode support
    let darkMode = true
    document.getElementById('view-mode').addEventListener('click', function () {
      document.documentElement.setAttribute('data-bs-theme', darkMode ? 'dark' : 'light');
      document.getElementById('view-mode').innerHTML = darkMode ? '☀️' : '🌙'
      darkMode = !darkMode;
    })






  </script>

</body>

</html>