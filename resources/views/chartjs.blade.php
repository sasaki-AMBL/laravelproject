<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            分析用
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                 <div>
                  <form action="{{ route('owner.item.chartjs')}}" method="get">
                    <select name="year">
                      <option selected disabled>全年度</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      </select>
                      <button type="submit">グラフ描画</button>
                  </form>
                  {{ $year }}総売り上げ:{{ $sum }}
                    <canvas id="myChart"></canvas>
                  </div>
                </div>
            </div>
        </div>
    </div>
<!-- npm installしたけれどうまく認識されず.. cdnで暫定対応 -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    //import Chart from "chart.js/auto";
  // phpの変数を jsの変数に置き換える必要がある
  const year = <?php echo json_encode($year); ?>;
  const name_list = <?php echo json_encode($name_list); ?>;
  const earnings_list = <?php echo json_encode($earnings_list); ?>;

  const ctx = document.getElementById("myChart").getContext("2d");
  const myChart = new Chart(ctx, {
  type: "bar",
  data: {
      labels: name_list,
      datasets: [
          {
              label: year,
              data: earnings_list,
              backgroundColor: [
                  "rgba(255, 99, 132, 0.2)",
                  "rgba(54, 162, 235, 0.2)",
                  "rgba(255, 206, 86, 0.2)",
                  "rgba(75, 192, 192, 0.2)",
                  "rgba(153, 102, 255, 0.2)",
                  "rgba(255, 159, 64, 0.2)",
              ],
              borderColor: [
                  "rgba(255, 99, 132, 1)",
                  "rgba(54, 162, 235, 1)",
                  "rgba(255, 206, 86, 1)",
                  "rgba(75, 192, 192, 1)",
                  "rgba(153, 102, 255, 1)",
                  "rgba(255, 159, 64, 1)",
              ],
              borderWidth: 1,
          },
      ],
  },
  options: {
      scales: {
          y: {
              beginAtZero: true,
          },
      },
  },
});
    </script>

</x-app-layout>
