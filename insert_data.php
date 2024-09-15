<?php
include "/init.php";

$request = htmlspecialchars($_POST['request'], ENT_QUOTES);


if ($request == 'valves') {
    try {
        $valve_id_new = htmlspecialchars($_POST['valve_id_new'], ENT_QUOTES);
        $valve_type = htmlspecialchars($_POST['valve_type'], ENT_QUOTES);
        $valve_dma_id = htmlspecialchars($_POST['valve_dma_id'], ENT_QUOTES);
        $valve_diameter = htmlspecialchars($_POST['valve_diameter'], ENT_QUOTES);
        $valve_visibility = htmlspecialchars($_POST['valve_visibility'], ENT_QUOTES);
        $valve_location = htmlspecialchars($_POST['valve_location'], ENT_QUOTES);
        $valve_geometry = $_POST['valve_geometry'];

        $isExist = $pdo->query("select * from valves where valve_id = '$valve_id_new'");
        if ($isExist -> rowCount()>0) {
            echo "Error: valve ID already exist. please choose a new ID.";
        } else {
            $sql = $pdo->query("insert into valves (valve_id, valve_type, valve_dma_id, valve_diameter, 
            valve_visibility, valve_location, geom) values ('$valve_id_new', '$valve_type',
            '$valve_dma_id', '$valve_diameter', '$valve_visibility', '$valve_location', 
            st_setsrid(st_geomfromgeojson('$valve_geometry'), 4326))");

            print_r($sql);
        }
    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
    }
}
