from flask import Flask, jsonify
from flask_cors import CORS
import os

app = Flask(__name__)
CORS(app)


from who_are_we import who_are_we_bp
from our_values import our_values_bp
from clients import clients_bp
from recent_posts import recent_posts_bp
from contact_us import contact_us_bp
from contact_us_details import contact_us_details_bp
from team import team_bp
from testimonials import testimonials_bp
from services import services_bp
from pricing import pricing_bp
from faq import faq_bp
from organization import organization_bp
from notice import notice_bp
from gallery import gallery_bp
from slider import slider_bp
from blog import blog_bp
from blog_comments import blog_comments_bp

app.register_blueprint(who_are_we_bp, url_prefix="/who_are_we")
app.register_blueprint(our_values_bp,url_prefix="/our_values")
app.register_blueprint(clients_bp,url_prefix="/clients")
app.register_blueprint(recent_posts_bp,url_prefix="/recent_posts")
app.register_blueprint(contact_us_bp,url_prefix="/contact_us")
app.register_blueprint(contact_us_details_bp,url_prefix="/contact_us_details")
app.register_blueprint(team_bp,url_prefix="/team")
app.register_blueprint(testimonials_bp,url_prefix="/testimonials")
app.register_blueprint(services_bp,url_prefix="/services")
app.register_blueprint(pricing_bp,url_prefix="/pricing")
app.register_blueprint(faq_bp,url_prefix="/faq")
app.register_blueprint(organization_bp,url_prefix="/organization")
app.register_blueprint(notice_bp,url_prefix="/notice")
app.register_blueprint(gallery_bp,url_prefix="/gallery")
app.register_blueprint(slider_bp,url_prefix="/slider")
app.register_blueprint(blog_bp,url_prefix="/blog")
app.register_blueprint(blog_comments_bp,url_prefix="/blog_comments")














UPLOAD_FOLDER = '../uploads/'
ALLOWED_EXTENSION = {'txt','pdf','png','jpg','jpeg','gif'}

app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER
app.config['MAX_CONTENT_LENGTH'] = 16 * 1000 * 1000

def allowed_file(filename):
    return '.' in filename and \
        filename.rsplit('.',1)[1].lower() in ALLOWED_EXTENSION
def upload(file_data):
    if file_data.filename == '':
        return 'No file part'
    if file_data and allowed_file(file_data.filename):
        file_data.save(os.path.join(app.config['UPLOAD_FOLDER'], file_data.filename))
        return 'Success'
    
if __name__ == '__main__':
    app.run(port=7452, debug=True)
