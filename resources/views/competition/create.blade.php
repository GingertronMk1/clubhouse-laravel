<x-app-layout>
    <form id="create-competition-form"
          action="{{ route('competition.store') }}"
          method="post">
        @csrf
        <x-input name="name" />
        <x-input name="description"
                 type="textarea" />
        <x-input name="sport_id"
                 type="select"
                 :options="\App\Models\Sport::get()" />
        <button type="submit">Create</button>
    </form>

</x-app-layout>
