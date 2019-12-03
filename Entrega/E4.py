from flask import Flask, render_template, request, abort, json
from pymongo import MongoClient
import pandas as pd
import matplotlib.pyplot as plt
import os
import atexit
import subprocess

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
