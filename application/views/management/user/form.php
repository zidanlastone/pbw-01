<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data user</h1>
</div>

<div>
  <h3 class="h4">Membuat Data User Baru</h3>
  <?= form_open(($mode == 'edit' || $mode == 'show') && isset($item) ? 'management/user/update/' . $item->id : 'management/user/store', 'class=""my-3"') ?>
  <div class="form-group mb-3">
    <input class="form-control" placeholder="Masukan Nama" type="text" name="name"
      value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->name : '' ?>">
  </div>
  <div class="form-group mb-3">
    <input class="form-control" placeholder="Masukan username" type="text" name="username"
      value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->username : '' ?>">
  </div>
  <div class="form-group mb-3">
    <input class="form-control" placeholder="Masukan email" type="email" name="email"
      value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->email : '' ?>">
  </div>
  <div class="form-group mb-3">
    <input class="form-control" placeholder="Masukan password" type="password" name="password"
      value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->password : '' ?>">
  </div>
  <div class="form-group mb-3">
    <input class="form-control" placeholder="Konfirmasi password" type="password" name="password_confirmation"
      value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->password : '' ?>">
  </div>
  <button class="btn btn-secondary form-control" type="submit">Submit</button>
  </form>
</div>