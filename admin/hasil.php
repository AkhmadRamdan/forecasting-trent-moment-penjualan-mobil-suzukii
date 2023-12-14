<!doctype html>
<html class="no-js" lang="en">

<!-- cek apakah sudah login -->

    <?php 
    include 'function.php';
    session_start();
    if(!isset($_SESSION['role'])){
        header("location:login.php");
    } else {
        $role = $_SESSION['role'];
    };

    if(isset($_POST['databaru'])){
        if(tambahData($_POST) > 0 ){
            //berhasil bikin
              echo " <script>
            alert('Data Berhasil ditambah!');
            document.location.haref='hasil.php';
            </script>";  
          } else {
            echo " <script>
            alert('Gagal!');
            document.location.haref='hasil.php';
            </script>";  
          }
        
    }

    if(isset($_POST['edit'])){

            if(ubahData($_POST) > 0 ){
            //berhasil bikin
              echo " <script>
            alert('Data Berhasil Diubah!');
            document.location.haref='hasil.php';
            </script>";  
          } else {
            echo " <script>
            alert('Gagal!');
            document.location.haref='hasil.php';
            </script>";  
          }
    }
    if(isset($_POST['serahkan'])){

            if(serahkanData($_POST) > 0 ){
            //berhasil bikin
              echo " <script>
            alert('Data Telah Diserahkan!');
            document.location.haref='hasil.php';
            </script>";  
          } else {
            echo " <script>
            alert('Gagal!');
            document.location.haref='hasil.php';
            </script>";  
          }
    }
?>

<!-- //update -->
<?php 
    
     ?>
              
        


<!-- edit -->
    <?php 
    // include 'function.php';
    //     if(isset($_POST['edit'])){
            
    //         if(ubahData($_POST) > 0 ){
    //         //berhasil bikin
    //           echo " <script>
    //         alert('Data Berhasil Diubah!');
    //         document.location.haref='user.php';
    //         </script>";  
    //       } else {
    //         echo " <script>
    //         alert('Gagal!');
    //         document.location.haref='user.php';
    //         </script>";  
    //       }
    // }
    ?>



<head>
<meta charset="utf-8">
	<link rel="icon" 
      type="image/png" 
      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kelola User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
	
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start-->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                    <a href="index.php"><img src="../IMG/s.png" alt="logo" width="80%"></a>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li><a href="index.php"><span>Dashboard</span></a></li>
                            <li >
                                <a href="data.php"><i></i><span>Data</span></a>
                            </li>
                            <li class="active">
                                <a href="hasil.php"><i></i><span>Perhitungan</span></a>
                            </li>  
                            <li>
                                <a href="prediksi.php"><i></i><span>Prediksi</span></a>
                            </li>                           
                            <li>
                                <a href="user.php"><i></i><span>Kelola Admin</span></a>
                            </li>
                            <li>
                                <a href="logout.php"><span>Logout</span></a>
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
                                <script type='text/javascript'>
                        <!--
                        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                        var date = new Date();
                        var day = date.getDate();
                        var month = date.getMonth();
                        var thisDay = date.getDay(),
                            thisDay = myDays[thisDay];
                        var yy = date.getYear();
                        var year = (yy < 1000) ? yy + 1900 : yy;
                        document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);        
                        //-->
                        </script></b></div></h3>

                        </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->

            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <h2>Perhitungan Data</h2>
                                     <!-- <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal1" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Data Baru</button> -->
                                </div>
                                <table id="dataTable3" class="table table-hover text-center" style="width:100%"><thead class="thead-dark">
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
                                                // $v_mape = abs($eror)/($data['i_harga'])*100;
                                                $v_mape = abs(($data['i_harga']-$forecast)/$data['i_harga']);
                                                $jumlah_mape += $v_mape;
                                                // $mape = $jumlah_mse/$n;
                                                $mape = 100*$jumlah_mape/$n;
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
									<!-- <a href="export_hasil.php" target="_blank" class="btn btn-info">Export Data</a> -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Forecasting Penjualan Mobil Suzuki</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- modal input -->
        <div id="myModal1" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data</h4>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input style ='text-transform: lowercase;' name="id_data" type="hidden" class="form-control" placeholder="id_data">
                            <div class="form-group">
                                <label for="bulan">Bulan</label>
                                <select  class="form-control" id="exampleFormControlSelect2" name="bulan" id="bulan">
                                    <option value="--">--PILIH BULAN--</option>
                                    <option value="januari">januari</option>
                                    <option value="februari">februari</option>
                                    <option value="maret">maret</option>
                                    <option value="april">april</option>
                                    <option value="mei">mei</option>
                                    <option value="juni">juni</option>
                                    <option value="juli">juli</option>
                                    <option value="agustus">agustus</option>
                                    <option value="september">september</option>
                                    <option value="oktober">oktober</option>
                                    <option value="november">november</option>
                                    <option value="desember">desember</option>                                  
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select  class="form-control" id="exampleFormControlSelect2" name="tahun" id="tahun" placeholder="tahun">
                                    <option value="--">--PILIH TAHUN--</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>                                                                   
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="i_harga">Indeks Harga</label>
                                <input style ='text-transform: lowercase;' name="i_harga" type="text" class="form-control" placeholder="indeks harga konsumen">
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" value="Submit" name="databaru">
                        </div>
                    </form>
                </div>
            </div>
        </div>
	
 <?php  
    // $id = $_GET['id_data'];
    // $query = mysqli_query($conn,"SELECT * FROM hasil where id_data='$id'");
    // $hasil = mysqli_fetch_array($query);
