<?php


use PHPUnit\Framework\TestCase;

class JosephTest extends TestCase {
    /** @test */
    public function Test() {
        $numbers = range(1,5);
        $result = $this->Calc($numbers,3);
        $this->assertEquals(4, $result);
    }

    private function Calc(array $numbers,int $count) {

        $length = count($numbers);

        if($length <= 1) {
            return $numbers[0];
        }

        for ($i = 1; $i<$length; $i++) {
            if(count($numbers) >= $count) {
                $kickout = $count;
            }
            else {
                $kickout = $count % count($numbers) ;
            }

            // 組建環狀

            $right = unserialize(serialize($numbers));
            $left = unserialize(serialize($numbers));

            $right = array_slice($right,$kickout);
            $left = array_slice($left,0,$kickout-1);

            $numbers = array_merge($right,$left);
        }

        return $numbers[0];
    }
}
