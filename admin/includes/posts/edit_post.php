<?php 
    $post_id = $_GET['edit'];
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
    
?>
<div class="container col-lg-9">
    <h3>
        Edit Post <?php echo $post_id; ?>
    </h3>
    <?php
        if(isset($_POST['update_post'])){
            $post_title = $_POST['title'];
            $post_author = $_POST['author'];
            $post_category_id=$_POST['post_category_id'];
            $post_status =$_POST['post_status'];
            $post_image=$_FILES['image']['name']; 
            $post_image_temp= $_FILES['image']['tmp_name'];
            $post_content =$_POST['post_content'];
            $post_tags =$_POST['post_tags'];
            move_uploaded_file($post_image_temp , "../images/$post_image" );
            $query= "UPDATE posts SET";
            $query .=" title ='{$post_title}', ";
            $query .=" author ='{$post_author}', ";
            $query .=" date =now(), ";
            $query .=" category_id ='{$post_category_id}', ";
            if(empty($post_image)){
                $query_partial="SELECT * FROM posts WHERE id =$post_id";
                $get_post=mysqli_query($connection,$query_partial);
                $post =mysqli_fetch_assoc($get_post);
                $post_image=$post['image'];
            }
            $query .=" image ='{$post_image}', ";
            $query .=" status ='{$post_status}', ";
            $query .=" tags ='{$post_tags}', ";
            $query .=" content ='{$post_content}' ";
            $query .="WHERE id =$post_id";
            $update_post=mysqli_query($connection,$query);
            if($update_post){
                ?>
                <div class="alert alert-success" role="alert">
                    Post Updated Successfully
                </div>
                <?php
            }else {
                ?>
                <div class="alert alert-danger" role="alert">
                    Post Cannot Updated
                </div>
                <?php
                echo $connection->error;
            } 
            }
    ?>
    <form action="" method="post" class="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input value="<?=$post_title ?>" class="form-control" type="text" name="title" id="title" required>
        </div>
        <div class="form-group">
            <label for="author">Post Author</label>
            <input value="<?=$post_author ?>" class="form-control" type="text" name="author" id="author" required>
        </div>
        <div class="form-group">
            <label for="post_status">Post Status</label>
            <select class="form-control" name="post_status" id="post_status" aria-label="Default select example">
                <option <?php echo $post_status ==='draft'?'selected' : '' ?> value="draft">Draft</option>
                <option <?php echo $post_status ==='active'?'selected' : '' ?> value="active">Active</option>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input class="form-control-file btn btn-primary" type="file" name="image" id="image">  
        </div>
        <div class="form-group">
            <img src="../images/<?=$post_image?>" width='100'>
        </div>
        <div class="form-group">
            <label for="post_category">Post Category</label>
            <select class="form-control" name="post_category_id" id="post_category_id"" aria-label=" Default select
                example">
                <?php include "categories_edit_options.php"?>
            </select>
        </div>
        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input value="<?=$post_tags ?>" type="text" class="form-control" name="post_tags">
        </div>
        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea  class="form-control" name="post_content" cols="30" rows="10"><?=$post_content ?></textarea>
        </div>
        <button name="update_post" type="submit" class="btn btn-default" type="button">
            Update Post
        </button>
    </form>
</div>