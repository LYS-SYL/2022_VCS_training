
<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách sinh vien</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    </head>
    <body>
        <h1>Danh sách sinh vien</h1>
        <a href="index.php?controller=pages&action=addstudent">Thêm sinh viên</a> <br/> <br/>
        <table width="100%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Options</th>
            </tr>
    <?php
        $_POST['delete'] = NULL;    
		require_once('../05_SimplePHP/Model/client/UserModel.php');
		$userModel = new UserModel();
		$list = $userModel->getallstudents();
        foreach ($list as $item){ ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['hoten']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['phonenumber']; ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>
                        <input type="submit" name="update" value="Sửa"/>
                    </form>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"/>
                    </form>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>
                        <input type="submit" name="read" value="Xem"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>