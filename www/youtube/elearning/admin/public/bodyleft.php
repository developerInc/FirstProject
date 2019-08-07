<div id='bodyleft'>
    <h3>Categories Managment</h3>
    <ul>
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="index.php?cat">View Catagories</a></li>
        <li><a href="ondex.php?sub_cat">View Sub Catagories</a></li>
   <!-- The cat handle in the call of our dashboard comes from the implementation of our database -->
    </ul>
    <h3>Course Managment</h3>
    <ul>
        <li><a href="#">Active Courses</a></li>
        <li><a href="#">Pending Courses</a></li>
        <li><a href="#">Unpublished Courses</a></li>
        <li><a href="#">Advanced Courses Searching</a></li>
    </ul>
    <h3>User Managment</h3>
    <ul>
        <li><a href="#">View All Students</a></li>
        <li><a href="#">View All Teachers</a></li>
        <li><a href="#">Advanced User Searching</a></li>
    </ul>
    <h3>Payment Managment</h3>
    <ul>
        <li><a href="#">Pay To Instructor</a></li>
        <li><a href="#">Complete Payment</a></li>
        <li><a href="#">Payment Searching</a></li>
    </ul>
    <h3>Pages Managment</h3>
    <ul>
        <li><a href="#">Terms & Conditions Page</a></li>
        <li><a href="#">Contact Us Page</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">FAQs Page</a></li>
        <li><a href="#">Edit Slider</a></li>
    </ul>
</div>

<?php
if(isset($_GET['cat'])) {
    include("cat.php");
}
if(isset($_GET['sub_cat'])) {
    include("sub_cat.php");
}
?>