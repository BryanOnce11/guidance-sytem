(function () {
    "use strict";

    // Chart
    if ($(".horizontal-bar-chart").length) {
        const ctx = $(".horizontal-bar-chart")[0].getContext("2d");
        const horizontalBarChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: [
                    "Sem1 2021",
                    "Sem2 2021",
                    "Sem1 2022",
                    "Sem2 2022",
                    "Sem1 2023",
                    "Sem2 2023",
                    "Sem1 2024",
                    "Sem2 2024",
                ],
                datasets: [
                    {
                        label: "Female Students",
                        barPercentage: 0.5,
                        barThickness: 6,
                        maxBarThickness: 8,
                        minBarLength: 2,
                        data: [50, 75, 100, 120, 150, 180, 200, 250], // Example data for female students
                        backgroundColor: () => getColor("primary"),
                    },
                    {
                        label: "Male Students",
                        barPercentage: 0.5,
                        barThickness: 6,
                        maxBarThickness: 8,
                        minBarLength: 2,
                        data: [60, 85, 110, 140, 160, 200, 220, 270], // Example data for male students
                        backgroundColor: () =>
                            $("html").hasClass("dark")
                                ? getColor("darkmode.200")
                                : getColor("slate.300"),
                    },
                ],
            },
            options: {
                indexAxis: "y",
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: getColor("slate.500", 0.8),
                        },
                    },
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: getColor("slate.500", 0.8),
                            callback: function (value, index, values) {
                                return value; // No "$" since these are student counts
                            },
                        },
                        grid: {
                            display: false,
                        },
                        border: {
                            display: false,
                        },
                    },
                    y: {
                        ticks: {
                            font: {
                                size: "12",
                            },
                            color: getColor("slate.500", 0.8),
                        },
                        grid: {
                            color: () =>
                                $("html").hasClass("dark")
                                    ? getColor("slate.500", 0.3)
                                    : getColor("slate.300"),
                        },
                        border: {
                            dash: [2, 2],
                            display: false,
                        },
                    },
                },
            },
        });

        // Watch class name changes
        helper.watchClassNameChanges($("html")[0], (currentClassName) => {
            horizontalBarChart.update();
            console.log("test", $(".horizontal-bar-chart")[0]); // Check if the canvas element is being found
        });
    }

})();
