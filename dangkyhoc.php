<?php include './index.php'; ?>
    <?php
        $sql= "SELECT * FROM register";
        $danhsachdangky = $db->fetchAll($sql);
    ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
   
    $id = $_POST['delete_id'];

    // Truy vấn để xóa dữ liệu
    $sql = "DELETE FROM register WHERE student_id = $id";
    $result = $db->query($sql);
    echo "<script>window.location.href='dangkyhoc.php';</script>";
      
}
?>
<style type="text/css">


@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);
#editDangkyDialog {
    display: none;
}
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
    position: relative; /* Thêm thuộc tính này để nút close có thể được định vị đúng */
}

.close-button {
    position: absolute; /* Định vị nút close */
    top: 10px; /* Căn lề trên */
    right: 10px; /* Căn lề phải */
    cursor: pointer; /* Con trỏ chuột */
    font-size: 24px; /* Kích thước font */
}
.dialog-content {
    padding: 20px; 
    height: 100%; /* Chiều cao của nội dung sẽ đầy đủ dialog */
    box-sizing: border-box; /* Đảm bảo padding và border không làm tăng kích thước */
    display: flex; /* Sử dụng Flexbox */
    flex-direction: column; /* Dọc theo chiều dọc */
    justify-content: center; /* Căn giữa theo chiều dọc */
}
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
                        <button class="btn btn-edit" onclick="openDialog()">Sửa</button>
                      
                        
                          <form method="post">
                         
                            <button type="submit" name="delete_id" class="btn btn-delete" value="<?php echo $row['student_id']; ?>">Xóa</button>
                        </form>
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
<div class="dialog" id="editDangkyDialog">
    <div class="dialog-content">
        <span class="close-button" onclick="closeDialog()">&times;</span>
        <h3>Thêm môn học</h3>
        <form action="" method="POST">
            <label for="subjectName">Tên sinh viên</label>
            <div><input type="text" id="subjectName" name="subjectName" required></div>
            
            <div><label for="numberOfCredit">Tên môn học</label></div>
            <input type="number" id="numberOfCredit" name="numberOfCredit" required>

             <div><label for="numberOfCredit">Điểm</label></div>
            <input type="number" id="numberOfCredit" name="numberOfCredit" required>

            <div><button type="submit">Thêm</button></div>
        </form>
    </div>
</div>
<script>
    function openDialog() {
        document.getElementById('editDangkyDialog').style.display = 'block';
    }

    function closeDialog() {
        document.getElementById('editDangkyDialog').style.display = 'none';
    }
</script>

