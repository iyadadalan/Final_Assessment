<?php

function sanitize_input($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function generate_csrf_token() {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    $_SESSION['csrf_token_time'] = time();  // Store current time
    return $_SESSION['csrf_token'];
}

function verify_csrf_token($token) {
    $max_time = 3600;  // Token is valid for 1 hour
    if (isset($_SESSION['csrf_token'], $_SESSION['csrf_token_time']) &&
        time() <= $_SESSION['csrf_token_time'] + $max_time &&
        hash_equals($_SESSION['csrf_token'], $token)) {
        
        unset($_SESSION['csrf_token'], $_SESSION['csrf_token_time']); // Invalidate the token
        return true;
    }
    return false;
}
?>
