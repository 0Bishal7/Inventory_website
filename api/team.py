from flask import Blueprint, Flask, render_template, jsonify,request
from dbconfig import db_connect_cmd
from flask_cors import CORS
import os
team_bp = Blueprint('team', __name__)


@team_bp.route('/list', methods=['GET'])
@db_connect_cmd
def get_team(mainCursor):
    mainCursor.execute('SELECT * FROM inventory_website.team WHERE is_trash=0', ())
    team = mainCursor.fetchall()
    response = []
    for x in team:
        response.append({
            "id": x[0],
            "image_path":x[1],
            "Name": x[2],
            "job_Title":x[3],
            "Description":x[4],
            "Twitter_link":x[5],
            "Facebook_link":x[6],
            "instagram_link":x[7],
            "Linkdin_link":x[8],
            "status": x[16],
            "is_trash": x[17],
        })

    return jsonify(response)


@team_bp.route('/change_status', methods=['POST'])
@db_connect_cmd
def change_team_status(mainCursor):
    Data = request.form
    status = Data["status"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.team SET status = %s WHERE id = %s', (status, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Updated."
    })




@team_bp.route('/delete', methods=['POST'])
@db_connect_cmd
def delete_team(mainCursor):
    Data = request.get_json()
    is_trash = Data["is_trash"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.team SET is_trash = %s WHERE id = %s', (is_trash, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Removed."
    })

@team_bp.route('/add', methods=['POST'])
@db_connect_cmd
def add_team_member(mainCursor):
    data_text = request.form
    data_images = request.files

    if not os.path.exists('../uploads/team'):
        os.makedirs('../uploads/team')


    img_name = ''
    if 'image_path' in data_images:
        img_name = 'uploads/team/' + data_images['image_path'].filename
        data_images['image_path'].save('../'+img_name)

    # Insert data into the database
    mainCursor.execute(
        "INSERT INTO inventory_website.team (image_path,Name, job_Title, Description, Twitter_link, Facebook_link, instagram_link, Linkdin_link) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
        (
            img_name,
            data_text['Name'],
            data_text['job_Title'],
            data_text['Description'],
            data_text['Twitter_link'],
            data_text['Facebook_link'],
            data_text['instagram_link'],
            data_text['Linkdin_link'],
            
        )
    )
    
    return jsonify({'res': 1, 'message': 'New team member added successfully!'})
