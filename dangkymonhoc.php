<?php include './index.php'; ?>
    <?php
        $sql= "SELECT * FROM register";
        $danhsachdangky = $db->fetchAll($sql);
    ?>
<style type="text/css">


@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em;
  color:#A7A1AE;
  background-color:#1F2739;
}
/* ... (phần CSS hiện tại của bạn) ... */

/* ... (phần CSS hiện tại của bạn) ... */

/* ... (phần CSS hiện tại của bạn) ... */
.container td.btn-container {
    width: 0px; /* Đặt chiều rộng mong muốn (ví dụ: 100px) */
}

.btn-container {
    display: flex;
    justify-content: flex-start; /* Căn nút "Sửa" về phía trái */
    gap: 5px; /* Khoảng cách giữa các nút */
}

.btn-container button {
    flex: none; /* Không cho phép nút mở rộng */
    padding: 5px 10px; /* Khoảng cách giữa nội dung và biên */
    font-size: 0.8em; /* Kích thước font nhỏ hơn */
}


h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}

h2 {
  font-size:1em; 
  font-weight: 300;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
	  font-weight: bold;
	  font-size: 1em;
  text-align: left;
  color: #185875;
}
 
.container td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
	  text-align: left;
	  overflow: hidden;
	  width: 80%;
	  margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
	  padding-bottom: 2%;
	  padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color: #2C3446;
}

.container th {
	  background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}
</style>
<h1><span class="blue">&lt;</span>QLSV<span class="blue">&gt;</span> <span class="yellow">Đăng ký</pan></h1>

<button class="search__form__button" type="submit" onclick="openDialog()" style="background-color: goldenrod; color: white; position: relative; left: 50px;">
    <span class="search__form__button__title">Thêm môn học</span>
</button>




<table class="container">
	<thead>
		<tr>
			<th><h1>Sinh viên</h1></th>
			<th><h1>Môn học</h1></th>
			<th><h1>Điểm</h1></th>
			<th><h1>Tuỳ chọn</h1></th>
		</tr>
	</thead>
	   <tbody>

    <?php 
    // Kiểm tra số dòng trả về
    if (!empty($danhsachdangky)) {
        // Sử dụng foreach để lặp qua từng dòng dữ liệu
        foreach ($danhsachdangky as $row) {
        	?>
                  <tr>
                    <td><?php echo $row['student_name'] ?></td>
                    <td><?php echo $row['subject_name'] ?></td>
                    <td><?php echo $row['score'] ?></td>
               
                    <td class="btn-container">
                        <button class="btn btn-edit">Sửa</button>
                        <button class="btn btn-delete">Xóa</button>
                    </td>
                  </tr>
                  <?php
        }
    
    } else {
        echo '<tr><td colspan="4">Không có dữ liệu</td></tr>';
    }
    ?>

    </tbody>
</table>