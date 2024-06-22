<?php
require_once __DIR__.'/../model/adminpageModel.php';
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: loginWEB.html");
    exit;
}

$messages = [
    'add_record' => '',
    'delete_record' => '',
    'change_password' => ''
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_record'])) {
        $id = $_POST['id'];
        $year = $_POST['year'];
        $category = $_POST['category'];
        $full_name = $_POST['full_name'];
        $show = $_POST['show'];
        $won = $_POST['won'];

        if (addRecord($id, $year, $category, $full_name, $show, $won)) {
            $messages['add_record'] = "Record added successfully.";
        } else {
            $messages['add_record'] = "Failed to add record.";
        }
    }

    if (isset($_POST['delete_record'])) {
        $delete_id = $_POST['delete_id'];

        if (deleteRecord($delete_id)) {
            $messages['delete_record'] = "Record deleted successfully.";
        } else {
            $messages['delete_record'] = "Failed to delete record.";
        }
    }

    if (isset($_POST['change_password'])) {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if ($new_password !== $confirm_password) {
            $messages['change_password'] = "New password and confirm password do not match.";
        } else {
            $user_name = $_SESSION['name'];

            if (changePassword($user_name, $new_password, $confirm_password, $current_password)) {
                $messages['change_password'] = "Password changed successfully.";
            } else {
                $messages['change_password'] = "Failed to change password.";
            }
        }
    }
}

include __DIR__.'/../view/adminpageView.php';
?>