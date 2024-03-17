#define BLYNK_TEMPLATE_ID "TMPL6y8DumDpX"
#define BLYNK_TEMPLATE_NAME "Lampu Kamar"
#define BLYNK_AUTH_TOKEN "euhP79t15iiElKDrUBeT8mZurOUaOUST"
#define BLYNK_PRINT Serial
#include <ESP8266WiFi.h>
#include <BlynkSimpleEsp8266.h>
#include <WiFiClientSecure.h>
#include <ArduinoJson.h>
BlynkTimer timer;
WidgetLED led_air(V2);

//Define the relay pins
#define touch1 D1
#define touch2 D3
char auth[] = BLYNK_AUTH_TOKEN;
char ssid[] = "FAISAL OVIE 2";//Enter your WIFI name
char pass[] = "1sampai0";//Enter your WIFI password

WiFiClientSecure client;

void setup() {
  //Set the relay pins as output pins
  Serial.begin(9600);
  //Initialize the Blynk library
  Blynk.begin(auth, ssid, pass, "blynk.cloud", 80);
}

void loop() {
  //Run the Blynk library
  Blynk.run();

    // Menunggu data dari Wemos 1
    if (Serial.available() > 0) {
        // Membaca data untuk Sensor1
        String sensor1Data = Serial.readStringUntil('\n');
        sensor1Data.trim(); // Hapus whitespace
        int sensor1Value = parseSensorData(sensor1Data);
      
        if (sensor1Value == 1){
          led_air.on();
        }
        else if (sensor1Value == 0){
          led_air.off();
        }
        
    }


  delay(1000);
}

// Fungsi untuk mem-parsing data dari masing-masing baris yang diterima
int parseSensorData(String data) {
  int index = data.indexOf(':');
  if (index != -1) {
    return data.substring(index + 1).toInt();
  }
  return -1; // Mengembalikan nilai default jika parsing gagal
}