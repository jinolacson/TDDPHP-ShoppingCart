<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>shopping Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="resources/css/main.css" />
</head>
<body>
   <?php
    
    //include templates
    $page = $_GET['page'] ?? 'products';

    switch($page)
    {
        case 'products':
            include 'pages/product_list.php';
        break;

        case 'add_to_cart':
            include 'pages/add_to_cart.php';
        break;

        default:
            include 'pages/product_list.php';
        break;
    }

   ?>
</body>
</html>