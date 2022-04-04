<?php
include('includes/config.php');

if(isset($_GET['title']))
{
    $slug = mysqli_real_escape_string($con, $_GET['title']);

    $meta_posts = "SELECT slug,meta_title,meta_description,meta_keyword FROM posts WHERE slug='$slug' LIMIT 1";
    $meta_posts_run = mysqli_query($con, $meta_posts);

    if(mysqli_num_rows($meta_posts_run) > 0)
    {
        $metaPostItem = mysqli_fetch_array($meta_posts_run);

        $page_title = $metaPostItem['meta_title'];
        $meta_description = $metaPostItem['meta_description'];
        $meta_keywords = $metaPostItem['meta_keyword'];
    }
    else
    {
        $page_title = "Post Page";
        $meta_description = "Post page description blogging website";
        $meta_keywords = "php, html, css, laravel, codeigniter, react js";
    }
}
else
{
    $page_title = "Post Page";
    $meta_description = "Post page description blogging website";
    $meta_keywords = "php, html, css, laravel, codeigniter, react js";
}

include('includes/header.php');
include('includes/navbar.php');
?>



<main class="content container py-4">
    <section class="row">
            <?php
                if(isset($_GET['title']))
                {
                    $slug = mysqli_real_escape_string($con, $_GET['title']);

                    $posts = "SELECT * FROM posts WHERE slug='$slug' ";
                    $posts_run = mysqli_query($con, $posts);

                    if(mysqli_num_rows($posts_run) > 0)
                    {
                        foreach($posts_run as $postItems)
                        {
                            ?>
                            <article class="col-md-12">
                                <div class="card m-2">
                                    <?php if($postItems['image'] != null) : ?>
                                    <img src="<?= base_url('uploads/posts/'.$postItems['image']) ?>" class="img-fluid mb-4" alt="<?=$postItems['name'];?>" />
                                    <?php endif; ?>
                                    <div class="article-content px-4 pb-4">
                                        <label class="text-dark mb-3">Posted On: <?=date('d-M-Y', strtotime($postItems['created_at'])); ?></label>
                                        <h5><?=$postItems['name'];?></h5>
                                        <div class="pt-2">
                                            <?=$postItems['description'];?>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                            <h4>No such Post Found</h4>
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
        </article>
    </section>
</main>


<?php
include('includes/footer.php');
?>