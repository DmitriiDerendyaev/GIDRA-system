from flask import Flask, render_template, request
import pymysql

app = Flask(__name__)


@app.route('/', methods=['post', 'get'])
def login():
    message = ''
    # если отправили данные
    if request.method == 'POST':
        # переменные для подключения
        host = request.form.get('host')  # запрос к данным формы
        database = request.form.get('database')
        user = request.form.get('user')
        password = request.form.get('password')
        # проверка на наличие всех переменных
        if host and database and user and password:
            # попытка подключиться
            try:
                connection = pymysql.connect(host=host, user=user, passwd=password, database=database)
                # успех
                if connection:
                    return render_template('success.html', message=message)
            # ошибка
            except:
                return render_template('fail.html', message=message)

    # страница с формой
    return render_template('data.html', message=message)


if __name__ == "__main__":
    app.run()
