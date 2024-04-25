<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h3>{{ $data['name'] }}</h3>
    <h4>{{ $data['body'] }}</h4>

    
    <table border="1">
        <tr>
            <th>Nama Barang</th>
            <th>Keterangan</th>
            @if (Auth::user()->role == 'SPV')
                <th>Approved By</th>
                <th>Approved Date</th>
            @else
                <th>Created By</th>
                <th>Created Date</th>
            @endif
            <th>Status</th>
        </tr>
        <tr>
            <td>{{ $data['detail']['nama_barang'] }}</td>
            <td>{{ $data['detail']['keterangan'] }}</td>
            @if (Auth::user()->role == 'SPV')
                <td>{{ $data['detail']['approved_by'] }}</td>
                <td>{{ $data['detail']['approved_date'] }}</td>
            @else
                <td>{{ $data['detail']['created_by'] }}</td>
                <td>{{ $data['detail']['created_date'] }}</td>
            @endif
            <td>{{ $data['detail']['status'] }}</td>
        </tr>
    </table>
   
</body>
</html>