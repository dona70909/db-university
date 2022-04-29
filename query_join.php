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

5. Selezionare tutti i corsi di laurea con i relativi corsi e insegnanti   
    SELECT `degrees`.`name` AS `degree`, `courses`.`name` AS `course`, `teachers`.`name` AS `teachers_name`,`teachers`.`surname` AS `teachers_surname`
    FROM `degrees`
    RIGHT JOIN `courses`
    ON `degrees`.`id` = `courses`.`degree_id`

    RIGHT JOIN `course_teacher`
    ON  `courses`.`id` = `course_teacher`.`course_id`  

    RIGHT JOIN `teachers`
    ON `course_teacher`.`teacher_id`  =  `teachers`.`id`;

6. Selezionare tutti i docenti che insegnano nel Dipartimento di Matematica (54) :

    SELECT `teachers`.`name` AS `teachers_name`,`teachers`.`surname` AS `teachers_surname`

    FROM `departments`
    RIGHT JOIN `degrees`
    ON `departments`.`id` = `degrees`.`department_id` 

    RIGHT JOIN `courses`
    ON `degrees`.`id` = `courses`.`degree_id`

    RIGHT JOIN `course_teacher`
    ON  `courses`.`id` = `course_teacher`.`course_id`  

    RIGHT JOIN `teachers`
    ON `course_teacher`.`teacher_id`  =  `teachers`.`id`

    WHERE `departments`.`name` = "Dipartimento di Matematica";

    ORDER BY `teachers`.`surname`;

7. Selezionare per ogni studente quanti tentativi d’esame ha sostenuto per
superare ciascuno dei suoi esami :  

SELECT 
COUNT(`exam_student`.`exam_id`) AS `exam_failed_number`,
`students`.`name` AS `student_name`,
`students`.`surname` AS `student_surname`,
`courses`.`name` AS  `course_name`  

FROM `courses`
RIGHT JOIN `exams`
ON `courses`.`id` = `exams`.`course_id`

RIGHT JOIN `exam_student`
ON `exams`.`id`	=`exam_student`.`exam_id`

RIGHT JOIN `students`
ON `exam_student`.`student_id`= `students`.`id`

WHERE `exam_student`.`vote` < 18
GROUP BY  `student_name`, `student_surname`,`course_name`
ORDER BY `student_surname`, `student_name`;