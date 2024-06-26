import mysql.connector
def db():
    host = "localhost"
    username = "root"
    password = ""
    db_name = "mind games"

    con = mysql.connector.connect(
        host=host,
        user=username,
        password=password,
        database=db_name
    )
