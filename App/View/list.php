<a href="index.php?page=product-create">Create</a>
<table border="1px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>
    <tbody>

        <?php foreach ($products as$key=>$product):?>
            <tr>
                <th><?php echo $key+1?></th>
                <td><?php echo $product->name?></td>
                <td><?php echo $product->type?></td>
                <td><a href="index.php?page=product-update&id=<?php echo $product->id?>">Update</a></td>
                <td><a onclick="return confirm('are you sure')" href="index.php?page=product-delete&id=<?php echo $product->id?>">Delete</a></td>
                </td>
            </tr>
        <?php endforeach;?>


    </tbody>
</table>
