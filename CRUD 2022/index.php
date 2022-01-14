<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "RRI_MALANG";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	//jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "edit")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE surat_masuk set
											 	Pengirim = '$_POST[tnama]',
											 	Tanggal surat = '$_POST[ttanggal]',
                                                 Tanggal Diterima = '$_POST[tsurat]',
											 	Perihal Surat= '$_POST[tperihal]',
                                                 No_surat= '$_POST[tno]',
                                                 Penyimpanan fisik= '$_POST[tpenyimpanan]',
                                                 Distribusi surat= '$_POST[tdistribusi]',
											 WHERE id_pengirim = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO surat_masuk (Pengirim, Tanggal surat, Tanggal Diterima, Perihal Surat,
            No_surat, Penyimpanan fisik, Distribusi surat)
										  VALUES ('$_POST[tnama]',
                                                            '$_POST[ttanggal]',
                                                            '$_POST[tsurat]',
                                                            '$_POST[tperihal]',
                                                            '$_POST[tno]',
                                                            '$_POST[tpenyimpanan]',
                                                            '$_POST[tdistribusi]')
                                                            ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='index.php';
				     </script>";
			}
		}


		
	}


	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM surat_masuk WHERE id_pengirim = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vnama = $data['Pengirim'];
				$vtanggal = $data['Tanggal surat'];
				$vsurat = $data['Tanggal Diterima'];
				$vperihal = $data['Perihal Surat'];
                $vno = $data['No_surat'];
                $vpenyimpanan = $data['Penyimpanan fisik'];
                $vdistribusi = $data['Distribusi surat'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM surat_masuk WHERE id_pengirim = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='index.php';
				     </script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>ARSIP SURAT MASUK RRI MALANG</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>


    <h1 class=" text-center ">ARSIP SURAT MASUK</h1>
    <h2 class=" text-center ">LPP RRI MALANG</h2>
	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-dark text-white">
      Form Input Surat Masuk
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>Nama Pengirim</label>
	    		<input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Masukkan Nama Pengirim Disini !" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Tanggal Surat Masuk</label>
	    		<input type="text" name="ttanggal" value="<?=@$vtanggal?>" class="form-control" placeholder="Masukkan Tanggal Surat Masuk Disini !" required>
	    	</div>
            <div class="form-group">
	    		<label>Tanggal Surat Diterima</label>
	    		<input type="text" name="tsurat" value="<?=@$vsurat?>" class="form-control" placeholder="Masukkan Tanggal Surat Diterima Disini !" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Perihal Surat</label>
	    		<textarea class="form-control" name="tperihal"  placeholder="Masukkan perihal surat disini !"><?=@$vperihal?></textarea>
	    	</div>
            <div class="form-group">
	    		<label>No Surat</label>
	    		<input type="text" name="tno" value="<?=@$vno?>" class="form-control" placeholder="Masukkan Tanggal Surat Diterima Disini !" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Penyimpanan Fisik Surat</label>
	    		<select class="form-control" name="tpenyimpanan">
	    			<option value="<?=@$vpenyimpanan?>">Pilih Penyimpanan !<?=@$vpenyimpanan?></option>
                <option value="Eksternal">Eksternal</option>
                <option value="Korwil">Korwil</option>
                <option value="Direktur Utama">Direktur Utama</option>
                <option value="Direktur Program Produksi">Direktur Program Produksi</option>
                <option value="Direktur Umum">Direktur Umum</option>
                <option value="Direktur LPU">Direktur LPU</option>
                <option value="Direktur TMB">Direktur TMB</option>
	    		</select>
	    	</div>
            <div class="form-group">
	    		<label>Distribusi Surat</label>
	    		<select class="form-control" name="tdistribusi">
	    			<option value="<?=@$vdistribusi?>">Pilih Distribusi !<?=@$vdistribusi?></option>
                    <option value="Bag. Siaran">BAG. Siaran</option>
                <option value="Bag. Pemberitaan">BAG. Pemberitaan</option>
                <option value="Bag. LPU">BAG. LPU</option>
                <option value="Bag. Umum">BAG. Umum</option>
                <option value="Bag. TMB">BAG. TMB</option>
	    		</select>
	    	</div>

	    	<button type="submit" class="btn btn-primary" name="bsimpan">Save</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Clear</button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->

	<!-- Awal Card Tabel -->
	<div class="card mt-3">
	  <div class="card-header bg-success text-white">
	    Daftar Surat Masuk
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
            <th>No</th>
            <th>Nama Pengirim</th>
              <th>Tanggal Surat Masuk</th>
              <th>Tanggal Surat Diterima</th>
              <th>Perihal Surat</th>
              <th>Nomor Surat</th>
              <th>Penyimpanan Fisik Surat</th>
              <th>Distribusi surat</th>
              <th>Action</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from surat_masuk order by id_pengirim desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
            <td><?=$no++;?></td>
                <td><?=$data['Pengirim']?></td>
                <td><?=$data['Tanggal surat']?></td>
                <td><?=$data['Tanggal Diterima']?></td>
                <td><?=$data['Perihal Surat']?></td>
                <td><?=$data['No_surat']?></td>
                <td><?=$data['Penyimpanan fisik']?></td>
                <td><?=$data['Distribusi surat']?></td>
	    		<td>
	    			<a href="index.php?hal=edit&id=<?=$data['id_pengirim']?>" class="btn btn-primary"> Edit </a>
	    			<a href="index.php?hal=hapus&id=<?=$data['id_pengirim']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Delete </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>

	  </div>
	</div>
	<!-- Akhir Card Tabel -->



<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>