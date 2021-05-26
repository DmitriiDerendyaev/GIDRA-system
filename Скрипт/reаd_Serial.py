import serial
import sys

ser = serial.Serial(
    port='COM9',
    baudrate=9600,
    parity=serial.PARITY_NONE,
    stopbits=serial.STOPBITS_ONE,
    bytesize=serial.EIGHTBITS,
        timeout=1)

print("connected to: " + ser.portstr)

while True:
    response = ser.readline()
    if response:
        print(response)
        if b"ID Value" in response:
            output = response.decode("utf-8")
            code = output[10: -2]
            print(code)
            f = open('cods_from_arduino.txt', 'w')
            f.write(code)
            f.close()
            print("success")