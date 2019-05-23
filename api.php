<?php
/* 
 * This php file checks:
 *      - the header content type
 *      - the header version
 *      - the header authentication
 * 
 * For access to the api. It generates the http errors 400, 405.
 * 
 * Will be programmed later.
 */

// application data secured with constants
define("JSON_CONTENT_TYPE","application/json");
define("V1_VERSION","v1");

define("HTTP_BAD_REQUEST", 400);
define("HTTP_NOT_ALLOWED", 405);

include_once './controllers/start.php';
