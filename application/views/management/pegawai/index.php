<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Daftar Pegawai</h1>
</div>

<a href="<?= base_url('management/pegawai/create') ?>" class="btn btn-secondary">+ Buat Data Pegawai Baru</a>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">No HP</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">Status Pernikahan</th>
        <th scope="col">Tanggal Gabung</th>
        <th scope="col">Divisi</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Gaji</th>
        <th scope="col">Status Bekerja</th>
        <th scope="col">Created At</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($list as $key => $item): ?>
        <tr>
          <td>
            <?= $key + 1 ?>
          </td>
          <td>
            <?= $item->nama ?>
          </td>
          <td>
            <?= $item->email ?>
          </td>
          <td>
            <?= $item->no_hp ?>
          </td>
          <td>
            <?= $item->jenis_kelamin ?>
          </td>
          <td>
            <?= $item->status_pernikahan == 0 ? 'Belum Menikah' : 'Sudah Menikah' ?>
          </td>
          <td>
            <?= $item->tanggal_gabung ?>
          </td>
          <td>
            <?= $item->divisi ?>
          </td>
          <td>
            <?= $item->jabatan ?>
          </td>
          <td>
            <?= $item->gaji ?>
          </td>
          <td>
            <?= $item->status_bekerja ?>
          </td>
          <td>
            <?= date($item->created_at) ?>
          </td>
          <td>
            <div class="d-flex flex-row gap-2">
              <a href="<?= base_url('management/pegawai/edit/' . $item->id) ?>" class="btn btn-warning">edit</a>
              <!-- Form Delete -->
              <?= form_open('management/pegawai/delete/' . $item->id, 'id="del-category-' . $item->id . '"') ?>
              <button class="btn btn-danger" type="button"
                onclick="deleteCategory(this.form, <?= $item->id ?>)">delete</button>
              </form>
            </div>

          </td>

        </tr>
      <?php endforeach ?>
    </tbody>

  </table>
</div>

<script type="text/javascript">
  function deleteCategory(form, id) {
    if (confirm("Anda yakin inging menghapus data ini? " + id) == true) {
      form.submit();
    }
  }
</script>