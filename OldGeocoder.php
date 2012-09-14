<?php

class OldGeocoder {

	const ENDPOINT_URL = 'http://maps.googleapis.com/maps/api/geocode/json?address=%s&sensor=false'; 

	function geocode($address) {
		$query = sprintf(self::ENDPOINT_URL, urlencode($address));
		$content = file_get_contents($query);
		$json = json_decode($content);

		if (!isset($json) || 'OK' !== $json->status) {
			return;
		}

		if (!isset($json->results) || !count($json->results)) {
			return;
		}

		$result = $json->results[0];
		$coordinates = $result->geometry->location;

		return new OldGeocodeResult($coordinates->lat, $coordinates->lng);
	}
}

class OldGeocodeResult {

	function __construct($lat, $lng) {
		$this->lat = $lat;
		$this->lng = $lng;
	}

	function getCoordinates() {
		return array($this->lat, $this->lng);
	}
}

?>
