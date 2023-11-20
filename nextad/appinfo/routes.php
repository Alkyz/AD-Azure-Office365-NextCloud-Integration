<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: Mario Oliva <moliv149@fiu.edu>
// SPDX-License-Identifier: AGPL-3.0-or-later

/**
 * Create your routes in here. The name is the lowercase name of the controller
 * without the controller part, the stuff after the hash is the method.
 * e.g. page#index -> OCA\NextAD\Controller\PageController->index()
 *
 * The controller class has to be registered in the application.php file since
 * it's instantiated in there
 */

use OCA\NextAD\Controller\PageController;

return [
	'resources' => [
		'note' => ['url' => '/notes'],
		'note_api' => ['url' => '/api/0.1/notes']
	],
	'routes' => [
		['name' => 'page#index', 'url' => '/', 'verb' => 'GET'],
		['name' => 'note_api#preflighted_cors', 'url' => '/api/0.1/{path}',
			'verb' => 'OPTIONS', 'requirements' => ['path' => '.+']],
		['name' => 'page#getUserAttributes', 'url' => '/getUserAttributes/{uid}',
				'verb' => 'GET'],
		['name' => 'page#putUserAttributes', 'url' => '/putUserAttributes/{uid}',
				'verb' => 'PUT']
	]
];


