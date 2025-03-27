<!DOCTYPE html>
<html lang="en">
<head>
    <title>Build</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include('header.php'); ?>
    <?php include_once('includes/connect.php'); ?>

    <main class="responseB">
        <div>
            <?php
                $sql = "SELECT * FROM mytable;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                echo "<div class='response'>
                    <h1 class='welcomeR'>Welcome {$_SESSION['username']}! </h1>
                </div>";
            ?>
            <div class="build">
                <label for="buildT">Choose Build Type:</label>
                <select name="build-type" id="buildT" onchange="toggleForms()">
                    <option value="">Select...</option>
                    <option value="attack">Attack</option>
                    <option value="defense">Defense</option>
                    <option value="range">Range</option>
                    <option value="heal">Heal</option>
                </select>

                <!-- Attack Build Form -->
                <form id="attackForm" style="display: none;">
                    <h2>Attack Build</h2>
                    <label for="attack-weapon">Weapon:</label>
                    <input type="text" id="attack-weapon" name="attack-weapon" placeholder="Enter attack weapon">
                    <button type="submit">Submit</button>
                </form>

                <!-- Defense Build Form -->
                <form id="defenseForm" style="display: none;">
                    <h2>Defense Build</h2>
                    <label for="defense-armor">Armor:</label>
                    <input type="text" id="defense-armor" name="defense-armor" placeholder="Enter defense armor">
                    <button type="submit">Submit</button>
                </form>

                <!-- Range Build Form -->
                <form id="rangeForm" style="display: none;">
                    <h2>Range Build</h2>
                    <label for="range-bow">Bow:</label>
                    <input type="text" id="range-bow" name="range-bow" placeholder="Enter range weapon">
                    <button type="submit">Submit</button>
                </form>

                <!-- Heal Build Form -->
                <form id="healForm" style="display: none;">
                    <h2>Heal Build</h2>
                    <label for="heal-staff">Healing Item:</label>
                    <input type="text" id="heal-staff" name="heal-staff" placeholder="Enter healing item">
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </main>

    <?php include('footer.php'); ?>

    <script>
        function toggleForms() {
            let selectedBuild = document.getElementById("buildT").value;

            // Hide all forms first
            document.getElementById("attackForm").style.display = "none";
            document.getElementById("defenseForm").style.display = "none";
            document.getElementById("rangeForm").style.display = "none";
            document.getElementById("healForm").style.display = "none";

            // Show the selected form
            if (selectedBuild === "attack") {
                document.getElementById("attackForm").style.display = "block";
            } else if (selectedBuild === "defense") {
                document.getElementById("defenseForm").style.display = "block";
            } else if (selectedBuild === "range") {
                document.getElementById("rangeForm").style.display = "block";
            } else if (selectedBuild === "heal") {
                document.getElementById("healForm").style.display = "block";
            }
        }
    </script>

</body>
</html>
