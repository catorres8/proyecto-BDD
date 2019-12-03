from flask import Flask, render_template, request, abort, json
from pymongo import MongoClient
import pandas as pd
import matplotlib.pyplot as plt
import os
import atexit
import subprocess

USER_KEYS = ['name', 'last_name', 'occupation', 'follows', 'age']
mongod = subprocess.Popen('mongod', stdout = subprocess.DEVNULL)
atexit.register(mongod.kill)
client = MongoClient('Localhost')
db = client['entidades']
usuarios = db.usuarios
app = Flask(__name__)

@app.route('/')

def home():
    return '<h1>HELLO WORLD</h1>'

@app.route('/plot')

def route():
    users = usuarios.find({},{'_id':0})
    df = d.DataFrame(list(users)).set_index('name')
    df.plot.pie(y = 'age')
    pth = os.path.join('static', 'plot.png')
    plt.savefig(pth)
    return render_template('plot.html')

@app.route('/users')

def get_users():

    resultados = [u for u in usuarios.find({},{'_id':0})]
    return json.jsonify(resultados)

@app.route('/users/<int:uid>')

def get_user(uid):

    users = list(usuarios.find({'uid':uid},{'_id':0}))
    return json.jsonify(users)

@app.route('/users', methods = ['POST'])

def create_user():

    data = {key: request.json[key] for key in USER_KEYS}
    count = usuarios.count_documents({})
    data['uid'] = count + 1
    result = usuarios.insert_one(data)
    if (result):
        message = "1 usuario creado"
        success = True
    else:
        message = 'No se pudo crear el usuario'
        success = False
    return json.jsonify({'success': success, 'message': message})

@app.route('/users/<int:uid>', methods = ['DELETE'])

def delete_many_user():

    if not request.json:
        abort(400)
    all_uids = request.json['uidBulk']
    if not all_uids:
        abort(400)
    result = usuarios.delete_many_user({'uid':{'$in':all_uids}})
    message = f'{result.deleted_count} usuarios eliminados.'
    return json.jsonify({'result': 'success', 'message': message})

@app.route('/test')

def test():

    param = request.args.get('name', False)
    print('URL param:', param)
    param2 = request.headers.get('name', False)
    print('Header', param2)
    body = request.data
    print('Body', body)
    return "OK"

if os.name == 'nt':
    app.run()



MONGODATABASE = "test"
MONGOSERVER = "localhost"
MONGOPORT = 27017
client = MongoClient(MONGOSERVER, MONGOPORT)
mongodb = client[MONGODATABASE]

usuarios = mongodb.usuarios
mensajes = mongodb.mensajes
productos = mongodb.productos

qfilter = mensajes.find({'mid': 1})
for mensaje in qfilter:
    print(mensaje)
