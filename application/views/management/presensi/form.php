<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Kategori</h1>
</div>
<section class="col-md-10 col-sm-12">
  <h4>Kategory</h4>
  <hr>

  <div id="login-tab" class="d-block">
    <?= form_open(($mode == 'edit' || $mode == 'show') && isset($item) ? 'management/presensi/update/' . $item->id : 'management/presensi/store', 'class=""my-3"') ?>

    <div class="form-group mb-3">
      <select class="form-control" name="pegawai_id" aria-placeholder="Pilih tipe kategori"
        placeholder="Pilih tipe kategori">
        <?php foreach ($list_pegawai as $key => $pegawai): ?>
          <option value="<?= $pegawai->id ?>" <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->pegawai_id == $pegawai->id ? "selected" : "" ?>>
            <?= $pegawai->nama ?> - <?= $pegawai->status_bekerja ?>
          </option>
        <?php endforeach ?>
      </select>
    </div>

    <!-- "MASUK|PULANG|MASUKLEMBUR|PULANGLEMBUR" -->

    <div class="form-group mb-3">
      <label for="">Status Presensi</label>
      <div class="d-flex gap-2">
        <div class="form-check">
          <label for="jk-l">MASUK</label>
          <input id="jk-l" class="form-check-input" type="radio" name="status_presensi" value="MASUK" <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->jenis_kelamin == "MASUK" ? 'checked' : '' ?>>
        </div>
        <div class="form-check">
          <label for="jk-ml">MASUKLEMBUR</label>
          <input id="jk-ml" class="form-check-input" type="radio" name="status_presensi" value="MASUKLEMBUR"
            <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->jenis_kelamin == "MASUK" ? 'checked' : '' ?>>
        </div>
        <div class="form-check">
          <label for="jk-p">PULANG</label>
          <input id="jk-p" class="form-check-input" type="radio" name="status_presensi" value="PULANG" <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->jenis_kelamin == "PULANG" ? 'checked' : '' ?>>
        </div>
        <div class="form-check">
          <label for="jk-pl">PULANGLEMBUR</label>
          <input id="jk-pl" class="form-check-input" type="radio" name="status_presensi" value="PULANGLEMBUR"
            <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->jenis_kelamin == "PULANGLEMBUR" ? 'checked' : '' ?>>
        </div>
      </div>
    </div>

    <div class="form-group mb-3">
      <input class="form-control" placeholder="Masukan Tanggal" type="date" name="tanggal"
        value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->tanggal : '' ?>">
    </div>

    <div class="form-group mb-3">
      <input class="form-control" placeholder="Masukan Waktu" type="time" name="jam"
        value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->jam : '' ?>">
    </div>

    <div class="form-group mb-3">
      <input class="form-control" placeholder="Keterangan Bukti Hadir" type="text" name="bukti"
        value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->jam : '' ?>">
    </div>

    <button class="btn btn-secondary form-control" type="submit">Submit</button>
    </form>
  </div>

</section>