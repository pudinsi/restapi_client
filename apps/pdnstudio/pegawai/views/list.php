<?php defined('__NAJZMI_PUDINTEA__') or exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>List Pegawai</title>

		<style type="text/css">

		::selection { background-color: #E13300; color: white; }
		::-moz-selection { background-color: #E13300; color: white; }

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
			text-decoration: none;
		}

		a:hover {
			color: #97310e;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
			min-height: 96px;
		}

		p {
			margin: 0 0 10px;
			padding:0;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
		.text-center{
			text-align:center;
		}
		</style>
	</head>
	<body>
		<div id="container">
			<font color="orange">
				<?php echo $this->session->flashdata('hasil'); ?>
			</font>
			<div style="padding: 20px;">
				<a href="<?=$link;?>/add">+ Tambah data<a>
			</div>
			<table  width="100%">
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
	</body>
</html>
