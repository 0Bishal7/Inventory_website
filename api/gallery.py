from flask import Blueprint, Flask, render_template, jsonify,request
from dbconfig import db_connect_cmd
from flask_cors import CORS
import os
gallery_bp = Blueprint('gallery', __name__)


@gallery_bp.route('/list', methods=['GET'])
@db_connect_cmd
def get_notice(mainCursor):
    mainCursor.execute('SELECT * FROM inventory_website.gallery WHERE is_trash=0', ())
    gallery = mainCursor.fetchall()
    response = []
    for x in gallery:
        response.append({
            "id": x[0],
            "folder_name": x[1],
            "folder_root":x[2],
            "last_update":x[3],
            "created":x[4],
            "status": x[5],
            "is_trash": x[6],
        })

    return jsonify(response)


@gallery_bp.route('/change_status', methods=['POST'])
@db_connect_cmd
def change_gallery_status(mainCursor):
    Data = request.form
    status = Data["status"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.gallery SET status = %s WHERE id = %s', (status, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Updated."
    })



@gallery_bp.route('/add', methods=['POST'])
@db_connect_cmd
def add_gallery(mainCursor):
    data_text = request.form
    data_files = request.files

    # Create upload directory if it doesn't exist
    if not os.path.exists('../uploads/galleries'):
        os.makedirs('../uploads/galleries')


    file_name = ''
    if 'folder_root' in data_files:
        file_name = 'uploads/galleries/' + data_files['folder_root'].filename
        image_path = '../'+file_name
        data_files['folder_root'].save(image_path)


    mainCursor.execute(
        "INSERT INTO inventory_website.gallery (folder_name, folder_root, last_update, created) VALUES (%s, %s, %s, %s)",
        (
            data_text['folder_name'],
            file_name,
            data_text['last_update'],
            data_text['created']
        )
    )
    
    return jsonify({'res': 1, 'message': 'New gallery entry added successfully!'})
