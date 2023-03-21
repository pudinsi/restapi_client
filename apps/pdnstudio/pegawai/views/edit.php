<?php defined('__NAJZMI_PUDINTEA__') or exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Edit Pegawai</title>

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
		.pdn-form{
			width: 100%;
			padding : 20px;
		}
		</style>
	</head>
	<body>
		<div id="container">
			<div style="padding: 20px;">
				<a href="<?=$link;?>"> Kembali<a>
			</div>
			<div class="pdn-form">
				<?php echo form_open_multipart($link.'/edit');?>
				<?php echo form_hidden('id',$epg[0]->id);?>
					<table>
						<tr><td>Nama</td><td><?php echo form_input('nama', $epg[0]->nama);?></td></tr>
						<tr><td>Unit</td><td><?php echo form_input('unit', $epg[0]->unit);?></td></tr>
						<tr><td>Jabatan</td><td><?php echo form_input('jabatan', $epg[0]->jabatan);?></td></tr>
						<tr><td>Telpon</td><td><?php echo form_input('telpon', $epg[0]->telpon);?></td></tr>
						<tr><td colspan="2">
							<?php echo form_submit('submit','Simpan');?>
							<?php echo anchor('pegawai','Kembali');?></td>
						</tr>
					</table>
				<?php echo form_close(); ?>
			</div>
		</div>
	</body>
</html>