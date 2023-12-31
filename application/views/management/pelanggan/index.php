<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Pelanggan</h1>
</div>


<a href="<?= base_url('management/pelanggan/create') ?>" class="btn btn-secondary">+ Buat Data Pelanggan Baru</a>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>No</th>
        <th>Pelanggan ID</th>
        <th>Nama Pelanggan</th>
        <th>Alamat</th>
        <th>Kode Tarif</th>
        <th>Beban</th>
        <th>Tarif Perkwh</th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($list as $key => $item): ?>
        <tr>
          <td>
            <?= $key + 1 ?>
          </td>
          <td>
            <?= $item->pelanggan_id ?>
          </td>
          <td>
            <?= $item->nama_pelanggan ?>
          </td>
          <td>
            <?= $item->alamat ?>
          </td>
          <td>
            <?= $item->kd_tarif ?>
          </td>
          <td>
            <?= $item->beban ?>
          </td>
          <td>
            <?= $item->tarif_perkwh ?>
          </td>
          <td>
            <div class="d-flex flex-row gap-2">
              <a href="<?= base_url('management/pelanggan/show/' . $item->id) ?>" class="btn btn-primary btn-sm">Lihat</a>
              <a href="<?= base_url('management/pelanggan/edit/' . $item->id) ?>" class="btn btn-warning btn-sm">Ubah</a>
              <?= form_open('management/pelanggan/delete/' . $item->id, 'id="del-tarif-' . $item->id . '"') ?>
              <button class="btn btn-danger btn-sm" type="button"
                onclick="deleteTarif(this.form, <?= $item->id ?>)">Hapus</button>
              </form>
            </div>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

<script type="text/javascript">
  function deleteTarif(form, id) {
    if (confirm("Anda yakin inging menghapus data ini? " + id) == true) {
      form.submit();
    }
  }
</script>