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
    