
from pymongo import MongoClient

MONGODATABASE = "test"
MONGOSERVER = "localhost"
MONGOPORT = 27017
client = MongoClient(MONGOSERVER, MONGOPORT)
mongodb = client[MONGODATABASE]

usuarios = mongodb.usuarios
mensajes = mongodb.mensajes
productos = mongodb.productos

qfilter = mensajes.find({}, {'_id': 0})
for mensaje in qfilter:
    print(mensaje)
