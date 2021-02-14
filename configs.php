<?php
date_default_timezone_set('Europe/Kiev');

define('INSTANCE_NAME', 'W4M Dev');
define('DISCORD_MAILER_WEBHOOK_URL', 'https://discordapp.com/api/webhooks/526424784263970825/9IH-q3ka-xqQF3KM3kZWd-CT8K-KabrDH2z-ih6QH4Nkp6i116Akrwxejzj5Y1wDf1CM');
define('DISCORD_REQUEST_WEBHOOK_URL', 'https://discordapp.com/api/webhooks/537948909432209439/BxSerjCryVdEmBGQXVNFyLPSQplv2QjxW1mIo1Wki89Npz3_i0FVzlwGgf4Q5rW0nigP');
define('SLACK_ERROR_HOOK', 'https://hooks.slack.com/services/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');
define('SLACK_ERROR_CHANNEL', '#w4m-reports');
define('ENABLE_REQUEST_LOGGING', true);
define('ALL_REQUESTS_LOG', false);
define('ENABLE_NATIVE_LOGGING', true);
define('SESSION_NAME', 'AFSAMPLESID');

define('DEV_URL', 'lost-found.96.lt');
define('CI_URL', 'dev-ci.work-for.me');
define('PROD_URL', 'work-for.me');

/**
 * true - system will include all entities and load them (will increase request time and resources usage)
 * false - automatic entities preload will be disabled, but then it is necessary to include entity manually by action::entity() method
 */
define('AUTOMATIC_ENTITIES_PRELOAD', true);

/** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/
/** Backend  */
define('BACKEND_PATH', 'backend');

/** Subfolders of BACKEND_PATH folder */
define('ACTION_API_PATH', 'action-api');
define('BOOTSTRAP_PATH', 'bootstrap');
define('CRON_SERVICES_PATH', 'cron-services');
define('DAO_PATH', 'dao');
define('ENTITIES_PATH', 'entities');
define('I18N_PATH', 'i18n');
define('I18N_TEMPLATES', I18N_PATH . FOLDER_DELIMITER . 'templates');
define('I18N_CUSTOM', I18N_PATH . FOLDER_DELIMITER . 'custom');
define('I18N_PAGES', I18N_PATH . FOLDER_DELIMITER . 'pages');
define('I18N_VALIDATION', I18N_PATH . FOLDER_DELIMITER . 'validation');
define('ROUTER_PATH', 'router');
define('SERVICES_PATH', 'services');
define('VALIDATORS_PATH', 'validators');
/** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/

/** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/
/** Frontend */
define('FRONTEND_PATH', 'frontend');

/** Subfolders of FRONTEND_PATH folder */
define('ASSETS_PATH', 'assets');
define('EMAIL_TEMPLATES_PATH', 'emails');
define('EJS_TEMPLATES_PATH', 'templates');
define('VIEWS_PATH', 'views');
define('VIEWS_INCLUDES', VIEWS_PATH . FOLDER_DELIMITER . 'includes');
define('VIEWS_META', VIEWS_PATH . FOLDER_DELIMITER . 'meta');
define('VIEWS_PAGES', VIEWS_PATH . FOLDER_DELIMITER . 'pages');
/** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/

/** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/
/** Cron jobs path */
define('CRON_PATH', 'cron');
/** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/
/** Relation-less functionality includes path */
define('INCLUDES_PATH', 'includes');
/** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/
/** Additional modules path */
define('MODULES_PATH', 'modules');
/** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/

