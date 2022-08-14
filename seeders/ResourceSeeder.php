<?php

namespace Database\Seeders;

use App\Models\Bookings;
use App\Models\Buildings;
use App\Models\Campuses;
use App\Models\Desks;
use App\Models\Floors;
use App\Models\OccupationPolicyLimit;
use App\Models\Rooms;
use App\Models\User;
use App\Models\BookingHistory;
use App\Models\Resources;
use App\Models\Resources_Desks;
use App\Models\Resources_Rooms;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('booking_history')->truncate();
        DB::table('policy_occupation_limit')->truncate();
        DB::table('resources')->truncate();
        DB::table('bookings')->truncate();
                
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
        $floor->floor_num = 1;
        $floor->is_closed = FALSE;
        $floor->save();

        // Create SCI 110 Room For 1st Floor
        $room = new Rooms;
        $room->floor_id = $floor->id;
        $room->name = "SCI 110";
        $room->occupancy = 30;
        $room->is_closed = False;
        $room->save();

        // Create a Desk for SCI 110 Room
        $desk = new Desks;
        $desk->room_id = $room->id;
        $desk->pos_x = 100;
        $desk->pos_y = 100;
        $desk->is_closed = FALSE;
        $desk->save();

        // create user to book with desk
        $user = User::factory()->create();
        // create booking using this user
        $booking = new Bookings;
        $booking->user_id = $user->id;
        $booking->desk_id = $desk->id;
        $booking->book_time_start = Carbon::now('GMT-7');
        $booking->book_time_end = Carbon::now('GMT-7');
        $booking->save();

        // Create a Desk for SCI 110 Room
        $desk = new Desks;
        $desk->room_id = $room->id;
        $desk->pos_x = 120;
        $desk->pos_y = 120;
        $desk->is_closed = FALSE;
        $desk->save();

        // create booking using this user
        $booking = new Bookings;
        $booking->user_id = $user->id;
        $booking->desk_id = $desk->id;
        $booking->book_time_start = Carbon::now('GMT-7');
        $booking->book_time_end = Carbon::now('GMT-7');
        $booking->save();

        // create booking using this user
        $booking = new Bookings;
        $booking->user_id = $user->id;
        $booking->desk_id = $desk->id;
        $booking->book_time_start = Carbon::now('GMT-7');
        $booking->book_time_end = Carbon::now('GMT-7');
        $booking->save();

        // Create a Desk for SCI 110 Room
        $desk = new Desks;
        $desk->room_id = $room->id;
        $desk->pos_x = 140;
        $desk->pos_y = 140;
        $desk->is_closed = FALSE;
        $desk->save();

        $booking_history = new BookingHistory;
        $booking_history->user_id = $user->id;
        $booking_history->desk_id = $desk->id;
        $booking_history->book_time_start = Carbon::now('GMT-7')->subYear();
        $booking_history->book_time_end = Carbon::now('GMT-7')->subYear();
        $booking_history->save();

        $resource = new Resources;
        $resource->resource_type = 'Lamp';
        $resource->icon = '<i class="bi bi-outlet"></i>';
        $resource->colour = '#2BC232';
        $resource->save();

        //Create new Desk Resource
        $resourceDesk = new Resources_Desks;
        $resourceDesk -> resource_id = $resource->resource_id;
        $resourceDesk -> desk_id = $desk->id;
        $resourceDesk->save();

        //Create new Room Resource
        $resourceRoom = new Resources_Rooms;
        $resourceRoom -> resource_id = $resource->resource_id;
        $resourceRoom -> room_id = $room->id;
        $resourceRoom -> description = 'Printer';
        $resourceRoom->save();

        $booking_history = new BookingHistory;
        $booking_history->user_id = $user->id;
        $booking_history->desk_id = $desk->id;
        $booking_history->book_time_start = Carbon::now('GMT-7')->subYear();
        $booking_history->book_time_end = Carbon::now('GMT-7')->subYear();
        $booking_history->save();

        // Create 2nd Floor For Science Building
        $floor = new Floors;
        $floor->building_id = $building->id;
        $floor->floor_num = 2;
        $floor->is_closed = FALSE;
        $floor->save();

        // Create SCI 220 Room For 2nd Floor
        $room = new Rooms;
        $room->floor_id = $floor->id;
        $room->name = "SCI 220";
        $room->occupancy = 30;
        $room->is_closed = False;
        $room->save();

        // Create a Desk for SCI 220 Room
        $desk = new Desks;
        $desk->room_id = $room->id;
        $desk->pos_x = 100;
        $desk->pos_y = 100;
        $desk->is_closed = FALSE;
        $desk->save();

        $booking_history = new BookingHistory;
        $booking_history->user_id = $user->id;
        $booking_history->desk_id = $desk->id;
        $booking_history->book_time_start = Carbon::now('GMT-7')->subYear();
        $booking_history->book_time_end = Carbon::now('GMT-7')->subYear();
        $booking_history->save();

        $resource = new Resources;
        $resource->resource_type = 'Printer';
        $resource->icon = '<i class="bi bi-outlet"></i>';
        $resource->colour = '#2BC232';
        $resource->save();

        //Create new Desk Resource
        $resourceDesk = new Resources_Desks;
        $resourceDesk -> resource_id = $resource->resource_id;
        $resourceDesk -> desk_id = $desk->id;
        $resourceDesk->save();

        //Create new Room Resource
        $resourceRoom = new Resources_Rooms;
        $resourceRoom -> resource_id = $resource->resource_id;
        $resourceRoom -> room_id = $room->id;
        $resourceRoom -> description = 'Printer';
        $resourceRoom->save();
        

        // Create a Desk for SCI 220 Room
        $desk = new Desks;
        $desk->room_id = $room->id;
        $desk->pos_x = 120;
        $desk->pos_y = 120;
        $desk->is_closed = FALSE;
        $desk->save();

        // Create 3rd Floor For Science Building
        $floor = new Floors;
        $floor->building_id = $building->id;
        $floor->floor_num = 3;
        $floor->is_closed = FALSE;
        $floor->save();

        // Create Arts Building For Okanagan Campus
        $building = new Buildings;
        $building->campus_id = $campus->id;
        $building->name = 'Arts';
        $building->is_closed = FALSE;
        $building->save();

        // Create 1st Floor For Arts Building
        $floor = new Floors;
        $floor->building_id = $building->id;
        $floor->floor_num = 1;
        $floor->is_closed = FALSE;
        $floor->save();

        //  Create ART 100 for 1st floor
        $room = new Rooms;
        $room->floor_id = $floor->id;
        $room->name = "ART 100";
        $room->occupancy = 16;
        $room->rows = 8;
        $room->cols = 8;
        $room->is_closed = False;
        $room->save();

        // Create 2nd Floor For Arts Building
        $floor = new Floors;
        $floor->building_id = $building->id;
        $floor->floor_num = 2;
        $floor->is_closed = FALSE;
        $floor->save();
        
        //  Create ART 200 for 2nd floor
        $room = new Rooms;
        $room->floor_id = $floor->id;
        $room->name = "ART 200";
        $room->occupancy = 16;
        $room->rows = 8;
        $room->cols = 8;
        $room->is_closed = False;
        $room->save();

        //Create Booking History
        $booking_history = new BookingHistory;
        $booking_history->user_id = $user->id;
        $booking_history->desk_id = $desk->id;
        $booking_history->book_time_start = Carbon::now('GMT-7');
        $booking_history->book_time_end = Carbon::now('GMT-7');
        $booking_history->save();

        $booking_history = new BookingHistory;
        $booking_history->user_id = $user->id;
        $booking_history->desk_id = $desk->id;
        $booking_history->book_time_start = Carbon::now('GMT-7');
        $booking_history->book_time_end = Carbon::now('GMT-7');
        $booking_history->save();

        $booking_history = new BookingHistory;
        $booking_history->user_id = $user->id;
        $booking_history->desk_id = $desk->id;
        $booking_history->book_time_start = Carbon::now('GMT-7')->subMonth();
        $booking_history->book_time_end = Carbon::now('GMT-7')->subMonth();
        $booking_history->save();

        $booking_history = new BookingHistory;
        $booking_history->user_id = $user->id;
        $booking_history->desk_id = $desk->id;
        $booking_history->book_time_start = Carbon::now('GMT-7')->addMonth();
        $booking_history->book_time_end = Carbon::now('GMT-7')->addMonth();
        $booking_history->save();

        $booking_history = new BookingHistory;
        $booking_history->user_id = $user->id;
        $booking_history->desk_id = $desk->id;
        $booking_history->book_time_start = Carbon::now('GMT-7')->addYear();
        $booking_history->book_time_end = Carbon::now('GMT-7')->addYear();
        $booking_history->save();

        $booking_history = new BookingHistory;
        $booking_history->user_id = $user->id;
        $booking_history->desk_id = $desk->id;
        $booking_history->book_time_start = Carbon::now('GMT-7')->subYear();
        $booking_history->book_time_end = Carbon::now('GMT-7')->subYear();
        $booking_history->save();


        // Create Occupation Policy NOTE THIS WILL BE THE DEFAULT VALUE, no other values should be used or created, We will hard code this to set the id == 1
        $occupation = new OccupationPolicyLimit;
        $occupation->id = 1;
        $occupation->percentage = 100;
        $occupation->save();
        
        // Create Resource Outlet
        $resource = new Resources;
        $resource->resource_type = 'Outlet';
        $resource->icon = '<i class="bi bi-outlet"></i>';
        $resource->colour = '#2BC232';
        $resource->save();

        //Create new Desk Resource
        $resourceDesk = new Resources_Desks;
        $resourceDesk -> resource_id = $resource->resource_id;
        $resourceDesk -> desk_id = $desk->id;
        $resourceDesk->save();

        //Create new Room Resource
        $resourceRoom = new Resources_Rooms;
        $resourceRoom -> resource_id = $resource->resource_id;
        $resourceRoom -> room_id = $room->id;
        $resourceRoom -> description = 'Printer';
        $resourceRoom->save();
        
    }
}