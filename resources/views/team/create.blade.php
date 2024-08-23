<x-app-layout>
    <form action="{{ route('team.store') }}"
          id="create-team-form"
          method="post">
        @csrf
        <x-input name="name" />
        <x-input name="description"
                 type="textarea" />
        <x-input name="colours[]"
                 type="color" />
        <button type="submit">Create</button>
    </form>

</x-app-layout>
