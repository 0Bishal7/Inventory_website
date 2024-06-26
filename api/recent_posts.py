from flask import Blueprint, Flask, render_template, jsonify,request
from dbconfig import db_connect_cmd
from flask_cors import CORS
import os

recent_posts_bp = Blueprint('recent_posts', __name__)


@recent_posts_bp.route('/list', methods=['GET'])
@db_connect_cmd
def get_recent_posts(mainCursor):
    mainCursor.execute('SELECT * FROM inventory_website.recent_posts WHERE is_trash=0', ())
    recent_posts = mainCursor.fetchall()
    response = []
    for x in recent_posts:
        response.append({
            "id": x[0],
            "image_path": x[1],
            "title":x[2],
            "name":x[3],
            "info":x[4],
            "external_link":x[5],
            "status": x[6],
            "is_trash": x[7],
        })

    return jsonify(response)


@recent_posts_bp.route('/change_status', methods=['POST'])
@db_connect_cmd
def change_recent_posts_status(mainCursor):
    Data = request.form
    status = Data["status"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.recent_posts SET status = %s WHERE id = %s', (status, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Updated."
    })




@recent_posts_bp.route('/delete', methods=['POST'])
@db_connect_cmd
def delete_recent_posts(mainCursor):
    Data = request.get_json()
    is_trash = Data["is_trash"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.recent_posts SET is_trash = %s WHERE id = %s', (is_trash, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Removed."
    })



@recent_posts_bp.route('/add', methods=['POST'])
@db_connect_cmd
def add_recent_post(mainCursor):
    data_text = request.form
    data_images = request.files

    # Create upload directory if it doesn't exist
    if not os.path.exists('../uploads/recent_posts'):
        os.makedirs('../uploads/recent_posts')

    # Save the uploaded image
    image_name = ''
    if 'image_path' in data_images:
        image_name = 'uploads/recent_posts/' + data_images['image_path'].filename
        data_images['image_path'].save('../'+image_name)

    # Insert data into the database
    mainCursor.execute(
        "INSERT INTO inventory_website.recent_posts (image_path, title, name, info, external_link) VALUES (%s, %s, %s, %s, %s)",
        (
            image_name,
            data_text['title'],
            data_text['name'],
            data_text['info'],
            data_text['external_link']
        )
    )
    
    return jsonify({'res': 1, 'message': 'New recent post entry added successfully!'})
