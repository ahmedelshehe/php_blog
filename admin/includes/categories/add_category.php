<?php
if (isset($_POST['submit'])) {
    $cat_title = $_POST['title'];
    $query = "INSERT INTO `categories` (`id`, `title`) VALUES (NULL, '$cat_title')";
    $add_category = mysqli_query($connection, $query);
    header("Location: categories.php");
    exit();
}
?>
<h3>Add Category</h3>
<form action="" method="post" class="form-inline">
    <label for="title">Category Title</label>
    <input class="form-control" type="text" name="title" id="title" required>
    <button name="submit" type="submit" class="btn btn-default" type="button">
        Add
    </button>
</form>