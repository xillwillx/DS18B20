<?php
$THERMOMETER_COUNT = "/sys/bus/w1/devices/w1_bus_master1/w1_master_slave_count";
$thermo = fopen($THERMOMETER_COUNT, "r");
$thermometer_cnt = fread($thermo, filesize($THERMOMETER_COUNT));
fclose($thermo);
print "Found: $thermometer_cnt thermometer<P>";

$THERMOMETERS = "/sys/bus/w1/devices/w1_bus_master1/w1_master_slaves";
$thermo = fopen($THERMOMETERS, "r");
$thermometername = fread($thermo, filesize($THERMOMETERS));
$thermometername = trim($thermometername);  ///trim the white space after the name
fclose($thermo);
print "Name: $thermometername<P>";

$THERMOMETER_SENSOR_PATH = "/sys/bus/w1/devices/".$thermometername."/w1_slave";
$thermometer = fopen($THERMOMETER_SENSOR_PATH, "r");
$thermometerReadings = fread($thermometer, filesize($THERMOMETER_SENSOR_PATH));
fclose($thermometer);
// We're only interested in the 2nd line, and the value after the t= on the 2nd line
preg_match("/t=(.+)/", preg_split("/\n/", $thermometerReadings)[1], $matches);
$celsius = round($matches[1] / 1000);
$fahrenheit = round($celsius*9/5+32);
// Output the temperature
print "The current temp is: $celsius &deg;C / $fahrenheit &deg;F";
?>
