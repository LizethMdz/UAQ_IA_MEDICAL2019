SELECT enfermedades_idenfermedades, s.nombsintoma,
				case  e.nombenf
				WHEN "Apendicitis"
                then group_concat(ehs.valor)
                ELSE 0
                END as 'Apendicitis',
                case  e.nombenf
				WHEN "Colitis Ulcerosa"
                then group_concat(ehs.valor)
                ELSE 0
                END as 'Colitis'
FROM enfermedades_has_sintomas ehs 
LEFT JOIN sintomas s ON s.idsintomas = ehs.sintomas_idsintomas
LEFT JOIN enfermedades e ON e.idenfermedades = ehs.enfermedades_idenfermedades
group by s.nombsintoma;


/*segunda parte*/
SELECT ehs.enfermedades_idenfermedades, s.nombsintoma, ehs.valor
FROM enfermedades_has_sintomas ehs 
LEFT JOIN sintomas s ON s.idsintomas = ehs.sintomas_idsintomas
LEFT JOIN enfermedades e ON e.idenfermedades = ehs.enfermedades_idenfermedades
WHERE e.nombenf = "Colitis Ulcerosa"
group by s.nombsintoma;

/*-------------------------*/

/*concatenar group by*/
SELECT ehs.id_enf_sint, s.nombsintoma, group_concat(ehs.valor)
FROM enfermedades_has_sintomas ehs 
INNER JOIN sintomas s ON s.idsintomas = ehs.sintomas_idsintomas
group by ehs.sintomas_idsintomas;

/**tercero*/

SELECT s.nombsintoma,
				max(case 
				WHEN e.nombenf = "Apendicitis"
                then ehs.valor
                ELSE 0
                END) as 'Apendicitis',
                max(case 
				WHEN e.nombenf = "Colitis Ulcerosa"
                then ehs.valor
                ELSE 0
                END) as 'Colitis'
FROM enfermedades_has_sintomas ehs 
LEFT JOIN sintomas s ON s.idsintomas = ehs.sintomas_idsintomas
LEFT JOIN enfermedades e ON e.idenfermedades = ehs.enfermedades_idenfermedades
group by s.nombsintoma;




/**---------------*/
/*Me trae cada sintoma con su id_enf_sint, sin repetir*/
SELECT DISTINCT s.nombsintoma, ehs.id_enf_sint
FROM enfermedades_has_sintomas ehs
LEFT JOIN sintomas s ON s.idsintomas = ehs.sintomas_idsintomas
group by s.nombsintoma
ORDER BY  ehs.id_enf_sint  ASC;




/*---------------------------------*/





/*SELECT job_id, sum(case department_id 
				WHEN 20
                then salary 
                ELSE null
                END) as 'Dep 20 ',
                sum(case department_id 
				WHEN 50
                then salary 
                ELSE null
                END) as "Dep 50 ",
                sum(case department_id 
				WHEN 80
                then salary 
                ELSE null
                END)as "Dep 80 ",
                sum(case department_id 
				WHEN 90
                then salary 
                ELSE null
                END) as "Dep 90 ",
                sum(salary) as "Total"
FROM employees
GROUP BY 1*/


