# usar base de datos
USE micms;

#crear administrador
INSERT INTO administrador VALUES(
	null,
    'Oscar Herrera',
    'oscar.herrera@aulamatriz.edu.co',
    aes_encrypt('123456', 'M1Cm520**-!'),
    1
);

#Mostrar administradores
SELECT * FROM administrador;

#actualizar
UPDATE administrador SET nombre = 'Oscar M Herrera', estado = 0 WHERE adid = 1;

#delete
DELETE FROM administrador WHERE adid = 2;

	

    
