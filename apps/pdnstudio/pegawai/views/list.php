<?php defined('__NAJZMI_PUDINTEA__') or exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>List Pegawai</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css');?>">
	</head>
	<body>
		<div class="container">
			<div class="card">
				<div class="card-body">
				<a class="btn btn-success" href="<?=$link;?>/add"> + Tambah data </a>
				<font color="orange">
					<?php echo $this->session->flashdata('hasil'); ?>
				</font>
				<table  class="table mt-4">
					<thead>
						<tr border="1">
							<th class="text-center">ID</th>
							<th>Nama</th>
							<th>Unit</th>
							<th>Jabatan</th>
							<th>Telpon</th>
							<th class="text-center" >Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (is_array($pegawai) || is_object($pegawai))
						{
							foreach ($pegawai as $pg){
								?>
								<tr>
									<td class="text-center"><?=$pg->id;?></td>
									<td><?=$pg->nama;?></td>
									<td><?=$pg->unit;?></td>
									<td><?=$pg->jabatan;?></td>
									<td><?=$pg->telpon;?></td>
									<td class="text-center">
										<?php echo anchor('pegawai/hapus/'.$pg->id.'','Hapus', array('onclick'=>"return confirm('Apakah anda yakin ingin menghapus ini ?')"));?> ||
										<?php echo anchor('pegawai/edit/'.$pg->id.'','Edit');?>
									</td>
								</tr>
							<?php
							}
						}
						?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
		<script src="<?=base_url('assets/bootstrap/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
	</body>
</html>
