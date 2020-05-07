<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
    </div>
    <div class="card-body">
      <button type="button" data-toggle="modal" data-target="#modal-tambah" class="btn btn-primary" style="margin-bottom:10px;">
        Tambah
      </button>
      <div class="table-responsive">
        <table class="table table-bordered data" width="100%" cellspacing="0">
          <thead>
            <th width="5%">#</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Level</th>
            <th width="15%">Aksi</th>
          </thead>
          <tbody>

            <?php $no =1; ?>
            <?php foreach ($userdata as $data) : ?>
              <tr>
              <td><?= $no++ ?></td>
              <td><?= $data['nisn'] ?></td>
              <td><?= $data['nama'] ?></td>
              <?php if($data['level'] == "Admin"){ ?>
              <td><span class="bade badge-pill badge-success"><b><?= $data['level'] ?></b></span></td>
              <?php } else { ?>
              <td><span class="bade badge-pill badge-light"><b><?= $data['level'] ?></b></span></td>
              <?php } ?>
              <td>
                <button type="button" data-toggle="modal" data-target="#edit-data<?=$data['uid']?>" class="btn btn-warning btn-fill">
                  <i class="fa fa-edit"></i>
                </button>
                <a href="<?= base_url('Userdata/delete/'.$data['uid']); ?>"
                  class="btn btn-danger btn-fill tombol-hapus">
                    <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
            <?php endforeach ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of main content -->
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?=base_url('Userdata/tambah')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <div class="form-group mb-3">
            <label class="col-form-label">NISN</label>
            <input class="form-control" name="nisn" placeholder="Masukkan NISN" type="text" required=""
            oninvalid="this.setCustomValidity('NISN Belum Terisi!')"
            oninput="setCustomValidity('')"></input>
          </div>
          <div class="form-group mb-3">
            <label class="col-form-label">Nama</label>
            <input class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" type="text" required=""
            oninvalid="this.setCustomValidity('Nama Belum Terisi!')"
            oninput="setCustomValidity('')"></input>
          </div>
          <div class="form-group mb-3">
            <label class="col-form-label">E-mail</label>
            <input class="form-control" name="email" placeholder="Masukkan E-mail" type="email" required=""
            oninvalid="this.setCustomValidity('Perhatikan Kolom E-mail!')"
            oninput="setCustomValidity('')"></input>
          </div>
          <div class="form-group mb-3">
            <label class="col-form-label">Password</label>
            <input class="form-control" name="password" placeholder="Masukkan Password" type="password" required=""
            oninvalid="this.setCustomValidity('Password Belum Terisi!')"
            oninput="setCustomValidity('')"></input>
          </div>
          <div class="form-group mb-3">
            <label class="col-form-label">Tahun Lulus</label>
            <input class="form-control" name="tahun_lulus" placeholder="Masukkan Tahun Lulus" type="text" required=""
            oninvalid="this.setCustomValidity('Tahun Lulus Belum Terisi!')"
            oninput="setCustomValidity('')"></input>
          </div>
          <div class="form-group mb-3">
            <label class="col-form-label">Alamat</label>
            <textarea class="form-control" rows="5" name="alamat" placeholder="Masukkan Alamat" type="text" required=""
            oninvalid="this.setCustomValidity('Alamat Belum Terisi!')"
            oninput="setCustomValidity('')"></textarea>
          </div>
          <div class="form-group mb-3">
            <label class="col-form-label">Level</label>
            <select class="custom-select" name="level">
              <option value="Admin">Admin</option>
              <option value="User">User</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" id="simpan" class="btn btn-primary btn-fill">Simpan</button>
          <button type="button" class="btn ml-auto btn-fill" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Modal Tambah -->

<?php $no=0; foreach($userdata as $data): $no++; ?>
  <!-- Modal Update -->
  <div class="modal fade" id="edit-data<?=$data['uid']?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Edit Data User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="<?=base_url('Userdata/edit')?>" method="post" enctype="multipart/form-data" role="form">
          <div class="modal-body">
            <input type="hidden" id="uid" name="uid" class="form-control" value="<?=$data['uid']?>" readonly>
            <div class="form-group mb-3">
              <label class="col-form-label">NISN</label>
              <input class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" type="text" value="<?=$data['nisn']?>" required=""
              oninvalid="this.setCustomValidity('NISN Belum Terisi!')"
              oninput="setCustomValidity('')"></input>
            </div>
            <div class="form-group mb-3">
              <label class="col-form-label">Nama</label>
              <input class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" type="text" value="<?=$data['nama']?>" required=""
              oninvalid="this.setCustomValidity('Nama Belum Terisi!')"
              oninput="setCustomValidity('')"></input>
            </div>
            <div class="form-group mb-3">
              <label class="col-form-label">Tahun Lulus</label>
              <input class="form-control" id="tahun_lulus" name="tahun_lulus" placeholder="Masukkan Tahun Lulus" type="text" value="<?=$data['nisn']?>" required=""
              oninvalid="this.setCustomValidity('Tahun Lulus Belum Terisi!')"
              oninput="setCustomValidity('')"></input>
            </div>
            <div class="form-group mb-3">
              <label class="col-form-label">Alamat</label>
              <textarea class="form-control" rows="5" id="alamat" name="alamat" placeholder="Masukkan Alamat" type="text" required=""
              oninvalid="this.setCustomValidity('Alamat Belum Terisi!')"
              oninput="setCustomValidity('')"><?=$data['alamat']?></textarea>
            </div>
            <div class="form-group mb-3">
              <label class="col-form-label">Level</label>
              <select class="form-control" name="level" id="level">
                    <option value="<?= $data['level'];?>" selected><?= $data['level'];?></option>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" id="simpan" class="btn btn-primary btn-fill">Simpan</button>
            <button type="button" class="btn ml-auto btn-fill" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End of Modal Update -->
<?php endforeach; ?>