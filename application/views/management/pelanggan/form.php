<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tarif Listrik</h1>
</div>

<div>
  <h3>Membuat Tarif Listrik Baru</h3>
  <?= form_open($mode == 'edit' && isset($item) ? 'management/pelanggan/update/' . $item->id : 'management/pelanggan/store', 'class=""my-3"') ?>
  <div class="form-group mb-3">
    <label for="title">Nama Pelanggan</label>
    <input class="form-control" placeholder="Masukan Nama Pelanggan" type="text" name="nama_pelanggan" min="100"
      value="<?= $mode == 'edit' && isset($item) ? $item->nama_pelanggan : '' ?>" <?= $mode == 'show' ? 'disabled' : '' ?>>
    <small><i>Contoh Nama : John Doe</i></small>
  </div>
  <div class="form-group mb-3">
    <label for="title">Alamat Pelanggan</label>
    <textarea class="form-control" placeholder="Masukan Alamat Pelanggan" type="text" name="alamat" min="100"
      value="<?= $mode == 'edit' && isset($item) ? $item->alamat : '' ?>" <?= $mode == 'show' ? 'disabled' : '' ?>><?= $mode == 'edit' && isset($item) ? $item->alamat : '' ?></textarea>
    <small><i>Contoh Alamat: Jl. Raya Cilebut No.3a, RT.01/RW.04, RTO1 RW04, Kec. Tanah Sereal Kota Bogor Jawa
        Barat</i></small>
  </div>

  <div class="form-group mb-3">
    <select name="tarif_listrik_id" class="form-control">
      <?php foreach ($list_tarif_listrik as $key => $item): ?>
        <option value="<?= $item->id ?>"><?= $item->kd_tarif ?> - <?= $item->beban ?> Watt - Rp.<?= $item->tarif_perkwh ?>/kwh</option>
      <?php endforeach ?>
    </select>
  </div>


  <button class="btn btn-secondary form-control" type="submit">Submit</button>
  </form>
</div>