<?php view('components/head', ['title' => 'Calendar']) ?>
<div class="container mx-auto mt-10">
    <div class="w-full bg-white">
        <div class="flex justify-between p-2">
            <span class="text-lg font-bold"><?php echo date('F Y', strtotime("$currentYear-$currentMonth-01")) ?></span>
            <div class="buttons">
                <button class="p-1" onclick="prevMonth(<?php echo $currentMonth . ',' . $currentYear ?>)">
                    &lt;</button>
                <button class="p-1" onclick="nextMonth(<?php echo $currentMonth . ',' . $currentYear ?>)">&gt;</button>
            </div>
        </div>
        <table class="w-full">
            <thead>
                <tr>
                    <?php
                    $daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                    foreach ($daysOfWeek as $day) {
                        echo '<th class="w-10 h-10 p-2 text-xs border xl:w-40 lg:w-30 md:w-30 sm:w-20 xl:text-sm">';
                        echo $day;
                        echo '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <tr class="h-20 text-center">
                    <?php
                    $day = 1;
                    $currentDayOfWeek = 0;
                    $today = date('j');
                    $todayMonth = date('n');
                    $todayYear = date('Y');

                    while ($day <= $daysInMonth) {
                        echo '<tr class="h-20 text-center">';
                        for ($i = 1; $i <= 7; $i++) {
                            if ($currentDayOfWeek >= $firstDayOfWeek && $day <= $daysInMonth) {
                                $highlightClass = $day == $today && $currentMonth == $todayMonth && $currentYear == $todayYear ? 'bg-blue-200' : '';
                                echo '<td class="w-10 h-40 p-1 overflow-auto transition duration-500 border cursor-pointer xl:w-40 lg:w-30 md:w-30 sm:w-20 ease hover:bg-gray-300 ' . $highlightClass . '">';
                                echo '<div class="flex flex-col w-10 h-40 mx-auto overflow-hidden xl:w-40 lg:w-30 md:w-30 sm:w-full">';
                                echo '<div class="w-full h-5 top"><span class="text-gray-500">' . $day . '</span></div>';
                                echo '<div class="grid w-full gap-4 bottom">';
                                if (!empty($tasks) && count($tasks) > 0) {
                                    foreach ($tasks as $task) {
                                        if ($task['deadline'] == $currentYear . '-' . $currentMonth . '-' . $day) {
                                            $endDeadlineClass = $task['status'] == 'finish' ? "bg-green-300" : ($task['status'] == 'doing' ? "bg-amber-400" : ($task['status'] == 'end' ? "bg-red-300" : ""));
                                            echo '<div class="flex items-center justify-center w-full h-5 text-white ' .
                                                $endDeadlineClass . ' rounded-full">';
                                            echo '<a href="/tasks/' . $task['id'] . '" class="font-semibold underline">' . $task['title'] . '</a>';
                                            echo '</div>';
                                        }
                                    }
                                }
                                echo '</div>';
                                echo '</td>';
                                $day++;
                            } else {
                                echo '<td class="w-10 h-40 p-1 border xl:w-40 lg:w-30 md:w-30 sm:w-20"></td>';
                            }
                            $currentDayOfWeek++;
                        }
                        echo '</tr>';
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php view('components/footer') ?>