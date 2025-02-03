-- Muestra los nombres, teléfonos y DNI de todos los trabajadores.

SELECT dni,name,phone FROM persons;

-- Buscar los nombres de los técnicos que han trabajado más de 6 meses
SELECT name FROM technicians WHERE months > 6;

-- Listar conserjes de una categoría específica ('A' por ejemplo)

SELECT * FROM janitors WHERE category LIKE '%conserje%';

-- Encontrar todos los departamentos y el número mínimo de trienios de sus profesores

SELECT d.department_id, d.name AS department_name, MIN(t.trienniums) AS min_trienniums
FROM departments d
JOIN teachers t ON d.teacher_id = t.teacher_id
GROUP BY d.department_id, d.name;


-- Mostrar todos los profesores y el departamento al que pertenecen

SELECT t.teacher_id, p.name AS teacher_name, d.name AS department_name
FROM teachers t
JOIN persons p ON t.dni = p.dni
LEFT JOIN departments d ON t.teacher_id = d.teacher_id;

-- Buscar personas cuyo teléfono comience con '6'

SELECT * FROM persons WHERE phone LIKE '6%';

-- Listar todos los profesores que no tienen trienios registrados
SELECT * FROM teachers
WHERE trienniums IS NULL;


-- Listar todos los conserjes ordenados por categoría alfabéticamente
SELECT * FROM janitors ORDER BY category;