<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = array(
            array('id' => '256','car_listing_id' => '72','name' => '72-image-1648571232736.jpg','created_at' => '2022-03-29 16:27:12','updated_at' => '2022-03-29 16:27:12'),
            array('id' => '257','car_listing_id' => '72','name' => '72-image-1648571232125.jpg','created_at' => '2022-03-29 16:27:12','updated_at' => '2022-03-29 16:27:12'),
            array('id' => '262','car_listing_id' => '76','name' => '76-image-1648641306887.jpg','created_at' => '2022-03-30 11:55:06','updated_at' => '2022-03-30 11:55:06'),
            array('id' => '263','car_listing_id' => '76','name' => '76-image-164864130612.jpg','created_at' => '2022-03-30 11:55:06','updated_at' => '2022-03-30 11:55:06'),
            array('id' => '264','car_listing_id' => '76','name' => '76-image-164864130697.jpg','created_at' => '2022-03-30 11:55:06','updated_at' => '2022-03-30 11:55:06'),
            array('id' => '265','car_listing_id' => '76','name' => '76-image-1648641306981.jpg','created_at' => '2022-03-30 11:55:06','updated_at' => '2022-03-30 11:55:06'),
            array('id' => '266','car_listing_id' => '77','name' => '77-image-1648641410657.jpg','created_at' => '2022-03-30 11:56:50','updated_at' => '2022-03-30 11:56:50'),
            array('id' => '267','car_listing_id' => '77','name' => '77-image-1648641410157.jpg','created_at' => '2022-03-30 11:56:50','updated_at' => '2022-03-30 11:56:50'),
            array('id' => '268','car_listing_id' => '77','name' => '77-image-1648641410870.jpg','created_at' => '2022-03-30 11:56:50','updated_at' => '2022-03-30 11:56:50'),
            array('id' => '269','car_listing_id' => '77','name' => '77-image-1648641410351.jpg','created_at' => '2022-03-30 11:56:50','updated_at' => '2022-03-30 11:56:50'),
            array('id' => '270','car_listing_id' => '77','name' => '77-image-1648641410588.jpg','created_at' => '2022-03-30 11:56:50','updated_at' => '2022-03-30 11:56:50'),
            array('id' => '271','car_listing_id' => '77','name' => '77-image-1648641410516.jpg','created_at' => '2022-03-30 11:56:50','updated_at' => '2022-03-30 11:56:50'),
            array('id' => '272','car_listing_id' => '78','name' => '78-image-1648641515554.jpg','created_at' => '2022-03-30 11:58:35','updated_at' => '2022-03-30 11:58:35'),
            array('id' => '273','car_listing_id' => '78','name' => '78-image-1648641515307.jpg','created_at' => '2022-03-30 11:58:35','updated_at' => '2022-03-30 11:58:35'),
            array('id' => '274','car_listing_id' => '78','name' => '78-image-1648641515247.jpg','created_at' => '2022-03-30 11:58:35','updated_at' => '2022-03-30 11:58:35'),
            array('id' => '275','car_listing_id' => '78','name' => '78-image-1648641515928.jpg','created_at' => '2022-03-30 11:58:35','updated_at' => '2022-03-30 11:58:35'),
            array('id' => '276','car_listing_id' => '79','name' => '79-image-1648641603483.jpg','created_at' => '2022-03-30 12:00:03','updated_at' => '2022-03-30 12:00:03'),
            array('id' => '277','car_listing_id' => '79','name' => '79-image-164864160384.jpg','created_at' => '2022-03-30 12:00:03','updated_at' => '2022-03-30 12:00:03'),
            array('id' => '278','car_listing_id' => '79','name' => '79-image-1648641603968.jpg','created_at' => '2022-03-30 12:00:03','updated_at' => '2022-03-30 12:00:03'),
            array('id' => '279','car_listing_id' => '79','name' => '79-image-1648641603108.jpg','created_at' => '2022-03-30 12:00:03','updated_at' => '2022-03-30 12:00:03'),
            array('id' => '280','car_listing_id' => '79','name' => '79-image-1648641603653.jpg','created_at' => '2022-03-30 12:00:03','updated_at' => '2022-03-30 12:00:03'),
            array('id' => '281','car_listing_id' => '79','name' => '79-image-1648641603284.jpg','created_at' => '2022-03-30 12:00:03','updated_at' => '2022-03-30 12:00:03'),
            array('id' => '282','car_listing_id' => '80','name' => '80-image-1648641705642.jpg','created_at' => '2022-03-30 12:01:45','updated_at' => '2022-03-30 12:01:45'),
            array('id' => '283','car_listing_id' => '80','name' => '80-image-1648641705532.jpg','created_at' => '2022-03-30 12:01:45','updated_at' => '2022-03-30 12:01:45'),
            array('id' => '284','car_listing_id' => '80','name' => '80-image-164864170550.jpg','created_at' => '2022-03-30 12:01:45','updated_at' => '2022-03-30 12:01:45'),
            array('id' => '285','car_listing_id' => '80','name' => '80-image-1648641705575.jpg','created_at' => '2022-03-30 12:01:45','updated_at' => '2022-03-30 12:01:45'),
            array('id' => '286','car_listing_id' => '80','name' => '80-image-1648641705397.jpg','created_at' => '2022-03-30 12:01:45','updated_at' => '2022-03-30 12:01:45'),
            array('id' => '287','car_listing_id' => '81','name' => '81-image-164864179095.jpg','created_at' => '2022-03-30 12:03:10','updated_at' => '2022-03-30 12:03:10'),
            array('id' => '288','car_listing_id' => '81','name' => '81-image-1648641790515.jpg','created_at' => '2022-03-30 12:03:10','updated_at' => '2022-03-30 12:03:10'),
            array('id' => '289','car_listing_id' => '81','name' => '81-image-1648641790663.jpg','created_at' => '2022-03-30 12:03:10','updated_at' => '2022-03-30 12:03:10'),
            array('id' => '290','car_listing_id' => '81','name' => '81-image-1648641790354.jpg','created_at' => '2022-03-30 12:03:10','updated_at' => '2022-03-30 12:03:10'),
            array('id' => '291','car_listing_id' => '81','name' => '81-image-1648641790810.jpg','created_at' => '2022-03-30 12:03:10','updated_at' => '2022-03-30 12:03:10'),
            array('id' => '292','car_listing_id' => '81','name' => '81-image-1648641790354.jpg','created_at' => '2022-03-30 12:03:10','updated_at' => '2022-03-30 12:03:10'),
            array('id' => '293','car_listing_id' => '81','name' => '81-image-1648641790564.jpg','created_at' => '2022-03-30 12:03:10','updated_at' => '2022-03-30 12:03:10'),
            array('id' => '299','car_listing_id' => '92','name' => '92-image-1649102097108.jpg','created_at' => '2022-04-04 19:54:57','updated_at' => '2022-04-04 19:54:57'),
            array('id' => '300','car_listing_id' => '92','name' => '92-image-164910209745.jpg','created_at' => '2022-04-04 19:54:57','updated_at' => '2022-04-04 19:54:57'),
            array('id' => '301','car_listing_id' => '92','name' => '92-image-1649102097660.jpg','created_at' => '2022-04-04 19:54:57','updated_at' => '2022-04-04 19:54:57'),
            array('id' => '302','car_listing_id' => '92','name' => '92-image-1649102097133.jpg','created_at' => '2022-04-04 19:54:57','updated_at' => '2022-04-04 19:54:57'),
            array('id' => '303','car_listing_id' => '93','name' => '93-image-1649260551731.jpg','created_at' => '2022-04-06 15:55:51','updated_at' => '2022-04-06 15:55:51'),
            array('id' => '304','car_listing_id' => '93','name' => '93-image-1649260551618.jpg','created_at' => '2022-04-06 15:55:51','updated_at' => '2022-04-06 15:55:51'),
            array('id' => '305','car_listing_id' => '93','name' => '93-image-1649260551434.jpg','created_at' => '2022-04-06 15:55:51','updated_at' => '2022-04-06 15:55:51'),
            array('id' => '306','car_listing_id' => '93','name' => '93-image-1649260551930.jpg','created_at' => '2022-04-06 15:55:51','updated_at' => '2022-04-06 15:55:51'),
            array('id' => '307','car_listing_id' => '93','name' => '93-image-1649260551633.jpg','created_at' => '2022-04-06 15:55:51','updated_at' => '2022-04-06 15:55:51'),
            array('id' => '308','car_listing_id' => '94','name' => '94-image-1649260913213.jpg','created_at' => '2022-04-06 16:01:53','updated_at' => '2022-04-06 16:01:53'),
            array('id' => '309','car_listing_id' => '94','name' => '94-image-1649260913439.jpg','created_at' => '2022-04-06 16:01:53','updated_at' => '2022-04-06 16:01:53'),
            array('id' => '310','car_listing_id' => '94','name' => '94-image-1649260913506.jpg','created_at' => '2022-04-06 16:01:53','updated_at' => '2022-04-06 16:01:53'),
            array('id' => '311','car_listing_id' => '94','name' => '94-image-1649260913303.jpg','created_at' => '2022-04-06 16:01:53','updated_at' => '2022-04-06 16:01:53'),
            array('id' => '312','car_listing_id' => '94','name' => '94-image-164926091317.jpg','created_at' => '2022-04-06 16:01:53','updated_at' => '2022-04-06 16:01:53'),
            array('id' => '313','car_listing_id' => '95','name' => '95-image-164926102073.jpg','created_at' => '2022-04-06 16:03:40','updated_at' => '2022-04-06 16:03:40'),
            array('id' => '314','car_listing_id' => '95','name' => '95-image-1649261020940.jpg','created_at' => '2022-04-06 16:03:40','updated_at' => '2022-04-06 16:03:40'),
            array('id' => '315','car_listing_id' => '95','name' => '95-image-1649261020377.jpg','created_at' => '2022-04-06 16:03:40','updated_at' => '2022-04-06 16:03:40'),
            array('id' => '316','car_listing_id' => '95','name' => '95-image-1649261020163.jpg','created_at' => '2022-04-06 16:03:40','updated_at' => '2022-04-06 16:03:40'),
            array('id' => '317','car_listing_id' => '95','name' => '95-image-1649261020830.jpg','created_at' => '2022-04-06 16:03:40','updated_at' => '2022-04-06 16:03:40'),
            array('id' => '318','car_listing_id' => '96','name' => '96-image-1649261156202.jpg','created_at' => '2022-04-06 16:05:56','updated_at' => '2022-04-06 16:05:56'),
            array('id' => '319','car_listing_id' => '96','name' => '96-image-1649261156109.jpg','created_at' => '2022-04-06 16:05:56','updated_at' => '2022-04-06 16:05:56'),
            array('id' => '320','car_listing_id' => '96','name' => '96-image-1649261156115.jpg','created_at' => '2022-04-06 16:05:56','updated_at' => '2022-04-06 16:05:56'),
            array('id' => '321','car_listing_id' => '96','name' => '96-image-1649261156446.jpg','created_at' => '2022-04-06 16:05:56','updated_at' => '2022-04-06 16:05:56'),
            array('id' => '322','car_listing_id' => '96','name' => '96-image-1649261156616.jpg','created_at' => '2022-04-06 16:05:56','updated_at' => '2022-04-06 16:05:56'),
            array('id' => '323','car_listing_id' => '96','name' => '96-image-1649261156725.jpg','created_at' => '2022-04-06 16:05:56','updated_at' => '2022-04-06 16:05:56'),
            array('id' => '324','car_listing_id' => '96','name' => '96-image-1649261156562.jpg','created_at' => '2022-04-06 16:05:56','updated_at' => '2022-04-06 16:05:56'),
            array('id' => '325','car_listing_id' => '97','name' => '97-image-164926136076.jpg','created_at' => '2022-04-06 16:09:20','updated_at' => '2022-04-06 16:09:20'),
            array('id' => '326','car_listing_id' => '97','name' => '97-image-1649261360818.jpg','created_at' => '2022-04-06 16:09:20','updated_at' => '2022-04-06 16:09:20'),
            array('id' => '327','car_listing_id' => '97','name' => '97-image-1649261360222.jpg','created_at' => '2022-04-06 16:09:20','updated_at' => '2022-04-06 16:09:20'),
            array('id' => '328','car_listing_id' => '98','name' => '98-image-1649261493519.jpg','created_at' => '2022-04-06 16:11:33','updated_at' => '2022-04-06 16:11:33'),
            array('id' => '329','car_listing_id' => '98','name' => '98-image-1649261493492.jpg','created_at' => '2022-04-06 16:11:33','updated_at' => '2022-04-06 16:11:33'),
            array('id' => '330','car_listing_id' => '98','name' => '98-image-164926149378.jpg','created_at' => '2022-04-06 16:11:33','updated_at' => '2022-04-06 16:11:33'),
            array('id' => '331','car_listing_id' => '98','name' => '98-image-1649261493613.jpg','created_at' => '2022-04-06 16:11:33','updated_at' => '2022-04-06 16:11:33'),
            array('id' => '332','car_listing_id' => '98','name' => '98-image-1649261493646.jpg','created_at' => '2022-04-06 16:11:33','updated_at' => '2022-04-06 16:11:33'),
            array('id' => '333','car_listing_id' => '99','name' => '99-image-1649261632887.jpg','created_at' => '2022-04-06 16:13:52','updated_at' => '2022-04-06 16:13:52'),
            array('id' => '334','car_listing_id' => '99','name' => '99-image-1649261632550.jpg','created_at' => '2022-04-06 16:13:52','updated_at' => '2022-04-06 16:13:52'),
            array('id' => '335','car_listing_id' => '99','name' => '99-image-1649261632668.jpg','created_at' => '2022-04-06 16:13:52','updated_at' => '2022-04-06 16:13:52'),
            array('id' => '336','car_listing_id' => '99','name' => '99-image-1649261632402.jpg','created_at' => '2022-04-06 16:13:52','updated_at' => '2022-04-06 16:13:52'),
            array('id' => '337','car_listing_id' => '99','name' => '99-image-1649261632561.jpg','created_at' => '2022-04-06 16:13:52','updated_at' => '2022-04-06 16:13:52'),
            array('id' => '338','car_listing_id' => '100','name' => '100-image-1649261735164.jpg','created_at' => '2022-04-06 16:15:35','updated_at' => '2022-04-06 16:15:35'),
            array('id' => '339','car_listing_id' => '100','name' => '100-image-1649261735462.jpg','created_at' => '2022-04-06 16:15:35','updated_at' => '2022-04-06 16:15:35'),
            array('id' => '340','car_listing_id' => '100','name' => '100-image-1649261735180.jpg','created_at' => '2022-04-06 16:15:35','updated_at' => '2022-04-06 16:15:35'),
            array('id' => '341','car_listing_id' => '100','name' => '100-image-1649261735696.jpg','created_at' => '2022-04-06 16:15:35','updated_at' => '2022-04-06 16:15:35'),
            array('id' => '342','car_listing_id' => '100','name' => '100-image-1649261735374.jpg','created_at' => '2022-04-06 16:15:35','updated_at' => '2022-04-06 16:15:35'),
            array('id' => '343','car_listing_id' => '101','name' => '101-image-1649261866350.jpg','created_at' => '2022-04-06 16:17:46','updated_at' => '2022-04-06 16:17:46'),
            array('id' => '344','car_listing_id' => '101','name' => '101-image-1649261866835.jpg','created_at' => '2022-04-06 16:17:46','updated_at' => '2022-04-06 16:17:46'),
            array('id' => '345','car_listing_id' => '101','name' => '101-image-1649261866799.jpg','created_at' => '2022-04-06 16:17:46','updated_at' => '2022-04-06 16:17:46'),
            array('id' => '346','car_listing_id' => '101','name' => '101-image-1649261866180.jpg','created_at' => '2022-04-06 16:17:46','updated_at' => '2022-04-06 16:17:46'),
            array('id' => '347','car_listing_id' => '102','name' => '102-image-1649261994966.jpg','created_at' => '2022-04-06 16:19:54','updated_at' => '2022-04-06 16:19:54'),
            array('id' => '348','car_listing_id' => '102','name' => '102-image-1649261994749.jpg','created_at' => '2022-04-06 16:19:54','updated_at' => '2022-04-06 16:19:54'),
            array('id' => '349','car_listing_id' => '102','name' => '102-image-1649261994582.jpg','created_at' => '2022-04-06 16:19:54','updated_at' => '2022-04-06 16:19:54'),
            array('id' => '350','car_listing_id' => '102','name' => '102-image-1649261994740.jpg','created_at' => '2022-04-06 16:19:54','updated_at' => '2022-04-06 16:19:54'),
            array('id' => '351','car_listing_id' => '102','name' => '102-image-164926199441.jpg','created_at' => '2022-04-06 16:19:54','updated_at' => '2022-04-06 16:19:54'),
            array('id' => '352','car_listing_id' => '102','name' => '102-image-1649261994739.jpg','created_at' => '2022-04-06 16:19:54','updated_at' => '2022-04-06 16:19:54'),
            array('id' => '353','car_listing_id' => '103','name' => '103-image-1649262087443.jpg','created_at' => '2022-04-06 16:21:27','updated_at' => '2022-04-06 16:21:27'),
            array('id' => '354','car_listing_id' => '103','name' => '103-image-1649262087500.jpg','created_at' => '2022-04-06 16:21:27','updated_at' => '2022-04-06 16:21:27'),
            array('id' => '355','car_listing_id' => '103','name' => '103-image-1649262087923.jpg','created_at' => '2022-04-06 16:21:27','updated_at' => '2022-04-06 16:21:27'),
            array('id' => '356','car_listing_id' => '103','name' => '103-image-1649262087514.jpg','created_at' => '2022-04-06 16:21:27','updated_at' => '2022-04-06 16:21:27'),
            array('id' => '357','car_listing_id' => '103','name' => '103-image-1649262087382.jpg','created_at' => '2022-04-06 16:21:27','updated_at' => '2022-04-06 16:21:27'),
            array('id' => '358','car_listing_id' => '104','name' => '104-image-164926221980.jpg','created_at' => '2022-04-06 16:23:39','updated_at' => '2022-04-06 16:23:39'),
            array('id' => '359','car_listing_id' => '104','name' => '104-image-1649262219172.jpg','created_at' => '2022-04-06 16:23:39','updated_at' => '2022-04-06 16:23:39'),
            array('id' => '360','car_listing_id' => '104','name' => '104-image-1649262219528.jpg','created_at' => '2022-04-06 16:23:39','updated_at' => '2022-04-06 16:23:39'),
            array('id' => '361','car_listing_id' => '104','name' => '104-image-1649262219448.jpg','created_at' => '2022-04-06 16:23:39','updated_at' => '2022-04-06 16:23:39'),
            array('id' => '362','car_listing_id' => '104','name' => '104-image-1649262219474.jpg','created_at' => '2022-04-06 16:23:39','updated_at' => '2022-04-06 16:23:39'),
            array('id' => '363','car_listing_id' => '105','name' => '105-image-164926231570.jpg','created_at' => '2022-04-06 16:25:15','updated_at' => '2022-04-06 16:25:15'),
            array('id' => '364','car_listing_id' => '105','name' => '105-image-1649262315621.jpg','created_at' => '2022-04-06 16:25:15','updated_at' => '2022-04-06 16:25:15'),
            array('id' => '365','car_listing_id' => '105','name' => '105-image-1649262315401.jpg','created_at' => '2022-04-06 16:25:15','updated_at' => '2022-04-06 16:25:15'),
            array('id' => '366','car_listing_id' => '105','name' => '105-image-164926231534.jpg','created_at' => '2022-04-06 16:25:15','updated_at' => '2022-04-06 16:25:15'),
            array('id' => '367','car_listing_id' => '105','name' => '105-image-1649262315966.jpg','created_at' => '2022-04-06 16:25:15','updated_at' => '2022-04-06 16:25:15')
        );

        foreach ($images as $item) {
            DB::table('images')->insert($item);
        }
    }
}
