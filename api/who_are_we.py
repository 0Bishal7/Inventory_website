from flask import Blueprint, Flask, render_template, jsonify,request
from dbconfig import db_connect_cmd
from flask_cors import CORS
import os
who_are_we_bp = Blueprint('who_are_we', __name__)


@who_are_we_bp.route('/list', methods=['GET'])
@db_connect_cmd
def get_who_are_we(mainCursor):
    mainCursor.execute('SELECT * FROM inventory_website.who_are_we WHERE is_trash=0', ())
    who_are_we = mainCursor.fetchall()
    response = []
    for x in who_are_we:
        response.append({
            "id": x[0],
            "category": x[1],
            "title": x[2],
            "description": x[3],
            "external_link": x[4],
            "image_path": x[5],
            "status": x[6],
            "is_trash": x[7],
        })

    return jsonify(response)

# @who_are_we_bp.route('/add', methods=['POST'])
# @db_connect_cmd
# def add_who_are_we(mainCursor):
#     new_entry = request.json

#     mainCursor.execute(
#         "INSERT INTO inventory_website.who_are_we (category, title, description, external_link, image_path) VALUES (%s, %s, %s, %s, %s)",
#         (new_entry['category'], new_entry['title'], new_entry['description'], new_entry['link'], new_entry['file_name'])
#     )
#     return jsonify({'message': 'New entry added successfully!'})


@who_are_we_bp.route('/change_status', methods=['POST'])
@db_connect_cmd
def change_our_values_status(mainCursor):
    data = request.form
    status = data["status"]
    id = data["id"]

    mainCursor.execute('UPDATE inventory_website.who_are_we SET status = %s WHERE id = %s', (status, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Updated."
    })




@who_are_we_bp.route('/delete', methods=['POST'])
@db_connect_cmd
def delete_our_values(mainCursor):
    Data = request.get_json()
    is_trash = Data["is_trash"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.who_are_we SET is_trash = %s WHERE id = %s', (is_trash, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Removed."
    })

@who_are_we_bp.route('/add', methods=['POST'])
@db_connect_cmd
def add_who_are_we(mainCursor):
    data_text = request.form
    data_files = request.files

    # Create upload directory if it doesn't exist
    if not os.path.exists('../uploads/who_are_we'):
        os.makedirs('../uploads/who_are_we')

    # Save the uploaded file
    image_name = ''
    if 'image_path' in data_files:
        image_name = 'uploads/who_are_we/' + data_files['image_path'].filename
        data_files['image_path'].save(image_name)

    # Insert data into the database
    mainCursor.execute(
        "INSERT INTO inventory_website.who_are_we (category, title, description, external_link, image_path) VALUES (%s, %s, %s, %s, %s)",
        (
            data_text['category'],
            data_text['title'],
            data_text['description'],
            data_text['external_link'],
            image_name
        )
    )
    
    return jsonify({'res': 1, 'message': 'New Who Are We entry added successfully!'})
