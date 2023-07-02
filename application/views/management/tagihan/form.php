<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tarif Listrik</h1>
</div>

<div>
  <h3 class="h4">Membuat Tarif Listrik Baru</h3>
  <?= form_open(($mode == 'edit' || $mode == 'show') && isset($item) ? 'management/tagihan/update/' . $item->id : 'management/tagihan/store', 'class=""my-3"') ?>

  <div class="form-group mb-3">
    <label for="pelanggan_id">Harap Pilih Data Pelanggan</label>
    <select name="pelanggan_id" class="form-control" <?= $mode == 'show' ? 'disabled' : '' ?>>
      <?php foreach ($list_pelanggan as $key => $a): ?>
        <option value="<?= $a->id ?>" <?= ($mode == 'edit' || $mode == 'show') && $item->id == $a->id ? 'selected' : '' ?>><?= $a->pelanggan_id ?> - <?= $a->nama_pelanggan ?></option>
      <?php endforeach ?>
    </select>
  </div>
  <div class="form-group mb-3">
    <label for="tahun_tagihan">Harap Pilih Tahun Tagihan</label>
    <select name="tahun_tagihan" class="form-control" <?= $mode == 'show' ? 'disabled' : '' ?>>
      <?php for ($x = date('Y') + 1; $x >= 2000; $x--): ?>
        <option value="<?= $x ?>" <?= ($mode == 'edit' || $mode == 'show') && $item->tahun_tagihan == $x ? 'selected' : '' ?>
          <?= $mode == 'create' && date('Y') == $x ? 'selected' : '' ?>><?= $x ?></option>
      <?php endfor ?>
    </select>
  </div>
  <div class="form-group mb-3">
    <label for="bulan_tagihan">Harap Pilih Tahun Tagihan</label>
    <select name="bulan_tagihan" class="form-control" <?= $mode == 'show' ? 'disabled' : '' ?>>
      <option value="1" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan_tagihan == 1 ? 'selected' : '' ?>>Januari
      </option>
      <option value="2" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan_tagihan == 2 ? 'selected' : '' ?>>Februari
      </option>
      <option value="3" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan_tagihan == 3 ? 'selected' : '' ?>>Maret
      </option>
      <option value="4" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan_tagihan == 4 ? 'selected' : '' ?>>April
      </option>
      <option value="5" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan_tagihan == 5 ? 'selected' : '' ?>>Mei</option>
      <option value="6" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan_tagihan == 6 ? 'selected' : '' ?>>Juni
      </option>
      <option value="7" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan_tagihan == 7 ? 'selected' : '' ?>>Juli
      </option>
      <option value="8" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan_tagihan == 8 ? 'selected' : '' ?>>Agustus
      </option>
      <option value="9" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan_tagihan == 9 ? 'selected' : '' ?>>September
      </option>
      <option value="10" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan_tagihan == 10 ? 'selected' : '' ?>>Oktober
      </option>
      <option value="11" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan_tagihan == 11 ? 'selected' : '' ?>>November
      </option>
      <option value="12" <?= ($mode == 'edit' || $mode == 'show') && $item->bulan_tagihan == 12 ? 'selected' : '' ?>>Desember
      </option>
    </select>
  </div>

  <div class="form-group mb-3">
    <label for="title">Pemakaian</label>
    <input class="form-control" placeholder="Masukan Pemakaian Listrik" type="text" name="pemakaian" min="100"
      value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->pemakaian : '' ?>" <?= $mode == 'show' ? 'disabled' : '' ?>>
    <small><i>Contoh: 200</i></small>
  </div>



  <button class="btn btn-secondary form-control" type="submit">Submit</button>
  </form>
</div>