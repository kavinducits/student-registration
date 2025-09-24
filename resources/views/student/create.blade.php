<!DOCTYPE html>
<html>
<head>
    <title>Register Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="mb-4">Register New Student</h1>
                <a href="{{ route('student.index') }}" class="btn btn-link mb-3">← Back to List</a>

                <form action="{{ route('student.store') }}" method="POST" class="card p-4 shadow-sm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">First Name:</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name:</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone:</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date of Birth:</label>
                        <input type="date" name="dob" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender:</label>
                        <select name="gender" class="form-select">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address:</label>
                        <textarea name="address" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Course:</label>
                        <input type="text" name="course" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
