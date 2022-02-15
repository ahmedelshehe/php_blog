<div class="col-md-8">

    <h1 class="page-header">
        <?php
            if (isset($_POST['search'])) {
                echo "Search Results";
            } else {
                echo "Featured Posts";
            }
        ?>

    </h1>
    <?php
            $category_id=$_GET['category'];
            if (isset($_POST['submit'])) {
                $search = $_POST['search'];
                $query = "SELECT * FROM posts WHERE tags LIKE '%$search%'";
            } else {
                $query = "SELECT * FROM posts  WHERE category_id =". $category_id;
            }
            $select_all_posts = mysqli_query($connection, $query);
            $result_count = mysqli_num_rows($select_all_posts);
            if (!$select_all_posts) {
                echo $connection->error;
            } else if($result_count ==0) {
                ?> <h3>No Posts Yet</h3> <?php
            } else {
                while ($post = mysqli_fetch_assoc($select_all_posts)) {
                    $post_id = $post['id'];
                    $post_title = $post['title'];
                    $post_author = $post['author'];
                    $post_date = $post['date'];
                    $post_content = substr($post['content'],0,100);
                    $post_image = $post['image'];
                    ?>
    <!-- Blog Post -->
    <h2>
        <a href='#'>
            <?php echo $post_title ?>
        </a>
    </h2>
    <p class='lead'>by
        <a href='index.php'>
            <?php echo $post_author ?>
        </a>
    </p>
    <p><span class='glyphiconglyphicon-time'></span>
        Posted on
        <?php echo $post_date ?>
    </p>
    <hr>
    <img class="img-responsive" src="
                    <?php
                        if ($post_image === '') {
                            echo " http://placehold.it/900x300"; } else { echo "images/" . $post_image; } ?>
    " alt=''>
    <hr>
    <p>
        <?php echo $post_content ?>
    </p>
    <a class="btn btn-primary" href='index.php?post= <?= $post_id ?>'>Read More <span
            class="glyphicon glyphicon-chevron-right"></span></a>
    <hr>
    <!-- End Blog Post -->
    <?php
                    }
                }
                        ?>


</div>