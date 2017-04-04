<?php
include 'koneksi.php';
    if( !$xml = simplexml_load_file('perhotelan.xml') ) //using simplexml_load_file function to load xml file
    {
        echo 'load XML failed ! ';
    }
    else
    {
        echo '<h1>Data Hotel</h1>';
		foreach( $xml as $simpan ) //parse the xml file into object
        {
			$namahotel = $simpan->namahotel; 
			$hargaperhari = $simpan->hargaperhari; 
			$kamar = $simpan->kamar; 
			$wifi = $simpan->wifi;
			$kolam = $simpan->kolam;
			$namapemilik = $simpan->namapemilik;	
			$nohp = $simpan->nohp;

            echo 'namahotel : '.$namahotel.'<br />';
            echo 'hargaperhari : '.$hargaperhari.'<br />';
			echo 'kamar : '.$kamar.'<br />';
			echo 'wifi : '.$wifi.'<br />';
			echo 'kolam : '.$kolam.'<br />';
			echo 'namapemilik : '.$namapemilik.'<br />';
			echo 'nohp: '.$nohp.'<br />';
//save to database
			$q = "INSERT INTO hotel VALUES('','$namahotel','$hargaperhari','$kamar','$wifi','$kolam','$namapemilik','$nohp')";
			$result = mysql_query($q);
        }
			if ($result) {
			echo '<h2>Data Berhasil di Simpan </h2>';
			}
			else echo '<h2>Data Gagal di Simpan</h2>';
    }
?> 