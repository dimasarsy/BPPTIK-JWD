<?php

	$daftarLokasi = array("Jakarta","Depok","Bogor","Tanggerang","Bekasi");
	asort($daftarLokasi);

	$tarif = [
			"A"=>5000,
			"B"=>8600,
			"C"=>9800,
			"D"=>11300,
			"E"=>15100
	];

	$PPN = 1195;
	$harga_materai = 3000;
	$biaya_pemeliharaan = 4400;

	function hitung_tarif_pemakaian($tarif, $meteran, $golongan)
	{
		$meteran = $_POST["meteran"];
		$tarif_pemakaian = $tarif[$golongan] * $meteran;
		return $tarif_pemakaian;
	}
	function hitung_tagihan($tarif, $meteran, $golongan, $biaya_pemeliharaan, $harga_materai, $PPN)
	{
		$tarif_pemakaian = $tarif[$golongan] * $meteran;
		$total_tagihan = $tarif_pemakaian + $PPN + $harga_materai + $biaya_pemeliharaan;
		return $total_tagihan;
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>PERHITUNGAN TAGIHAN PDAM</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

</head>
<body>

	<div class="container border">
		<h3 class="text-primary">Perhitungan Tagihan PDAM</h3>
		<form action="index.php" method="post" id="formTagihan">
			<div class="row">
				<div class="col-lg-2"><label for="lokasi">Lokasi:</label></div>
				<div class="col-lg-2">
					<select id="lokasi" name="lokasi">
					<option value="">- Lokasi -</option>
					<?php
						foreach ($daftarLokasi as $lokasi):
							echo "<option value='$lokasi'> $lokasi </option>";
						endforeach;

					?>
					</select>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-2"><label for="nama">Nama Pelanggan:</label></div>
				<div class="col-lg-2"><input type="text" id="nama" name="nama"></div>
			</div>

			<div class="row">
				<div class="col-lg-2"><label for="nomor">Nomor Pelanggan:</label></div>
				<div class="col-lg-2"><input type="number" id="nomor" name="nomor"></div>
			</div>

			<div class="row">
				<div class="col-lg-2"><label for="golongan">Golongan:</label></div>
				<div class="col-lg-2">
					<div class="form-check">
						<input type="radio" name="golongan" value="A">
						<label for="A">(A)</label>
					</div>
					<div class="form-check">
						<input type="radio" name="golongan" value="B">
						<label for="B">(B)</label>
					</div>
					<div class="form-check">
						<input type="radio" name="golongan" value="C">
						<label for="C">(C)</label>
					</div>
					<div class="form-check">
						<input type="radio" name="golongan" value="D">
						<label for="D">(D)</label>
					</div>
					<div class="form-check">
						<input type="radio" name="golongan" value="E">
						<label for="E">(E)</label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-2"><label for="meteran">Pemakaian (m3):</label>
				<div class="col-lg-2"><input type="number" id="meteran" name="meteran"></div>
			</div>
			<div class="row">
				<div class="col-lg-2"><button type="submit" class="btn btn-primary" form="formTagihan" value="Hitung" name="Hitung">Hitung</button>
				<div class="col-lg-2"></div>
			</div>
		</form>
	</div>

	<?php 
		if (isset($_POST['Hitung'])) {
		
			$lokasi = $_POST["lokasi"];
			$nama = $_POST["nama"];
			$nomor = $_POST["nomor"];
			$golongan = $_POST["golongan"];
			$meteran = $_POST["meteran"];
		

			// hitung_tarif_pemakaian($tarif, $meteran, $golongan)
			// hitung_tagihan($tarif, $meteran, $golongan, $biaya_pemeliharaan, $harga_materai, $harga_materai, $PPN)

			$tarif_pemakaian = hitung_tarif_pemakaian($tarif, $meteran, $golongan);
			$total_tagihan = hitung_tagihan($tarif, $meteran, $golongan, $biaya_pemeliharaan, $harga_materai, $PPN);

			echo "
				<br/>
				<div class='container'>
					<div class='row'>
						<div class='col-lg-2'>Lokasi:</div>
						<div class='col-lg-2'>".$lokasi."</div>
					</div>
					<div class='row'>
						<div class='col-lg-2'>Nama Pelanggan:</div>
						<div class='col-lg-2'>".$nama."</div>
					</div>
					<div class='row'>
						<div class='col-lg-2'>Nomor Pelanggan:</div>
						<div class='col-lg-2'>".$nomor."</div>
					</div>
					<div class='row'>
						<div class='col-lg-2'>Golongan Pemakaian:</div>
						<div class='col-lg-2'>".$golongan."</div>
					</div>
					<div class='row'>
						<div class='col-lg-2'>Pemakaian:</div>
						<div class='col-lg-2'>".$meteran."</div>
					</div>
					<div class='row'>
						<div class='col-lg-2'>Tarif Pemakaian:</div>
						<div class='col-lg-2'>Rp ".number_format($tarif_pemakaian).",-</div>
					</div>
					<div class='row'>
						<div class='col-lg-2'>Jumlah Tagihan:</div>
						<div class='col-lg-2'>Rp ".number_format($total_tagihan).",-</div>
					</div>

				</div>

			";
		}

	?>

</body>
</html> 