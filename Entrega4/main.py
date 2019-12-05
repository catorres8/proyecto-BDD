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

# GET methods
@app.route('/messages/<id>')
def r_messages(id):
    mails = list(mensajes.find({'id': id}, {}))
    return json.jsonify(mails)

@app.route('/messages/project_search?<project>')
def project_search(project):
    # Encontrar todos los cprreos enviados o recibidos por el projecto
    mails = None
    return json.jsonify(mails)

@app.route('/messages/content_search?<content>')
def content_search(content):
    # ...
    mails = None
    return json.jsonify(mails)

# POST methods
@app.route('/messages', methods=['POST'])
def w_messages():
    try:
        metadata = request.json["metadata"]
        check_metadata(metadata)
    except Exception as e:
        print(e)
    try:
        content = request.json["content"]
        if type(content) != str:
            raise TypeError
    except Exception as e:
        print(e)

    data = {
        "content": content,
        "metadata": metadata
    }

    count = mensajes.count_documents({})
    data['id'] = str(count + 1)
    result = mensajes.insert_one(data)
    if (result):
        status = "1 mensaje creado"
        success = True
    else:
         status = "No se pudo crear el usuario"
         success = False
    return json.jsonify({'success': success, 'message': status})

def check_metadata(metadata):
    if check_time(metadata):
        if check_sender(metadata) and check_receiver(metadata):
            pass
        elif check_sender(metadata) and not check_receiver(metadata):
            pass
        elif not check_sender(metadata) and check_receiver(metadata):
            pass
        else:
            pass
    else:
        return False

def check_time(metadata):
    try:
        date_patron = "^([0-9][0-9][0-9][0-9])-(0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-9]|3[0-1])$"
        time_patron = "^(2[0-3]|[0-1]?[0-9]):([0-5]?[0-9]):([0-5]?[0-9])$"
        date, time = metadata["time"].split(" ")
        if re.fullmatch(date_patron, date) and re.fullmatch(time_patron, time):
            return True
        else:
            return False
    except KeyError:
        return False

def check_sender(metadata):
    if "sender" in metadata.keys():
        if type(metadata["sender"]) == str:
            return True
    return False

def check_receiver(metadata):
    if "receiver" in metadata.keys():
        if type(metadata["receiver"]) == str:
            return True
    return False

# DELETE methods
@app.route('/messages/<int:uid>', methods=['DELETE'])
def d_messages():
    return


if __name__ == '__main__':
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
