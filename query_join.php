1. Selezionare tutti gli studenti iscritti al Corso di Laurea in Economia:

    SELECT `students`.`name`,`students`.`surname`, `degrees`.`name` AS `degree_name`
    FROM `degrees`
    RIGHT JOIN `students`
    ON `students`.`degree_id` = `students`.`id`
    WHERE `degrees`.`name` = "Corso di Laurea in Economia";

2. Selezionare tutti i Corsi di Laurea del Dipartimento di Neuroscienze:
    SELECT `departments`.`name` AS `department` , `degrees`.`name` AS `degree_name`
    FROM `departments`
    LEFT JOIN  `degrees`
    ON  `degrees`.`department_id` = `departments`.`id`
    WHERE `departments`.`name` = "Dipartimento di Neuroscienze";

3. Selezionare tutti i corsi in cui insegna Fulvio Amato (id=44) :  
    SELECT DISTINCT `courses`.`id` AS  `course_id`, `courses`.`name` AS  `course_name` ,`teachers`.`name` AS `teacher_name` , `teachers`.`surname` AS `teacher_surname`
    FROM `courses`
    LEFT JOIN `course_teacher`
    ON 	`course_teacher`.`teacher_id` =  `courses`. `id`

    JOIN `teachers`
    ON 	`teachers`.`id` =  `course_teacher`.`teacher_id`
    WHERE 	`teachers`.`name` = "Fulvio" AND `teachers`.`surname` = "Amato"  AND `teachers`.`id` = 44;

4. Selezionare tutti gli studenti con i dati relativi al corso di laurea a cui sono iscritti e il
relativo dipartimento, in ordine alfabetico per cognome e nome:

    SELECT DISTINCT `students`.`name`, `students`.`surname`, `degrees`.`name` AS `degree_name`, `departments`.`name`AS `department_name`
    FROM `departments`
    RIGHT JOIN `degrees`
    ON  `departments`.`id` = `degrees`.`department_id`  
    RIGHT JOIN `students`
    ON `degrees`.`id` = `students`.`degree_id`
    ORDER BY  `students`.`surname`  ASC, `students`.`name` ASC;