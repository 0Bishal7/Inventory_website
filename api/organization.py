from flask import Blueprint, Flask, render_template, jsonify,request
from dbconfig import db_connect_cmd
from flask_cors import CORS
import os

organization_bp = Blueprint('organization', __name__)


@organization_bp.route('/list', methods=['GET'])
@db_connect_cmd
def get_organization(mainCursor):
    mainCursor.execute('SELECT * FROM inventory_website.organization WHERE is_trash=0', ())
    organization = mainCursor.fetchall()
    response = []
    for x in organization:
        response.append({
            "id": x[0],
            "name": x[1],
            "logo":x[2],
            "contact":x[3],
            "address":x[4],
            "created":x[5],
            "description":x[6],
            "status": x[7],
            "is_trash": x[8],
        })

    return jsonify(response)



@organization_bp.route('/change_status', methods=['POST'])
@db_connect_cmd
def change_organization_status(mainCursor):
    Data = request.form
    status = Data["status"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.organization SET status = %s WHERE id = %s', (status, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Updated."
    })



@organization_bp.route('/add', methods=['POST'])
@db_connect_cmd
def add_organization(mainCursor):
    data_text = request.form
    data_files = request.files

    # Create upload directory if it doesn't exist
    if not os.path.exists('../uploads/organization'):
        os.makedirs('../uploads/organization')

    # Save the uploaded logo
    logo_name = ''
    if 'logo' in data_files:
        logo_name = 'uploads/organization/' + data_files['logo'].filename
        image_path = '../'+logo_name
        data_files['logo'].save(image_path)

    # Insert data into the database
    mainCursor.execute(
        "INSERT INTO inventory_website.organization (name, logo, contact, address, created, description) VALUES (%s, %s, %s, %s, %s, %s)",
        (
            data_text['name'],
            logo_name,
            data_text['contact'],
            data_text['address'],
            data_text['created'],
            data_text['description']
        )
    )
    
    return jsonify({'res': 1, 'message': 'New organization entry added successfully!'})


@organization_bp.route('/delete', methods=['POST'])
@db_connect_cmd
def delete_organization(mainCursor):
    Data = request.get_json()
    is_trash = Data["is_trash"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.organization SET is_trash = %s WHERE id = %s', (is_trash, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Removed."
    })