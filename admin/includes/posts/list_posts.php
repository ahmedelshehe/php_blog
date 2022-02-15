<?php

    if(isset($_GET['delete'])){
        $post_id=$_GET['delete'];
        $query = "DELETE FROM posts WHERE id=";
        $query .=$post_id;
        $delete_post=mysqli_query($connection,$query);
        header("Location: posts.php");
        exit();
    }



?>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Author</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Status</th>
        <th scope="col">Image</th>
        <th scope="col">Tags</th>
        <th scope="col">Comments</th>
        <th scope="col">Date</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM posts";
    $select_all_posts = mysqli_query($connection, $query);
    while ($post = mysqli_fetch_assoc($select_all_posts)) {
        $post_id = $post['id'];
        $post_title = $post['title'];
        $post_category_id = $post['category_id'];
        $cat_query = "SELECT * from categories WHERE id =$post_category_id";
        $get_category = mysqli_query($connection, $cat_query);
        while ($cat = mysqli_fetch_assoc($get_category)) {
            $cat_title = $cat['title'];

        }
        $post_author = $post['author'];
        $post_tags = $post['tags'];
        $post_image = $post['image'];
        $post_comment = $post['comment_count'];
        $post_status = $post['status'];
        $post_date = $post['date'];
        echo "
                <tr>
                    <td scope='row'>$post_id</td>
                    <td>$post_author</td>
                    <td>$post_title</td>
                    <td>$cat_title</td>
                    <td>$post_status</td>
                    <td><img src ='../images/$post_image' width='100'></td>
                    <td>$post_tags</td>
                    <td>$post_comment</td>
                    <td>$post_date</td>
                    <td><a href='posts.php?source=edit&edit=$post_id'>Edit</a></td>
                    <td><a href='posts.php?delete=$post_id'>Delete</a></td>
                </tr>
                ";
    }
    ?>

    </tbody>
</table>