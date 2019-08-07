<?php
// Will allow you to set a category
 function add_cat(){
 include("inc/db.php");
    if(isset($_POST["add_cat"])) {
        $cat_name=$_POST['sub_cat_name'];
        $cat_id=$_POST['cat_id'];

        $check=$con->prepare("select * from sub_cat where sub_cat_name='$cat_name'");
        $check->setFetchMode(PDO:: FETCH_ASSOC);
        $check->execute();
        $count=$check->rowCoint();

        if($count==1) {
            echo"<script>alert('Sub Category Already Added')</script>";
            echo"<script>window.open('index.php?sub_cat','_self')</script>";
        }else{
            $add_cat=$con->prepare("insert into sub_cat(sub_cat_name,cat_id)values('$cat_name','$cat_id')");
            if($add_cat->execute()) {
                echo"<script>alert('Sub Category Added Successfully')</script>";
                echo"<script>window.open('index.php?sub_cat','_self')</script>";
            }else{
                echo"<script>alert(Sub Category Not Added Successfully')</script>";
                echo"<script>window.open('index.php?sub_cat','_self')</script>";
            }
        }
    }
}

function edit_cat(){
    include("inc/db.php");

       if(isset($_GET["edit_cat"])) {
           $id=$_GET['edit_cat'];

           $get_cat=$con->prepare("select * from cat where cat_id='$id'");
           $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
           $get_cat->execute();
           $row=$get_cat->fetch();
        //    we will not use a while loop as we are just fetching one record

        echo"<h3>Edit Category</h3>
            <form id='edit_form' method='post' enctype='multipart/form-data'>
            <input type='text' name='cat_name' value='".$row['cat_name']."' placeholder='Enter Category Name Here' />
            <center><button name='edit_cat'>Edit Category</button><center/> 
        </form>";
        //    $cat_name=$_POST['cat_name'];
        // //    $cat_id=$_POST['cat_id'];
   
        //    $check=$con->prepare("select * from sub_cat where sub_cat_name='$cat_name'");
        //    $check->setFetchMode(PDO:: FETCH_ASSOC);
        //    $check->execute();
        //    $count=$check->rowCoint();
   
        //    /*if($count==1) {
        //        echo"<script>alert('Sub Category Already Added')</script>";
        //        echo"<script>window.open('index.php?sub_cat','_self')</script>";
        //    }else{
        //        $add_cat=$con->prepare("insert into sub_cat(sub_cat_name,cat_id)values('$cat_name','$cat_id')");
        //        if($add_cat->execute()) {
        //            echo"<script>alert('Sub Category Added Successfully')</script>";
        //            echo"<script>window.open('index.php?sub_cat','_self')</script>";
        //        }else{
        //            echo"<script>alert(Sub Category Not Added Successfully')</script>";
        //            echo"<script>window.open('index.php?sub_cat','_self')</script>";
        //        }
        //    }*/

        if(isset($_POST['edit_cat'])) {
            $cat_name=$_POST['cat_name'];

            $check=$con->prepare("select * from sub_cat where sub_cat_name='$cat_name'");
            $check->setFetchMode(PDO:: FETCH_ASSOC);
            $check->execute();
            $count=$check->rowCoint();
    
            if($count==1) {
                echo"<script>alert('Category Already Added')</script>";
                echo"<script>window.open('index.php?sub_cat','_self')</script>";
            }else{

                $upt=$con->prepare("update cat set cat_name='$cat_name' where cat_id='$id");
                if($up->execute()) {
                    echo"<script>alert('Category Update Successfully')</script>";
                    echo"<script>window.open('index.php?cat','_self')</script>";
                }else{
                    echo"<script>alert('Category Not Added Successfully')</script>";
                    echo"<script>window.open('index. php?cat','_self')</script>";
                }
            }
        }
       }
   }

   // This function will make it possible to edit and to delete data that will be added to the table 
// When looking to edit a certain category, one must make sure to reference correctly 
function view_cat() {
    include(inc/db.php);
    $get_cat=$con->prepare("select * from cat");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    $i=1;
    while($row=$get_cat->fetch()):
        echo"<tr>
                  <td>".$i++."</td>
                  <td>".$row['sub_cat_name']."</td>
                  <td>".$row_cat['cat_name']."</td>
                  <td><a href='index.php?cat&edit_cat=".$row['cat_id'].">Edit</a></td>
                  <td><a href='#>'Delete</a></td>
             </tr>";
    endwhile;
}

