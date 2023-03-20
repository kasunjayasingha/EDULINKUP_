<?php
session_start();
include 'includes/script.php';
include 'includes/connection.php';

// Logout
if (isset($_POST['logoutBtn'])) {
    unset($_SESSION['username']);
    session_destroy();
    header('Location: index.php');
}

// upload file
if (isset($_POST['uploadMatbtn'])) {

    $material = $_POST['material'];
    $grade = $_POST['grade'];
    $tid = $_POST['teacher_id'];

    $fileName = $_FILES['uploadFile']['name'];
    $fileTmpName = $_FILES['uploadFile']['tmp_name'];
    $fileDestination = 'Imgs/materails/' . $fileName;
    $size = $_FILES['uploadFile']['size'];

    $extension = pathinfo($fileName, PATHINFO_EXTENSION);

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file type must be .zip, .pdf or .docx";
        header('Location: teacher.php');
    } elseif ($_FILES['uploadFile']['size'] > 1000000) {
        echo "File too large!";
    } else {
        move_uploaded_file($fileTmpName, $fileDestination);
        $sql = "INSERT INTO subject_materials (m_topic, grade, file_name, download, tid) VALUES ('$material', '$grade', '$fileName', 0, '$tid')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['statusDash'] = "File uploaded successfully";
            $_SESSION['status_codeDash'] = "success";
            header('Location: teacher.php');
        } else {
            $_SESSION['statusDash'] = "File upload failed";
            $_SESSION['status_codeDash'] = "error";
            header('Location: teacher.php');
        }
    }

}

// update material
if (isset($_POST['updateMatbtn'])) {
    $material = $_POST['material'];
    $grade = $_POST['grade'];
    $teacher_id = $_POST['teacher_id'];
    $id = $_SESSION['id'];
    $fileName = $_FILES['uploadFile']['name'];
    $fileTmpName = $_FILES['uploadFile']['tmp_name'];
    $fileDestination = 'Imgs/materails/' . $fileName;
    $size = $_FILES['uploadFile']['size'];

    $extension = pathinfo($fileName, PATHINFO_EXTENSION);

    if ($_SESSION['file']) {
        $previousFileDestinamtion = 'Imgs/materails/' . $_SESSION['file'];
        unlink($previousFileDestinamtion);
    }

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        $_SESSION['statusDash'] = "You file type must be .zip, .pdf or .docx";
        $_SESSION['status_codeDash'] = "info";
        header('Location: materailsEdit.php');
    } elseif ($_FILES['uploadFile']['size'] > 1000000) {
        $_SESSION['statusDash'] = "File too large!";
        $_SESSION['status_codeDash'] = "info";
        header('Location: teacher.php');
    } else {
        move_uploaded_file($fileTmpName, $fileDestination);
        $sql = "UPDATE subject_materials SET m_topic = '$material', grade = '$grade', file_name = '$fileName', tid = '$teacher_id'  WHERE mid = '$id'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['statusDash'] = "File updated successfully";
            $_SESSION['status_codeDash'] = "success";
            header('Location: teacher.php');
        } else {
            $_SESSION['statusDash'] = "File update failed";
            $_SESSION['status_codeDash'] = "error";
            header('Location: teacher.php');
        }
    }

}

// delete material
if (isset($_POST['deleteMatBtn'])) {
    $id = $_POST['delete_id'];
    $delete_file = $_POST['delete_file'];
    if ($_POST['delete_file']) {
        $previousFileDestinamtion = 'Imgs/materails/' . $_POST['delete_file'];
        unlink($previousFileDestinamtion);
        $sql = "DELETE FROM subject_materials WHERE mid = '$id'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['statusDash'] = "File deleted successfully";
            $_SESSION['status_codeDash'] = "success";
            header('Location: teacher.php');
        } else {
            $_SESSION['statusDash'] = "File delete failed";
            $_SESSION['status_codeDash'] = "error";
            header('Location: teacher.php');
        }
    }

}

// download material
if (isset($_GET['file_id'])) {
    $newCount = 0;
    $id = $_GET['file_id'];
    $sql = "SELECT * FROM subject_materials WHERE mid = '$id'";
    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);
    $newCount = $file['download'];
    $filepath = 'Imgs/materails/' . $file['file_name'];
    if (file_exists($filepath)) {
        header('Content-Type: application/octet-stream');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('Imgs/materails/' . $file['file_name']));
        readfile('Imgs/materails/' . $file['file_name']);
        $newCount = $file['download'] + 1;
        $updateQuery = "UPDATE subject_materials SET download = '$newCount' WHERE mid = '$id'";
        mysqli_query($conn, $updateQuery);
        exit;
    }
}

// update Marks
if (isset($_POST['uploadMarksbtn'])) {
    $id = $_POST['mId'];
    $marks = $_POST['Imarks'];
    $sql = "UPDATE marks SET marks = '$marks' WHERE sid = '$id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['statusDash'] = "Marks updated successfully";
        $_SESSION['status_codeDash'] = "success";
        header('Location: studentMarks.php');
    } else {
        $_SESSION['statusDash'] = "Marks update failed";
        $_SESSION['status_codeDash'] = "error";
        header('Location: studentMarks.php');
    }
}

// Delete Marks
if (isset($_POST['deletemarksBtn'])) {
    $id = $_POST['delete_id'];
    $mark = null;
    $sql = "UPDATE marks SET marks ='$mark' WHERE sid = '$id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['statusDash'] = "File upload failed";
        $_SESSION['status_codeDash'] = "success";
        header('Location: studentMarks.php');
    } else {
        $_SESSION['statusDash'] = "File upload failed";
        $_SESSION['status_codeDash'] = "error";
        header('Location: studentMarks.php');
    }
}
mysqli_close($conn);
