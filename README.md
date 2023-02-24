# trabajoservidor

Funcionamiento:

Esta web esta diseñada para la gestion fisica de un centro de estetica o una peluqueria. Primero se debera elegir entre el tipo de perfil de trabajador que es
ya sea recepcionista o gerente una vez accedido nos mandara a la siguiente pestaña en la cual nos apareceran todos los centros disponibles para gestionarlos. Una vez
Elegido el centro nos aparecera todo lo relacionado con el es decir los clientes y los tipo de tratamientos que tengan. Por lo que si se crea un cliente dentro
de un centro se le asignara ese mismo.

Para hacer toda la parte del tipo de administrador y para saber en que centro se encuentra en cada momento hemos utilizado sessiones. Creando una session con el tipo
de admin y otra con el id del centro al que se accede.

No se puede crear mas de un tratamiento el mismo dia para el mismo cliente como pone en el enunciado.

Al añadir un cliente nuevo existe la opcion de poder tambien añadirle un tratamiento.


## Importante hacer las migraciones, seeders y ejecutar el comando [ npm run dev ], ya que hemos instalado un tema the bootswatch.



