<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Calendar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .calendar {
            width: 300px;
            margin: 0 auto;
            text-align: center;
        }

        .month {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
        }

        .weekdays {
            display: flex;
            background-color: #ddd;
        }

        .weekdays div {
            width: 14.28%;
            padding: 10px 0;
        }

        .days {
            display: flex;
            flex-wrap: wrap;
        }

        .day {
            width: 14.28%;
            padding: 10px 0;
            border: 1px solid #ddd;
        }

        .present {
            animation: blink-green 1s infinite;
        }

        .absent {
            animation: blink-red 1s infinite;
        }

        @keyframes blink-green {
            0% { background-color: green; }
            50% { background-color: white; }
            100% { background-color: green; }
        }

        @keyframes blink-red {
            0% { background-color: red; }
            50% { background-color: white; }
            100% { background-color: red; }
        }
    </style>
</head>
<body>

    <?php
	error_reporting(0);
    if (isset($_POST['btn'])) {
        $date = $_POST['month'];
	}
	?>

    <form method="post" action="">
        <input type="month" name="month" value="<?php echo $date; ?>" required>
        <button type="submit" name="btn">Submit</button>
    </form>

    <?php
    if (isset($_POST['btn'])) {
        $date = $_POST['month'];
        $timestamp = strtotime($date . "-01");
        $daysInMonth = date("t", $timestamp);
        $monthName = date("F Y", $timestamp);
        $firstDayOfMonth = date("w", $timestamp);

        // Example attendance data
        $attendance = [
            1 => 'present',
            3 => 'absent',
            10 => 'absent',
            14 => 'present',
            22 => 'present',
            25 => 'absent',
            30 => 'present'
        ];

        echo "<div class='calendar'>";
        echo "<div class='month'><h2>$monthName</h2></div>";
        echo "<div class='weekdays'>
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
              </div>";
        echo "<div class='days'>";

        // Print empty days before the first day of the month
        for ($i = 0; $i < $firstDayOfMonth; $i++) {
            echo "<div class='day'></div>";
        }

        // Print days with attendance status
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $class = isset($attendance[$day]) ? $attendance[$day] : '';
            echo "<div class='day $class'>$day</div>";

            // Break the line after Saturday
            if (($day + $firstDayOfMonth) % 7 == 0) {
                echo "<div class='days'></div>";
            }
        }

        echo "</div>";
    }
    ?>
</body>
</html>
