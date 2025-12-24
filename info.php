<?php
if (function_exists('curl_version')) {
    echo "cURL está activado. Versión: " . curl_version()['version'];
} else {
    echo "cURL NO está activado.";
}
?>