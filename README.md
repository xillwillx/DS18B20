# DS18B20
Simple PHP Code to automatically read and display DS18B20 names and temps to a php page on a raspberry pi.

####Instructions:
You will need to setup the pi to add OneWire support
Start by adding the following line to /boot/config.txt
You can edit that file with nano by running ```sudo nano /boot/config.txt``` and then scroll to the bottom and type ```dtoverlay=w1-gpio```
 press ctrl+x and y to confirm, ```sudo nano vi /etc/modules``` add 

w1-gpio

w1-therm 

press ctrl+x and y to confirm , then reboot your pi. Add temp.php to /var/www/ then visit http://127.0.0.1/temp.php

Page output should look similar to this:
```
Found: 1 thermometer
Name: 28-02146409b9ff
The current temp is: 21 °C / 70 °F
```
####TO-DO: 
 get all the names into an array and cycle through them to output onto page
