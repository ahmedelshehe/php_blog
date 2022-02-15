<?php include "add_post_query.php" ?>
<div class="container col-lg-9">
    <h3><?php echo $title;?></h3>
    <form action="" method="post" class="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input class="form-control" type="text" name="title" id="title" required>
        </div>
        <div class="form-group">
            <label for ="author">Post Author</label>
            <input class="form-control" type="text" name="author" id="author" required>
        </div>
        <div class="form-group">
            <label for="post_status">Post Status</label>
            <select class="form-control" name="post_status" id="post_status" aria-label="Default select example">
                <option selected>Choose a Status</option>
                <option value="draft">Draft</option>
                <option value="active">Active</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image" >Image</label>
            <input class="form-control-file btn btn-primary" type="file" name ="image" id="image">
        </div>
        <div class="form-group">
            <label for="post_category">Post Category</label>
            <select class="form-control" name="post_category_id" id="post_category_id"" aria-label="Default select example">
                <option selected>Choose a Category</option>
                <?php include "categories_options.php"?>
            </select>
        </div>
        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" name="post_tags">
        </div>
        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea class="form-control" name="post_content" cols="30" rows="10"></textarea>
        </div>
        <button name="create_post" type="submit" class="btn btn-default" type="button">
            Add Post
        </button>
    </form>
</div>
