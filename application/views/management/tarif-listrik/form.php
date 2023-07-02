<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tarif Listrik</h1>
</div>

<div>
  <h3 class="h4">Membuat Tarif Listrik Baru</h3>
  <?= form_open(($mode == 'edit' || $mode == 'show') && isset($item) ? 'management/tariflistrik/update/' . $item->id : 'management/tariflistrik/store', 'class=""my-3"') ?>
  <div class="form-group mb-3">
    <label for="title">Kode Tarif Listrik</label>
    <input class="form-control" placeholder="Masukan Kode Tarif Listrik Baru" type="text" name="kd_tarif" minlength="4"
      maxlength="4" value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->kd_tarif : '' ?>"
      <?= $mode == 'show' ? 'disabled' : '' ?>>
    <small><i>Contoh kode : A001</i></small>
  </div>
  <div class="form-group mb-3">
    <label for="title">Beban Listrik</label>
    <input class="form-control" placeholder="Masukan Beban Listrik" type="number" name="beban" min="100"
      value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->beban : '' ?>" <?= $mode == 'show' ? 'disabled' : '' ?>>
    <small><i>Contoh beban : 900/1200/2000</i></small>
  </div>
  <div class="form-group mb-3">
    <label for="title">Tarif Listrik Per Kwh</label>
    <input class="form-control" placeholder="Masukan Tarif Listrik Per Kwh" type="number" name="tarif_perkwh" min="100"
      value="<?= ($mode == 'edit' || $mode == 'show') && isset($item) ? $item->tarif_perkwh : '' ?>" <?= $mode == 'show' ? 'disabled' : '' ?>>
    <small><i>Masukan tarif berdasarkan ripiah : 1200/2000</i></small>
  </div>

  <button class="btn btn-secondary form-control" type="submit">Submit</button>
  </form>
</div>