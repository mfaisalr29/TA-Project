#define touch1 D3

void setup() {
  //Set the relay pins as output pins
  Serial.begin(9600);
  pinMode(touch1, INPUT_PULLUP);
  pinMode(LED_BUILTIN, OUTPUT);
}

void loop() {
  // Mengirim beberapa baris data

  int data = digitalRead(touch1);
  Serial.print("Sensor1: ");
  Serial.println(data);

  if (data == 1){
    digitalWrite(LED_BUILTIN, LOW);
  }
  else{
    digitalWrite(LED_BUILTIN, HIGH);
  }

  delay(1000); // Tunggu selama 5 detik sebelum mengirim lagi
}