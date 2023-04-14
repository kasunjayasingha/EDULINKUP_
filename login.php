<?php
session_start();
include 'includes/script.php';
include 'includes/connection.php';

// login
if (isset($_POST['loginBtn'])) {
    $username = $_POST['uname'];
    $password = $_POST['upass'];
    $userType = $_POST['utype'];

    $sql1 = "SELECT * FROM student WHERE username = '$username' AND password = '$password'";
    $sql2 = "SELECT * FROM teacher WHERE username = '$username' AND password = '$password'";
    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) {
            $uname = $row['username'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $grade = $row['grade'];
            $email = $row['email'];
            $tel = $row['telephone'];
            $address = $row['address'];

            $sql2 = "SELECT payment FROM payment WHERE sid = '$row[sid]'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $payment = $row2['payment'];
            if ($payment == "Pay") {
                $_SESSION['student_id'] = $row['sid'];
                $_SESSION['usernamestudent'] = $uname;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['grade'] = $grade;
                $_SESSION['email'] = $email;
                $_SESSION['tel'] = $tel;
                $_SESSION['address'] = $address;

                $_SESSION['statusDash'] = "Login Successful";
                $_SESSION['status_codeDash'] = "success";
                header("Location: student.php");
            } elseif ($payment == "Not Pay" || $payment == "") {
                $_SESSION['statusDash'] = "Please make your payment first";
                $_SESSION['status_codeDash'] = "warning";
                header("Location: index.php");
            }
        }
    } elseif (mysqli_num_rows($result2) > 0) {
        // $row = mysqli_fetch_assoc($result);
        while ($row = mysqli_fetch_assoc($result2)) {
            $_SESSION['usernameteacher'] = $row['username'];
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['lname'] = $row['lname'];
            $_SESSION['grade'] = $row['grade'];
            $_SESSION['teacher_id'] = $row['tid'];
            $_SESSION['statusDash'] = "Login Successful";
            $_SESSION['status_codeDash'] = "success";
            header("Location: teacher.php");
        }

    } else {
        $_SESSION['statusDash'] = "Login Failed";
        $_SESSION['status_codeDash'] = "error";
        header("Location: index.php");
    }

}
mysqli_close($conn);
