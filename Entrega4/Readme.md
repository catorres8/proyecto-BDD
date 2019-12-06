#Entrega 4 - Grupo 76-87

Para poder hacer uso de la API y comprobar su funcionamiento, se implementó un json que sirve para poblar una base de datos tipo mongo. El nombre de esta es mensajes_para_bdd.json

El archivo que ejecuta el proyecto corresponde a **main.py**

##Respecto de los métodos que conforman la API
A continuación se detallan de manera breve los métodos, y las rutas que estos invocan. También se señala qué ruta es al que usan

#GET

- ```r_messages(id)```: Recibe en la url el atributo id en formato string y retorna la información correspondiente a un correo.
- **URL**: /messages/<string:id>


- ```projecto_search(nombre_proyecto)```: Recibe en la url el nombre de un proyecto en formato string y retorna todos los mensajes enviados o recibidos por el proyecto.
- **URL**: /messages/project-search/<string:nombre_proyecto>


- ```content_search()```: Recibe un archivo json con con las listas correspondientes "desired", "required" y "forbidden". Retorna los correos que calcen con las restricciones de palabras.

#POST

- ```w_messages()```: Recibe un archivo json, el cual es procesado y agregado a la base de datos en el formato establecido en ella. Posee un verificador por etapas que le indica al usuario cómo se ha desarrollado el proceso de integración. *Este método posee submétodos que son usados para la correcta implemetación del mismo.*

#DELETE

-```d_messages(id)```: Método que recibe en la url el id de un mail en particular, y lo elimina de la base de datos.
- **URL**: /messages/<string:id>

