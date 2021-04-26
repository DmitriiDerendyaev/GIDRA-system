#include <SoftwareSerial.h>
SoftwareSerial ESPport(8, 9);
#define BUFFER_SIZE 128
char buffer[BUFFER_SIZE];
String example;

void setup()
{

Serial.begin(9600); 
ESPport.begin(9600);
clearSerialBuffer();
Serial.println("RESET 3,5 sek");
Serial.println(GetResponse("AT+RST",3400));
Serial.println(GetResponse("AT+CWMODE=1",300));
connectWiFi("Redmi Note 6 Pr","zadolbal");
Serial.println(GetResponse("AT+CIPMODE=0",300));
Serial.println(GetResponse("AT+CIPMUX=0",300));
Serial.print("Connect TCP-server: ");
connectServer("TCP","ip","port");
Serial.println(GetResponse("AT+CIPSTO=2", 300));

}

void loop()
{
int ch_id, packet_len;
char *pb;
example = "hello world";
ESPport.readBytesUntil('\n', buffer, BUFFER_SIZE);

if(strncmp(buffer, "+IPD,", 5)==0)
{ 
sscanf(buffer+5, "%d,%d", &ch_id, &packet_len);
if (packet_len > 0)
{
pb = buffer+5;
while(*pb!=':') pb++;
pb++;
if(strncmp(pb, "GET / ", 6) == 0)
{
Serial.println(buffer);
Serial.print("get led from ch :");
Serial.println(ch_id);
delay(100);
clearSerialBuffer();

otvet_klienty(ch_id);
}
}
}
clearBuffer();
}

void otvet_klienty(int ch_id)
{

String Header;

Header = "HTTP/1.1 200 OK\r\n";
Header += "Content-Type: text/html\r\n";
Header += "Connection: close\r\n";


String Content;

Content = "probnick is:" + example;

Header += "Content-Length: ";
Header += (int)(Content.length());
Header += "\r\n\r\n";

ESPport.print("AT+CIPSEND="); 
ESPport.print(ch_id);
ESPport.print(",");
ESPport.println(Header.length()+Content.length());
delay(20);

if(ESPport.find(">"))
{
ESPport.print(Header);
ESPport.print(Content);
delay(110);
}
}

String GetResponse(String AT_Command, int wait)
{
String tmpData;

ESPport.println(AT_Command);
delay(wait);
while (ESPport.available() >0 )
{
char c = ESPport.read();
tmpData += c;

if ( tmpData.indexOf(AT_Command) > -1 )
tmpData = "";
else
tmpData.trim();

}
return tmpData;
}

void clearSerialBuffer(void)
{
while ( ESPport.available() > 0 )
{
ESPport.read();
}
}

void clearBuffer(void) {
       for (int i =0;i<BUFFER_SIZE;i++ ) 
       {
         buffer[i]=0;
       }
}
       
boolean connectWiFi(String NetworkSSID,String NetworkPASS) 
{
  String cmd = "AT+CWJAP=\"";
  cmd += NetworkSSID;
  cmd += "\",\"";
  cmd += NetworkPASS;
  cmd += "\"";
  Serial.println(cmd); 
  Serial.println(GetResponse(cmd,6500));
}
boolean connectServer (String Type, String ip, String port) {
  String cmd = "AT+START=\"";
  cmd += Type;
  cmd += "\",\"";
  cmd += ip;
  cmd += "\",\"";
  cmd += port;
  cmd += "\"";
  
  Serial.println(cmd); 
  Serial.println(GetResponse(cmd,6500));
}
