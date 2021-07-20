<?php
                // echo "hi";

            if(isset($_POST['create_exam'])){

                // echo "hi there";
                $school_id = $row['school_id'];
                $exam_type = "";
                $exam_date = $_POST['date'];
                $exam_start = "";
                $exam_duration = "";
                $std = $_POST['std'];
                $div = $_POST['div'];
                $subject = $_POST['subject'];
                $teacher_user_id = $row['emp_id'];
                $creator = $row['emp_id'];

                $exam_query = "INSERT INTO `exams`( `school_id`, `exam_type_id`, `exam_date`, `exam_start_time`, `exam_duration`, `class_id`, `section_id`, `subject_id`, `teacher_user_id`, `exam_creator`) 
                VALUES ('$school_id', '$exam_type', '$exam_date', '$exam_start', '$exam_duration', '$std', '$div', '$subject', '$teacher_user_id', '$creator')";

                $exam_result = mysqli_query($conn, $exam_query);
            }

        ?>