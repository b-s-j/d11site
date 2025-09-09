<?php

// Show verbose error messages.
$config['system.logging']['error_level'] = 'verbose';

// Disable caches for dev.
$settings['cache']['bins']['render'] = 'cache.backend.memory';
$settings['cache']['bins']['page'] = 'cache.backend.memory';
$settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.memory';

// Disable CSS/JS aggregation.
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;


$settings['config_sync_directory'] = 'sites/default/files/sync';
