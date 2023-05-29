<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Akshi cake | Admins - signIn</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/adminStyle.css" />
</head>

<body id="body">

    <div class="admin-signin-body">
        <div class="admin-signIn rounded-5 p-4">
            <div class="col-12 p-0">
                <div class="row m-0">
                    <span class="text-center fs-2 fw-bold text-white form-label">Welcome to admins</span>
                </div>
            </div>
            <div class="col-12 p-0">
                <div class="row m-0">
                    <label class="fw-bold text-white form-label">Email</label>
                    <input class="form-control" id="email" type="text" />
                </div>
            </div>

            <div class="col-12 p-0">
                <div class="row m-0">
                    <label class="fw-bold text-white form-label">Password</label>
                    <input class="form-control" id="password" type="text" />
                </div>
            </div>

            <div class="col-12 p-0">
                <div class="row m-0 py-4">
                    <button class="btn btn-primary" onclick="adminSignIn();">Sign In</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../script/script.js"></script>
    <script src="assets/scripts/admin.js"></script>
</body>

</html>