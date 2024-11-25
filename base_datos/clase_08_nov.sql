USE animes_bd;
SELECT * FROM animes; -- comentario


SELECT * FROM animes ORDER BY anno-estreno; -- orden ascdenete
SELECT * FROM animes ORDER BY anno-estreno DESC; -- orden descendete
SELECT * FROM animes WHERE titulo = "Frieren";
SELECT * FROM animes WHERE TITULO LIKE "F%"; -- IGNORAR DETRAS
SELECT * FROM animes WHERE TITULO LIKE "%n"; -- IGNORAR DELANTE
SELECT * FROM animes WHERE TITULO LIKE "%A%"; -- busca la a
SELECT * FROM animes WHERE TITULO LIKE "%frieren%"; -- busca la palabra
SELECT * FROM animes WHERE TITULO LIKE "%tragones%";

SELECT titulo, nombre_estudio, anno_estreno 
FROM animes
where anno_estreno between 2010 and 2020
order by titulo;

select * from estudios;
select * from animes;
	-- mostra titulo anime su estudio y la ciudad del estudio
select a.titulo, e.nombre_estudio, e.ciudad
	from animes  a right join estudios e -- from estudios e left join animes a
		on a.nombre_estudio = e.nombre_estudio;
-- igualamos la foreign key  con la clave primaria q se relaciona

SET AUTOCOMMIT =0; -- ESTO ES EL AEROPUERTO
/*
	COMMIT -> GUARDAR
    ROLLBACK -> VOLVER AL ULTIMO GUARDADO CARGAR PARTIDA
*/
/*
UPDATE accounts SET saldo -= 30 WHERE id = "1331;
if !ERROR
UPDATE accounts SET saldo += 30 WHERE id = "0012;
commit
*/
/*
UNA SERIES DE INSTRUCCIONES ES ATOMICA CUANDO SE 
EJECUTA COMO SI FUERA SOLAMENTE 1. SI ALGUNA DE SUS
 PARTES FALLA, TODO FALLA Y SE DESHACEN LOS CAMBIOS
*/
SET SQL_SAFE_UPDATES = 0; -- desahbilitamso el modo niños
ROLLBACK; -- para echar pa atras
insert into estudios values ("wanolo","mozambique",2024);
commit;

