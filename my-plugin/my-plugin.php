<?php 

/**
Plugin Name: My plugin
*/
add_action( 'init', 'get_weather' );   
function get_weather() {
    // Выдача из транзитного кэша
    $cached = get_transient( 'weather' );
    if ( $cached !== false )
        return $cached;
	
	$url = 'http://api.openweathermap.org/data/2.5/weather?q=London,uk&units=metric&APPID=';
	$key = '39db73d9586cd5df3cc7d0da37d1098c';
	$response = wp_remote_get( $url.$key );
	$response_code = wp_remote_retrieve_response_code( $response );
	if( $response_code == 200 ) {
		$json = wp_remote_retrieve_body( $response );
		$data = json_decode( $json, true );
		var_dump( $data );
	}
	
    // Запись в транзитный кэш на 1 час
    set_transient( 'weather', $data, 1 * HOUR_IN_SECONDS );

    return $data["main"]["temp_max"];
}
//$data_wether=get_weather(); 
//var_dump($data_wether);
//echo $data_wether["main"]["temp_max"];
add_shortcode( 'weather', 'weather_shortcode' );
function weather_shortcode( $data ) {
	$data_weather=get_weather();
//var_dump($data);
/*
	$atts = shortcode_atts( [
		'name' => 'Noname',
		'age'  => 18,
	], $atts );
*/
	return "Темтература в Лондоне : ".$data_weather['main']['temp'];
}
                                  
 ?>
