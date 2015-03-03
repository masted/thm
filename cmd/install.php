<?php

$module = R::get('options')['module'];
file_put_contents(WEBROOT_PATH.'/site/init.php', <<<PHP
<?php

require NGN_ENV_PATH.'/thm-modules/$module/init.php';

PHP
);
