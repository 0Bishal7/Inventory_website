from flask import Blueprint, Flask, render_template, jsonify,request
from dbconfig import db_connect_cmd
from flask_cors import CORS
import os

notice_bp = Blueprint('notice', __name__)


@notice_bp.route('/list', methods=['GET'])
@db_connect_cmd
def get_notice(mainCursor):
    mainCursor.execute('SELECT * FROM inventory_website.notice WHERE is_trash=0', ())
    notice = mainCursor.fetchall()
    response = []
    for x in notice:
        response.append({
            "id": x[0],
            "title": x[1],
            "description":x[2],
            "file_path":x[3],
            "last_update":x[4],
            "created":x[5],
            "status": x[6],
            "is_trash": x[7],
        })

    return jsonify(response)


@notice_bp.route('/change_status', methods=['POST'])
@db_connect_cmd
def change_notice_status(mainCursor):
    Data = request.form
    status = Data["status"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.notice SET status = %s WHERE id = %s', (status, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Updated."
    })




@notice_bp.route('/delete', methods=['POST'])
@db_connect_cmd
def delete_notice(mainCursor):
    Data = request.get_json()
    is_trash = Data["is_trash"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.notice SET is_trash = %s WHERE id = %s', (is_trash, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Removed."
    })


@notice_bp.route('/add', methods=['POST'])
@db_connect_cmd
def add_notice(mainCursor):
    data_text = request.form
    data_files = request.files

    # Create upload directory if it doesn't exist
    if not os.path.exists('../uploads/notices'):
        os.makedirs('../uploads/notices')

    # Save the uploaded file
    file_name = ''
    if 'file_path' in data_files:
        file_name = 'uploads/notices/' + data_files['file_path'].filename
        image_path = '../'+file_name
        data_files['file_path'].save(image_path)

    # Insert data into the database
    mainCursor.execute(
        "INSERT INTO inventory_website.notice (title, description, file_path, last_update, created) VALUES (%s, %s, %s, %s, %s)",
        (
            data_text['title'],
            data_text['description'],
            file_name,
            data_text['last_update'],
            data_text['created']
        )
    )
    
    return jsonify({'res': 1, 'message': 'New notice entry added successfully!'})
