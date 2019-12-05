from flask import Flask, render_template, request, abort, json
from pymongo import MongoClient, TEXT
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
@app.route('/messages/:<string:id>', methods=['GET'])
def r_messages(id):
    '''
    Para llamar a mensajes
    solo usar variable mensajes
    '''
    mongodb = client[MONGODATABASE]
    mensajes = mongodb.mensajes
    mails = list(mensajes.find({'id': id}, {}))
    return json.jsonify(mails)


@app.route('/messages/project-search/<string:nombre_proyecto>', methods=['GET'])
def project_search(nombre_proyecto):
    #Encontrar todos los correos enviados o recibidos por el projecto
    mongodb = client[MONGODATABASE]
    mensajes = mongodb.mensajes
    mails = []
    for mensaje in mensajes.find({'metadata.sender': nombre_proyecto},{}):
        mails.append(mensaje)
    for mensaje in mensajes.find({'metadata.receiver': nombre_proyecto},{}):
        mails.append(mensaje)

    return json.jsonify(mails)


@app.route('/messages/content-search', methods=['GET'])
def content_search():
    mongodb = client[MONGODATABASE]
    mensajes = mongodb.mensajes
    mensajes.create_index([('message', TEXT)])
    data = request.get_json()
    contenido = data['required'] #Para las frases

    frase_buscar = ""
    lista_frases = contenido.split("-")
    for frase in lista_frases:
        frase_separada = frase.split(" ")
        frase_mongo = '\"'
        for palabra in frase_separada:
            frase_mongo = frase_mongo + " " + palabra
            frase_mongo += '\"'
        frase_buscar += frase_mongo + " "
    ####
    palabras_no_deseadas = data['forbidden']
    palabras_deseadas = data['desired']
    palabras_no_deseadas_search = ""
    palabras_deseadas_search = ""
    palabras_no_deseadas = palabras_no_deseadas.split("_")
    palabras_deseadas = palabras_deseadas.split("_")
    for word in palabras_deseadas:
        palabras_deseadas_search += word + " "
    for word in palabras_no_deseadas:
        palabras_no_deseadas_search += "-" + word + " "
    words_search = palabras_deseadas_search + " " + palabras_no_deseadas

    mails = []
    for m in mensajes.find({'$and': [{'$text': {'$search': words_search}},
                                        {'$text': {'$search': frase_buscar}}]}):
        mails.append(m)

    if len(mails) == 0:
        return json.jsonify(), 404
    else:
        return json.jsonify(mails), 200
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
@app.route('/messages/<string:id>', methods=['DELETE'])
def d_messages(id):
    mongodb = client[MONGODATABASE]
    mensajes = mongodb.mensajes
    mail_borrado = mensajes.delete_one({"id": id})
    if mail_borrado.deleted_count == 0:
        return json.jsonify(), 404
    else:
        return json.jsonify("Eliminado"), 200




if __name__ == '__main__':
    app.run()



    MONGODATABASE = "test" #Recordar cambiar test por Grupo76
    MONGOSERVER = "localhost"
    MONGOPORT = 27017
    client = MongoClient(MONGOSERVER, MONGOPORT)
    mongodb = client[MONGODATABASE]

    mensajes = mongodb.mensajes #Esto funciona pensando en que el importado está hecho


    qfilter = mensajes.find({'mid': 1})
    for mensaje in qfilter:
        print(mensaje)
