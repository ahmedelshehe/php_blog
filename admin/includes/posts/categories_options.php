<?php
$query = "SELECT * FROM categories";
$all_categories = mysqli_query($connection, $query);
while ($category = mysqli_fetch_assoc($all_categories)) {
    $cat_title = $category['title'];
    $cat_id = $category['id'];
    ?>
    <option value="<?php echo $cat_id ?>"><?php echo $cat_title ?></option>
<?php } ?>