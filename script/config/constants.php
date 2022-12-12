<?php

$app_name =  env('APP_NAME');

return [
    'success' => [
        'installation_successful' => $app_name.' app has been setup successfully',
        'settings_updated' => 'Your Settings Successfully Updated'
    ],
    'placeholders' => [
        'configure_database' => 'Please enter your database connection details'
    ],
    'message' => [
        'monetization' => "Grow with {$app_name} ... \n
                            As a {$app_name} partner, you'll be eligible to earn money from your videos \n
                            To get into the {$app_name} Partner Program, your channel needs 4,000 public watch hours in the last 12 months, and 1,000 followers. \n "
    ]
];