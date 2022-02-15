<?php
                    $query_cat = "SELECT * FROM categories";
                    $all_categories = mysqli_query($connection, $query_cat);
                    while ($category = mysqli_fetch_assoc($all_categories)) {
                        $cat_title = $category['title'];
                        $cat_id = $category['id'];
                        if($cat_id == $post_category_id){
                            ?>
<option selected value="<?php echo $cat_id ?>">
    <?php echo $cat_title ?>
</option>
<?php
                        }
                        ?>
<option value="<?php echo $cat_id ?>">
    <?php echo $cat_title ?>
</option>
<?php } ?>