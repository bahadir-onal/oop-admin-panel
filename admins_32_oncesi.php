<?php 
require_once 'header.php';
require_once 'sidebar.php'

?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  

  <section class="content">


   <?php 

   if (isset($_GET['adminsInsert'])) {?>
    <div class="box box-primary">



      <div class="content-header">
        <h1 >Yönetici Ekle</h1>  
        <hr>       
      </div>

      <div class="box-body">

        <?php 
        if (isset($_POST['admin_insert'])) {
         $sonuc=$db->adminInsert($_POST['admins_namesurname'],$_POST['admins_username'],$_POST['admins_pass'],$_POST['admins_status']);

         if ($sonuc['status']) {?>
           <div class="alert alert-success">
             Kayıt Başarılı
           </div>
         <?php } else {?>

          <div class="alert alert-danger">
           Kayıt Başarısız
         </div>
       <?php }
     }
     ?>


      <!--  <div class="alert alert-success">
        Kayıt Başarılı
      </div> -->


      <form method="POST">

        <div class="form-group">
          <label>Ad Soyad</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="text" name="admins_namesurname" required="" class="form-control">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Kullanıcı Adı</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="text" name="admins_username" required="" class="form-control">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Kullanıcı Şifre</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="password" name="admins_pass" required="" class="form-control">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Kullanıcı Durum</label>
          <div class="row">
            <div class="col-xs-12">
              <select class="form-control" name="admins_status">
                <option value="1">Aktif</option>
                <option value="0">Pasif</option>
              </select>
            </div>
          </div>
        </div>

        <div align="right" class="box-footer">
          <button type="submit" class="btn btn-success" name="admin_insert">Ekle</button>
        </div>



      </form>
    </div>

  </div>
<?php }
?>




<!-- Default box -->
<div class="box box-primary">

 <div class="content-header">
  <h1 >Yöneticiler</h1>  
  <div align="right">
    <a href="?adminsInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
  </div>
</div>
<!-- /.box-header -->
<div class="box-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th align="center" width="5">#</th>
        <th>Kullanıcı Adı</th>
        <th>Ad Soyad</th>
        <th>Durum</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>

      <?php 
      $sql=$db->read("admins");
      $say=1;
      while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

        <tr>
          <td><?php echo $say++; ?></td>
          <td><?php echo $row['admins_username'] ?></td>
          <td><?php echo $row['admins_namesurname'] ?></td>
          <td><?php 
          if ($row['admins_status']==0) {
            echo "Pasif";
          } else if ($row['admins_status']==1) {
            echo "Aktif";
          }
          ?></td>
          <td align="center" width="5"><i class="fa fa-pencil-square"></i></td>
          <td align="center" width="5"><i class="fa fa-trash-o"></i></td>
        </tr>

      <?php } ?>

    </table>
  </div>
  <!-- /.box-body -->
</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once 'footer.php'; ?>