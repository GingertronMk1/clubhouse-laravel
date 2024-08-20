<x-app-layout>
    <table>
        @foreach ($people as $person)
            <tr>
                <td>{{ $person->name }}</td>
                <td>{{ $person->bio }}</td>
                <td>{{ $person->dob }}</td>
                <td>{{ $person->user?->name ?? 'No User' }}</td>
                <td><a href="{{ route('person.edit', ['person' => $person]) }}">Edit</a></td>
            </tr>
        @endforeach
    </table>

</x-app-layout>
