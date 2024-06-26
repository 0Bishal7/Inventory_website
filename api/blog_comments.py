from flask import Blueprint, Flask, render_template, jsonify, request
from dbconfig import db_connect_cmd
from flask_cors import CORS

blog_comments_bp = Blueprint('blog_comments', __name__)


@blog_comments_bp.route('/list', methods=['GET'])
@db_connect_cmd
def get_blog_comments(mainCursor):
    mainCursor.execute('SELECT a.*,b.title,b.slug FROM inventory_website.blog_comments a inner join inventory_website.blog b on a.blog_id=b.id WHERE a.is_trash=0', ())
    blog_comments = mainCursor.fetchall()
    response = []
    for x in blog_comments:
        response.append({
            "id": x[0],
            "title": x[8],
            "slug": x[9],
            "visitor_name": x[2],
            "visitor_email": x[3],
            "comment": x[4],
            "date_time":x[5],
            "status": x[6],
            "is_trash": x[7],
        })

    return jsonify(response)

@blog_comments_bp.route('/change_status', methods=['POST'])
@db_connect_cmd
def change_blog_comments_status(mainCursor):
    Data = request.form
    status = Data["status"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.blog_comments SET status = %s WHERE id = %s', (status, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Updated."
    })

@blog_comments_bp.route('/delete', methods=['POST'])
@db_connect_cmd
def delete_blog_comments(mainCursor):
    Data = request.get_json()
    is_trash = Data["is_trash"]
    id = Data["id"]

    mainCursor.execute('UPDATE inventory_website.blog_comments SET is_trash = %s WHERE id = %s', (is_trash, id))
    return jsonify({
        "res": 1,
        "Msg": "Successfully Removed."
    })


