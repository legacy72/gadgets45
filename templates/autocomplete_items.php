<?
require_once('../db/queries.php');
require_once('functions.php');
require_once('config.php');
?>

<?

$autocompleteItems = array();
$searchedItems = getSearchedProducts($dbh);
foreach($searchedItems as $searchedItem){
    array_push(
        $autocompleteItems,  
        array(
            "label" => getProductNameWithColor(
                $searchedItem["name"], $searchedItem["color_name"]
            ),
            "value" => '/'. CATALOG_PATH. concatCategoryAndFullName(
                $searchedItem["category_name"],
                $searchedItem["url_name"],
                $searchedItem["color_name"]
            )
        )
    );
}

echo(json_encode($autocompleteItems));
