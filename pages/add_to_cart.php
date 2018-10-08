<?php 

//instantiate cart class
require_once 'classes/Carts.php';

$item_code = $_GET['item_code'] ?? false;
$action_delete = $_GET['delete'] ?? null;

if (isset($item_code) && is_numeric($item_code)) 
{
    new Carts($item_code);
}

if (isset($item_code) && is_numeric($item_code) && isset($action_delete)) 
{
    $cart_delete = new Carts();
    $cart_delete->removeCartItems($item_code);
    header('Location: ./index.php?page=add_to_cart');
}

$cart = new Carts();
?>

<h1>My Cart</h1>
    <table id="products_table">
    <tr>
        <th>Item#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>
    <?php 
        foreach ($cart->getCartItems() as $key => $list) {
            echo '<tr>';
            echo '<td>'.$list['id'].'</td>';
            echo '<td>'.$list['name'].'</td>';
            echo '<td>'.$list['price'].'</td>';
            echo '<td>'.$list['quantity'].'</td>';
            echo '<td><a href="index.php?page=add_to_cart&item_code='.$list['id'].'&delete=true">Remove Item(s)</a></td>';
            echo '</tr>';
        }
    ?>
     <tr>
        <td align=right colspan=4><b>Total : <?php echo $cart->getTotalItems(); ?></b></td><td></td>
     </tr>
</table>
