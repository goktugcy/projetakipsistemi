<?php
include 'assets/header.php';
if (yetkikontrol()!="yetkili") {
	header("location:index.php?durum=izinsiz");
	exit;
};
?>

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Son girişler</h1>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h5 class="m-0 font-weight-bold text-primary">Son Girişler</h5>
			
			
		</div>
		<br>
		<?php
		
		 $ip=$db->prepare("SELECT * FROM counter_ip ORDER BY counterip_id DESC");
		 $ip->execute();
		 $ipscek=$ip->fetch(PDO::FETCH_ASSOC);
		 ?>
		 		
	 <form class="mx-1" action="islemler/islem.php" method="POST">
                      <input type="hidden" name="ipsil" value="<?php echo $ipscek['counterip_id'] ?>">
                      <button type="submit" name="ipsil" data-toggle="tooltip" title="İşlem Geri Alınamaz!" class="btn btn-danger">
                    Tüm Logları Sil
                      </button>
                    </form>	
		<div class="card-body">

<div id="dataTables_wrapper" class="dataTables_wrapper dt-bootstrap4">
	<div class="row mobilgizleexport gizlemeyiac">


<div class="table-responsive">

	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

		<thead>
			<tr>
				<th>No</th>
				<th>İp Adresi</th>
				<th>Tarih</th>
			</tr>
		</thead>
			
		<!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi giriş-->
		<tbody>
		 <?php
		 $say=0;
		 $ip=$db->prepare("SELECT * FROM counter_ip ORDER BY counterip_id DESC");
		 $ip->execute();
		 
		 while ($ipcek=$ip->fetch(PDO::FETCH_ASSOC)) { $say++?>

			 <tr>
				<td><?php echo $say; ?></td>
				<td><?php echo $ipcek['counterip_ip']; ?></td>
				<td><?php echo $ipcek['tarih'];?></td>  <!-- EĞER DOĞRU SAATİ ALAMIYORSAN MYSQL SUNUCUDA ŞU KODU ÇALIŞTIR :  SET GLOBAL time_zone = 'Europe/Istanbul';-->
																		
								</div>
								
		</td>
	</tr>
	
<?php } ?>
</tbody>
<tfoot>

	<tr>
		<th>No</th>
		<th>İp Adresi</th>
		<th>Tarih</th>
	</tr>

</tfoot>
<!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi çıkış-->
</table>
</div>
</div>
</div>
</div>
</div>
</div>


	<script src="vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="js/demo/datatables-demo.js"></script>
	<script src="vendor/datatables/dataTables.buttons.min.js"></script>
	<script src="vendor/datatables/buttons.flash.min.js"></script>
	<script src="vendor/datatables/jszip.min.js"></script>
	<script src="vendor/datatables/pdfmake.min.js"></script>
	<script src="vendor/datatables/vfs_fonts.js"></script>
	<script src="vendor/datatables/buttons.html5.min.js"></script>
	<script src="vendor/datatables/buttons.print.min.js"></script>

<?php include 'assets/footer.php'?>
<?php if (@$_GET['durum']=="no")  {?>
  <script>
    Swal.fire({
      type: 'error',
      title: 'İşlem Başarısız',
      text: 'Lütfen Tekrar Deneyin',
      showConfirmButton: true,
      confirmButtonText: 'Kapat'
    })
  </script>
<?php } ?>

<?php if (@$_GET['durum']=="ok")  {?>
  <script>
    Swal.fire({
      type: 'success',
      title: 'İşlem Başarılı',
      text: 'Loglar Başarıyla Silindi!',
      showConfirmButton: false,
      timer: 2000
    })
  </script>
  <?php } ?>