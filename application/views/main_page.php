<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Forum</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>" defer></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300&display=swap"
    rel="stylesheet">

  <style>
    body {
      /* font-family: 'Roboto', sans-serif !important;  */
    }

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

    <div class="container">
      <div class="row h-full">

        <nav id="main-side-nav" class="col-md-3 col-sm-12 d-none d-md-block disable-scrollbars"
          style="max-height: 90vh; overflow-y: scroll;">
          <h4 class="text-primary">Content</h4>

          <div class="border-bottom mb-2 d-grid">
            <a href="#" class="text-decoration-none p-2 text-white bg-info">
              <h4 class="m-0">Hot</h4>
            </a>
            <a href="#" class="text-decoration-none p-2 text-info">
              <h4 class="m-0">Fresh</h4>
            </a>
          </div>

          <div class="border-bottom mb-2">
            <h4 class="m-0">Aktivitas</h4>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Artikel</li>
              <li class="list-group-item">History</li>
              <li class="list-group-item">Disukai</li>
              <li class="list-group-item">Komentar</li>
            </ul>
          </div>

          <div class="border-bottom mb-2">
            <h4>Kategori</h4>
            <?php foreach($categories as $key => $item):?>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <a href="<?= base_url('post?category=' . $item->id) ?>" class="link-secondary text-decoration-none">
                  <?= $item->category ?>
                </a>
              </li>
            </ul>
            <?php endforeach ?>
          </div>

          <div class="border-bottom mb-2">
            <h4>Informasi</h4>
            <?php for($i=0; $i <=5; $i++):?>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><a href="" class="link-secondary text-decoration-none">Lorem, ipsum dolor.
                </a></li>
            </ul>
            <?php endfor ?>
          </div>
        </nav>

        <section class="col-md-9 col-sm-12" style="max-height: 90vh; overflow-y: scroll; scrollbar-width: none;">
          <h2>Artikel</h2>
          <?php foreach($posts as $key => $item):?>
          <div class="card border-top-0 border-end-0 border-start-0 mb-2 shadow-sm card-cursor"
            data-linktarget="<?=  base_url('post/read/'.$item->id) ?>">
            <div class="card-body">

              <div class="d-flex flex-row">
                <div class="mt-3">
                  <p class="lh-1">
                    <span class="fs-7">
                      <?= $item->name ?>
                    </span><br>
                    <span class="fs-9">
                      <?= date($item->publication_date) ?>
                    </span>
                  </p>
                </div>

                <div class="p-3 ms-auto">
                  <div class="dropstart">
                    <span class="d-block text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                      aria-expanded="false"></span>
                    <ul class="dropdown-menu text-small">
                      <li class="dropdown-item text-center"><a href="#"
                          class="text-decoration-none link-secondary">ubah</a></li>
                      <li class="dropdown-item text-center"><a href="#"
                          class="text-decoration-none link-danger w-full">hapus</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <h3>
                <?= $item->title ?>
              </h3>
              <h4>
                Kategori:
                <?= $item->category ?>
              </h4>
              <p>
                <?= $this->markdown->transform(substr_replace($item->content, '...', 200)) ?>
              </p>
              <p>
                <?php $tags = explode(',', $item->tags); ?>
                <?php foreach($tags as $x):?>
                <span>
                  <?= $x ?>
                </span>
                <?php endforeach?>
              </p>

              <div class="d-flex gap-3">
                <span>UP (10) </span>
                <span>Down</span>
                <span>|</span>
                <span>Comment</span>
              </div>
            </div>
          </div>
          <?php endforeach ?>
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

      let cards = document.getElementsByClassName('card-cursor')
      Array.from(cards).forEach(element => {
        element.style.cursor = element.dataset.linktarget
        element.addEventListener('click', function () {
          window.location = element.dataset.linktarget
        })
      });
    }

    if (document.readyState == "loading")
      document.addEventListener('DOMContentLoaded', loadOffcanvasNav)
  </script>
</body>

</html>