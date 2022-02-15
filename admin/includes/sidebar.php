<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-arrows-v"></i>
                Posts <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="posts" class="collapse">
                <li>
                    <a href="posts.php" op>View Posts</a>
                </li>
                <li>
                    <a href="posts.php?source=add">Add Post</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#cats"><i class="fa fa-fw fa-arrows-v"></i>
                Categories <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="cats" class="collapse">
                <li>
                    <a href="categories.php">View all Categories</a>
                </li>
                <li>
                    <a href="categories.php">Add Category</a>
                </li>
            </ul>
        </li>
        
        <li>
            <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-arrows-v"></i>
                Users <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="users" class="collapse">
                <li>
                    <a href="#">View all Users</a>
                </li>
                <li>
                    <a href="#">Add User /Admin</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="index.html"><i class="fa fa-fw fa-user"></i> Profile</a>
        </li>
    </ul>
</div>
<!-- /.navbar-collapse -->