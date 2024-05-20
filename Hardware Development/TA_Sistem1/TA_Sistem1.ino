#include <ESP8266Firebase.h>
#include <ESP8266WiFi.h>
#include <WiFiClientSecure.h>
#include <ArduinoJson.h>

// Define the relay pins
#define radar_s1 D1
#define led_radar_s1 D5
#define led_pompa_s2 D7
#define _SSID "FAISAL OVIE 2"          // Your WiFi SSID
#define _PASSWORD "1sampai0"           // Your WiFi Password
#define REFERENCE_URL "https://bcv1-f450b-default-rtdb.asia-southeast1.firebasedatabase.app/"  // Your Firebase project reference url

WiFiClientSecure client;
Firebase firebase(REFERENCE_URL);

String inputString = "";  // A string to hold incoming data
bool stringComplete = false;  // Whether the string is complete

void setup() {
  pinMode(radar_s1, INPUT_PULLUP);
  pinMode(led_radar_s1, OUTPUT);
  pinMode(led_pompa_s2, OUTPUT);
  pinMode(LED_BUILTIN, OUTPUT);
  Serial.begin(9600);
  inputString.reserve(200);

  WiFi.mode(WIFI_STA);
  WiFi.disconnect();
  delay(1000);

  WiFi.begin(_SSID, _PASSWORD);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    digitalWrite(LED_BUILTIN, HIGH);
    delay(500);
    digitalWrite(LED_BUILTIN, LOW);
  }
  if (WiFi.status() == WL_CONNECTED) {
    digitalWrite(LED_BUILTIN, LOW);
  }
}

void loop() {
  int i = 0;
  while (WiFi.status() != WL_CONNECTED && i < 5) {
    digitalWrite(LED_BUILTIN, HIGH);
    reconnectWiFi();
    delay(1000);
    i += 1;
  }

  if (stringComplete) {
    Serial.print("Received data: ");
    Serial.println(inputString);

    StaticJsonDocument<200> doc;
    DeserializationError error = deserializeJson(doc, inputString);

    if (!error) {
      int relay1State = doc["relay1State"];
      int relay2State = doc["relay2State"];
      int relay3State = doc["relay3State"];
      int radar1 = doc["radar1"];
      int radar2 = doc["radar2"];
      int radar3 = doc["radar3"];

      firebase.setInt("ControlSystem/Reservoir2/Relay1", relay1State);
      firebase.setInt("ControlSystem/Reservoir2/Relay2", relay2State);
      firebase.setInt("ControlSystem/Reservoir2/Relay3", relay3State);
      firebase.setInt("ControlSystem/Reservoir2/RadarBorBesar1", radar1);
      firebase.setInt("ControlSystem/Reservoir2/RadarBorKecil2", radar2);
      firebase.setInt("ControlSystem/Reservoir2/RadarPompa3", radar3);
    } else {
      Serial.println("Failed to parse JSON");
    }

    inputString = "";
    stringComplete = false;
  }
}

void serialEvent() {
  while (Serial.available()) {
    char inChar = (char)Serial.read();
    if (inChar == '\n') {
      stringComplete = true;
    } else {
      inputString += inChar;
    }
  }
}

void reconnectWiFi() {
  WiFi.begin(_SSID, _PASSWORD);
  delay(500);
  digitalWrite(LED_BUILTIN, HIGH);
  delay(500);
  digitalWrite(LED_BUILTIN, LOW);
  if (WiFi.status() == WL_CONNECTED) {
    digitalWrite(LED_BUILTIN, LOW);
  }
}
