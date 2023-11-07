<?php
declare(strict_types=1);
// SPDX-FileCopyrightText: Mario Oliva <moliv149@fiu.edu>
// SPDX-License-Identifier: AGPL-3.0-or-later

namespace OCA\NextAD\Tests\Unit\Controller;

use OCA\NextAD\Controller\NoteApiController;

class NoteApiControllerTest extends NoteControllerTest {
	public function setUp(): void {
		parent::setUp();
		$this->controller = new NoteApiController($this->request, $this->service, $this->userId);
	}
}
