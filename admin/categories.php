<?php include "includes/header.php" ?>
<div id="wrapper">
    <?php
    include "includes/navigation.php"
    ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Categories Panel
                    </h1>
                    <div class="col-xs-6">
                        <?php include "includes/categories/add_category.php" ?>
                        <?php include "includes/categories/edit_category.php" ?>
                    </div>
                    <div class="col-xs-6">
                        <?php include "includes/categories/category_table.php" ?>
                    </div>
                </div>
            </div>

            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
</div>
<!-- /#wrapper -->
<?php include "includes/footer.php" ?>