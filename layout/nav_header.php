<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item">
                            <a class="header__navbar-item-link" href="sinhvien.php">Sinh viên</a>
                        </li>
     
                        <li class="header__navbar-item">
                            <a class="header__navbar-item-link" href="monhoc.php">Môn học</a>
                        </li>

                        <li class="header__navbar-item">
                            <a class="header__navbar-item-link" href="dangkymonhoc.php">Đăng ký môn học</a>
                        </li>
                    </ul>
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">
                                <i class="fas fa-bell"></i>
                                Thông báo
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link"><i class="far fa-question-circle"></i>Trợ giúp</a>
                        </li>
                        <li class="header__navbar-item header__navbar-item--strong">Đăng ký</li>
                        <?php if (!isset($_SESSION['user'])) : ?>
                            <li class="header__navbar-item">
                                <a class="header__navbar-item-link header__navbar-item--strong" href="dangnhap.php">Đăng nhập</a>
                            </li> 
                        <?php else : ?>
                            <div class="header__navbar-item">
                                <a class="header__navbar-item-link header__navbar-item--strong" href="http://localhost/QLSV/dangxuat.php">
                                    <i class="fa fa-user"></i><?php echo $_SESSION['user'] ?></a> </a>
                            </div>
                        <?php endif ?>
                    </ul>
                </nav>  
            </div>
            <div class="logo">
                <img src="assets/img/logoweb.jpg" alt="Avatar" >
            </div>
        </header>



    </body>
</html>
