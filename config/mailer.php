
<?php

return [
    'class' => 'yii\swiftmailer\Mailer',
    // send all mails to a file by default. You have to set
    // 'useFileTransport' to false and configure a transport
    // for the mailer to send real emails.
    'useFileTransport' => false,
    'transport' => [
        'class' => 'Swift_SmtpTransport',
        'host' => 'smtp.gmail.com', // e.g. smtp.mandrillapp.com or smtp.gmail.com
        'username' => 'augustinomateso@gmail.com',
        'password' => 'nviczbtaubkrflpe',
        'port' => '587', // Port 25 is a very common port too
        'encryption' => 'tls', // It is often used, check your provider or mail server specs
    ]
];
