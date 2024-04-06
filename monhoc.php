<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
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
    </style>
<html>
    <head>
        <title>Công ty</title>
        <?php include './index.php'; ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
     <?php
        $sql_danhsach = "SELECT * FROM subject";
        $danhsachmonhoc = $db->fetchAll($sql_danhsach);
     ?>
    <body>
        <div class="search__company__containter">
            <form action="" method="POST">

                <div class="search__form">
                    <div class="search__form__wrap">
                        <i class="fas fa-search"></i>
                        <input class="search__form__input" name="tencongty" type="text" size="40" placeholder="Nhập tên công ty cần tìm kiếm ?">
                        <button class="search__form__button" type="submit"><span class="search__form__button__title">Tìm kiếm</span></button>
                    </div>
                </div>

            </form>
            <div class="company__show__number__result">
                <?php if (!empty($total_rows)) : ?>
                    <p>Số lượng các công ty phù hợp: <?php echo $total_rows ?></p>
                <?php endif; ?>
            </div>
        </div>


   <div class="container">
        <h2>Danh sách sinh viên</h2>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Subject Id</div>
                <div class="col col-2">Subject Name</div>
                <div class="col col-3">Number credit</div>
            </li>

            <?php
            $order = 0;
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
            ?>

        </ul>
    </div>


    </body>

</html>
