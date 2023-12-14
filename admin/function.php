 <?php 
include 'koneksi.php';

// tambah admin
        function tambahAdmin($data){
            global $conn;

            $username = $data['username'];
            $password = $data['password'];
            $nama = $data['nama'];
            $sql = "INSERT into user(username,password,nama) values('$username','$password','$nama')";

            mysqli_query($conn, $sql);
            return mysqli_affected_rows($conn);
        }
        

// ubah data admin
        function ubahAdmin($data){
            global $conn;

            $id= $data['id_user'];
            $username= $data['username'];
            $password= $data['password'];
            $nama= $data['nama'];
            $sql = "UPDATE user SET username = '$username', password = '$password', nama = '$nama' WHERE id_user= '$id' ";
            
            mysqli_query($conn, $sql);
            return mysqli_affected_rows($conn);
         }

// hapus admin
         function hapusAdmin($data){
            global $conn;

            $id = $data['id_user'];
            $sql = "DELETE from user where id_user='$id'";

            mysqli_query($conn, $sql);
            return mysqli_affected_rows($conn);
        }


// tambahData data
         function tambahData($data){
            global $conn;

            $id = $data['id_data'];
            $bulan = $data['bulan'];
            $tahun = $data['tahun'];
            $i_harga = $data['i_harga'];
            
            $sql2 = "INSERT INTO data VALUES( '', '$bulan', '$tahun', '$i_harga')";
        
            
            mysqli_query($conn, $sql2);
            return mysqli_affected_rows($conn);
               
        }

// ubahData data
        function ubahData($data){
            global $conn;

            $id = $data['id_data'];
            $bulan = $data['bulan'];
            $tahun = $data['tahun'];
            $i_harga = $data['i_harga'];

            $sql2 = "UPDATE data SET bulan = '$bulan', tahun = '$tahun', i_harga = '$i_harga' WHERE id_data= '$id' ";
            
            mysqli_query($conn, $sql2);
            return mysqli_affected_rows($conn);
            
            
        }

// hapus data
        function hapusData($data){
            global $conn;

            $id = $data['id_data'];
            $sql2 = "DELETE from data where id_data='$id'";

            mysqli_query($conn, $sql2);
            return mysqli_affected_rows($conn);

        }


?>