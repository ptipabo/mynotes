@extends('layout')

@section('content')

<section class="pageTitle">
    <h1>Compétences</h1>
</section>
<section>
    <table>
        <thead>
            <tr>
                <th>Compétence</th>
                <th>Niveau de maitrise</th>
                <th>Conseils d'amélioration</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($skills as $skill)
                <tr>
                    <td>{{ $skill->name }}</td>
                    <td>{{ $skill->level }}</td>
                    @if($skill->level == 1)
                        <td>{{ $advices[0] }}</td>
                    @elseif($skill->level == 2)
                        <td>{{ $advices[1] }}</td>
                    @elseif($skill->level == 3)
                        <td>{{ $advices[2] }}</td>
                    @elseif($skill->level == 4)
                        <td>{{ $advices[3] }}</td>
                    @else
                        <td>{{ $advices[4] }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection