<?php
 
///////////////////////////////////////////////////////////////////////////////
 
// api dependencies
require_once $_SERVER['DOCUMENT_ROOT'].'/include/Google/Client.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/include/Google/Service/Analytics.php';

const CLIENT_ID         = '194409181325-kk7ludk25s8dfl8qnr0t3j2u184h8l0c.apps.googleusercontent.com';
const SERVICE_EMAIL     = '194409181325-kk7ludk25s8dfl8qnr0t3j2u184h8l0c@developer.gserviceaccount.com';
const KEY_FILE_PATH     = '/include/83b8b1c5fd6e902573366858ee24acf1ebb770a8-privatekey.p12';      
                          // Make sure you keep your key .p12-file in a 
                          // secure location and isn't readable by others
const ANALYTICS_SCOPE   = 'https://www.googleapis.com/auth/analytics.readonly';
 
$client = new Google_Client();
$client->setApplicationName( 'Analytics' );


$client->setAssertionCredentials(
    new Google_Auth_AssertionCredentials(
        SERVICE_EMAIL,
        array( ANALYTICS_SCOPE ),
        file_get_contents( $_SERVER['DOCUMENT_ROOT'].KEY_FILE_PATH )
        )
    );

$client->setAccessType('offline');

$service = new Google_Service_Analytics( $client );
$results = $service->data_ga->get(
    'ga:59248007',
    '2013-01-01',
    date('Y-m-d'),
    'ga:pageview',
    array(
        'max-results'   => '100'
        )
    );
$count = (string)$results->totalsForAllResults['ga:sessions'];
return $count;
?>