<?php
$easy_level_question = [
    "question_1"  => ["What is the capital of France?", "Berlin", "Madrid", "Paris", "Rome", "Paris"],
    "question_2"  => ["How many continents are there on Earth?", "5", "6", "7", "8", "7"],
    "question_3"  => ["What is 5 + 7?", "10", "11", "12", "13", "12"],
    "question_4"  => ["How many planets are there in the solar system?", "7", "8", "9", "10", "8"],
    "question_5"  => ["What is the opposite of 'hot'?", "Warm", "Cool", "Cold", "Ice", "Cold"],
    "question_6"  => ["Who wrote *Romeo and Juliet*?", "Charles Dickens", "William Shakespeare", "J.K. Rowling", "Mark Twain", "William Shakespeare"],
    "question_7"  => ["What is the national animal of the USA?", "Lion", "Bald Eagle", "Bear", "Wolf", "Bald Eagle"],
    "question_8"  => ["How many legs does a spider have?", "6", "8", "10", "12", "8"],
    "question_9"  => ["What planet do we live on?", "Mars", "Venus", "Earth", "Jupiter", "Earth"],
    "question_10" => ["What do bees make?", "Sugar", "Wax", "Pollen", "Honey", "Honey"],
];

$medium_level_question = [
    "question_1"  => ["Who painted the Mona Lisa?", "Vincent van Gogh", "Pablo Picasso", "Leonardo da Vinci", "Claude Monet", "Leonardo da Vinci"],
    "question_2"  => ["What is the square root of 144?", "10", "11", "12", "13", "12"],
    "question_3"  => ["In what year did World War II end?", "1942", "1943", "1944", "1945", "1945"],
    "question_4"  => ["What is the chemical symbol for Gold?", "Ag", "Au", "Pt", "Pb", "Au"],
    "question_5"  => ["Who discovered gravity?", "Albert Einstein", "Galileo Galilei", "Isaac Newton", "Nikola Tesla", "Isaac Newton"],
    "question_6"  => ["What is the largest ocean on Earth?", "Atlantic Ocean", "Indian Ocean", "Arctic Ocean", "Pacific Ocean", "Pacific Ocean"],
    "question_7"  => ["What is the currency of Japan?", "Dollar", "Yen", "Euro", "Won", "Yen"],
    "question_8"  => ["How many hearts does an octopus have?", "1", "2", "3", "4", "3"],
    "question_9"  => ["What is the capital of Canada?", "Toronto", "Vancouver", "Ottawa", "Montreal", "Ottawa"],
    "question_10" => ["Which gas do plants use for photosynthesis?", "Oxygen", "Nitrogen", "Carbon Dioxide", "Hydrogen", "Carbon Dioxide"],
];

$hard_level_question = [
    "question_1"  => ["What is the smallest country in the world?", "Monaco", "San Marino", "Vatican City", "Liechtenstein", "Vatican City"],
    "question_2"  => ["What is the chemical formula for table salt?", "NaCl", "KCl", "CaCl2", "MgCl2", "NaCl"],
    "question_3"  => ["Who developed the theory of relativity?", "Isaac Newton", "Albert Einstein", "Niels Bohr", "Galileo Galilei", "Albert Einstein"],
    "question_4"  => ["What is the hardest natural substance on Earth?", "Gold", "Iron", "Diamond", "Platinum", "Diamond"],
    "question_5"  => ["How many bones are in the human body?", "204", "205", "206", "207", "206"],
    "question_6"  => ["What is the capital of New Zealand?", "Auckland", "Christchurch", "Wellington", "Hamilton", "Wellington"],
    "question_7"  => ["Who was the first person to set foot on the moon?", "Buzz Aldrin", "Yuri Gagarin", "Neil Armstrong", "Michael Collins", "Neil Armstrong"],
    "question_8"  => ["What is the powerhouse of the cell?", "Nucleus", "Ribosome", "Mitochondria", "Chloroplast", "Mitochondria"],
    "question_9"  => ["Which element has the atomic number 1?", "Helium", "Hydrogen", "Lithium", "Beryllium", "Hydrogen"],
    "question_10" => ["What is the longest river in the world?", "Amazon", "Nile", "Yangtze", "Mississippi", "Nile"],
];

echo "🎉🎉 WELCOME TO THE 'AWESOME QUIZZZZ' 🎉🎉\n";
echo "🟢 Choose your level:\n";
echo "1️⃣ Easy\n";
echo "2️⃣ Medium\n";
echo "3️⃣ Hard\n";
echo "➡️ Enter your choice: ";

$level = fgets(STDIN);
echo $level;
if (! is_numeric($level)) {
    echo "Please enter a valid number" . "\n";
    exit;
} elseif (! (intval($level) === 1 || intval($level) === 2 || intval($level) === 3)) {
    echo "⚠️ Please enter a valid number: 1, 2, or 3\n";
    exit;
} else {
    if (intval($level) === 1) {
        startQuiz($easy_level_question, "easy");
    } else if (intval($level) === 2) {
        startQuiz($medium_level_question, "medium");
    } else {
        startQuiz($hard_level_question, "hard");
    }
}

function startQuiz($questions, $chosenLevel)
{
    echo "✅ You selected **$chosenLevel Level**! 🎯\n";
    echo "🎇🎇 Are you excited to begin with? 🎇🎇" . "\n";
    $startTimer = 5;
    while ($startTimer > 0) {
        echo "⏳ Get ready... starting soon! ⏳\n";
        sleep(1);
        $startTimer--;
    }
    echo "\r🚀🚀 Let's start! 🚀🚀     \n";
    sleep(2);
    $score = 0;
    foreach ($questions as $value) {
        echo $value[0] . "\n";
        // randomizing the options
        $options = [$value[1], $value[2], $value[3], $value[4]];
        shuffle($options);
        // to store the options against the options value
        $optionsArray = [];
        foreach ($options as $index => $option) {
            $optionsArray[$index + 1] = $option;
            echo($index + 1) . ") " . $option . "\n";
        }
        // 🔒 Restrict Input to 1, 2, 3, or 4
        do {
            echo "✏️ Enter your answer (1-4): ";
            $answer = trim(fgets(STDIN));
            if (! is_numeric($answer) || intval($answer) < 1 || intval($answer) > 4) {
                echo "🚫 Invalid input! Please enter a number between 1 and 4.\n";
            }
        } while (! is_numeric($answer) || intval($answer) < 1 || intval($answer) > 4);

        // 🎯 Check Answer
        $selectedAnswer = $optionsArray[intval($answer)];
        if ($selectedAnswer === $value[5]) {
            echo "✅ Correct! 🎉\n";
            $score++;
        } else {
            echo "❌ Wrong! The correct answer was **" . $value[5] . "**\n";
        }
        sleep(1);
    }
    echo "⌚⌚ Calculating Your Score ⌚⌚" . "\n";
    sleep(3);
    echo "\n📊 **Your final score: $score/" . count($questions) . "** 📊\n";
    if ($score == count($questions)) {
        echo "🏆 PERFECT SCORE! You are a genius! 🎓\n";
    } elseif ($score >= count($questions) / 2) {
        echo "👏 Great job! You did well! 🌟\n";
    } else {
        echo "😢 Better luck next time! Keep practicing! 📚\n";
    }
}
