<x-app-layout>
    <form id="create-team-form"
          action="{{ route('team.store') }}"
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
