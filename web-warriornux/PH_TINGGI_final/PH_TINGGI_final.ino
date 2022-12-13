#include <ESP8266WiFi.h>
//#include <WiFi.h>
#include <Wire.h>

#define trigPin D8
#define echoPin D7
int sensorValue = 0;        
int outputValue = 0;    
int jarak = 100;
int tinggi  ;

//Konfigurasi WiFi rubah
const char *ssid = "Anonymous";
const char *password = "keparat69";

//IP Address Server yang terpasang XAMPP rubah
//const char *host = "siakadkh.co";
const char *host = "192.168.1.11";

int datasensor;
int nilai;
int datasensor1;
int nilai1;

void setup() {
  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);
  Serial.begin(9600);
    Serial.println("SISTEM AKTIF");

  WiFi.hostname("node 2");
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  
  //Jika koneksi berhasil, maka akan muncul address di serial monitor
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
}
void loop() {
  long duration, gape;
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
 
  duration = pulseIn(echoPin, HIGH);
  gape = (duration / 2) / 29.1; ;
  tinggi = jarak - gape;
  outputValue = (-0.0139*sensorValue)+7.7851;
    Serial.print("Tinggi : ");
    Serial.print(tinggi);
    Serial.print(" ");
    Serial.println("CM");
    Serial.print("pH = ");
    Serial.println(outputValue);
    
    Serial.print("  niai ");
    datasensor1 = tinggi;
    datasensor = outputValue;
    Serial.println(datasensor1);
    Serial.print(datasensor);

kirim_value();
delay(500);
kirim_tinggi();
    
    delay(1000);
}
void kirim_value() {

  int value = 0;
  // Proses Pengiriman -----------------------------------------------------------
  //delay(500);
  ++value;

  // Membaca Sensor Analog -------------------------------------------------------
  Serial.println(datasensor1);
  Serial.print("connecting to ");
  Serial.println(host);

  // Mengirimkan ke alamat host dengan port 80 -----------------------------------
  WiFiClient client;
  const int httpPort = 80;

  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }
  //indikator konek ke web

  //tambahan
  if (datasensor1 != nilai1) {
    nilai1 = datasensor1;

    // (dibawah ini sensor tinggi )Isi Konten yang dikirim adalah alamat ip si esp ------------RUBAH SESUAI NAMA FOLDER/NAMA KKONEKSI PHP?NAMA TABEL--------tinggi---------

    String url = "/iot/web-warriornux/write-data.php?data=";
    url += nilai1;

    Serial.print("Requesting URL: ");
    Serial.println(url);

    // Mengirimkan Request ke Server -----------------------------------------------
    client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                 "Host: " + host + "\r\n" +
                 "Connection: close\r\n\r\n");
    unsigned long timeout = millis();
    while (client.available() == 0) {
      if (millis() - timeout > 1000) {
        Serial.println(">>> Client Timeout !");
        client.stop();
        return;
      }
    }

    // Read all the lines of the reply from server and print them to Serial
    while (client.available()) {
      String line = client.readStringUntil('\r');
      Serial.print(line);
    }
    delay (800);
    Serial.println("closing connection");
  }
}
void kirim_tinggi() {
  int value = 0;
  // Proses Pengiriman -----------------------------------------------------------
  //delay(500);
  ++value;

  // Membaca Sensor Analog -------------------------------------------------------
  Serial.println(datasensor);
  Serial.print("connecting to ");
  Serial.println(host);

  // Mengirimkan ke alamat host dengan port 80 -----------------------------------
  WiFiClient client;
  const int httpPort = 80;

  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }
  //indikator konek ke web

  //tambahan
  if (datasensor != nilai) {
    nilai = datasensor;

    // (ph)Isi Konten yang dikirim adalah alamat ip si esp -----------RUBAH SESUAI NAMA FOLDER/NAMA KKONEKSI PHP?NAMA TABEL----------outputValue--------

    String url = "/iot/web-warriornux/write-data2.php?data=";
    url += nilai;

    Serial.print("Requesting URL: ");
    Serial.println(url);

    // Mengirimkan Request ke Server -----------------------------------------------
    client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                 "Host: " + host + "\r\n" +
                 "Connection: close\r\n\r\n");
    unsigned long timeout = millis();
    while (client.available() == 0) {
      if (millis() - timeout > 1000) {
        Serial.println(">>> Client Timeout !");
        client.stop();
        return;
      }
    }

    // Read all the lines of the reply from server and print them to Serial
    while (client.available()) {
      String line = client.readStringUntil('\r');
      Serial.print(line);
    }
    delay (800);
    Serial.println("closing connection");
  }
}
