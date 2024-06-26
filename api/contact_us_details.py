from flask import Blueprint, Flask, render_template, jsonify,request
from dbconfig import db_connect_cmd
from flask_cors import CORS
import os

contact_us_details_bp = Blueprint('contact_us_details', __name__)


@contact_us_details_bp.route('/list', methods=['GET'])
@db_connect_cmd
def get_contact_us_details(mainCursor):
    mainCursor.execute('SELECT * FROM inventory_website.contact_us_details WHERE is_trash=0', ())
    contact_us_details = mainCursor.fetchall()
    response = []
    for x in contact_us_details:
        response.append({
            "id": x[0],
            "icon": x[1],
            "Details": x[2],
            "info_1": x[3],
            "info_2": x[4],
            "status": x[5],
            "is_trash": x[6],
        })

    return jsonify(response)



@contact_us_details_bp.route('/change_status', methods=['POST'])
@db_connect_cmd
def change_contact_us_details_status(mainCursor):
    Data = request.form
    status = Data["status"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.contact_us_details SET status = %s WHERE id = %s', (status, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Updated."
    })




@contact_us_details_bp.route('/delete', methods=['POST'])
@db_connect_cmd
def delete_contact_us_details(mainCursor):
    Data = request.get_json()
    is_trash = Data["is_trash"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.contact_us_details SET is_trash = %s WHERE id = %s', (is_trash, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Removed."
    })

@contact_us_details_bp.route('/add', methods=['POST'])
@db_connect_cmd
def add_contact_us_details(mainCursor):
    data_text = request.form
    data_files = request.files

    # Create upload directory if it doesn't exist
    if not os.path.exists('../uploads/contact_us_details'):
        os.makedirs('../uploads/contact_us_details')

    # Save the uploaded file
    icon_name = ''
    if 'icon' in data_files:
        icon_name = 'uploads/contact_us_details/' + data_files['icon'].filename
        image_path = '../'+icon_name
        data_files['icon'].save(image_path)

    # Insert data into the database
    mainCursor.execute(
        "INSERT INTO inventory_website.contact_us_details (icon, details, info_1, info_2) VALUES (%s, %s, %s, %s)",
        (
            icon_name,
            data_text['details'],
            data_text['info_1'],
            data_text['info_2']
        )
    )
    
    return jsonify({'res': 1, 'message': 'New Contact Us Details entry added successfully!'})
