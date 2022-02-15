<?php
if (isset($_GET['edit'])) {
    $cat_id = $_GET['edit'];
    $query = "SELECT * FROM categories WHERE id =$cat_id";
    $edit_category = mysqli_query($connection, $query);
    while ($category = mysqli_fetch_assoc($edit_category)) {
        $cat_id = $category['id'];
        $cat_title = $category['title'];
        ?>
        <h3>Edit Category</h3>
        <form action="" method="post" class="form-inline">
            <label for="title">Category Title</label>
            <input class="form-control" type="text" value="<?php echo $cat_title ?>" name="new-title" id="new-title"
                   required>
            <button name="update_category" type="submit" class="btn btn-default" type="button">
                Update
            </button>
            <?php
            if (isset($_POST['update_category'])) {
                $the_cat_title = $_POST['new-title'];
                $query = "UPDATE  categories SET title='$the_cat_title' WHERE id = $cat_id ";
                $update_query = mysqli_query($connection, $query);
                header("Location: categories.php");
                exit();
            }
            ?>
        </form>
    <?php }
}
?>