function select_cat() {
    include("inc/db.php");
    $get_cat=$con->prepare("select * from cat");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    while($row=$get_cat->fetch()):
        echo"<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
    endwhile;
}

// Will allow you to add a subcat to your catagory
function add_sub_cat(){
    include("inc/db.php");
       if(isset($_POST["add_sub_cat"])) {
           $cat_name=$_POST['cat_name'];
   
           $check=$con->prepare("select * from cat where cat_name='$cat_name'");
           $check->setFetchMode(PDO:: FETCH_ASSOC);
           $check->execute();
           $count=$check->rowCoint();
   
           if($count==1) {
               echo"<script>alert('Sub Category Already Added')</script>";
               echo"<script>window.open('index.php?sub_cat','_self')</script>";
           }else{
               $add_cat=$con->prepare("insert into sub_cat(sub_cat_name)values('$cat_name')");
               if($add_cat->execute()) {
                   echo"<script>alert('Sub Category Added Successfully')</script>";
                   echo"<script>window.open('index.php?sub_cat','_self')</script>";
               }else{
                   echo"<script>alert('Sub Category Not Added Successfully')</script>";
                   echo"<script>window.open('index.php?sub_cat','_self')</script>";
               }
           }
       }
   }

   function edit_sub_cat(){
    include("inc/db.php");

       if(isset($_GET["edit_sub_cat"])) {
           $id=$_GET['edit_sub_cat'];

           $get_cat=$con->prepare("select * from sub_cat where sub_cat_id='$id'");
           $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
           $get_cat->execute();
           $row=$get_cat->fetch();
        //    we will not use a while loop as we are just fetching one record

        echo"<h3>Edit Sub Category</h3>
        <form id='edit_form' method='post' enctype='multipart/form-data'>
        <input type='text' name='edit_sub_cat_name' value='".$row['sub_cat_name']."' placeholder='Enter Category Name Here' />
        <button name='add_cat'>Add Category</button> 
</form>";
           $cat_name=$_POST['cat_name'];
        //    $cat_id=$_POST['cat_id'];
   
           $check=$con->prepare("select * from sub_cat where sub_cat_name='$cat_name'");
           $check->setFetchMode(PDO:: FETCH_ASSOC);
           $check->execute();
           $count=$check->rowCoint();
   
           /*if($count==1) {
               echo"<script>alert('Sub Category Already Added')</script>";
                 echo"<script>window.open('index.php?sub_cat','_self')</script>";
           }else{
               $add_cat=$con->prepare("insert into sub_cat(sub_cat_name,cat_id)values('$cat_name','$cat_id')");
               if($add_cat->execute()) {
                   echo"<script>alert('Sub Category Added Successfully')</script>";
                   echo"<script>window.open('index.php?sub_cat','_self')</script>";
               }else{
                   echo"<script>alert(Sub Category Not Added Successfully')</script>";
                   echo"<script>window.open('index.php?sub_cat','_self')</script>";
               }
           }*/
       }
   }

   function view_sub_cat() {
    include(inc/db.php);
    $get_cat=$con->prepare("select * from sub_cat");
    $get_cat->setFetchMode(PDO:: FETCH_ASSOC);
    $get_cat->execute();
    $i=1;
    while($row=$get_cat->fetch()):
        $id=$row['cat_id'];
        $get_c=$con->prepare("select * from cat where cat_id='$id'");
        $get_c->setFetchMode(PDO:: FETCH_ASSOC);
        $get_c->execute();
        $row_cat=$get_c-fetch();
        echo"<tr>
                  <td>".$i++."</td>
                  <td>".$row['sub_cat_name']."</td>
                  <td>".$row_cat['cat_name']."</td>
                  <td><a href='index.php?sub_cat&edit_sub_cat=".$row['sub_cat_id']."'>Edit</a></td>
                  <td><a href='#>'Delete</a></td>
             </tr>";
    endwhile;
}
?>
<!-- The code will only work once database is set up -->