<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <?php

    function displayMenu() {
        echo "\nPHP Loops Activities Menu:\n";
        echo "1. Number Counter\n";
        echo "2. Password Validator\n";
        echo "3. Multiplication Table\n";
        echo "4. Loop Control with break and continue\n";
        echo "5. Sum of Numbers\n";
        echo "6. Array Iteration with foreach\n";
        echo "7. Key-Value Pairs with foreach\n";
        echo "8. Factorial Calculator\n";
        echo "9. FizzBuzz Challenge\n";
        echo "10. Prime Number Checker\n";
        echo "11. Fibonacci Sequence\n";
        echo "12. Reverse a String\n";
        echo "0. Exit\n";
        echo "Enter your choice (0-12): ";
    }

    function numberCounter() {
        echo "Numbers from 1 to 10:\n";
        $i = 1;
        while ($i <= 10) {
            echo $i . " ";
            $i++;
        }
        echo "\n\nEven numbers between 1 and 20:\n";
        $i = 2;
        while ($i <= 20) {
            echo $i . " ";
            $i += 2;
        }
        echo "\n";
    }

    function passwordValidator() {
        $correct_password = "password123";
        $attempt = "";
        do {
            $attempt = readline("Please enter the password: ");
            if ($attempt !== $correct_password) {
                echo "Incorrect password.\n";
            }
        } while ($attempt !== $correct_password);
        echo "Access Granted.\n";
    }

    function multiplicationTable() {
        $number = 7;
        for ($i = 1; $i <= 10; $i++) {
            $result = $number * $i;
            echo "$number x $i = $result\n";
        }
    }

    function loopControl() {
        for ($i = 1; $i <= 10; $i++) {
            if ($i == 5) {
                continue;
            }
            if ($i > 8) {
                break;
            }
            echo $i . " ";
        }
        echo "\n";
    }

    function sumOfNumbers() {
        $sum = 0;
        $i = 1;
        while ($i <= 100) {
            $sum += $i;
            $i++;
        }
        echo "The sum of numbers from 1 to 100 is: $sum\n";
    }

    function arrayIteration() {
        $favorite_movies = [
            "The Shawshank Redemption",
            "Inception",
            "The Dark Knight",
            "Interstellar",
            "Parasite"
        ];
        $i = 1;
        foreach ($favorite_movies as $movie) {
            echo "$i. $movie\n";
            $i++;
        }
    }

    function keyValuePairs() {
        $student = [
            "Name" => "Alice",
            "Age" => 20,
            "Grade" => "A",
            "City" => "Baguio"
        ];
        foreach ($student as $key => $value) {
            echo "$key: $value\n";
        }
    }

    function factorialCalculator() {
        function factorial($n) {
            $result = 1;
            for ($i = 2; $i <= $n; $i++) {
                $result *= $i;
            }
            return $result;
        }
        $number = 5;
        $fact = factorial($number);
        echo "Factorial of $number is: $fact\n";
    }

    function fizzBuzz() {
        for ($i = 1; $i <= 50; $i++) {
            if ($i % 3 == 0 && $i % 5 == 0) {
                echo "FizzBuzz ";
            } elseif ($i % 3 == 0) {
                echo "Fizz ";
            } elseif ($i % 5 == 0) {
                echo "Buzz ";
            } else {
                echo "$i ";
            }
        }
        echo "\n";
    }

    function primeChecker() {
        function isPrime($num) {
            if ($num <= 1) return false;
            for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i == 0) return false;
            }
            return true;
        }
        $number = 17;
        if (isPrime($number)) {
            echo "$number is a prime number.\n";
        } else {
            echo "$number is not a prime number.\n";
        }
    }

    function fibonacciSequence() {
        $n1 = 0;
        $n2 = 1;
        $count = 0;
        while ($count < 10) {
            echo $n1 . " ";
            $n3 = $n1 + $n2;
            $n1 = $n2;
            $n2 = $n3;
            $count++;
        }
        echo "\n";
    }

    function reverseString() {
        function reverse($str) {
            $length = strlen($str);
            $reversed = '';
            for ($i = $length - 1; $i >= 0; $i--) {
                $reversed .= $str[$i];
            }
            return $reversed;
        }
        $input = "Hello";
        $output = reverse($input);
        echo "Input: \"$input\"\n";
        echo "Output: \"$output\"\n";
    }

    // Main program loop
    do {
        displayMenu();
        $choice = trim(fgets(STDIN));

        switch ($choice) {
            case '1':
                numberCounter();
                break;
            case '2':
                passwordValidator();
                break;
            case '3':
                multiplicationTable();
                break;
            case '4':
                loopControl();
                break;
            case '5':
                sumOfNumbers();
                break;
            case '6':
                arrayIteration();
                break;
            case '7':
                keyValuePairs();
                break;
            case '8':
                factorialCalculator();
                break;
            case '9':
                fizzBuzz();
                break;
            case '10':
                primeChecker();
                break;
            case '11':
                fibonacciSequence();
                break;
            case '12':
                reverseString();
                break;
            case '0':
                echo "Exiting the program. Goodbye!\n";
                break;
            default:
                echo "Invalid choice. Please try again.\n";
        }
    } while ($choice != '0');

    ?>
    </body>
</html>