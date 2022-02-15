
<?php include "includes/header.php" ?>
    <div id="wrapper">

        <div id="page-wrapper">
            <?php
            include "includes/navigation.php"
            ?>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Posts Panel
                        </h1>
                        <?php
                        if(isset($_GET['source'])) {
                                $source =$_GET['source'];

                            } else {
                                $source='';
                            }
                            switch ($source) {
                                case  'add';
                                $title="Add Post";
                                include  "includes/posts/add_post.php";
                                break;

                                case  'edit';
                                    include  "includes/posts/edit_post.php";
                                    break;

                                default:
                                    include "includes/posts/list_posts.php";
                                    break;
                            }

                        ?>

                    </div>
                </div>

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php" ?>