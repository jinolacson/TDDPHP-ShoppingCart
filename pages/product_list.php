<?php 
    use Classes\Products;

    //instantiate Product Object
    $products = new Products();
?>

<h1>Product List</h1>
    <table id="products_table">
    <tr>
        <th>Item#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>
    <?php 
        foreach ($products->getProducts() as $key => $list) {
            echo '<tr>';
            echo '<td>'.$list['id'].'</td>';
            echo '<td>'.$list['name'].'</td>';
            echo '<td>'.$list['price'].'</td>';
            echo '<td>'.$list['quantity'].'</td>';
            echo '<td><a href="index.php?page=add_to_cart&item_code='.$list['id'].'">Add to cart</a></td>';
            echo '</tr>';
        }
    ?>
</table>