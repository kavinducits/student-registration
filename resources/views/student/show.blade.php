<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">Student Details</h1>
            </div>
            <div class="card-body">
                <a href="{{ route('student.index') }}" class="btn btn-secondary mb-3">← Back to List</a>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>ID:</strong> {{ $student->id }}</li>
                    <li class="list-group-item"><strong>Name:</strong> {{ $student->first_name }} {{ $student->last_name }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $student->email }}</li>
                    <li class="list-group-item"><strong>Phone:</strong> {{ $student->phone }}</li>
                    <li class="list-group-item"><strong>Date of Birth:</strong> {{ $student->dob }}</li>
                    <li class="list-group-item"><strong>Gender:</strong> {{ $student->gender }}</li>
                    <li class="list-group-item"><strong>Address:</strong> {{ $student->address }}</li>
                    <li class="list-group-item"><strong>Course:</strong> {{ $student->course }}</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
