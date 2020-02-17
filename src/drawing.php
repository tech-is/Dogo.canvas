<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <!-- Navbar content -->
            <a class="navbar-brand" href="#">Gallery</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="drawing.php">Drawing</a>
                </li>
                </ul>
            </div>
        </nav>
    </header>

    <section>
        <div class="container">
            <div class="my-4 text-center">
                <h1>Your Canvas</h1>
            </div>
            <div class="border rounded" id="wrap">
                <canvas id="canvas"></canvas>
            </div>
            <div class="form-group">
                <input type="button" class="btn btn-dark" onClick="clearCan();" value="クリア" data-inline="true" />
            </div>
            <div>
                <!-- <div class="form-group">
                    <label for="">作品名</label>
                    <input type="text" id="img_name" class="form-control">
                </div> -->
                <div class="form-group">
                    <!-- <button class="btn btn-dark" id="download">download</button> -->
                    <button class="btn btn-dark" onClick="upload_canvas()">Upload</button>
                </div>
            </div>
        </div>
    </section>

    <footer>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/draw.js"></script>
</body>
</html>