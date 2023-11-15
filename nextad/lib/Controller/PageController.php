<?php

declare(strict_types=1);

namespace OCA\NextAD\Controller;

use OCA\NextAD\Service\LDAPService;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Controller;
use OCP\IRequest;
use OCP\ILogger;
use OCP\AppFramework\Http\NoAdminRequired;
use OCP\AppFramework\Http\Attribute\NoCSRFRequired;
use OCP\AppFramework\Http\TemplateResponse;

class PageController extends Controller {

    public function __construct(
        IRequest $request,
        private LDAPService $ldapService,
        private ILogger $logger
    ) {
        parent::__construct('nextad', $request);
    }

	#[NoAdminRequired]
	#[NoCSRFRequired]
	public function index(): TemplateResponse {
		$this->logger->info('Index method called');

		\OCP\Util::addStyle('nextad', 'nextad_styles');
		\OCP\Util::addScript('nextad', 'nextad_scripts');

		$response = new TemplateResponse('nextad', 'main'); 
	
		return $response;
}

    #[NoAdminRequired]
    #[NoCSRFRequired]
    public function checkLdapConnection(): JSONResponse {
        $this->logger->info('checkLdapConnection called');
        try {
            $message = $this->ldapService->connect();
            $this->logger->info('LDAP connection message: ' . $message);
            return new JSONResponse([
                'status' => 'success',
                'data' => $message
            ]);
        } catch (\Exception $e) {
            $this->logger->error('Error in LDAP connection: ' . $e->getMessage(), ['exception' => $e]);
            return new JSONResponse([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], $e->getCode() === 0 ? 500 : $e->getCode());
        }
    }
}

