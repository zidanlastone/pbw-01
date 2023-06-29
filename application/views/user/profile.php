<div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <div class="border-bottom mb-2">
          <h4 class="m-0">Aktivitas</h4>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Artikel</li>
            <li class="list-group-item">History</li>
            <li class="list-group-item">Disukai</li>
            <li class="list-group-item">Komentar</li>
            <li class="list-group-item">Profile</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-9">
    <div class="card">
      <div class="card-body">
        <h4>User Profile</h4>
        <table>
          <tr>
            <td>Nama</td>
            <td>
              :
              <?= $item->name ?>
            </td>
          </tr>
          <tr>
            <td>Username</td>
            <td>
              :
              <?= $item->username ?>
            </td>
          </tr>
          <tr>
            <td>Email</td>
            <td>
              :
              <?= $item->email ?>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>