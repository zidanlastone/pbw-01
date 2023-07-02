<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tarif Listrik</h1>
</div>

<div>
  <h3>Membuat Tarif Listrik Baru</h3>
  <?= form_open($mode == 'edit' && isset($item) ? 'management/tagihan/update/' . $item->id : 'management/tagihan/store', 'class=""my-3"') ?>

  <div class="form-group mb-3">
    <label for="pelanggan_id">Harap Pilih Data Pelanggan</label>
    <select name="pelanggan_id" class="form-control">
      <?php foreach ($list_pelanggan as $key => $item): ?>
        <option value="<?= $item->id ?>"><?= $item->pelanggan_id ?> - <?= $item->nama_pelanggan ?></option>
      <?php endforeach ?>
    </select>
  </div>
  <div class="form-group mb-3">
    <label for="tahun_tagihan">Harap Pilih Tahun Tagihan</label>
    <select name="tahun_tagihan" class="form-control">
      <?php for ($x = date('Y') + 1; $x >= 2000; $x--): ?>
        <option value="<?= $x ?>" <?= $mode == 'edit' && $item->tahun_tagihan == $x ? 'selected' : '' ?>   <?= $mode == 'create' && date('Y') == $x ? 'selected' : '' ?>><?= $x ?></option>
      <?php endfor ?>
    </select>
  </div>
  <div class="form-group mb-3">
    <label for="bulan_tagihan">Harap Pilih Tahun Tagihan</label>
    <select name="bulan_tagihan" class="form-control">
      <option value="1" <?= $mode == 'edit' && $item->bulan_tagihan == 1 ? 'selected' : '' ?>>Januari</option>
      <option value="2" <?= $mode == 'edit' && $item->bulan_tagihan == 2 ? 'selected' : '' ?>>Februari</option>
      <option value="3" <?= $mode == 'edit' && $item->bulan_tagihan == 3 ? 'selected' : '' ?>>Maret</option>
      <option value="4" <?= $mode == 'edit' && $item->bulan_tagihan == 4 ? 'selected' : '' ?>>April</option>
      <option value="5" <?= $mode == 'edit' && $item->bulan_tagihan == 5 ? 'selected' : '' ?>>Mei</option>
      <option value="6" <?= $mode == 'edit' && $item->bulan_tagihan == 6 ? 'selected' : '' ?>>Juni</option>
      <option value="7" <?= $mode == 'edit' && $item->bulan_tagihan == 7 ? 'selected' : '' ?>>Juli</option>
      <option value="8" <?= $mode == 'edit' && $item->bulan_tagihan == 8 ? 'selected' : '' ?>>Agustus</option>
      <option value="9" <?= $mode == 'edit' && $item->bulan_tagihan == 9 ? 'selected' : '' ?>>September</option>
      <option value="10" <?= $mode == 'edit' && $item->bulan_tagihan == 10 ? 'selected' : '' ?>>Oktober</option>
      <option value="11" <?= $mode == 'edit' && $item->bulan_tagihan == 11 ? 'selected' : '' ?>>November</option>
      <option value="12" <?= $mode == 'edit' && $item->bulan_tagihan == 12 ? 'selected' : '' ?>>Desember</option>
    </select>
  </div>

  <div class="form-group mb-3">
    <label for="title">Pemakaian</label>
    <input class="form-control" placeholder="Masukan Pemakaian Listrik" type="text" name="pemakaian" min="100"
      value="<?= $mode == 'edit' && isset($item) ? $item->pemakaian : '' ?>" <?= $mode == 'show' ? 'disabled' : '' ?>>
    <small><i>Contoh: 200</i></small>
  </div>



  <button class="btn btn-secondary form-control" type="submit">Submit</button>
  </form>
</div>