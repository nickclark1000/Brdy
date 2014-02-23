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
    $app->get('/courses', function() use($app) {
        $req = Slim\Slim::getInstance()->request();
        $name = $req->get('city');
        $dbcon = getConnection();
        try {                
            if($name != null) {
                $sql = "SELECT * FROM Courses WHERE City LIKE :city ORDER BY City";
                $stmt = $dbcon->prepare($sql);
                $query = "%".$name."%";
                $stmt->bindParam("name", $query);
                $stmt->execute();                
            } else {
                $sql = "SELECT * FROM Courses ORDER BY CourseName";
                $stmt = $dbcon->query($sql);
            }
            $courses = $stmt->fetchAll(PDO::FETCH_OBJ);
            $dbcon = null;
            returnAsJSON($courses,$app);          
        } catch(PDOException $e) {
            printError($e->getMessage(),500,$app);
        }
    });

    /**
     * On GET /courses/:query
     * Fetch the data of a single course by id
     */
    $app->get('/courses/:query', function($query) use($app) {
        $sql = "SELECT * FROM Courses WHERE CourseId=:query";
        try {
            $dbcon = getConnection();
            $stmt = $dbcon->prepare($sql);
            $stmt->bindParam("query", $query);
            $stmt->execute();
            $course = $stmt->fetchObject();
            $dbcon = null;
            returnAsJSON($course,$app);
        } catch(PDOException $e) {
            printError($e->getMessage(),500,$app);
        }
    });
    
    /**
     * On POST /courses
     * Create a new planet
     */
    $app->post('/courses', function() use($app) {
        $request = Slim\Slim::getInstance()->request();
        $course = json_decode($request->getBody());
        $sql = "INSERT INTO Courses (CourseId, CourseName, City) VALUES (:id, :course, :city)";
        try {
            $dbcon = getConnection();
            $stmt = $dbcon->prepare($sql);
            $stmt->bindParam("region", $course->course);
            $stmt->bindParam("physical_class", $course->city);
            $stmt->execute();
            $course->id = $dbcon->lastInsertId();
            $course->picture = 'default.jpg';
            $dbcon = null;
            returnAsJSON($course,$app);
        } catch(PDOException $e) {
            printError($e->getMessage(),500,$app);
        }       
    });
    
    /**
     * On PUT /courses/:id
     * Update the data of an existing planet
     */
    $app->put('/courses/:id', function($id) use($app) {
        $request = Slim\Slim::getInstance()->request();
        $body = $request->getBody();
        $course = json_decode($body);
        $sql = "UPDATE planet SET name=:name, region=:region, physical_class=:physical_class, diameter=:diameter, capital=:capital, description=:description WHERE id=:id";
        try {
            $dbcon = getConnection();
            $stmt = $dbcon->prepare($sql);
            $stmt->bindParam("name", $course->name);
            $stmt->bindParam("region", $course->region);
            $stmt->bindParam("physical_class", $course->physical_class);
            $stmt->bindParam("diameter", $course->diameter);
            $stmt->bindParam("capital", $course->capital);
            $stmt->bindParam("description", $course->description);
            $stmt->bindParam("id", $id);
            $stmt->execute();
            if($stmt->rowCount() == 0) {
                printError("planet not found",404,$app);                
            } else {                
                returnAsJSON($course,$app);
            }                        
            $dbcon = null;            
        } catch(PDOException $e) {
            printError($e->getMessage(),500,$app);
        }
    });
    
    /**
     * On DELETE /courses/:id
     * Delete an existing planet
     */
    $app->delete('/courses/:id', function($id) use($app) {
        $sql = "DELETE FROM planet WHERE id=:id";
        try {
            $dbcon = getConnection();
            $stmt = $dbcon->prepare($sql);
            $stmt->bindParam("id", $id);
            $stmt->execute();            
            if($stmt->rowCount() == 0) {
                printError("planet not found",404,$app);                
            } else {                
                $app->response()->status(200);
            }
            $dbcon = null;
        } catch(PDOException $e) {
            printError($e->getMessage(),500,$app);
        }
    });
    
    // Run the Service
    $app->run();        
    
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
    
    // Return an object as JSON or return status 404 if response is empty
    function returnAsJSON($courses,$app) {
        if($courses) {
            echo json_encode(array('courses' => $courses));
        } else {
            $app->response()->status(404);
        }
    }
    
    // In case of an internal server error print out an explanation and return 505
    function printError($message,$code,$app) {
        echo '{"error":{"message":'. $message .'}}';
        $app->response()->status($code);
    }
  
?>