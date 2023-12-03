#include <DHT.h>
#include <WiFi.h>
#include <WiFiClient.h>

#define DHTPIN 4
#define DHTTYPE DHT21

DHT dht(DHTPIN, DHTTYPE);

const char* ssid = "OM-IT";
const char* password = "satepadang";
const char* host = "192.168.20.56";
const int httpPort = 80;

// ID perangkat
const int deviceId = 1;

void setup() {
  Serial.begin(19200);
  delay(1000);
  dht.begin();
  WiFi.begin(ssid, password);
  Serial.println("Connecting to WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");
}

void loop() {
  float humidity = dht.readHumidity();
  float temperature = dht.readTemperature();
  if (isnan(humidity) || isnan(temperature)) {
    Serial.println("Failed to read from DHT sensor");
    return;
  }
  Serial.print("humidity: ");
  Serial.print(humidity);
  Serial.print(" %\t");
  Serial.print("temperature: ");
  Serial.print(temperature);
  Serial.println(" *C");
  WiFiClient client;
  if (!client.connect(host, httpPort)) {
    Serial.println("Connection failed");
    return;
  }
  // Menggabungkan URL dengan ID perangkat
  String url = "/suhu/update1.php?id=";
  url += "&deviceId=";
  url += String(deviceId);
  url += "&temperature=";
  url += String(temperature);
  url += "&humidity=";
  url += String(humidity);
  Serial.print("Requesting URL: ");
  Serial.println(url);
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n");
  delay(60000);
}
