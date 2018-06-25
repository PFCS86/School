<?php

/**
 * @param $db
 * @param $visitor
 */
function pageForDirector($db, $visitor)
{
    if ($visitor['role'] == 'Директор') {
        $director = mysqli_query($db, "SELECT teachers.Name, pupils.Name
FROM  ((teachers
JOIN connect_pupils_teachers ON teachers.teachers_id = connect_pupils_teachers.teachers_id )
JOIN pupils ON connect_pupils_teachers.pupils_id = pupils.pupils_id) ");

        if (!$director) {
            echo 'Ошибка: '
                . mysqli_connect_errno()
                . ':'
                . mysqli_connect_error();
        }

        $rows = mysqli_fetch_all($director, MYSQLI_ASSOC);


        echo "<table>";
        foreach ($rows as $value) {
            echo "<tr style='color:red'>";
            foreach ($value AS $columnName => $columnValue) {
                echo "<td>" . $columnValue . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } elseif ($visitor['role'] == 'Учитель') {
        {
            $teacher = mysqli_query($db, "SELECT teachers.Name, pupils.Name
FROM  ((teachers
INNER JOIN connect_pupils_teachers ON teachers.teachers_id = connect_pupils_teachers.teachers_id )
INNER JOIN pupils ON connect_pupils_teachers.pupils_id = pupils.pupils_id) ");
        }

        if (!$teacher) {
            echo 'Ошибка: '
                . mysqli_connect_errno()
                . ':'
                . mysqli_connect_error();
        }

        $rows = mysqli_fetch_all($teacher, MYSQLI_ASSOC);


        echo "<table>";
        foreach ($rows as $value) {
            echo "<tr style='color:red'>";
            foreach ($value AS $columnName => $columnValue) {
                echo "<td>" . $columnValue . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } elseif ($visitor['role'] == 'Зауч') {
        {
            $supervisor = mysqli_query($db, "SELECT supervisors.Name, teachers.Name
 FROM ((supervisors
 INNER JOIN connect_teachers_supervisors ON supervisors.supervisors_id = connect_teachers_supervisors.supervisors_id)
 INNER JOIN teachers ON teachers.teachers_id = connect_teachers_supervisors.teachers_id)");
        }

        if (!$supervisor) {
            echo 'Ошибка: '
                . mysqli_connect_errno()
                . ':'
                . mysqli_connect_error();
        }

        $rows = mysqli_fetch_all($supervisor, MYSQLI_ASSOC);


        echo "<table>";
        foreach ($rows as $value) {
            echo "<tr style='color:red'>";
            foreach ($value AS $columnName => $columnValue) {
                echo "<td>" . $columnValue . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}


