<?php
include 'includes/security.php';
include 'includes/connection.php';

// register admin profile
if (isset($_POST["regbtn"])) {
    $fname = $_POST["ufname"];
    $ulname = $_POST["ulname"];
    $uemail = $_POST["uemail"];
    $upass = $_POST["upass"];
    $uusername = $_POST["uusername"];
    $sql = "INSERT INTO admin (fname, lname, username, email, password)
     VALUES ('$fname', '$ulname', '$uusername', '$uemail', '$upass')";

    if (mysqli_query($conn, $sql)) {

        $_SESSION['status'] = "Admin Profile Added";
        $_SESSION['status_code'] = "success";
        header("Location: register.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        $_SESSION['status'] = "Admin Profile Not Added";
        $_SESSION['status_code'] = "error";
        header("Location: register.php");
    }

}
// Update admin profile
if (isset($_POST['updatebtn'])) {
    $edit_fname = $_POST["edit_fname"];
    $edit_lname = $_POST["edit_lname"];
    $edit_email = $_POST["edit_email"];
    $edit_pass = $_POST["edit_pass"];
    $edit_username = $_POST["edit_username"];

    $sql = "UPDATE admin SET fname = '$edit_fname', lname = '$edit_lname', email = '$edit_email', password = '$edit_pass', username = '$edit_username' WHERE id = '$_SESSION[id]'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Admin Profile Updated Successfully";
        $_SESSION['status_code'] = "success";
        header("Location: register.php");
    } else {
        $_SESSION['status'] = "Admin Profile Not Updated";
        $_SESSION['status_code'] = "error";
        header("Location: register.php");
    }
    unset($_SESSION['id']);

}
// Delete admin profile
if (isset($_POST['deleteBtn'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM admin WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Admin Profile Deleted Successfully";
        $_SESSION['status_code'] = "success";
        header("Location: register.php");
    } else {
        $_SESSION['status'] = "Admin Profile Not Deleted";
        $_SESSION['status_code'] = "error";
        header("Location: register.php");
    }
}

// Login admin profile
if (isset($_POST['loginBtn'])) {
    $email_login = $_POST['login_email'];
    $password_login = $_POST['login_pass'];

    $query = "SELECT * FROM admin WHERE email='$email_login' AND password='$password_login' ";
    $query_run = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_array($query_run)) {
        if ($row > 0) {
            $_SESSION['username'] = $row['username'];
            header('Location: index.php');
        }

    } else {
        $_SESSION['status'] = "Email / Password is Invalid";
        $_SESSION['status_code'] = "error";
        header('Location: login.php');
    }
}

// Logout admin profile
if (isset($_POST['logoutBtn'])) {

    unset($_SESSION['username']);
    session_destroy();
    header('Location: login.php');
}

// Add class
if (isset($_POST['addclassbtn'])) {
    $grade = $_POST['addclass'];
    echo $grade;

    $sql = "INSERT INTO grade (grade) VALUES ('$grade')";

    if (mysqli_query($conn, $sql)) {

        $_SESSION['status'] = "Grade Added";
        $_SESSION['status_code'] = "success";
        header("Location: add_class.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        $_SESSION['status'] = "Grade Not Added";
        $_SESSION['status_code'] = "error";
        header("Location: add_class.php");
    }
}

// update class
if (isset($_POST['updateclassbtn'])) {
    $edit_grade = $_POST["editclass"];

    $sql = "UPDATE grade SET grade = '$edit_grade' WHERE gid = '$_SESSION[gid]'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Grade Updated Successfully";
        $_SESSION['status_code'] = "success";
        header("Location: add_class.php");
    } else {
        $_SESSION['status'] = "Grade Not Updated";
        $_SESSION['status_code'] = "error";
        header("Location: add_class.php");
    }
    unset($_SESSION['gid']);

}

