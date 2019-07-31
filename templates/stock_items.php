<?
require_once 'db/queries.php';
?>

<?
$bestsellers = getBestSellersOrStocks($dbh, 'bestseller');
$stocks = getBestSellersOrStocks($dbh, 'stock');
?>

<div class="default_container new_section_container">
    <div class="new_section_title">
        Наши акции
    </div>
    <div class="stock_items">
        <div class="goods-carousel">
            <?php foreach ($stocks as $stock) : ?>
                <div class="stock_block">
                    <div class="stock_image">
                        <?= '<a href="/catalog/' . concatCategoryAndFullName($stock['category_name'], $stock['url_name'], $stock['color_name']) . '">'; ?>
                        <?= '<img src="' . PRODUCT_IMAGES_PATH . $stock['image_name'] . '">'; ?>
                        </a>
                    </div>
                    <div class="stock_text_container">
                        <div class="stock_text">
                            <div class="stock_description">
                                <?= getProductNameWithColor($stock['name'], $stock['color_name']); ?>
                            </div>
                            <div class="stock_prices">
                                <div class="stock_new_price">
                                    <?= priceFormat($stock['discount_price']); ?>
                                </div>
                                <div class="stock_old_price">
                                    <?= priceFormat($stock['price']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<? require_once('templates/close_connection.php'); ?>