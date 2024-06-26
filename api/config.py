
import mysql.connector


def connectDB():
    return mysql.connector.connect(
        host="127.0.0.1",
        user="root",
        password="",
        database="inventory_website",
        port=3306
    )