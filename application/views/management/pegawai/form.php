<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Pegawai</h1>
</div>
<section class="col-md-8 col-sm-12 mb-5">
  <div id="login-tab" class="d-block">
    <?= form_open(($mode == 'edit' || $mode == 'show') && isset($item) ? 'management/pegawai/update/' . $item->id : 'management/pegawai/store', 'class=""my-3"') ?>

    <div class="form-group mb-3">
      <select class="form-control" name="user_id" aria-placeholder="Pilih tipe kategori"
        placeholder="Pilih tipe kategori">
        <?php foreach ($list_user as $key => $user): ?>
          <option value="article" <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->user_id == $user->id ? "selected" : "" ?>>
            <?= $user->name ?> - <?= $user->email ?>
          </option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="form-group mb-3">
      <input class="form-control" placeholder="Masukan Nama Pegawai" type="text" name="nama"
        value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->nama : '' ?>">
    </div>

    <div class="form-group mb-3">
      <input class="form-control" placeholder="Masukan Email Pegawai" type="email" name="email"
        value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->email : '' ?>">
    </div>

    <div class="form-group mb-3">
      <input class="form-control" placeholder="Masukan No HP Pegawai" type="phone" name="no_hp"
        value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->no_hp : '' ?>">
    </div>

    <div class="form-group mb-3">
      <textarea class="form-control" placeholder="Masukan Alamat Pegawai" type="text"
        name="alamat"><?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->alamat ? $item->alamat : '' ?></textarea>
    </div>

    <div class="form-group mb-3">
      <input class="form-control" placeholder="Masukan Tempat Lahir" type="text" name="tempat_lahir"
        value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->tempat_lahir : '' ?>">
    </div>

    <div class="form-group mb-3">
      <input class="form-control" placeholder="Masukan Tanggal Lahir" type="date" name="tanggal_lahir"
        value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->tanggal_lahir : '' ?>">
    </div>

    <div class="form-group mb-3">
      <label for="">Jenis Kelamin</label>
      <div class="d-flex gap-2">
        <div class="form-check">
          <label for="jk-l">Laki-Laki</label>
          <input id="jk-l" class="form-check-input" type="radio" name="jenis_kelamin" value="L" <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->jenis_kelamin == "L" ? 'checked' : '' ?>>
        </div>
        <div class="form-check">
          <label for="jk-p">Perempuan</label>
          <input id="jk-p" class="form-check-input" type="radio" name="jenis_kelamin" value="P" <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->jenis_kelamin == "P" ? 'checked' : '' ?>>
        </div>
      </div>
    </div>

    <div class="form-group mb-3">
      <label for="">Status Pernikahan</label>
      <div class="d-flex gap-2">
        <div class="form-check">
          <label for="sn-1">Belum Menikah</label>
          <input id="sn-1" class="form-check-input" type="radio" name="status_pernikahan" value="0" <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->status_pernikahan == "0" ? 'checked' : '' ?>>
        </div>
        <div class="form-check">
          <label for="sn-2">Perempuan</label>
          <input id="sn-2" class="form-check-input" type="radio" name="status_pernikahan" value="1" <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->status_pernikahan == "1" ? 'checked' : '' ?>>
        </div>
      </div>
    </div>

    <div class="form-group mb-3">
      <input class="form-control" placeholder="Masukan Tanggal Gabung" type="date" name="tanggal_gabung"
        value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->tanggal_gabung : '' ?>">
    </div>
    <div class="form-group mb-3">
      <input class="form-control" placeholder="Masukan Divisi" type="text" name="divisi"
        value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->divisi : '' ?>">
    </div>
    <div class="form-group mb-3">
      <input class="form-control" placeholder="Masukan Jabatan" type="text" name="jabatan"
        value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->jabatan : '' ?>">
    </div>

    <div class="form-group mb-3">
      <input class="form-control" placeholder="Masukan Gaji Pegawai" type="text" name="gaji"
        value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->gaji : '' ?>">
    </div>


    <div class="form-group mb-3">
      <label for="">Status Bekerja</label>
      <div class="d-flex gap-2">
        <div class="form-check mb-3">
          <label for="sb-kry">KARYAWAN</label>
          <input id="sb-kry" class="form-check-input" placeholder="Pilih Status Bekerja" type="radio"
            name="status_bekerja" value="KARYAWAN" <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->status_bekerja == "KARYAWAN" ? 'checked' : '' ?>>
        </div>
        <div class="form-check mb-3">
          <label for="sb-ktk">KONTRAK</label>
          <input id="sb-ktk" class="form-check-input" placeholder="Pilih Status Bekerja" type="radio"
            name="status_bekerja" value="KONTRAK" <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->status_bekerja == "KONTRAK" ? 'checked' : '' ?>>
        </div>
        <div class="form-check mb-3">
          <label for="sb-brh">BERHENTI</label>
          <input id="sb-brh" class="form-check-input" placeholder="Pilih Status Bekerja" type="radio"
            name="status_bekerja" value="BERHENTI" <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->status_bekerja == "BERHENTI" ? 'checked' : '' ?>>
        </div>
      </div>
    </div>

    <button class="btn btn-secondary form-control" type="submit">Submit</button>
    </form>
  </div>

</section>