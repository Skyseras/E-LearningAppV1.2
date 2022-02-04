<?php 
    include_once "header.php"
?>
    <div class="d-flex" id="wrapper">
        <?php 
            include_once "sidebar.php"
        ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <?php 
                include_once "wrapperheader.php"
            ?>
             <div style="height:90vh;" class="bgstudent container-fluid px-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="m-0 fw-bold">Browse Courses</h4>
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="m-0 px-4" src="icons/doublearrows.svg" alt="">
                        <a href="formcourse.php"><button class="my-2 w-100 btn btn-lg rounded-4 standard text-white ps" type="submit">ADD NEW COURSE</button></a>
                    </div>
                </div>
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    
                <?php
                        $conn = new mysqli('localhost', 'root','', 'e_classe_db');
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT course_id, title, instructor, syllabus from course order by course_id DESC;";
                        $result = $conn->query($sql);
                        if ($result-> num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo    '
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <div class="p-3 bg3card shadow-sm rounded">
                                                <div class="d-flex justify-content-between">
                                                    <img style="border-radius:100%; height: 30px;" src="visuals/yc.jpg" alt="">
                                                    <div class="col-1 d-flex justify-content-center align-items-center" id="editer">
                                                        <a href="editcourse.php?edit='.$row["course_id"].'"><img class="px-2" src="icons/pen.svg" alt=""></a>
                                                        <a href="deletecourse.php?delete='.$row["course_id"].'"><img class="px-2" src="icons/can.svg" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="fw-bold d-flex align-items-center ">
                                                    <h2 class="fw-bold mb-0">'.$row["instructor"].'</h2>
                                                </div>
                                                <div class="fw-bold d-flex align-items-center ">
                                                    <h2 class="fw-bold mb-0">'.$row["title"].'</h2>
                                                </div>
                                                <h2 class="fw-bold mb-0">'.$row["syllabus"].'</h2>
                                            </div>
                                        </div>
                                        ';
                                    }
                                }else {
                                    echo "0 results";
                                }
                            ?>
                </div>
            </div>
        </div>
    </div>
<?php 
    include_once "footer.php"
?>