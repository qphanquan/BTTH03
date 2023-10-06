<?php
require_once 'service/BaiHatService.php';
require_once 'service/TheLoaiService.php';
class HomeController{
    public function index(){
        $baihatService = new BaiHatService();
        $baihats = $baihatService->getAllBaiHat();
        $theloaiService = new TheLoaiService();
        $theloais = $theloaiService->getAllTheLoai();

        include 'view/home/index.php';
    }

    public function createBaiHat(){
        $theloaiService = new TheLoaiService();
        $theloais = $theloaiService->getAllTheLoai();

        include 'view/baihat/add_baihat.php';
    }

    public function selectBaiHat(){
        $id = $_GET["id"];
        $baihatService = new BaiHatService();
        $theloaiService = new TheLoaiService();
        $theloais = $theloaiService->getAllTheLoai();
        $baihat = $baihatService->getBaiHat($id);

        include 'view/baihat/edit_baihat.php';
    }
}