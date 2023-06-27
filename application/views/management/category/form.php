<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Management Simple Forum | Category</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>" defer></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap"
    rel="stylesheet">

  <style>
    .disable-scrollbars::-webkit-scrollbar {
      background: transparent;
      /* Chrome/Safari/Webkit */
      width: 0px;
    }

    .disable-scrollbars {
      scrollbar-width: none;
      /* Firefox */
      -ms-overflow-style: none;
      /* IE 10+ */
    }

    #side-overlay-menu {
      width: 280px;
      position: fixed;
      height: 100vh;
      display: none;
      z-index: 100;
    }
  </style>
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

          <a href="<?= base_url('auth') ?>" class="btn btn-outline-secondary mx-1">Join</a>

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

    <div class="b-example-divider"></div>

    <div class="container-fluid">
      <div class="row h-full">

        <nav id="main-side-nav" class="col-md-2 col-sm-12 d-none d-md-block disable-scrollbars"
          style="max-height: 90vh; overflow-y: scroll;">
          <h4 class="text-primary mb-4">Management</h4>

          <div class="border-bottom mb-2 d-grid">
            <a href="#" class="text-decoration-none p-2 text-white bg-info">
              <h4 class="m-0">Dashboard</h4>
            </a>
          </div>

          <div class="border-bottom mb-2">
            <h4 class="m-0">Menu </h4>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <a href="<?= base_url('management/article') ?>" class="text-decoration-none link-secondary">Artikel</a>
              </li>
              <li class="list-group-item">
                <a href="<?= base_url('management/category') ?>"
                  class="text-decoration-none link-secondary">Kategori</a>
              </li>
              </li>
              <li class="list-group-item">
                <a href="<?= base_url('management/user') ?>" class="text-decoration-none link-secondary">Pengguna</a>
              </li>
              <li class="list-group-item">
                <a href="<?= base_url('management/comments') ?>"
                  class="text-decoration-none link-secondary">Komentar</a>
              </li>
            </ul>
          </div>
        </nav>

        <section class="col-md-10 col-sm-12" style="max-height: 90vh; overflow-y: scroll; scrollbar-width: none;">
          <h2>Category</h2>
          <hr>

          <div id="login-tab" class="d-block">
            <?= form_open($mode == 'edit' && isset($item) ? 'management/category/update/' . $item->id  : 'management/category/store', 'class=""my-3"') ?>
            <div class="form-group mb-3">
              <input class="form-control" placeholder="Masukan nama kategori" type="text" name="category" value="<?=  $mode == 'edit' && isset($item) ? $item->category : ''  ?>">
            </div>
            <div class="form-group mb-3">
              <select class="form-control" name="type" aria-placeholder="Pilih tipe kategori"
                placeholder="Pilih tipe kategori">
                <option value="article" <?= $mode == 'edit' && isset($item) && $item->type == "article" ? "selected" : "" ?>>Artikel</option>
                <option value="general" <?= $mode == 'edit' && isset($item) && $item->type == "general" ? "selected" : "" ?>>Umum</option>
                <option value="education" <?= $mode == 'edit' && isset($item) && $item->type == "education" ? "selected" : "" ?>>Edukasi</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <textarea class="form-control" placeholder="Masukan deskripsi kategori" type="text"
                name="description"><?= $mode == 'edit' && isset($item) &&  $item->category ? $item->category : ''  ?></textarea>
            </div>

            <button class="btn btn-secondary form-control" type="submit">Submit</button>
            </form>
          </div>

        </section>

      </div>
    </div>

  </main>

  <script type="text/javascript">

    // dark mode support
    let darkMode = true
    document.getElementById('view-mode').addEventListener('click', function () {
      document.documentElement.setAttribute('data-bs-theme', darkMode ? 'dark' : 'light');
      document.getElementById('view-mode').innerHTML = darkMode ? '☀️' : '🌙'
      darkMode = !darkMode;
    })

    // for reducing document load. copy the dom to menu
    function loadOffcanvasNav() {
      let copy = document.getElementById('main-side-nav').innerHTML
      document.getElementById('offcanvas-nav').innerHTML = copy;
    }

    if (document.readyState == "loading")
      document.addEventListener('DOMContentLoaded', loadOffcanvasNav)
  </script>
</body>

</html>