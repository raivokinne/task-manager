<?php view('components/head', ['title' => 'Calendar']) ?>
<div class="container mx-auto mt-10">
    <div class="wrapper bg-white rounded shadow w-full">
        <div class="header flex justify-between border-b p-2">
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
                        echo '<th class="p-2 border-r h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">';
                        echo $day;
                        echo '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center h-20">
                    <?php
                    $day = 1;
                    $currentDayOfWeek = 0;
                    $today = date('j');
                    $todayMonth = date('n');
                    $todayYear = date('Y');

                    while ($day <= $daysInMonth) {
                        echo '<tr class="text-center h-20">';

                        for ($i = 1; $i <= 7; $i++) {
                            if ($currentDayOfWeek >= $firstDayOfWeek && $day <= $daysInMonth) {
                                $highlightClass = $day == $today && $currentMonth == $todayMonth && $currentYear == $todayYear ? 'bg-blue-200' : '';
                                echo '<td class="border-2 shadow-lg p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300 ' . $highlightClass . '">';
                                echo '<div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10 overflow-hidden">';
                                echo '<div class="top h-5 w-full"><span class="text-gray-500">' . $day . '</span></div>';
                                echo '<div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>';
                                echo '</div>';
                                echo '</td>';
                                $day++;
                            } else {
                                echo '<td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10"></td>';
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
