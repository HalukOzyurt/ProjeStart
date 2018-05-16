<?php 
if (gisset()) {
	$id = get("id");
	$pasif = $db->query("update ders set ders_durum=? where ders_id=?")->arr(array(0,$id))->update();
	git($host."admin/ders_liste");

}else{
	git($host."admin");
}
