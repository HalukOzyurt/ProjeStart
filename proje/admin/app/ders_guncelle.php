<?php require 'inc/ust.php'; ?>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php 
        require 'inc/ust_menu.php'; 
        require 'inc/sol_menu.php'; 
        ?>
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ders Güncelle</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <?php 
                        if(gisset()){

                            $id= get("id");
                            $ders=$db->query("select * from ders where ders_id=?")->
                        }
                        if (pisset()) {
                           
                            $kategori_id = post("kategori");
                            $ders_baslik = post("ders_baslik");

                            if ( $ders_baslik == "" or $kategori_id=="" ) {
                                echo '<div class="alert alert-warning"><strong>Uyarı </strong>Gerekli Alanları Doldurun.</div>';
                            }else{

                                if (post("ders_durum")) {
                                    $ders_durum=1;
                                }else{
                                    $ders_durum=0;
                                }

                                $ders_resim = "";
                                if (isset($_FILES["ders_resim"]["name"])) {
                                    $upload = new Uploads($_FILES["ders_resim"]);
                                    if ($upload->yukle("../public/yuklenenler/")){
                                        $ders_resim = $upload->yuklenen;
                                    }
                                }

                                if ( $ders_resim!="") {
                                    $guncelle = $db->query("update ders set ders_baslik=?, ders_resim=?,ders_durum=?,ders_kategori_id=?")->arr(array($ders_baslik,$ders_resim,$ders_durum,$kategori_id))->update();
                                }else{
                                    $guncelle = $db->query("update ders set ders_baslik=?,ders_durum=?,ders_kategori_id=?")->arr(array($ders_baslik,$ders_durum,$kategori_id))->update();
                                }

                                if ( $guncelle ) {
                                    echo '<div class="alert alert-success"><strong>Başarılı </strong>Bilgiler Eklendi</div>';
                                }else{
                                    echo '<div class="alert alert-danger"><strong>Başarısız </strong>Bilgiler Eklenemedi</div>';
                                }
                            }
                        }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori">
                                                <option>Seçiniz</option>
                                                <?php 
                                                $kategoriler = $db->query("select * from kategori")->select();
                                                foreach ($kategoriler as $key => $value) {
                                                    echo "<option value='{$value['kategori_id']}'>{$value['kategori_baslik']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>   
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>Dersler</option>
                                                <?php 
                                                $dersler = $db->query("select * from ders")->select();
                                                foreach ($dersler as $key => $value) {
                                                    echo "<option>{$value['ders_baslik']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>                                    
                                        <div class="form-group">
                                            <label>Ders Başlık</label>
                                            <input class="form-control" name="ders_baslik">
                                            <p class="help-block">Gerekli.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Ders Durum</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="ders_durum" id="aktif" value="1" checked>Aktif
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="ders_durum" id="pasif" value="0">Pasif
                                                </label>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label>Ders Resim</label>
                                            <input type="file" name="ders_resim">
                                        </div>
                                        <button type="submit" class="btn btn-info">Kaydet</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>            
        </div>
    </div>
</div>
<?php require 'inc/alt.php'; ?>
