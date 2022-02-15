<?php include "includes/header.php" ?>

<div id="wrapper">
    <?php
    include "includes/navigation.php"
    ?>
    <?php
        if (isset($_GET['delete'])) {
            $comment_id = $_GET['delete'];
            $query = "DELETE FROM `comments` WHERE `comments`.`id` = $comment_id ";
            $delete_comment = mysqli_query($connection, $query);
            if($delete_comment) {

            } else {
                echo $connection->error;
            }
            header("Location:comments.php");
            exit();
        }
    ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Comments Panel
                    </h1>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Author</th>
                                <th scope="col">Content</th>
                                <th scope="col">Status</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date</th>   
                                <th scope="col">Post</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Approve/Dissaprove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $query = "SELECT * FROM comments";
                        $select_all_comments = mysqli_query($connection, $query);
                        while ($comment = mysqli_fetch_assoc($select_all_comments)) {
                            $comment_id = $comment['id'];
                            $comment_content=$comment['content'];
                            $comment_author=$comment['author'];
                            $comment_email=$comment['email'];
                            $comment_date=$comment['date'];
                            $comment_status=$comment['status'];
                            $comment_post=$comment['post_id'];
                            $new_query="SELECT * FROM posts WHERE id=".$comment_post;
                            $get_post_name=mysqli_query($connection,$new_query);
                            $post=mysqli_fetch_assoc($get_post_name);
                            $post_title=$post['title'];
                            ?>
                            <tr>
                                <td scope='row'><?= $comment_id ?></td>
                                <td><?= $comment_author?></td>
                                <td><?= $comment_content ?></td>
                                <td><?= $comment_status ?></td>
                                <td><?= $comment_email ?></td>
                                <td><?= $comment_date ?></td>
                                <td><a href="../index.php?post=<?= $comment_post ?>"><?= $post_title ?></a></td>
                                <td><a href='comments.php?delete=<?=$comment_id ?>'>Delete</a></td>
                                <?php
                                    if($comment_status === 'disapproved') {
                                        ?> 
                                            <td><a href='comments.php?approve=<?=$comment_id ?>'>Approve</a></td>
                                        <?php
                                    } else {
                                        ?>
                                            <td><a href='comments.php?disapprove=<?=$comment_id ?>'>Disapprove</a></td>
                                        <?php
                                    }
                                ?>
                                <?php
                                    if(isset($_GET['approve'])){
                                        $query= "UPDATE  comments SET status='approved' WHERE comments.id =".$_GET['approve'];
                                        $comment_status_change= mysqli_query($connection,$query);
                                        header("Location: comments.php");
                                        exit(); 
                                    } else if ( isset($_GET['disapprove'])) {
                                        $query= "UPDATE  comments SET status='disapproved' WHERE id = ".$_GET['disapprove'];
                                        $comment_status_change= mysqli_query($connection,$query);
                                        header("Location: comments.php");
                                        exit(); 
                                    }
                                    
                                    
                                ?>


                            </tr>
                            <?php
                        }
                        ?>
                    
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
</div>
<!-- /#wrapper -->
<?php include "includes/footer.php" ?>