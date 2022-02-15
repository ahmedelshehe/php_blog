<?php
if (isset($_GET['delete'])) {
    $cat_id = $_GET['delete'];
    $query = "DELETE FROM `categories` WHERE `categories`.`id` = $cat_id ";
    $delete_category = mysqli_query($connection, $query);
    header("Location: categories.php");
    exit();
}
?>
<table class="table">
    <thead>
    <tr>

        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM categories";
    $select_all_categories = mysqli_query($connection, $query);
    while ($category = mysqli_fetch_assoc($select_all_categories)) {
        $cat_title = $category['title'];
        $cat_id = $category['id'];
        echo "
            <tr>
            <th scope='row'>{$cat_id}</th>
            <td>{$cat_title}</td> 
            <td><a href='categories.php?edit={$cat_id}'>Edit</a></td>                                            
            <td><a href='categories.php?delete={$cat_id}'><i class='fa fa-fw fa-trash'></i>Delete</a></td>
            </tr>
            ";
    }
    ?>
    </tbody>
</table>