<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Gaji Pegawai</h1>
</div>


<a href="<?= base_url('management/gaji/create') ?>" class="btn btn-secondary">+ Buat Gaji</a>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Pegawai</th>
        <th scope="col">Gaji</th>
        <th scope="col">Bulan</th>
        <th scope="col">Tanggal</th>
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
            <?= rupiah($item->gaji) ?>
          </td>
          <td>
            <?= date("F", mktime(0, 0, 0, $item->bulan, 10)) ?>
          </td>
          <td>
            <?= $item->tanggal ?>
          </td>
          <td>
            <?= date($item->created_at) ?>
          </td>
          <td>
            <div class="d-flex flex-row gap-2">
              <a href="<?= base_url('management/presensi/edit/' . $item->id) ?>" class="btn btn-warning">edit</a>
              <!-- Form Delete -->
              <?= form_open('management/presensi/delete/' . $item->id, 'id="del-category-' . $item->id . '"') ?>
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