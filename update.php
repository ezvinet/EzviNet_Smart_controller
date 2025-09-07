<?php
header('Content-type: text/plain; charset=utf-8');

// Set the latest version number
$latest_version = '1.0.1'; 

// Set the URL for the new firmware binary
// Replace YOUR_USER and YOUR_REPO with your GitHub details
$bin_url = 'https://github.com/ezvinet/EzviNet_Smart_controller/releases/download/' . $latest_version . '/firmware.bin';

// Get the version string sent by the ESP8266
$current_version = $_GET['version'] ?? '0.0.0';

// Compare the current version to the latest version
if (version_compare($latest_version, $current_version) > 0) {
    // A newer version is available. Send a 302 Found response to redirect the ESP8266 to the new firmware.
    header('HTTP/1.1 302 Found');
    header('Location: ' . $bin_url);
} else {
    // No update needed. Send a 304 Not Modified response.
    header('HTTP/1.1 304 Not Modified');
    exit();
}
?>
