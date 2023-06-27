<div>
  <h3>Membuat Artikel Baru</h3>
  <?= form_open($mode == 'edit' && isset($item) ? 'post/update/' . $item->id : 'post/store', 'class=""my-3"') ?>
  <div class="form-group mb-3">
    <label for="title">Judul Postingan</label>
    <input class="form-control" placeholder="Masukan Judul" type="text" name="title"
      value="<?= $mode == 'edit' && isset($item) ? $item->title : '' ?>">
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="category">Kategori</label>
        <select class="form-control" name="category" id="">
          <?php foreach ($categories as $key => $category): ?>
            <option value="<?= $category->id ?>" <?= $mode == 'edit' && isset($item) && $item->category == $category->id ? "selected" : "" ?>>
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
          value="<?= $mode == 'edit' && isset($item) ? $item->publication_date : date('Y-m-d') ?>">
      </div>
    </div>
  </div>

  <div class="form-group mb-3">
    <label for="tags">Tags</label>
    <input class="form-control" placeholder="Masukan Tags" type="text" name="tags"
      value="<?= $mode == 'edit' && isset($item) ? $item->tags : '' ?>">
  </div>

  <div class="form-group mb-3">
    <label for="content-editor">Konten</label>
    <div class="rounded" id="content-editor" style="min-height:20vh">
      <?= $mode == 'edit' && isset($item) ? $item->content : '' ?>
    </div>
    <input class="form-control d-none" name="content" id="content-input" cols="30" rows="3" />
  </div>

  <button class="btn btn-secondary form-control" type="submit">Submit</button>
  </form>
</div>