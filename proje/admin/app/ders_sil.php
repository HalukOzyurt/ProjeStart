<?php require 'inc/ust.php'; ?>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php 
        require 'inc/ust_menu.php'; 
        require 'inc/sol_menu.php'; 
        ?>
    </nav>

    <div id="page-wrapper">
	<?php 

	if (gisset()) {
		
		
		$id = get("id");

		$sil = $db->query("delete from ders where ders_id=?")->arr(array($id))->delete();

		if ( $sil) {
			
			
			git($host."admin/ders_liste&sil=true");

		
		}else{


			git($host."admin/ders_liste&sil=false");


		}


	}else{

		git($host."admin");

	}
	?>
    </div>

</div>
<?php require 'inc/alt.php'; ?>
