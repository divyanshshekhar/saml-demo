<?php

/**
 * SAML 2.0 remote IdP metadata for SimpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-remote
 */

/* Config for first SAML SP (Service Provider i.e. Target Website0 */
$metadata['http://saml-sp/saml/sp'] = [
  'AssertionConsumerService' => 'https://saml-sp/saml/sp/saml2-acs',
  'SingleLogoutService'      => 'https://saml-sp/saml/sp/saml2-logout',
];