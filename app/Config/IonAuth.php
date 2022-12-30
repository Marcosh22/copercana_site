<?php namespace Config;

class IonAuth extends \IonAuth\Config\IonAuth
{
    // set your specific config
    public $siteTitle                = 'agronegocioscopercana.com.br';       // Site Title, example.com
    public $adminEmail               = 'site@agronegocioscopercana.com.br'; // Admin Email, admin@example.com
	public $maximumLoginAttempts     = 5;
    // public $emailTemplates           = 'App\\Views\\auth\\email\\';
}