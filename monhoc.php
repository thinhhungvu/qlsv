
<!DOCTYPE html>
<html>
<head>
    <title>Công ty</title>
    <?php include './index.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
       
        .container {
            max-width: 1000px;
            margin-top:200px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 10px;
            padding-right: 10px;
        }

        h2 {
           
            margin: 20px 0;
            text-align: center;
        }

        h2 small {
            font-size: 0.5em;
        }

        .responsive-table li {
            border-radius: 3px;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .responsive-table .table-header {
            background-color: #95A5A6;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .responsive-table .table-row {
            background-color: #ffffff;
            box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
        }

        .responsive-table .col-1 {
            flex-basis: 10%;
        }

        .responsive-table .col-2 {
            flex-basis: 40%;
        }

        .responsive-table .col-3 {
            flex-basis: 25%;
        }

        .responsive-table .col-4 {
            flex-basis: 25%;
        }

        @media all and (max-width: 767px) {
            .responsive-table .table-header {
                display: none;
            }

            .responsive-table li {
                display: block;
            }

            .responsive-table .col {
                flex-basis: 100%;
                display: flex;
                padding: 10px 0;
            }

            .responsive-table .col:before {
                color: #6C7A89;
                padding-right: 10px;
                content: attr(data-label);
                flex-basis: 50%;
                text-align: right;
            }
        }
         .dialog {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

/* CSS cho tiêu đề */
.dialog-content h3 {
    font-size: 24px; /* Kích thước font */
    margin-bottom: 20px; /* Khoảng cách dưới */
}

/* CSS cho trường nhập */
.dialog-content input[type="text"],
.dialog-content input[type="number"] {
    font-size: 18px; /* Kích thước font */
    padding: 10px; /* Khoảng cách giữa nội dung và viền */
    width: 50%/* Chiều rộng */
    box-sizing: border-box; /* Đảm bảo chiều rộng và padding đúng */
    margin-bottom: 15px; /* Khoảng cách dưới */
}

/* CSS cho button */
.dialog-content button {
    font-size: 18px; /* Kích thước font */
    padding: 10px 20px; /* Kích thước padding */
    background-color: #007BFF; /* Màu nền */
    color: white; /* Màu chữ */
    border: none; /* Không có viền */
    cursor: pointer; /* Con trỏ chuột */
    transition: background-color 0.3s ease; /* Hiệu ứng chuyển đổi màu nền */
}

.dialog {
    position: fixed; 
    top: 50%; 
    left: 50%; 
    transform: translate(-50%, -50%); 
    z-index: 1000; 
    width: 400px; /* Độ rộng của dialog */
    height: 400px; /* Chiều cao của dialog */
    background-color: #ADD8E6; /* Màu xanh nhạt */
    border-radius: 8px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
}

.dialog-content {
    padding: 20px; 
    height: 100%; /* Chiều cao của nội dung sẽ đầy đủ dialog */
    box-sizing: border-box; /* Đảm bảo padding và border không làm tăng kích thước */
    display: flex; /* Sử dụng Flexbox */
    flex-direction: column; /* Dọc theo chiều dọc */
    justify-content: center; /* Căn giữa theo chiều dọc */
}

/* Các CSS khác như đã trước */


/* Các CSS khác như đã trước */


/* Các CSS khác như đã trước */



        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
                .dialog {
            display: none;
        }
    </style>
</head>
<body>
    <?php
        $sql= "SELECT * FROM subject";
        $danhsachmonhoc = $db->fetchAll($sql);

        $total_rows = null;

        if (isset($_POST) && isset($_POST['tenmonhoc'])) {
            $tenmonhoc = $_POST['tenmonhoc'];
            $sql_count = "SELECT COUNT(*) as total_rows FROM subject WHERE name like '%$tenmonhoc%'";
            $result = $db->fetchOne($sql_count);
            $total_rows = $result['total_rows'];

            $sql_danhsach = "SELECT * FROM subject WHERE name like '%$tenmonhoc%'";
            $danhsachmonhocsearch = $db->fetchAll($sql_danhsach);
        }
    ?>

    <div class="search__company__containter">
        <form action="" method="POST">
            <div class="search__form">
                <div class="search__form__wrap">
                    <i class="fas fa-search"></i>
                    <input class="search__form__input" name="tenmonhoc" type="text" size="40" placeholder="Nhập tên công ty cần tìm kiếm ?">
                    <button class="search__form__button" type="submit"><span class="search__form__button__title">Tìm kiếm</span></button>
                </div>
            </div>
        </form>
        <div class="company__show__number__result">
            <?php if (isset($total_rows)) : ?>
                <p>Số lượng các công ty phù hợp: <?php echo $total_rows ?></p>
            <?php endif; ?>
        </div>
    </div>

<div class="container">
    <h2>Danh sách sinh viên</h2>
<button class="search__form__button" type="submit" onclick="openDialog()" style="background-color: green; color: white;">
    <span class="search__form__button__title">Thêm môn học</span>
</button>



    <ul class="responsive-table">
        <li class="table-header">
            <div class="col col-1">Subject Id</div>
            <div class="col col-2">Subject Name</div>
            <div class="col col-3">Number credit</div>
            
        </li>

        <?php
        $order = 0;
        if (!empty($danhsachmonhocsearch)) {
            foreach ($danhsachmonhocsearch as $subject) {
                $order++;
        ?>
                <li class="table-row">
                    <div class="col col-1" data-label="subject Id">
                        <?php echo $subject['subject_id'] ?>
                
                  
                    </div>
                    <div class="col col-2" data-label="subject Name"><?php echo $subject['name'] ?></div>
                    <div class="col col-3" data-label="number_of_credit"><?php echo $subject['number_of_credit'] ?></div>
                </li>
        <?php
            }
        } else {
            foreach ($danhsachmonhoc as $subject) {
                $order++;
        ?>
                <li class="table-row">
                    <div class="col col-1" data-label="subject Id"><?php echo $subject['subject_id'] ?></div>
                    <div class="col col-2" data-label="subject Name"><?php echo $subject['name'] ?></div>
                    <div class="col col-3" data-label="number_of_credit"><?php echo $subject['number_of_credit'] ?></div>
           
                </li>
        <?php
            }
        }
        ?>
    </ul>
</div>


<div class="dialog" id="addSubjectDialog">
    <div class="dialog-content">
        <span class="close-button" onclick="closeDialog()">&times;</span>
        <h3>Thêm môn học</h3>
        <form action="" method="POST">
            <label for="subjectName">Tên môn học:</label>
            <div><input type="text" id="subjectName" name="subjectName" required></div>
            
            <div><label for="numberOfCredit">Số tín chỉ:</label></div>
            <input type="number" id="numberOfCredit" name="numberOfCredit" required>

            <div><button type="submit">Thêm</button></div>
        </form>
    </div>
</div>

<script>
    function openDialog() {
        document.getElementById('addSubjectDialog').style.display = 'block';
    }

    function closeDialog() {
        document.getElementById('addSubjectDialog').style.display = 'none';
    }
</script>

</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subjectName = $_POST['subjectName'];
    $numberOfCredit = $_POST['numberOfCredit'];

    // Thêm sinh viên vào cơ sở dữ liệu
    $sql_qr = "INSERT INTO subject (name, number_of_credit) VALUES ('$subjectName', $numberOfCredit)";
    $result = $db->query($sql_qr);

    if ($result) {
        echo "<script>alert('Thêm môn học thành công');</script>";
    } else {
        echo "<script>alert('Thêm môn học thất bại');</script>";
    }
    echo "<script>window.location.href='monhoc.php';</script>";
}

?>

