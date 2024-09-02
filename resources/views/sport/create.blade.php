<x-app-layout>
    <form id="create-sport-form"
          action="{{ route('sport.store') }}"
          method="post">
        @csrf
        <x-input name="name" />
        <x-input name="description"
                 type="textarea" />
        <button type="submit">Create</button>
    </form>

</x-app-layout>
