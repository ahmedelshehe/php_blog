<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <div class="input-group">
            <form action="" method="post">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                <button name="submit" type="submit" class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
            </form>

        </div>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    $query = "SELECT * FROM categories LIMIT 4";
                    $select_all_categories_sidebar = mysqli_query($connection, $query);
                    while ($category = mysqli_fetch_assoc($select_all_categories_sidebar)) {
                        $cat_title = $category['title'];
                        $cat_id = $category['id'];
                        ?>
                            <li>
                                <a href='index.php?category=<?=$cat_id ?>'><?=$cat_title ?></a>
                            </li>
                            <?php
                    }
                    ?>
                </ul>
            </div>

        </div>
        <!-- /.row -->
    </div>
    <?php
    include "includes/widget.php";
    ?>
</div>