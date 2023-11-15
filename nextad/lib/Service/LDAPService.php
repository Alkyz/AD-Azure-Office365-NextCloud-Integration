<?php
namespace OCA\NextAD\Service;

use OCP\IL10N;
use OCP\LDAP\ILDAPProvider;
use OCP\LDAP\ILDAPProviderFactory;

class LDAPService {

    private $ldapProviderFactory;
    private $l10n;

    public function __construct(ILDAPProviderFactory $ldapProviderFactory, IL10N $l10n) {
        $this->ldapProviderFactory = $ldapProviderFactory;
        $this->l10n = $l10n;
    }

    public function connect() {
        $ldapProvider = $this->ldapProviderFactory->getLDAPProvider();

        // Get User UID from your AD server and pass it into getLDAPConnection()
        $ldapConnection = $ldapProvider->getLDAPConnection();

        if($ldapConnection->isConnected()) {
            return $this->l10n->t('Connected to LDAP server');
        } else {
            throw new \Exception($this->l10n->t('Could not connect to LDAP server'));
        }
    }
}
