<?php

    // Import the Slim library and register Slim's autoloader
    require 'Slim/Slim.php';

    // Instantiate a new Slim application
    $app = new Slim();
    
    /**
     * On GET /courses
     * Fetch a list of all courses or search a course by name
     */
    $app->get('/courses', 'getCourses');
    
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
            }          
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