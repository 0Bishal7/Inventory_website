from flask import Blueprint, Flask, render_template, jsonify,request
from dbconfig import db_connect_cmd
from flask_cors import CORS
import os
our_values_bp = Blueprint('our_values', __name__)



@our_values_bp.route('/list', methods=['GET'])
@db_connect_cmd
def get_our_values(mainCursor):
    mainCursor.execute('SELECT * FROM inventory_website.our_values WHERE is_trash=0', ())
    our_values = mainCursor.fetchall()
    response = []
    for x in our_values:
        response.append({
            "id": x[0],
            "Title": x[1],
            "C1_Image_path": x[2],
            "C1_Title": x[3],
            "C1_Description": x[4],
            "C2_Image_path": x[5],
            "C2_Title": x[6],
            "C2_Description": x[7],
            "status": x[8],
            "is_trash": x[9],
        })

    return jsonify(response)



@our_values_bp.route('/change_status', methods=['POST'])
@db_connect_cmd
def change_our_values_status(mainCursor):
    Data = request.form
    status = Data["status"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.our_values SET status = %s WHERE id = %s', (status, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Updated."
    })




@our_values_bp.route('/delete', methods=['POST'])
@db_connect_cmd
def delete_our_values(mainCursor):
    Data = request.get_json()
    is_trash = Data["is_trash"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.our_values SET is_trash = %s WHERE id = %s', (is_trash, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Removed."
    })


@our_values_bp.route('/add', methods=['POST'])
@db_connect_cmd
def add_who_are_we(mainCursor):
    data_text = request.form
    data_images = request.files
    if not os.path.exists('../uploads/our_values'):
        os.makedirs('../uploads/our_values')
    img_name1 = 'uploads/our_values/'+data_images['c1_image_path'].filename
    img_name2 = 'uploads/our_values/'+data_images['c2_image_path'].filename
    data_images['c1_image_path'].save('../uploads/our_values/'+data_images['c1_image_path'].filename)
    data_images['c2_image_path'].save('../uploads/our_values/'+data_images['c2_image_path'].filename)
    
    mainCursor.execute(
        "INSERT INTO inventory_website.our_values (Title,C1_Image_path,C1_Title,C1_Description,C2_Image_path,C2_Title,C2_Description) VALUES (%s,%s,%s,%s,%s,%s,%s)", (data_text['title'],img_name1,data_text['c1_title'],data_text['c1_description'],img_name2,data_text['c2_title'],data_text['c2_description'])
    )
    return jsonify({'res': 1,'message': 'New entry added successfully!'})