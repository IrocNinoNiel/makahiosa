@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<div class="container my-5">
    <div class="row">
        <div class="col-lg-4">
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="col-lg-4">
            <canvas id="myChart1"></canvas>
        </div>
        <div class="col-lg-4">
            <canvas id="myChart2"></canvas>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">Upcoming Events</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Event name</th>
                        <th scope="col">Event Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>General Assembly</td>
                        <td>June 23, 2022</td>
                        <td>
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-location-arrow"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">View</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Dummy Event 1</td>
                        <td>July 01, 2022</td>
                        <td>
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-location-arrow"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">View</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Dummy Event 2</td>
                        <td>July 03, 2022</td>
                        <td>
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-location-arrow"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">View</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted mt-5">
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MAKAHIOSA</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = [
        'SITE',
        'CSTE',
        'FAESO',
        'GDSC',
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(100, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            data: [10, 5, 2, 20],
        }]
    };

    const data1 = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(100, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            data: [20, 15, 32, 20],
        }]
    };

    const data2 = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(100, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            data: [2, 5, 3, 2],
        }]
    };

    const config = {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Total Number of Events Per Org'
                }
            }
        }
    };

    const config1 = {
        type: 'doughnut',
        data: data1,
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Events Per Org This Year'
                }
            }
        }
    };

    const config2 = {
        type: 'pie',
        data: data2,
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Total Number of Upcoming Events Per Org'
                }
            }
        }
    };
</script>

<script>
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
    const myChart1 = new Chart(
        document.getElementById('myChart1'),
        config1
    );
    const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
    );
</script>
@endsection
