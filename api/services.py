from flask import Blueprint, Flask, render_template, jsonify,request
from dbconfig import db_connect_cmd
from flask_cors import CORS
import os

services_bp = Blueprint('services', __name__)


@services_bp.route('/list', methods=['GET'])
@db_connect_cmd
def get_services(mainCursor):
    mainCursor.execute('SELECT * FROM inventory_website.services WHERE is_trash=0', ())
    services = mainCursor.fetchall()
    response = []
    for x in services:
        response.append({
            "id": x[0],
            "icon": x[1],
            "title":x[2],
            "description":x[3],
            "external_link":x[4],
            "status": x[5],
            "is_trash": x[6],
        })

    return jsonify(response)


@services_bp.route('/change_status', methods=['POST'])
@db_connect_cmd
def change_services_status(mainCursor):
    Data = request.form
    status = Data["status"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.services SET status = %s WHERE id = %s', (status, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Updated."
    })




@services_bp.route('/delete', methods=['POST'])
@db_connect_cmd
def delete_services(mainCursor):
    Data = request.get_json()
    is_trash = Data["is_trash"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.services SET is_trash = %s WHERE id = %s', (is_trash, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Removed."
    })


@services_bp.route('/add', methods=['POST'])
@db_connect_cmd
def add_service(mainCursor):
    data_text = request.form
    data_images = request.files

    # Create upload directory if it doesn't exist
    if not os.path.exists('../uploads/services'):
        os.makedirs('../uploads/services')

    # Save the uploaded icon
    icon_name = ''
    if 'icon' in data_images:
        icon_name = 'uploads/services/' + data_images['icon'].filename
        data_images['icon'].save('../'+icon_name)

    # Insert data into the database
    mainCursor.execute(
        "INSERT INTO inventory_website.services (icon, title, description, external_link) VALUES (%s, %s, %s, %s)",
        (
            icon_name,
            data_text['title'],
            data_text['description'],
            data_text['external_link']
        )
    )
    
    return jsonify({'res': 1, 'message': 'New service entry added successfully!'})
