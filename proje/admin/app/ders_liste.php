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
                    <h1 class="page-header">Tüm Dersler</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table">
                                        <tr>
                                            <th></th>
                                            <th>No</th>
                                            <th>Ders Başlık</th>
                                            <th>Kategori</th>
                                            <th>Ders Resim</th>
                                            <th style="width:10px;">Durum</th>
                                            <th style="width:10px;"></th>
                                            <th style="width:10px;"></th>
                                        </tr>
                                        <?php 
                                        $dersler = $db->query("select * from ders inner join kategori on ders.ders_kategori_id=kategori.kategori_id")->select();
                                        $no=1;
                                        foreach ($dersler as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><a href="#"><i class="fa fa-angle-up fa-3x"></i><i class="fa fa-angle-down fa-3x"></i></a></td>
                                                <td><?=$no++; ?></td>
                                                <td><?=$value['ders_baslik'];?></td>
                                                <td><?=$value['kategori_baslik'];?></td>
                                                <td><img src="../public/yuklenenler/<?=$value["ders_resim"];?>" alt="" height="100"></td>
                                                <td>
                                                <?php
                                                $value["ders_durum"];
                                                if ($value["ders_durum"]==1) {
                                                   echo '<a href="ders_pasif_et&id='.$value["ders_id"].'" class="btn btn-success" onclick="return confirm(\'Emin misiniz?\');">Pasif Et</a>';
                                                }else{
                                                    echo '<a href="ders_aktif_et&id='.$value["ders_id"].'" class="btn btn-danger" onclick="return confirm(\'Emin misiniz?\');">Aktif Et</a>';
                                                }
                                                ?>
                                                </td>
                                                <td>
                                                    <a href="<?=$host."admin/ders_guncelle&id=".$value["ders_id"]; ?>" class="btn btn-info">Güncelle</a>
                                                </td>
                                                <td>
                                                    <a href="<?=$host."admin/ders_sil&id=".$value["ders_id"]; ?>" class="btn btn-danger" onclick="return confirm('Eminmisiniz?');">Sil</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>
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
