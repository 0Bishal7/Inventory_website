from flask import Blueprint, Flask, render_template, jsonify,request
from dbconfig import db_connect_cmd
from flask_cors import CORS
import os

testimonials_bp = Blueprint('testimonials', __name__)


@testimonials_bp.route('/list', methods=['GET'])
@db_connect_cmd
def get_testimonials(mainCursor):
    mainCursor.execute('SELECT * FROM inventory_website.testimonials WHERE is_trash=0', ())
    testimonials = mainCursor.fetchall()
    response = []
    for x in testimonials:
        response.append({
            "id": x[0],
            "Rating": x[1],
            "description": x[2],
            "image_path": x[3],
            "Name":x[4],
            "job_title":x[5],
            "status":x[6],
            "is_trash":x[7],
        })

    return jsonify(response)


@testimonials_bp.route('/change_status', methods=['POST'])
@db_connect_cmd
def change_testimonials_status(mainCursor):
    Data = request.form
    status = Data["status"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.testimonials SET status = %s WHERE id = %s', (status, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Updated."
    })




@testimonials_bp.route('/delete', methods=['POST'])
@db_connect_cmd
def delete_testimonials(mainCursor):
    Data = request.get_json()
    is_trash = Data["is_trash"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.testimonials SET is_trash = %s WHERE id = %s', (is_trash, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Removed."
    })




@testimonials_bp.route('/add', methods=['POST'])
@db_connect_cmd
def add_testimonials(mainCursor):
    data_text = request.form
    data_images = request.files
    if not os.path.exists('../uploads/testimonials'):
        os.makedirs('../uploads/testimonials')
    img_name1 = 'uploads/testimonials/'+data_images['image_path'].filename
    data_images['image_path'].save('../uploads/testimonials/'+data_images['image_path'].filename)
    
    
    mainCursor.execute(
        "INSERT INTO inventory_website.testimonials (Rating,description,image_path,Name,job_title) VALUES (%s,%s,%s,%s,%s)", (data_text['Rating'],data_text['description'],img_name1,data_text['Name'],data_text['job_title'])
    )
    return jsonify({'res': 1,'message': 'New entry added successfully!'})