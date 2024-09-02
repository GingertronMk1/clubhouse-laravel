<?php

namespace Tests\Feature\Application;

use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\ApplicationTest;

/**
 * @internal
 */
class PersonTest extends ApplicationTest
{
    use RefreshDatabase;

    public function testIndex(): void
    {
        $response = $this->get(route('person.index'));

        $response->assertStatus(200);
        $response->assertViewIs('person.index');
    }

    public function testShow(): void
    {
        $response = $this->get(route(
            'person.show',
            ['person' => '019179ea-21b8-7078-aea2-9b3313535065']
        ));
        $response->assertStatus(200);
        $response->assertViewIs('person.show');
    }

    public function testCreateAndStore(): void
    {
        $response = $this->get(route('person.create'));

        $response->assertStatus(200);
        $response->assertViewIs('person.create');
        $this->testFormOnPage(
            $response,
            'create-person-form',
            [
                'name' => self::class,
                'bio' => self::class,
                'user_id' => '019179ea-20b5-72d5-8268-4231713e7dae',
            ],
        );

        $createdPerson = Person::where(
            'name',
            '=',
            self::class
        )->first();
        $this->assertNotNull($createdPerson);
        $this->assertEquals(self::class, $createdPerson->name);
        $this->assertEquals(self::class, $createdPerson->bio);
    }

    public function testEditAndUpdate(): void
    {
        $personId = '019179ea-21b8-7078-aea2-9b3313535065';
        $response = $this->get(route(
            'person.edit',
            [
                'person' => $personId,
            ]
        ));

        $response->assertStatus(200);
        $response->assertViewIs('person.edit');
        $this->testFormOnPage(
            $response,
            'edit-person-form',
            [
                'name' => self::class,
                'bio' => self::class,
            ],
            [
                'name' => 'Test User 0',
                'bio' => <<<'EOF'
                    Similique aut vel qui qui voluptatem. Aperiam quaerat eaque facilis expedita.

                    Dolorem aliquam ratione assumenda et veritatis odio reprehenderit totam. Qui sed velit consequatur sit. Est dicta ipsa et doloribus. Nihil harum similique et.

                    Dolor expedita ipsa non fuga eos iste soluta et. Animi vel sit accusantium odit dolores. Totam dolor maiores reprehenderit ad.
                    EOF,
                'user_id' => '019179ea-20b5-72d5-8268-4231713e7dae',
            ]
        );

        $createdPerson = Person::find($personId);
        $this->assertNotNull($createdPerson);
        $this->assertEquals(self::class, $createdPerson->name);
    }

    public function testDelete(): void
    {
        $id = '019179ea-21b8-7078-aea2-9b3313535065';
        $person = Person::find($id);
        $this->assertNull($person->deleted_at);
        $this->delete(route('person.destroy', $id));
        $person->refresh();
        $this->assertNotNull($person->deleted_at);
    }
}
