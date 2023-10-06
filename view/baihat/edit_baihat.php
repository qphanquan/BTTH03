<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar scroll</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Thêm bài hát</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sửa bài hát</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <h2>Chỉnh sửa bai hat</h2>
            <form action="?controller=strong&action=update&id=<?= $baihat->getId() ?>" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text">Ten bai hat</span>
                    <input type="text" class="form-control" name="tenBaiHat" value="<?= $baihat->getTenBaiHat() ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Ten ca si</span>
                    <input type="text" class="form-control" name="tenCaSi" value="<?= $baihat->getCaSi() ?>">
                </div>
                <select class="form-select" name="idTheLoai">
                    <?php foreach ($theloais as $theloai) {
                        if ($theloai->getId() == $baihat->getIdTheLoai()) {
                    ?>
                            <option selected><?= $theloai->getTenTheLoai() ?></option>
                        <?php } else { ?>
                            <option value="<?= $theloai->getId() ?>"><?= $theloai->getTenTheLoai() ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <button type="submit" name="submit" class="btn btn-success">Thêm</button>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>