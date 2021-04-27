from flask import Flask, render_template, request
import pymysql

app = Flask(__name__)


@app.route('/', methods=['post', 'get'])
def login():
    message = ''
    if request.method == 'POST':
        host = request.form.get('host')  # запрос к данным формы
        database = request.form.get('database')
        user = request.form.get('user')
        password = request.form.get('password')
        print(host, database, user, password)
        if host and database and user and password:
            try:
                connection = pymysql.connect(host=host, user=user, passwd=password, database=database)
                if connection:
                    print("ok")
                    return render_template('success.html', message=message)
            except:
                return render_template('fail.html', message=message)

    return render_template('data.html', message=message)


if __name__ == "__main__":
    app.run()
