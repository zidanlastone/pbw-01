<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Gaji</h1>
</div>
<section class="col-md-10 col-sm-12">
  <h4>Gaji Pegawai</h4>
  <hr>

  <div id="login-tab" class="d-block">
    <?= form_open(($mode == 'edit' || $mode == 'show') && isset($item) ? 'management/gaji/update/' . $item->id : 'management/gaji/store', 'class=""my-3"') ?>

    <div class="form-group mb-3">
      <label for="bulan">Harap Pilih Bulan Tagihan</label>
      <select id="select-bulan" name="bulan" class="form-control" <?= $mode == 'show' ? 'disabled' : '' ?>>
        <option>Pilih Bulan</option>
        <option value="1" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan == 1 ? 'selected' : '' ?>>Januari
        </option>
        <option value="2" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan == 2 ? 'selected' : '' ?>>Februari
        </option>
        <option value="3" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan == 3 ? 'selected' : '' ?>>Maret
        </option>
        <option value="4" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan == 4 ? 'selected' : '' ?>>April
        </option>
        <option value="5" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan == 5 ? 'selected' : '' ?>>Mei
        </option>
        <option value="6" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan == 6 ? 'selected' : '' ?>>Juni
        </option>
        <option value="7" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan == 7 ? 'selected' : '' ?>>Juli
        </option>
        <option value="8" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan == 8 ? 'selected' : '' ?>>Agustus
        </option>
        <option value="9" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan == 9 ? 'selected' : '' ?>>September
        </option>
        <option value="10" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan == 10 ? 'selected' : '' ?>>Oktober
        </option>
        <option value="11" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan == 11 ? 'selected' : '' ?>>November
        </option>
        <option value="12" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan == 12 ? 'selected' : '' ?>>Desember
        </option>
      </select>
    </div>

    <div class="form-group mb-3">
      <label for="select-pegawai">Pilih Pegawai</label>
      <select class="form-control" id="select-pegawai" name="pegawai_id" aria-placeholder="Pilih tipe kategori"
        placeholder="Pilih pegawai">
        <option>Pilih Pegawai</option>
        <?php foreach ($list_pegawai as $key => $pegawai): ?>
          <option value="<?= $pegawai->id ?>" <?= ($mode == 'edit' || $mode == 'show') && isset($item) && $item->pegawai_id == $pegawai->id ? "selected" : "" ?> data-gaji="<?= $pegawai->gaji ?>"
            data-pegawai_id="<?= $pegawai->id ?>" data-divisi="<?= $pegawai->divisi ?>"
            data-jabatan="<?= $pegawai->jabatan ?>">
            <?= $pegawai->nama ?> - <?= $pegawai->status_bekerja ?> - Pokok <?= rupiah($pegawai->gaji) ?>
          </option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="form-group mb-3">
      <label for="nominal-gaji">Total Gaji Dengan Tambahan</label>
      <input class="form-control" id="nominal-gaji" placeholder="Masukan Nominal Gaji" type="number" name="gaji"
        readonly value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->gaji : '' ?>">
      <small id="tambahan"></small>
    </div>

    <div class="form-group mb-3">
      <label for="tanggal">Tanggal Pembayaran</label>
      <input id="tanggal" class="form-control" placeholder="Masukan Tanggal" type="date" name="tanggal"
        value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->tanggal : '' ?>">
    </div>

    <div class="form-group mb-3">
      <label for="keterangan">Keterangan Gaji</label>
      <input id="keterangan" class="form-control" placeholder="Keterangan Gaji" type="text" name="keterangan"
        value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->keterangan : '-' ?>">
    </div>

    <button class="btn btn-secondary form-control" type="submit">Submit</button>
    </form>
  </div>

</section>

<script type="text/javascript">
  document.getElementById('select-pegawai')
    .addEventListener('change', async function () {
      let value = this.value
      let dataset = this.options[this.selectedIndex].dataset
      let gaji = dataset.gaji
      let nominalGaji = document.getElementById('nominal-gaji');
      let bulan = document.getElementById('select-bulan').value
      let tambahan = document.getElementById('tambahan')

      if (bulan != null) {
        let respons = await fetch('<?= base_url('management/gaji/lembur/') ?>' + `${dataset.pegawai_id}?bulan=${bulan}`)
        let data = await respons.json();

        if (gaji) {
          nominalGaji.value = (parseInt(gaji) + parseInt(data.gaji_lembur) + parseInt(data.gaji_tunjangan))
          tambahan.innerHTML = `Lembur: ${parseInt(data.gaji_lembur)}, Tunjangan: ${parseInt(data.gaji_tunjangan)}`
        } else {
          nominalGaji.value = ''
        }

      } else {
        alert("Harap Pilih Bulan")
      }

    })
</script>