<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stali</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>" defer></script>
</head>

<body>

  <main>
    <?= $navbar ?>

    <div class="container">
      <div class="row justify-content-center" style="height:80vh">
        <div class="col-md-4 col-sm-10 align-self-center">

          <div class="card border-end-0 border-top-0 border-start-0 shadow-sm">
            <div class="card-body my-5 mx-4">

              <h3 class="text-center">Selamat datang di <br> Stali</h3>
              <p class="text-center mb-4">Sistem Informasi Manajemen Tagihan Listrik</p>

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