# API Documentation

| Php версия | База данных |
|------------|-------------|
| 8.1.0      | PostgreSQL  |

## Authentication

To use all this routes, you should be logged in. First, you need to register into the system:

```
POST /api/register
```
```json
{
  "email": "johndoe@gmail.com",
  "password": "QWERTY123",
  "password_confirm": "QWERTY123"
}
```

And then, you should log in into your account:

```
POST /api/login
```
```json
{
    "email": "johndoe@gmail.com",
    "password": "QWERTY123"
}
```

If you successfully logged in, backend will return you JWT token for auth and save it into a cookie:
```json
{
    "jwt": "1|PnpQxKvMoiuwSqeMOcg2yEZ21Uv6yTxX5JHx7M5S"
}
```
## Departments

### Get all departments
```
GET /api/departments
```

Returns a list of all departments.

### Get a specific department
```
GET /api/departments/{department}
```

Returns a specific department by ID.

### Update a department
```
PUT /api/departments/{department}
```
```json
{
    "name": "New Name"
}
```

Updates a specific department by ID.

### Delete a department
```
DELETE /api/departments/{department}
```

Deletes a specific department by ID.

## Positions

### Get all positions
```
GET /api/positions
```

Returns a list of all positions.

### Get a specific position
```
GET /api/positions/{position}
```

Returns a specific position by ID.

## Employees

### Get all employees
```
GET /api/employees
```

Returns a list of all employees.

### Create an employee
```
POST /api/employees
```
```json
{
    "firstname": "Test",
    "lastname": "Testov",
    "middlename": "Testovich",
    "iin": "932948451",
    "user_id": 1,
    "salary": 200000,
    "join_date": "2023-04-30",
    "position_id": 2
}
```

Creates a new employee.

### Get a specific employee
```
GET /api/employees/{employee}
```

Returns a specific employee by ID.

### Get attendance for an employee
```
GET /api/employees/{employee}/attendance
```

Returns the attendance records for a specific employee.

### Create attendance record for an employee
```
POST /api/employees/{employee}/attendance
```
```json
{
    "punch_in": "2023-04-04 10:47:00",
    "punch_out": "2023-04-04 20:47:00"
}
```

Creates a new attendance record for a specific employee.

### Get leaves for an employee
```
GET /api/employees/{employee}/leaves
```

Returns the leave records for a specific employee.

### Create a leave record for an employee
```
POST /api/employees/{employee}/leaves
```
```json
{
    "leave_type_id": 1,
    "from_date": "2023-03-28",
    "to_date": "2023-03-29",
    "leave_reason": "remote work"
}
```

Creates a new leave record for a specific employee.

### Update an employee
```
PUT /api/employees/{employee}
```

Updates a specific employee by ID.

### Delete an employee
```
DELETE /api/employees/{employee}
```

Deletes a specific employee by ID.

## Attendance

### Get all attendance records
```
GET /api/attendances
```

Returns a list of all attendance records.

## Holidays

### Get all holidays
```
GET /api/holidays
```

Returns a list of all holidays.

### Create a holiday
```
POST /api/holidays
```
```json
{
    "name": "День победы",
    "from": "2023-04-07",
    "to": "2023-04-09"
}
```

Creates a new holiday.

### Update a holiday
```
PUT /api/holidays/{holiday}
```

Updates a specific holiday by ID.

### Delete a holiday
```
DELETE /api/holidays/{holiday}
```

Deletes a specific holiday by ID.

## Leave Types

### Get all leave types
```
GET /api/leave-types
```

Returns a list of all leave types.

## Leaves

### Get all leave records
```
GET /api/leaves
```

Returns a list of all leave records.
