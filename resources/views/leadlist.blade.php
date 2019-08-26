<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css" />

    <link rel="stylesheet" type="text/css"  href="{{  asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{  asset('css/leadlist.css') }}">

    <title>DrinkPrime | Lead List</title>
</head>

<body>
    <aside class="sidebar">
        <a href="/login">
            <h3 class="brand">DrinkPrime</h3>
        </a>
        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
            <div role="tab" id="headingOne1" class="menu">
                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                    aria-controls="collapseOne1">
                    <h5>
                        <span>$ Sales </span><i class="fa fa-angle-down"></i>
                    </h5>
                </a>
            </div>
            <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                data-parent="#accordionEx">
                <ul class="submenu">
                    <li><a href="/createlead">Create Lead</a></li>
                    <li><a class="active" href="/leadlist">View Lead</a></li>
                </ul>
            </div>
        </div>
    </aside>
    <section class="main">
        <nav class="appHeader stickyHeader">
            <ul class="nav">
                <i class="fa fa-bars"></i>
            </ul>
        </nav>
        <main class="main-content">
            <div class="content-header">
                <div class="PageInfo">
                    <h1 class="page-title">New Leads</h1>
                </div>
            </div>
            <div class="content-body">
                <div class="container">
                    <table class="table" id="leadTable">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Lead Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Inquiry Date</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($leads as $lead)
                            <tr>
                                <th scope="row">{{ $lead->id }}</th>
                                <td>{{ $lead->name }}</td>
                                <td>{{ $lead->contact}}</td>
                                <td>{{ $lead->created_at }}</td>
                                <td>{{ $lead->email }}</td>
                                <td>
                                    <form action="{{ url('viewlead/'.$lead->id) }}" method="GET">
                                        <button type="submit" class="btn btn-primary">
                                             View Lead
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        </nav>
    </section>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#leadTable').DataTable();
        });
    </script>
</body>

</html>