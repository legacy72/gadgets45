<?
define("DOMEN_NAME", "http://gadgets45.site");
define("IMAGES_PATH", "images");
define("PRODUCT_IMAGES_PATH", IMAGES_PATH."/"."product_images/");
define("CATALOG_PATH", "catalog/");

define("EMAIL_FOR_PHPMAILER", "testkeklol123321@gmail.com");

define(
	"ADMIN_EMAILS", array(
		"gadgets45common1@gmail.com",
	)
);

define(
	"CATEGORY_DICT", array(
		"1" => "Смартфоны",
		"2" => "Ноутбуки",
		"3" => "Аксессуары",
	)
);

define(
	"CATEGORY_ENG_TO_RUS", array(
		"smartphones" => "Смартфоны",
		"notebooks" => "Ноутбуки",
		"accessories" => "Аксессуары",
	)
);

define("PRODUCTS_ON_PAGE", 3);

define(
	"SMARTPHONES_SPECIFICATIONS_NAME_TO_INDEX", array(
		"brand" => 1,
		"screen_diagonal" => 2,
		"screen_resolution" => 3,
		"ram_size" => 11,
		"number_of_megapixels_of_the_front" => 22,
		"processor_model" => 7,
		"number_of_proecssor_cores" => 8,
		"cpu_frequency" => 9,
		"amount_of_internal_memory" => 12,
		"operating_system_version" => 108,
	)
);

define(
	"NOTEBOOKS_SPECIFICATIONS_NAME_TO_INDEX", array(
		"brand" => 38,
		"operating_system" => 39,
		"ram_size" => 68,
		"processor_model" => 58,
		"number_of_processor_cores" => 59,
		"cpu_frequency" => 60,
	)
);

define(
	"SMARTPHONES_SPECIFICATIONS_ENG_TO_RUS", array(
		"brand" => "Бренд", 
		"screen_diagonal" => "Диагональ экрана", 
		"screen_resolution" => "Разрешение экрана",
		"ram_size" => "Оперативная память", 
		"number_of_megapixels_of_the_front" => "Количество мегапикселей основной камеры",
		"processor_model" => "Модель процессора",
		"number_of_processor_cores" => "Количество ядер", 
		"cpu_frequency" => "Частота процессора",
		"amount_of_internal_memory" => "Объем встроенной памяти",
		"operating_system_version" => "Версия операционной системы", 	
	)
);

define(
	"NOTEBOOKS_SPECIFICATIONS_ENG_TO_RUS", array(
		"brand" => "Бренд", 
		"operating_system" => "Операционная система", 
		"ram_size" => "Оперативная память", 
		"processor_model" => "Модель процессора",
		"number_of_processor_cores" => "Количество ядер", 
		"cpu_frequency" => "Частоста процессора",
	)
);

define(
	"SMARTPHONES_MAIN_SPECS", array(
		"screen_diagonal", 
		"screen_resolution",
		"ram_size", 
		"number_of_megapixels_of_the_front",
		"processor_model",
		"number_of_processor_cores", 
		"cpu_frequency",
		"amount_of_internal_memory",
		"operating_system_version", 	
	)
);

define(
	"NOTEBOOKS_MAIN_SPECS", array(
		"screen_diagonal", 
		"type_of_ram",
		"ram_size", 
		"operating_system",
		"processor_model",
		"number_of_processor_cores", 
		"cpu_frequency",
		"approximate_battery_life",
		"type_of_ram", 	
	)
);

define(
	"ACCESSORIES_MAIN_SPECS", array(

	)
);

define(
	"CATEGORY_GROUP_ENG_TO_RUS", array(
		"common" => "Основные",
		"screen" => "Экран",
		"system" => "Система",
		"main_and_front_cameras" => "Камеры",
		"mobile_connection" => "Мобильная связь",
		"wired_interfaces" => "Проводные интерфейсы",
		"additional_information" => "Дополнительная информация",
		"dimensions_and_weight" => "Габариты и вес",
		"classification" => "Классификация",
		"housing_and_input_devices" => "Корпус и устройства ввода",
		"processor" => "Процессор",
		"ram_info" => "Оперативная память",
		"graphic_accelerator" => "Графический ускоритель",
		"data_storages" => "Накопители данных",
		"built_in_additional_equipment" => "Встроенное дополнительное оборудование",
		"internet_data_transfer" => "Интернет/передача данных",
		"interfaces_connectors" => "Интерфейсы/разъемы",
		"battery" => "Питание",
		"equipment" => "Комплектация",
	)
);

?>