<?php
$predios = App\Models\Predio::select('id', 'numero', 'codigo', 'propietari', DB::raw("ST_AsGeoJSON(ST_Transform(geom,4326)) as geojson"))->get();
$jsonFeatures = [];
foreach ($predios as $predio) {
    $feature = [
        "type" => "Feature",
        "geometry" => json_decode($predio->geojson),
        "properties" => [
            "id" => $predio->id,
            "numero" => $predio->numero,
            "codigo" => $predio->codigo,
            "propietari" => $predio->propietari
        ]
    ];
    $jsonFeatures[] = $feature;
}
$featureCollection = [
    "type" => "FeatureCollection",
    "features" => $jsonFeatures
];
echo json_encode($featureCollection);
?>
