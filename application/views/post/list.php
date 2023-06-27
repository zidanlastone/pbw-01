<div>
  <h2>Artikel</h2>

  <a href="<?= base_url('post/create') ?>" class="btn btn-sm btn-outline-secondary my-2">+ Buat Artikel</a>

  <?php foreach ($posts as $key => $item): ?>
    <div class="card border-top-0 border-end-0 border-start-0 mb-2 shadow-sm">
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

          <?php if ($this->session->userdata('id') == $item->author): ?>
            <div class="p-3 ms-auto">
              <div class="dropstart">
                <span class="d-block text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                  aria-expanded="false"></span>
                <ul class="dropdown-menu">
                  <li class="dropdown-item text-center">
                    <a href="<?= base_url('post/edit/' . $item->id) ?>"
                      class="text-decoration-none link-secondary btn btn-sm">ubah</a>
                  </li>
                  <li class="dropdown-item text-center">
                    <?= form_open('post/delete') ?>
                    <button href="#" class="text-decoration-none link-danger w-full btn btn-sm">hapus</button>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          <?php endif ?>
        </div>

        <div class="card-cursor" data-linktarget="<?= base_url('post/read/' . $item->id) ?>">
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
            <?php foreach ($tags as $x): ?>

              <a href="<?= base_url('tags/' . $x) ?>" class="px-2 py-1 me-2 text-decoration-none border rounded">
                <span>
                  <?= '#' . $x ?>
                </span>
              </a>
            <?php endforeach ?>
          </p>
          <div class="d-flex gap-3">
            <span>UP (10) </span>
            <span>Down</span>
            <span>|</span>
            <span>Comment</span>
          </div>
        </div>

      </div>
    </div>
  <?php endforeach ?>
</div>