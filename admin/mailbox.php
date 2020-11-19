<?php
include 'assets/header.php';?>

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Gelen Mesajlar</h1>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h5 class="m-0 font-weight-bold text-primary">Mesajlar</h5>
			
			
		</div>
		<div class="card-body">

<div id="dataTables_wrapper" class="dataTables_wrapper dt-bootstrap4">
	<div class="row mobilgizleexport gizlemeyiac">


<div class="table-responsive">

	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>Ad Soyad</th>
				<th>Mail</th>
				<th>Telefon</th>
                <th>Mesaj</th>
                <th></th>
			</tr>
		</thead>
		<!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi giriş-->
		<tbody>
		 <?php
		 $say=0;
		 $mesaj=$db->prepare("SELECT * FROM mailbox ORDER BY id DESC");
		 $mesaj->execute();
		 while ($mesajcek=$mesaj->fetch(PDO::FETCH_ASSOC)) { $say++?>

			 <tr>
				<td><?php echo $say; ?></td>
				<td><?php echo $mesajcek['ad']; ?>&nbsp &nbsp<?php echo $mesajcek['soyad']; ?> </td>
				<td><?php echo $mesajcek['mail']; ?></td>
				<td><?php echo $mesajcek['tel'];?></td> 
                <td><button type="button" class="btn btn-primary btn btn-success btn-sm btn-icon-split" data-toggle="modal" data-target="#mesajkutusu<?php echo $mesajcek['id'] ?>">
                <span class="icon text-white-60">
                          <i class="fas fa-eye"></i>
                        </span>
                </td> 
                <td>  <form class="mx-1" action="islemler/islem.php" method="POST">
                      <input type="hidden" name="id" value="<?php echo $mesajcek['id'] ?>">
                      <button type="submit" name="logsil" class="btn btn-danger btn-sm btn-icon-split">
                        <span class="icon text-white-60">
                          <i class="fas fa-trash"></i>
                        </span>
                      </button>
                    </form>																																																						
								</td>
																																																						





			</div>
		</td>
	</tr>

    <!-- Modal -->
<div class="modal fade" id="mesajkutusu<?php echo $mesajcek['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div style="background-color:#1D2127;" class="modal-content">
      <div style="background-color:#1D2127;" class="modal-header">
        <h5 style="font-size:2vw;" class="modal-title" id="exampleModalLabel">Mesaj İçeriği</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="font-color:#fff;" class="modal-body">
        <p><?php echo $mesajcek['mesaj'];?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
    
      </div>
    </div>
  </div>
</div>






<?php } ?>
</tbody>
<tfoot>

	<tr>
		<th>No</th>
				<th>Ad Soyad</th>
				<th>Mail</th>
				<th>Telefon</th>
                <th>Mesaj</th>
                  <th></th>
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
  
<?php include 'assets/footer.php';?>
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
      text: 'İçerik Başarıyla Silindi!',
      showConfirmButton: false,
      timer: 2000
    })
  </script>
  <?php } ?>
  