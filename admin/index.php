<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login panel</title>
    <?php require("../admin/inc/links.php");?>
    <style>
        div.login-form{
            position: absolute;
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
            width: 400px;
        }
    </style>
</head>
<body class="bg-ligth">
    
 <div class="login-form text-center rounded bg-white shadow overflow-none">
    <form>
        <h4 class="bg-dark text-white py-3">ADMIN LOGIN PANEL</h4>
        <div class="p-4">
                        <div class="mb-3">
                            <input name="admin_name" type="text" class="form-control shadow-none text-center" placeholder="Admin Name">
                        </div>
                        <div class="mb-3">
                            <input name="admin_pass" type="password" class="form-control shadow-none" placeholder="Password">
                        </div>
                        <div>
                            <button name="login" type="submit" class="btn custom-bg shadows-none">Entrar</button>
                        </div>
        </div>
    </form>
 </div>











  <?php require("../admin/inc/scripts.php");?>
</body>
</html>