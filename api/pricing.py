from flask import Blueprint, Flask, render_template, jsonify,request
from dbconfig import db_connect_cmd
from flask_cors import CORS
import os

pricing_bp = Blueprint('pricing', __name__)


@pricing_bp.route('/list', methods=['GET'])
@db_connect_cmd
def get_pricing(mainCursor):
    mainCursor.execute('SELECT * FROM inventory_website.pricing WHERE is_trash=0', ())
    pricing = mainCursor.fetchall()
    response = []
    for x in pricing:
        response.append({
            "id": x[0],
            "Plan_name": x[1],
            "Plan_price": x[2],
            "icon": x[3],
            "Features": x[4],


            "status": x[5],
            "is_trash": x[6],
        })

    return jsonify(response)



@pricing_bp.route('/change_status', methods=['POST'])
@db_connect_cmd
def change_pricing_status(mainCursor):
    Data = request.form
    status = Data["status"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.pricing SET status = %s WHERE id = %s', (status, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Updated."
    })




@pricing_bp.route('/delete', methods=['POST'])
@db_connect_cmd
def delete_pricing(mainCursor):
    Data = request.get_json()
    is_trash = Data["is_trash"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.pricing SET is_trash = %s WHERE id = %s', (is_trash, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Removed."
    })



@pricing_bp.route('/add', methods=['POST'])
@db_connect_cmd
def add_pricing(mainCursor):
    data_text = request.form
    data_files = request.files

    # Create upload directory if it doesn't exist
    if not os.path.exists('../uploads/pricing'):
        os.makedirs('../uploads/pricing')

    # Save the uploaded icon
    icon_name = ''
    if 'icon' in data_files:
        icon_name = 'uploads/pricing/' + data_files['icon'].filename
        data_files['icon'].save('../'+icon_name)

    # Insert data into the database
    mainCursor.execute(
        "INSERT INTO inventory_website.pricing (Plan_name, Plan_price, icon, Features) VALUES (%s, %s, %s, %s)",
        (
            data_text['plan_name'],
            data_text['plan_price'],
            icon_name,
            data_text['features']
        )
    )
    
    return jsonify({'res': 1, 'message': 'New pricing entry added successfully!'})
