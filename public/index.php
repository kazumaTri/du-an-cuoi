<?php
/**
 * Main Entry Point
 * Điểm vào chính của ứng dụng
 */

// Start session
session_start();

// Load database helper
require_once __DIR__ . '/../app/helpers/Database.php';

// Load models
require_once __DIR__ . '/../app/models/user.php';
require_once __DIR__ . '/../app/models/danhmuc.php';

// Simple routing
$page = $_GET['page'] ?? 'home';

// Header
include __DIR__ . '/../app/views/header.php';

// Content based on page
switch ($page) {
    case 'home':
        include __DIR__ . '/../app/views/home.php';
        break;
    case 'html':
        include __DIR__ . '/../app/views/html.php';
        break;
    case 'css':
        include __DIR__ . '/../app/views/css.php';
        break;
    case 'login':
        include __DIR__ . '/../app/views/login.php';
        break;
    case 'register':
        include __DIR__ . '/../app/views/register.php';
        break;
    default:
        include __DIR__ . '/../app/views/home.php';
}

// Footer
include __DIR__ . '/../app/views/footer.php';
?>
