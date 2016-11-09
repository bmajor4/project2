<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Survey Response</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../css/normalize.min.css">
        <link rel="stylesheet" href="../css/style.css">

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body>
        
        <section class="survey-response">
            
            <?php
            
          
            $servername = getenv('major79-bmajor4.c9users.io');
            $username = 'bmajor4';
            $password = "";
            $database = "c9";
            $dbport = 3306;
            $dbname = "storedata";
            
            
            $db = new mysqli($servername, $username, $password, $database, $dbport);
            
            
            if ($db->connect_error) {
                die("Connection Failed: " . $db->connect_error);
            }
            
            echo ("Connected Successfully: " . $db->host_info);
            
            mysqli_select_db($db, $dbname);
            
            
            if (empty($result)) {
                $sql = "CREATE TABLE SurveyResponse(
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    firstname VARCHAR(30) NOT NULL,
                    lastname VARCHAR(30) NOT NULL,
                    whatisthemostimportantpartofgettingyourdaystarted VARCHAR(50),
                    howmanytimesdoyoueatinaday VARCHAR(50)
                    howmanytimesadaydoyoushower VARCHAR(50)
                    howmanytimesdoyoubrushyourteeth VARCHAR(50)
                    whattimedoyougotosleep VARCHAR(50)
                    )";
                    
            if ($db->query($sql) === TRUE) {
                print_r("<br>Table SurveyResponse was created successfully.");
            } else {
                print_r("<br>There was an error creating the table: " . $db->error);
            }
                    
            }
            
            
            $first_name = mysqli_real_escape_string($db, $_POST['firstname']);
            $last_name = mysqli_real_escape_string($db, $_POST['lastname']);
            $what_is_the_most_important_part_of_getting_your_day_started = $_POST['whatisthemostimportantpartofgettingyourdaystarted'];
            $how_many_times_do_you_eat_in_a_day = $_POST['howmanytimesdoyoueatinaday'];
            $how_many_times_a_day_do_you_shower = $_POST['howmanytimesadaydoyoushower'];
            $how_many_times_a_day_do_you_brush_your_teeth = $_POST['howmanytimesadaydoyoubrushyourteeth'];
            $what_time_do_you_go_to_sleep = $_POST['whattimedoyougotosleep'];
            
            
            $survey_insert = "INSERT INTO SurveyResponse (firstname, lastname, whatisthemostimportantpartofgettingyourdaystarted, howmanytimesdoyoueatinaday, howmanytimesadaydoyoushower, howmanytimesadaydoyoubrushyourteeth, whattimedoyougotosleep) VALUES ('$first_name', '$last_name', '$what_is_the_most_important_part_of_getting_your_day_started', '$how_many_times_do_you_eat_in_a_day', '$how_many_times_a_day_do_you_shower', '$how_many_times_a_day_do_you_brush_your_teeth')";
            
            
            if (mysqli_query($db, $survey_insert)) {
                print_r("<br>Record added successfully.");
            } else {
                print_r("<br>Error: " . mysqli_error($db));
            }
            
            print_r("<h1>Response</h1>");
            
            
            $sql = "SURVEY id, firstname, lastname, whatisthemostimportantpartofgettingyourdaystarted, howmanytimesdoyoueatinaday, howmanytimesadaydoyoushower, howmanytimesadaydoyoubrushyourteeth, whattimedoyougotosleep FROM SurveyResponse";
            
            $surveyresult = $db->query($sql);
            
            
            if ($surveyresult->num_rows > 0) {
                
                while ($row = $surveyresult->fetch_assoc()) {
                echo "Survey ID: " . $row["id"] . "<br>Survey Response: " . $row["firstname"] . " " . $row["lastname"] . "<br>What is the most important part of getting your day started? " . $row["whatisthemostimportantpartofgettingyourdaystarte"] . "<br>How many times do you eat in day? " . $row["howmanytimesdoyoueatinaday"] . " <br>How many times a day do you shower? " . $row["howmanytimesadaydoyoushower"] . "<br>How many times do you brush your teeth? " . $row["howmanytimesdoyoubrushyourteeth"] . "<br>What time do you go to sleep?" . $row["whattimedoyougotosleep"] <br><br>";
                }
                
                
            } else {
                print_r("<br>No results to display.");
            }
            
            
            $db->close();
            ?>

            <a href="../index.html">Back to Form</a>
       </section>
        <script src="js/main.js"></script>
    </body>
</html>
