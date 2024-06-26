from flask import Blueprint, Flask, render_template, jsonify,request
from dbconfig import db_connect_cmd
from flask_cors import CORS
import os

contact_us_bp = Blueprint('contact_us', __name__)


@contact_us_bp.route('/list', methods=['GET'])
@db_connect_cmd
def get_contact_us(mainCursor):
    mainCursor.execute('SELECT * FROM inventory_website.contact_us WHERE is_trash=0', ())
    contact_us = mainCursor.fetchall()
    response = []
    for x in contact_us:
        response.append({
            "id": x[0],
            "Name": x[1],
            "Email": x[2],
            "subject": x[3],
            "message": x[4],
            "status": x[5],
            "is_trash": x[6],
        })
    
    return jsonify(response)


@contact_us_bp.route('/change_status', methods=['POST'])
@db_connect_cmd
def change_contact_us_status(mainCursor):
    Data = request.form
    status = Data["status"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.contact_us SET status = %s WHERE id = %s', (status, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Updated."
    })




@contact_us_bp.route('/delete', methods=['POST'])
@db_connect_cmd
def delete_contact_us(mainCursor):
    Data = request.get_json()
    is_trash = Data["is_trash"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.contact_us SET is_trash = %s WHERE id = %s', (is_trash, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Removed."
    })


@contact_us_bp.route('/add', methods=['POST'])
@db_connect_cmd
def add_contact_us(mainCursor):
    data = request.get_json()

    # Insert data into the database
    mainCursor.execute(
        "INSERT INTO inventory_website.contact_us (name, email, subject, message) VALUES (%s, %s, %s, %s)",
        (
            data['name'],
            data['email'],
            data['subject'],
            data['message']
        )
    )
    
    return jsonify({'res': 1, 'message': 'New Contact Us entry added successfully!'})