// Delete class
if (isset($_POST['deleteclassBtn'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM grade WHERE gid = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Grade Deleted Successfully";
        $_SESSION['status_code'] = "success";
        header("Location: add_class.php");
    } else {
        $_SESSION['status'] = "Grade Not Deleted";
        $_SESSION['status_code'] = "error";
        header("Location: add_class.php");
    }
}

// add student
if (isset($_POST['regstudentbtn'])) {
    $fname = $_POST["ufname"];
    $lname = $_POST["ulname"];
    $email = $_POST["uemail"];
    $utel = $_POST["utel"];
    $uwhatsapp = $_POST["uwhatsapp"];
    $uaddress = $_POST["uaddress"];
    $ugender = $_POST["ugender"];
    $ugrade = $_POST["ugrade"];
    $username = $_POST["uusername"];
    $password = $_POST["upass"];

    $sql = "INSERT INTO student (fname, lname, email, telephone, whatsapp, address, gender, grade, username, password)
     VALUES ('$fname', '$lname', '$email', '$utel', '$uwhatsapp', '$uaddress', '$ugender', '$ugrade',  '$username', '$password')";

    if (mysqli_query($conn, $sql)) {
        $sID = mysqli_insert_id($conn);
        $sql2 = "INSERT INTO payment (sid, fname, lname, email, grade) VALUES ('$sID', '$fname', '$lname', '$email', '$ugrade')";

        if (mysqli_query($conn, $sql2)) {
            $sql3 = "INSERT INTO marks (sid, fname, lname, email, grade) VALUES ('$sID', '$fname', '$lname', '$email', '$ugrade')";
            if (mysqli_query($conn, $sql3)) {
                $_SESSION['status'] = "Student Profile Added Successfully";
                $_SESSION['status_code'] = "success";
                header("Location: register_student.php");
            } else {
                echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
                $_SESSION['status'] = "Student Profile Not Added";
                $_SESSION['status_code'] = "error";
                header("Location: register_student.php");
            }

        }
    }

}

// update student
if (isset($_POST['updateStudentBtn'])) {
    $ufname = $_POST["ufname"];
    $ulname = $_POST["ulname"];
    $uemail = $_POST["uemail"];
    $utel = $_POST["utel"];
    $uwhatsapp = $_POST["uwhatsapp"];
    $uaddress = $_POST["uaddress"];
    $ugender = $_POST["ugender"];
    $ugrade = $_POST["ugrade"];
    $uusername = $_POST["uusername"];
    $upass = $_POST["upass"];

    $sql = "UPDATE student SET
     fname = '$ufname', lname = '$ulname', email = '$uemail', telephone = '$utel', whatsapp = '$uwhatsapp', address = '$uaddress', gender = ' $ugender', grade = '$ugrade', username = '$uusername', password = '$upass' WHERE sid = '$_SESSION[sid]'";

    if (mysqli_query($conn, $sql)) {
        $sql2 = "UPDATE payment SET fname = '$ufname', lname = '$ulname', email = '$uemail', grade = '$ugrade' WHERE sid = '$_SESSION[sid]'";
        if (mysqli_query($conn, $sql2)) {
            $sql3 = "UPDATE marks SET fname = '$ufname', lname = '$ulname', email = '$uemail', grade = '$ugrade' WHERE sid = '$_SESSION[sid]'";
            if (mysqli_query($conn, $sql3)) {
                $_SESSION['status'] = "Student Profile Updated Successfully";
                $_SESSION['status_code'] = "success";
                header("Location: register_student.php");
            } else {
                $_SESSION['status'] = "Student Profile Not Updated";
                $_SESSION['status_code'] = "error";
                header("Location: register_student.php");
            }
        }
        unset($_SESSION['sid']);
    }
}

// Delete student
if (isset($_POST['deletestudentBtn'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM student WHERE sid = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sql2 = "DELETE FROM payment WHERE sid = '$id'";
        if (mysqli_query($conn, $sql2)) {
            $sql3 = "DELETE FROM marks WHERE sid = '$id'";
            if (mysqli_query($conn, $sql3)) {
                $_SESSION['status'] = "Student Profile Deleted Successfully";
                $_SESSION['status_code'] = "success";
                header("Location: register_student.php");
            } else {
                $_SESSION['status'] = "Student Profile Not Deleted";
                $_SESSION['status_code'] = "error";
                header("Location: register_student.php");
            }
        }

    }
}
// Update payment
if (isset($_POST['paymentUpdatebtn'])) {
    $paymentAmount = $_POST['paymentAmount'];
    $paymentStatus = $_POST['paymentStatus'];
    $ufull = $_POST['ufull'];
    $umonth = $_POST['umonth'];
    $uyear = $_POST['uyear'];
    $paymentDate = date('Y-m-d');

    $sql = "UPDATE payment SET payment = '$paymentStatus', payment_date = '$paymentDate', amount = '$paymentAmount' WHERE sid = '$_SESSION[psid]'";
    if (mysqli_query($conn, $sql)) {
        if ($paymentStatus === "Pay") {
            $sql2 = "SELECT * FROM payment_histroy WHERE sid = '$_SESSION[psid]' AND payment_month = '$umonth' AND payment_year = '$uyear'";
            if (mysqli_query($conn, $sql2)) {
                if (mysqli_num_rows(mysqli_query($conn, $sql2)) > 0) {
                    $sql3 = "UPDATE payment_histroy SET amount = '$paymentAmount' WHERE sid = '$_SESSION[psid]' AND payment_month = '$umonth'";
                    if (mysqli_query($conn, $sql3)) {
                        $_SESSION['status'] = "Payment Successfully";
                        $_SESSION['status_code'] = "success";
                        header("Location: payments.php");
                    } else {
                        $_SESSION['status'] = "Payment Not Updated";
                        $_SESSION['status_code'] = "error";
                        header("Location: payments.php");
                    }
                } else {
                    $fname = $_SESSION['fname'];
                    $lname = $_SESSION['lname'];
                    $sql4 = "INSERT INTO payment_histroy (sid, full_name, payment_month, amount) VALUES ('$_SESSION[psid]', '$ufull', '$umonth', '$paymentAmount')";
                    if (mysqli_query($conn, $sql4)) {
                        $_SESSION['status'] = "Payment Successfully";
                        $_SESSION['status_code'] = "success";
                        header("Location: payments.php");
                    } else {
                        $_SESSION['status'] = "Payment Not Updated";
                        $_SESSION['status_code'] = "error";
                        header("Location: payments.php");
                    }
                }
            } else {
                $fname = $_SESSION['fname'];
                $lname = $_SESSION['lname'];
                $sql5 = "INSERT INTO payment_histroy (sid, fname, lname, payment_month, amount) VALUES ('$_SESSION[psid]', '$fname', '$lname', '$umonth', '$paymentAmount')";
                if (mysqli_query($conn, $sql5)) {
                    $_SESSION['status'] = "Payment Successfully";
                    $_SESSION['status_code'] = "success";
                    header("Location: payments.php");
                } else {
                    $_SESSION['status'] = "Payment Not Updated";
                    $_SESSION['status_code'] = "error";
                    header("Location: payments.php");
                }

            }
        } else {
            $_SESSION['status'] = "Payment status updated";
            $_SESSION['status_code'] = "success";
            header("Location: payments.php");
        }
    } else {
        $_SESSION['status'] = "Payment not updated";
        $_SESSION['status_code'] = "error";
        header("Location: payments.php");
    }
    unset($_SESSION['psid']);
    unset($_SESSION['fname']);
    unset($_SESSION['lname']);
}

// DELETE payment
if (isset($_POST['deletePaymentBtn'])) {
    $id = $_POST['delete_id'];
    $sql = "DELETE FROM payment WHERE sid = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['status'] = "Payment Deleted Successfully";
        $_SESSION['status_code'] = "success";
        header("Location: payments.php");
    } else {
        $_SESSION['status'] = "Payment Not Deleted";
        $_SESSION['status_code'] = "error";
        header("Location: payments.php");
    }
}

// add Teacher
if (isset($_POST['teacherRegbtn'])) {
    $ufname = $_POST["ufname"];
    $ulname = $_POST["ulname"];
    $uemail = $_POST["uemail"];
    $utel = $_POST["utel"];
    $uwhatsapp = $_POST["uwhatsapp"];
    $uaddress = $_POST["uadd"];
    $ugender = $_POST["ugender"];
    $ugrade = $_POST["ugrade"];
    $username = $_POST["uusername"];
    $password = $_POST["upass"];
    $uquali = $_POST["uquali"];

    //accessing images
    $uphoto = $_FILES['uphoto']['name'];
    //accessing images temp name
    $uphoto_tmp = $_FILES['uphoto']['tmp_name'];

    $fileDestination = 'img/materails/' . $uphoto;
    $extension = pathinfo($uphoto, PATHINFO_EXTENSION);

    if (!in_array($extension, ['jpg', 'png', 'jpeg'])) {
        echo "You file type must be .jpg, .png or .jpeg";
        header('Location: register_teacher.php');
    } else {
        move_uploaded_file($uphoto_tmp, "$fileDestination");
        $sql = "INSERT INTO teacher (fname, lname, email, telephone, whatsapp, address, gender, grade, username, password, profile_photo, qualification)
     VALUES ('$ufname', '$ulname', '$uemail', '$utel', '$uwhatsapp', '$uaddress', '$ugender', '$ugrade',  '$username', '$password', '$uphoto', '$uquali')";
        if (mysqli_query($conn, $sql)) {
            $sID = mysqli_insert_id($conn);
            $sql2 = "INSERT INTO teach (tid, grade) VALUES ('$sID', '$ugrade')";
            if (mysqli_query($conn, $sql2)) {
                $_SESSION['status'] = "Teacher Profile Added Successfully";
                $_SESSION['status_code'] = "success";
                header("Location: register_teacher.php");
            } else {
                $_SESSION['status'] = "Teacher Profile Not Added";
                $_SESSION['status_code'] = "error";
                header("Location: register_teacher.php");
            }
        }

    }

}

// Update Teacher
if (isset($_POST['teacherUpdatebtn'])) {

    $ufname = $_POST["ufname"];
    $ulname = $_POST["ulname"];
    $uemail = $_POST["uemail"];
    $utel = $_POST["utel"];
    $uwhatsapp = $_POST["uwhatsapp"];
    $uaddress = $_POST["uadd"];
    $ugender = $_POST["ugender"];
    $ugrade = $_POST["ugrade"];
    $username = $_POST["uusername"];
    $password = $_POST["upass"];
    $uquali = $_POST["uquali"];

    $id = $_SESSION['Stid'];

    //accessing images
    $uphoto = $_FILES['uploadFile']['name'];
    //accessing images temp name
    $uphoto_tmp = $_FILES['uploadFile']['tmp_name'];

    $fileDestination = 'img/materails/' . $uphoto;

    $extension = pathinfo($uphoto, PATHINFO_EXTENSION);

    if ($_SESSION['fileName']) {

        $previousFileDestinamtion = 'img/materails/' . $_SESSION['fileName'];
        unlink($previousFileDestinamtion);

        if (!in_array($extension, ['jpg', 'png', 'jpeg'])) {
            echo "You file type must be .jpg, .png or .jpeg";
            header('Location: register_teacher.php');
        } else {
            $_SESSION['ammo'] = "sepda";

            move_uploaded_file($uphoto_tmp, "$fileDestination");

            header('Location: teacherEdit.php');

            $sql = "UPDATE teacher SET fname = '$ufname', lname = '$ulname', email = '$uemail', telephone = '$utel', whatsapp = '$uwhatsapp', address = '$uaddress', gender = ' $ugender', grade = '$ugrade',
            username = '$username', password = '$password', qualification = '$uquali', profile_photo = '$uphoto' WHERE tid = '$id'";
            if (mysqli_query($conn, $sql)) {

                $sql2 = "UPDATE teach SET grade = '$ugrade' WHERE tid = '$id'";
                if (mysqli_query($conn, $sql2)) {
                    $_SESSION['status'] = "Teacher Profile Updated Successfully";
                    $_SESSION['status_code'] = "success";
                    header("Location: register_teacher.php");
                } else {
                    $_SESSION['status'] = "Teacher Profile Not Updated";
                    $_SESSION['status_code'] = "error";
                    header("Location: register_teacher.php");
                }

            }
            unset($_SESSION['tid']);
        }
    }

}

// Delete Teacher
if (isset($_POST['deleteTeacherBtn'])) {
    $id = $_POST['delete_id'];
    $grade = $_POST['delete_grade'];

    if ($_POST['delete_file']) {
        $previousFileDestinamtion = 'img/materails/' . $_POST['delete_file'];
        unlink($previousFileDestinamtion);
        $sql = "DELETE FROM teacher WHERE tid = '$id'";
        if (mysqli_query($conn, $sql)) {
            $sql2 = "DELETE FROM teach WHERE tid = '$id'";
            if (mysqli_query($conn, $sql2)) {
                $sql3 = "DELETE FROM subject_materials WHERE grade = '$grade' AND tid = '$id'";
                if (mysqli_query($conn, $sql3)) {
                    $_SESSION['status'] = "Teacher Profile Deleted Successfully";
                    $_SESSION['status_code'] = "success";
                    header("Location: register_teacher.php");
                } else {
                    $_SESSION['status'] = "Teacher Profile Not Deleted";
                    $_SESSION['status_code'] = "error";
                    header("Location: register_teacher.php");
                }
            }
        }
    }
}
mysqli_close($conn);
