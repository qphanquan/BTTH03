<?php
require_once 'service/BaiHatService.php';
require_once 'service/TheLoaiService.php';
require_once 'model/BaiHat.php';
class HomeController{
    public function index(){
        $baihatService = new BaiHatService();
        $baihats = $baihatService->getAllBaiHat();

        include 'view/home/index.php';
    }

    public function create(){
        $baihatService = new BaiHatService();
        $theloaiService = new TheLoaiService();
        $theloais = $theloaiService->getAllTheLoai();

        include 'view/baihat/add_baihat.php';

        if(isset($_POST['submit'])){
            $tenBaiHat = $_POST['tenBaiHat'];
             $tenCaSi = $_POST['tenCaSi'];
             $idTheLoai = $_POST['idTheLoai'];
             $baihat = new BaiHat($tenBaiHat, $tenCaSi, $idTheLoai);

             $isUpdate = $baihatService->addBaiHat($baihat);

             if($isUpdate){
                header('location: /index.php');
                exit();
             }
             echo "lỗi dữ liệu";
        }
    }
}