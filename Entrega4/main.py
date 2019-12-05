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
        time_status, sender_status, receiver_status = check_metadata(metadata)
    except Exception as e:
        print(e)
    try:
        content = request.json["content"]
        content_status = [True, "Parametro 'content' verificado"]
        if type(content) != str:
            content_status[0] = False
            content_status[1] = "El tipo del parametro 'content' no es string"
    except Exception as e:
        print(e)

    data = {"content": content, "metadata": metadata}

    #Cambiar el generador de id
    new_id, id_status = id_generator()
    data['id'] = new_id

    if id_status[0] and content_status[0] and time_status[0]:
        result = mensajes.insert_one(data)
        if (result):
            message = "1 mensaje creado"
            success = True
        else:
            message = "No se pudo crear el mensaje"
            success = False
    else:
        message = "No se pudo crear el mensaje"
        success = False
    status = {"id_status": id_status,
              "content_status": content_status,
              "time_status": time_status,
              "sender_status": sender_status,
              "receiver_status": receiver_status}
    return json.jsonify({'success': success, 'message': message, "status": status})

def check_metadata(metadata):
    time_status = check_time(metadata)
    sender_status = check_sender(metadata)
    receiver_status = check_receiver(metadata)

    return time_status, sender_status, receiver_status

def check_time(metadata):
    status = [True, "Parametro 'time' verificado"]
    try:
        date_patron = "^([0-9][0-9][0-9][0-9])-(0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-9]|3[0-1])$"
        time_patron = "^(2[0-3]|[0-1]?[0-9]):([0-5]?[0-9]):([0-5]?[0-9])$"
        date, time = metadata["time"].split(" ")
    except KeyError:
        return [False, "Mensaje no contiene parametro 'time'"]

    if not (re.fullmatch(date_patron, date) and re.fullmatch(time_patron, time)):
        status[0] = False
        status[1] = "Parametro 'time' no cumple con el formato requerido 'AAAA-MM-DD hh:mm:ss'"

    return status

def check_sender(metadata):
    status = [True, "Parametro 'sender' verificado"]
    if "sender" in metadata.keys():
        if type(metadata["sender"]) != str:
            status[0] = False
            status[1] = "El tipo del parametro 'sender' no es string"
    else:
        status[0] = False
        status[1] = "Mensaje no contiene parametro 'sender'"

    return status

def check_receiver(metadata):
    status = [True, "Parametro 'receiver' verificado"]
    if "receiver" in metadata.keys():
        if type(metadata["receiver"]) != str:
            status[0] = False
            status[1] = "El tipo del parametro 'receiver' no es string"
    else:
        status[0] = False
        status[1] = "Mensaje no contiene parametro 'receiver'"

    return status

def id_generator():
    count = mensajes.count_documents({})
    new_id = str(count + 1)

    return new_id, [True, f"Generado con exito id: {new_id}"]

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
