
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

.dialog-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #ffffff;
    padding: 40px; /* Tăng padding để cung cấp khoảng trống xung quanh nội dung */
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    width: 90%; /* Thay đổi width của dialog */
    max-width: 900px; /* Giới hạn width tối đa */
    height: 80%; /* Thay đổi height của dialog */
    max-height: 80vh; /* Giới hạn height tối đa */
    overflow-y: auto; /* Cho phép cuộn nội dung nếu nó quá dài */
    display: flex; /* Sử dụng flexbox */
    justify-content: center; /* Căn giữa theo chiều ngang */
    align-items: center; /* Căn giữa theo chiều dọc */
    flex-direction: column; /* Sắp xếp các phần tử con theo chiều dọc */
}
.dialog-content label {
    font-size: 20px; /* Tăng kích thước font chữ của label */
    margin-bottom: 10px; /* Tăng margin dưới của label */
}
.dialog-content input[type="text"],
.dialog-content input[type="number"] {
    width: 50%; /* Đặt chiều rộng của input fields là 100% */
    padding: 10px; /* Tăng padding để cung cấp khoảng trống xung quanh nội dung */
    font-size: 16px; /* Điều chỉnh kích thước font chữ */
    margin-bottom: 20px; /* Tăng margin dưới để tạo khoảng cách giữa các input fields */
}
.dialog-content button {
    padding: 15px 30px; /* Tăng padding để làm cho các nút lớn hơn */
    margin: 10px; /* Thêm margin để tạo khoảng cách giữa các nút */
    font-size: 18px; /* Điều chỉnh kích thước font chữ của các nút */
}

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


<div id="inputDialog" class="dialog">
    <div class="dialog-content">
       
        
        <label for="textInput1">Subject ID</label>
        <input type="text" id="subjectID"><br><br>
        
        <label for="textInput2">Subject Name</label>
        <input type="text" id="subjectName"><br><br>
        
        <label for="textInput3">Number Credit</label>
        <input type="text" id="NumberCredit"><br><br>
        
        <button onclick="submitData()">Submit</button>
        <button onclick="closeDialog()">Cancel</button>
    </div>
</div>

<script>
    let inputDialog = document.getElementById('inputDialog');

    function openDialog() {
        inputDialog.style.display = 'block';
    }

    function closeDialog() {
        inputDialog.style.display = 'none';
    }

    function submitData() {
        let text1 = document.getElementById('subjectID').value;
        let text2 = document.getElementById('subjectName').value;
        let text3 = document.getElementById('NumberCredit').value;
        closeDialog();
    }

</script>
</body>
</html>


