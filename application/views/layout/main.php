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

  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/quilljs-markdown@latest/dist/quilljs-markdown-common-style.css" />
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

    <?= $navbar ?>

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
              <li class="list-group-item">📚 Artikel</li>
              <li class="list-group-item">🪶 History</li>
              <li class="list-group-item">👍 Disukai</li>
              <li class="list-group-item">📖 Komentar</li>
              <li class="list-group-item">
                <a href="<?= base_url('user/profile') ?>" class="text-decoration-none text-secondary">⚙️ Profile</a>
              </li>
            </ul>
          </div>

          <div class="border-bottom mb-2">
            <h4>Kategori</h4>
            <?php foreach ($categories as $key => $item): ?>
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
            <?php for ($i = 0; $i <= 5; $i++): ?>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="" class="link-secondary text-decoration-none">Lorem, ipsum dolor.
                  </a></li>
              </ul>
            <?php endfor ?>
          </div>
        </nav>

        <section class="col-md-9 col-sm-12" style="max-height: 90vh; overflow-y: scroll; scrollbar-width: none;">
          <?= $content ?>
        </section>
      </div>
    </div>

  </main>



  <script defer src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/quilljs-markdown@latest/dist/quilljs-markdown.js"></script>
  <script defer src="https://unpkg.com/turndown/dist/turndown.js"></script>

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

      var turndownService = new TurndownService({ option: 'value' })

      <?php if ($view == 'post/form'): ?>
        let postQuill = new Quill('#content-editor', { theme: 'snow' });
        const postQuillMarkdown = new QuillMarkdown(postQuill, {})
        let postInput = document.getElementById('content-input');
        postQuill.on('text-change', function () {
          postInput.value = turndownService.turndown(postQuill.container.firstChild.innerHTML);
        })
      <?php endif ?>

      <?php if ($view == 'post/show'): ?>
        // editor
        let commentQuill = new Quill('#comment-editor', { theme: 'snow' });
        const commentQuillMarkdown = new QuillMarkdown(commentQuill, {})
        let commentInput = document.getElementById('comment-input');

        commentQuill.on('text-change', function () {
          commentInput.value = turndownService.turndown(commentQuill.container.firstChild.innerHTML);
        })
      <?php endif ?>
    }

    if (document.readyState == "loading")
      document.addEventListener('DOMContentLoaded', loadOffcanvasNav)
  </script>
</body>

</html>