<?php
require_once 'vendor/autoload.php';

use App\Core\Database;
use App\Entities\{Developer, Manager, FeatureTask, BugTask};

echo "=== TASKFLOW PART 1: ARCHITECTURE VALIDATION ===\n\n";

// Test 1: Singleton Database
echo "1. Testing Singleton Database:\n";
try {
    $db1 = Database::getInstance();
    $db2 = Database::getInstance();
    
    if ($db1 === $db2) {
        echo "   PASS: Singleton works correctly (same instance)\n";
       } else {
        echo "FAIL: Singleton pattern broken (different instances)\n";
    }
} catch (Exception $e) {
    echo " FAIL: " . $e->getMessage() . "\n";
}
