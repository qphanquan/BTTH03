<?php
require_once 'service/BaiHatService.php';
class StrongController{
    public function create(){
        echo "Create Strong";
        $baihatService = new BaiHatService();

        if(isset($_POST['submit'])){
            $tenBaiHat = $_POST['tenBaiHat'];
            $tenCaSi = $_POST['tenCaSi'];
            $idTheLoai = $_POST['idTheLoai'];

            $baihat = [
                'tenBaiHat' => $tenBaiHat,
                'tenCaSi' => $tenCaSi,
                'idTheLoai' => $idTheLoai,
            ];

             $isUpdate = $baihatService->createBaiHat($baihat);
             if($isUpdate){
                header('location: http://localhost:3000/index.php');
                exit();
             }

             $msg = 'Lỗi thêm dữ liệu';
            header("location: http://localhost:3000/index.php?action=error&error=$msg");
        }
    }

    public function update(){
        $baihatService = new BaiHatService();
        $id = $_GET['id'];

        if(isset($_POST['submit'])){
            $tenBaiHat = $_POST['tenBaiHat'];
            $tenCaSi = $_POST['tenCaSi'];
            $idTheLoai = $_POST['idTheLoai'];

            $baihat = [
                'id' => $id,
                'tenBaiHat' => $tenBaiHat,
                'tenCaSi' => $tenCaSi,
                'idTheLoai' => $idTheLoai,
            ];

             $isUpdate = $baihatService->updateBaiHat($baihat);
             if($isUpdate){
                header('location: http://localhost:3000/index.php');
                exit();
             }

             $msg = 'Lỗi thêm dữ liệu';
            header("location: http://localhost:3000/index.php?action=error&error=$msg");
        }
    }

    public function delete(){
        $id = $_GET['id'];
        $baihatService = new BaiHatService();
        if($baihatService->deleteBaiHat($id)){
            header('location: http://localhost:3000/index.php');
            exit();
        }else{
            echo 'Không thể xóa';
        }
    }
}
