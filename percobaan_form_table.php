    <style>
      h2{
        text-align:center;
      }
      h3{
        text-align:center;
        margin:30px 0px 30px 0px;
      }
    </style>
    
    
    <br><br>
    <h2>Kalkulator BMI</h2>
    <br><br>
    
  <form method = "POST" action = "#table">
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Pasien</label> 
    <div class="col-8">
      <input id="nama" name="nama" placeholder="Masukkan nama pasien" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="kode" class="col-4 col-form-label">Kode Pasien</label> 
    <div class="col-8">
      <input id="kode" name="kode" placeholder="Masukkan kode pasien" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="tanggal" class="col-4 col-form-label">Tanggal Periksa</label> 
    <div class="col-8">
      <input id="tanggal" name="tanggal" type="date" class="form-control" required="required" >
    </div>
  </div>
  <div class="form-group row">
    <label for="gender" class="col-4 col-form-label">Gender</label> 
    <div class="col-8">
      <select id="gender" name="gender" class="custom-select" required="required">
        <option value="pilih">-- Pilih Gender --</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <label for="berat" class="col-4 col-form-label">Berat Badan</label> 
    <div class="col-8">
      <input id="berat" name="berat" placeholder="Masukkan Berat Badan (kg)" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="tinggi" class="col-4 col-form-label">Tinggi Badan</label> 
    <div class="col-8">
      <input id="tinggi" name="tinggi" placeholder="Masukkan Tinggi Badan (cm)" type="text" class="form-control" required="required">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-success btn-block">Submit</button>
    </div>
  </div>
</form>

<!-- PHP ARRAY SESSION -->
<?php

    $nama = $_POST["nama"];
    $kode = $_POST["kode"];
    $tanggal = $_POST["tanggal"];
    $gender = $_POST["gender"];
    $berat = $_POST["berat"];
    $tinggi = $_POST["tinggi"];

    require_once "class_bmi.php";
    require_once "class_pasien.php";

    $status = new bmi($berat, $tinggi);
    
    $dp1 = ['id'=>1,'Tanggal_Periksa'=>'2022-01-10', 'Kode_Pasien' => 'P001','Nama_Pasien'=>'Ahmad','Gender'=> 'L','Berat'=>69.8, 'Tinggi'=>169, 'Nilai_BMI'=>24.7, 'Status_BMI'=>'Kelebihan Berat Badan'];
    $dp2 = ['id'=>2,'Tanggal_Periksa'=>'2022-01-10', 'Kode_Pasien' => 'P002','Nama_Pasien'=>'Rina','Gender'=> 'P','Berat'=>55.3, 'Tinggi'=>165, 'Nilai_BMI'=>20.3, 'Status_BMI'=>'Normal (Ideal)'];
    $dp3 = ['id'=>3,'Tanggal_Periksa'=>'2022-01-11', 'Kode_Pasien' => 'P003','Nama_Pasien'=>'Lutfi','Gender'=> 'L','Berat'=>45.2, 'Tinggi'=>171, 'Nilai_BMI'=>15.4, 'Status_BMI'=>'Kekurangan Berat Badan'];
    $dp4 = ['id'=>1,'Tanggal_Periksa'=> $tanggal, 'Kode_Pasien' => $kode,'Nama_Pasien'=>$nama,'Gender'=> $gender,'Berat'=>$berat, 'Tinggi'=>$tinggi, 'Nilai_BMI'=>$status->getnilaiBMI(), 'Status_BMI'=>$status->getstatusBMI()];
    $ar_data = [$dp1, $dp2, $dp3, $dp4];


?>
    <hr/>
    <h3>Data Pasien</h3>

    <!-- Tabel daftar siswa -->
    <div class="container-fluid">
        
    <table class="table table-bordered" id="table">
      <thead class="table-info">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal Periksa</th>
          <th scope="col">Kode Pasien</th>
          <th scope="col">Nama Pasien</th>
          <th scope="col">Gender</th>
          <th scope="col">Berat (kg)</th>
          <th scope="col">Tinggi (cm)</th>
          <th scope="col">Nilai BMI</th>
          <th scope="col">Status BMI</th>
        </tr>
      </thead>
      <tbody>

        <?php
          $nomor = 1;
          foreach($ar_data as $data){
            echo '<tr>';
            echo '<td>'.$nomor.'</td>';
            echo '<td>'.$data['Tanggal_Periksa'].'</td>';
            echo '<td>'.$data['Kode_Pasien'].'</td>';
            echo '<td>'.$data['Nama_Pasien'].'</td>';
            echo '<td>'.$data['Gender'].'</td>';
            echo '<td>'.$data['Berat'].'</td>';
            echo '<td>'.$data['Tinggi'].'</td>';
            echo '<td>'.$data['Nilai_BMI'].'</td>';
            echo '<td>'.$data['Status_BMI'].'</td>';
            $nomor++;  //untuk menambahkan 1 di setiap nomer nya
          }
        ?>

      </tbody>
    </table>

    </div>

