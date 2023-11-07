<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: Mario Oliva <moliv149@fiu.edu>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\NextAD\AppInfo;

use OCP\AppFramework\App;

class Application extends App {
	public const APP_ID = 'nextad';

	public function __construct() {
		parent::__construct(self::APP_ID);
	}
}
