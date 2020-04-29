<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | TxtBox API Key
    |--------------------------------------------------------------------------
    | 
    | API Key from your TxtBox account.
    |
    | You need a valid API key with enough TxtBox SMS credits for it to work.
    | Get your API key at: https://www.txtbox.com/api-keys (sign in required)
    |
    */
	
    'api_key' => env('TXTBOX_API_KEY', ''),
	
    /*
    |--------------------------------------------------------------------------
    | Verify SSL
    |--------------------------------------------------------------------------
    | 
    | Describes the SSL certificate verification behavior of a request.
    |
    | Set to true to enable SSL certificate verification and use the default CA bundle provided by operating system.
    | Set to false to disable certificate verification (this is insecure!).
    | Set to a string to provide the path to a CA bundle to enable verification using a custom certificate.
    |
    */
   
    'ssl_verify' => env('TXTBOX_SSL_VERIFY', true)
    
];