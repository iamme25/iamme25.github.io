<?php

include('includes/config.php');

if(isset($_GET['title']))
{
    $slug = mysqli_real_escape_string($con, $_GET['title']);

    $category = "SELECT slug,meta_title,meta_description,meta_keyword FROM categories WHERE slug='$slug' AND status='0' LIMIT 1";
    $category_run = mysqli_query($con, $category);

    if(mysqli_num_rows($category_run) > 0)
    {
        $categoryItem = mysqli_fetch_array($category_run);

        $page_title = $categoryItem['meta_title'];
        $meta_description = $categoryItem['meta_description'];
        $meta_keywords = $categoryItem['meta_keyword'];
    }
    else
    {
        $page_title = "Category Page";
        $meta_description = "Category page description blogging website";
        $meta_keywords = "php, html, css, laravel, codeigniter, react js";
    }
}
else
{
    $page_title = "Category Page";
    $meta_description = "Category page description blogging website";
    $meta_keywords = "php, html, css, laravel, codeigniter, react js";
}

include('includes/header.php');
include('includes/navbar.php');
?>

<!-- <div class="py-5">
    <div class="container">
        <div class="row">

            <div class="col-md-6">

                <?php
                if(isset($_GET['title']))
                {
                    $slug = mysqli_real_escape_string($con, $_GET['title']);

                    $category = "SELECT id,slug FROM categories WHERE slug='$slug' AND status='0' LIMIT 1";
                    $category_run = mysqli_query($con, $category);

                    if(mysqli_num_rows($category_run) > 0)
                    {
                        $categoryItem = mysqli_fetch_array($category_run);
                        $category_id = $categoryItem['id'];

                        $posts = "SELECT category_id,image,name,slug,created_at FROM posts WHERE category_id='$category_id' AND status='0'  ORDER BY id DESC LIMIT 6";
                        $posts_run = mysqli_query($con, $posts);

                        if(mysqli_num_rows($posts_run) > 0)
                        {
                            foreach($posts_run as $postItems)
                            {
                                ?>
                                    <a href="<?= base_url('post/'.$postItems['slug']); ?>" class="text-decoration-none">
                                        <div class="card card-body shadow-sm mb-4">
                                            <?php if($postItems['image'] != null) : ?>
                                                <img src="<?= base_url('uploads/posts/'.$postItems['image']) ?>" class="w-100 mb-4" alt="<?=$postItems['name'];?>" />
                                            <?php endif; ?>
                                            
                                            <h5><?=$postItems['name'];?></h5>
                                            <div>
                                                <label class="text-dark me-2">Posted On: <?=date('d-M-Y', strtotime($postItems['created_at'])); ?></label>
                                            </div>
                                        </div>
                                    </a>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                                <h4>No Post Available</h4>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                            <h4>No such Category Found</h4>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <h4>No such URL Found</h4>
                    <?php
                }
                ?>
                

            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Advertise Area</h4>
                    </div>
                    <div class="card-body">
                        your advertise
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> -->


<main class="content bg-white container py-3">
    <section class="row"> 
        <?php
        if(isset($_GET['title']))
        {
            $slug = mysqli_real_escape_string($con, $_GET['title']);

            $category = "SELECT id,slug FROM categories WHERE slug='$slug' AND status='0' LIMIT 1";
            $category_run = mysqli_query($con, $category);

            if(mysqli_num_rows($category_run) > 0)
            {
                $categoryItem = mysqli_fetch_array($category_run);
                $category_id = $categoryItem['id'];

                $posts = "SELECT category_id,image,name,slug,created_at FROM posts WHERE category_id='$category_id' AND status='0'  ORDER BY id DESC LIMIT 6";
                $posts_run = mysqli_query($con, $posts);

                if(mysqli_num_rows($posts_run) > 0)
                {
                    foreach($posts_run as $postItems)
                    {
                        ?>
                        <article class="col-md-6 p-0">
                            <div class="card m-4 shadow-sm mb-4">
                                <a href="<?= base_url('post/'.$postItems['slug']); ?>" class="text-decoration-none">
                                    <?php if($postItems['image'] != null) : ?>
                                        <img src="<?= base_url('uploads/posts/'.$postItems['image']) ?>" class="w-100 mb-4" alt="<?=$postItems['name'];?>" />
                                    <?php endif; ?>
                                    
                                    <div class="article-content px-3 pb-4">
                                        <h5><?=$postItems['name'];?></h5>
                                        <div>
                                            <label class="text-dark me-2">Posted On: <?=date('d-M-Y', strtotime($postItems['created_at'])); ?></label>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </article>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <h4>No Post Available</h4>
                    <?php
                }
            }
            else
            {
                ?>
                    <h4>No such Category Found</h4>
                <?php
            }
        }
        else
        {
            ?>
                <h4>No such URL Found</h4>
            <?php
        }
        ?>

        <!-- <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Advertise Area</h4>
                </div>
                <div class="card-body">
                    your advertise
                </div>
            </div>
        </div> -->

    </section>  
</main>

<!-- main deal below here -->

<!-- <main class="content bg-white container py-3">
    <section class="row">                                  
        <?php
            $homePosts = "SELECT * FROM posts WHERE status='0' ORDER BY id DESC LIMIT 12";
            $homePosts_run = mysqli_query($con, $homePosts);

            while ($homePostItem = mysqli_fetch_array($homePosts_run)) {?>
            
                <article class="col-md-6 p-0">
                    <div class="card m-4 shadow-sm">
                        
                        <a href="<?= base_url('post/'.$homePostItem['slug']); ?>" class="text-decoration-none">
                            <?php if($homePostItem['image'] != null) : ?>
                                <img src="<?= base_url('uploads/posts/'.$homePostItem['image']) ?>" class="img-fluid" alt="<?=$homePostItem['name'];?>" />
                            <?php endif; ?>
                            <div class="article-content px-2 py-1">
                                <h5><?=$homePostItem['name'];?></h5>
                                <div>
                                    <label class="text-dark me-2">Posted On: <?=date('d-M-Y', strtotime($homePostItem['created_at'])); ?></label>
                                </div>
                            </div>
                        </a>
                    </div>
                </article>
            
            <?php }
    
        ?>
    </section>  
</main> -->

<!-- end of main deal -->

<?php
include('includes/footer.php');
?>