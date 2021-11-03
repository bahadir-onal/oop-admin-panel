<?php 
require_once 'header.php';
require_once 'sidebar.php'

?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  

  <section class="content">


   <?php 

   if (isset($_GET['blogsInsert'])) {?>
    <div class="box box-primary">



      <div class="content-header">
        <h1 >Blog Ekle</h1>
        <hr>       
      </div>

      <div class="box-body">

        <?php 
        if (isset($_POST['blogs_insert'])) {

         $sonuc=$db->insert("blogs",$_POST,[
          "form_name" => "blogs_insert",
          "dir" => "blogs",
          "file_name" => "blogs_file"
          ]
        );

        if ($sonuc['status']) {?>
         <div class="alert alert-success">
           Kayıt Başarılı
         </div>
       <?php } else {?>

        <div class="alert alert-danger">
         Kayıt Başarısız.<?php echo $sonuc['error'] ?>
       </div>
     <?php }
   }
   ?>


      <!--  <div class="alert alert-success">
        Kayıt Başarılı
      </div> -->


      <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <label>Resim Seç</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="file" name="blogs_file" required="" class="form-control">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Blog Title</label>
          <div class="row">
            <div class="col-xs-12">
              <input type="text" name="blogs_title" required="" class="form-control">
            </div>
          </div>
        </div>


          <div class="form-group">
              <label>Blog İçerik</label>
              <div class="row">
                  <div class="col-xs-12">
                      <textarea id="editor1" class="form-control" name="blogs_content"></textarea>
                  </div>
              </div>
          </div>


          <script>
              CKEDITOR.replace( 'editor1' );
          </script>


          <div align="right" class="box-footer">
          <button type="submit" class="btn btn-success" name="blogs_insert">Ekle</button>
        </div>



      </form>
    </div>

  </div>
<?php }  else if (isset($_GET['blogsUpdate'])) {

  //bağlı id bilgilerini çek...


  ?>

  <div class="box box-primary">



    <div class="content-header">
      <h1 >blogs Düzenle</h1>
      <hr>       
    </div>

    <div class="box-body">

      <?php 

      if (isset($_POST['blogs_update'])) {

       $sonuc=$db->update("blogs",$_POST,[
        "form_name" => "blogs_update",
        "columns" => "blogs_id",
        "dir" => "blogs",
        "file_name" => "blogs_file",
        "file_delete" => "delete_file"]
      );

      if ($sonuc['status']) {?>
       <div class="alert alert-success">
         Kayıt Başarılı
       </div>
     <?php } else {?>

      <div class="alert alert-danger">
       Kayıt Başarısız.<?php echo $sonuc['error'] ?>
     </div>
   <?php }
 }

 $sql=$db->wread("blogs","blogs_id",$_GET['blogs_id']);
 $row=$sql->fetch(PDO::FETCH_ASSOC);


 
 ?>

 <!-- update işlem sorgusu -->


 <form method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label>Yüklü Resim</label>
    <div class="row">
      <div class="col-xs-12">
        <img width="100" src="dimg/blogs/<?php echo $row['blogs_file'] ?>">
      </div>
    </div>
  </div>

  <div class="form-group">
    <label>Resim Seç</label>
    <div class="row">
      <div class="col-xs-12">
        <input type="file" name="blogs_file" class="form-control">
      </div>
    </div>
  </div>

  <div class="form-group">
    <label>Blogs Title</label>
    <div class="row">
      <div class="col-xs-12">
        <input type="text" name="blogs_title" required="" value="<?php echo $row['blogs_title'] ?>" class="form-control">
      </div>
    </div>
  </div>



     <div class="form-group">
         <label>Blog İçerik</label>
         <div class="row">
             <div class="col-xs-12">
                 <textarea id="editor1" class="form-control" name="blogs_content"><?php echo $row['blogs_content'] ?></textarea>
             </div>
         </div>
     </div>


     <script>
         CKEDITOR.replace( 'editor1' );
     </script>





  <input type="hidden" name="blogs_id" value="<?php echo $row['blogs_id']; ?>">
  <input type="hidden" name="delete_file" value="<?php echo $row['blogs_file']; ?>">

  <div align="right" class="box-footer">
    <button type="submit" class="btn btn-success" name="blogs_update">Düzenle</button>
  </div>



</form>
</div>

</div>

<?php }

 ?>




<!-- Default box -->
<div class="box box-primary">

 <div class="content-header">
  <h1 >Blog Listele</h1>
  <div align="right">
    <a href="?blogsInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
    <br><br>
  </div>
  <?php 
if (isset($_GET['blogsDelete'])) {

 $sonuc=$db->delete("blogs","blogs_id",$_GET['blogs_id'],$_GET['file_delete']);


   if ($sonuc['status']) {?>
       <div class="alert alert-success">
         Silme Başarılı
       </div>
     <?php } else {?>

      <div class="alert alert-danger ">
       Silme Başarısız.<?php echo $sonuc['error'] ?>
     </div>
   <?php }
 }
   ?>
</div>
<!-- /.box-header -->
<div class="box-body">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th align="center" width="5">#</th>
        <th>Blog</th>
        <th>Blog Başlık</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody id="sortable">

      <?php
      $sql=$db->read("blogs",[
          "columns_name" => "blogs_must",
          "columns_sort" => "ASC"
      ]);
      $say=1;
      while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

          <tr id="item-<?php echo $row['blogs_id'] ?>">
              <td><?php echo $say++; ?></td>
              <td class="sortable"><?php echo $row['blogs_title'] ?></td>

              <td align="center" width="5"><a href="?blogsUpdate=true&blogs_id=<?php echo $row['blogs_id'] ?>"><i class="fa fa-pencil-square"></i></a></td>
              <td align="center" width="5"><a href="?blogsDelete=True&blogs_id=<?php echo $row['blogs_id'] ?>&file_delete=<?php echo $row['blogs_file'] ?>"><i class="fa fa-trash-o"></i></a></td>
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

<script type="text/javascript">

    $(function() {
        $("#sortable").sortable({
            revert:true,
            handle:".sortable",
            stop:function(event,ui) {
                var data=$(this).sortable('serialize');
                console.log(data);
                $.ajax({
                    type:"POST",
                    dataType:"json",
                    data:data,
                    url:"netting/order-ajax.php?blogs_must=true",
                    success:function(msg) {
                        alert("Sıralama Başarılı...");
                    }
                });
            }



        });
        $("#sortable").disableSelection();
    });

</script>
