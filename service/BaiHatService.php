<?php
require_once 'model/BaiHat.php';
class BaiHatService {
    public function getAllBaiHat(){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        if($conn != null){
            $sql = "SELECT * FROM baihat ORDER BY id DESC";
            $stmt = $conn->query($sql);

            $baihats = [];
            while($row = $stmt->fetch()){
                $baihat = new BaiHat($row['tenBaiHat'], $row['caSi'], $row['idTheLoai']);
                array_push($baihats, $baihat);
            }
            return $baihats;
        }else {
            echo "Not connected";
        }
    } 

    public function addBaiHat($baihat){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        if($conn != null){
            $sql = "INSERT into BaiHat (tenBaiHat, caSi, idTheLoai) values ('{$baihat['tenBaiHat']}', '{$baihat['tenBaiHat']}', {$baihat['idTheLoai']})";
            $stmt = $conn->query($sql);

            if($stmt){
                return true;
            }else{
                return false;
            }
        }
    }
}