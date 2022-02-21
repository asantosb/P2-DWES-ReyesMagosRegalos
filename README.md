# P2_DWES_ReyesMagosRegalos

Melchor, Gaspar y Baltasar quieren modernizarse estas Navidades y nos piden que les hagamos una base de datos para controlar las entregas de regalos a los niños. Los datos a guardar de cada niño son: nombre, apellidos, fecha de nacimiento, y si han sido buenos o malos. Se adjunta la lista de regalos disponibles para pedir este año, sabiendo que cada niño puede elegir varios regalos de la lista y que varios niños pueden escoger el mismo regalo. Cada regalo tiene asignado uno de los Reyes Magos (Rey Mago es una entidad aparte).

Los datos que no aparezcan explícitamente en las tablas se pueden inventar (por ejemplo, a qué rey mago pertenece cada regalo o los regalos que han pedido cada niño).

Se pide:

1.Hacer el Diagrama de Entidad - Relación (ERD), y el Esquema Relacional (ER).
2.Crear la base de datos en phpmyadmin.
3.Crear una aplicación web en PHP que muestre las siguientes consultas sobre la base de datos:
a)Datos de los niños (ninos.php). Aparece en una tabla ordenados alfabéticamente por nombre. Debe permitir añadir, modificar y borrar niños.
b)Datos de los regalos (regalos.php). Debe permitir añadir, modificar y borrar regalos.
c)Formulario de búsqueda (busqueda.php). Incluye un desplegable donde se puede seleccionar el niño, y llevará a una lista con los regalos que ha pedido dicho niño. A su vez debajo de la lista aparecerá otro formulario que permita seleccionar otro regalo para el niño. Sólo se permite añadir más regalos, no editar los regalos ya elegidos. Aquí no tenemos en cuenta cómo se ha portado el niño. No debe permitir añadir dos veces el mismo regalo al mismo niño.
d)Datos de los Reyes Magos (reyes.php). Aparecen 3 tablas, una por cada Rey Mago, con los datos de los regalos que tiene que entregar cada rey mago. Las tablas tienen 2 columnas: Regalo y Niño. Al pie de cada tabla aparece el total de dinero que se ha gastado cada Rey Mago. Aquí sí tenemos en cuenta cómo se ha portado el niño.
4.La funcionalidad (incluidas las consultas a base de datos) deberá programarse en clases (Niños, Reyes y Regalos), a las cuales llamarán los apartados descritos en el punto 3.
5.La conexión a base de datos estará en un método de una clase (en un único archivo) diferente a las 3 anteriores. La base de datos se llamará studium_dws_p2, el usuario será studium y la contraseña studium__
