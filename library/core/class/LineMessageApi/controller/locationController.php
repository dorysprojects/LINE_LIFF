<?php

$kGeohash = new kGeohash();
$origins = array(
    'address' => $line->events['message']['address'],
    'latitude' => $line->events['message']['latitude'],
    'longitude' => $line->events['message']['longitude']
);
//當前 geohash值
$Now_geohash = $kGeohash->encode($origins['latitude'], $origins['longitude']);
/* 
 * Geohash length   Cell width      Cell height
 * 1                ≤ 5,000km	×   5,000km
 * 2                ≤ 1,250km	×   625km
 * 3                ≤ 156km	×   156km
 ** 4               ≤ 39.1km	×   19.5km
 * 5                ≤ 4.89km	×   4.89km
 * 6                ≤ 1.22km	×   0.61km
 * 7                ≤ 153m	×   153m
 * 8                ≤ 38.2m	×   19.1m
 * 9                ≤ 4.77m	×   4.77m
 * 10               ≤ 1.19m	×   0.596m
 * 11               ≤ 149mm     ×   149mm
 * 12               ≤ 37.2mm	×   18.6mm
 */
//附近 
$Near_geohash = substr($Now_geohash, 0, 4);

$SQL_Location = new kSQL('Location');
$GetLocation = $SQL_Location->SetAction('select')
                            ->SetWhere("propertyA='". $origins['address'] ."'")//address
                            ->SetLimit(1)
                            ->BuildQuery();

if(!$GetLocation[0]){
    $SQL_Location->SetAction('insert')
                ->SetValue('prev', 'line')//from
                ->SetValue('propertyA', $origins['address'])//address
                ->SetValue('propertyB', $origins['latitude'])//latitude
                ->SetValue('propertyC', $origins['longitude'])//longitude
                ->SetValue('propertyD', $Now_geohash)//geohash值
                ->BuildQuery();
}

//$line->text($Near_geohash)->reply();

?>