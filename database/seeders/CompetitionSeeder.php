<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->withProgressBar(
            $this->getCompetitions(),
            function (array $compArr) {
                $person = new Competition($compArr);
                $person->id = $compArr['id'];
                $person->save();
            }
        );
    }

    /**
     * @return array<int, array<string, string>>
     */
    private function getCompetitions(): array
    {
        return [
            0 => [
                'id' => '01917a02-df3d-73cc-97e2-149abace7445',
                'parent_id' => null,
                'name' => 'World Championship',
                'description' => 'Cupiditate odio tempore assumenda modi aut. Qui atque facere eos aut mollitia esse. Omnis sit ipsam accusantium voluptatem.

Fugiat harum nihil qui suscipit. Dignissimos dolorem numquam molestiae provident. Perspiciatis cupiditate illo ea fugit commodi nostrum quia.

Nemo nihil architecto sequi aut. Ut delectus laudantium autem excepturi voluptas cum magni. Aspernatur porro aut voluptatem vel ad officiis laudantium laboriosam. Non id vitae laudantium quas consectetur voluptatem.',
                'sport_id' => '019169e3-e100-7449-926f-c544764b069f',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            1 => [
                'id' => '01917a02-df42-72d6-8f2d-52b735b6ab49',
                'parent_id' => null,
                'name' => 'National Championship',
                'description' => 'Quas soluta rerum placeat est aut voluptas quo. Harum velit reprehenderit sunt et vero ipsam impedit. Consequuntur quia amet itaque commodi officia consequatur.

Esse ut pariatur tempore iure quae. Aut sed dicta architecto deserunt quidem debitis. Enim natus voluptates dignissimos explicabo id harum rem sit. Officiis ut vitae impedit excepturi autem iure.

Quia eius optio molestiae illum vel eum. Nihil voluptas sit at voluptatem. Sit quisquam enim adipisci vitae. Id dicta unde ex enim non amet.',
                'sport_id' => '019169e3-e100-7449-926f-c544764b069f',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            2 => [
                'id' => '01917a02-df44-7121-82c6-553deb656f4f',
                'parent_id' => '01917a02-df42-72d6-8f2d-52b735b6ab49',
                'name' => 'National Championship | England',
                'description' => 'Consectetur sunt ab nam in illum quo. Doloribus et aut culpa. Atque possimus sapiente neque ut ducimus id et. Aliquam quo sapiente commodi dignissimos consequatur nihil. Voluptas a distinctio aliquam eum qui ea.

Officia dolores placeat consequatur id accusamus dolor. Vitae voluptatem sed recusandae voluptatem eaque dolorum.

Dolorem accusantium sunt recusandae modi quisquam eveniet laboriosam. Eius omnis et porro placeat eligendi eum. Molestiae in in dolor voluptatum aperiam qui ut.',
                'sport_id' => '019169e3-e100-7449-926f-c544764b069f',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            3 => [
                'id' => '01917a02-df46-7108-93d6-ac65f0be5721',
                'parent_id' => '01917a02-df42-72d6-8f2d-52b735b6ab49',
                'name' => 'National Championship | Scotland',
                'description' => 'Porro reprehenderit et provident. Iure aut ipsum consequatur dolore non. Harum laborum sint amet pariatur eligendi architecto. Eos quia natus incidunt impedit quibusdam. Voluptatem quaerat ducimus rerum repudiandae et et totam omnis.

Voluptas ab quidem rerum quis reprehenderit sit. Magnam ipsam aliquam voluptatum neque hic. Et placeat et commodi sapiente nisi molestiae provident. Consequuntur et sed reiciendis cupiditate nam architecto.

Molestias animi sit non natus qui. Eius sit voluptates temporibus vero consectetur sequi qui modi. Facere similique aut iusto veniam asperiores ratione est eveniet. Velit est aut sit voluptates ut voluptatem.',
                'sport_id' => '019169e3-e100-7449-926f-c544764b069f',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            4 => [
                'id' => '01917a02-df49-7139-833e-8a118abdcc71',
                'parent_id' => '01917a02-df42-72d6-8f2d-52b735b6ab49',
                'name' => 'National Championship | Wales',
                'description' => 'Voluptatem maxime voluptate molestiae. Et et distinctio quidem consectetur molestias dicta et. Eius eius incidunt ut sit aut quae.

Rem rem quia vitae reiciendis. Quasi consequatur iste officia vel sapiente rerum assumenda. Ullam sit ducimus quibusdam ex.

Dolorem et accusamus doloribus dolores. Ab expedita distinctio nihil est praesentium voluptatem qui.',
                'sport_id' => '019169e3-e100-7449-926f-c544764b069f',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            5 => [
                'id' => '01917a02-df4b-705e-bf40-17d73e03e7d9',
                'parent_id' => '01917a02-df42-72d6-8f2d-52b735b6ab49',
                'name' => 'National Championship | Northern Ireland',
                'description' => 'Natus ut doloremque dicta nesciunt qui hic. Nihil facere ea corrupti error. Neque voluptas aut tempore. Reiciendis voluptatem repellendus in laborum suscipit pariatur minus id. Et dolores earum earum ut non sed nam.

Culpa unde corrupti optio et. Velit saepe enim quis sint sequi quia saepe quia. Harum et placeat velit architecto rem est corporis. Non eos reprehenderit autem corrupti error nisi dicta.

Tempore expedita quod suscipit nihil iste ipsum. Sed a molestias rem ullam aut. A optio pariatur voluptatem voluptas alias accusantium quod voluptatibus.',
                'sport_id' => '019169e3-e100-7449-926f-c544764b069f',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            6 => [
                'id' => '01917a02-df4d-7345-a6aa-0f3a55093e28',
                'parent_id' => '01917a02-df42-72d6-8f2d-52b735b6ab49',
                'name' => 'National Championship | Republic of Ireland',
                'description' => 'Et accusamus odit esse eos non omnis. Fugiat saepe sint veniam in. A omnis et assumenda.

Eaque et nemo modi occaecati. Soluta et possimus mollitia voluptatum modi. Assumenda ipsa voluptatum hic ad odio odio libero ipsa. Dolorem eligendi et non suscipit doloremque dolor hic.

Sunt voluptas et commodi. Laudantium qui perspiciatis unde eius eius reprehenderit voluptas. Dolore dolore quam iure tempora omnis consequatur delectus. Eos ratione cum qui.',
                'sport_id' => '019169e3-e100-7449-926f-c544764b069f',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            7 => [
                'id' => '01917a02-df4f-7162-9b61-3b006be8e148',
                'parent_id' => null,
                'name' => 'World Championship',
                'description' => 'Incidunt praesentium quia ab consequatur ut. Ut distinctio fugit architecto dolor. Consequatur magni suscipit dolorem ducimus. Consectetur vero voluptate laboriosam adipisci dolore et.

Harum unde veniam dolor ut ut aut sit. Voluptas consequatur fugiat qui numquam. Explicabo amet voluptatem exercitationem fugiat.

Dicta et quidem eaque doloribus. Perspiciatis ut perspiciatis doloremque consequatur consequatur earum dolorum aliquam. Rerum sed sunt debitis nostrum. Repellat dignissimos nisi modi culpa doloribus asperiores dolores. Rem veritatis est maxime qui ut ipsum.',
                'sport_id' => '019169e3-e100-7ff6-a406-6b6ad85ba7d0',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            8 => [
                'id' => '01917a02-df50-727b-9de7-f869de628614',
                'parent_id' => null,
                'name' => 'National Championship',
                'description' => 'Eligendi autem commodi architecto perferendis. Cupiditate blanditiis magnam laudantium dolores a. Quas commodi architecto ea nihil vero aut eaque.

Vitae quia voluptatum et omnis. Labore modi non esse maxime occaecati consequatur animi. Placeat ut excepturi saepe ut. Qui nihil rerum earum est.

Et qui dolorem cupiditate quam qui incidunt sunt. Et iusto natus enim odio qui quia consequatur. Eos qui saepe quaerat ut repudiandae amet. Perferendis omnis ea repellendus quas voluptatem.',
                'sport_id' => '019169e3-e100-7ff6-a406-6b6ad85ba7d0',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            9 => [
                'id' => '01917a02-df53-729d-ba72-a0bd097374f9',
                'parent_id' => '01917a02-df50-727b-9de7-f869de628614',
                'name' => 'National Championship | England',
                'description' => 'Reiciendis dolorum officia sint provident eum est adipisci. Necessitatibus dolor voluptates quo magni non et fugit. Illum dolor quis aliquid id ipsum aut. Et ducimus inventore corporis sed. Qui voluptatibus velit voluptate explicabo ad assumenda et quibusdam.

Nihil fugiat praesentium in perspiciatis. Quia porro dicta neque eum neque aspernatur. Nobis reiciendis unde vel fuga aut ipsa ut odit. Architecto qui et unde laboriosam sunt et. Possimus a dolorem excepturi.

Qui maxime atque cumque molestias. Minus quo quia excepturi. Ipsum odio aspernatur nam voluptas. Dolores unde delectus modi eos.',
                'sport_id' => '019169e3-e100-7ff6-a406-6b6ad85ba7d0',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            10 => [
                'id' => '01917a02-df54-731a-877e-adc4fcdbd753',
                'parent_id' => '01917a02-df50-727b-9de7-f869de628614',
                'name' => 'National Championship | Scotland',
                'description' => 'Qui libero est enim perferendis unde. Consequatur aperiam voluptas cum rem quos ut error. Amet repudiandae beatae magnam quis eaque voluptate.

Velit et omnis inventore dolorem exercitationem. Reiciendis ad reiciendis eos voluptatem ut blanditiis. Aut alias sed blanditiis sit alias sunt. Voluptatem tenetur dicta omnis occaecati.

Ducimus autem nihil ad corrupti et id facere. Qui dolores sint velit explicabo ipsum saepe dolores. Est hic voluptatum iste consequuntur.',
                'sport_id' => '019169e3-e100-7ff6-a406-6b6ad85ba7d0',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            11 => [
                'id' => '01917a02-df56-7195-8aa2-7a93a827e8b8',
                'parent_id' => '01917a02-df50-727b-9de7-f869de628614',
                'name' => 'National Championship | Wales',
                'description' => 'Rerum dolorum voluptate at perferendis adipisci necessitatibus. Perferendis earum dolorum est voluptatibus quas id. Quo possimus quis amet rerum molestiae.

Eum dolores natus fuga autem consectetur. Ipsam corporis quo distinctio in. Ut consequuntur dignissimos sed dicta. Quae quis voluptas qui quia.

Necessitatibus fugit reprehenderit sed perspiciatis veniam. Qui excepturi harum quia iusto. Eveniet et inventore error sed sed dolor. Tempora nulla tempora rerum incidunt nesciunt eos illo.',
                'sport_id' => '019169e3-e100-7ff6-a406-6b6ad85ba7d0',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            12 => [
                'id' => '01917a02-df8f-72dc-a8f6-bcb387ef4199',
                'parent_id' => '01917a02-df8b-727f-a8ca-4a0a802bec60',
                'name' => 'National Championship | Scotland',
                'description' => 'Culpa eos nisi dolores voluptas. Id ex quam hic perspiciatis saepe ut. Qui quam qui recusandae reprehenderit qui. Error quae saepe ipsa itaque est quis sint.

Aut laborum vel hic aut non quod. Laudantium inventore quod est et incidunt. Sunt quas doloremque dicta.

Minus voluptates aut perspiciatis facilis soluta magnam. Dolore asperiores velit voluptas et. Nam placeat totam aliquid quia.',
                'sport_id' => '019169e3-e100-7784-a3ae-8adfe9451a1b',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            13 => [
                'id' => '01917a02-df58-7227-8a42-3ffeb680a5c4',
                'parent_id' => '01917a02-df50-727b-9de7-f869de628614',
                'name' => 'National Championship | Northern Ireland',
                'description' => 'Delectus voluptatem hic blanditiis id eos esse ipsam. Consequuntur rem explicabo quibusdam incidunt ut omnis. Ratione ratione qui tempora esse ab aut et magni.

Accusamus ab mollitia sunt quibusdam ullam. Sit aut aut voluptatem deleniti corporis ex. Consectetur asperiores architecto nisi. Deleniti vel unde deleniti aperiam placeat incidunt. Voluptates quae et dolores eos nihil perferendis.

Perspiciatis praesentium id numquam dicta. Consequatur et numquam tempora harum. Ipsa tenetur numquam maxime quis molestiae laboriosam doloremque tempora.',
                'sport_id' => '019169e3-e100-7ff6-a406-6b6ad85ba7d0',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            14 => [
                'id' => '01917a02-df5b-715b-90bf-e2d0c051960b',
                'parent_id' => '01917a02-df50-727b-9de7-f869de628614',
                'name' => 'National Championship | Republic of Ireland',
                'description' => 'Quaerat eum quod facere enim. Perspiciatis voluptas sunt quis cum dolore doloremque.

Deserunt molestiae rerum aut error rem. Dicta beatae debitis id nesciunt dolorem. Modi ut provident quidem minima quibusdam maiores commodi veritatis. Fugit reprehenderit hic exercitationem perferendis fuga.

Doloribus dignissimos ullam sunt molestias autem architecto. Sed unde voluptates eaque qui temporibus. Dolores nostrum dolorem nihil quis illo.',
                'sport_id' => '019169e3-e100-7ff6-a406-6b6ad85ba7d0',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            15 => [
                'id' => '01917a02-df5d-73e0-afc0-81f04457cc1e',
                'parent_id' => null,
                'name' => 'World Championship',
                'description' => 'Similique aut at aliquam aspernatur. Earum minus non rerum non quasi ducimus. Eum necessitatibus et ut est laboriosam. Nam velit nesciunt impedit est quo.

Facilis ipsam quo enim. Eum sint voluptatem laborum. Omnis qui similique veniam at.

Beatae quisquam dignissimos error qui expedita aut. Pariatur optio magnam itaque dolorum sed distinctio rerum. Optio hic et est sunt. Fugiat omnis sint velit rem voluptatum.',
                'sport_id' => '019169e3-e100-7dee-8b24-7ca573f1e85e',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            16 => [
                'id' => '01917a02-df5f-7063-9114-fea3ccea86d8',
                'parent_id' => null,
                'name' => 'National Championship',
                'description' => 'Eos ut rerum quaerat consequatur deserunt rerum molestiae. Aut repellat nobis consequatur vel cupiditate assumenda. Sit distinctio dignissimos cumque dicta sequi vero provident.

Est accusantium sapiente omnis perspiciatis quia molestiae eligendi. Soluta temporibus numquam consectetur est illum. Qui consectetur quis minima incidunt et rem.

Laborum sed corporis cumque voluptate cumque. Ut ut quis odit autem praesentium. Officia laborum id possimus error et. Sunt quidem ducimus nemo minus ex sit numquam.',
                'sport_id' => '019169e3-e100-7dee-8b24-7ca573f1e85e',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            17 => [
                'id' => '01917a02-df61-7307-a96b-07b99006f329',
                'parent_id' => '01917a02-df5f-7063-9114-fea3ccea86d8',
                'name' => 'National Championship | England',
                'description' => 'Omnis magni quia maiores id aut consectetur sed ab. Nulla vel exercitationem quaerat et et minus. Rem aut voluptate qui hic odit doloremque distinctio consequatur.

Mollitia ullam nam fugit omnis voluptas dolore cumque dolorem. Et eaque iste atque deleniti nulla. Eveniet nam quia error necessitatibus.

Quia veniam eius qui sint. Aliquam vel aut est quod mollitia. Non fuga totam commodi necessitatibus adipisci voluptatum.',
                'sport_id' => '019169e3-e100-7dee-8b24-7ca573f1e85e',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            18 => [
                'id' => '01917a02-df63-7138-9a17-4f266d36452b',
                'parent_id' => '01917a02-df5f-7063-9114-fea3ccea86d8',
                'name' => 'National Championship | Scotland',
                'description' => 'Molestiae qui nobis similique at sint. Maiores blanditiis ducimus laborum soluta. Recusandae et assumenda esse provident repellendus.

Distinctio aut non sint et ducimus autem et. Ea omnis magnam nam. Accusamus consequatur necessitatibus et impedit non. Molestiae soluta consequatur iusto earum harum. Corrupti corporis et voluptates minus harum eligendi voluptatibus consequatur.

Adipisci et ipsa perspiciatis et error sed. Omnis dignissimos repudiandae quas aspernatur ratione amet. Non assumenda minima facere incidunt qui natus aspernatur cum.',
                'sport_id' => '019169e3-e100-7dee-8b24-7ca573f1e85e',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            19 => [
                'id' => '01917a02-df65-71b1-b474-0c3354f4eb76',
                'parent_id' => '01917a02-df5f-7063-9114-fea3ccea86d8',
                'name' => 'National Championship | Wales',
                'description' => 'Qui exercitationem omnis esse nihil. Porro consequatur perspiciatis molestiae est eveniet nemo. Tenetur aspernatur autem quas voluptatibus veritatis. Occaecati aspernatur labore deserunt reiciendis et in vel. Beatae blanditiis magnam tempore rerum.

Et laudantium quae ipsam voluptatem et. Enim aspernatur voluptatem aliquam minima modi necessitatibus. Aut ipsa ea veritatis illum perspiciatis distinctio pariatur labore.

Sed quod ratione nobis natus quo omnis. Praesentium voluptas nihil recusandae veritatis voluptatem. Consequatur assumenda est eius et atque.',
                'sport_id' => '019169e3-e100-7dee-8b24-7ca573f1e85e',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            20 => [
                'id' => '01917a02-df67-737b-ad36-e3c272ba4507',
                'parent_id' => '01917a02-df5f-7063-9114-fea3ccea86d8',
                'name' => 'National Championship | Northern Ireland',
                'description' => 'Expedita aliquid molestias assumenda accusantium voluptas quis. Beatae aut suscipit saepe est aut expedita. Ea atque ullam voluptate alias deserunt enim.

Dicta quidem quia sunt qui tenetur. Aut laborum quas vel delectus. Sint provident minima officiis. Aliquam labore vitae sed ut.

Aut consequatur in perspiciatis aut. Aut dignissimos sit architecto quo est molestias quos quibusdam. Ipsa ea illum aut earum possimus consequatur.',
                'sport_id' => '019169e3-e100-7dee-8b24-7ca573f1e85e',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            21 => [
                'id' => '01917a02-df69-7377-90da-206724ca4dfc',
                'parent_id' => '01917a02-df5f-7063-9114-fea3ccea86d8',
                'name' => 'National Championship | Republic of Ireland',
                'description' => 'Consequatur voluptatem ipsa officiis voluptatem consequatur ipsum ab suscipit. Autem excepturi provident dolor a sunt ipsa. Ducimus vero voluptatum non autem odio nam adipisci recusandae. Illo repellendus ut incidunt in aut.

Necessitatibus soluta qui aperiam neque commodi. Eos et architecto doloremque autem cum incidunt. Et accusamus sunt praesentium maxime sit quam.

Quo eum eius vel voluptatem deserunt nesciunt sint. Nobis velit pariatur ut ea commodi reprehenderit hic.',
                'sport_id' => '019169e3-e100-7dee-8b24-7ca573f1e85e',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            22 => [
                'id' => '01917a02-df6b-734b-98d7-e864f662080f',
                'parent_id' => null,
                'name' => 'World Championship',
                'description' => 'Repellendus expedita dignissimos quo ex. Repudiandae corrupti culpa molestiae possimus. Dignissimos et facilis hic reprehenderit molestiae. Sequi fugit labore cum tempora rem pariatur maiores.

Illo velit pariatur esse suscipit. Debitis modi voluptatem consectetur praesentium deserunt. Corporis quaerat nulla ex saepe velit. Ex possimus fugit impedit culpa aliquid. Aut repudiandae et facilis nesciunt.

In incidunt consequuntur dolores voluptatum qui alias. Quibusdam odio sunt saepe voluptatum nisi aut. Quibusdam dolore et consequatur eligendi. Et magnam velit ullam et et eius.',
                'sport_id' => '019169e3-e100-7ac7-8d5c-c547ac373320',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            23 => [
                'id' => '01917a02-df6d-7075-a0fa-8afc4ef9e969',
                'parent_id' => null,
                'name' => 'National Championship',
                'description' => 'Et laborum id rerum dolorum ab atque repellendus. In dolores iure non velit.

Enim numquam alias sed voluptatibus recusandae ut repudiandae. Laborum et et voluptatem natus ducimus facilis ut. Consequatur delectus veniam deleniti repudiandae perferendis quia. Deleniti nostrum odio aliquam eum ea.

Dolorum eaque quo repellendus in qui error quisquam. Quidem non ea in quidem suscipit voluptatem occaecati.',
                'sport_id' => '019169e3-e100-7ac7-8d5c-c547ac373320',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            24 => [
                'id' => '01917a02-df6f-70f3-bb57-bdc558414f1f',
                'parent_id' => '01917a02-df6d-7075-a0fa-8afc4ef9e969',
                'name' => 'National Championship | England',
                'description' => 'Repudiandae occaecati quia accusantium qui distinctio quia. Voluptatem doloremque qui vero quia.

Ea corporis ipsum quia quo unde voluptatem. Libero quisquam beatae quas exercitationem vel similique aut. Et amet id voluptatem dolor ipsum. Ipsa aliquam autem aut omnis repellat vel numquam corrupti.

Quia voluptatum vel ratione. Illum in asperiores aut odio. Tempore et et qui voluptatem. Sit sed voluptas sunt maiores soluta fuga.',
                'sport_id' => '019169e3-e100-7ac7-8d5c-c547ac373320',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            25 => [
                'id' => '01917a02-df72-70f2-aced-96713ff1ec71',
                'parent_id' => '01917a02-df6d-7075-a0fa-8afc4ef9e969',
                'name' => 'National Championship | Scotland',
                'description' => 'Laudantium sunt nam aut laborum cumque. Fuga animi vero laboriosam ipsa repudiandae quis aspernatur eum. Ut incidunt est et rerum.

Et nisi sed qui. Quam aut et eligendi et delectus molestiae. Deserunt voluptatem mollitia et voluptates quae odio aliquam. Dicta rem ut voluptas iure consequuntur dolorum autem.

Ut sapiente inventore consequuntur non in. Sed magni omnis quod dolor non hic saepe. Repudiandae eos tempore deserunt at eos sunt.',
                'sport_id' => '019169e3-e100-7ac7-8d5c-c547ac373320',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            26 => [
                'id' => '01917a02-df74-70d0-a4c8-4663ae332f4e',
                'parent_id' => '01917a02-df6d-7075-a0fa-8afc4ef9e969',
                'name' => 'National Championship | Wales',
                'description' => 'Aperiam culpa vel fuga. Voluptatem minus velit non numquam culpa veniam impedit. Atque magnam aliquam tempora perferendis. Consequuntur eius esse atque tenetur aut quia. Quaerat eius minus maiores consequatur culpa doloribus.

Eaque quod delectus hic. Qui at aspernatur porro quisquam vero. Minima laboriosam voluptatum qui iste minima.

Tenetur repellat quo libero expedita. Reiciendis excepturi voluptatem nobis in dolorum maiores quam. Quis aliquam doloremque accusantium.',
                'sport_id' => '019169e3-e100-7ac7-8d5c-c547ac373320',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            27 => [
                'id' => '01917a02-df76-71ab-8c50-2a05fba57dfc',
                'parent_id' => '01917a02-df6d-7075-a0fa-8afc4ef9e969',
                'name' => 'National Championship | Northern Ireland',
                'description' => 'Architecto voluptate neque qui accusantium vitae quos. Earum quis iure enim vitae consequatur quasi deserunt. Et totam impedit magnam ea sed cum.

Non consequatur qui dolor enim est. Excepturi ex consequuntur tenetur porro rem veniam.

Temporibus molestiae illum ut aperiam. Tempore libero aut ipsam adipisci rerum est voluptate. Ut repellat eum minima laborum eos similique debitis.',
                'sport_id' => '019169e3-e100-7ac7-8d5c-c547ac373320',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            28 => [
                'id' => '01917a02-df78-7090-961b-fba92e9d9f02',
                'parent_id' => '01917a02-df6d-7075-a0fa-8afc4ef9e969',
                'name' => 'National Championship | Republic of Ireland',
                'description' => 'Odit blanditiis consequatur saepe. Et quis est quisquam dignissimos explicabo officiis. Minus autem tempore pariatur quo aperiam eius necessitatibus maxime. Voluptates molestiae ut aut odit vitae.

Hic libero voluptatibus corporis rem ut ea. Quia aut minus quo dolorum. Dolores et dicta corporis qui numquam odit non. Ipsam esse laboriosam nostrum.

Voluptatum assumenda recusandae illo odit ut earum officia molestiae. Nihil corrupti magni sed placeat adipisci ducimus quisquam. Illo cum dolorem aut exercitationem. Et facilis voluptas ratione id et.',
                'sport_id' => '019169e3-e100-7ac7-8d5c-c547ac373320',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            29 => [
                'id' => '01917a02-df7b-709e-8a83-25bbbbbb75cd',
                'parent_id' => null,
                'name' => 'World Championship',
                'description' => 'Explicabo architecto accusamus officiis est. Et id libero enim exercitationem omnis voluptas. Fugit optio impedit ab esse consectetur explicabo ab. Cupiditate tenetur illum dolorum incidunt consequatur.

Sunt dolores ut doloremque odio. Sed veniam nobis placeat est maiores atque. Dignissimos pariatur vel repellendus iure quam pariatur.

Eum reprehenderit illum quod sint illum id sed. Voluptatem repellat magnam et eos. Saepe dolorem ratione quia reiciendis.',
                'sport_id' => '019169e3-e100-7b2d-8f8e-f799136b2da5',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            30 => [
                'id' => '01917a02-df7d-719a-97ca-cfc5d5e0f8ec',
                'parent_id' => null,
                'name' => 'National Championship',
                'description' => 'Facilis repellat iure id molestiae. Autem sint molestias dolorum. Consequatur corporis beatae consequatur eum et. Non autem non quia quia et incidunt. Placeat voluptatem cum eum voluptatum vel.

Accusamus natus aut minima tenetur dolore. Quae laudantium pariatur reiciendis sit voluptate ut exercitationem. Rerum autem autem quod quia a. Dolore facilis nihil mollitia quis unde.

Et quod quis neque non hic aperiam cupiditate tenetur. Explicabo et totam veniam ipsum culpa dolore expedita. Nobis eaque autem eos atque nihil tenetur enim aut.',
                'sport_id' => '019169e3-e100-7b2d-8f8e-f799136b2da5',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            31 => [
                'id' => '01917a02-df7f-70ed-9c18-872360ab69ec',
                'parent_id' => '01917a02-df7d-719a-97ca-cfc5d5e0f8ec',
                'name' => 'National Championship | England',
                'description' => 'Architecto molestiae inventore qui recusandae autem. Deserunt ut earum dicta reprehenderit sunt voluptatem rem. Quidem laboriosam molestias impedit. Minima minus eligendi nisi est et quos.

Dolorum velit vel vero. Voluptas voluptatem facilis voluptatem et voluptates voluptatibus.

Ut sunt deleniti quia laboriosam sequi doloremque. Neque commodi est nam alias sit fugit minima. Odio ut veniam dolores aperiam eligendi. Id qui molestiae voluptas facilis et vel cupiditate.',
                'sport_id' => '019169e3-e100-7b2d-8f8e-f799136b2da5',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            32 => [
                'id' => '01917a02-df81-7226-bca6-ffce847d129d',
                'parent_id' => '01917a02-df7d-719a-97ca-cfc5d5e0f8ec',
                'name' => 'National Championship | Scotland',
                'description' => 'Illo qui qui ipsam. Quaerat sint quibusdam dicta excepturi officiis et suscipit voluptatem. Accusamus ipsum nostrum veniam architecto incidunt. Quaerat atque hic expedita aspernatur.

Exercitationem totam eligendi quisquam consequatur facere id. Non exercitationem aut repellat aut molestias. Ex eius voluptatibus aut distinctio a deserunt qui.

Sint illum sit earum nostrum dolorum expedita excepturi aut. Libero non harum repellendus ipsa blanditiis tempora dignissimos aspernatur. Eaque iusto ut quam hic saepe alias.',
                'sport_id' => '019169e3-e100-7b2d-8f8e-f799136b2da5',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            33 => [
                'id' => '01917a02-df83-716e-af0d-a656a61324da',
                'parent_id' => '01917a02-df7d-719a-97ca-cfc5d5e0f8ec',
                'name' => 'National Championship | Wales',
                'description' => 'Ipsa nihil incidunt vel. Porro explicabo doloremque labore velit possimus. Id rem totam voluptatibus cupiditate. Esse aperiam maiores accusantium excepturi magni.

Officia saepe voluptatem inventore quo deleniti. Aut minus harum velit dolore similique aut. Rerum eius delectus voluptatum. Et rem magnam quo quo voluptatum dolor.

Culpa corporis unde qui. Optio est voluptate placeat.',
                'sport_id' => '019169e3-e100-7b2d-8f8e-f799136b2da5',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            34 => [
                'id' => '01917a02-df85-720d-9fb9-8b7fc6ecd4a4',
                'parent_id' => '01917a02-df7d-719a-97ca-cfc5d5e0f8ec',
                'name' => 'National Championship | Northern Ireland',
                'description' => 'Error in qui dolorem deleniti laborum. Facere et explicabo consequatur harum alias. Unde facere placeat ullam quia aut.

Fugit accusantium quam eius occaecati qui eum eaque. Inventore magnam sed velit maxime nihil. Et dignissimos voluptatum sed dolores similique ullam qui.

Eius nihil suscipit natus quaerat. Officiis natus reprehenderit quia omnis earum autem et. Molestiae provident perspiciatis ut expedita provident in. Aut aspernatur laudantium doloribus rem.',
                'sport_id' => '019169e3-e100-7b2d-8f8e-f799136b2da5',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            35 => [
                'id' => '01917a02-df87-704d-b334-b9771f9efc10',
                'parent_id' => '01917a02-df7d-719a-97ca-cfc5d5e0f8ec',
                'name' => 'National Championship | Republic of Ireland',
                'description' => 'Id in explicabo eligendi doloribus qui ipsa veniam. Qui et nulla dolor. Earum deleniti non et. Est aut omnis quisquam doloribus assumenda blanditiis necessitatibus.

Dolor est qui atque porro nihil ea. Et eos aut molestiae aut ut dolor sit velit. Quidem commodi velit quis et. Suscipit voluptas dolorem ea atque debitis non quaerat nobis.

Esse et et deserunt odit magnam. Corporis in optio doloremque non sunt odit aut. Ea molestiae laboriosam aut accusantium quibusdam libero.',
                'sport_id' => '019169e3-e100-7b2d-8f8e-f799136b2da5',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            36 => [
                'id' => '01917a02-df89-70ad-81b3-d31060c93d55',
                'parent_id' => null,
                'name' => 'World Championship',
                'description' => 'Animi quis aut modi incidunt dolore placeat doloremque. Molestiae et voluptatem consectetur sequi quos. Beatae odit voluptate voluptate commodi facere ducimus voluptatem.

Ut iste voluptate molestiae libero dolorem ut porro. Et sequi iusto aperiam id dolor. Rerum architecto id velit et quasi et accusantium. Perferendis earum qui quis porro eum impedit.

Repellendus ut sed consequatur non at quasi voluptatum. Qui est exercitationem accusamus eveniet delectus. Aut aut rem suscipit inventore.',
                'sport_id' => '019169e3-e100-7784-a3ae-8adfe9451a1b',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            37 => [
                'id' => '01917a02-df8b-727f-a8ca-4a0a802bec60',
                'parent_id' => null,
                'name' => 'National Championship',
                'description' => 'Aut quo illo et voluptates nihil suscipit magnam magni. Maiores architecto corporis laudantium in et. Molestiae suscipit rem nam nemo cupiditate voluptate. Veritatis minus et voluptatum nihil.

Quo perferendis eius velit qui inventore ab. Ducimus qui impedit est minus omnis dolor eos. Similique tempore sunt maxime ipsum.

Iste rem nemo sit sapiente aliquid. Molestiae ipsam qui consequatur et repellat facere. Magnam fugiat sed omnis est id facilis excepturi recusandae. Ut esse debitis quo maiores.',
                'sport_id' => '019169e3-e100-7784-a3ae-8adfe9451a1b',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            38 => [
                'id' => '01917a02-df8d-72b4-a9cb-54d073d1efaf',
                'parent_id' => '01917a02-df8b-727f-a8ca-4a0a802bec60',
                'name' => 'National Championship | England',
                'description' => 'Consequatur quidem consequatur facere nobis voluptas corrupti. Sapiente ducimus nisi itaque. Aut ut consequatur ea vel sequi aspernatur dolorem. Excepturi sint quis cum rerum tempore commodi. Nostrum rerum dolor molestiae quidem minima eligendi odio occaecati.

Et ipsum vero a possimus. Iure amet dolor fugit assumenda. Quia voluptatem laboriosam temporibus id. Ducimus dignissimos aspernatur voluptatem est sunt laborum.

Nihil voluptatum tenetur at quas. Quos aut aut in magnam ut corrupti voluptatem.',
                'sport_id' => '019169e3-e100-7784-a3ae-8adfe9451a1b',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            39 => [
                'id' => '01917a02-df91-706d-857a-083b19b39e38',
                'parent_id' => '01917a02-df8b-727f-a8ca-4a0a802bec60',
                'name' => 'National Championship | Wales',
                'description' => 'In aut officiis est sunt laudantium culpa. Quae sed rem omnis corporis ex ea omnis. Facere quas sunt omnis. Autem amet repudiandae fugiat excepturi.

Expedita est sit in et aut quibusdam quia. Cum id quia esse repellendus voluptatem. Vitae facere voluptates nesciunt dolores ut maiores vel.

Quia deserunt sint necessitatibus aut in non. Adipisci officiis voluptatem laudantium nostrum aperiam. Nam cum quis ut nisi.',
                'sport_id' => '019169e3-e100-7784-a3ae-8adfe9451a1b',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            40 => [
                'id' => '01917a02-df93-7115-b787-a30b6c8b32ac',
                'parent_id' => '01917a02-df8b-727f-a8ca-4a0a802bec60',
                'name' => 'National Championship | Northern Ireland',
                'description' => 'Voluptatem est itaque cumque id porro et. Perspiciatis vel non placeat quisquam quidem ducimus. Tempore suscipit tenetur in quaerat voluptatum ut in. Quae velit eos iusto.

Accusantium quidem consequatur vitae. Iure sit quod ratione porro. Ipsum in saepe minima voluptate a in iure unde. Cum minus non illo iste magni voluptas.

Magnam eveniet totam et ut ex error iusto. Animi non aut ipsam temporibus tempore tempora quia. Veritatis corrupti totam exercitationem perspiciatis occaecati at. Molestiae nihil numquam maxime earum ullam omnis architecto.',
                'sport_id' => '019169e3-e100-7784-a3ae-8adfe9451a1b',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            41 => [
                'id' => '01917a02-df95-7162-aa80-984dcb87f15d',
                'parent_id' => '01917a02-df8b-727f-a8ca-4a0a802bec60',
                'name' => 'National Championship | Republic of Ireland',
                'description' => 'Mollitia sed a eaque quidem. Possimus aut excepturi labore. Nihil corporis alias ut ut repellendus tempora. Fuga non consequatur praesentium nobis velit aut qui velit.

Et dolores et dignissimos praesentium natus qui quae. Et ad fuga nam aperiam voluptatum. Id alias provident nisi accusantium veritatis alias.

Eos animi dolores consequatur sapiente et. Maiores eos excepturi maiores vero culpa.',
                'sport_id' => '019169e3-e100-7784-a3ae-8adfe9451a1b',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            42 => [
                'id' => '01917a02-df97-7196-b123-c1fe13129d86',
                'parent_id' => null,
                'name' => 'World Championship',
                'description' => 'Praesentium perspiciatis dolores reiciendis dolore autem neque saepe. Eveniet ab corrupti libero officia. Sint autem eum voluptates fuga et.

Ab vero quae non quibusdam cum nihil explicabo eos. Quasi odit ea et perspiciatis. Sit soluta iusto et ut.

Quidem omnis et voluptatibus fugit. Asperiores assumenda dolorum explicabo possimus quia. Inventore sed consectetur rerum consequuntur nihil fugiat. Laboriosam eos expedita sit et sunt quo esse.',
                'sport_id' => '019169e3-e100-79e2-9210-9b8c2aae10f8',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            43 => [
                'id' => '01917a02-df99-7312-a597-971a973cd39b',
                'parent_id' => null,
                'name' => 'National Championship',
                'description' => 'Quos voluptatem magnam aut deleniti. Distinctio impedit aut et doloremque molestias. Et aut sint ab et blanditiis eveniet et.

Aut sed id omnis ut. Ut blanditiis natus voluptates voluptatibus aut. Sunt harum repellat molestiae aspernatur tenetur rerum. Et ratione odit magni neque velit.

Et eveniet porro saepe nesciunt. Qui sunt tempora iste adipisci est non. Reiciendis ad modi ducimus accusamus quibusdam ipsam est.',
                'sport_id' => '019169e3-e100-79e2-9210-9b8c2aae10f8',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            44 => [
                'id' => '01917a02-df9b-7346-abec-be4026f7420d',
                'parent_id' => '01917a02-df99-7312-a597-971a973cd39b',
                'name' => 'National Championship | England',
                'description' => 'Et qui tempore facere ut. Facere odio natus quod occaecati sapiente nostrum.

Consequatur et impedit facere et quos est voluptatem. Vel corporis numquam esse nostrum. Commodi quas necessitatibus nihil ducimus quis rerum nobis. Aliquid magnam consectetur quia earum perspiciatis.

Repellendus recusandae molestias modi quas placeat ut eaque. Et aliquid voluptates ut quibusdam dolores inventore accusantium. Iusto ipsam exercitationem illum enim provident.',
                'sport_id' => '019169e3-e100-79e2-9210-9b8c2aae10f8',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            45 => [
                'id' => '01917a02-df9d-7019-8800-c81ee2ba5f14',
                'parent_id' => '01917a02-df99-7312-a597-971a973cd39b',
                'name' => 'National Championship | Scotland',
                'description' => 'Enim ipsam possimus illo vel culpa. Qui officia officiis nihil sed velit dignissimos repellendus. Adipisci deserunt numquam mollitia aperiam et consequatur ipsa. Dolor quo non illum vero reprehenderit.

Culpa quod sapiente optio excepturi qui mollitia. Velit dolore atque tempora est tempora.

Quaerat consequatur maxime maxime placeat. Voluptatem perferendis ut eos atque veniam nam et non. Voluptatem dicta vero architecto. Voluptatibus ea consectetur nobis dolore est.',
                'sport_id' => '019169e3-e100-79e2-9210-9b8c2aae10f8',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            46 => [
                'id' => '01917a02-df9f-721c-9620-23202dd4d44e',
                'parent_id' => '01917a02-df99-7312-a597-971a973cd39b',
                'name' => 'National Championship | Wales',
                'description' => 'Illum non provident est libero iusto sed molestiae. Ea aspernatur voluptatem totam eos ut consequatur sunt. Sed voluptates recusandae ducimus sit inventore. Doloremque alias quos esse omnis aliquid et sunt.

Ipsam doloribus illum architecto et aperiam accusantium. Hic cumque nulla at magnam numquam. Minus dolorem aliquid ea aut.

Et aliquid libero non minus fugiat et vel. Quas accusantium at fugiat voluptatem id sed. Ut est sequi tempore laboriosam.',
                'sport_id' => '019169e3-e100-79e2-9210-9b8c2aae10f8',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            47 => [
                'id' => '01917a02-dfa1-71a6-bf46-036cd1f0705f',
                'parent_id' => '01917a02-df99-7312-a597-971a973cd39b',
                'name' => 'National Championship | Northern Ireland',
                'description' => 'Molestiae voluptatum voluptatem voluptatem fugiat voluptates dolore doloribus tenetur. Asperiores libero vitae eius architecto voluptatibus. Culpa et debitis corrupti deserunt autem voluptates.

Alias quidem non sed. Nihil deleniti sapiente dicta et nobis porro. Et beatae sequi odit quisquam et vel. Cupiditate repellat iusto dolorem voluptatum.

Qui autem minima explicabo est alias sint. Dignissimos quaerat laudantium excepturi. Magnam dolor blanditiis molestiae mollitia ad eum.',
                'sport_id' => '019169e3-e100-79e2-9210-9b8c2aae10f8',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            48 => [
                'id' => '01917a02-dfa3-70b7-b628-a6e1d17e291f',
                'parent_id' => '01917a02-df99-7312-a597-971a973cd39b',
                'name' => 'National Championship | Republic of Ireland',
                'description' => 'Ducimus id et ipsam vero. Officia molestias amet saepe assumenda. Eos fugit eligendi dolores suscipit accusamus soluta veritatis. Magni vel doloremque facilis aut ea.

Qui modi earum dolorem incidunt non vitae quia sed. Aliquam accusamus rerum consequatur assumenda laboriosam ut. Maiores tempore dolor dolorem facilis ut. Blanditiis inventore quisquam esse similique deleniti.

Fuga magni numquam ducimus similique natus cupiditate fugit maiores. Doloribus ut voluptatem eum dolor quidem ipsa illo. Ipsa tempore modi qui id vel aut magni. Illum inventore architecto minima nihil et a.',
                'sport_id' => '019169e3-e100-79e2-9210-9b8c2aae10f8',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            49 => [
                'id' => '01917a02-dfa5-7287-8df0-2b3a0a03e5ee',
                'parent_id' => null,
                'name' => 'World Championship',
                'description' => 'Qui perferendis corporis a. Enim mollitia voluptas est id itaque doloremque. Dolores ut amet nihil harum vel. Eos suscipit rerum necessitatibus nam. Nam eum doloribus et saepe.

Aut et sed sit quia. Voluptas culpa culpa soluta id necessitatibus facere voluptas expedita. Et pariatur eos excepturi rerum ipsa exercitationem doloribus. Corrupti sequi perferendis dolorum dolore vero. Ipsa id ab placeat temporibus voluptas officiis quos.

Et voluptatibus sed ut ut consequatur et eum. Et consequatur numquam molestiae ipsa iure ut similique. Rem consequuntur porro asperiores numquam laudantium optio omnis. Laudantium quia possimus labore odio error quis.',
                'sport_id' => '019169e3-e100-74df-a5c5-a6bee1816a4a',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            50 => [
                'id' => '01917a02-dfa7-70ed-b7b1-cf782cdc2097',
                'parent_id' => null,
                'name' => 'National Championship',
                'description' => 'Repellat et laudantium libero dolorum excepturi harum. Ratione optio et maxime suscipit odio asperiores. Et tenetur vel nesciunt minus. Consequuntur qui et delectus sunt velit.

Dolore et doloremque cum aperiam et nihil animi. Eos deleniti et voluptate ut voluptatibus dolor. Voluptatem id sunt expedita molestiae recusandae et molestiae odit.

Modi est tempora consequatur distinctio. Nemo omnis ut consectetur rerum neque. Eos aut quod ab magni consequuntur nam.',
                'sport_id' => '019169e3-e100-74df-a5c5-a6bee1816a4a',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            51 => [
                'id' => '01917a02-dfa9-71bb-9544-4ce555b20d34',
                'parent_id' => '01917a02-dfa7-70ed-b7b1-cf782cdc2097',
                'name' => 'National Championship | England',
                'description' => 'Accusamus ad sed reiciendis sint amet recusandae ex. Et in ut soluta et minus. Aut qui et vero sit omnis molestiae nemo voluptates.

Expedita est porro assumenda corporis sint et. Mollitia ut aut sapiente. Accusantium ut dolorem atque nobis. Quisquam recusandae aut officiis aut. Nam laborum nihil vero.

Omnis veritatis ut quam. Qui vero molestias repellat neque est velit. Magni sit temporibus corporis aut.',
                'sport_id' => '019169e3-e100-74df-a5c5-a6bee1816a4a',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            52 => [
                'id' => '01917a02-dfab-7117-85d5-4660738adfa6',
                'parent_id' => '01917a02-dfa7-70ed-b7b1-cf782cdc2097',
                'name' => 'National Championship | Scotland',
                'description' => 'Praesentium est veniam molestiae est alias libero et. Commodi aut sequi facilis quidem. Voluptatem fugiat ipsa incidunt consequatur sed quidem rerum. Aliquid minima eum animi.

Iure incidunt tenetur itaque necessitatibus nihil aut. Ut perferendis quos itaque autem. Voluptate et ut ab debitis. Ipsam eveniet vero voluptate ipsum quam.

Laborum voluptatem explicabo aut aut ea. Distinctio velit quos consequuntur ut reprehenderit.',
                'sport_id' => '019169e3-e100-74df-a5c5-a6bee1816a4a',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            53 => [
                'id' => '01917a02-dfad-739d-a838-0cf262fd9049',
                'parent_id' => '01917a02-dfa7-70ed-b7b1-cf782cdc2097',
                'name' => 'National Championship | Wales',
                'description' => 'Velit consequatur non laudantium consequatur voluptas consectetur. Non est maiores voluptatibus quae. Reiciendis odio ut quos ea quidem cumque.

Enim aliquam ab consequuntur voluptatibus quas et perspiciatis. Minus quis velit enim. Enim tempora velit itaque expedita unde. Assumenda quis est est nisi iste error reiciendis. Ad architecto vel ea porro facilis.

Expedita aspernatur inventore est modi ut est omnis. Architecto laboriosam sunt veniam sit voluptatem et. Repellendus repellat consequatur sit magni aut. Quisquam blanditiis molestiae maiores ipsum dolore totam.',
                'sport_id' => '019169e3-e100-74df-a5c5-a6bee1816a4a',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            54 => [
                'id' => '01917a02-dfaf-7197-b17f-e4fd7e2cec9a',
                'parent_id' => '01917a02-dfa7-70ed-b7b1-cf782cdc2097',
                'name' => 'National Championship | Northern Ireland',
                'description' => 'Atque amet dolor odio odit praesentium. Nulla voluptatem voluptatem pariatur quidem porro libero. Excepturi sed commodi sequi aut. Saepe itaque voluptas earum ipsum velit.

Quidem magni voluptatibus illo quibusdam in quasi voluptate in. Suscipit similique hic delectus. Aut ad est voluptatem nulla veniam debitis incidunt. Minima minus ipsum et illum et.

Voluptatem ea dolorem doloremque eum. Sint corporis et minima aperiam aliquid cupiditate modi consequatur. Dolor sapiente atque cum voluptates. Est ex saepe asperiores aperiam. Non modi dolor officiis consequatur nobis sed.',
                'sport_id' => '019169e3-e100-74df-a5c5-a6bee1816a4a',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            55 => [
                'id' => '01917a02-dfb1-739d-b7c4-1cd2b524cc0d',
                'parent_id' => '01917a02-dfa7-70ed-b7b1-cf782cdc2097',
                'name' => 'National Championship | Republic of Ireland',
                'description' => 'Et et excepturi nemo omnis voluptas illum. Voluptatem quia qui nemo. Voluptate hic voluptate minus tempora cum.

Cum eum quasi blanditiis dolorem. Ipsam ut similique suscipit nulla. Possimus quas incidunt itaque voluptatibus tempora quo.

Iure tenetur omnis harum ut itaque. Est quam explicabo ipsam quo ullam natus totam.',
                'sport_id' => '019169e3-e100-74df-a5c5-a6bee1816a4a',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            56 => [
                'id' => '01917a02-dfb3-7366-8f48-0e84da704d9f',
                'parent_id' => null,
                'name' => 'World Championship',
                'description' => 'Fugiat impedit voluptatibus libero repellat in optio est. Suscipit quaerat aspernatur ea dignissimos non quod ut. Deleniti aliquam similique magni.

Consequatur exercitationem quia qui molestiae. Dolorum possimus laboriosam placeat voluptates ipsum sed minus. Labore nostrum quidem cupiditate qui voluptatum repellat.

Non sit veritatis similique corporis aut. Numquam quo quaerat est. Aut nam iure vero excepturi.',
                'sport_id' => '019169e3-e100-77c5-bece-ada3c3c73c9f',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            57 => [
                'id' => '01917a02-dfb5-7070-afd9-5b136ed3e5e8',
                'parent_id' => null,
                'name' => 'National Championship',
                'description' => 'Explicabo et esse maxime dolorem. Aliquam sed odit deserunt ut. Eos facilis vel laborum neque qui officiis.

Non rerum voluptas assumenda vel magnam. Provident et qui perferendis culpa molestiae esse esse. Tempora nobis facere expedita vel error deserunt. Libero non vitae vitae amet sapiente enim voluptate quia.

Voluptas et aliquam quasi exercitationem aut recusandae. Aut eius voluptas quia quos pariatur dolorum qui. Dolorem totam perspiciatis in eos nihil asperiores. Distinctio officia quia aperiam non ipsum dolore.',
                'sport_id' => '019169e3-e100-77c5-bece-ada3c3c73c9f',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            58 => [
                'id' => '01917a02-dfb7-72ef-9f9a-9ea40cecae22',
                'parent_id' => '01917a02-dfb5-7070-afd9-5b136ed3e5e8',
                'name' => 'National Championship | England',
                'description' => 'Est expedita quidem exercitationem. Occaecati eaque voluptatem nisi labore sunt earum quis. Ad et ullam non non qui doloremque officiis assumenda. Laudantium consectetur impedit dolore velit ratione dolor.

Unde maxime sunt dolor. Quam beatae deleniti vitae velit. Autem dolor voluptatem doloremque illo.

Vel odit aut eum saepe est iste nemo. Consectetur et molestiae pariatur non sit id eos voluptatem. Architecto animi dolorem laborum earum optio vel aut. Nostrum cumque iste enim excepturi repellendus expedita tempora.',
                'sport_id' => '019169e3-e100-77c5-bece-ada3c3c73c9f',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            59 => [
                'id' => '01917a02-dfb9-7083-93e4-fe20b8faff6b',
                'parent_id' => '01917a02-dfb5-7070-afd9-5b136ed3e5e8',
                'name' => 'National Championship | Scotland',
                'description' => 'Ad vel eum impedit autem. Ullam veniam et perferendis corporis. Ullam dignissimos aut quod sint repellendus ipsa numquam ipsa.

Non placeat et est praesentium. Et aspernatur minus consequatur et quidem alias est. Ipsum itaque neque consequatur et ea quas.

Eos nihil ut animi. Nihil distinctio culpa qui deserunt sit natus. Hic ducimus minus aut dolore et deleniti natus ipsum. Ullam aut voluptate illo nostrum sint vel.',
                'sport_id' => '019169e3-e100-77c5-bece-ada3c3c73c9f',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            60 => [
                'id' => '01917a02-dfbc-70c9-8026-6ab9cb5e00cb',
                'parent_id' => '01917a02-dfb5-7070-afd9-5b136ed3e5e8',
                'name' => 'National Championship | Wales',
                'description' => 'Eos id ad repellendus vero. Ullam est exercitationem et sunt asperiores. Aperiam consequatur et ducimus aut consequatur quo tenetur.

Recusandae ut tempora ea atque corporis enim odit. Aut temporibus et vel quae ratione voluptates. Id officiis et enim provident.

Sit porro aut eligendi. Qui ea aut et unde mollitia. Est aspernatur saepe sapiente perspiciatis necessitatibus.',
                'sport_id' => '019169e3-e100-77c5-bece-ada3c3c73c9f',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            61 => [
                'id' => '01917a02-dfbe-73e2-b839-403446e021ab',
                'parent_id' => '01917a02-dfb5-7070-afd9-5b136ed3e5e8',
                'name' => 'National Championship | Northern Ireland',
                'description' => 'Esse quia tempora ducimus culpa omnis voluptates dicta. Aspernatur animi nobis et eligendi. Quis qui sapiente dolor sapiente.

Quas sit similique inventore dolores iure quia minus. Natus esse ipsa esse velit delectus vel accusamus. Veritatis omnis nostrum a debitis.

Necessitatibus reiciendis possimus molestiae quis labore voluptas rem. Dicta nam ab quidem odio. Minus mollitia esse reprehenderit sunt sed.',
                'sport_id' => '019169e3-e100-77c5-bece-ada3c3c73c9f',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            62 => [
                'id' => '01917a02-dfc0-7099-98de-c08ccee63b89',
                'parent_id' => '01917a02-dfb5-7070-afd9-5b136ed3e5e8',
                'name' => 'National Championship | Republic of Ireland',
                'description' => 'Soluta esse molestiae facilis. Labore quasi amet sed et. Veniam aut sapiente reiciendis. Asperiores sint voluptas dolores necessitatibus quod expedita.

Dolorem cupiditate iste est consequuntur. Fugit modi et perspiciatis sunt molestiae sequi. Error ut occaecati eligendi sunt.

Totam minima velit aperiam sint fuga ea tenetur. Quam inventore commodi expedita doloribus dignissimos et optio. Eaque harum voluptates amet sit molestiae. Quasi quia iste eius amet delectus dolor sunt officiis. Omnis consectetur nam qui.',
                'sport_id' => '019169e3-e100-77c5-bece-ada3c3c73c9f',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            63 => [
                'id' => '01917a02-dfc2-70ba-993e-aad1330126fb',
                'parent_id' => null,
                'name' => 'World Championship',
                'description' => 'Nobis nihil nesciunt veritatis tempore. Magnam dolores quod molestias. Ducimus quo quis at dolorem atque. Et est dolores ab et. Magnam quia atque consequuntur labore minima ducimus impedit.

Dolore quas cum quod doloribus. Quos odit quos porro itaque cupiditate. Omnis qui facilis quis non esse est voluptatem. Placeat et voluptates molestiae ea minima tempora totam.

Aliquid placeat dolorem et at. Occaecati quia dolor placeat perferendis repudiandae minus voluptatum. Delectus nam facilis et illo dolores.',
                'sport_id' => '019169e3-e100-73f5-8f96-85b84c5f286e',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            64 => [
                'id' => '01917a02-dfc4-72d2-b4ce-991f43c2ef60',
                'parent_id' => null,
                'name' => 'National Championship',
                'description' => 'Dolorum distinctio est eligendi accusamus quis itaque. Dolorem quia provident magnam iste alias exercitationem. Voluptates voluptas excepturi voluptatum labore quam facilis. Aperiam quidem quo soluta excepturi laudantium quia. Porro porro impedit eius id omnis.

Culpa quidem unde dolor impedit amet aut. Quasi numquam facere ut saepe. Id fuga facilis rerum nisi.

Veritatis at quidem placeat maxime sint labore non. Dolor sunt explicabo rerum. Esse magni est ut.',
                'sport_id' => '019169e3-e100-73f5-8f96-85b84c5f286e',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            65 => [
                'id' => '01917a02-dfc6-7065-bd11-54279e37cab6',
                'parent_id' => '01917a02-dfc4-72d2-b4ce-991f43c2ef60',
                'name' => 'National Championship | England',
                'description' => 'Nam ducimus fugiat qui molestias occaecati explicabo odio. Ut doloribus nisi soluta accusamus libero animi culpa tempora. Est eum eius sit aliquid. Voluptas expedita sint debitis perferendis voluptas ipsam et id.

Illo voluptas distinctio animi molestias dolores aut velit accusamus. Beatae quos magnam voluptatem. Voluptatum eligendi sint sint dolor quis quas. Non recusandae excepturi explicabo.

Et praesentium et et ut error totam sit quos. Aliquid quia minima doloribus dolores nihil. Aut vitae qui neque qui.',
                'sport_id' => '019169e3-e100-73f5-8f96-85b84c5f286e',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            66 => [
                'id' => '01917a02-dfc9-73b4-9316-81fd19190992',
                'parent_id' => '01917a02-dfc4-72d2-b4ce-991f43c2ef60',
                'name' => 'National Championship | Scotland',
                'description' => 'Doloremque aut molestiae eum ducimus. Eos officiis molestiae sint ea. Consectetur aut distinctio sunt hic. A incidunt deserunt est sunt.

Voluptate ducimus minus nulla ex cumque totam consequatur. Similique quaerat in voluptatem ea repudiandae qui et. Illum expedita natus perferendis voluptates nam tempora corrupti similique. Nemo deleniti qui repellat accusantium.

Dolorum dignissimos error eum autem adipisci enim reiciendis. Magnam sit omnis ut possimus. Qui quasi asperiores non distinctio ut. Et omnis repellat iusto dolor fugiat est.',
                'sport_id' => '019169e3-e100-73f5-8f96-85b84c5f286e',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            67 => [
                'id' => '01917a02-dfcb-7307-aff1-7c772cacdbf7',
                'parent_id' => '01917a02-dfc4-72d2-b4ce-991f43c2ef60',
                'name' => 'National Championship | Wales',
                'description' => 'Est officiis quo corporis facere. Ex tempore omnis delectus eaque labore eligendi. Ducimus eum aliquam omnis vel voluptatum qui incidunt eius.

Quibusdam numquam voluptatem quo quis earum. Possimus et aut cupiditate rerum. Facilis qui quam harum officia. Commodi eum dolor eius amet quasi labore eum.

Omnis expedita voluptatem dolor architecto consequatur id. Repellat non aut quisquam debitis magni. Distinctio velit corrupti nihil veritatis.',
                'sport_id' => '019169e3-e100-73f5-8f96-85b84c5f286e',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            68 => [
                'id' => '01917a02-dfcc-7034-9003-41b4a945e989',
                'parent_id' => '01917a02-dfc4-72d2-b4ce-991f43c2ef60',
                'name' => 'National Championship | Northern Ireland',
                'description' => 'Velit voluptatum saepe nesciunt nesciunt ipsum non sed omnis. Aut nihil est quo molestiae natus rem odio.

Modi itaque autem voluptatem deserunt aliquam quibusdam. Ex aut consequuntur et omnis autem consectetur excepturi. Quam commodi animi architecto eaque qui. Ut sunt esse et maiores esse voluptatum autem a. Eum omnis velit dolorum quia officia.

Labore vitae dolorem quis nostrum iste voluptatibus quisquam natus. Nesciunt rerum nobis voluptate reiciendis. Alias aut provident non.',
                'sport_id' => '019169e3-e100-73f5-8f96-85b84c5f286e',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
            69 => [
                'id' => '01917a02-dfce-72a6-8d9b-a526a93f4328',
                'parent_id' => '01917a02-dfc4-72d2-b4ce-991f43c2ef60',
                'name' => 'National Championship | Republic of Ireland',
                'description' => 'Dolorem maiores quod magnam. Sed aut occaecati voluptatem quas laudantium ex ea. Quisquam natus quod aut iure fuga.

Et maiores veritatis debitis et qui. Dolor aliquid sint quod aspernatur. Ut architecto ipsam eos voluptatum. Nihil qui consectetur esse voluptatibus et.

Corrupti ex et et. Ut eum ab enim illo voluptas repellendus vitae. Mollitia quos debitis molestias consequuntur consectetur quia qui. Voluptatem et sequi qui autem officia vero.',
                'sport_id' => '019169e3-e100-73f5-8f96-85b84c5f286e',
                'created_at' => '2024-08-22T12:14:54.000000Z',
                'updated_at' => '2024-08-22T12:14:54.000000Z',
            ],
        ];
    }
}
