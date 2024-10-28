<?php
require 'connection.php';

//jika terdapat 'action' dan 'id' maka melakukan sesuatu
    if(isset($_GET['action']) && isset($_GET['id'])){
        $action = $_GET['action'];
        $id = $_GET['id'];

        switch($action){
            case 'delete':
                delete_data($id);
                break;
            case 'edit':
                echo "";
                break;
            default :
            echo "Aksi Tidak Didefinisikan";
        }

    }else{
        echo "Aksi dan ID tidak terdefinisi";
    }

    function delete_data($id){
        global $connection;
        $res = mysqli_query($connection, "DELETE FROM tb_person WHERE id = " .$id);

        if($res){
            header("Location: index.php?messages=Data berhasil dihapus");
            exit();
        }else{
            header("Location: index.php?messages=Data gagal dihapus");
            exit();
        }
    }

    function update($data){
        global $connection;

        $id = $data['id_drivers'];
        $nama = $data['txt_nama'];
        $usia = $data['txt_usia'];
        $nomer = $data['txt_nomer'];
        $alamat = $data['txt_alamat'];

        $query = "UPDATE tb_drivers SET
        nama = '$nama',
        usia = '$usia',
        no_wa = '$nomer'
        alamat = $alamat, 
        WHERE id_drivers = $id
        ";

        mysqli_query($connection, $query);
        return mysqli_affected_rows($connection);
    };


?>