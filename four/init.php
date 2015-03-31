<?php

Ngn::addBasePath(__DIR__, 3);

require __DIR__.'/lib/ThmFourModule.class.php';
O::replaceInjection('RouterManager', 'ThmFourRouterManager');
