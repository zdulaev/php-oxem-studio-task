<?php 

namespace App\Core\Controllers;

use Controllers\Animal;

/**
 * Farm class
 */
class Farm 
{
    protected $db = [];
    protected $log = [];

    public function addAnimal($animal) {
        if (!array_key_exists($animal->id, $this->db)) {
            $this->db[$animal->type][$animal->id] = $animal;
        } else {
            throw new \Exception('duplicate!!');
        }
    }

    public function setCollect($days = 1) {
        $days = abs($days);

        foreach (range(count($this->log), $days + count($this->log) - 1) as $day) {
            foreach ($this->db as $types) {
                foreach ($types as $animal) {
                    $report = &$this->log[$day + 1][$animal->type][$animal->id];
                    $report = $animal;

                    if (is_null($report->amount)) {
                        $report->amount = rand($report->range[0], $report->range[1]);
                    }
                }
            }
        }
    }

    public function getAnimals($type) {
        $result = 0;
        if (isset($this->db[$type])) {
            $result = count($this->db[$type]);
        }
        return $result;
    }

    public function getReport($type, $days = 0) {
        $days = abs($days);
        $result = 0;

        foreach (array_slice($this->log, -1 * $days) as $day) {
            if (isset($day[$type])) {
                $result += array_sum(array_column($day[$type], 'amount'));
            }
        }
        return $result;
    }

}

