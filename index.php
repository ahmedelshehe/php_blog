<?php
include "includes/header.php";
?>

<body>
<?php
include "includes/navigation.php";
?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <?php
        if(isset($_GET['post'])){
            include "post.php";
        } else if(isset($_GET['category'])){
            include "includes/category.php"; 
        }else {
            include "includes/main.php"; 
        }          
         ?>        
        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php" ?>

    </div>
    <!-- /.row -->

    <hr>


    <?php
    include "includes/footer.php";
    ?>

