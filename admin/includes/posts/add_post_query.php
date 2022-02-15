<?php
if(isset($_POST['create_post'])) {
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id=$_POST['post_category_id'];
    $post_status =$_POST['post_status'];

    $post_image=$_FILES['image']['name'];
    $post_image_temp= $_FILES['image']['tmp_name'];

    $post_content =$_POST['post_content'];
    $post_tags =$_POST['post_tags'];
    $post_date =date('d-m-y');
    $post_comments =4;
    move_uploaded_file($post_image_temp , "../images/$post_image" );
    $query = "INSERT INTO posts(category_id, title, author, date, image, content, tags, comment_count, status)";
    $query .="VALUES ('{$post_category_id}','{$post_title}' ,'{$post_author}' ,now(), '{$post_image}' , '{$post_content}' ,'{$post_tags}' , 
                            '{$post_comments}' ,'{$post_status}')";
    $add_post = mysqli_query($connection,$query);
    if($add_post) {
        echo  "post added";
    } else {
        echo "Cannot Add Post";
        }
    }