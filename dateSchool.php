<?php
/**
 *  1. Create arrays of lessons, pupils, teachers, supervisors and director with names
 */
$lessons = array(
         array('room' => 10, 'name' => 'Алгебра', 'date' =>20180201),
         array('room' => 2, 'name' => 'Геометрия','date' =>20180201),
         array('room' => 13, 'name' => 'Физика', 'date' =>20180201),
         array('room' => 11, 'name' => 'География', 'date' =>20180201),
         array('room' => 5, 'name' => 'Химия', 'date' =>20180201),
         array('room' => 6, 'name' => 'ДПЮ', 'date' =>20180202),
         array('room' => 3, 'name' => 'Украинский язык', 'date' =>20180202),
         array('room' => 8, 'name' => 'Украинская литература', 'date' =>20180202),
         array('room' => 11, 'name' => 'Зарубежная литература', 'date' =>20180202),
         array('room' => 10, 'name' => 'Физкультура', 'date' =>20180203),
         array('room' => 4, 'name' => 'Биология', 'date' =>20180203),
         array('room' => 2, 'name' => 'История Украины', 'date' =>20180203),
         array('room' => 13, 'name' => 'Английский язык', 'date' =>20180203),
         array('room' => 14, 'name' => 'Астрономия', 'date' =>20180203),
    );


$arr_pupils_names = array('Бабченко', 'Волобуев', 'Горячев', 'Горовой', 'Гендина', 'Жижа', 'Ильяшенко', 'Каранда', 'Калевич',
    'Калайдова', 'Куманцев', 'Левенок', 'Лободюк', 'Лукаш', 'Мащенко', 'Песоцкий', 'Поталов', 'Сидорук', 'Пузиков',
    'Клименко', 'Шрамченко', 'Опара', 'Чернобублик', 'Шипиленко', 'Лютый', 'Кревсун', 'Локоть', 'Цыба', 'Табакарь');

$arr_teachers_names = array('Бабена', 'Кисель', 'Горян-тиран', 'Шиптя', 'Скварча', 'Лымарева', 'Берестовская');

$arr_supervisors_names = array('Песоцкая', 'Неелова', 'Гатайский', 'Лепешкин', 'Петренко');

$director = "Шпаков";

/**
 * 2. Create array of pupils with id and put him in the function
 * @return array
 */

function array_for_all_teachers()
{
    $arr_pupils_id = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29);
    /**
     *  2.1 Take the random keys from array $arr_pupils_id
     */
    $rand_keys = array_rand($arr_pupils_id, 10);
    /**
     * 2.2 Use cycle "FOR" to get new array with 10 random pupils
     */
    $arr_rand_pupils = array();
    for ($it1 = 0; $it1 < 10; $it1++) {
        $arr_rand_pupils[$it1] = $arr_pupils_id[$rand_keys[$it1]];// функция, которая выбирает 10 случайных учеников из массива $arr_pupils_id
    }
    return $arr_rand_pupils;
}

/**
 * 3. Thanks the function "array_for_all_teachers" we filled the array '$arr_teachers' with 7 arrays of pupils
 */
$arr_teachers = array();
for ($it2 = 0; $it2 < 7; $it2++) {
    $repeat_arr = array_for_all_teachers();
    $arr_teachers[$it2] = $repeat_arr;
}


/**
 *  3. Create big array where teachers get their pupils in the classes
 */
