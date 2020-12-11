<?php
include 'conf/koneksi.php';
switch($_GET['type']){
	case 'fk':
	$q = $koneksi->query("SELECT foto_kejadian as a FROM data_pengajuan where id='".$_GET['id']."'")->fetch_assoc();
	$file = $q['a'];
	header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: private');
		header('Pragma: private');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		
		exit;

	break;
	case 'sp';
	$q = $koneksi->query("SELECT surat_pernyataan as a FROM data_pengajuan where id='".$_GET['id']."'")->fetch_assoc();
	$file = $q['a'];
	header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: private');
		header('Pragma: private');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		
		exit;

	break;
	case 'dl';
	$q = $koneksi->query("SELECT deskripsi_kejadian as a FROM data_pengajuan where id='".$_GET['id']."'")->fetch_assoc();
	$file = $q['a'];
	header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: private');
		header('Pragma: private');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		
		exit;

	break;
	default:
	break;
}

?>