<?
if(isset($_GET['price_from']) && isset($_GET['price_to'])){
	echo '
		<input class="price_from" id="price_from" type="text" placeholder="6990" value="'.$_GET['price_from'].'" name="">
		<input class="price_to" id="price_to" type="text" placeholder="199 000" value="'.$_GET['price_to'].'"name="">	
	';
}
else{
	echo '
		<input class="price_from" id="price_from" type="text" placeholder="6990" name="">
		<input class="price_to" id="price_to" type="text" placeholder="199 000" name="">	
	';
}
