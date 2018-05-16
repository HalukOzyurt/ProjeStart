<?php 
if (gisset()) {
	$id = get("id");
	$aktif = $db->query("update ders set ders_durum=? where ders_id=?")->arr(array(1,$id))->update();
	git($host."admin/ders_liste");

}else{
	git($host."admin");
}
