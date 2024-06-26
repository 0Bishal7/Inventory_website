from flask import Blueprint, Flask, render_template, jsonify,request
from dbconfig import db_connect_cmd
from flask_cors import CORS
import os
blog_bp = Blueprint('blog', __name__)


@blog_bp.route('/list', methods=['GET'])
@db_connect_cmd
def get_blog(mainCursor):
    mainCursor.execute('SELECT * FROM inventory_website.blog WHERE is_trash=0', ())
    blog = mainCursor.fetchall()
    response = []
    for x in blog:
        response.append({
            "id": x[0],
            "title": x[1],
            "content":x[2],
            "category":x[3],
            "date_time":x[4],
            "last_update":x[5],
            "image_path":x[6],
            "author_id":x[7],
            "author_name":x[8],
            "slug":x[9],
            "status": x[10],
            "is_trash": x[11],
        })

    return jsonify(response)



@blog_bp.route('/change_status', methods=['POST'])
@db_connect_cmd
def change_blog_status(mainCursor):
    Data = request.form
    status = Data["status"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.blog SET status = %s WHERE id = %s', (status, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Updated."
    })




@blog_bp.route('/delete', methods=['POST'])
@db_connect_cmd
def delete_blog(mainCursor):
    Data = request.get_json()
    is_trash = Data["is_trash"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.blog SET is_trash = %s WHERE id = %s', (is_trash, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Removed."
    })


@blog_bp.route('/add', methods=['POST'])
@db_connect_cmd
def add_blog(mainCursor):
    data_text = request.form
    data_files = request.files

    # Create upload directory if it doesn't exist
    if not os.path.exists('../uploads/blog'):
        os.makedirs('../uploads/blog')

    # Save the uploaded file
    image_name = ''
    if 'image_path' in data_files:
        image_name = 'uploads/blog/' + data_files['image_path'].filename
        image_path = '../'+image_name
        data_files['image_path'].save(image_path)

    # Insert data into the database
    mainCursor.execute(
        "INSERT INTO inventory_website.blog (title, category, date_time, last_update, image_path, author_id, author_name, slug) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
        (
            data_text['title'],
            data_text['category'],
            data_text['date_time'],
            data_text['last_update'],
            image_name,
            data_text['author_id'],
            data_text['author_name'],
            data_text['slug']
        )
    )
    
    return jsonify({'res': 1, 'message': 'New blog entry added successfully!'})
