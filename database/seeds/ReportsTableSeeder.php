<?php

use Illuminate\Database\Seeder;
use App\Entities\Report;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * hacker_1
         *    day, hour
         * 1. -3, 12
         * 2. -2, 8
         * 3. -2, 20
         * 4. -1, 11
         * 5. -1, 23
         */
        $this->save('hacker_1', 3, 12);
        $this->save('hacker_1', 2, 8);
        $this->save('hacker_1', 2, 20);
        $this->save('hacker_1', 1, 11);
        $this->save('hacker_1', 1, 23);

        /**
         * hacker_2
         *    day, hour
         * 1. -3, 9
         * 2. -2, 15
         * 3. -1, 19
         */
        $this->save('hacker_2', 3, 9);
        $this->save('hacker_2', 2, 15);
        $this->save('hacker_2', 1, 19);

        /**
         * hacker_3
         *    day, hour
         * 1. -1, 10
         */
        $this->save('hacker_3', 1, 10);
    }

    private function save($id, $day, $hour)
    {
        $model = new Report();
        $model->fill(['hacker_id'=> $id, 'created_at'=> $this->day($day).$this->hour($hour)]);
        $model->save();
    }

    /**
     * @param $hour
     * @return string
     */
    private function hour($hour)
    {
        return ' '.$hour.':00:00';
    }

    /**
     * @param $day
     * @return false|string
     */
    private function day($day)
    {
        return date('Y-m-d', strtotime('-'.$day.' days'));
    }
}
