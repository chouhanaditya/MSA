@extends('layouts.app')
@section('content')


    <table class="table table-striped table-bordered table-hover">
        <tbody>
        <tr>
            <td>Participating Teams</td>
            <td>
            @foreach ($teamlist as $team_name)
                <ul>
                    <?php echo ($team_name); ?>
                </ul>
            @endforeach
            </td>

        </tr>
        </tbody>
    </table>


@stop

