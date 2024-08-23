<x-app-layout>
    <form action="{{ route('person.update', ['person' => $person]) }}"
          id="edit-person-form"
          method="post">
        @csrf
        @method('PUT')
        <x-input name="name"
                 :value="$person->name" />
        <x-input name="bio"
                 type="textarea"
                 :value="$person->bio" />
        <x-input name="dob"
                 type="date"
                 label="Date of Birth"
                 :value="$person->dob" />
        <x-input name="user_id"
                 type="select"
                 :options="\App\Models\User::get()"
                 can-be-null="true"
                 :value="$person->user_id" />
        <button type="submit">Update</button>
    </form>

</x-app-layout>
