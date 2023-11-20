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

    public function connect($uid) {
        $ldapProvider = $this->ldapProviderFactory->getLDAPProvider();

        $ldapConnection = $ldapProvider->getLDAPConnection($uid);

        $filter = "(objectClass=*)"; 
        $baseDn = $ldapProvider->getUserDN($uid);
        
        $search = ldap_search($ldapConnection, $baseDn, $filter);
        $entries = ldap_get_entries($ldapConnection, $search);
        
        $userData = [
            'displayName' => $entries[0]['displayname'][0],
            'company' => $entries[0]['company'][0],
            'streetAddress' => $entries[0]['streetaddress'][0],
            'email' => $entries[0]['mail'][0], 
            'telephone' => $entries[0]['telephonenumber'][0],
            'webPage' => $entries[0]['wwwhomepage'][0],
            'description' => $entries[0]['description'][0],
        ];
        
        return $userData; 
    }

    public function updateUserAttributes($uid, $data) {
        $ldapProvider = $this->ldapProviderFactory->getLDAPProvider();
        $ldapConnection = $ldapProvider->getLDAPConnection($uid);
        $ldapUserDN = $ldapProvider->getUserDN($uid);
        
        $modifyData = [];
        foreach ($data as $key => $value) {
            if (!in_array($key, ['uid', '_route'])) {
                if ($key === "email") {
                    $key = "mail";
                } elseif ($key === "telephone") {
                    $key = "telephoneNumber";
                } elseif ($key === "webPage") {
                $key = "wWWHomePage";
                }

                if (!empty($value)) {
                    $modifyData[$key] = $value;
                }
            }
        }

        if (!empty($modifyData)) {
            if (ldap_modify($ldapConnection, $ldapUserDN, $modifyData)) {
                return "User attributes updated successfully";
            } else {
                throw new \Exception('Failed to update LDAP attributes');
            }
        } else {
            return "No attributes to update";
        }
    
    }
    
}
