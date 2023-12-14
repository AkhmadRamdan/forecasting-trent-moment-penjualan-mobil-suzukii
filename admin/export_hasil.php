<!doctype html>
<html class="no-js" lang="en">

<?php 
	include 'koneksi.php';
	?>

<html>
<head>
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
                <table id="dataTable41" class="table table-hover text-center" style="width:100%"><thead class="thead-dark">
                    <tr>
												<th>No</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Penjualan</th>
                                                <th>X</th>
                                                <th>XY</th>
                                                <th>X^2</th>
												
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
                                                    <td><?php echo $v_xy ?></td>                            
                                                    <td><?php echo $v_xx ?></td>
                                                </tr>
												

                                                
                                                <?php 
                                                };

                                                
                                            ?>
                                            <tr style="font-size: medium;">
                                                    <td colspan="3" >jumlah</td>
                                                    <td><?php echo $jumlah_y ?></td>
                                                    <td><?php echo $jumlah_x ?></td>
                                                    <td><?php echo $jumlah_xy ?></td>
                                                    <td><?php echo $jumlah_xx ?></td>                         
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
                                                <th></th>
                                                <th>FORECAST</th>
                                                <th>ERROR</th>
                                                <th>MSE</th>
                                                <th>MAPE</th>                                                
                                                
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
                                            $jumlah_forecast = 0;
                                            $jumlah_mse = 0;
                                            $jumlah_mape = 0;
                                            
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
                                                
                                                $forecast = $a+($b*$var_x);
                                                $jumlah_forecast += $forecast;
                                                $eror = $data['i_harga'] - ($a+($b*$var_x));
                                                $v_mse = ($data['i_harga'] - ($a+($b*$var_x)))** 2;
                                                $jumlah_mse += $v_mse;
                                                $mse = $jumlah_mse/$n;
                                                $v_mape = abs($eror)/($data['i_harga'])*100;
                                                $jumlah_mape += $v_mape;
                                                $mape = $jumlah_mse/$n;
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $forecast ?></td>
                                                    <td><?php echo $eror ?></td>
                                                    <td><?php echo $v_mse ?></td>
                                                    <td><?php echo $v_mape ?></td>
                                                </tr>
                                                

                                                
                                                <?php 
                                                };

                                                ?>
                                                <tr style="font-size: medium;">
                                                    <td>jumlah</td>
                                                    <td><?php echo $jumlah_forecast ?></td>
                                                    <td></td>
                                                    <td><?php echo $jumlah_mse ?></td>
                                                    <td><?php echo $jumlah_mape ?></td>
                                                </tr>
                                                <tr style="font-size: medium;">
                                                    <td>total</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?php echo $mse ?></td>
                                                    <td><?php echo $mape ?></td>
                                                </tr>
                                        </tbody>
                                                
                                        </table>
								</div>
						</div>
	
                        <script>
$(document).ready(function() {
    $('#dataTable41').DataTable( {
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