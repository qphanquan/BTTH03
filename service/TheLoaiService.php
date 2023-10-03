<?php
require_once 'model/TheLoai.php';
class TheLoaiService {
    public function getAllTheLoai(){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        if($conn != null){
            $sql = "SELECT * FROM theloai";
            $stmt = $conn->query($sql);

            $theloais = [];
            while($row = $stmt->fetch()){
                $theloai = new TheLoai($row['id'], $row['tenTheloai']);
                array_push($theloais, $theloai);
            }
            return $theloais;
        }else {
            echo "Not connected";
        }
    } 
}