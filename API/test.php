<?php

    // Import the Slim library and register Slim's autoloader
    require 'Slim/Slim.php';
    Slim\Slim::registerAutoloader();
    // Instantiate a new Slim application
    $app = new Slim\Slim();
    
    /**
     * On GET /courses
     * Fetch a list of all courses or search a course by name
     */
    $app->get('/courses', 'getCourses');
    $app->get('/courses/:courseId', 'getCourseInfo($courseId)');
    
     // Run the Service
    $app->run(); 
    
    function getCourses() {
        $sql = "SELECT CourseName FROM Courses ORDER BY CourseName";
        try {
                $dbcon = getConnection();
                $stmt = $dbcon->query($sql);
                $courses = $stmt->fetchAll(PDO::FETCH_OBJ);
                $dbcon = null;
                echo '{"courses": '. json_encode($courses) .'}';             
                 
        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
    function getCourseInfo($courseId) {
        $sql = "SELECT CourseName FROM Courses where CourseId = :courseId";
        try {
                $dbcon = getConnection();

            	$stmt = $dbcon->prepare($sql);
            	$stmt->bindParam("courseId", $courseId);
            	$stmt->execute();
            	$courseName = $stmt->fetchObject();
            	$dbcon = null;
                echo '{"courseName": '. json_encode($courseName) .'}';             
                  
        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }  
    
    // Return a connection to the database using PHP PDO
    function getConnection() {
        $dbhost = "localhost";
        $dbuser = "nickclark";
        $dbpass = "penguin1";
        $dbname = "NewCourse";
        $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    }

  
?>