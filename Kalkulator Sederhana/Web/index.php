<?php
  // Mendefine variabel bilangan yang akan dihitung
  if(isset($_POST['hitung'])){

  // Variabel integer dengan metode post
  $bil1 = $_POST['bil1'];
  $bil2 = $_POST['bil2'];

      // Fungsi untuk menghitung penjumlahan dari kedua bilangan
      function penjumlahan($bil1, $bil2)
      {
        $jumlah = $bil1 + $bil2;
        return $jumlah;
      }

      // Fungsi untuk menghitung pengurangan dari kedua bilangan      
      function pengurangan($bil1, $bil2)
      {
        $kurang = $bil1 - $bil2;
        return $kurang;
      }

      // Fungsi untuk menghitung perkalian dari kedua bilangan
      function perkalian($bil1, $bil2)
      {
        $kali = $bil1 * $bil2;
        return $kali;
      }

      // Fungsi untuk menghitung pembagian dari kedua bilangan
      function pembagian($bil1, $bil2)
      {
        $bagi = $bil1 / $bil2;
        return $bagi;
      }
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tugas 6-Implementasi User Interface</title>
    
    <!-- link untuk menghubungkan file css untuk mempercantik tampilan -->
    <link rel="stylesheet" type="text/css" href="stylee.css">
  </head>
  
  <body>
    <!-- atribut metode dan action untuk memproses isi form -->
    <form method="post" action="index.php">

      <!-- class css untuk mempercantik tampilan marquee -->
      <div class="kalkulator">
         <h1><marquee bgcolor=#e75874 height="30px" style="color: white; font-size: 20px ;align-content: top">Program Kalkulator Sederhana</marquee></h1>
      </div>

      <!-- class css untuk mempercantik tampilan kalkulator -->
      <div class="kalkulator-box">
        <img src="img/icon2.png" class="avatar">
          
          <!-- Form untuk menginput bilangan pertama dan kedua -->
          <p style="text-align: center;">Bilangan Pertama</p>
          <input type="text" name="bil1" placeholder="Masukan Bilangan Pertama" style="text-align: center;">

          <p style="text-align: center;">Bilangan Kedua</p>
          <input type="text" name="bil2" placeholder="Masukan Bilangan Kedua" style="text-align: center;"><br><br>

          <input type="submit" name="hitung">
      </div>
    </form>

          <!-- Syntax php -->
          <?php

            // isset digunakan untuk memproses tampilan perhitungan setelah tombol hitung diklik
            if(isset($_POST['hitung'])){

            // Hitung hasil penjumlahan, pengurangan, perkalian, dan pembagian
            $jumlah = penjumlahan($bil1, $bil2);
            $kurang = pengurangan($bil1, $bil2);
            $kali = perkalian($bil1, $bil2);
            $bagi = pembagian($bil1, $bil2);
          ?>
            <!-- class css untuk mempercantik tampilan hasil kalkulator -->
            <div class="kalkulator-hasil">

              <?php
                // Menampilkan data hasil inputan form
                echo "<h1 style='color: #be1558; font-size: 20px ;align-content: top'><b> HASIL PERHITUNGAN</b></h1>";

                echo "<img src='img/plus.png' style='width:20px'><b> Hasil penjumlahan adalah : </b>".$jumlah."<br>";
                echo "<img src='img/minus.png' style='width:20px'><b> Hasil pengurangan adalah : </b>".$kurang."<br>";
                echo "<img src='img/kali.png' style='width:20px'><b> Hasil perkalian adalah : </b>".$kali."<br>";
                echo "<img src='img/bagi.png' style='width:20px'><b> Hasil pembagian adalah : </b> ".$bagi."<br>";

                }
              ?><br>
            </div>

            <!-- Copyright -->
             <div class="footer">  
              <footer style="color: black">&copy;<?php echo " Muhammad Dimas - " . date("Y") ?></footer>
             </div>
          
    </form>

    </div>
  </body>
</html>