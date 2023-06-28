<div>
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
          <a href="<?= base_url() ?>" class="text-decoration-none link-body-emphasis mx-2">
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
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false">
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
</div>