<?php
require_once __DIR__ . '/../../config/Database.php';  // Desde controllers/
require_once __DIR__ . '/../models/Plan.php';        // Desde controllers/

class PlanController extends Database {
    public function getAllPlanes() {
        $plans = new Plan();
        return $plans->getAll();
    }
}
?>