<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CongregationalGroup;
use App\Models\ChurchOrganization;
use App\Models\SpecialEvent;
use App\Models\DiakoniaMember;
use App\Models\Devotional;
use App\Models\ChurchOfficial;
use App\Models\SecretariatItem;
use App\Models\FinancialRecord;
use App\Models\User;

class ChurchDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Church Admin',
            'email' => 'admin@church.local',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create sample member
        User::create([
            'name' => 'John Doe',
            'email' => 'john@church.local',
            'password' => bcrypt('password'),
            'role' => 'member',
            'email_verified_at' => now(),
        ]);

        // Create congregational groups
        $groupNames = [
            'Emmanuel Group', 'Bethel Group', 'Zion Group', 'Grace Group', 'Faith Group',
            'Hope Group', 'Peace Group', 'Joy Group', 'Love Group', 'Unity Group',
            'Trinity Group', 'Covenant Group', 'Blessing Group', 'Victory Group', 'Praise Group'
        ];

        foreach ($groupNames as $name) {
            CongregationalGroup::create([
                'name' => $name,
                'description' => 'Weekly congregational fellowship and Bible study',
                'schedule' => [
                    ['day' => 'Wednesday', 'time' => '7:00 PM', 'location' => 'Church Hall']
                ],
                'is_active' => true,
            ]);
        }

        // Create church organizations
        $organizations = [
            ['name' => 'Youth Ministry', 'type' => 'youth', 'description' => 'Ministry for young people ages 13-25'],
            ['name' => 'Sunday School', 'type' => 'children', 'description' => 'Christian education for children'],
            ['name' => 'Women\'s Fellowship', 'type' => 'women', 'description' => 'Fellowship and service for women'],
            ['name' => 'Men\'s Fellowship', 'type' => 'men', 'description' => 'Brotherhood and men\'s ministry'],
            ['name' => 'Senior Saints', 'type' => 'seniors', 'description' => 'Ministry for senior members'],
        ];

        foreach ($organizations as $org) {
            ChurchOrganization::create([
                'name' => $org['name'],
                'type' => $org['type'],
                'description' => $org['description'],
                'schedule' => [
                    ['day' => 'Saturday', 'time' => '2:00 PM', 'location' => 'Fellowship Hall']
                ],
                'is_active' => true,
            ]);
        }

        // Create special events
        $events = [
            ['name' => 'Monthly Communion', 'type' => 'communion', 'scheduled_at' => now()->addDays(7)],
            ['name' => 'Baptism Service', 'type' => 'baptism', 'scheduled_at' => now()->addDays(14)],
            ['name' => 'Youth Confirmation', 'type' => 'confirmation', 'scheduled_at' => now()->addDays(21)],
        ];

        foreach ($events as $event) {
            SpecialEvent::create([
                'name' => $event['name'],
                'type' => $event['type'],
                'description' => 'Special church service',
                'scheduled_at' => $event['scheduled_at'],
                'is_active' => true,
            ]);
        }

        // Create diakonia members
        $diakoniaMembers = [
            ['name' => 'Mary Johnson', 'domicile_group' => 'Grace Group', 'place_of_care' => 'General Hospital'],
            ['name' => 'Robert Smith', 'domicile_group' => 'Faith Group', 'place_of_care' => 'Home care'],
            ['name' => 'Sarah Williams', 'domicile_group' => 'Hope Group', 'place_of_care' => 'St. Mary\'s Care Center'],
        ];

        foreach ($diakoniaMembers as $member) {
            DiakoniaMember::create([
                'name' => $member['name'],
                'domicile_group' => $member['domicile_group'],
                'place_of_care' => $member['place_of_care'],
                'condition' => 'Recovering from surgery',
                'care_started' => now()->subDays(random_int(5, 30)),
                'is_active' => true,
            ]);
        }

        // Create weekly devotional
        Devotional::create([
            'title' => 'Walking in Faith',
            'content' => 'This week we reflect on the importance of faith in our daily walk with Christ. Faith is not just belief, but active trust in God\'s promises and character. As we face challenges, let us remember that our faith can move mountains and open doors that seem impossible to open.

When we walk in faith, we demonstrate our trust in God\'s plan for our lives, even when we cannot see the full picture. Let us encourage one another to step out in faith and watch God work miracles in our midst.',
            'scripture_reference' => 'Hebrews 11:1 - "Now faith is confidence in what we hope for and assurance about what we do not see."',
            'week_starting' => now()->startOfWeek(),
            'is_published' => true,
        ]);

        // Create church officials
        $officials = [
            ['name' => 'Pastor David Anderson', 'position' => 'Senior Pastor', 'department' => 'Leadership', 'order_priority' => 1],
            ['name' => 'Rev. Michael Brown', 'position' => 'Associate Pastor', 'department' => 'Youth Ministry', 'order_priority' => 2],
            ['name' => 'Elder James Wilson', 'position' => 'Church Elder', 'department' => 'Leadership', 'order_priority' => 3],
            ['name' => 'Deacon Susan Davis', 'position' => 'Head Deacon', 'department' => 'Service Ministry', 'order_priority' => 4],
            ['name' => 'Mrs. Patricia Miller', 'position' => 'Church Secretary', 'department' => 'Administration', 'order_priority' => 5],
        ];

        foreach ($officials as $official) {
            ChurchOfficial::create($official + ['is_active' => true]);
        }

        // Create secretariat items
        $secretariatItems = [
            [
                'title' => 'Birthday Celebrations This Month',
                'content' => 'We celebrate the birthdays of Sister Mary Thompson (15th), Brother John Lee (22nd), and Sister Grace Adams (28th). May God bless you with many more years!',
                'type' => 'birthday',
                'published_date' => now(),
                'is_published' => true,
            ],
            [
                'title' => 'Welcome New Members',
                'content' => 'We warmly welcome the Johnson family who joined our church last Sunday. Please make them feel at home in our community.',
                'type' => 'new_member',
                'published_date' => now()->subDays(2),
                'is_published' => true,
            ],
            [
                'title' => 'Special Offering for Missions',
                'content' => 'Next Sunday we will have a special offering to support our missionary work in Africa. Please prayerfully consider your contribution.',
                'type' => 'special_offering',
                'published_date' => now()->subDays(1),
                'is_published' => true,
            ],
        ];

        foreach ($secretariatItems as $item) {
            SecretariatItem::create($item);
        }

        // Create financial records
        $financialRecords = [
            [
                'description' => 'Sunday Morning Offering',
                'type' => 'offering',
                'amount' => 2450.00,
                'received_date' => now()->subDays(1),
                'is_published' => true,
            ],
            [
                'description' => 'Building Fund Envelope',
                'type' => 'special_envelope',
                'amount' => 500.00,
                'received_date' => now()->subDays(1),
                'is_published' => true,
            ],
            [
                'description' => 'Mission Support',
                'type' => 'individual_contribution',
                'amount' => 1000.00,
                'contributor' => 'Anonymous Donor',
                'received_date' => now()->subDays(3),
                'is_published' => true,
            ],
            [
                'description' => 'Youth Ministry Support',
                'type' => 'individual_contribution',
                'amount' => 300.00,
                'contributor' => 'Smith Family',
                'received_date' => now()->subDays(5),
                'is_published' => true,
            ],
        ];

        foreach ($financialRecords as $record) {
            FinancialRecord::create($record);
        }
    }
}