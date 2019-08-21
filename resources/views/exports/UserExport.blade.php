<table>
    <thead>
    <tr>
        <th>نام</th>
        <th>نام خانوادگی</th>
        <th>نام کاربری</th>
        <th>شماره مبایل</th>
        <th>کدملی</th>
        <th>نام پدر</th>
        <th>تاریخ تولد</th>
        <th>آدرس منزل</th>
        <th>منطقه</th>
        <th>ایمیل</th>
        <th>وضعیت نظام وظیفه</th>
        <th>دانشگاه</th>
        <th>وضعیت تحصیلی</th>
        <th>هسته</th>
        <th>رشته</th>
        <th>رتبه کنکور</th>

    </tr>
    </thead>
    <tbody>

    @foreach($users as $d)

        <tr>
            <?php
             //dd(json_decode($d)->name);
                $d= json_decode($d);
            ?>
            <td>{{$d->name}}</td>
            <td>{{$d->lastname}}</td>
            <td>{{$d->username}}</td>
            <td>{{$d->phonenumber}}</td>
            <td>
                {{$d->nationcode}}
            </td>
             <td>{{$d->father_name}}</td>
            <td>{{$d->birthday}}</td>
            <td>{{$d->address}}</td>
            <td>
                @if($d->area)
                    {{$d->area->name}}
                @endif
            </td>
            <td>{{$d->email}}</td>
            <td>
                @if($d->soldier_service) {{$d->soldier_service->name}}
                    @endif
            </td>
            <td>
                @if($d->university)
                {{$d->university->name}}
                @endif
            </td>

            <td>
                @if($d->grade)
                    {{$d->grade->name}}
                @endif
            </td>

            <td>
                @if($d->core)
                    {{$d->core->name}}
                @endif
            </td>

            <td>
                @if($d->field)
                    {{$d->field->name}}
                @endif
            </td>
            <td>
                    {{$d->konkor_grade}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>