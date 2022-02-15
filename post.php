
<?php 
    $post_id = $_GET['post'];
    $query="SELECT * FROM posts WHERE id =$post_id";
    $get_post=mysqli_query($connection,$query);
    $post =mysqli_fetch_assoc($get_post);
    $post_title = $post['title'];
    $post_author = $post['author'];
    $post_category_id=$post['category_id'];
    $post_status =$post['status'];
    $post_image=$post['image'];
    $post_content =$post['content'];
    $post_tags =$post['tags'];
    $post_date=$post['date'];
?>
<div class="col-lg-8">

    <!-- Blog Post -->

    <!-- Title -->
    <h1><?= $post_title ?></h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#"><?= $post_author ?></a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $post_date ?></p>

    <hr>

    <!-- Preview Image -->
    <?php 
        if(empty($post_image)){
            ?>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <?php
        } else {
            ?>
            <img class="img-responsive" src="images/<?= $post_image?>" alt="">
            <?php
        }
    ?>
    

    <hr>

    <!-- Post Content -->
    <p class="lead"><?= $post_content ?></p>
    
    <hr>

    <!-- Blog Comments -->
        <?php 
            if(isset($_POST['add_comment'])){
                $comment_author=$_POST['author'];
                $comment_email=$_POST['email'];
                $comment_content=$_POST['content'];
                $post_id=$_GET['post'];
                $comment_status='disapproved';
                $query="INSERT INTO `comments` (`post_id`, `author`, `email`, `content`, `status`, `date`) VALUES (";
                $query .= "'$post_id',";
                $query .= "'$comment_author',";
                $query .= "'$comment_email',";
                $query .= "'$comment_content',";
                $query .= "'disapproved',";
                $query .= "now()" . ")";
                $add_comment=mysqli_query($connection,$query);
            }
        ?>
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        <form action="" method="post" class="form" role="form">
            <div class="form-group">
                <label for="author">Name </label>
                <input type="text" class="form-control" name="author" id="author">
            </div>
            <div class="form-group">
                <label for="email">Email </label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="content">Comment</label>
                <textarea name="content" class="form-control" rows="3"></textarea>
            </div>
            <button name="add_comment" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



    <!-- Posted Comments -->

    <!-- Comment -->
    
        <?php 
            $comments_query="SELECT * FROM comments WHERE post_id =".$post_id;
            $all_comments=mysqli_query($connection,$comments_query);
            while ($comment= mysqli_fetch_assoc($all_comments)) {
                $comment_id=$comment['id'];
                $comment_content=$comment['content'];
                $comment_author=$comment['author'];
                $comment_date=$comment['date'];
                if($comment['status'] === 'approved'){             
                    ?>
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?= $comment_date ?>
                                <small><?= $comment_date ?></small>
                            </h4>
                            <?= $comment_content ?>
                        </div>
                    </div>
                    <hr>
                    <?php
                }
            }
        ?>
        

</div>