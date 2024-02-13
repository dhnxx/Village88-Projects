<table>
    <tr>
        <th>Item Name</th>
        <th>Number of Stock</th>
        <th>Price</th>
        <th>Date Added</th>
    </tr>
<?php foreach($products as $product){ ?>
    <tr>
        <td><?= $product["item_name"] ?> </td>
        <td><?= $product["number_of_stock"] ?> </td>
        <td><?= $product["price"] ?> </td>
        <td><?= date("Y-m-d", strtotime($product["created_at"])) ?> </td>
    </tr>
<?php } ?> 
</table>