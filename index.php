<?php
include('includes/config.php');

$page_title = "Home Page";
$meta_description = "Home page description blogging website";
$meta_keywords = "php, html, css, laravel, codeigniter, react js";

include('includes/header.php');
include('includes/navbar.php');
?>

<!-- <div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-white">Category</h3>
                <div class="underline"></div>
            </div>

            <?php
                $homeCategory = "SELECT * FROM categories WHERE navbar_status='0' AND status='0' LIMIT 12";
                $homeCategory_run = mysqli_query($con, $homeCategory);

                if(mysqli_num_rows($homeCategory_run) > 0)
                {
                    foreach($homeCategory_run as $homeCateItem)
                    {
                        ?>
                            <div class="col-md-3 mb-4">
                                <a class="text-decoration-none" href="category.php?title=<?= $homeCateItem['slug']; ?>">
                                    <div class="card card-body">
                                        <?= $homeCateItem['name']; ?>
                                    </div>
                                </a>
                            </div>
                        <?php
                    }
                }
            ?>

        </div>
    </div>
</div> -->

<!-- <div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-dark">Iamme</h3>
                <div class="underline"></div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean varius ante justo, quis maximus eros consequat laoreet. Etiam euismod, ante sed porta sollicitudin, erat lectus suscipit mauris, vel faucibus quam justo vitae odio.
                </p>
            </div>
        </div>
    </div>
</div> -->

<!-- <div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-dark">Latest Posts</h3>
                <div class="underline"></div>

                <?php
                    $homePosts = "SELECT * FROM posts WHERE status='0' ORDER BY id DESC LIMIT 12";
                    $homePosts_run = mysqli_query($con, $homePosts);

                    if(mysqli_num_rows($homePosts_run) > 0)
                    {
                        foreach($homePosts_run as $homePostItem)
                        {
                            ?>
                                <div class="col-md-6">
                                    
                                        <a href="<?= base_url('post/'.$homePostItem['slug']); ?>" class="text-decoration-none">
                                            <div class="card card-body shadow-sm mb-4">
                                                <?php if($homePostItem['image'] != null) : ?>
                                                    <img src="<?= base_url('uploads/posts/'.$homePostItem['image']) ?>" class="w-100 mb-4" alt="<?=$homePostItem['name'];?>" />
                                                <?php endif; ?>
                                                
                                                <h5><?=$homePostItem['name'];?></h5>
                                                <div>
                                                    <label class="text-dark me-2">Posted On: <?=date('d-M-Y', strtotime($homePostItem['created_at'])); ?></label>
                                                </div>
                                            </div>
                                        </a>
                                    
                                </div>
                            <?php
                        }
                    }
                ?>

            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Reach Us</h4>
                    </div>
                    <div class="card-body">
                        info@example.com
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div> -->


<!-- main deal below here -->

<main class="content bg-white container py-3">
    <section class="row">                                  
        <?php
            $homePosts = "SELECT * FROM posts WHERE status='0' ORDER BY id DESC LIMIT 12";
            $homePosts_run = mysqli_query($con, $homePosts);

            while ($homePostItem = mysqli_fetch_array($homePosts_run)) {?>
            
                <article class="col-md-6 p-0">
                    <div class="card m-4 shadow-sm mb-4">
                        
                        <a href="<?= base_url('post/'.$homePostItem['slug']); ?>" class="text-decoration-none">
                            <?php if($homePostItem['image'] != null) : ?>
                                <img src="<?= base_url('uploads/posts/'.$homePostItem['image']) ?>" class="w-100 mb-4" alt="<?=$homePostItem['name'];?>" />
                            <?php endif; ?>
                            <div class="article-content px-3 pb-4">
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
</main>

<!-- end of main deal -->

<?php
include('includes/footer.php');
?>