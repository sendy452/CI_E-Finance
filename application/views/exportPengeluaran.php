<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Pengeluaran.xls");
?>
<center><h3>DATA PENGELUARAN</h3></center>
<table border="1" cellpadding="5">

	<tr>
		<th>No.</th>
		<th>Tanggal Pengeluaran</th>
		<th>Jumlah</th>
		<th colspan="2">Keterangan</th>
	</tr>
	<?php
	$no = 1; 
	foreach($cek as $trans){
	?>
	<tr>
		<td><?=$no++;?></td>
		<td><?=date("d/m/Y", strtotime($trans->tgl_pengeluaran));?></td>
		<td><?=$trans->jumlah;?></td>
		<td colspan="2"><?=$trans->keterangan;?></td>
	</tr>
	<?php } ?>
</table>