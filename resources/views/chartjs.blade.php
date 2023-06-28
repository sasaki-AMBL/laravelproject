<html>
<body>
    <form action="" method="GET">
        <select name="year">年度選択
            <option value="2023">2023</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
        </select>
        <input type="submit">選択
    </form>
    <div>
        <canvas id="myChart"></canvas>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
