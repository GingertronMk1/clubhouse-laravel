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

    private function getTeams(): array
    {
        return [
            0 => [
                'id' => '019169fb-9074-71e6-b455-f35854f9b70a',
                'name' => 'Arizona Cardinals',
            ],
            1 => [
                'id' => '019169fb-9078-70d8-9ea2-5e14e52cb760',
                'name' => 'Atlanta Falcons',
            ],
            2 => [
                'id' => '019169fb-9079-7092-8d00-f7b78c6306f9',
                'name' => 'Baltimore Ravens',
            ],
            3 => [
                'id' => '019169fb-907c-71d3-82fc-e47c44fd8db8',
                'name' => 'Buffalo Bills',
            ],
            4 => [
                'id' => '019169fb-907d-7179-b7b0-021c6b505c14',
                'name' => 'Carolina Panthers',
            ],
            5 => [
                'id' => '019169fb-907f-7070-9a71-b6dddd5b5b07',
                'name' => 'Chicago Bears',
            ],
            6 => [
                'id' => '019169fb-9080-726f-8dd0-c81c7a8f6206',
                'name' => 'Cincinnati Bengals',
            ],
            7 => [
                'id' => '019169fb-9081-71c0-ae09-e20ba40acb4e',
                'name' => 'Cleveland Browns',
            ],
            8 => [
                'id' => '019169fb-9083-7363-836a-31a3e238e22a',
                'name' => 'Dallas Cowboys',
            ],
            9 => [
                'id' => '019169fb-9084-73e9-a0d7-eda37249d3ff',
                'name' => 'Denver Broncos',
            ],
            10 => [
                'id' => '019169fb-9085-7024-afbc-5a79d3d7ef15',
                'name' => 'Detroit Lions',
            ],
            11 => [
                'id' => '019169fb-9087-71ca-9052-21dc2cee94ad',
                'name' => 'Green Bay Packers',
            ],
            12 => [
                'id' => '019169fb-9088-733d-8591-18ed930b2fc4',
                'name' => 'Houston Texans',
            ],
            13 => [
                'id' => '019169fb-9089-7010-8386-e4c8a5f54c27',
                'name' => 'Indianapolis Colts',
            ],
            14 => [
                'id' => '019169fb-908a-7184-80aa-4ea3e8036cc9',
                'name' => 'Jacksonville Jaguars',
            ],
            15 => [
                'id' => '019169fb-908c-705a-a3b9-3d8ac31f105b',
                'name' => 'Kansas City Chiefs',
            ],
            16 => [
                'id' => '019169fb-908d-732c-ba8c-de34afa3f682',
                'name' => 'Las Vegas Raiders',
            ],
            17 => [
                'id' => '019169fb-908e-7120-b673-dee87806e5bc',
                'name' => 'Los Angeles Chargers',
            ],
            18 => [
                'id' => '019169fb-9090-7248-9146-c2e651b98709',
                'name' => 'Los Angeles Rams',
            ],
            19 => [
                'id' => '019169fb-9091-7015-9021-910fd2b46248',
                'name' => 'Miami Dolphins',
            ],
            20 => [
                'id' => '019169fb-9092-734e-b1d0-6b812074aa2e',
                'name' => 'Minnesota Vikings',
            ],
            21 => [
                'id' => '019169fb-9094-705d-9d54-acd8f30eef9a',
                'name' => 'New England Patriots',
            ],
            22 => [
                'id' => '019169fb-9095-7172-b788-6c3f2a5ea15c',
                'name' => 'New Orleans Saints',
            ],
            23 => [
                'id' => '019169fb-9099-7245-8558-af8cd0b30996',
                'name' => 'New York Giants',
            ],
            24 => [
                'id' => '019169fb-909b-71eb-a203-29f4ee70f461',
                'name' => 'New York Jets',
            ],
            25 => [
                'id' => '019169fb-909d-7289-afc3-78607a634178',
                'name' => 'Philadelphia Eagles',
            ],
            26 => [
                'id' => '019169fb-909e-72b5-8501-e2c4a22ea888',
                'name' => 'Pittsburgh Steelers',
            ],
            27 => [
                'id' => '019169fb-90a0-7253-aa36-7a0067476d11',
                'name' => 'San Francisco 49ers',
            ],
            28 => [
                'id' => '019169fb-90a1-7202-9bf1-933e25fdbb6b',
                'name' => 'Seattle Seahawks',
            ],
            29 => [
                'id' => '019169fb-90a3-7074-98c7-2eb18df33e50',
                'name' => 'Tampa Bay Buccaneers',
            ],
            30 => [
                'id' => '019169fb-90a4-7142-ab3c-6cd1a1ad8706',
                'name' => 'Tennessee Titans',
            ],
            31 => [
                'id' => '019169fb-90a6-710a-92ec-803b3eff1f40',
                'name' => 'Washington Commanders',
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
