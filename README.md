# clothick

# NOTAS

Este formulario se ha realizado con ayuda de Bootsrap 5.0.

# Funcionalidad

El formulario se abre pulsando sobre el botón "Únete" que se encuentra en la parte central de la pagina.
El formulario consta de los siguientes campos:

- Nombre y Apellidos (Required). Compuesto como máximo por dos palabras. El programa no deja al usuario introducir una tercera palabra.
- Correo electrónico (Requiered).
- Contraseña de acceso (Required). Se utiliza un bucle for y un if para hacer que se cumplan las siguiente características:

  --La contraseña debe tener al menos 8 caracteres
  --La contraseña debe tener al menos una letra minúscula, una mayúscula, un numero y un símbolo.

- Confirmación de contraseña (Required). Repetir la clave introducida en el apartado anterior. De no coincidir lanzaría un error.
- Sexo (Opcional). Un input radio con 3 opciones, una iniciada "checked" para evitar comprobaciones de campo vacio.
- Fecha de nacimiento (Opcional). Se utiliza un imput Date.
- Dirección (Opcional)
- País (Opcional) Se ha utilziado un selector.
- Número de tarjeta de crédito (Opcional). Se indica en el formulario que el campo se hará visible cuando se cumplan ciertas condiciones, y este se muestra usando el display none/block. El programa limita los caracteres que se pueden introducir, y formatea automáticamente añadiendo guiones cada cuatro números.
- Casilla de verificación "Activar notificaciones de la pagina"
- Casilla de verificación "Recepción de la revista digital"

# WCAG 2.0

Estas son las recomendaciones WCAG 2.0 implementadas en el formulario :

- Utiliza controles de formulario de forma estándar indicando correctamente su nombre, valor y estado

- No limites el tiempo que el usuario dispone para completar un formulario, o dispón de un mecanismo para anular o ampliar el límite de tiempo

- Proporciona un botón de tipo "submit" para iniciar un cambio de contexto. Si un control de formulario provoca un cambio de contexto debes informar de ello previamente
- Indica si un campo es obligatorio en el `LABEL` asociado al campo, por ejemplo mediante un texto "(obligatorio)" o mediante un asterisco explicando su significado al comienzo del formulario
- Proporciona descripciones textuales (no un mero asterisco o cambio de color) para identificar los campos obligatorios que no fueron completados
- Cuando se produzca un error de validación proporciona una descripción textual
- Valida los campos en cliente advirtiendo del error y devolviendo el foco al campo que produjo el error
- Los campos que requieran un formato de datos concreto (fechas, nº de cuenta, etc.) deben tener asociada información sobre el formato esperado o un ejemplo
- Debe ser evidente el campo que tiene el foco, por ejemplo el agente de usuario debe mostrar la barra vertical parpadeante en el punto de inserción de contenido de un campo de texto o puntear el contorno de los radios y checks
- ada control de formulario debe tener una etiqueta visible inmediatamente después en el caso de los radios y checks e inmediantemente delante
- Utiliza elementos `LABEL` para asociar etiquetas a los controles del formulario. Asócialos de forma explícita
- Cuando un botón está asociado a un control de formulario (por ejemplo un campo de texto más un botón "buscar") el botón debe situarse inmediatamente después del campo. El campo no tiene porque tener etiqueta (de este modo se evita contenido repetido en la página) pero el texto del botón debe ser muy claro puesto que sirve tambień de etiqueta para el control
- Los nombres, etiquetas, etc. deben ser consistentes para el contenido con una misma funcionalidad
- Informa convenientemente de que el formulario se ha enviado con éxito
- Agrupa semánticamente los controles relacionados, especialmente los radio y checks mediante `FIELDSET` y `LEGEND`
- Usa eventos independientes del dispositivo, ofreciendo de forma redundante eventos de teclado y ratón
- Identifica los campos obligatorios mediante la propiedad `REQUIRED`
- Identifica el rango de valores válido mediante las propiedades `VALUEMIN` y `VALUEMAX`
