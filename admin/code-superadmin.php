<?php
include('authentication.php');
include('middleware/superadminAuth.php');

if(isset($_POST['category_delete']))
{
    $category_id = $_POST['category_delete'];

    // 2=delete
    $query = "UPDATE categories SET status='2' WHERE id='$category_id' LIMIT 1";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Category Deleted Successfully";
        header('Location: category-view.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location: category-view.php');
        exit(0);
    }
}

if(isset($_POST['category_update']))
{
    $category_id = $_POST['category_id'];

    $name  = $_POST['name'];

    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']); //Remove all Special Characters
    $final_string = preg_replace('/-+/', '-', $string);
    $slug  = $final_string;

    $description  = $_POST['description'];

    $meta_title  = $_POST['meta_title'];
    $meta_description  = $_POST['meta_description'];
    $meta_keyword  = $_POST['meta_keyword'];

    $navbar_status  = $_POST['navbar_status'] == true ? '1':'0';
    $status  = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE categories SET name='$name', slug='$slug', description='$description', meta_title='$meta_title', meta_description='$meta_description', meta_keyword='$meta_keyword', navbar_status='$navbar_status', status='$status' WHERE id='$category_id' ";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Category Updated Successfully";
        header('Location: category-edit.php?id='.$category_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location: category-edit.php?id='.$category_id);
        exit(0);
    }
    
}

if(isset($_POST['category_add']))
{
    $name  = $_POST['name'];

    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']); //Remove all Special Characters
    $final_string = preg_replace('/-+/', '-', $string);
    $slug  = $final_string;
    
    $description  = $_POST['description'];

    $meta_title  = $_POST['meta_title'];
    $meta_description  = $_POST['meta_description'];
    $meta_keyword  = $_POST['meta_keyword'];

    $navbar_status  = $_POST['navbar_status'] == true ? '1':'0';
    $status  = $_POST['status'] == true ? '1':'0';

    $query = "INSERT INTO categories (name,slug,description,meta_title,meta_description,meta_keyword,navbar_status,status) VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keyword','$navbar_status','$status')";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Category Added Successfully";
        header('Location: category-add.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location: category-add.php');
        exit(0);
    }

}


if(isset($_POST['user_delete']))
{
    $user_id = $_POST['user_delete'];

    $query = "DELETE FROM users WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User/Admin Deleted Successfully";
        header('Location: view-register.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location: view-register.php');
        exit(0);
    }
}

if(isset($_POST['add_user']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1':'0';

    $query = "INSERT INTO users (fname,lname,email,password,role_as,status) VALUES ('$fname','$lname','$email','$password','$role_as','$status')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Admin/User Added Successfully";
        header('Location: view-register.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location: view-register.php');
        exit(0);
    }
}

if(isset($_POST['update_user']))
{
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1':'0';

    $query  = "UPDATE users SET fname='$fname', lname='$lname', email='$email', password='$password', role_as='$role_as', status='$status' WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Updated Successfully"; 
        header('Location: view-register.php');
        exit(0);
    }
}


?>