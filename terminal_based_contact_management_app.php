<?php
/*
Create a Terminal-Based Menu

1. Use a while loop to repeatedly display the menu options:

Add Contact

View Contacts

Exit

2. Use conditionals ( if-else or switch ) to handle the user’s choice:

For invalid input, display the message: "Invalid choice. Please try again."
Handle User Input

1. Use readline() to take inputs from the user for:

Menu selection

Contact details (name, email, phone)

2. Ensure the inputs for name, email, and phone are passed to the addContact function.

Exit the App Gracefully

1. When the user chooses the "Exit" option:

Display a goodbye message: "Exiting..."

Terminate the script.
*/

echo "🚀🚀 Welcome to our Contact Management System 🚀🚀\n";
echo "📇 Keep your contacts organized and accessible! 🎉\n\n";

function intro()
{
    echo "📌 Please select an option:\n";
    echo "🔹 Press 1️⃣ to add a new contact\n";
    echo "🔹 Press 2️⃣ to view your contact list\n";
    echo "🔹 Press 3️⃣ to exit the system\n";
}

intro();

function takeDecision()
{
    $decision = trim(fgets(STDIN));
    return strtolower($decision) === "yes";
}

$contacts = [];

function showList()
{
    global $contacts;
    echo "\n📜 Contact List 📜\n";

    if (count($contacts) === 0) {
        echo "😢 Oops! You don't have any contacts yet. Add one to get started! ✨\n\n";
        return;
    }

    foreach ($contacts as $contact) {
        echo "👤 Name: " . $contact['name'] . "\n";
        echo "📧 Email: " . $contact['email'] . "\n";
        echo "📞 Phone: " . $contact['phone'] . "\n";
        echo "------------------------\n";
    }
}

do {
    $userInput = trim(fgets(STDIN));

    if (! in_array($userInput, ["1", "2", "3"])) {
        echo "❌ Invalid option! Please enter 1️⃣, 2️⃣, or 3️⃣.\n";
        continue;
    }

    if ($userInput === "1") {
        echo "📝 You are about to add a new contact. Proceed? (Yes/No) \n";

        if (takeDecision()) {
            echo "✍️ Enter your name: ";
            $name = trim(fgets(STDIN));
            echo "📧 Enter your email: ";
            $email = trim(fgets(STDIN));
            echo "📞 Enter your phone: ";
            $phone = trim(fgets(STDIN));

            array_push($contacts, ["name" => $name, "email" => $email, "phone" => $phone]);

            echo "\n🎉🚀 Success! Your contact has been added. 🚀🎉\n";
            echo "🌟 Choose next action:\n";
            echo "1️⃣ Add another contact\n";
            echo "2️⃣ View contact list\n";
            echo "3️⃣ Exit\n";
        } else {
            intro();
        }

    } elseif ($userInput === "2") {
        echo "📂 Viewing contact list. Proceed? (Yes/No)\n";

        if (takeDecision()) {
            showList();
        } else {
            intro();
        }
    } else {
        echo "⚠️ Are you sure you want to exit? (Yes/No)\n";

        if (takeDecision()) {
            echo "👋 Goodbye! Have a great day! 🌟\n";
            exit;
        } else {
            intro();
        }
    }
} while (true);
