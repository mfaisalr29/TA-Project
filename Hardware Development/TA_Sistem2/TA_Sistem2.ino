#include <ArduinoJson.h>

#define radar1 D6
#define radar2 D7
#define radar3 D0
#define relay1 D2
#define relay2 D1
#define relay3 D5

int currentRelay1State = HIGH;
int currentRelay2State = HIGH;
int currentRelay3State = HIGH;

void setup() {
  Serial.begin(9600);
  pinMode(radar1, INPUT_PULLUP);
  pinMode(radar2, INPUT_PULLUP);
  pinMode(radar3, INPUT_PULLUP);
  pinMode(relay1, OUTPUT);
  pinMode(relay2, OUTPUT);
  pinMode(relay3, OUTPUT);
  digitalWrite(relay1, HIGH);
  digitalWrite(relay2, HIGH);
  digitalWrite(relay3, HIGH);
}

void loop() {
  int currentRadar1 = digitalRead(radar1);
  int currentRadar2 = digitalRead(radar2);
  int currentRadar3 = digitalRead(radar3);

  if (currentRadar1 == LOW) {
    currentRelay1State = LOW;
  } else {
    currentRelay1State = HIGH;
  }

  if (currentRadar2 == LOW) {
    currentRelay2State = LOW;
  } else {
    currentRelay2State = HIGH;
  }

  if (currentRadar3 == LOW) {
    currentRelay3State = LOW;
  } else {
    currentRelay3State = HIGH;
  }

  StaticJsonDocument<200> doc;
  doc["relay1State"] = currentRelay1State;
  doc["relay2State"] = currentRelay2State;
  doc["relay3State"] = currentRelay3State;
  doc["radar1"] = currentRadar1;
  doc["radar2"] = currentRadar2;
  doc["radar3"] = currentRadar3;

  String data;
  serializeJson(doc, data);

  Serial.println(data);
  delay(2000);  // Delay 2 seconds between sends
}
