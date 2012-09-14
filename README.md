This is a very quick hack of William Durand's great [GeocodableBehavior](https://github.com/willdurand/GeocodableBehavior) to support PHP 5.2.

It only includes a quick implementation for Google's Geocoding API.

Installation
------------

Cherry-pick the `GeocodableBehavior.php` file is `src/`, put it somewhere,
then add the following line to your `propel.ini` or `build.properties`
configuration file:

``` ini
propel.behavior.geocodable.class = path.to.GeocodableBehavior
```

Add the behavior in your schema, and set the geocoder_provider to "old"

Add OldGeocoder.php to the runtime path.
