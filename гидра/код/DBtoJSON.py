import pymysql

db = pymysql.connect(host='37.140.192.206',user='u0731055_gidra', passwd='8T4d3K0t')
cursor = db.cursor()
query = ("SHOW DATABASES")
cursor.execute(query)
for r in cursor:
    print(r)