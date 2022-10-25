<?php
//basic syntax for PHP
     $variableName = "Some data";
    //every variable should start with a $ sign & every data has a dataType
    #note every statement should end with a ; (semicolon)

//variables
    #variables are a number of user defined human-readable words to store data & make
    #the program more readable
     //e.g title, subTitle, isReadable, age, height etc.

// data types
    # there are three data types available in php
        #1. string dataType
        #2. boolean dataType
        #3. number dataType
            //number has 2 forms
            #a. integer
            #b. float or double

//string dataType
    $title = "This is a string value";
    $subTitle = 'This is a string value as well';
    //string dataTypes are normally stored inside single  or double quotes 
    
//boolean dataType
    $isReadable = true;
    //boolean dataTypes return only two values true or false based on its condition
    
//number dataTypes
    $age = 18;
    //number has to kinds of data
     #integer &
     #float OR double

     #integer
        $age = 21;
        //integer represents a whole number that is not a fraction
    
    #float or double
        $height = 5.9;
        //float represents  a fraction

//how to print something in PHP?
    echo "Print something";

    //But to create a new line, we need to use <br> tag from html
    echo "<br>";
    echo "New Line Printd";
    echo "<br>";
    //we can also print variables that are already assigned
    echo $title;

//not only <br> tag, we can use any valid html tag we want
    echo "<title>Lessons for PHP</title>";
    #we must enclose the html syntax inside single quotes or double quotes 

//sometimes we can get some errors while using html tags even inside double quotes
    //like this
    // echo "<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"> <!-- uncomment this line to see error -->";

//so instead we use single quotes to wrap html syntax
    echo '<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">'; 


//concatenation
    /*
    concatination is a way to merge different datas of different types or same type.
    We can use concatination in almost every programming language so its important to
    know
    */
    $con = 'Concatination';
    echo '<br/>';
    echo 'This is a ' . $con;//a .(dot) is used to concatenate in php
    echo '<br/>';
    echo 'we can also use ' . $con . ' to concatenate multiple data types like ' . 123 . ' , ' . true . ' , ' . false . ' etc.';
    echo '<br/>';
    //but this type of concatenation is very messy so we will use double quotes instead
    # to use this approach we have to assign the data before we concatenate
    $myName = 'John Doe';
    $myAge = 18;
    $myGames = "Chess, Football & Vollyball";
    echo "HI, I am $myName. I am $myAge years old. I like to play $myGames ";

/*
#important notes about variables
    #variable has a naming system that needs to be followed
        Not Allowed ❌
        #1. variable name can't start with numbers(e.g. 1stPlayer, 1stPrize etc...)
        #2. varable name can't have spaces(e.g. my name)
        #3. varable name can't contain any special characters(e.g. @#!$%^&*_+)
        #4. reserved keywords can't be used as variables (e.g for, while, if, define etc.)
        #5. php is case sensitive so  myName and myname are different variables

        allowed ✔️
        #6. use underscore(_) instad of spaces
        #7. use meaningful variables and avoid random names for variables(e.g. ❌$a = 18; ✔️$age = 18; )
        #8. use one of the popular naming convention like camelCasing(e.g. myName, hisName, isLogin) and underscore(e.g. my_name, his_name, is_login)
*/
?>