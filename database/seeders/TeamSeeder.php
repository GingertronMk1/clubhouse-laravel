<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getTeams() as $team) {
            Team::create($team);
        }
    }

    /**
     * @return array<int, array<array<string>|string>>
     */
    private function getTeams(): array
    {
        return [
            0 => [
                'id' => '019169fb-9074-71e6-b455-f35854f9b70a',
                'name' => 'Arizona Cardinals',
                'colours' => ['#97233F', '#000000', '#FFB612'],
            ],
            1 => [
                'id' => '019169fb-9078-70d8-9ea2-5e14e52cb760',
                'name' => 'Atlanta Falcons',
                'colours' => ['#A71930', '#000000', '#A5ACAF'],
            ],
            2 => [
                'id' => '019169fb-9079-7092-8d00-f7b78c6306f9',
                'name' => 'Baltimore Ravens',
                'colours' => ['#241773', '#000000', '#9E7C0C', '#C60C30'],
            ],
            3 => [
                'id' => '019169fb-907c-71d3-82fc-e47c44fd8db8',
                'name' => 'Buffalo Bills',
                'colours' => ['#00338D', '#C60C30'],
            ],
            4 => [
                'id' => '019169fb-907d-7179-b7b0-021c6b505c14',
                'name' => 'Carolina Panthers',
                'colours' => ['#0085CA', '#101820', '#BFC0BF'],
            ],
            5 => [
                'id' => '019169fb-907f-7070-9a71-b6dddd5b5b07',
                'name' => 'Chicago Bears',
                'colours' => ['#0B162A', '#C83803'],
            ],
            6 => [
                'id' => '019169fb-9080-726f-8dd0-c81c7a8f6206',
                'name' => 'Cincinnati Bengals',
                'colours' => ['#FB4F14', '#000000'],
            ],
            7 => [
                'id' => '019169fb-9081-71c0-ae09-e20ba40acb4e',
                'name' => 'Cleveland Browns',
                'colours' => ['#311D00', '#FF3C00'],
            ],
            8 => [
                'id' => '019169fb-9083-7363-836a-31a3e238e22a',
                'name' => 'Dallas Cowboys',
                'colours' => ['#003594', '#041E42', '#869397', '#7F9695', '#FFFFFF'],
            ],
            9 => [
                'id' => '019169fb-9084-73e9-a0d7-eda37249d3ff',
                'name' => 'Denver Broncos',
                'colours' => ['#FB4F14', '#002244'],
            ],
            10 => [
                'id' => '019169fb-9085-7024-afbc-5a79d3d7ef15',
                'name' => 'Detroit Lions',
                'colours' => ['#0076B6', '#B0B7BC', '#000000', '#FFFFFF'],
            ],
            11 => [
                'id' => '019169fb-9087-71ca-9052-21dc2cee94ad',
                'name' => 'Green Bay Packers',
                'colours' => ['#203731', '#FFB612'],
            ],
            12 => [
                'id' => '019169fb-9088-733d-8591-18ed930b2fc4',
                'name' => 'Houston Texans',
                'colours' => ['#03202F', '#A71930'],
            ],
            13 => [
                'id' => '019169fb-9089-7010-8386-e4c8a5f54c27',
                'name' => 'Indianapolis Colts',
                'colours' => ['#002C5F', '#A2AAAD'],
            ],
            14 => [
                'id' => '019169fb-908a-7184-80aa-4ea3e8036cc9',
                'name' => 'Jacksonville Jaguars',
                'colours' => ['#101820', '#D7A22A', '#9F792C', '#006778'],
            ],
            15 => [
                'id' => '019169fb-908c-705a-a3b9-3d8ac31f105b',
                'name' => 'Kansas City Chiefs',
                'colours' => ['#E31837', '#FFB81C'],
            ],
            16 => [
                'id' => '019169fb-908d-732c-ba8c-de34afa3f682',
                'name' => 'Las Vegas Raiders',
                'colours' => ['#000000', '#A5ACAF'],
            ],
            17 => [
                'id' => '019169fb-908e-7120-b673-dee87806e5bc',
                'name' => 'Los Angeles Chargers',
                'colours' => ['#0080C6', '#FFC20E', '#FFFFFF'],
            ],
            18 => [
                'id' => '019169fb-9090-7248-9146-c2e651b98709',
                'name' => 'Los Angeles Rams',
                'colours' => ['#003594', '#FFA300', '#FF8200', '#FFD100', '#FFFFFF'],
            ],
            19 => [
                'id' => '019169fb-9091-7015-9021-910fd2b46248',
                'name' => 'Miami Dolphins',
                'colours' => ['#008E97', '#FC4C02', '#005778'],
            ],
            20 => [
                'id' => '019169fb-9092-734e-b1d0-6b812074aa2e',
                'name' => 'Minnesota Vikings',
                'colours' => ['#4F2683', '#FFC62F'],
            ],
            21 => [
                'id' => '019169fb-9094-705d-9d54-acd8f30eef9a',
                'name' => 'New England Patriots',
                'colours' => ['#002244', '#C60C30', '#B0B7BC'],
            ],
            22 => [
                'id' => '019169fb-9095-7172-b788-6c3f2a5ea15c',
                'name' => 'New Orleans Saints',
                'colours' => ['#D3BC8D', '#101820'],
            ],
            23 => [
                'id' => '019169fb-9099-7245-8558-af8cd0b30996',
                'name' => 'New York Giants',
                'colours' => ['#0B2265', '#A71930', '#A5ACAF'],
            ],
            24 => [
                'id' => '019169fb-909b-71eb-a203-29f4ee70f461',
                'name' => 'New York Jets',
                'colours' => ['#125740', '#000000', '#FFFFFF'],
            ],
            25 => [
                'id' => '019169fb-909d-7289-afc3-78607a634178',
                'name' => 'Philadelphia Eagles',
                'colours' => ['#004C54', '#A5ACAF', '#ACC0C6', '#000000', '#565A5C'],
            ],
            26 => [
                'id' => '019169fb-909e-72b5-8501-e2c4a22ea888',
                'name' => 'Pittsburgh Steelers',
                'colours' => ['#FFB612', '#101820', '#003087', '#C60C30', '#A5ACAF'],
            ],
            27 => [
                'id' => '019169fb-90a0-7253-aa36-7a0067476d11',
                'name' => 'San Francisco 49ers',
                'colours' => ['#AA0000', '#B3995D'],
            ],
            28 => [
                'id' => '019169fb-90a1-7202-9bf1-933e25fdbb6b',
                'name' => 'Seattle Seahawks',
                'colours' => ['#002244', '#69BE28', '#A5ACAF'],
            ],
            29 => [
                'id' => '019169fb-90a3-7074-98c7-2eb18df33e50',
                'name' => 'Tampa Bay Buccaneers',
                'colours' => ['#D50A0A', '#FF7900', '#FF7900', '#B1BABF', '#34302B'],
            ],
            30 => [
                'id' => '019169fb-90a4-7142-ab3c-6cd1a1ad8706',
                'name' => 'Tennessee Titans',
                'colours' => ['#0C2340', '#4B92DB', '#C8102E', '#8A8D8F'],
            ],
            31 => [
                'id' => '019169fb-90a6-710a-92ec-803b3eff1f40',
                'name' => 'Washington Commanders',
                'colours' => ['#5A1414', '#FFB612'],
            ],
            32 => [
                'id' => '019169fb-90a8-70c9-91bf-710ece52de1b',
                'name' => 'Bradford Bulls',
            ],
            33 => [
                'id' => '019169fb-90a9-7155-a88a-f9fdd544b49f',
                'name' => 'Castleford Tigers',
            ],
            34 => [
                'id' => '019169fb-90aa-7179-86fd-0c41b1c4a323',
                'name' => 'Catalans Dragons',
            ],
            35 => [
                'id' => '019169fb-90ac-71d6-b79d-13c5523092c6',
                'name' => 'Crusaders RL',
            ],
            36 => [
                'id' => '019169fb-90ad-7234-bf13-253c46bf4410',
                'name' => 'Halifax Panthers',
            ],
            37 => [
                'id' => '019169fb-90af-73ab-91e8-e5e24a426724',
                'name' => 'Huddersfield Giants',
            ],
            38 => [
                'id' => '019169fb-90b0-70ec-89d6-fe4a7ed4b5f7',
                'name' => 'Hull FC',
            ],
            39 => [
                'id' => '019169fb-90b2-7294-a41e-89de66b2d83b',
                'name' => 'Hull Kingston Rovers',
            ],
            40 => [
                'id' => '019169fb-90b3-735f-b232-0229ae3fc512',
                'name' => 'Leeds Rhinos',
            ],
            41 => [
                'id' => '019169fb-90b4-70ba-969f-b871ec2c02db',
                'name' => 'Leigh Leopards',
            ],
            42 => [
                'id' => '019169fb-90b6-7367-ad7b-706acd974b1d',
                'name' => 'London Broncos',
            ],
            43 => [
                'id' => '019169fb-90b7-73c0-92f7-abe2389e4682',
                'name' => 'Newcastle Thunder',
            ],
            44 => [
                'id' => '019169fb-90b8-732c-a99d-5822aff2d167',
                'name' => 'Oldham',
            ],
            45 => [
                'id' => '019169fb-90ba-7188-a82e-8aae98d59b12',
                'name' => 'Paris St Germain',
            ],
            46 => [
                'id' => '019169fb-90bb-7005-b9a4-0f42665a7338',
                'name' => 'Salford Red Devils',
            ],
            47 => [
                'id' => '019169fb-90bd-7392-9652-f48ed2e559b0',
                'name' => 'Sheffield Eagles',
            ],
            48 => [
                'id' => '019169fb-90be-7319-b987-686003065d1e',
                'name' => 'St Helens',
            ],
            49 => [
                'id' => '019169fb-90bf-7294-9292-834560e49a8a',
                'name' => 'Toronto Wolfpack',
            ],
            50 => [
                'id' => '019169fb-90c0-72a8-b3cb-a3af816eb30f',
                'name' => 'Toulouse Olympique',
            ],
            51 => [
                'id' => '019169fb-90c2-7071-8f83-523cb94b7b3c',
                'name' => 'Wakefield Trinity',
            ],
            52 => [
                'id' => '019169fb-90c3-700b-b900-800fe102bd69',
                'name' => 'Warrington Wolves',
            ],
            53 => [
                'id' => '019169fb-90c4-7390-8200-637bef01ed50',
                'name' => 'Widnes Vikings',
            ],
            54 => [
                'id' => '019169fb-90c6-70f9-8e99-6490eb1b2da0',
                'name' => 'Wigan Warriors',
            ],
            55 => [
                'id' => '019169fb-90c8-73b6-8e09-858ab6193464',
                'name' => 'Workington Town',
            ],
        ];
    }
}
