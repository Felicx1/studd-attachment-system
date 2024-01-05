
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<p>Dear {{$supervisorName}},</p>
<p>You have been scheduled  scheduled for {{ $assessmentDate }} to assess the following students.

    <table>
        <tr>
            <th>Student Name</th>
            <th>Phone Number</th>
        </tr>
         @foreach ($students as $student)
          <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->phone_number}}</td>
          </tr> 
        @endforeach
      </table>

    
<p>Best Regards.</p>

</body>
</html>


