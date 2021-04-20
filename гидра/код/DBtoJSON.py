import pymysql
import json

# подключение к БД
connection = pymysql.connect(host="localhost",user="root",passwd="",database="gydra" )
cursor = connection.cursor()
# запрос
cursor.execute("SELECT * FROM `user-name`")
rows = cursor.fetchall()
# формирование ответа
response = {}
for row in rows:
   response[row[0]] = [row[1], row[2], row[3]]

# response = []
# for row in rows:
#    response.append([row[1], row[2], row[3]])

with open('data.json', 'w') as f:
    json.dump(response, f)

connection.close()