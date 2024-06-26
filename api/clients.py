from flask import Blueprint, Flask, render_template, jsonify,request
from dbconfig import db_connect_cmd
from flask_cors import CORS
import os 

clients_bp = Blueprint('clients', __name__)


@clients_bp.route('/list', methods=['GET'])
@db_connect_cmd
def get_clients(mainCursor):
    mainCursor.execute('SELECT * FROM inventory_website.clients WHERE is_trash=0', ())
    clients = mainCursor.fetchall()
    response = []
    for x in clients:
        response.append({
            "id": x[0],
            "image_path": x[1],
            "status": x[2],
            "is_trash": x[3],
        })

    return jsonify(response)


@clients_bp.route('/change_status', methods=['POST'])
@db_connect_cmd
def change_clients_status(mainCursor):
    Data = request.form
    status = Data["status"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.clients SET status = %s WHERE id = %s', (status, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Updated."
    })




@clients_bp.route('/delete', methods=['POST'])
@db_connect_cmd
def delete_clients(mainCursor):
    Data = request.get_json()
    is_trash = Data["is_trash"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.clients SET is_trash = %s WHERE id = %s', (is_trash, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Removed."
    })



@clients_bp.route('/add', methods=['POST'])
@db_connect_cmd
def add_clients(mainCursor):
    data_files = request.files

    if not os.path.exists('../uploads/clients'):
        os.makedirs('../uploads/clients')


    image_name = ''
    if 'image_path' in data_files:
        image_name = 'uploads/clients/' + data_files['image_path'].filename
        image_path = '../'+image_name
        data_files['image_path'].save(image_path)

    mainCursor.execute(
        "INSERT INTO inventory_website.clients (image_path) VALUES (%s)",
        (image_name,)
    )
    
    return jsonify({'res': 1, 'message': 'New client entry added successfully!'})


