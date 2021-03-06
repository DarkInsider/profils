<?php
if (!isset($_POST['query']) || !$_POST['query']) {
	exit("Нет данных определяющих тип запроса");
}
else {
	// Сохраняем строку запроса данных в отдельной переменной
	$query = trim($_POST['query']); // Очищаем от лишних пробелов
	
	// Определяем тип запроса
	switch($query) {
	case 'getKinds':	// Запрос на получение видов транспорта
		// Сохраним в переменную значение выбранного типа транспорта
		$type_id = trim($_POST['type_id']); // Очистим его от лишних пробелов
		// Формируем массив с ответом
		$result = NULL;
		$i = 0;
		foreach ($types[$type_id] as $kind_id => $kind) {
			$result[$i]['kind_id'] = $kind_id;
			$result[$i]['kind'] = $kind;
			$i++;
		}
	break;
	case 'getCategories':	// Запрос на получение категорий транспорта
		// Сохраним в переменные значения выбранных типа транспорта и вида транспорта
		$type_id = trim($_POST['type_id']); // Очистим их от лишних пробелов
		$kind_id = trim($_POST['kind_id']);
		// Формируем массив с ответом
		$result = NULL;
		$i = 0;
		foreach ($kinds[$type_id][$kind_id] as $category_id => $category) {
			$result[$i]['category_id'] = $category_id;
			$result[$i]['category'] = $category;
			$i++;
		}
	break;
	default:
		// Если данные не определены
		$result = NULL;
	break;
	}
}

// Преобразуем данные в формат json, чтобы их смог обработать JavaScript-сценарий, приславший запрос
echo json_encode($result);

/**
 * Данный код не идеален. Сама идея представления исходных данных о транспорте в виде массива очень
 * далека от идеала. И вы должны понимать почему. Данные должны храниться в реляционной базе данных, 
 * а представленный вариант написания сценария является лишь простейшим примером, который не стоит 
 * в таком виде применять на практике. Вы здесь должны лишь понять принципы работы языка и взаимодействия
 * между языками программирования
 */
?>