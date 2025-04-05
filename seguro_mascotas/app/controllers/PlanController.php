<?php
require_once '../models/Database.php';
require_once '../models/Plan.php';

class PlanController extends Database {
    public function getAllPlanes() {
        $plans = new Plan();
        return $plans->getAll();
    }
}
?>