<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "e-commercedb";

function getProducts() {
    global $host;
    global $user;
    global $password;
    global $db;
    $parkingFlags = ['VP', 'SP'];
    $link = mysqli_connect($host, $user, $password, $db);

    $prodListQuery = mysqli_query($link, "SELECT * FROM product");
    $ret = array();
    for ($i = 0; $i < mysqli_num_rows($prodListQuery); $i++) {
        $result = mysqli_fetch_array($prodListQuery, MYSQLI_ASSOC);
        $prod = array();
        $prod['prodType'] = $result['product_type'];
        $prod['desc'] = $result['description'];
        $prod['totalQty'] = $result['total_qty'];
        $prod['price'] = $result['price'];
        $ret[] = $prod;
    }
    
    return $ret;
}

function getQtySold($city, $prodType) {
    global $host;
    global $user;
    global $password;
    global $db;
    $parkingFlags = ['VP', 'SP'];
    $link = mysqli_connect($host, $user, $password, $db);

    if(in_array($prodType, $parkingFlags)) {
        $qtySldQuery = mysqli_query($link, "SELECT SUM(quantity) AS qty_sold " .
                                           "FROM order_details " .
                                           "JOIN product ON order_details.product_id = product.id " .
                                           "WHERE product_type = \"" . $prodType . "\" " .
                                           "GROUP BY product_id");
    } else {
        $qtySldQuery = mysqli_query($link, "SELECT Count(boarding_pass_info.id) AS qty_sold " .
                                           "FROM order_details " .
                                           "JOIN product ON order_details.product_id = product.id " .
                                           "JOIN boarding_pass_info ON boarding_pass_info.order_details_id = order_details.id " .
                                           "WHERE product_type = \"" . $prodType . "\" AND arrival_city_id = " . $city . " " .
                                           "GROUP BY product_id");
    }
    $result = mysqli_fetch_array($qtySldQuery, MYSQLI_ASSOC);
    if($result) {
        return $result['qty_sold'];
    } else {
        return 0;
    }
}

function getCities() {
    global $host;
    global $user;
    global $password;
    global $db;
    $link = mysqli_connect($host, $user, $password, $db);

    $cityQuery = mysqli_query($link, "SELECT * FROM cities");
    $ret = array();
    for ($i = 0; $i < mysqli_num_rows($cityQuery); $i++) {
        $result = mysqli_fetch_array($cityQuery, MYSQLI_ASSOC);
        $city = array();
        $city['cityName'] = $result['city_name'];
        $city['state'] = $result['state'];
        $city['airportCode'] = $result['airport_code'];
        $ret[] = $city;
    }
    
    return $ret;
}

function getAvailableSeats($city_id) {
    global $host;
    global $user;
    global $password;
    global $db;
    $link = mysqli_connect($host, $user, $password, $db);
    
    $sqlQuery = "SELECT seat FROM boarding_pass_info where arrival_city_id = " . $city_id;
    $query = mysqli_query($link, $sqlQuery);
    
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $seats = array();
    foreach($result as $seat) {
        $seats[] = $seat['seat'];
    }
    $sqlQuery = "SELECT seat, seat_type FROM seats where seat NOT IN ('" . implode("', '", $seats) . "')";
    $availSeats = mysqli_query($link, $sqlQuery);
    $result = mysqli_fetch_all($availSeats, MYSQLI_ASSOC);
    $availSeats = array();
    foreach($result as $seat) {
        $newSeat['seat'] = $seat['seat'];
        $newSeat['seat_type'] = $seat['seat_type'];
        $availSeats[] = $newSeat;
    }
    
    return $availSeats;
}

function getNumSeatsAvail($city_id) {
    global $host;
    global $user;
    global $password;
    global $db;
    $link = mysqli_connect($host, $user, $password, $db);
    
    $sqlQuery = "SELECT seat FROM boarding_pass_info where arrival_city_id = " . $city_id;
    $query = mysqli_query($link, $sqlQuery);
    
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $seats = array();
    foreach($result as $seat) {
        $seats[] = $seat['seat'];
    }
    $sqlQuery = "SELECT seat_type, COUNT(seat_type) FROM seats where seat NOT IN ('" . implode("', '", $seats) . "') GROUP BY seat_type";
    $availSeats = mysqli_query($link, $sqlQuery);
    $result = mysqli_fetch_all($availSeats, MYSQLI_ASSOC);
    
    return $result;
}