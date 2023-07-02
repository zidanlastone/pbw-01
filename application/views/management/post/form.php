<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Postingan</h1>
</div>

<div class="col-md-8 col-sm-12 mb-5">
  <h3 class="h4">Membuat Postingan Baru</h3>
  <?= form_open(($mode == 'edit' || $mode == 'show') && isset($item) ? 'management/post/update/' . $item->id : 'management/post/store', 'class=""my-3"') ?>
  <div class="form-group mb-3">
    <label for="title">Judul Postingan</label>
    <input class="form-control" placeholder="Masukan Judul" type="text" name="title"
      value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->title : '' ?>" <?= $mode == 'show' ? 'disabled' : '' ?>>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="category">Kategori</label>
        <select class="form-control" name="category" id="">
          <?php foreach ($list_category as $key => $category): ?>
            <option value="<?= $category->id ?>" <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->category == $category->id ? "selected" : "" ?>>
              <?= $category->category ?>
            </option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="">Tanggal Publikasi</label>
        <input class="form-control" placeholder="Masukan Tanggal Publikasi" type="datetime-local"
          name="publication_date"
          value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->publication_date : date('Y-m-d') ?>"
          <?= $mode == 'show' ? 'disabled' : '' ?>>
      </div>
    </div>
  </div>

  <div class="form-group mb-3">
    <label for="tags">Tags</label>
    <input class="form-control" placeholder="Masukan Tags" type="text" name="tags"
      value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->tags : '' ?>" <?= $mode == 'show' ? 'disabled' : '' ?>>
  </div>

  <div class="form-group mb-3">
    <label for="content-editor">Konten</label>
    <div class="rounded" id="content-editor" style="min-height:20vh" <?= $mode == 'show' ? 'disabled' : '' ?>>
      <?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->content : '' ?>
    </div>
    <input class="form-control d-none" name="content" id="content-input" cols="30" rows="3" />
  </div>

  <button class="btn btn-secondary form-control" type="submit">Submit</button>
  </form>
</div>


<script defer src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/quilljs-markdown@latest/dist/quilljs-markdown.js"></script>
<script defer src="https://unpkg.com/turndown/dist/turndown.js"></script>