<table>
    <thead>
        <tr>
            <th style="width:8px">No</th>
            <th style="width:25px">Nama</th>
            <th style="width:25px">Email</th>
            <th style="width:15px">Jenis Kelamin</th>
            <th style="width:20px">Lokasi</th>
            <th style="width:10px">Skor</th>
        </tr>
    </thead>
    <tbody>
        @for ($i = 0; $i < count($answers); $i++)
        <tr>
            <td>{{$i+1}}</td>
            <td>{{ $answers[$i]->name }}</td>
            <td>{{ $answers[$i]->email }}</td>
            <td>@if ($answers[$i]->gender=="male")
                Laki-laki
            @else
                Perempuan
            @endif</td>
            <td>{{ $answers[$i]->location }}</td>
            <td>{{ $answers[$i]->score }}</td>
        </tr>
        @endfor
    </tbody>
</table>