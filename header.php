<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online-shopping</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('#user').popover({
                content: "<div><a href='history.php' class='h6 text-dark'>Purchase history</a></div><div><a href='chgpass.php' class='h6 text-dark'>Change password</a></div><div><a href='logout.php' class='h6 text-dark'>Logout</a></div>",
                html: true
            });

            $('#admin').popover({
                content: "<div><a href='chgpass.php' class='h6 text-dark'>Change password</a></div><div><a href='logout.php' class='h6 text-dark'>Logout</a></div>",
                html: true
            });
        });
    </script>
</head>