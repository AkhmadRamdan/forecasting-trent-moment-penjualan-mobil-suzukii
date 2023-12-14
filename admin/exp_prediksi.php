<!doctype html>
<html class="no-js" lang="en">

<?php
    
    if(isset($_POST['submit'])) {
		$tahun = $_POST['tahun'];
        
        $predik_x = 0;
        if($tahun=="2022"){
            $predik_x = 24;
        }elseif($tahun=="2023"){
            $predik_x = 36;
        }elseif($tahun=="2024") {
            $predik_x = 48;
        }elseif($tahun=="2025"){
            $predik_x = 60;
        }elseif($tahun=="2026"){
            $predik_x = 72;
        }
        
    }
    ?>
<?php 
	include 'koneksi.php';
	?>  

<html>
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Charts / Chart.js - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<title>Data Penjualan Mobil Suzuki</title>
<link rel="icon" 
      type="image/png" 
      href="favicon.png">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>

</head>

<body>
		<div class="container">
			<h2>Data Hasil Perhitungan</h2>
				<div class="data-tables datatable-dark">
                <table id="dataTable3" class="table table-hover text-center" style="width:100%"><thead class="thead-dark">
                    <tr>
												<th>No</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Penjualan</th>
                                                <th>X</th>
												
											</tr></thead><tbody>

											<?php 
											$form=mysqli_query($conn,"SELECT * FROM data");
											$no=1;
                                            $x = 0;
                                            $jumlah_x = 0;
                                            $jumlah_y = 0;
                                            $jumlah_xx = 0;
                                            $jumlah_xy = 0;
                                            $n = mysqli_num_rows($form);

											while($data=mysqli_fetch_array($form)){
                                                $id_data = $data['id_data'];
                                                $var_x = $x++;
                                                $v_x = $var_x;
                                                $v_y = $data['i_harga'];
                                                $v_xx = ($var_x **2);
                                                $v_xy = ($data['i_harga'] *$var_x);
                                                
                                                $jumlah_x += $var_x;
                                                $jumlah_y += $data['i_harga'];
                                                $jumlah_xx += ($var_x **2);
                                                $jumlah_xy += ($data['i_harga'] *$var_x);
                                                
												?>
												<tr>
                                                    
													<td><?php echo $no++ ?></td>
                                                    <td><?php echo $data['bulan'] ?></td>
                                                    <td><?php echo $data['tahun'] ?></td>
                                                    <td><?php echo $data['i_harga'] ?></td>
                                                    <td><?php echo $v_x ?></td>
                                                <?php 
                                                };

                                                
                                            ?>
                                            <tr style="font-size: medium;">
                                                    <td colspan="3" >jumlah</td>
                                                    <td><?php echo $jumlah_y ?></td>
                                                    <td><?php echo $jumlah_x ?></td>                       
                                                </tr>
                                                <?php  
                                                $a = (($jumlah_y * $jumlah_xx) - ($jumlah_x * $jumlah_xy)) / (($n*$jumlah_xx) - ($jumlah_x*$jumlah_x));
	                                            $b = (($n*$jumlah_xy)-($jumlah_x*$jumlah_y)) / (($n*$jumlah_xx)-($jumlah_x**2));
                                                ?>
                                                <tr>
                                                    <td colspan="3" >a =</td>
                                                    <td><?php echo $a ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" >b =</td>
                                                    <td><?php echo $b ?></td>
                                                </tr>


										</tbody>
                                                
										</table>

                                        <table id="dataTable3" class="table table-hover text-center" style="width:100%"><thead class="thead-dark">
                                            <tr>
                                                <th>Tahun</th>
                                                <th>Bulan</th>
                                                <th>X</th>
                                                <th>FORECAST</th>
                                                
                                                                                               
                                                
                                            </tr></thead><tbody>

                                            <?php 
                                            $form=mysqli_query($conn,"SELECT * FROM data");

                                            $no=1;
                                            $x = $predik_x ;
                                            $jumlah_x = 0;
                                            $jumlah_y = 0;
                                            $jumlah_xx = 0;
                                            $jumlah_xy = 0;
                                            $n = mysqli_num_rows($form);
                                            $jumlah_forecast = 0;
                                            $jumlah_mse = 0;
                                            $jumlah_mape = 0;
                                            $count = 1;
                                            $data_aktual = array();
                                            $data_forecast = array();
                                            while($data=mysqli_fetch_array($form)){
                                                $id_data = $data['id_data'];
                                                $var_x = $x++;
                                                $v_x = $var_x;
                                                $v_y = $data['i_harga'];
                                                $v_xx = ($var_x **2);
                                                $v_xy = ($data['i_harga'] *$var_x);
                                                // $x_predik = max($v_x);
                                                
                                                $jumlah_x += $var_x;
                                                $jumlah_y += $data['i_harga'];
                                                $jumlah_xx += ($var_x **2);
                                                $jumlah_xy += ($data['i_harga'] *$var_x);
                                                
                                                $forecast = $a+($b*$var_x);
                                                $jumlah_forecast += $forecast;
                                                $eror = $data['i_harga'] - ($a+($b*$var_x));
                                                $v_mse = ($data['i_harga'] - ($a+($b*$var_x)))** 2;
                                                $jumlah_mse += $v_mse;
                                                $mse = $jumlah_mse/$n;
                                                $v_mape = abs($eror)/($data['i_harga'])*100;
                                                $jumlah_mape += $v_mape;
                                                $mape = $jumlah_mse/$n;
                                                array_push($data_aktual,$v_y);  
                                                array_push($data_forecast,$forecast);   
                                                ?>
                                                <tr>
                                                
                                                    <td><?php echo $tahun; ?> </td>
                                                    <td><?php echo $data['bulan'] ?></td>
                                                    <td><?php echo $var_x ?></td>
                                                    <td><?php echo $forecast ?></td>
                                                </tr>
                                                

                                                
                                                <?php 
                                            
                                                if($count <12){
                                                    $count ++;
                                                }else{
                                                    break;
                                                }
                                                };
             
                                                ?>
                                                
                                               
                                        </tbody>
                                                
                                        </table>
								</div>
						</div>


<h3>Grafik  : </h3>

<section class="section">
  <div class="row">

    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
        <div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  var firstdata = {
    label: 'Data',
    data: [<?php 
        foreach($data_aktual as $value){
            echo $value.",";
        }
        ?>],
    backgroundColor: 'rgba(255, 99, 132, 0.2)',
    borderColor: 'rgba(255, 99, 132, 1)',
    borderWidth: 1
  };

  var seconddata = {
    label: 'Forecast',
    data: [<?php 
        foreach($data_forecast as $value){
            echo $value.",";
        }
        ?>],
    backgroundColor: 'rgba(54, 162, 235, 0.2)',
    borderColor: 'rgba(54, 162, 235, 1)',
    borderWidth: 1
  }

  // combine beetwen datafirst and seccond data
  var data = [firstdata, seconddata];

  // show data to chart
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Jan","Feb","Mar","Apr","May", "Jun","Jul","Aug","Sep","Oct","Nov","Des"],
      datasets: data
    },

  });
</script>
        </div>
      </div>
    </div>


    
	
 <!-- Vendor JS Files -->
 <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


<script>
$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        	'excel', 'pdf', 'print',
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

	

</body>

</html>