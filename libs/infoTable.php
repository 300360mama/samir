<?php

$resultArray = [
	'isRobots'=>[
		'testName'=>'Проверка наличия файла robots.txt',
		'error'=>[
			'status'=>'Ошибка',
		    'state'=>'Файл robots.txt отсутствует',
		    'recommendations'=>'Программист: Создать файл robots.txt и разместить его на сайте.'
		],

		'ok'=>[
			'status'=>'Ок',
		    'state'=>'Файл robots.txt присутствует',
		    'recommendations'=>'Доработки не требуются'

		]
		
	],

	'isHost'=>[
		'testName'=>'Проверка указания директивы Host',
		'error'=>[
			'status'=>'Ошибка',
		    'state'=>'В файле robots.txt не указана директива Host',
		    'recommendations'=>'Программист: Для того, чтобы поисковые системы знали, какая версия сайта является основных зеркалом, необходимо прописать адрес основного зеркала в директиве Host. В данный момент это не прописано. Необходимо добавить в файл robots.txt директиву Host. Директива Host задётся в файле 1 раз, после всех правил.'
		],

		'ok'=>[
			'status'=>'Ок',
		    'state'=>'Директива Host указана',
		    'recommendations'=>'Доработки не требуются'

		]

	],

	'quantityHost'=>[
	    'testName'=>'Проверка количества директив Host, прописанных в файле',
		'error'=>[
			'status'=>'Ошибка',
		    'state'=>'В файле прописано несколько директив Host',
		    'recommendations'=>'Программист: Директива Host должна быть указана в файле толоко 1 раз. Необходимо удалить все дополнительные директивы Host и оставить только 1, корректную и соответствующую основному зеркалу сайта'
		],

		'ok'=>[
			'status'=>'Ок',
		    'state'=>'В файле прописана 1 директива Host',
		    'recommendations'=>'Доработки не требуются'

		]
	],

	'sizeRobots'=>[
	   'testName'=>'Проверка размера файла robots.txt',
		'error'=>[
			'status'=>'Ошибка',
		    'state'=>'Размера файла robots.txt составляет %d Кб, что превышает допустимую норму',
		    'recommendations'=>'Программист: Максимально допустимый размер файла robots.txt составляем 32 кб. Необходимо отредактировть файл robots.txt таким образом, чтобы его размер не превышал 32 Кб'
		],

		'ok'=>[
			'status'=>'Ок',
		    'state'=>'Размер файла robots.txt составляет %d Кб, что находится в пределах допустимой нормы',
		    'recommendations'=>'Доработки не требуются'

		]
	],

	'isSitemap'=>[
		'testName'=>'Проверка указания директивы Sitemap',
		'error'=>[
			'status'=>'Ошибка',
		    'state'=>'В файле robots.txt не указана директива Sitemap',
		    'recommendations'=>'Рекомендации'
		],

		'ok'=>[
			'status'=>'Ок',
		    'state'=>'Директива Sitemap указана',
		    'recommendations'=>'Доработки не требуются'

		]
	],

	'codeResponse'=>[
		'testName'=>'Проверка кода ответа сервера для файла robots.txt',
		'error'=>[
			'status'=>'Ошибка',
		    'state'=>'При обращении к файлу robots.txt сервер возвращает код ответа "%s"',
		    'recommendations'=>'Программист: Файл robots.txt должны отдавать код ответа 200, иначе файл не будет обрабатываться. Необходимо настроить сайт таким образом, чтобы при обращении к файлу robots.txt сервер возвращает код ответа 200'
		],

		'ok'=>[
			'status'=>'Ок',
		    'state'=>'Файл robots.txt отдаёт код ответа сервера 200. При обращении к файлу robots.txt сервер возвращает код ответа "%s"',
		    'recommendations'=>'Доработки не требуются'

		]
	]
];