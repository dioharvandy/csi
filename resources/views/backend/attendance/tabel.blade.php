@if(Request::segment(3)=='print')
<header>
    <h1></h1>
</header>
@endif
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th class="text-center">Nama Mahasiswa</th>
            <th class="text-center">NIM</th>
            @foreach($kolom as $att)
            <?php
                $tgl = explode("-", $att['tgl']);
                // dd($tgl);
                $tgl = $tgl[2]."/".$tgl[1];
            ?>
            <th class="text-center">{{$tgl}}</th>
            @endforeach 
        </tr>
        </thead>
        <tbody>
            @foreach ($ayam as $a)
                <tr>
                    <td class="tt">{{$a['name']}}</td>
                    <td class="text-center">{{$a['nim']}}</td>
                    <?php
                        // dd($a);
                    ?>
                    @foreach ($a['desc'] as $key => $item)
                        @foreach ($a['desc'] as $i)
                            @if ($kolom[$key]['id'] == $i['id'])
                                <td class="text-center">{{config('central.attendance_student')[$item['status']]}}</td>
                            @endif
                        @endforeach
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@if(Request::segment(3) == 'print')
<style>
    table, tr, td, th{
        border: 1px solid;
        border-collapse:collapse;
        padding: 5px;
    }
    .text-center{
        text-align: center;
    }
    .tt{
        font-size: 12px;
    }
</style>
<script>
    // window.print();
</script>
@endif