'use strict';

const mysql = require('mysql2');

// Configuración de la base de datos MySQL
const db = mysql.createConnection({
    host: 'b9t0gyzaum6xp5ksq9k7-mysql.services.clever-cloud.com',
    user: 'ul0cpphkjyrryloz',
    password: 'ul0cpphkjyrryloz',
    database: 'jarol_garcia'
});

// Conectar a la base de datos
db.connect((err) => {
    if (err) {
        console.error('Error al conectar a la base de datos: ', err);
        return;
    }
    console.log('Conectado a la base de datos MySQL');
});

// Exportar la conexión para poder usarla en otras partes del proyecto
module.exports = db;
