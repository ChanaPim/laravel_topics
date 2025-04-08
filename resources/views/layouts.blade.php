<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary " data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Chanapa Suesat System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav ms-auto">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('topicform')}}">New Topic</a>
            </li>
        </ul> 
        </div> -->
    </div>
    </nav>
    <div class="container py-2">
        @yield('content')
    </div>

</body>
</html>