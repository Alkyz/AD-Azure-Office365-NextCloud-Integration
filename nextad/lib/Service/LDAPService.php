<?php
namespace OCA\NextAD\Service;

use OCP\IL10N;
use OCP\LDAP\ILDAPProvider;
use OCP\LDAP\ILDAPProviderFactory;

class LDAPService {

    // private $ldapProvider;
    // private $l10n;

    // public function __construct(ILDAPProvider $ldapProvider, IL10N $l10n) {
    //     $this->ldapProvider = $ldapProvider;
    //     $this->l10n = $l10n;
    // }

    // public function connect() {
    //     $uid = 'test.user1';

    //     $ldapConnection = $this->ldapProvider->getLDAPConnection($uid);

    //     if($ldapConnection->isConnected()) {
    //         return $this->l10n->t('Connected to LDAP server');
    //     } else {
    //         throw new \Exception($this->l10n->t('Could not connect to LDAP server'));
    //     }
    // }

    private $ldapProviderFactory;
    private $l10n;

    public function __construct(ILDAPProviderFactory $ldapProviderFactory, IL10N $l10n) {
        $this->ldapProviderFactory = $ldapProviderFactory;
        $this->l10n = $l10n;
    }

    public function connect() {
        // Get the LDAPProvider from the factory when it's needed, not in the constructor
        $ldapProvider = $this->ldapProviderFactory->getLDAPProvider();

        // Use the LDAPProvider to establish a connection
        // This assumes you have a method to get a connection configured for a specific user
        $ldapConnection = $ldapProvider->getLDAPConnection();

        if($ldapConnection->isConnected()) {
            return $this->l10n->t('Connected to LDAP server');
        } else {
            throw new \Exception($this->l10n->t('Could not connect to LDAP server'));
        }
    }
}