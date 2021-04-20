from flask import Flask
import json
app = Flask(__name__)



@app.route("/")
def hello():
    string = ''
    with open('data.json', 'w') as f:
        templates = json.load(f)

        for i in templates.items():
            print(i)
    return f"""
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Таблица</title>
</head>
<body>
    <table border="1">
        <tr>
            <th rowspan="2">Фамилия</th>
            <th rowspan="2">Имя</th>
            <th rowspan="2">Отчество</th>
            <th colspan="4">месяц</th>
        </tr>
        <tr>
            <td>01</td>
            <td>Тема</td>
            <td>02</td>
            <td>Тема</td>
        </tr>
        {string}
    </table>
</body>
</html>"""

if __name__ == "__main__":
    app.run()