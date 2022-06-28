<html>
    <head>
        <title>Learners</title>
    </head>

    <body>
        <h1>Learners in the classroom</h1>
        <ul>
            <?php

            $json = file_get_contents('http://learner-service/');
            $obj = json_decode($json);

            $learners = $obj->learners;

            foreach ($learners as $learner) {
				if ($learner == "Ezra")
				{
                echo "<li>$learner</li>";
				}
				else {
					echo "<li>$learner is a dirty liar?</li>";
				}
            }

            ?>
        </ul>
    </body>
</html>

