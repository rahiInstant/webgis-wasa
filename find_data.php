<?php
include 'init.php';

$table = htmlspecialchars($_POST['table'], ENT_QUOTES);
$field = htmlspecialchars($_POST['field'], ENT_QUOTES);
$value = htmlspecialchars($_POST['value'], ENT_QUOTES);

try {
    
    $result = $pdo->query("select *, st_asgeojson(geom) as geojson from {$table} where {$field} = '{$value}'");
    $features = [];
    foreach ($result as $row) {
        unset($row['geom']);
        $geometry = json_decode($row['geojson']);
        unset($row['geojson']);
        $feature = ["type" => "Feature", "geometry" => $geometry, "properties" => $row];
        array_push($features, $feature);
    }
    $featureCollection = ["type" => "FeatureCollection", 'features' => $features];
    echo (json_encode($featureCollection));
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
