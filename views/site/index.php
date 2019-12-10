<?php require_once ROOT . '/views/layouts/header.php';?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            <div class="panel-group category-products">

                                <?php foreach ($categoryList as $categoryItem): ?>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a href="/category/<?php echo $categoryItem['id']; ?>">
                                                <?php echo $categoryItem['name']; ?>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>

                                <?php endforeach;?>

                            </div>

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Последние товары</h2>

                            <?php foreach ($productList as $product): ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/template/images/home/product1.jpg" alt="" />
                                                <h2><?=$product['price']?></h2>
                                                <p>
                                                    <a href="/product/<?=$product['id']?>">
                                                        <?=$product['name']?>
                                                    </a>
                                                </p>
                                                <a href="/card/add/<?=$product['id']?>" data-id="<?=$product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                            <?php if ($product['is_new']): ?>
                                                <img src="/template/images/home/new.png" class="new" alt="" />
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>

                        </div><!--features_items-->
                        <!-- <div class=" carousel-inner">
  <div>Hi, I'm slide 1</div>
  <div>Hi, I'm slide 2</div>
  <div>Hi, I'm slide 3</div>
  <div>Hi, I'm slide 4</div>
</div> -->
                        <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Рекомендуемые товары</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="siema" style="transform: translateX(0px)">

                        <?php foreach ($recommendProducts as $product): ?>
                                <div class="col-sm-4 my-item">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/template/images/home/product1.jpg" alt="" />
                                                <h2><?=$product['price']?></h2>
                                                <p>
                                                    <a href="/product/<?=$product['id']?>">
                                                        <?=$product['name']?>
                                                    </a>
                                                </p>
                                                <a href="/card/add/<?=$product['id']?>" data-id="<?=$product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                            <?php if ($product['is_new']): ?>
                                                <img src="/template/images/home/new.png" class="new" alt="" />
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>

                        </div>
                        <a class="prev left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="next right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

                    </div>
                </div>
            </div>
        </section>

        <template id="card-template" style="display: none">
            <div class="col-sm-4 my-item">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="/template/images/home/recommend1.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                        </div>
                    </div>
                 </div>
            </div>
        </template>

<?php require_once ROOT . '/views/layouts/footer.php';?>