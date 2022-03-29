# Sistema de control de asistencia (Por ingreso de datos semi-manual)

## Requisitos 😀

- Wampserver o xamp
  - php 7.0
  - apache 2.4
 
## Base de datos 👇

La base de datos se llama "control.sql", y esta estructurada de la siguiente forma:

| tablas | contenido |
| ----- | ---- |
| asistencia_entrada | id, cedula, fecha_entrada |
| asistencia_salida | id, cedula, fecha_salida |
| empleado | cedula, nombre, apellido, cargo, fecha_ingreso |
| usuario_a | user, password, correo |
| usuario_e| user, password, correo |

## Aprendiendo a generar PDF 🙌

- Generar pdf (FPDF)

👀 Este proyecto básico se realizo para la universidad.
