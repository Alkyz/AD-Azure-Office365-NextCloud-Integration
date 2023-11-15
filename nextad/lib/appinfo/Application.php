<?php
namespace OCA\NextAD\AppInfo;

use OCP\AppFramework\App;
use OCP\AppFramework\IAppContainer;
use OCA\NextAD\Service\LDAPService;
use OCA\NextAD\Controller\PageController;
use OCP\IL10N;
use OCP\LDAP\ILDAPProvider;
use OCP\LDAP\ILDAPProviderFactory;
use OCP\IRequest;

class Application extends App {
    public const APP_ID = 'nextad';

    public function __construct(array $urlParams = []) {
        parent::__construct(self::APP_ID, $urlParams);
        $this->registerServices();
    }

    private function registerServices() {
        $container = $this->getContainer();
	    
	$container->registerService(LDAPService::class, function(IAppContainer $c) {
		return new LDAPService(
			$c->query(ILDAPProviderFactory::class),
			$c->query(IL10N::class)
		);
	});

        $container->registerService(PageController::class, function(IAppContainer $c) {
            return new PageController(
                $c->query(IRequest::class),
                $c->query('LDAPService')
            );
        });
    }
}
