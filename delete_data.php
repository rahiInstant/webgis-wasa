<?php
include "init.php";

$request = htmlspecialchars($_POST['request'], ENT_QUOTES);

if ($request == "valves") {
    try {
        $valve_id = htmlspecialchars($_POST['id'], ENT_QUOTES);
        $stmt = $pdo->query("DELETE FROM valves WHERE valve_id = '{$valve_id}'");
        print_r("$stmt");
    } catch (PDOException $e) {
        echo "ERROR" . $e->getMessage();
    }
}
