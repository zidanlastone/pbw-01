<div>
  <h2>Artikel</h2>
  <?php if (isset($post)): ?>
    <div class="card border-top-0 border-end-0 border-start-0 mb-2 shadow-sm">
      <div class="card-body">

        <div class="d-flex flex-row">
          <div class="mt-3">
            <p class="lh-1">
              <span class="fs-7">
                <?= $post->author->name ?>
              </span><br>
              <span class="fs-9">
                <?= date($post->publication_date) ?>
              </span>
            </p>
          </div>

          <?php if ($this->session->userdata('id') == $post->author->id): ?>
            <div class="p-3 ms-auto">
              <div class="dropstart">
                <span class="d-block text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                  aria-expanded="false"></span>
                <ul class="dropdown-menu">
                  <li class="dropdown-item text-center">
                    <a href="<?= base_url('post/edit/' . $post->id) ?>"
                      class="text-decoration-none link-secondary btn btn-sm">ubah</a>
                  </li>
                  <li class="dropdown-item text-center">
                    <?= form_open('post/delete/' . $post->id) ?>
                    <button href="#" class="text-decoration-none link-danger w-full btn btn-sm">hapus</button>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          <?php endif ?>
        </div>

        <h3>
          <?= $post->title ?>
        </h3>
        <p>
          <?= $post->content ?>
        </p>

        <!-- TODO read tags -->
        <p>
          <span>#bootstrap</span>
          <span>#bootstrap</span>
          <span>#bootstrap</span>
          <span>#bootstrap</span>
        </p>

        <div class="d-flex gap-3">
          <span>UP (10) </span>
          <span>Down</span>
          <span>|</span>
        </div>

        <hr>

        <!-- Todo read comments -->
        <form action="" method="post">
          <div id="comment-editor"></div>
          <input class="form-control d-none" name="comment" id="comment-input" cols="30" rows="3" />
          <button class="btn btn-secondary my-2" type="submit">Submit</button>
        </form>

      </div>
    </div>
  <?php endif ?>
</div>