$teachers_pupils = array("teachers" => array(

    array('id' => 1, "Name" => 'Бабена', "pupils" => array(

        array('id' => $arr_teachers[0][0]),
        array('id' => $arr_teachers[0][1]),
        array('id' => $arr_teachers[0][2]),
        array('id' => $arr_teachers[0][3]),
        array('id' => $arr_teachers[0][4]),
        array('id' => $arr_teachers[0][5]),
        array('id' => $arr_teachers[0][6]),
        array('id' => $arr_teachers[0][7]),
        array('id' => $arr_teachers[0][8]),
        array('id' => $arr_teachers[0][9]),

    )
    ),

    array('id' => 2, "Name" => 'Кисель', "pupils" => array(

        array('id' => $arr_teachers[1][0]),
        array('id' => $arr_teachers[1][1]),
        array('id' => $arr_teachers[1][2]),
        array('id' => $arr_teachers[1][3]),
        array('id' => $arr_teachers[1][4]),
        array('id' => $arr_teachers[1][5]),
        array('id' => $arr_teachers[1][6]),
        array('id' => $arr_teachers[1][7]),
        array('id' => $arr_teachers[1][8]),
        array('id' => $arr_teachers[1][9]),
    )
    ),

    array('id' => 3, "Name" => 'Горян-тиран', "pupils" => array(

        array('id' => $arr_teachers[2][0]),
        array('id' => $arr_teachers[2][1]),
        array('id' => $arr_teachers[2][2]),
        array('id' => $arr_teachers[2][3]),
        array('id' => $arr_teachers[2][4]),
        array('id' => $arr_teachers[2][5]),
        array('id' => $arr_teachers[2][6]),
        array('id' => $arr_teachers[2][7]),
        array('id' => $arr_teachers[2][8]),
        array('id' => $arr_teachers[2][9]),
    )
    ),

    array('id' => 4, "Name" => 'Шиптя', "pupils" => array(

        array('id' => $arr_teachers[3][0]),
        array('id' => $arr_teachers[3][1]),
        array('id' => $arr_teachers[3][2]),
        array('id' => $arr_teachers[3][3]),
        array('id' => $arr_teachers[3][4]),
        array('id' => $arr_teachers[3][5]),
        array('id' => $arr_teachers[3][6]),
        array('id' => $arr_teachers[3][7]),
        array('id' => $arr_teachers[3][8]),
        array('id' => $arr_teachers[3][9]),
    )
    ),

    array('id' => 5, "Name" => 'Скварча', "pupils" => array(

        array('id' => $arr_teachers[4][0]),
        array('id' => $arr_teachers[4][1]),
        array('id' => $arr_teachers[4][2]),
        array('id' => $arr_teachers[4][3]),
        array('id' => $arr_teachers[4][4]),
        array('id' => $arr_teachers[4][5]),
        array('id' => $arr_teachers[4][6]),
        array('id' => $arr_teachers[4][7]),
        array('id' => $arr_teachers[4][8]),
        array('id' => $arr_teachers[4][9]),
    )
    ),

    array('id' => 6, "Name" => 'Лымарева', "pupils" => array(

        array('id' => $arr_teachers[5][0]),
        array('id' => $arr_teachers[5][1]),
        array('id' => $arr_teachers[5][2]),
        array('id' => $arr_teachers[5][3]),
        array('id' => $arr_teachers[5][4]),
        array('id' => $arr_teachers[5][5]),
        array('id' => $arr_teachers[5][6]),
        array('id' => $arr_teachers[5][7]),
        array('id' => $arr_teachers[5][8]),
        array('id' => $arr_teachers[5][9]),
    )
    ),

    array('id' => 7, "Name" => 'Берестовская', "pupils" => array(

        array('id' => $arr_teachers[6][0]),
        array('id' => $arr_teachers[6][1]),
        array('id' => $arr_teachers[6][2]),
        array('id' => $arr_teachers[6][3]),
        array('id' => $arr_teachers[6][4]),
        array('id' => $arr_teachers[6][5]),
        array('id' => $arr_teachers[6][6]),
        array('id' => $arr_teachers[6][7]),
        array('id' => $arr_teachers[6][8]),
        array('id' => $arr_teachers[6][9])
    )
    )
)
);


$link = mysqli_connect('localhost', 'root', '', 'NewSchool');