?>
    <!-- modal update -->
    <div id="editModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data</h4>
                </div>
                <form method="post" enctype="multipart/form-data" action="">
                <div class="modal-body">
                    <input type="hidden" name="id_data" id="idd">
                            <div class="form-group">
                                <label for="bulan">Bulan</label>
                                <select  class="form-control" id="exampleFormControlSelect2" name="bulan" id="bulan" >
                                    <option value="--">--PILIH BULAN--</option>
                                    <option value="januari">januari</option>
                                    <option value="februari">februari</option>
                                    <option value="maret">maret</option>
                                    <option value="april">april</option>
                                    <option value="mei">mei</option>
                                    <option value="juni">juni</option>
                                    <option value="juli">juli</option>
                                    <option value="agustus">agustus</option>
                                    <option value="september">september</option>
                                    <option value="oktober">oktober</option>
                                    <option value="november">november</option>
                                    <option value="desember">desember</option>                                  
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select  class="form-control" id="exampleFormControlSelect2" name="tahun" id="tahun">
                                    <option value="--">--PILIH TAHUN--</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>                                                                   
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="i_harga">Indeks Harga Konsumen</label>
                                <input style ='text-transform: lowercase;' name="i_harga" id="i_harga" type="text" class="form-control" placeholder="indeks harga konsumen">
                            </div>              
                    </div> 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <input  type="submit" class="btn btn-primary" value="Submit" name="edit">
                    </div>
                </form>
            </div>
        </div>
    </div>

	<script>
		$(document).ready(function() {
		$('input').on('keydown', function(event) {
			if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
			   var $t = $(this);
			   event.preventDefault();
			   var char = String.fromCharCode(event.keyCode);
			   $t.val(char + $t.val().slice(this.selectionEnd));
			   this.setSelectionRange(1,1);
			}
		});
	
	
	$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );
	</script>

    
	
    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>
	<!-- Start datatable js -->
	 <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    </script>
    <!-- all line chart activation -->
    <script src="../assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="../assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
	
	<script>
		$(document).ready(function() {
		$('input').on('keydown', function(event) {
			if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
			   var $t = $(this);
			   event.preventDefault();
			   var char = String.fromCharCode(event.keyCode);
			   $t.val(char + $t.val().slice(this.selectionEnd));
			   this.setSelectionRange(1,1);
			}
		});
	});
</script>	
</body>

</html>
