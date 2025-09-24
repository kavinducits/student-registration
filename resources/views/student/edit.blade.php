<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="mb-4">Edit Student</h1>
    <a href="{{ route('student.index') }}" class="btn btn-secondary mb-3">← Back to List</a>

    <form action="{{ route('student.update', $student->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">First Name:</label>
            <input type="text" name="first_name" value="{{ $student->first_name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Last Name:</label>
            <input type="text" name="last_name" value="{{ $student->last_name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" value="{{ $student->email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone:</label>
            <input type="text" name="phone" value="{{ $student->phone }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Date of Birth:</label>
            <input type="date" name="dob" value="{{ $student->dob }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Gender:</label>
            <select name="gender" class="form-select">
                <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Address:</label>
            <textarea name="address" class="form-control">{{ $student->address }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Course:</label>
            <input type="text" name="course" value="{{ $student->course }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <!-- Bootstrap JS (optional, for validation) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
