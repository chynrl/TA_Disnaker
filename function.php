<?php
require 'connection.php';

//jika terdapat 'action' dan 'id' maka melakukan sesuatu
    if(isset($_GET['action']) && isset($_GET['id_angkot'])){
        $action = $_GET['action'];
        $id_angkot = $_GET['id_angkot'];

        switch($action){
            case 'delete':
                delete_data($id_angkot);
                break;
            default :
            echo "Aksi Tidak Didefinisikan";
        }

    }else{
        echo "Aksi dan ID tidak terdefinisi";
    }

    function delete_data($id_angkot){
        global $conn;
        $res = mysqli_query($conn, "DELETE FROM tb_angkot WHERE id_angkot = " .$id_angkot);

        if($res){
            header("Location: dashboard/index.php?messages=Data berhasil dihapus");
            exit();
        }else{
            header("Location: dashboard/index.php?messages=Data gagal dihapus");
            exit();
        }
    }

    // function updatedriver($data){
    //     global $conn;

    //     $id = $data['id_drivers'];
    //     $nama = $data['txt_nama'];
    //     $usia = $data['txt_usia'];
    //     $nomer = $data['txt_nomer'];
    //     $alamat = $data['txt_alamat'];

    //     $query = "UPDATE tb_drivers SET
    //     nama = '$nama',
    //     usia = '$usia',
    //     no_wa = '$nomer'
    //     alamat = '$alamat' 
    //     WHERE id_drivers = $id
    //     ";

    //     mysqli_query($conn, $query);
    //     return mysqli_affected_rows($conn);
    // };

//     function updateangkot($data) {
//         global $conn;
    
//         $id_angkot = $data['id_angkot'];
//         $plat_nomer = htmlspecialchars($data['txt_plat_nomer']);
//         $trayek = htmlspecialchars($data['select_trayek']);
//         $garasi = htmlspecialchars($data['txt_garasi']);
//         $masa_pajak = htmlspecialchars($data['txt_masa_pajak']);
//         $deskripsi = htmlspecialchars($data['txt_deskripsi']);
    
//         // Pastikan query tidak memiliki kesalahan sintaks
//         $query = "UPDATE tb_angkot SET 
//                     plat_nomer = '$plat_nomer', 
//                     trayek = '$trayek', 
//                     garasi = '$garasi', 
//                     masa_pajak = '$masa_pajak', 
//                     deskripsi = '$deskripsi' 
//                     WHERE id_angkot = $id_angkot";
    
//         mysqli_query($conn, $query);
//         return mysqli_affected_rows($conn);
//     };    


// ?>