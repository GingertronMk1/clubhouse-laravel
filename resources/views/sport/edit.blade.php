<x-app-layout>
    <form action="{{ route('sport.update', ['sport' => $sport]) }}"
          method="post"
          id="edit-sport-form"
    >
        @csrf
        @method('PUT')
        <x-input name="name"
                 :value="$sport->name" />
        <x-input name="description"
                 type="textarea"
                 :value="$sport->description" />
        <button type="submit">Update</button>
    </form>
</x-app-layout>
