# test-smtf

$config = new ConfigAdapter('host', 'port', 'encryption', 'username', 'password');

$message = new Message(
    'body',
    'from',
    'to',
    'title_mail',
    'layout_of_view(have default param)');

$mailer = new MailCompile();

$mailer->run($message, $config);
