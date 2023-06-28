import Chart from "chart.js/auto";

const ctx = document.getElementById("myChart").getContext("2d");
const myChart = new Chart(ctx, {
    type: "doughnut",
    data: {
        labels: ["月", "火曜", "水曜", "木曜", "金曜", "土曜", "日曜"],
        datasets: [
            {
                label: "data 1",
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(255, 206, 86, 0.2)",
                    "rgba(75, 192, 192, 0.2)",
                    "rgba(153, 102, 255, 0.2)",
                    "rgba(255, 159, 64, 0.2)",
                ],
            },
        ],
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: "top",
            },
            title: {
                display: true,
                text: "ドーナツチャート",
            },
        },
    },
});

axios
    .post("/owner/item/chart-get", { year: this.year })
    //.get("/owner/item/chart-get")
    .then((response) => {
        // Chartの更新
        myChart.data.labels = response.data[1];
        myChart.data.datasets[0].data = response.data[0];
        alert(response.data[2]);
        myChart.update();
    })
    .catch(() => {
        alert("失敗しました");
    });
