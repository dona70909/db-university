1. Selezionare tutti gli studenti iscritti al Corso di Laurea in Economia:

    SELECT `students`.`name`,`students`.`surname`, `degrees`.`name` AS `degree_name`
    FROM `degrees`
    JOIN `students`
    ON `students`.`degree_id` = `students`.`id`
    WHERE `degrees`.`name` = "Corso di Laurea in Economia";

2. Selezionare tutti i Corsi di Laurea del Dipartimento di Neuroscienze:
    SELECT `departments`.`name` AS `department` , `degrees`.`name` AS `degree_name`
    FROM `departments`
    JOIN  `degrees`
    ON  `degrees`.`department_id` = `departments`.`id`
    WHERE `departments`.`name` = "Dipartimento di Neuroscienze";

3. Selezionare tutti i corsi in cui insegna Fulvio Amato (id=44) :  
    SELECT DISTINCT `courses`.`id` AS  `course_id`, `courses`.`name` AS  `course_name` ,`teachers`.`name` AS `teacher_name` , `teachers`.`surname` AS `teacher_surname`
    FROM `courses`
    JOIN `course_teacher`
    ON 	`course_teacher`.`teacher_id` =  `courses`. `id`

    JOIN `teachers`
    ON 	`teachers`.`id` =  `course_teacher`.`teacher_id`
    WHERE 	`teachers`.`name` = "Fulvio" AND `teachers`.`surname` = "Amato"  AND `teachers`.`id` = 44;
    