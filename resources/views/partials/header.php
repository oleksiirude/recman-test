<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title><?php echo $data['title'] ?? 'Recman AS' ?></title>
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <?php if (userAuthenticated()) : ?>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <form method="post" action="/sign-out">
                            <button type="submit" class="nav-link">Sign Out</button>
                        </form>
                    </li>
                </ul>
            <?php else : ?>
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="/registration" class="nav-link">Registration</a></li>
                    <li class="nav-item"><a href="/sign-in" class="nav-link">Sign In</a></li>
                </ul>
            <?php endif; ?>
        </header>
