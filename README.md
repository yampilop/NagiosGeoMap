# NagiosGeoMap
Geographic Map functionality for Nagios Core

## Compatibility

This project is compatible with **Nagios Core** version **_4.0.7_** and forward, due to
the availability of JSON CGIs.


## Installation

For installing just follow these steps:

1. Copy **geomap** folder into _/usr/local/nagios/share/_ directory.
2. Edit _/usr/local/nagios/share/side.php_ file and add the following text inside some "`<ul>`" tag (you can decide where you place it, but it's recommended to be below "Map (Legacy)" item):
```
    <li>
        <a href="geomap/index.html" target="<?php echo $link_target;?>">GeoMap</a>
    </li>
```

## Usage

In order for a host to be shown in GeoMap, you need to include **_\_lat_** (latitude) and **_\_long_** (longitude) parameters in the host definition on configuration files. Example:
```
define host{
        use                     lte-enb
        alias                   LTE eNB TEST
        host_name               lte-enb-test
        address                 172.16.0.1
        parents                 core
        _lat                    -32.456789
        _long                   -68.235489
}
```

## Screenshot

![Screenshot](https://raw.githubusercontent.com/yampilop/NagiosGeoMap/master/screenshot.jpg)

## Copyright

### OpenLayers

>Copyright 2005-2013 OpenLayers Contributors. All rights reserved.

>[http://openlayers.org/two/](http://openlayers.org/two/)

### OpenStreetMaps

>Copyright OpenStreetMap contributors

>[http://www.openstreetmap.org/](http://www.openstreetmap.org/)

### jQuery

>Copyright jQuery Foundation and other contributors

>[https://jquery.org/](https://jquery.org/)
