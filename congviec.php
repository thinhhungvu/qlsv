<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>Công việc</title>
        <?php include './index.php'; ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <?php
    $sql = "SELECT * FROM user";
    $danhsachsinhvien = $db->fetchAll($sql);
    ?>
    <body>
        <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>DropDown List</title>
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>
        <body>
            <form action="" method="GET">
                <div class="containter__job">
          <?php
            $order = 0;
            foreach ($danhsachsinhvien as $sinhvien) {

                $order++;
                ?>
                            <div class="containter__job__item">
                               
                                <div class="containter__job__item__title">
                                    <div class="containter__job__item__title_one">
                                        <?php echo $sinhvien['name'] ?>
                                    </div>
                                    
                                     <div class="containter__job__item__title_two">
                                        Sinh nhật <?php echo $sinhvien['birthday']; ?>
                                    </div>  
                                     <div class="containter__job__item__title_two">
                                        Giới tính <?php echo $sinhvien['gender']; ?>
                                    </div>                            
                                </div>
                                <div class="containter__job__item--ungtuyen">
                                    <button class="btn btn--primary btn--normal btn--size-s" type="submit" name="form" value="submit">Ứng tuyển</button>
                                </div>
                            </div>
                                <?php
            }
            ?>
                  
                </div>

            </form>
        </body>
    </html>
</body>
</html>