if ($link == false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

/**
 * 4. Get necessary dates from array $teachers_pupils with help circle "FOREACH" and put them into DATABASE in MYSQL
 */
foreach ($teachers_pupils as $num_teachers) {
    foreach ($num_teachers as $data_teachers) {
        foreach ($data_teachers as $data_pupils) {
            foreach ($data_pupils as $pupils) {

                $connect = "INSERT INTO connect_pupils_teachers (pupils_id, teachers_id) VALUES ($pupils[id], $data_teachers[id])";
                if (mysqli_query($link, $connect)) {
                    echo "<br> Records inserted successfully.";
                } else {
                    echo "<br> ERROR: Could not able to execute $connect. " . mysqli_error($link);
                }
            }
        }
    }
}

/**
 * 5. Get necessary dates from array $arr_pupils_names with help circle "FOREACH" and put them into DATABASE in MYSQL
 */

foreach ($arr_teachers_names as $name) {

    $connect = "INSERT INTO teachers (Name) VALUES ('$name')";

    if (mysqli_query($link, $connect)) {
        echo "<br> Records inserted successfully.";
    } else {
        echo "<br> ERROR: Could not able to execute $connect. " . mysqli_error($link);
    }
}

/**
 * 6. Get necessary dates from array $arr_pupils_names with help circle "FOREACH" and put them into DATABASE in MYSQL
 */

foreach ($arr_pupils_names as $name) {
    $connect = "INSERT INTO pupils (Name) VALUES ('$name')";

    if (mysqli_query($link, $connect)) {
        echo "<br> Records inserted successfully.";
    } else {
        echo "<br> ERROR: Could not able to execute $connect. " . mysqli_error($link);
    }

}

/**
 * 6. Get necessary dates from array $arr_pupils_names with help circle "FOREACH" and put them into DATABASE in MYSQL
 */


foreach ($arr_supervisors_names as $name) {
    $connect = "INSERT INTO supervisors (Name) VALUES ('$name')";

    if (mysqli_query($link, $connect)) {
        echo "<br> Records inserted successfully.";
    } else {
        echo "<br> ERROR: Could not able to execute $connect. " . mysqli_error($link);
    }
}

/**
 * 7. Put value of $director into DATABASE in MYSQL
 */

$connect = "INSERT INTO director (Name) VALUES ('$director')";

if (mysqli_query($link, $connect)) {
    echo "<br> Records inserted successfully.";
} else {
    echo "<br> ERROR: Could not able to execute $connect. " . mysqli_error($link);
}


/**
 *  8. Create big array where supervisors get their teachers
 */

$supervisors_teachers = array(array('Name' => 'Песоцкая', 'id' => 1, teachers => array(
    array('id' => 2),
    array('id' => 4)
)
),
    array('Name' => 'Нееелова', 'id' => 2, teachers => array(
        array('id' => 7)
    )
    ),

    array('Name' => 'Гатайский', 'id' => 3, teachers => array(
        array('id' => 3),
        array('id' => 5),
    )
    ),

    array('Name' => 'Лепешкин', 'id' => 4, teachers => array(
        array('id' => 1),
    )
    ),

    array('Name' => 'Петренко', 'id' => 5, teachers => array(
        array('id' => 6),
    )
    ),


);

/**
 * 9. Get necessary dates from array $supervisors_teachers with help circle "FOREACH" and put them into DATABASE in MYSQL
 */

foreach ($supervisors_teachers as $supervisors_dates) {
    foreach ($supervisors_dates as $dates_teachers) {
        foreach ($dates_teachers as $teachers_id) {

            $connect = "INSERT INTO connect_teachers_supervisors (teachers_id, supervisors_id) 
VALUES ($teachers_id[id], $supervisors_dates[id])";

            if (mysqli_query($link, $connect)) {
                echo "<br> Records inserted successfully.";
            } else {
                echo "<br> ERROR: Could not able to execute $connect. " . mysqli_error($link);
            }

        }
    }
}

//10. Вставим уроки в таблицу lessons в БД с полями: день, название урока, номер кабинета.

foreach ($lessons as $lesson) {

        $connect = mysqli_query($link, "INSERT INTO lessons (Name, Room, Date) VALUES ('$lesson[name]','$lesson[room]', $lesson[date])");

        if (mysqli_query($link, $connect)) {
            echo "<br> Records inserted successfully.";
        } else {
            echo "<br> ERROR: Could not able to execute $connect. " . mysqli_error($link);
        }
    }




//11. Соединяем таблицы teachers и pupils по полям Name с помощью связующей таблицы connect_pupils_teachers
// и выбираем с них соответствующие записи. Для этого прописуем их id. Но лучше этот вызов делать внутри самого PHPMyAdmin

$result = mysqli_query($link, 'SELECT teachers.Name, pupils.Name
FROM  ((teachers
JOIN connect_pupils_teachers ON teachers.teachers_id = connect_pupils_teachers.teachers_id )
JOIN pupils ON connect_pupils_teachers.pupils_id = pupils.pupils_id)');


if (!$result) {//если не будет соединения с базой данных (таблицей teachers), то выведет Ошибка
    echo 'Ошибка: '
        . mysqli_connect_errno()
        . ':'//это тернарный оператор означающий "ИЛИ ТОГДА(ИНАЧЕ)"
        . mysqli_connect_error();
}
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);


//Сделаем таблицу с строками

echo "<table>";
foreach ($rows as $key => $value) {//через цикл foreach проверяем массив с именем rows, где переменной key из массива присваиваем значение value
    echo "<tr style='color:red'>";
    foreach ($value AS $columnName => $columnValue) {
        echo "<td>" . $columnValue . "</td>";
    }
    echo "</tr>";
}
echo "</table>";


