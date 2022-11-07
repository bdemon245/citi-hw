<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <h1 class="heading">Raw PHP-Class 6</h1>

    <div class="col-1">
        <?php
        $label = ["Select Day", "Select Month", "Select Year"];
        $id = ["day", "month", "year"];
        $init = [1, 1, 1990];
        $value = [31, 12, 2022];
        //function for option 
        function options($init, $value)
        {
            # code...
            for ($i = $init; $i <= $value; $i++) {
                # code...
                echo "<option value=\" \">$i</option>";
            }
        }

        for ($j = 0; $j < count($label); $j++) {
            # code...
            echo "<label for=\"$label[$j]\">$label[$j]: </label>
        <select name=\"$label[$j]\" id=\"$id[$j]\">";

            options($init[$j], $value[$j]);

            echo "</select><br>";
        }
        $string = ["-", "^̲", "^̷"];
        for ($i = 1; $i <= 10; $i++) {
            # code...
            //echo str_repeat($string[(random_int(0,2))],$i);
            echo str_repeat("*", $i) . "<br>";
        }
        for ($i = 10; $i >= 1; $i--) {
            # code...
            //echo str_repeat($string[(random_int(0,2))],$i);
            echo str_repeat("*", $i) . "<br>";
        }
        $num = 5;
        $fact = 5;
        for ($i = 1; $i < $num; $i++) {
            $fact *= $i;
        }
        echo $fact;
        ?>
    </div>
    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <form action="./class-6.php" method="post" class="form-control">
                    <div class="mb-3">
                        <label for="email" class="form-label">Enter your email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="pass" class="form-label">Enter your password</label>
                        <input type="password" name="pass" id="pass" class="form-control">
                    </div>

                    <button type="submit" name="submit" value="submited" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
        <hr>
        <pre>
        <?php
        print_r($_POST);
        ?>
        </pre>
    </div>
</body>

</html>