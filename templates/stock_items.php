<?
require_once 'db/queries.php';
?>

<?
$bestsellers = getBestSellersOrStocks($dbh, 'bestseller');
$stocks = getBestSellersOrStocks($dbh, 'stock');
?>

<section class="s-shares" id="s-shares">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="shares">
                    <h2 class="s-title">
                        Наши акции
                    </h2>
                    <div class="shares-slider">
                        <?php foreach($stocks as $stock): ?>
                            <?='<a href="/catalog/'. concatCategoryAndFullName($stock['category_name'], $stock['url_name'], $stock['color_name']). '" class="slide d-flex">';?>
                                <div class="slide__pic">
                                    <?='<img src="'. PRODUCT_IMAGES_PATH . $stock['image_name']. '" alt="'. getProductNameWithColor($stock['name'], $stock['color_name']). '">';?>
                                </div>
                                <div class="slide__descr d-flex">
                                    <h4 class="slide__head">
                                        <?=getProductNameWithColor($stock['name'], $stock['color_name']); ?>
                                    </h4>
                                    <div class="slide__price">
                                        <span class="slide__price_new product__price_new">
                                            <?=priceFormat($stock['discount_price']); ?>
                                        </span>
                                        <span class="slide__price_old">
                                            <?=priceFormat($stock['price']); ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach;?>
                    </div>
                    <div class="shares-slider__dots"></div>
                </div>
            </div>
        </div>
    </div>
</section>


<? require_once('templates/close_connection.php'); ?>