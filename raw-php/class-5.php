<?php
//link css
echo "<head><link rel=\"stylesheet\" href=\"style.css\"></head>";

//heading
echo "<div class=\"heading\"><h1>Raw PHP-Class 5</h1></div>";



//column 1
echo "<div class=\"col-1\">";

#11. more string methods
    $string = "<h3> This is a html Heading tag</h3>";
    echo htmlentities($string);//html elements won't be ignored and printed as a string
    echo html_entity_decode(htmlentities($string));//html elements will act as they should
    echo str_repeat("a String🧵", 5); //repeats a string
    echo "<br>";
    $str = "";
    var_dump(empty($str));//returns true if its there is an empty string
    echo "<br>";
    $str = null;
    var_dump(isset($str));//returns false if a variable has no value at all(if the value is null )
    echo "<br>";
    #11. array methods
    echo "<pre>";
    $message = "He is a boy with extra-ordinary knowledge";
    $strArray = explode(" ", $message);//divide a string into multiple string and makes a new array
    print_r($strArray);
    $counter = count($strArray);//counts the items inside of an array
    echo "The array above has $counter items";
    echo "</pre>";

    //fileType checker
    $file = "filename.jpg";
    $file = explode(".", $file);
    $fileType = end($file);//end method returns the last item  of an array
    
    if($fileType != 'png'){
        echo "$fileType is not supported yet. Please use png instead<br> <br>";
    }
    $arr1 = [ "I", "am", "before"];
    $arr2 = [ "I", "am", "after"];

    print_r(array_diff($arr1, $arr2));//compares 2 arrays and returns an element from first array that is not matching with 2nd array
    echo "<br>";
    print_r(array_diff($arr2, $arr1));
    echo "<br>";

echo "</div>";


//column 2
echo "<div class=\"col-2\">";

   
    #11.1 push & pop
    $fruits = [
        "🍎",
        "🥭",
        "🍍"
    ];
    echo "//Default array<br>";
    print_r($fruits);
    echo "<br>";
    array_push($fruits, "🍌", "🍒");//adds "🍌" & "🍒" at the end of the array
    echo "//Added 🍌, 🍒 in the end<br>";
    print_r($fruits);
    
    $poped = array_pop($fruits);//removes the last item
    echo "<br>after removing $poped, the new list is :<ul>
        <li>$fruits[0]</li>
        <li>$fruits[1]</li>
        <li>$fruits[2]</li>
        <li>$fruits[3]</li>
        </ul>";
    
    #11.2 unshft & shift
    // they are basically same as push & pop but they add & remove stuffs in the beginning of an array
    $animals = [
        "🐒",
        "🦓",
        "🐄",
        "🐇"
    ];
    echo "//Default array<br>";
    print_r($animals);
    echo "<br>";
    echo "//Added 🐶 🐊 in the begining<br>";
    array_unshift($animals, "🐶", "🐊");
    print_r($animals); 
    echo "<br>";

    $shifted = array_shift($animals);//will remove an item from the stat
    echo "after removing $shifted, the new list is :<ul>
        <li>$animals[0]</li>
        <li>$animals[1]</li>
        <li>$animals[2]</li>
        <li>$animals[3]</li>
        </ul>";
    #11.3 array_reverse & in_array
    echo "//Default array<br>";
    $array= ["a","b", "c", "d", "e"];
    print_r($array);
    echo "<br>";
    $reverse = array_reverse($array);//reversed
    echo "//Reversed array<br>";
    print_r($reverse);
    echo "<br>";
    echo "//will return true if \$array has \"d\" as an item.<br>";
    var_dump(in_array("d", $array));//will return true if $array has "d"
echo "</div>";
