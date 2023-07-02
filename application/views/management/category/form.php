<section class="col-md-10 col-sm-12" style="max-height: 90vh; overflow-y: scroll; scrollbar-width: none;">
  <h2>Category</h2>
  <hr>

  <div id="login-tab" class="d-block">
    <?= form_open(($mode == 'edit' || $mode == 'show') && isset($item) ? 'management/category/update/' . $item->id : 'management/category/store', 'class=""my-3"') ?>
    <div class="form-group mb-3">
      <input class="form-control" placeholder="Masukan nama kategori" type="text" name="category"
        value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->category : '' ?>">
    </div>
    <div class="form-group mb-3">
      <select class="form-control" name="type" aria-placeholder="Pilih tipe kategori" placeholder="Pilih tipe kategori">
        <option value="article" <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->type == "article" ? "selected" : "" ?>>Artikel
        </option>
        <option value="general" <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->type == "general" ? "selected" : "" ?>>Umum
        </option>
        <option value="education" <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->type == "education" ? "selected" : "" ?>>
          Edukasi</option>
      </select>
    </div>
    <div class="form-group mb-3">
      <textarea class="form-control" placeholder="Masukan deskripsi kategori" type="text"
        name="description"><?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->description ? $item->description : '' ?></textarea>
    </div>

    <button class="btn btn-secondary form-control" type="submit">Submit</button>
    </form>
  </div>

</section>