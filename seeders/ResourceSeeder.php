<?php

namespace Database\Seeders;

use App\Models\Buildings;
use App\Models\Campuses;
use App\Models\Desks;
use App\Models\Floors;
use App\Models\Rooms;
use Doctrine\DBAL\Schema\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\False_;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Empty Tables before Seeding
        DB::table('campuses')->truncate();
        DB::table('buildings')->truncate();
        DB::table('floors')->truncate();
        DB::table('rooms')->truncate();
        DB::table('desks')->truncate();

        // Create Okanagan Campus
        $campus = new Campuses;
        $campus->name = 'Okanagan';
        $campus->is_closed = FALSE;
        $campus->save();

        // Create Science Building For Okanagan Campus
        $building = new Buildings;
        $building->campus_id = $campus->id;
        $building->name = 'Science';
        $building->is_closed = FALSE;
        $building->save();

        // Create 1st Floor For Science Building
        $floor = new Floors;
        $floor->building_id = $building->id;
        $floor->floor_num = '1st Floor';
        $floor->is_closed = FALSE;
        $floor->save();

        // Create SCI 110 Room For 1st Floor
        $room = new Rooms;
        $room->floor_id = $floor->id;
        $room->name = "SCI 110";
        $room->has_printer = False;
        $room->has_projector = False;
        $room->is_closed = False;
        $room->room_image = 0001;      // Placeholder until we have images
        $room->save();

        // Create a Desk for SCI 110 Room
        $desk = new Desks;
        $desk->room_id = $room->id;
        $desk->pos_x = 100;
        $desk->pos_y = 100;
        $desk->has_outlet = TRUE;
        $desk->is_closed = TRUE;
        $desk->save();

        // Create a Desk for SCI 110 Room
        $desk = new Desks;
        $desk->room_id = $room->id;
        $desk->pos_x = 120;
        $desk->pos_y = 120;
        $desk->has_outlet = TRUE;
        $desk->is_closed = TRUE;
        $desk->save();

        // Create a Desk for SCI 110 Room
        $desk = new Desks;
        $desk->room_id = $room->id;
        $desk->pos_x = 140;
        $desk->pos_y = 140;
        $desk->has_outlet = TRUE;
        $desk->is_closed = TRUE;
        $desk->save();

        // Create 2nd Floor For Science Building
        $floor = new Floors;
        $floor->building_id = $building->id;
        $floor->floor_num = '2nd Floor';
        $floor->is_closed = FALSE;
        $floor->save();

        // Create SCI 220 Room For 2nd Floor
        $room = new Rooms;
        $room->floor_id = $floor->id;
        $room->name = "SCI 220";
        $room->has_printer = TRUE;
        $room->has_projector = TRUE;
        $room->is_closed = False;
        $room->room_image = 0001;      // Placeholder until we have images
        $room->save();

        // Create a Desk for SCI 220 Room
        $desk = new Desks;
        $desk->room_id = $room->id;
        $desk->pos_x = 100;
        $desk->pos_y = 100;
        $desk->has_outlet = TRUE;
        $desk->is_closed = TRUE;
        $desk->save();

        // Create a Desk for SCI 220 Room
        $desk = new Desks;
        $desk->room_id = $room->id;
        $desk->pos_x = 120;
        $desk->pos_y = 120;
        $desk->has_outlet = TRUE;
        $desk->is_closed = TRUE;
        $desk->save();

        // Create 3rd Floor For Science Building
        $floor = new Floors;
        $floor->building_id = $building->id;
        $floor->floor_num = '3rd Floor';
        $floor->is_closed = FALSE;
        $floor->save();

        // Create Arts Building For Okanagan Campus
        $building = new Buildings;
        $building->campus_id = $campus->id;
        $building->name = 'Arts';
        $building->is_closed = TRUE;
        $building->save();

        // Create 1st Floor For Arts Building
        $floor = new Floors;
        $floor->building_id = $building->id;
        $floor->floor_num = '1st Floor';
        $floor->is_closed = FALSE;
        $floor->save();

        // Create 2nd Floor For Arts Building
        $floor = new Floors;
        $floor->building_id = $building->id;
        $floor->floor_num = '2nd Floor';
        $floor->is_closed = FALSE;
        $floor->save();
    }
}
