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
                $baihat = new BaiHat($row['id'], $row['tenBaiHat'], $row['caSi'], $row['idTheLoai']);
                array_push($baihats, $baihat);
            }
            return $baihats;
        }else {
            echo "Not connected";
        }
    }
    
    public function getBaiHat($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        if($conn != null){
            $sql = "SELECT * FROM baihat WHERE id = $id";
            $stmt = $conn->query($sql);

            $row = $stmt->fetch();
            $baihat = new BaiHat($row['id'], $row['tenBaiHat'], $row['caSi'], $row['idTheLoai']);
            return $baihat;
        }else {
            echo "Not connected";
        }
    }

    public function createBaiHat($baihat){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        if($conn != null){
            $sql = "INSERT INTO BaiHat (tenBaiHat, caSi, idTheLoai) VALUES ('{$baihat['tenBaiHat']}', '{$baihat['tenCaSi']}', {$baihat['idTheLoai']})";
            $stmt = $conn->query($sql);

            if($stmt){
                return true;
            }else{
                return false;
            }
        }
    }

    public function updateBaiHat($baihat){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        if($conn != null){
            $sql = "UPDATE baihat SET tenBaiHat = '{$baihat['tenBaiHat']}', 
                                    caSi = '{$baihat['tenCaSi']}',
                                    idTheLoai = '{$baihat['idTheLoai']}'
                                    WHERE id = '{$baihat['id']}'";
            $stmt = $conn->query($sql);

            if($stmt){
                return true;
            }else{
                return false;
            }
        }
    }

    public function deleteBaiHat($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        if($conn != null){
            $sql = "DELETE FROM baihat WHERE id = '{$id}'";
            $stmt = $conn->query($sql);

            if($stmt){
                return true;
            }else{
                return false;
            }
        }
    }
}