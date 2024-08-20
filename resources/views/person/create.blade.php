<x-app-layout>
    <form action="{{ route('person.store') }}"
          method="post">
        @csrf
        <x-input name="name" />
        <x-input name="bio"
                 type="textarea" />
        <x-input name="dob"
                 type="date"
                 label="Date of Birth" />
        <x-input name="user_id"
                 type="select"
                 :options="\App\Models\User::get()"
                 can-be-null="true" />
        <button type="submit">Create</button>
    </form>

</x-app-layout>
